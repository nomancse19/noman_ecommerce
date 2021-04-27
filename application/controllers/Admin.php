<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $data=array();
        if($this->session->userdata('admin_id')){
         redirect('dashboard');
          }
        $this->load->model('admin_model');
    }
    public function index(){
        $this->load->view("admin/admin_login");
    }
    
    public function admin_login_check(){
        $data['username']=$this->input->post('username');
        $data['password']=$this->input->post('password');
        $found_admin=$this->admin_model->check_admin_login_info($data);
        if($found_admin){
            $sdata=array();
            $sdata['admin_id']=$found_admin->admin_id;
            $sdata['username']=$found_admin->username;
            $sdata['fullname']=$found_admin->fullname;
            $sdata['access_level']=$found_admin->access_level;
            $sdata['activation_status']=$found_admin->activation_status;
            $this->session->set_userdata($sdata);
            redirect('dashboard');
        }else{
            $sdata=array();
            $sdata['message']="Your Username Or Password Not Matching";
            $this->session->set_flashdata($sdata);
            redirect("admin");
        }
        
    }
    
    
    
    
    
    
    
    
    
    
    
    
}
?>