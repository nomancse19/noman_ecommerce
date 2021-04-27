<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class customer_model extends CI_Model{
    
    public function check_customer_login_info($data){
        $this->db->select('*');
        $this->db->from('customer');
        $this->db->where('customer_email_address',$data['customer_email_address']);
        $this->db->where('customer_password',$data['customer_password']);
        $this->db->where('customer_activation_status',1);
        $qresult=$this->db->get();
        $has=$qresult->num_rows();
        if($has==1){
        $result=$qresult->row();
        return $result;
        }
    }
    public function select_shipping_by_customer_id($customer_id){
         $this->db->select('*');
        $this->db->from('shipping');
        $this->db->where('customer_id',$customer_id);
        $qresult=$this->db->get();
        $result=$qresult->row();
        return $result;
    }
    public function save_customer_info($data){
       $this->db->insert('customer',$data);
       $customer_id=$this->db->insert_id();
       return $customer_id;
    }
    public function check_customer_email($customer_email_address){
        $this->db->select('*');
        $this->db->from('customer');
        $this->db->where('customer_email_address',$customer_email_address);
        $query=$this->db->get();
        $result=$query->row();
        return $result;
    }
    public function all_customer_info_customer_id($customer_id){
        $this->db->select('*');
        $this->db->from('customer');
        $this->db->where('customer_activation_status',1);
        $this->db->where('customer_id',$customer_id);
        $query=$this->db->get();
        $result=$query->row();
        return $result;
    }
    public function all_shipping_info_customer_id($shipping_id){
        $this->db->select('*');
        $this->db->from('shipping');
        $this->db->where('shipping_id',$shipping_id);
        $query=$this->db->get();
        $result=$query->row();
        return $result;
    }
    
    public function update_forget_password_customerpass($udata){
          $this->db->set('customer_password',md5($udata['customer_password']));
          $this->db->where('customer_id',$udata['customer_id']); 
          return $this->db->update('customer');
    }
     public function all_order_by_customer_id($customer_id){
        $this->db->select('*');
        $this->db->from('product_order');
        $this->db->where('customer_id',$customer_id);
        $this->db->order_by('order_id','DESC');
        $qresult=$this->db->get();
        $result=$qresult->result();
        return $result;
    }
    
}
