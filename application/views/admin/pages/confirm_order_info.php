<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<script type="text/javascript"> 
function checkdelete(){
    return confirm("Are You Sure To Delete This Order");
}
</script>
<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2>Manage All Confirm Order</h2>
                        </div>
                        <h4 style="color:blue;font-weight: bold;margin-left: 10px;">
                            <?php
                            $message=$this->session->flashdata('message');
                            if($message){
                                echo $message;
                            }
                            ?>
                        </h4>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="datatable">
                                    <thead>
                                        <tr>
                                            <th class="center">SL</th>
                                            <th class="center">Order Date</th>
                                            <th class="center">Custom_order_id</th>
                                            <th class="center">Payment Type</th>
                                            <th class="center">Order Amount</th>
                                            <th class="center">Order Status</th>
                                            <th class="center">Payment Status</th>
                                            <th class="center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if($order_info){
                                        $i=0;
                                        foreach ($order_info as $all_order_info) {
                                            $i++;
                                        ?>
                                        <tr>
                                            <td class="center"><?php echo $i;?></td>
                                            <td class="center"><?php echo $all_order_info->order_date_time;?></td>
                                            <td class="center"><?php echo $all_order_info->custom_order_id;?></td>
                                            <td class="center">
                                                <?php if($all_order_info->cod_payment_id!=0){?>
                                                <span class="label label-danger">COD Payment</span>
                                                <?php } else{?>
                                                <span class="label label-success">Bkash Payment</span>
                                                <?php } ?>
                                            </td>
                                             <td class="center"><?php echo $all_order_info->order_total;?></td>
                                             <td class="center">
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
                                             <td class="center"><?php if($all_order_info->cod_payment_id==0){ echo $all_order_info->bkash_payment_status;}else{ echo "COD";}?></td>
                                            <td class="center">
                                                <a class="btn btn-success" href="<?php echo base_url()?>Order-Status/<?php echo $all_order_info->order_id;?>">
                                                    <i class="fa fa-adjust"></i>
                                                </a>
                                               <a class="btn btn-warning" href="<?php echo base_url()?>Order-View/<?php echo $all_order_info->order_id;?>">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a class="btn btn-danger" href="<?php //echo base_url()?>Delete-Category/<?php //echo $all_category_info->category_id;?>" onclick="return checkdelete();">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
    <!-- Start Category Edit Module Start.-->
<div class="modal fade" id="edit_category" tabindex="-1" role="dialog" aria-labelledby="add-modal-label">
      <div class="modal-dialog" role="document">
        <div class="modal-content" id="editdata">
          
        </div>
      </div>
    </div>
<!-- End Student List Edit Module Edit-->
</div>

<script>
$(document).ready(function(){
  $(document).on('click','#categoryedit',function(e){
    var uid = $(this).data('id');
    $.ajax({
      url: '<?php echo base_url()?>Super_admin/Edit_Category/'+uid,
      type: 'POST',
      dataType: 'html',
      success: function(data){
          $("#editdata").html(data);
         }
    });
  });
});

</script>

