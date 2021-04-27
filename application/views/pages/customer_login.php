<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="span9">
    <ul class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>">Home</a> <span class="divider">/</span></li>
		<li class="active">Customer Login</li>
    </ul>
	<h3>New Customer Login</h3>	
	<div class="well">
	
	<form class="form-horizontal" method="post" action="<?php echo base_url();?>customer/customer_login_check">
		<?php 
                $errormessage=$this->session->flashdata('errormessage');
                if($errormessage){
                ?>
            <div class="alert alert-danger">
                    <strong style="color:red;font-weight:bold;">Error! <?php echo $errormessage; ?></strong>
                </div>
                <?php } ?>
            <h4>Your Login Information</h4>


		<div class="control-group">
		<label class="control-label" for="input_email">Email <sup class="f_red">*</sup></label>
		<div class="controls">
		  <input type="email" name="customer_email_address" id="input_email" placeholder="Email" required="">
		</div>
             </div>	  
	<div class="control-group">
		<label class="control-label" for="inputPassword1">Password <sup class="f_red">*</sup></label>
		<div class="controls">
		  <input type="password" name="customer_password" id="inputPassword1" placeholder="Password" required="">
		</div>
	  </div>	  		
	<a href="<?php echo base_url();?>Forgetpassword">Forget password?</a>
	
	<div class="control-group">
			<div class="controls">
				<input class="btn btn-large btn-success" type="submit" value="Login Account"/>
			</div>
		</div>		
	</form>
</div>

</div>