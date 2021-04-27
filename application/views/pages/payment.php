<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
  <?php $customer_info=$this->customer_model->all_customer_info_customer_id($this->session->userdata('customer_id'));?>
	<div class="span9">
    <ul class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>">Home</a> <span class="divider">/</span></li>
     <li class="active">Payment Options</li>
    </ul>
	<h3>Payment Options</h3>	
	<div class="well">
        <div class="row-fluid">
         <form action="<?php echo base_url();?>checkout/payment_info" method="post">
            <div class="span12">
                <?php 
                    $errormessage=$this->session->flashdata('errormessage');
                 if($errormessage){
                  ?>
                  <div class="alert alert-danger">
                    <strong class="f_red">Warning ! <?php echo $errormessage;?> </strong>
                  </div>
                 <?php } ?>
                <h4>Payment Choosing Options.</h4>
            <div class="control-group">
            <label class="control-label">Choose Any One Payment Type</label>
          
            <div class="controls" id="radioselect">
              <label class="radio"> 
                  <input type="radio" name="payment_method" value="COD" id="optionsRadios1" checked="">
                <img src="<?php echo base_url();?>front_end/image/cod.png" alt="" width="100" height="100">Cash On Delivary
              </label>
                <br>
                <br>
              <label class="radio">
                <input type="radio" value="bkash" name="payment_method" id="optionsRadios2">
                <img src="<?php echo base_url();?>front_end/image/bkash.jpg" alt="" width="100" height="100">Bkash Payment
              </label>
            </div>
            <div class="control-group" id="bkash_details" style="display: none;">
            <label class="control-label">Bkash Payment Option Not Allow This Moment..Now Send Money Your Payment.</label>
            <label class="control-label"> 
            <p style="font-weight: bold;">01. Go to your bKash Mobile Menu by dialing *247# .<br />
            02. Choose “Send Money” .<br />
            03. Enter our Bkash Personal number   :<span style="color:red;">&nbsp; 01521451354</span><br />
            04. Enter BDT. amount you have to pay :<span style="color:red">&nbsp; <?php echo $this->cart->format_number($this->cart->total()+80);?> </span><br />
            05. Enter a reference against your payment :<span style="color:red">&nbsp; <?php echo $customer_info->customer_mobile_number; ?></span><br/>
            06. Now enter your bKash Mobile Menu PIN to confirm the transaction .</p>
            <p style="color:green">Done! You  will receive a confirmation message from bKash With Transaction ID.Now Fill Up those Information.</p>
             </label>
		<label class="control-label" for="input_email">Enter Bkash Personal Number<sup class="f_red">*</sup></label>
		<div class="controls">
                    <input type="number" name="bkash_personal_number" style="width:310px;" id="input_email" placeholder=" Bkash Personal Number That Using Payment">
		</div>
		<label class="control-label" for="input_email">Enter Payment Transaction Number <sup class="f_red">*</sup></label>
		<div class="controls">
                    <input type="text" name="bkash_transaction_id" style="width:310px;" id="input_email" placeholder=" Bkash Payment Transaction ID">
		</div>
		<label class="control-label" for="input_email">Total Payment Amount<sup class="f_red">*</sup></label>
		<div class="controls">
                    <input type="text" name="bkash_payment_amount" value=" <?php echo $this->cart->format_number($this->cart->total()+80);?>" style="width:310px;" >
		</div>
                <p style="color:blue;font-weight: bold;">Now Place Order And Get Confirmation Order ID</p>
             </div>
           
          </div>
            </div>
             <button type="submit" class="btn btn-success">Final Confirm Order</button>
   </form>
        </div>

        </div>

</div>

<script type="text/javascript">
  $(document).ready(function () {                            
    $("#optionsRadios1, #optionsRadios2").change(function () {
        if ($("#optionsRadios1").is(":checked")) {
            $('#bkash_details').hide();
        }
        else if ($("#optionsRadios2").is(":checked")) {
            $('#bkash_details').show();
        }
        else{ 
            $('#bkash_details').hide();
        }
    });        
});
</script>
