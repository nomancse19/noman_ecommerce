	<div class="span9">
    <ul class="breadcrumb">
		<li><a href="<?php echo base_url();?>">Home</a> <span class="divider">/</span></li>
		<li class="active">Sipping Address</li>
    </ul>
	<h3>Fill Up Shipping address</h3>	
	<div class="well">
	<?php 
                $successmessage=$this->session->flashdata('successmessage');
                if($successmessage){
                ?>
            <div class="alert alert-success">
                    <strong style="color:green;font-weight:bold;">Success ! <?php echo $successmessage; ?></strong>
                </div>
                <?php } ?>
            <form class="form-horizontal" action="<?php echo base_url();?>checkout/save_shipping_address" method="post">
		<h4>Your Personal Information</h4>
                <?php
                $all_customer_info=$this->customer_model->all_customer_info_customer_id($this->session->userdata('customer_id'));
                ?>
                <input type="hidden" name="customer_id" value="<?php echo $this->session->userdata('customer_id');?>"/>
		 <div class="control-group">
			<label class="control-label" for="inputLnam">Your Name<sup>*</sup></label>
			<div class="controls">
                            <input type="text" id="inputLnam" value="<?php echo $all_customer_info->customer_first_name.' '.$all_customer_info->customer_last_name; ?>" readonly="">
			</div>
		 </div>
		 <div class="control-group">
			<label class="control-label" for="inputLnam">Your Mobile Number <sup>*</sup></label>
			<div class="controls">
                            <input type="text" value="<?php echo $all_customer_info->customer_mobile_number;?>" id="inputLnam" readonly="" >
			</div>
		 </div>
		<div class="control-group">
		<label class="control-label" for="input_email">Your Email <sup>*</sup></label>
		<div class="controls">
                    <input type="email" value="<?php echo $all_customer_info->customer_email_address;?>" id="input_email" readonly="" >
		</div>
	  </div>	  
		<h4>Enter Your Shipping Address</h4>
		<div class="control-group">
			<label class="control-label" for="inputFname">Full Name <sup>*</sup></label>
			<div class="controls">
                            <input type="text" id="inputFname" name="shipping_full_name" placeholder="Full Name" required="">
			</div>
		</div>	
                <div class="control-group">
			<label class="control-label" for="mobile">Mobile Number <sup>*</sup></label>
			<div class="controls">
                            <input type="text"  name="shipping_mobile_number" id="mobile" placeholder="Mobile Phone" required=""/> 
			</div>
		</div>
                <div class="control-group">
			<label class="control-label" for="mobile">Another Mobile Number <sup>*</sup></label>
			<div class="controls">
                            <input type="text"  name="shipping_another_mobile_number" id="mobile" placeholder="Another Mobile Phone" required=""/> 
			</div>
		</div>
                <div class="control-group">
			<label class="control-label" for="mobile">Email Address<sup>*</sup></label>
			<div class="controls">
                            <input type="email" value="<?php echo $all_customer_info->customer_email_address;?>"  name="shipping_email_address" id="mobile" placeholder="Email Address" required=""/> 
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="address">Details Address<sup>*</sup></label>
			<div class="controls">
                            <textarea name="shipping_details_address" placeholder="Enter Full Details Address" id="aditionalInfo" cols="10" rows="2"></textarea> <span>Street address,P.O,Apartment,suite,unit,building,floor</span>
			</div>
		</div>		
		
	<p><sup>*</sup>Required field	</p>
	
                <div class="control-group">
			<div class="controls">
				<input class="btn btn-large btn-success" type="submit" value="Save Shipping Address" />
			</div>
		</div>		
	</form>
</div>

</div>