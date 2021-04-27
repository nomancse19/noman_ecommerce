<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="span9">
    <ul class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>">Home</a> <span class="divider">/</span></li>
		<li class="active">Forget Password</li>
                <li class="pull-right"><strong style='color:black;'>Remaining Time : </strong><span id="remain_time" style="color:red;font-weight: bold;font-size:18px; "></span></li>
    </ul>
	<h3>Verification Email</h3>	
	<div class="well">
	
	<form class="form-horizontal" method="post" action="<?php echo base_url();?>customer/verification_validate">
		<?php 
                $errormessage=$this->session->flashdata('errormessage');
                if($errormessage){
                ?>
            <div class="alert alert-danger">
                    <strong style="color:red;font-weight:bold;">Error! <?php echo $errormessage; ?></strong>
                </div>
                <?php } ?>
            <h4>Email Verification Code</h4>
            <p style="color:blue;font-weight: bold;">A Verification Code Sent To Your Email Address.Check Your Email.<span style="color:red;font-weight: bold;">Verification Code Auto Disable Within 10 Minute.</span></p>
		<div class="control-group">
		<label class="control-label" for="input_email">Enter Verification Code<sup class="f_red">*</sup></label>
		<div class="controls">
		  <input type="text" name="verification_code" id="input_email" placeholder="Enter Verification Code" required="">
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