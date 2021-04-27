<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
class Checkout extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $data=array();
    }
      public function checkout()
	{
                if($this->session->userdata('customer_id') && $this->cart->total()!=0){
                    redirect('/Shipping-address');
                }
                elseif(empty($this->cart->total())){
                    redirect('/Products');
                }
                else{
                $data['title']="CheckOut";
                $data['main_content']=$this->load->view("pages/checkout",$data,TRUE);
                $this->load->view('master',$data);
                }
	}
    public function save_shipping_address(){
         $data['customer_id']=$this->input->post('customer_id',TRUE);
         $data['shipping_full_name']=$this->input->post('shipping_full_name',TRUE);
         $data['shipping_mobile_number']=$this->input->post('shipping_mobile_number',TRUE);
         $data['shipping_another_mobile_number']=$this->input->post('shipping_another_mobile_number',TRUE);
         $data['shipping_email_address']=$this->input->post('shipping_email_address',TRUE);
         $data['shipping_details_address']=$this->input->post('shipping_details_address',TRUE);
         $shipping_id=$this->checkout_model->save_shipping_info($data);
         if($shipping_id){
             $sdata=array();
             $sdata['shipping_id']=$shipping_id;
             $this->session->set_userdata($sdata);
             if($this->cart->total()!=0 && $this->session->userdata('customer_id') && $this->session->userdata('shipping_id')){
             redirect('/PreOrder-Details');
             }else{
                 redirect('/home');
             }
         }
    }
    
      public function preorder_details(){
           if($this->session->userdata('customer_id') && $this->session->userdata('shipping_id') && $this->cart->total()!=0){
                $data['title']="Order Details With Customer And Shipping Information";
                $data['main_content']=$this->load->view("pages/preorder_details",$data,TRUE);
                $this->load->view('master',$data);
           }else{
               redirect('/Products');
           }
       }
       public function payment(){
           $data['title']="Payment Options";
            $data['main_content']=$this->load->view("pages/payment",$data,TRUE);
            $this->load->view('master',$data);
       }
       public function payment_info(){
           if($this->session->userdata('customer_id') && $this->session->userdata('shipping_id') && $this->session->userdata('total')){
           $payment_method=$this->input->post('payment_method',TRUE);
           if(!empty($payment_method)){
               if($payment_method=='COD'){
                   $data['cod_payment_method']=$payment_method;
                   $cod_payment_id=$this->checkout_model->save_cod_payment_info($data);
                   $bkash_payment_id=0;
                   $sdata=array();
                   $sdata['cod_payment_id']=$cod_payment_id;
                   $sdata['bkash_payment_id']=$bkash_payment_id;
                   $sdata['custom_order_id'] =date('ym',time()).rand(1000,9999);
                   $this->session->set_userdata($sdata);
                   
                   $odata=array();
                   
                   $odata['custom_order_id']   = $this->session->userdata('custom_order_id');
                   $odata['customer_id']       = $this->session->userdata('customer_id');
                   $odata['shipping_id']       = $this->session->userdata('shipping_id');
                   $odata['cod_payment_id']    = $this->session->userdata('cod_payment_id');
                   $odata['bkash_payment_id']  = $this->session->userdata('bkash_payment_id');
                   $odata['order_total']       = $this->session->userdata('total');
                   $odata['order_qty']         = count($this->cart->contents());
                   $order_id=$this->checkout_model->save_order_info($odata);
                   $sdata=array();
                   $sdata['order_id']=$order_id;
                   $this->session->set_userdata($sdata);

                   $content=$this->cart->contents();
                   $od_data=array();
                   foreach ($content as $p_content){
                       $od_data['order_id']=$this->session->userdata('order_id');
                       $od_data['custom_order_id']=$this->session->userdata('custom_order_id');
                       $od_data['product_id']=$p_content['id'];
                       $od_data['product_code']=$p_content['options']['product_code'];
                       $od_data['product_name']=$p_content['name'];
                       $od_data['product_price']=$p_content['price'];
                       $od_data['product_qty']=$p_content['qty'];
                       $order_id_details=$this->checkout_model->save_order_details_info($od_data);
                       
                   }
                   redirect('checkout/confirm_mail');
               }
               else{
                  $bkash_personal_number=$this->input->post('bkash_personal_number',TRUE);
                  $bkash_transaction_id =$this->input->post('bkash_transaction_id',TRUE);
                  $bkash_payment_amount =$this->input->post('bkash_payment_amount',TRUE);
                   if(!empty($bkash_personal_number) && !empty($bkash_transaction_id) && !empty($bkash_payment_amount)){
                    $data['bkash_payment_method']=$payment_method;
                    $data['bkash_payment_mobile_number']=$bkash_personal_number;
                    $data['bkash_payment_amount']=$bkash_payment_amount;
                    $data['bkash_payment_transaction_id']=$bkash_transaction_id;
                    $bkash_payment_id=$this->checkout_model->save_bkash_payment_info($data);
                    $cod_payment_id=0;
                    $sdata=array();
                    $sdata['cod_payment_id']=$cod_payment_id;
                    $sdata['bkash_payment_id']=$bkash_payment_id;
                    $sdata['custom_order_id'] =date('ym',time()).rand(1000,9999);
                    $this->session->set_userdata($sdata);
                   
                   $odata=array();
                   
                   $odata['custom_order_id']   = $this->session->userdata('custom_order_id');
                   $odata['customer_id']       = $this->session->userdata('customer_id');
                   $odata['shipping_id']       = $this->session->userdata('shipping_id');
                   $odata['cod_payment_id']    = $this->session->userdata('cod_payment_id');
                   $odata['bkash_payment_id']  = $this->session->userdata('bkash_payment_id');
                   $odata['order_total']       = $this->session->userdata('total');
                   $odata['order_qty']         = count($this->cart->contents());
                   $order_id=$this->checkout_model->save_order_info($odata);
                   $sdata=array();
                   $sdata['order_id']=$order_id;
                   $this->session->set_userdata($sdata);

                   $content=$this->cart->contents();
                   $od_data=array();
                   foreach ($content as $p_content){
                       $od_data['order_id']=$this->session->userdata('order_id');
                       $od_data['custom_order_id']=$this->session->userdata('custom_order_id');
                       $od_data['product_id']=$p_content['id'];
                       $od_data['product_code']=$p_content['options']['product_code'];
                       $od_data['product_name']=$p_content['name'];
                       $od_data['product_price']=$p_content['price'];
                       $od_data['product_qty']=$p_content['qty'];
                      
                       $order_id_details=$this->checkout_model->save_order_details_info($od_data);
                   }
                   redirect('checkout/confirm_mail');
                   }else{
                       $fdata=array();
                       $fdata['errormessage']="Bkash Personal Number And Bkash Transaction ID Must Be Needed .";
                       $this->session->set_flashdata($fdata);
                       redirect('/Payment');
                   }
               }
               
               
               
               
               
           }else{
               echo "Must Be Checked Any One Payment Method";
           }
           }else{
               redirect('/home');
           }
       }
       public function confirm_mail(){
           $this->load->library('email');
            $config = array(
                'protocol'  => 'smtp',
                'smtp_host' => 'smtp.mailtrap.io',
                'smtp_port' => 465,
                'smtp_user' => 'b4aef6eaea5c8d',
                'smtp_pass' => 'b53f416baea2ec',
                'mailtype'  => 'html',
                'charset'   => 'utf-8'
            );
            $this->email->initialize($config);
            $this->email->set_mailtype("html");
            $this->email->set_newline("\r\n");
            $customer_info=$this->customer_model->all_customer_info_customer_id($this->session->userdata('customer_id'));
            $shipping_info=$this->customer_model->all_shipping_info_customer_id($this->session->userdata('shipping_id'));
            $custom_order_id=$this->session->userdata('custom_order_id');
            $cod_payment_id=$this->session->userdata('cod_payment_id');
            $bkash_payment_id=$this->session->userdata('bkash_payment_id');
            if($cod_payment_id==0){
                $payment_method="Bkash Payment";
            }
            else if($bkash_payment_id==0){
                $payment_method="Cash On Delivary";
            }

           

             

            $msg='
            <body>
            <div style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#000000">
            <div style="width:680px">
            <p style="margin-top:0px;margin-bottom:20px">Thank you for your interest in Our Beauty products. Your order has been received and will be processed once payment has been confirmed.</p>
            <p style="margin-top:0px;margin-bottom:20px">To view your order click on the link below:</p>
            <p style="margin-top:0px;margin-bottom:20px"><a href="http://bdspeedytech.com/index.php?route=account/order/info&amp;order_id=5372" target="_blank" </a></p>
            <table style="border-collapse:collapse;width:100%;border-top:1px solid #dddddd;border-left:1px solid #dddddd;margin-bottom:20px">
            <thead>
            <tr>
            <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;background-color:#efefef;font-weight:bold;text-align:left;padding:7px;color:#222222" colspan="2">Order Details</td>
            </tr>
            </thead>
            <tbody>
            <tr>
            <td style="font-size:13px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:left;padding:7px"><b>Order ID : </b><span style="color:red;font-size:14px;">' . $custom_order_id . '</span><br>
            <b>Date Added : </b>'.date('d-m-y').'<br>
            <b>Payment Method : </b>'.$payment_method.'<br>
            <b>Shipping Method : </b> Flat Shipping Rate </td>
            <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:left;padding:7px"><b>E-mail : </b> <a href="mailto:'.$customer_info->customer_email_address.'" target="_blank">'.$customer_info->customer_email_address.'</a><br>
            <b>Telephone : </b>'.$customer_info->customer_mobile_number.'<br>
            <b>Order Status : </b>Pending<br></td>
            </tr>
            </tbody>
            </table>
            <table style="border-collapse:collapse;width:100%;border-top:1px solid #dddddd;border-left:1px solid #dddddd;margin-bottom:20px">
            <thead>
            <tr>
            <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;background-color:#efefef;font-weight:bold;text-align:left;padding:7px;color:#222222">Payment Address</td>
            <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;background-color:#efefef;font-weight:bold;text-align:left;padding:7px;color:#222222">Shipping Address</td>
            </tr>
            </thead>
            <tbody>
            <tr>
            <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:left;padding:7px">'.$customer_info->customer_first_name.$customer_info->customer_last_name.'<br>'.$customer_info->customer_mobile_number.'<br>'.$shipping_info->shipping_details_address.'<br>Dhaka<br>Bangladesh</td>
            <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:left;padding:7px">'.$shipping_info->shipping_full_name.'<br>'.$shipping_info->shipping_mobile_number.'<br>'.$shipping_info->shipping_details_address.'<br>Dhaka<br>Bangladesh</td>
            </tr>
            </tbody>
            </table>
            <table style="border-collapse:collapse;width:100%;border-top:1px solid #dddddd;border-left:1px solid #dddddd;margin-bottom:20px">
            <thead>
            <tr>
            <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;background-color:#efefef;font-weight:bold;text-align:left;padding:7px;color:#222222">Product</td>
            <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;background-color:#efefef;font-weight:bold;text-align:right;padding:7px;color:#222222">Quantity</td>
            <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;background-color:#efefef;font-weight:bold;text-align:right;padding:7px;color:#222222">Price</td>
            <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;background-color:#efefef;font-weight:bold;text-align:right;padding:7px;color:#222222">Total</td>
            </tr>
            </thead>
            <tbody>';
            $content=$this->cart->contents();
            foreach ($content as $p_content){
            $msg.='<tr>
            <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:left;padding:7px">'.$p_content['name'].'<br>Product Code - '.$p_content['options']['product_code'].'</td>
            <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:right;padding:7px">'.$p_content['qty'].'</td>
            <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:right;padding:7px">'.$p_content['price'].'</td>
            <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:right;padding:7px">'.$p_content['subtotal'].'</td>
            </tr>
            
            
            </tbody>';
            }
            $msg.='
            <tfoot>
            <tr>
            <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:right;padding:7px" colspan="3"><b>Sub-Total:</b></td>
            <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:right;padding:7px">৳ '.$this->cart->total().'</td>
            </tr>
            <tr>
            <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:right;padding:7px" colspan="3"><b>Flat Shipping Rate:</b></td>
            <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:right;padding:7px">৳ 80</td>
            </tr>
            <tr>
            <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:right;padding:7px" colspan="3"><b>Total:</b></td>
            <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:right;padding:7px">৳ '.($this->cart->total()+80) .'</td>
            </tr>
            </tfoot>
            </table>
            <p style="margin-top:0px;margin-bottom:20px">Please reply to this e-mail if you have any questions.</p>
            </div>
            </div>
            </body>
            </html>';

            $sms_msg="Order Confirmation SMS From Noman-IT. Customer Order ID- ".$custom_order_id." And Customer Name - ". $customer_info->customer_first_name.' '.$customer_info->customer_last_name. " and Cutomer Mobile Number "
            . $customer_info->customer_mobile_number ;
          
          
            try{     
                $soapClient = new SoapClient("");     
                $paramArray = array(      
                        'userName'        => "",         
                        'userPassword'    => "",        
                        'messageText'   => $sms_msg,        
                        'numberList'    => "01521451354",        
                        'smsType'       => "TEXT",        
                        'maskName'      => '',         
                        'campaignName'  => '',); 
 
                        $value = $soapClient->__call("OneToMany", array($paramArray));    
                         //echo $value->OneToManyResult;  
             
            }catch (Exception $e)
             {     
                 $e->getMessage(); 
                
                }




            $this->email->to($customer_info->customer_email_address);
            $this->email->from('noman.cse19@gmail.com','noman-IT.com');
            $this->email->subject('Confirmation Order id : '.$custom_order_id);
            $this->email->message($msg);
            $send=$this->email->send();
           
           
       

            if($send){
                $session_array=array('cod_payment_id','bkash_payment_id','order_id','total');
                     $this->session->unset_userdata($session_array);
                     $this->cart->destroy();
                   redirect('/Success-Order');
            }else{
                "Order Saved But Email Not Send. Face In Technical Error..";
            }
       }
       
    public function success_order(){
             if($this->session->userdata('custom_order_id')){   
            $data['title']="Successfully Completed Your Order.";
            $data['order_id']=$this->session->userdata('custom_order_id');
            $data['main_content']=$this->load->view("pages/success_order",$data,TRUE);
            $this->load->view('master',$data);
             }else{
                  redirect('/home');
             }
    }
    
 
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
}