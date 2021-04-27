<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
class Super_admin extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
       // $this->load->Model('super_admin_model');
        $data=array();
        if(!$this->session->userdata('admin_id')){
            redirect('admin');
        }
        //$this->load->model('admin_model');
    }
    public function index(){
        $data['admin_main_content']=$this->load->view('admin/pages/dashboard','',TRUE);
        $this->load->view("admin/admin_master",$data);
    }
    public function Addcategory(){
        $data['admin_main_content']=$this->load->view('admin/pages/addcategory','',TRUE);
        $this->load->view("admin/admin_master",$data);
    }
    public function Savecategory(){
        $sdata=array();
        if(empty($this->input->post())){
        $sdata['message']="<span style='color:red;font-weight:bold;'>Please Fill Out All Field</span>";
        $this->session->set_flashdata($sdata);
        redirect('/Addcategory');
        }else{
        $this->super_admin_model->save_category_info();
        $sdata['message']="Save Category Information SuccessFully";
        $this->session->set_flashdata($sdata);
        redirect('/Addcategory');
        }
        
    }
     public function Managecategory(){
         $data['category_info']=$this->super_admin_model->select_all_category();
        $data['admin_main_content']=$this->load->view('admin/pages/manage_category',$data,TRUE);
        $this->load->view("admin/admin_master",$data);
    }
    public function Unpublish_Category($unpublishcategory_id){
        $this->super_admin_model->unpublish_category_info($unpublishcategory_id);
    }
    public function Publish_Category($publishcategory_id){
        $this->super_admin_model->publish_category_info($publishcategory_id);
    }
    
    public function Delete_Category($deletecategory_id){
        $this->super_admin_model->delete_category_info($deletecategory_id);
    }
    public function Edit_Category($category_id){
        $data['all_category_by_id']=$this->super_admin_model->select_all_category_by_id($category_id);
        $this->load->view('admin/edit/category_info_edit',$data);
    }
    public function update_category_info($category_id){
        $this->super_admin_model->update_category_info($category_id);
    }
    

    public function Addsubcategory(){
        $data['publish_category']=$this->super_admin_model->select_all_published_category();
        $data['admin_main_content']=$this->load->view('admin/pages/addsubcategory',$data,TRUE);
        $this->load->view("admin/admin_master",$data);
    }

    public function Savesubcategory(){
        $sdata=array();
        if(empty($this->input->post())){
        $sdata['message']="<span style='color:red;font-weight:bold;'>Please Fill Out All Field</span>";
        $this->session->set_flashdata($sdata);
        redirect('/AddSubCategory');
        }else{
        $this->super_admin_model->save_sub_category_info();
        $sdata['message']="Save Sub Category Information SuccessFully";
        $this->session->set_flashdata($sdata);
        redirect('/AddSubCategory');
        }
    }
      public function Managesubcategory(){
         $data['all_category_info']=$this->super_admin_model->select_all_join_category();
        $data['admin_main_content']=$this->load->view('admin/pages/manage_subcategory',$data,TRUE);
        $this->load->view("admin/admin_master",$data);
    }
    
    public function Unpublish_Subcategory($unpublishsubcategory_id){
        $this->super_admin_model->unpublish_sub_category_info($unpublishsubcategory_id);
    }
    public function Publish_Subcategory($publishsubcategory_id){
        $this->super_admin_model->publish_sub_category_info($publishsubcategory_id);
    }
    public function Delete_Subcategory($deletesubcategory_id){
        $this->super_admin_model->delete_sub_category_info($deletesubcategory_id);
    }
     public function Edit_Subcategory($subcategory_id){
        $data['all_sub_category_by_id']=$this->super_admin_model->select_all_subcategory_by_id($subcategory_id);
        $this->load->view('admin/edit/sub_category_info_edit',$data);
    }
    public function update_subcategory_info($category_id){
        $this->super_admin_model->update_subcategory_info($category_id);
    }
    public function Addmanufacture(){
        $data['admin_main_content']=$this->load->view('admin/pages/addmanufacture','',TRUE);
        $this->load->view('admin/admin_master',$data);
        
    }
    public function Savemanufacture(){
         $sdata=array();
        if(empty($this->input->post())){
        $sdata['message']="<span style='color:red;font-weight:bold;'>Please Fill Out All Field</span>";
        $this->session->set_flashdata($sdata);
        redirect('/AddManufacture');
        }else{
        $this->super_admin_model->save_manufacture_info();
        $sdata['message']="Save Manufacture Information SuccessFully";
        $this->session->set_flashdata($sdata);
        redirect('/AddManufacture');
        }
    }
    public function Managemanufacture(){
        $data['manufacture_info']=$this->super_admin_model->select_all_manufacture();
        $data['admin_main_content']=$this->load->view('admin/pages/manage_manufacture',$data,TRUE);
        $this->load->view('admin/admin_master',$data);
      }
     public function Unpublish_Manufacture($manufacture_id){
        $this->super_admin_model->unpublish_manufacture_info($manufacture_id);
    }
    public function Publish_Manufacture($manufacture_id){
        $this->super_admin_model->publish_manufacture_info($manufacture_id);
    }
    public function Delete_Manufacture($deletemanufacture_id){
        $this->super_admin_model->delete_manufacture_info($deletemanufacture_id);
    }
    
    public function dependent_publish_subcategory($category_id){
        $subcategory_data=$this->super_admin_model->select_all_published_subcategory_by_category_id($category_id);
        if($subcategory_data){
        foreach ($subcategory_data as $category_result) {
            echo '<option value="'.$category_result->sub_category_id .'">'.$category_result->sub_category_name.'</option>';
        }
        }else{
            echo  '<option value="">No Sub Category Found</option>';
        }
    }
    public function Addproduct(){
        $data['publish_category']=$this->super_admin_model->select_all_published_category();
        $data['publish_manufacture']=$this->super_admin_model->select_all_published_manufacture();
       $data['admin_main_content']=$this->load->view('admin/pages/addproduct',$data,TRUE);
        $this->load->view('admin/admin_master',$data);
    }
    public function Save_Product(){

        $sdata=array();
        if(empty($this->input->post())){
        $sdata['message']="<span style='color:red;font-weight:bold;'>Please Fill Out All Field</span>";
        $this->session->set_flashdata($sdata);
        redirect('/Addproduct');
        }else{
            $this->super_admin_model->save_product_info();
           $sdata['message']="Save Product Information SuccessFully";
            $this->session->set_flashdata($sdata);
            redirect('/Addproduct');   
        }
    }
    
    public function Manageproduct(){
         $data['product_info']=$this->super_admin_model->select_all_join_product_info();
        $data['admin_main_content']=$this->load->view('admin/pages/manage_product',$data,TRUE);
        $this->load->view("admin/admin_master",$data);
    }


    public function Delete_Product($deleteproduct_id){
        $this->super_admin_model->delete_product_info($deleteproduct_id);
    }

    public function Edit_product($product_id){
        $data['all_join_product_by_id']=$this->super_admin_model->select_all_join_product_by_id($product_id);
        $data['publish_category']=$this->super_admin_model->select_all_published_category();
        $data['publish_manufacture']=$this->super_admin_model->select_all_published_manufacture();     
        $data['admin_main_content']=$this->load->view('admin/edit/product_info_edit',$data,TRUE);
        $this->load->view("admin/admin_master",$data);
    }
    public function Update_Product(){
        $update_product=$this->super_admin_model->update_product_info();
        if($update_product){
        $sdata=array();
        $sdata['message']="Update Product Information SuccessFully";
            $this->session->set_flashdata($sdata);
            redirect('/Manageproduct');
        }else{
            echo $update_product;
        }
        }

        public function pending_order(){
          $data['order_info']=$this->super_admin_model->select_all_join_order_info();
          $data['admin_main_content']=$this->load->view('admin/pages/manage_order',$data,TRUE);
          $this->load->view('admin/admin_master',$data);
    } 
        public function confirm_order_info(){
          $data['order_info']=$this->super_admin_model->select_all_join_confirm_order_info();
          $data['admin_main_content']=$this->load->view('admin/pages/confirm_order_info',$data,TRUE);
          $this->load->view('admin/admin_master',$data);
        } 
    
    public function confirm_order($order_id){
       $confirm_order= $this->super_admin_model->confirm_order_information($order_id);
       if($confirm_order){
           $fdata=array();
           $fdata['message']="Order Confirmation Success.Check All Confirm Order List For Details.";
           $this->session->set_flashdata($fdata);
           redirect('/Pending-Order');
       }
    }
        
      public function bkash_payment_status($order_id){
          if(empty($order_id)){
              redirect('/Pending-Order');
          }else{
          $data['bkash_payment_info']=$this->super_admin_model->select_all_join_confirm_bkash_info_by_order_id($order_id);
          $data['admin_main_content']=$this->load->view('admin/pages/bkash_payment_status',$data,TRUE);
          $this->load->view('admin/admin_master',$data);
          }
    }
    public function change_bkash_payment_status(){
        $data['bkash_payment_id']=$this->input->post('bkash_payment_id',TRUE);
        $data['bkash_payment_status']=$this->input->post('payment_status',TRUE);
        $data['order_id']=$this->input->post('order_id',TRUE);
       $bkash_status=$this->super_admin_model->change_bkash_payment($data);
       if($bkash_status){
           $fdata=array();
           $fdata['message']="Bkash Payment Status Change Success";
           $this->session->set_flashdata($fdata);
           redirect('/Confirm-Payment/'.$data['order_id']);
       }
    }
    
    public function order_view_order_id($order_id){
          if(empty($order_id)){
              redirect('/Confirm-Order');
          }else{
          $data['order_info']=$this->super_admin_model->select_all_join_order_view_by_order_id($order_id);
          $data['order_details']=$this->super_admin_model->select_all_order_details_by_order_id($order_id);
          if($data['order_info']->cod_payment_id==0){
              $data['payment_method']=$data['order_info']->bkash_payment_method;
              $data['payment_status']=$data['order_info']->bkash_payment_status;
          }
          elseif($data['order_info']->bkash_payment_id==0){
               $data['payment_method']=$data['order_info']->cod_payment_method;
               $data['payment_status']=$data['order_info']->cod_payment_status;
          }
          $data['admin_main_content']=$this->load->view('admin/pages/order_info_order_id',$data,TRUE);
          $this->load->view('admin/admin_master',$data);
          }
    }
    
     public function order_status($order_id){
          if(empty($order_id)){
              redirect('/Confirm-Order');
          }else{
          $data['order_info_status']=$this->super_admin_model->select_join_order_info_status($order_id);
          $data['admin_main_content']=$this->load->view('admin/pages/order_status_info',$data,TRUE);
          $this->load->view('admin/admin_master',$data);
          }
    }
    
     public function change_order_status_info(){
        $data['order_status']=$this->input->post('order_status',TRUE);
        $data['order_id']=$this->input->post('order_id',TRUE);
       $order_status=$this->super_admin_model->change_order_status_success($data);
       if($order_status){
           $fdata=array();
           $fdata['message']="Order Status Change Success";
           $this->session->set_flashdata($fdata);
           redirect('/Order-Status/'.$data['order_id']);
       }
    }
    
    
    
    
    
    
    
  
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    public function logout(){
         $session_array=array('admin_id','username','username','fullname','access_level','activation_status');
            $this->session->unset_userdata($session_array);
            $logdata=array();
            $logdata['message']="You Are SuccessFully Logout";
            $this->session->set_flashdata($logdata);
            redirect('/admin');
    }
    
    
}
?>