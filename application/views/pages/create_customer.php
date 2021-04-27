	<div class="span9">
    <ul class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>">Home</a> <span class="divider">/</span></li>
		<li class="active">Registration</li>
    </ul>
	<h3>New Customer Registration</h3>	
	<div class="well">
	
	<form class="form-horizontal" method="post" action="<?php echo base_url();?>customer/save_customer">
		<?php 
                $errormessage=$this->session->flashdata('errormessage');
                if($errormessage){
                ?>
            <div class="alert alert-danger">
                    <strong style="color:red;font-weight:bold;">Error! <?php echo $errormessage; ?></strong>
                </div>
                <?php } ?>
            <h4>Your personal information</h4>
		<div class="control-group">
			<label class="control-label" for="inputFname1">First name <sup>*</sup></label>
			<div class="controls">
                            <input type="text" name="customer_first_name" id="inputFname1" placeholder="First Name" required="">
			</div>
		 </div>
		 <div class="control-group">
			<label class="control-label" for="inputLnam">Last name <sup>*</sup></label>
			<div class="controls">
			  <input type="text" name="customer_last_name" id="inputLnam" placeholder="Last Name" required="">
			</div>
		 </div>
		 <div class="control-group">
			<label class="control-label" for="inputLnam">Mobile Number <sup>*</sup></label>
			<div class="controls">
                            <input type="number" name="customer_mobile_number" id="inputLnam" placeholder="Mobile Number" required="">
			</div>
		 </div>
		<div class="control-group">
		<label class="control-label" for="input_email">Email <sup>*</sup></label>
		<div class="controls">
		  <input type="email" name="customer_email_address" id="input_email" placeholder="Email" required="">
		</div>
	  </div>	  
	<div class="control-group">
		<label class="control-label" for="inputPassword1">Password <sup>*</sup></label>
		<div class="controls">
		  <input type="password" name="customer_password" id="inputPassword1" placeholder="Password" required="">
		</div>
	  </div>	  		
	<p><sup>*</sup>Required field	</p>
	
	<div class="control-group">
			<div class="controls">
				<input class="btn btn-large btn-success" type="submit" value="Create New Account"/>
			</div>
		</div>		
	</form>
</div>

</div>