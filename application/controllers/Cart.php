<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
    }  
   public function add_to_cart(){
         $data = array(
         'id'      =>$this->input->post('product_id',TRUE),
         'qty'     => $this->input->post('qty',TRUE),
         'price'   => $this->input->post('product_price',TRUE),
         'name'    => $this->input->post('product_name',TRUE),
         'options' => array('image'=>$this->input->post('product_image',TRUE),'product_code'=>$this->input->post('product_code',TRUE))
         );
         if($this->cart->insert($data)){
             $product_name=$data['name'];
             $qty=$data['qty'];
           echo '<div class="alert alert-success">
            <span style="font-weight: bold;font-size:14px;">Success! ['.$qty.'] Qty ['.$product_name.'] Added To Cart SuccessFully</span> 
            </div>';
         }else{
              echo '<div class="alert alert-danger">
            <span style="font-weight: bold;font-size:14px;color:red;">Error ! Product Not Added To Cart Due To Product Name Problem.</span> 
            </div>';
         }
        
   }
   
        public function cart_details(){
            $data=array();
             $data['title']="Shopping Cart Details";
            $data['main_content']=$this->load->view('pages/cart_details','',TRUE);
            $this->load->view('master',$data);
        }
    
	public function delete_cart(){ 
		$data = array(
			'rowid'=>$this->input->post('rowid',TRUE), 
			'qty'=>0,
		);
		$this->cart->update($data);
	}
	  public function update(){
	    $data = array(
	        'rowid' =>$this->input->post('row_id',TRUE),        
	        'qty' => $this->input->post('quantity',TRUE),
	        );

	    $this->cart->update($data);

    	}
    
    
    
    
    
    
    
    
    
    
    
    
}