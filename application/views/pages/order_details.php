	
<div class="span9">
    <ul class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>">Home</a> <span class="divider">/</span></li>
     <li class="active">Customer All Order Information And Details</li>
    </ul>
	<h3>Order Information Details</h3>	
	<div class="well">
    <div class="row-fluid">
	  <div class="span12">
	  <h4>All Order Information</h4>
          <?php $customer_info=$this->customer_model->all_customer_info_customer_id($this->session->userdata('customer_id'));?>
     <table class="table table-striped table-bordered table-hover" style="width:100%" id="datatable">
        <thead>
          <tr>
            <th>SL</th>
            <th>Order ID</th>
            <th>Customer Name</th>
            <th>No. Of Product</th>
            <th>Status</th>
            <th>Total</th>
            <th>Date Added</th>
            <th>View</th>
          </tr>
        </thead>
        <tbody>
        <?php 
        $i=0;
        foreach ($order_info as $all_order_info) {
            $i++;
        ?>
          <tr>
            <td><?php echo $i;?></td>
            <td><?php echo $all_order_info->custom_order_id;?></td>
            <td><?php echo $customer_info->customer_first_name." ".$customer_info->customer_last_name;;?></td>
            <td><?php echo $all_order_info->order_qty;?></td>
            <td>
            <?php 
                if($all_order_info->order_status=='pending'){
                    echo '<span style="color:black;font-weight:bold;">Pending</span>';
                }
                elseif($all_order_info->order_status=='processing'){
                    echo '<span style="color:green;font-weight:bold;">Processing</span>';
                }
                elseif($all_order_info->order_status=='shipping'){
                    echo '<span style="color:violet;font-weight:bold;">Shipping</span>';
                }
                elseif($all_order_info->order_status=='complete'){
                    echo '<span style="color:blue;font-weight:bold;">Complete</span>';
                }
                elseif($all_order_info->order_status=='cancel'){
                    echo '<span style="color:red;font-weight:bold;">Cancel</span>';
                }
                ?>
            </td>
            <td><?php echo $all_order_info->order_total;?></td>
            <td><?php echo $all_order_info->order_date_time;?></td>
            <td><a class="btn btn-info btn-primary" href=""><i class="icon-eye-open"></i></a></td>
          </tr>
        <?php } ?>
        </tbody>
      </table>
	  </div>

     
  </div>

        </div>
