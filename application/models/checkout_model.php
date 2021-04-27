<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout_model extends CI_Model{
    
    public function check_admin_login_info($data){
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where('username',$data['username']);
        $this->db->where('password',md5($data['password']));
        $qresult=$this->db->get();
        $has=$qresult->num_rows();
        if($has==1){
        $result=$qresult->row();
        return $result;
        }
    }
     public function save_shipping_info($data){
       $this->db->insert('shipping',$data);
       $shipping_id=$this->db->insert_id();
       return $shipping_id;
    }
     public function save_cod_payment_info($data){
       $this->db->insert('cod_payment',$data);
       $cod_payment_id=$this->db->insert_id();
       return $cod_payment_id;
    }
     public function save_bkash_payment_info($data){
       $this->db->insert('bkash_payment',$data);
       $bkash_payment_id=$this->db->insert_id();
       return $bkash_payment_id;
    }
     public function save_order_info($data){
       $this->db->insert('product_order',$data);
       $order_id=$this->db->insert_id();
       return $order_id;
    }
     public function save_order_details_info($data){
       $this->db->insert('order_details',$data);
       $order_details_id=$this->db->insert_id();
       return $order_details_id;
    }

    
    















































    
}