<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $data=array();
         if($this->session->userdata('check_in_time')+600<time()){
            $session_array=array('check_customer_id','verifysuccess','check_customer_first_name','check_customer_last_name','check_customer_email_address','check_customer_mobile_number','verification_code','check_in_time');
            $this->session->unset_userdata($session_array); 
        }
    }
    public function customer_registration(){
        if(!$this->session->userdata('customer_id')){
        $data['title']="Create New Customer";
        $data['main_content']=$this->load->view("pages/create_customer",$data,TRUE);
        $this->load->view('master',$data);
        }else{
            redirect('/Shipping-address');
        }
    }
    public function customer_address(){
       if($this->session->userdata('customer_id') && $this->session->userdata('shipping_id') && $this->cart->total()!=0){
           redirect('/PreOrder-Details');
       }
       elseif(!$this->session->userdata('customer_id')){
           redirect('Create-Customer');
        }
        elseif($this->session->userdata('customer_id') && $this->session->userdata('shipping_id')&& $this->cart->total()==0){
            redirect('/home'); 
        }
       else{
        $data['title']="Create Customer Shipping Address";
        $data['main_content']=$this->load->view("pages/customer_address",$data,TRUE);
        $this->load->view('master',$data);
       }
    }
    public function save_customer(){
        $customer_email_address=$this->input->post('customer_email_address',TRUE);
        $check_email=$this->customer_model->check_customer_email($customer_email_address);
       if($check_email){
           $fdata=array();
           $fdata['errormessage']="Your Email Allready Registered in Our System.Please Sign In Account";
           $this->session->set_flashdata($fdata);
           redirect('/Create-Customer');
           }else{
           $data['customer_first_name']=$this->input->post('customer_first_name',TRUE);
           $data['customer_last_name']=$this->input->post('customer_last_name',TRUE);
           $data['customer_mobile_number']=$this->input->post('customer_mobile_number',TRUE);
           $data['customer_email_address']=$this->input->post('customer_email_address',TRUE);
           $data['customer_password']=md5($this->input->post('customer_password',TRUE));
           $customer_id=$this->customer_model->save_customer_info($data);
           if($customer_id){
               $sdata=array();
               $sdata['customer_id']=$customer_id;
               $this->session->set_userdata($sdata);
               $fdata=array();
               $fdata['successmessage']="Your Registration Successfully Completed,Now You Fill Up Your Address or Shipping Address.";
               $this->session->set_flashdata($fdata);
               redirect('/Shipping-address');
           }
       }
        
    }
    
    
       public function customer_login(){
        if(!$this->session->userdata('customer_id')){
        $data['title']="Customer Login Options";
        $data['main_content']=$this->load->view("pages/customer_login",$data,TRUE);
        $this->load->view('master',$data);
        }else{
            redirect('/Shipping-address');
        }
    }
    
    public function customer_login_check(){
         $data['customer_email_address']=$this->input->post('customer_email_address',TRUE);
         $data['customer_password']=md5($this->input->post('customer_password',TRUE));
         $found_customer=$this->customer_model->check_customer_login_info($data);
         if($found_customer){
             $customer_id=$found_customer->customer_id;
             $shipping_id=$this->customer_model->select_shipping_by_customer_id($customer_id)->shipping_id;
             $sdata=array();
             $sdata['customer_id']=$customer_id;
             $sdata['shipping_id']=$shipping_id;
             $this->session->set_userdata($sdata);
             if($this->cart->total()!=0){    
             echo '<script type="text/javascript">alert("Success! Your Are SuccessFully Login Your Account");</script>';
            redirect('/PreOrder-Details','refresh');
             }else{
                 redirect('/home');
             }
         }else{
            $fdata=array();
            $fdata['errormessage']="Your Email Address Or Password Not Correct.Please Try Again";
            $this->session->set_flashdata($fdata);
            redirect('Login');
            
         }
         
    }
    
         public function forget_password(){
            if(!$this->session->userdata('customer_id')){
        if(!$this->session->userdata('check_customer_id')){
        $data['title']="Forget Password Options";
        $data['main_content']=$this->load->view("pages/Forgetpassword",$data,TRUE);
        $this->load->view('master',$data);
        }else{
            redirect('/Verifycode');
        }
       }else{
           redirect('/home');
       }
    }
    
    
    public function customer_email_check(){
        $customer_email_address=$this->input->post('customer_email_address',TRUE);
      if(!empty($customer_email_address)){
        $found_customer=$this->customer_model->check_customer_email($customer_email_address);
        if($found_customer){
            $c_data=array();
            $c_data['check_customer_id']=$found_customer->customer_id;
            $c_data['check_customer_first_name']=$found_customer->customer_first_name;
            $c_data['check_customer_last_name']=$found_customer->customer_last_name;
            $c_data['check_customer_email_address']=$found_customer->customer_email_address;
            $c_data['check_customer_mobile_number']=$found_customer->customer_mobile_number;
            $this->session->set_userdata($c_data);
            redirect('customer/send_email_verification');
           
        }else{
            $fdata=array();
            $fdata['errormessage']="Your Email Not Found in Our System";
            $this->session->set_flashdata($fdata);
            redirect('/Forgetpassword');
        }
      }else{
          redirect('/Forgetpassword');
      }
    }
    
    public function send_email_verification(){
        $this->load->library('email');
            $config = array(
                'protocol'  => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_port' => 465,
                'smtp_user' => 'noman.cse19@gmail.com',
                'smtp_pass' => '131905213609',
                'mailtype'  => 'html',
                'charset'   => 'utf-8'
            );
            $this->email->initialize($config);
            $this->email->set_mailtype("html");
            $this->email->set_newline("\r\n");
             $c_data=array();
             $c_data['verification_code']=rand(100000,999999);
             $c_data['check_in_time']=time();
             $this->session->set_userdata($c_data);
             
             $check_customer_first_name=$this->session->userdata('check_customer_first_name');
             $check_customer_last_name=$this->session->userdata('check_customer_last_name');
             $check_customer_email_address=$this->session->userdata('check_customer_email_address');
             $check_customer_first_name=$this->session->userdata('check_customer_first_name');
             $verification_code=$this->session->userdata('verification_code');
             $msg='<body>
                <div class="bodycontainer">
                <div style="overflow: hidden;">Hello '.$check_customer_first_name.' '.$check_customer_last_name.' Thank You For Using Beauty Product Shop!<br />
                <br />
                Your account Forget Password Success. Now You Using Following Verification Code,<br> For Reset New Password. by visiting our website or 
                <br>at the following URL:<a href="'.base_url().'Verifycode">'.base_url().'Verifycode</a>
                
                <h4> Verification Code : '.$verification_code.'</h4>
                <p>This Verification Code Remain For Verify Only 10 Miniute.Please Complete,<br> Your Password Reset Using This Verification Code Within 10 Miniute.</p>
                <br />
                <br />
                Thanks,<br />
                Administrator<br />
                The Beauty Product Shop
                </div>
                </div>
                </body>';
             $this->email->to($check_customer_email_address);
            $this->email->from('noman.cse19@gmail.com','noman-IT.com');
            $this->email->subject('Forget Password Verification Code');
            $this->email->message($msg);
            $send=$this->email->send();
            if($send){
                redirect('Verifycode');
            }else{
                  $f_data=array();
            $f_data['errormessage']="Verification Code Not Sent To Email For Technical Problem..Please Try again.";
            $this->session->set_flashdata($f_data);
            redirect('/Forgetpassword');
            }
    }
    
    public function verification_details(){
        if($this->session->userdata('verification_code')){
        $data['title']="Email Verification Code Details";
        $data['main_content']=$this->load->view("pages/verification_details",$data,TRUE);
        $this->load->view('master',$data);
        }else{
            redirect('/Forgetpassword');
        }
    }
    
    
    public function verification_validate(){
        $verification_code=$this->input->post('verification_code',TRUE);
        if(!empty($verification_code)){
        if($verification_code==$this->session->userdata('verification_code')){
            $c_data=array();
            $c_data['verifysuccess']='ok';
            $this->session->set_userdata($c_data);
            redirect('Password-reset');
        }else{
            $f_data=array();
            $f_data['errormessage']="Verificatication Code Not Match Or Verification Code Expired";
            $this->session->set_flashdata($f_data);
            redirect('/Verifycode');
            
        }
        }else{
            redirect('Verifycode');
        }
        
    }
    
    public function reset_password(){
        if($this->session->userdata('verifysuccess')){
        $data['title']="Customer Password Reset Options";
        $data['main_content']=$this->load->view("pages/reset_password",$data,TRUE);
        $this->load->view('master',$data);
        }else{
            redirect('/Verifycode');
        }
    }
    
    public function update_forget_password(){
        $customer_password=$this->input->post('customer_password',TRUE);
        $customer_confirm_password=$this->input->post('customer_confirm_password',TRUE);
        if($customer_password==$customer_confirm_password){
            $udata=array();
            $udata['customer_password']=$customer_password;
            $udata['customer_id']=$this->session->userdata('check_customer_id');
            $update_pass=$this->customer_model->update_forget_password_customerpass($udata);
            if($update_pass){
             $session_array=array('check_customer_id','verifysuccess','check_customer_first_name','check_customer_last_name','check_customer_email_address','check_customer_mobile_number','verification_code','check_in_time');
             $this->session->unset_userdata($session_array); 
            $f_data=array();
            $f_data['successmessage']="You Password Reset Successfully.Now You Login Your New Password.Thank You";
            $this->session->set_flashdata($f_data);
            redirect('/Forgetpassword');
            }
        }else{
            $f_data=array();
            $f_data['errormessage']="You Password And Confirm Password Not Match";
            $this->session->set_flashdata($f_data);
            redirect('/Password-reset');
        }
    }
     public function customer_details(){
           if($this->session->userdata('customer_id') && $this->session->userdata('shipping_id')){
                $data['title']="Customer Details Information";
                $data['main_content']=$this->load->view("pages/customer_details",$data,TRUE);
                $this->load->view('master',$data);
           }else{
               redirect('/home');
           }
       }
     public function order_details(){
           if($this->session->userdata('customer_id') && $this->session->userdata('shipping_id')){
                $data['title']="Customer Order Details Information";
                $customer_id=$this->session->userdata('customer_id');
                $data['customer_info']=$this->customer_model->all_customer_info_customer_id($customer_id);
                $data['order_info']=$this->customer_model->all_order_by_customer_id($customer_id);
                $data['main_content']=$this->load->view("pages/order_details",$data,TRUE);
                $this->load->view('master',$data);
           }else{
               redirect('/home');
           }
       }

    
    
    
    
    
    
    
    
    
    
    
    
    public function test(){
          
            echo "<pre>";
           print_r($this->session->userdata());
            echo "<pre>";
    }
    
 
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
     public function signout(){
             if(!$this->session->userdata('customer_id')){
                    redirect('/home');
                }else{
            $session_array=array('customer_id','shipping_id','cod_payment_id','bkash_payment_id','custom_order_id','order_id');
             $this->session->unset_userdata($session_array);
            redirect('/home');
                }
    }
     
    
}