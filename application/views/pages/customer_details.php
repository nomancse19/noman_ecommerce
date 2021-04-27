	<div class="span9">
    <ul class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>">Home</a> <span class="divider">/</span></li>
     <li class="active">Customer And Shipping Information And Details</li>
    </ul>
	<h3>Customer And Shipping Information Details</h3>	
	<div class="well">
 <div class="row-fluid">
	  <div class="span12">
	  <h4>Customer Information</h4>
          <?php $customer_info=$this->customer_model->all_customer_info_customer_id($this->session->userdata('customer_id'));?>
                <table class="table table-bordered">
                    <tbody>
                     <tr class="techSpecRow"><th colspan="2">Customer Deatils Information <a href="#"><button class="btn btn-warning btn-mini pull-right">Edit Customer Info</button></a></th></tr>
                    <tr class="techSpecRow"><td class="techSpecTD1">Customer First Name:</td><td style="font-weight: bold;" class="techSpecTD2"><?php echo $customer_info->customer_first_name;?></td></tr>
                    <tr class="techSpecRow"><td class="techSpecTD1">Customer Last Name:</td><td style="font-weight: bold;"  class="techSpecTD2"><?php echo $customer_info->customer_last_name;?></td></tr>
                    <tr class="techSpecRow"><td class="techSpecTD1">Customer Mobile Number:</td><td style="font-weight: bold;"  class="techSpecTD2"><?php echo $customer_info->customer_mobile_number;?></td></tr>
                    <tr class="techSpecRow"><td class="techSpecTD1">Customer Email Address</td><td style="font-weight: bold;"  class="techSpecTD2"><?php echo $customer_info->customer_email_address;?></td></tr>

                    </tbody>
                </table>
	  </div>
	  <div class="span12">
	  <h4>Shipping Information </h4>
            <?php $shipping_info= $this->customer_model->all_shipping_info_customer_id($this->session->userdata('shipping_id'));?>
		  <table class="table table-bordered">
                    <tbody>
                  <tr class="techSpecRow"><th colspan="2">Shipping Deatils Information <a href="#"><button class="btn btn-warning btn-mini pull-right">Edit Shipping Info</button></a></th></tr>
                    <tr class="techSpecRow"><td class="techSpecTD1">Shipping  Name:</td><td style="font-weight: bold;"  class="techSpecTD2"><?php echo $shipping_info->shipping_full_name;?></td></tr>
                    <tr class="techSpecRow"><td class="techSpecTD1">Shipping Mobile:</td><td style="font-weight: bold;"  class="techSpecTD2"><?php echo $shipping_info->shipping_mobile_number;?></td></tr>
                    <tr class="techSpecRow"><td class="techSpecTD1">Shipping Email</td><td style="font-weight: bold;"  class="techSpecTD2"><?php echo $shipping_info->shipping_email_address;?></td></tr>
                    <tr class="techSpecRow"><td class="techSpecTD1">Shipping Address</td><td style="font-weight: bold;"  class="techSpecTD2"><?php echo $shipping_info->shipping_details_address;?></td></tr>
                    </tbody>
                </table>
	  </div>
     
     <div class="span12">
         <h4>Customer Login Information </h4>
		<?php $customer_info=$this->customer_model->all_customer_info_customer_id($this->session->userdata('customer_id'));?>
                <table class="table table-bordered">
                    <tbody>
                     <tr class="techSpecRow"><th colspan="2">Login Information <a href="#"><button class="btn btn-warning btn-mini pull-right">Edit Login Password Info</button></a></th></tr>
                    <tr class="techSpecRow"><td class="techSpecTD1">Login Email Address</td><td style="font-weight: bold;"  class="techSpecTD2"><?php echo $customer_info->customer_email_address;?></td></tr>
                    <tr class="techSpecRow"><td class="techSpecTD1">Login Password</td><td style="font-weight: bold;"  class="techSpecTD2">******************</td></tr>

                    </tbody>
                </table>  
     </div>
     
  </div>

        </div>

</div>