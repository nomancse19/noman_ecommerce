<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="span9">
    <ul class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>">Home</a> <span class="divider">/</span></li>
		<li class="active">Password Reset Options</li>
                <li class="pull-right"><strong style='color:black;'>Remaining Time : </strong> <span id="remain_time" style="color:red;font-weight: bold;font-size:18px; "></span></li>
    </ul>
	<h3>Password Reset</h3>	
	<div class="well">
	
	<form class="form-horizontal" method="post" action="<?php echo base_url();?>customer/update_forget_password">
		<?php 
                $errormessage=$this->session->flashdata('errormessage');
                if($errormessage){
                ?>
            <div class="alert alert-danger">
                    <strong style="color:red;font-weight:bold;">Error! <?php echo $errormessage; ?></strong>
                </div>
                <?php } ?>
            <h4>Set New Password</h4>
            <p style="color:blue;margin-left: 25px;font-weight: bold;"> Hello <?php echo $this->session->userdata('check_customer_first_name').$this->session->userdata('check_customer_last_name');?></p>
	<div class="control-group">
		<label class="control-label" for="input_email">Enter New Password<sup class="f_red">*</sup></label>
		<div class="controls">
		  <input type="password" name="customer_password" id="input_email" placeholder="Enter New Password" required="">
		</div>
             </div>	  
	<div class="control-group">
		<label class="control-label" for="inputPassword1">Confirm New Password <sup class="f_red">*</sup></label>
		<div class="controls">
		  <input type="password" name="customer_confirm_password" id="inputPassword1" placeholder="Confirm Your New Password" required="">
		</div>
	  </div>	  		
	<div class="control-group">
			<div class="controls">
				<input class="btn btn-large btn-success" type="submit" value="Reset Password"/>
			</div>
		</div>		
	</form>
</div>

</div>

<?php $start_time=$this->session->userdata('check_in_time');?>
<script>
// Set the date we're counting down to
var countDownDate =<?php echo ($start_time+600)*1000;?>;

// Update the count down every 1 second
var x = setInterval(function() {

    // Get todays date and time
    var now = new Date().getTime();
    
    // Find the distance between now and the count down date
    var distance = countDownDate - now;
    
    // Time calculations for days, hours, minutes and seconds
   // var days = Math.floor(distance / (1000 * 60 * 60 * 24));
   // var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
    // Output the result in an element with id="demo"
    document.getElementById("remain_time").innerHTML = minutes + "m " + seconds + "s ";
    //document.getElementById("remain_time").innerHTML =countDownDate +" " +now + " " +distance ;
    // If the count down is over, write some text 
     if (distance < 0) {
        clearInterval(x);
        document.getElementById("remain_time").innerHTML = "EXPIRED";
         location.reload();
    }
}, 1000);
</script>