<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="span9">
    <ul class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>">Home</a> <span class="divider">/</span></li>
		<li class="active">Forget Password</li>
    </ul>
	<h3>Forget Password Options</h3>	
	<div class="well">
	
	<form class="form-horizontal" method="post" action="<?php echo base_url();?>customer/customer_email_check">
		<?php 
                $errormessage=$this->session->flashdata('errormessage');
                if($errormessage){
                ?>
            <div class="alert alert-danger">
                    <strong style="color:red;font-weight:bold;">Error! <?php echo $errormessage; ?></strong>
                </div>
                <?php } ?>
		<?php 
                $successmessage=$this->session->flashdata('successmessage');
                if($successmessage){
                ?>
            <div class="alert alert-success">
                    <strong style="color:green;font-weight:bold;">Success! <?php echo $successmessage; ?></strong>
                </div>
                <?php } ?>
            <h4>Your Personal Information</h4>
		<div class="control-group">
		<label class="control-label" for="input_email">Enter Registered Email <sup class="f_red">*</sup></label>
		<div class="controls">
		  <input type="email" name="customer_email_address" id="input_email" placeholder="Enter Your Registered Email" required="">
		</div>
             </div>	  	  		
	<div class="control-group">
			<div class="controls">
				<input class="btn btn-large btn-success" type="submit" value="Submit"/>
			</div>
		</div>		
	</form>
</div>

</div>