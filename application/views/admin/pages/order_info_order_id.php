<?php
if(!$order_info){
    redirect('/Confirm-Order');
}
?>

<div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                         <div class="panel-heading">
                            <h2>Order Details View</h2>
                        </div>
                      <?php
                      $msg='
                        <body>
                        <div style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#000000;">
                        <div style="width:680px;">

                        <table style="border-collapse:collapse;width:100%;border-top:1px solid #dddddd;border-left:1px solid #dddddd;margin-bottom:20px">
                        <thead>
                        <tr>
                        <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;background-color:#efefef;font-weight:bold;text-align:left;padding:7px;color:#222222" colspan="2">Order Details</td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                        <td style="font-size:13px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:left;padding:7px"><b>Order ID : </b><span style="color:red;font-size:14px;">' .$order_info->custom_order_id . '</span><br>
                        <b>Date Added : </b>'.date('d-m-y').'<br>
                        <b>Payment Method : </b>'.ucwords($payment_method).'<br>
                        <b>Shipping Method : </b> Flat Shipping Rate </td>
                        <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:left;padding:7px"><b>E-mail : </b> <a href="mailto:'.$order_info->customer_email_address.'" target="_blank">'.$order_info->customer_email_address.'</a><br>
                        <b>Telephone : </b>'.$order_info->customer_mobile_number.'<br>
                        <b>Order Status : </b>'.$order_info->order_status.'<br>
                        <b>Payment Status : </b>'.$payment_status.'<br></td>
                        </tr>
                        </tbody>
                        </table>
                        <table style="border-collapse:collapse;width:100%;border-top:1px solid #dddddd;border-left:1px solid #dddddd;margin-bottom:20px">
                        <thead>
                        <tr>
                        <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;background-color:#efefef;font-weight:bold;text-align:left;padding:7px;color:#222222">Payment Address</td>
                        <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;background-color:#efefef;font-weight:bold;text-align:left;padding:7px;color:#222222">Shipping Address</td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                        <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:left;padding:7px">'.$order_info->customer_first_name.$order_info->customer_last_name.'<br>'.$order_info->customer_mobile_number.'<br>'.$order_info->shipping_details_address.'<br>Dhaka<br>Bangladesh</td>
                        <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:left;padding:7px">'.$order_info->shipping_full_name.'<br>'.$order_info->shipping_mobile_number.'<br>'.$order_info->shipping_details_address.'<br>Dhaka<br>Bangladesh</td>
                        </tr>
                        </tbody>
                        </table>
                        <table style="border-collapse:collapse;width:100%;border-top:1px solid #dddddd;border-left:1px solid #dddddd;margin-bottom:20px">
                        <thead>
                        <tr>
                        <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;background-color:#efefef;font-weight:bold;text-align:left;padding:7px;color:#222222">Product</td>
                        <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;background-color:#efefef;font-weight:bold;text-align:right;padding:7px;color:#222222">Quantity</td>
                        <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;background-color:#efefef;font-weight:bold;text-align:right;padding:7px;color:#222222">Price</td>
                        <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;background-color:#efefef;font-weight:bold;text-align:right;padding:7px;color:#222222">Total</td>
                        </tr>
                        </thead>
                        <tbody>';
                        foreach ($order_details as $all_order_details){
                        $msg.='<tr>
                        <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:left;padding:7px">'.$all_order_details->product_name.'<br>Product Code - '.$all_order_details->product_code.'</td>
                        <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:right;padding:7px">'.$all_order_details->product_qty.'</td>
                        <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:right;padding:7px">'.$all_order_details->product_price.'</td>
                        <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:right;padding:7px">'.$all_order_details->product_price*$all_order_details->product_qty.'</td>
                        </tr>


                        </tbody>';
                        }
                        $msg.='
                        <tfoot>
                        <tr>
                        <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:right;padding:7px" colspan="3"><b>Sub-Total:</b></td>
                        <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:right;padding:7px">৳ '.$this->cart->total().'</td>
                        </tr>
                        <tr>
                        <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:right;padding:7px" colspan="3"><b>Flat Shipping Rate:</b></td>
                        <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:right;padding:7px">৳ 80</td>
                        </tr>
                        <tr>
                        <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:right;padding:7px" colspan="3"><b>Total:</b></td>
                        <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:right;padding:7px">৳ '.($this->cart->total()+80) .'</td>
                        </tr>
                        </tfoot>
                        </table>
                        <p style="margin-top:0px;margin-bottom:20px">Please reply to this e-mail if you have any questions.</p>
                        </div>
                        </div>
                        </body>
                        </html>'; 
                     
                      ?>
                        <?php if($payment_method=='bkash'){ ?>
                        <div style="margin-left: 50px;color:blue;font-weight:bold;">
                            <p>Check Bkash Payment Details <a href="<?php echo base_url()?>Confirm-Payment/<?php echo $all_order_details->order_id;?>">Check Details</a></p>
                        </div>
                        <?php } ?>
                        <div style="margin-left:50px;margin-top:10px;">
                            <?php echo $msg;?>
                        </div>              
                    </div>
               </div>
</div>