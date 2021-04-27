<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Super_admin_model extends CI_Model{
    
    public function save_category_info(){
        
        $data=array();
        $data['category_name']=$this->input->post('category_name',TRUE);
        $data['category_description']=$this->input->post('category_description',TRUE);
        $data['publication_status']=$this->input->post('publication_status',TRUE);
        $this->db->insert("category",$data);
        
    }
    public function select_all_published_category(){
        $this->db->select('*');
        $this->db->from('category');
        $this->db->where('publication_status',1);
        $query=$this->db->get();
        $catgory_info=$query->result();
        return $catgory_info;
    }
    public function select_all_category(){
        $this->db->select('*');
        $this->db->from('category');
        $this->db->order_by('category_id DESC');
        $query=$this->db->get();
        $all_catgory_info=$query->result();
        return $all_catgory_info;
    }
    public function select_all_category_by_id($category_id){
        $this->db->select('*');
        $this->db->from('category');
        $this->db->where('category_id',$category_id);
        $query=$this->db->get();
        $all_catgory_info_id=$query->row();
        return $all_catgory_info_id;
    }
    public function unpublish_category_info($unpublishcategory_id){
        $this->db->set('publication_status',0);
        $this->db->where('category_id',$unpublishcategory_id);
        $this->db->update('category');
        redirect('/ManageCategory');
    }
    public function publish_category_info($publishcategory_id){
        $this->db->set('publication_status',1);
        $this->db->where('category_id',$publishcategory_id);
        $this->db->update('category');
        redirect('/ManageCategory');
    }
    public function delete_category_info($deletecategory_id){
        $this->db->where('category_id',$deletecategory_id);
        $this->db->delete('category');
        redirect('/ManageCategory');
    }
    
    public function update_category_info($category_id){
        $this->db->set('category_name',$this->input->post('category_name',TRUE));
        $this->db->set('category_description',$this->input->post('category_description',TRUE));
         $this->db->where('category_id',$category_id); 
         $this->db->update('category');
         $sdata=array();
         $sdata['message']="Category Updated SuccessFully";
         $this->session->set_flashdata($sdata);
         redirect('/ManageCategory');
    }
    public function save_sub_category_info(){
        $data=array();
        $data['category_id']=$this->input->post('category_id',TRUE);
        $data['sub_category_name']=$this->input->post('sub_category_name',TRUE);
        $data['sub_category_description']=$this->input->post('sub_category_description',TRUE);
        $data['publication_status']=$this->input->post('publication_status',TRUE);
        $this->db->insert("sub_category",$data);
    }
     public function select_all_published_subcategory_by_category_id($category_id){
        $this->db->select('*');
        $this->db->from('sub_category');
        $this->db->where('publication_status',1);
        $this->db->where('category_id',$category_id);
        $query=$this->db->get();
        $subcatgory_info=$query->result();
        return $subcatgory_info;
    }
    public function select_all_published_sub_category(){
        $this->db->select('*');
        $this->db->from('sub_category');
        $this->db->where('publication_status',1);
        $query=$this->db->get();
        $sub_catgory_info=$query->result();
        return $sub_catgory_info;
    }
    public function select_all_join_category(){
        $this->db->select('sub_category.*,category.category_name');
        $this->db->from('sub_category');
       $this->db->join('category','category.category_id =sub_category.category_id');
        $query=$this->db->get();
        $all_sub_catgory_info=$query->result();
        return $all_sub_catgory_info;
    }
    public function unpublish_sub_category_info($unpublishsubcategory_id){
        $this->db->set('publication_status',0);
        $this->db->where('sub_category_id',$unpublishsubcategory_id);
        $this->db->update('sub_category');
        redirect('/ManageSubcategory');
    }
    public function publish_sub_category_info($publishsubcategory_id){
        $this->db->set('publication_status',1);
        $this->db->where('sub_category_id',$publishsubcategory_id);
        $this->db->update('sub_category');
        redirect('/ManageSubcategory');
    }
        public function delete_sub_category_info($deletesubcategory_id){
        $this->db->where('sub_category_id',$deletesubcategory_id);
        $this->db->delete('sub_category');
        redirect('/ManageSubcategory');
    }
    public function select_all_subcategory_by_id($subcategory_id){
        $this->db->select('sub_category.*,category.category_id,category.category_name');
        $this->db->from('sub_category');
        $this->db->join('category','category.category_id =sub_category.category_id');
        $this->db->where('sub_category_id',$subcategory_id);
        $query=$this->db->get();
        $subcatgory_info=$query->row();
        return $subcatgory_info;
    }
    public function update_subcategory_info($category_id){
        $this->db->set('sub_category_name',$this->input->post('sub_category_name',TRUE));
        $this->db->set('sub_category_description',$this->input->post('sub_category_description',TRUE));
        $this->db->set('category_id',$this->input->post('category_id',TRUE));
         $this->db->where('sub_category_id',$category_id); 
         $this->db->update('sub_category');
         $sdata=array();
         $sdata['message']="Sub Category Updated SuccessFully";
         $this->session->set_flashdata($sdata);
         redirect('/ManageSubcategory');
    }
    public function save_manufacture_info(){
        $data=array();
        $data['manufacture_name']=$this->input->post('manufacture_name',TRUE);
        $data['manufacture_description']=$this->input->post('manufacture_description',TRUE);
        $data['manufacture_publication_status']=$this->input->post('manufacture_publication_status',TRUE);
        $this->db->insert("manufacture",$data);
    }
    
    public function select_all_manufacture(){
        $this->db->select('*');
        $this->db->from('manufacture');
        $this->db->order_by('manufacture_id DESC');
        $query=$this->db->get();
        $all_manufacture_info=$query->result();
        return $all_manufacture_info;
    }
      public function select_all_published_manufacture(){
        $this->db->select('*');
        $this->db->from('manufacture');
        $this->db->where('manufacture_publication_status',1);
        $query=$this->db->get();
        $manufacture_info=$query->result();
        return $manufacture_info;
    }
        public function unpublish_manufacture_info($manufacture_id){
        $this->db->set('manufacture_publication_status',0);
        $this->db->where('manufacture_id',$manufacture_id);
        $this->db->update('manufacture');
        redirect('/ManageManufacture');
    }
    public function publish_manufacture_info($manufacture_id){
        $this->db->set('manufacture_publication_status',1);
        $this->db->where('manufacture_id',$manufacture_id);
        $this->db->update('manufacture');
        redirect('/ManageManufacture');
    }
    public function delete_manufacture_info($deletemanufacture_id){
        $this->db->where('manufacture_id',$deletemanufacture_id);
        $this->db->delete('manufacture');
        redirect('/ManageManufacture');
    }
    
    public function save_product_info(){
        $data=array();
        $data['product_code']= rand(100000,999999);
        $data['product_name']=$this->input->post('product_name',TRUE);
        $data['category_id']=$this->input->post('category_id',TRUE);
        $data['sub_category_id']=$this->input->post('sub_category_id',TRUE);
        $data['manufacture_id']=$this->input->post('manufacture_id',TRUE);
        $data['product_short_description']=$this->input->post('product_short_description',TRUE);
        $data['product_long_description']=$this->input->post('product_long_description',TRUE);
        $data['product_price']=$this->input->post('product_price',TRUE);
        $data['product_new_price']=$this->input->post('product_new_price',TRUE);
        $data['product_quantity']=$this->input->post('product_quantity',TRUE);
        $is_featured=$this->input->post('featured',TRUE);
        if($is_featured=='on'){
            $data['is_featured']=1;
        }else{
            $data['is_featured']=0;
        }
                $sdata=array();
                $config['upload_path']          = 'product_image/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 10000;
                $config['max_width']            = 1200;
                $config['max_height']           = 1000;
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('product_image'))
                {
                       echo  $error = $this->upload->display_errors();
                }
                else
                {
                $sdata =$this->upload->data();
               $data['product_image']=$config['upload_path'].$sdata['file_name'];
                }
            $data['product_publication_status']=$this->input->post('product_publication_status',TRUE);     
            $this->db->insert('product',$data);    
        }
        
        public function select_all_join_product_info(){
            $this->db->select('*');
            $this->db->from('product');
            $this->db->join('category','category.category_id =product.category_id');
            $this->db->join('sub_category','sub_category.sub_category_id =product.sub_category_id');
            $this->db->order_by('product_id','desc');
            $query=$this->db->get();
            $query_result=$query->result();
            return $query_result;
        }
        public function select_all_join_product_by_id($product_id){
            $this->db->select('*');
            $this->db->from('product');
            $this->db->join('category','category.category_id =product.category_id');
            $this->db->join('sub_category','sub_category.sub_category_id =product.sub_category_id');
            $this->db->where('product_id',$product_id);
            $query=$this->db->get();
            $query_result=$query->row();
            return $query_result;
        }
    public function update_product_info(){
        $data=array();
        $data['product_id']=$this->input->post('product_id',TRUE);
        $data['product_name']=$this->input->post('product_name',TRUE);
        $data['category_id']=$this->input->post('category_id',TRUE);
        $data['sub_category_id']=$this->input->post('sub_category_id',TRUE);
        $data['manufacture_id']=$this->input->post('manufacture_id',TRUE);
        $data['product_short_description']=$this->input->post('product_short_description',TRUE);
        $data['product_long_description']=$this->input->post('product_long_description',FALSE);
        $data['product_price']=$this->input->post('product_price',TRUE);
        $data['product_new_price']=$this->input->post('product_new_price',TRUE);
        $data['product_quantity']=$this->input->post('product_quantity',TRUE);
        $data['product_publication_status']=$this->input->post('product_publication_status',TRUE);     
        $is_featured=$this->input->post('featured',TRUE);
        if($is_featured=='on'){
            $data['is_featured']=1;
        }else{
            $data['is_featured']=0;
        }
        $checkimage=$_FILES['product_image']['name'];
                if(!empty($checkimage)){
                $sdata=array();
                $config['upload_path']          = 'product_image/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 10000;
                $config['max_width']            = 1200;
                $config['max_height']           = 1000;
                
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('product_image'))
                {
                     
                   echo $error=$this->upload->display_errors();
                     
                }
                else
                {
                $sdata =$this->upload->data();
                $data['product_image']=$config['upload_path'].$sdata['file_name'];
                $data['old_picture']=$this->input->post('old_product_image',TRUE);
                $path=$data['old_picture'];
                unlink($path);
                }
                }else{
                $data['product_image']=$this->input->post('old_product_image',TRUE);
                }
                if(!empty($data['product_image'])){
                $this->db->set('product_name',$data['product_name']);
                $this->db->set('category_id',$data['category_id']);
                $this->db->set('sub_category_id',$data['sub_category_id']);
                $this->db->set('manufacture_id',$data['manufacture_id']);
                $this->db->set('product_short_description',$data['product_short_description']);
                $this->db->set('product_long_description',$data['product_long_description']);
                $this->db->set('product_price',$data['product_price']);
                $this->db->set('product_new_price',$data['product_new_price']);
                $this->db->set('product_quantity',$data['product_quantity']);
                $this->db->set('is_featured',$data['is_featured']);
                $this->db->set('product_publication_status',$data['product_publication_status']);
                $this->db->set('product_image',$data['product_image']);
                $this->db->where('product_id',$data['product_id']); 
                 $this->db->update('product'); 
                 return  TRUE;
                }
           
    }
    
    public function delete_product_info($deleteproduct_id){
        $this->db->where('product_id',$deleteproduct_id);
        $this->db->delete('product');
        redirect('/Manageproduct');
    }


    
     public function select_all_join_order_info(){
            $this->db->select('*');
            $this->db->from('product_order');
            $this->db->join('shipping','shipping.shipping_id =product_order.shipping_id','left');
            $this->db->join('cod_payment','cod_payment.cod_payment_id =product_order.cod_payment_id','left');
            $this->db->join('bkash_payment','bkash_payment.bkash_payment_id =product_order.bkash_payment_id','left');
            $this->db->where('order_status','pending');
            $this->db->order_by('order_id','desc');
            $query=$this->db->get();
            $query_result=$query->result();
            return $query_result;
        }
    
     public function select_all_join_confirm_order_info(){
            $this->db->select('*');
            $this->db->from('product_order');
            $this->db->join('cod_payment','cod_payment.cod_payment_id =product_order.cod_payment_id','left');
            $this->db->join('bkash_payment','bkash_payment.bkash_payment_id =product_order.bkash_payment_id','left');
            $this->db->where('order_status!=','pending');
            $this->db->order_by('order_id','desc');
            $query=$this->db->get();
            $query_result=$query->result();
            return $query_result;
        }
     public function select_all_join_confirm_bkash_info_by_order_id($order_id){
            $this->db->select('*');
            $this->db->from('product_order');
            $this->db->join('customer','customer.customer_id =product_order.customer_id','left');
            $this->db->join('bkash_payment','bkash_payment.bkash_payment_id =product_order.bkash_payment_id','left');
            $this->db->where('order_id',$order_id);
            $query=$this->db->get();
            $query_result=$query->row();
            return $query_result;
        }
        
       public function confirm_order_information($order_id){
        $this->db->set('order_status','processing');
        $this->db->where('order_id',$order_id);
        return $this->db->update('product_order');
        
    } 
    
   public function change_bkash_payment($data){
       $this->db->set('bkash_payment_status',$data['bkash_payment_status']);
       $this->db->where('bkash_payment_id',$data['bkash_payment_id']);
      return $this->db->update('bkash_payment');
   }
        
       public function select_all_join_order_view_by_order_id($order_id){
            $this->db->select('*');
            $this->db->from('product_order');
            $this->db->join('customer','customer.customer_id =product_order.customer_id','left');
            $this->db->join('shipping','shipping.shipping_id =product_order.shipping_id','left');
            $this->db->join('cod_payment','cod_payment.cod_payment_id =product_order.cod_payment_id','left');
            $this->db->join('bkash_payment','bkash_payment.bkash_payment_id =product_order.bkash_payment_id','left');
            $this->db->where('order_id',$order_id);
            $query=$this->db->get();
            $query_result=$query->row();
            return $query_result;
        }      
       public function select_all_order_details_by_order_id($order_id){
            $this->db->select('*');
            $this->db->from('order_details');
            $this->db->where('order_id',$order_id);
            $query=$this->db->get();
            $query_result=$query->result();
            return $query_result;
        }      
        
         public function select_join_order_info_status($order_id){
            $this->db->select('*');
            $this->db->from('product_order');
            $this->db->join('customer','customer.customer_id =product_order.customer_id');
            $this->db->where('order_id',$order_id);
            $query=$this->db->get();
            $query_result=$query->row();
            return $query_result;
        }
        public function change_order_status_success($data){
       $this->db->set('order_status',$data['order_status']);
       $this->db->where('order_id',$data['order_id']);
      return $this->db->update('product_order');
   } 
   
   public function count_all_pending_order(){
       $this->db->select('*');
        $this->db->from('product_order');
        $this->db->where('order_status','pending');
        $query_result=$this->db->get()->num_rows();
        return $query_result;
   }
   public function count_all_processing_order(){
       $this->db->select('*');
        $this->db->from('product_order');
        $this->db->where('order_status','processing');
        $query_result=$this->db->get()->num_rows();
        return $query_result;
   }
   public function count_all_shipping_order(){
       $this->db->select('*');
        $this->db->from('product_order');
        $this->db->where('order_status','shipping');
        $query_result=$this->db->get()->num_rows();
        return $query_result;
   }
   public function count_all_complete_order(){
       $this->db->select('*');
        $this->db->from('product_order');
        $this->db->where('order_status','complete');
        $query_result=$this->db->get()->num_rows();
        return $query_result;
   }
   
   public function count_all_order(){
       $this->db->select('*');
        $this->db->from('product_order');
        $query_result=$this->db->get()->num_rows();
        return $query_result;
   }
   
   
        
        
        
        
        
        
        
        
  
}
?>