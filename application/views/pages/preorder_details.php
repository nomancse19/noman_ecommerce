	<div class="span9">
    <ul class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>">Home</a> <span class="divider">/</span></li>
     <li class="active">Pre Order Customer And Shipping Information And Cart Details</li>
    </ul>
	<h3>Customer And Shipping Information And Cart Details</h3>	
	<div class="well">
 <div class="row-fluid">
	  <div class="span6">
	  <h4>Customer Information</h4>
          <?php $customer_info=$this->customer_model->all_customer_info_customer_id($this->session->userdata('customer_id'));?>
                <table class="table table-bordered">
                    <tbody>
                     <tr class="techSpecRow"><th colspan="2">Customer Deatils Information <a href="#"><button class="btn btn-warning btn-mini pull-right">Edit Customer Info</button></a></th></tr>
                    <tr class="techSpecRow"><td class="techSpecTD1">Customer First Name:</td><td style="font-weight: bold;" class="techSpecTD2"><?php echo $customer_info->customer_first_name;?></td></tr>
                    <tr class="techSpecRow"><td class="techSpecTD1">Customer Last Name:</td><td style="font-weight: bold;"  class="techSpecTD2"><?php echo $customer_info->customer_last_name;?></td></tr>
                    <tr class="techSpecRow"><td class="techSpecTD1">Customer Mobile Number:</td><td style="font-weight: bold;"  class="techSpecTD2"><?php echo $customer_info->customer_mobile_number;?></td></tr>
                    <tr class="techSpecRow"><td class="techSpecTD1">Customer Address</td><td style="font-weight: bold;"  class="techSpecTD2"><?php echo $customer_info->customer_email_address;?></td></tr>

                    </tbody>
                </table>
	  </div>
	  <div class="span6">
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
         <h4>Total Payable Information</h4>
		  <table class="table table-bordered">
                    <tbody>
                    <tr class="techSpecRow" ><td class="techSpecTD1" style="text-align: center;font-weight: bold;font-size:15px;">Total Order Item</td><td style="text-align: center;font-weight: bold;font-size:15px;" class="techSpecTD1">Total Order Amount</td><td style="text-align: center;font-weight: bold;font-size:15px;" class="techSpecTD2">Total Payable Amount</td></tr>
                    <tr class="techSpecRow"><td style="text-align: center;font-weight: bold;font-size:14px;" class="techSpecTD1"><?php echo $this->cart->total_items();?></td><td style="text-align: center;font-weight: bold;font-size:14px;" class="techSpecTD1"><?php echo $this->cart->format_number($this->cart->total()); ?></td><td style="text-align: center;font-weight: bold;font-size:14px;"class="techSpecTD2"><?php echo $this->cart->format_number($this->cart->total()+80); ?></td></tr>
                    </tbody>
                </table>
     </div>
     <p class="pull-left success">***Above All Information is Correct.Now You Are Agree Order Those Product ***</p>
     <a href="<?php echo base_url();?>Payment"><button class="btn btn-success pull-right">Place Order And Payment</button></a>
  </div>

        </div>

</div>