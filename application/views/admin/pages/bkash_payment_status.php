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
                              <h2>Bkash Payment Verify And Change Status</h2>
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
                                    <?php if(!$bkash_payment_info){
                                     redirect('/Pending-Order') ;
                                    }  
                                     ?>
                                    <form role="form" action="<?php echo base_url()?>super_admin/change_bkash_payment_status" method="post">
                                        <div class="form-group">
                                            <label>Customer Name</label>
                                           <span style="margin-left:80px;color:green;">: <?php echo $bkash_payment_info->customer_first_name.' '.$bkash_payment_info->customer_last_name; ?></span>
                                        </div>
                                        <div class="form-group">
                                            <label>Custom Order ID</label>
                                            <span style="margin-left:75px;color:green;font-weight: bold;">: <?php echo $bkash_payment_info->custom_order_id; ?> </span>
                                        </div>
                                        <div class="form-group">
                                            <label>Bkash Payment Date</label>
                                            <span style="margin-left:50px;color:green;">: <?php echo $bkash_payment_info->bkash_payment_date_time; ?> </span>
                                        </div>
                                        <div class="form-group">
                                            <label>Bkash Mobile Number</label>
                                            <span style="margin-left:40px;color:green;">: <?php echo $bkash_payment_info->bkash_payment_mobile_number; ?> </span>
                                        </div>
                                        <div class="form-group">
                                            <label>Bkash Payment Amount</label>
                                            <span style="margin-left:31px;color:green;">: <?php echo $bkash_payment_info->bkash_payment_amount; ?> </span>
                                        </div>
                                        <div class="form-group">
                                            <label>Bkash Transaction ID</label>
                                            <span style="margin-left:48px;color:green;">: <?php echo $bkash_payment_info->bkash_payment_transaction_id; ?></span>
                                        </div>
                                        <div class="form-group">
                                            <label>Payment Status</label>
                                            <span style="margin-left:87px;color:green;font-weight: bold;">: <?php echo $bkash_payment_info->bkash_payment_status; ?></span>
                                        </div>
                                        <input type="hidden" name="bkash_payment_id" value="<?php echo $bkash_payment_info->bkash_payment_id; ?>"/>
                                        <input type="hidden" name="order_id" value="<?php echo $bkash_payment_info->order_id; ?>"/>
                                        
                                         <div class="form-group">
                                            <label>Change Payment Status</label>
                                           <span style="margin-left:28px;color:green;">: 
                                            <select  name="payment_status" required="">
                                                <?php if($bkash_payment_info->bkash_payment_status=='pending'){?>
                                                <option value="pending">Pending</option>
                                                <option value="paid">Paid</option>
                                                <?php } ?>
                                                <?php if($bkash_payment_info->bkash_payment_status=='paid'){?>
                                                <option value="paid">Paid</option>
                                                <option value="pending">Pending</option>
                                                <?php } ?>
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
   

