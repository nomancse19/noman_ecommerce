<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>          

<div id="page-inner">
                 <!-- /. ROW  -->
               <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                              <h2>Order Processing And Change Status</h2>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <span style="color:blue;font-weight: bold;font-size:16px;"><?php 
                                    $message=$this->session->flashdata('message');
                                    if($message){
                                        echo $message;
                                    }
                                    ?></span>
                                    <?php if($order_info_status->order_status=='pending'){
                                        redirect('/Pending-Order');
                                    }
                                     ?>
                                    <form role="form" action="<?php echo base_url()?>super_admin/change_order_status_info" method="post">
                                        <div class="form-group">
                                            <label>Customer Name</label>
                                           <span style="margin-left:80px;color:green;">: <?php echo $order_info_status->customer_first_name.' '.$order_info_status->customer_last_name; ?></span>
                                        </div>
                                        <div class="form-group">
                                            <label>Custom Order ID</label>
                                            <span style="margin-left:75px;color:green;font-weight: bold;">: <?php echo $order_info_status->custom_order_id; ?> </span>
                                        </div>
                                        <div class="form-group">
                                            <label>Order Date And Time</label>
                                            <span style="margin-left:45px;color:green;">: <?php echo $order_info_status->order_date_time; ?></span>
                                        </div>
                                        <div class="form-group">
                                            <label>Order Status</label>
                                            <span style="margin-left:101px;color:green;font-weight: bold;">: <?php echo $order_info_status->order_status; ?></span>
                                        </div>
                                        <input type="hidden" name="order_id" value="<?php echo $order_info_status->order_id; ?>"/>
                                        
                                         <div class="form-group">
                                            <label>Change Order Status</label>
                                           <span style="margin-left:42px;color:green;">: 
                                            <select  name="order_status" required="">
                                                <option value="<?php echo $order_info_status->order_status; ?>"><?php echo $order_info_status->order_status; ?></option>
                                                <option value="processing">Processing</option>
                                                <option value="shipping">Shipping</option>
                                                <option value="complete">Complete</option>
                                                <option value="cancel">Cancel</option>
                                            </select>
                                           </span>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Change Payment Status</button>
                                    </form>
                             </div>
                            </div>
                        </div>
                    </div>
                     <!-- End Form Elements -->
                </div>
            </div>

                <!-- /. ROW  -->
    </div>
             <!-- /. PAGE INNER  -->
   

