<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome_model extends CI_Model{
    
    
    public function encryptstring($string){
        $secret_key='131905';
        $secret_iv='131905';
        $output=false;
        $encrypt_method="AES-256-CBC";
        $key=hash('sha256', $secret_key );
        $iv=substr(hash('sha256',$secret_iv),0,16);
        $output=base64_encode(openssl_encrypt($string,$encrypt_method,$key,0,$iv));
        return $output;
    }
    public function decryptstring($string) {
        $secret_key='131905';
        $secret_iv='131905';
        $output=false;
        $encrypt_method="AES-256-CBC";
        $key=hash('sha256', $secret_key );
        $iv=substr(hash('sha256',$secret_iv),0,16);
        $output = openssl_decrypt( base64_decode($string), $encrypt_method, $key, 0, $iv );
        return $output;
}
    

    public function all_published_product_info(){
        $this->db->select('*');
        $this->db->from('product');
        $this->db->where('product_publication_status',1);
        $this->db->order_by("product_id", "desc");
        $query_result=$this->db->get();
        $product_info=$query_result->result();
        return $product_info;
    }
    public function all_featured_published_product_info(){
        $this->db->select('*');
        $this->db->from('product');
        $this->db->where('product_publication_status',1);
        $this->db->where('is_featured',1);
        $this->db->order_by("product_id", "desc");
        $this->db->limit(4,0);
        $query_result=$this->db->get();
        $featured_product_info=$query_result->result();
        return $featured_product_info;
    }
    
     public function last_featured_published_product_info(){
        $this->db->select('*');
        $this->db->from('product');
        $this->db->where('product_publication_status',1);
        $this->db->where('is_featured',1);
        $this->db->order_by("product_id", "desc");
        $this->db->limit(4,4);
        $query_result=$this->db->get();
        $featured_product_info=$query_result->result();
        return $featured_product_info;
    }
    public function total_all_featured_published_product(){
        $this->db->select('*');
        $this->db->from('product');
        $this->db->where('product_publication_status',1);
        $this->db->where('is_featured',1);
        $query_result=$this->db->get()->num_rows();
        return $query_result;
    }
    
     public function all_join_product_by_product_id($product_id){
            $this->db->select('*');
            $this->db->from('product');
            $this->db->join('category','category.category_id =product.category_id');
            $this->db->join('sub_category','sub_category.sub_category_id =product.sub_category_id');
            $this->db->join('manufacture','manufacture.manufacture_id =product.manufacture_id');
            $this->db->where('product_id',$product_id);
            $query=$this->db->get();
            $query_result=$query->row();
            return $query_result;
        }
    
     public function total_product_count(){
        $this->db->select('*');
        $this->db->from('product');
        $this->db->where('product_publication_status',1);
        $query_result=$this->db->get()->num_rows();
        return $query_result;
    }
    
        public function limit_published_product(){
         $this->db->select('*');
        $this->db->from('product');
        $this->db->where('product_publication_status',1);
        $this->db->order_by("product_id", "desc");
        $this->db->limit(10,0);
        $query=$this->db->get();
        $query_result=$query->result();
        return $query_result;
   }
   
        public function all_published_product($limit, $start){
         $this->db->select('*');
        $this->db->from('product');
        $this->db->where('product_publication_status',1);
        $this->db->order_by("product_id", "desc");
        $this->db->limit($limit, $start);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
   
   
   public function subcategory_name_by_id($subcategory_id){
       $this->db->select('*');
       $this->db->from('sub_category');
       $this->db->where('sub_category_id',$subcategory_id);
       $query=$this->db->get();
       $result=$query->row();
      return $result->sub_category_name;
   }
   
   public function category_name_by_id($category_id){
       $this->db->select('*');
       $this->db->from('category');
       $this->db->where('category_id',$category_id);
       $query=$this->db->get();
       $result=$query->row();
      return $result->category_name;
   }
   
   public function all_product_count_by_category_id($category_id){
        $this->db->select('*');
        $this->db->from('product');
        $this->db->where('product_publication_status',1);
        $this->db->where('category_id',$category_id);
        $query_result=$this->db->get()->num_rows();
        return $query_result;
   }
   public function all_product_count_by_sub_category_id($sub_category_id){
        $this->db->select('*');
        $this->db->from('product');
        $this->db->where('product_publication_status',1);
        $this->db->where('sub_category_id',$sub_category_id);
        $query_result=$this->db->get()->num_rows();
        return $query_result;
   }
   
   public function all_published_product_by_subcategory($limit, $start,$subcategory_id){
         $this->db->select('*');
        $this->db->from('product');
        $this->db->where('sub_category_id',$subcategory_id);
        $this->db->where('product_publication_status',1);
        $this->db->order_by("product_id", "desc");
        $this->db->limit($limit, $start);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
   public function all_published_product_by_category($limit, $start,$category_id){
         $this->db->select('*');
        $this->db->from('product');
        $this->db->where('category_id',$category_id);
        $this->db->where('product_publication_status',1);
        $this->db->order_by("product_id", "desc");
        $this->db->limit($limit, $start);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}
?>