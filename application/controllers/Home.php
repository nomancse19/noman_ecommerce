<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $data=array();
    }
	public function index()
	{
                $data["all_published_product"] = $this->welcome_model->limit_published_product();
                $data['title']="Online Beauty Product in Bangladesh";
                $data['main_content']=$this->load->view("pages/home_content",$data,TRUE);
                $this->load->view('master',$data);
	}
        public function checkout()
	{
                $data['title']="CheckOut";
                $data['main_content']=$this->load->view("pages/checkout",$data,TRUE);
                $this->load->view('master',$data);
	}
        public function product_details($string){
                
                $product_id=$this->welcome_model->decryptstring($string);
                if(!$product_id==NULL){
                $data['all_join_product']=$this->welcome_model->all_join_product_by_product_id($product_id);
                $data['title']=$data['all_join_product']->product_name;
                $data['main_content']=$this->load->view("pages/product_details",$data,TRUE);
                $this->load->view('master',$data);
                }else{
                    redirect(base_url());
                }
        }
        public function all_product(){
             $config = array();
                $config["base_url"] = base_url() ."All-Product";
                $config["total_rows"] = $this->welcome_model->total_product_count();
                $config["per_page"] =6;
                $config["uri_segment"] =2;
                $config['next_link'] = '>';
                $config['prev_link'] = '<';
                $config['full_tag_open'] = '<div class="pagination-lg pagination-centered">';
                $config['full_tag_close'] = '</div>';
                $config['num_tag_open'] = '<li>';
                $config['num_tag_close'] = '</li>';
                $config['cur_tag_open'] = "<li class='disabled'><li class='active' ><a href='#'>";
                $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
                $config['next_tag_open'] = "<li>";
                $config['next_tagl_close'] = "</li>";
                $config['prev_tag_open'] = "<li>";
                $config['prev_tagl_close'] = "</li>";
                $config['first_tag_open'] = "<li>";
                $config['first_tagl_close'] = "</li>";
                $config['last_tag_open'] = "<li>";
                $config['last_tagl_close'] = "</li>";

                $this->pagination->initialize($config);
                $page=($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
                $data["all_published_product"] = $this->welcome_model->all_published_product($config["per_page"], $page);
                $data["links"] = $this->pagination->create_links();
            
                $data['title']="All Beauty Product In Bangladesh";
                $data['main_content']=$this->load->view("pages/all_product",$data,TRUE);
                $this->load->view('master',$data);
        }
        public function Subcategory_Product($subcategory_id){   
                $config = array();
                $config["base_url"] = base_url() ."Subcategory-Product/".$subcategory_id;
                $config["total_rows"] = $this->welcome_model->all_product_count_by_sub_category_id($subcategory_id);
                $config["per_page"] =6;
                $config["uri_segment"] =3;
                $config['next_link'] = '>';
                $config['prev_link'] = '<';
                $config['full_tag_open'] = '<div class="pagination-lg pagination-centered">';
                $config['full_tag_close'] = '</div>';
                $config['num_tag_open'] = '<li>';
                $config['num_tag_close'] = '</li>';
                $config['cur_tag_open'] = "<li class='disabled'><li class='active' ><a href='#'>";
                $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
                $config['next_tag_open'] = "<li>";
                $config['next_tagl_close'] = "</li>";
                $config['prev_tag_open'] = "<li>";
                $config['prev_tagl_close'] = "</li>";
                $config['first_tag_open'] = "<li>";
                $config['first_tagl_close'] = "</li>";
                $config['last_tag_open'] = "<li>";
                $config['last_tagl_close'] = "</li>";
                //$config['page_query_string'] = TRUE;
                $this->pagination->initialize($config);
                $page=($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $data["all_published_product"] = $this->welcome_model->all_published_product_by_subcategory($config["per_page"], $page,$subcategory_id);
                $data["links"] = $this->pagination->create_links();
                $data['subcategory_name']=$this->welcome_model->subcategory_name_by_id($subcategory_id);
                $data['subcategory_id']=$subcategory_id;
                $data['title']=$data['subcategory_name'] . " Product In Bangladesh";
                $data['main_content']=$this->load->view("pages/all_product_by_subcategory",$data,TRUE);
                $this->load->view('master',$data);
        }
        
        public function Category_Product(){
           // $category_id=NULL;
            $category_id=$this->input->post('category_id',TRUE);
            $category_id=($this->uri->segment(2)) ? $this->uri->segment(2) : $category_id;
            //Source Link---http://startcodeigniter.blogspot.com/2015/12/codeigniter-pagination-with-search.html

                $config = array();
                $config["base_url"] = base_url() ."Category-Product/".$category_id;
                $config["total_rows"] = $this->welcome_model->all_product_count_by_category_id($category_id);
                $config["per_page"] =1;
                $config["uri_segment"] =3;
                $config['next_link'] = '>';
                $config['prev_link'] = '<';
                $config['full_tag_open'] = '<div class="pagination-lg pagination-centered">';
                $config['full_tag_close'] = '</div>';
                $config['num_tag_open'] = '<li>';
                $config['num_tag_close'] = '</li>';
                $config['cur_tag_open'] = "<li class='disabled'><li class='active' ><a href='#'>";
                $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
                $config['next_tag_open'] = "<li>";
                $config['next_tagl_close'] = "</li>";
                $config['prev_tag_open'] = "<li>";
                $config['prev_tagl_close'] = "</li>";
				$config['first_tag_open'] = '<li>';
                $config['first_tag_close'] = '</li>';
                $config['last_tag_open'] = '<li>';
                $config['last_tag_close'] = '</li>';
                $config['first_link'] = '<<';
                $config['last_link'] = '>>';
                //$config['page_query_string'] = TRUE;
                $this->pagination->initialize($config);
                $page=($this->uri->segment(3)) ? $this->uri->segment(3) :0;
                $data["all_published_product"] = $this->welcome_model->all_published_product_by_category($config["per_page"], $page,$category_id);
                $data["links"] = $this->pagination->create_links();
                $data['category_name']=$this->welcome_model->category_name_by_id($category_id);
                $data['category_id']=$category_id;
                $data['title']=$data['category_name'] . " Product In Bangladesh";
                $data['main_content']=$this->load->view("pages/all_product_by_category",$data,TRUE);
                $this->load->view('master',$data);
        }
        
        
        
        
 
        
        
        
        
        
}
