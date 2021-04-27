<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="span9">
    <ul class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>">Home</a> <span class="divider">/</span></li>
		<li class="active">Success Order</li>
    </ul>
	<h3>Order Confirmation</h3>	
	<div class="well">
            <p style="color:black;font-weight: bold;font-size:18px;">
                Thank you for your interest in Our Beauty products. <br>Your order has been received and will be processed, <br> once payment has been confirmed.<br>
                And You Checked Your Mail For Your Order Details Or Invoice.
            </p>
            <h4 style="color:blue">Your Order Placed SuccessFully. Your Order Id Is <?php echo $order_id ?></h4>
            <h5>Now You Visit Your Profile.For Details Upcoming Update.</h5>
            <?php
            $this->session->unset_userdata('custom_order_id');
            ?>
</div>

</div>