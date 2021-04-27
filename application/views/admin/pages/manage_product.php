<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<script type="text/javascript"> 
function checkdelete(){
    return confirm("Are You Sure To Delete This Category");
}
</script>
<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2> Manage All Product</h2>
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
                                            <th class="center">Name</th>
                                            <th class="center">Quantity</th>
                                            <th class="center">Category</th>
                                            <th class="center">S.Category</th>
                                            <th class="center">N.Price</th>
                                            <th class="center">Image</th>
                                            <th class="center">Status</th>
                                            <th class="center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if($product_info){
                                        $i=0;
                                        foreach ($product_info as $all_product_info) {
                                            $i++;
                                        ?>
                                        <tr>
                                            <td class="center"><?php echo $i;?></td>
                                            <td class="center"><?php echo $all_product_info->product_name;?></td>
                                            <td class="center"><?php echo $all_product_info->product_quantity;?></td>
                                            <td class="center"><?php echo $all_product_info->category_name;?></td>
                                            <td class="center"><?php echo $all_product_info->sub_category_name;?></td>
                                            <td class="center"><?php echo $all_product_info->product_new_price;?></td>
                                            <td class="center"><img src="<?php echo base_url().$all_product_info->product_image;?>" width="70"height="50" alt="" /></td>
                                            <td class="center">
                                                <?php if($all_product_info->product_publication_status==1){?>
                                                <span class="label label-success">Active</span>
                                                <?php } else{?>
                                                <span class="label label-danger">Inactive</span>
                                                <?php } ?>
                                            </td>
                                            <td class="center">
                                                <?php if($all_product_info->product_publication_status==1){?>
                                                <a class="btn btn-danger" href="<?php echo base_url()?>Unpublish-Category/<?php echo $all_product_info->product_id;?>">
                                                    <i class="fa fa-thumbs-down"></i>
                                                </a>
                                                <?php } else{?>
                                                <a class="btn btn-success" href="<?php echo base_url()?>Publish-Category/<?php echo $all_product_info->product_id;?>">
                                                    <i class="fa fa-thumbs-up"></i>
                                                </a>
                                                <?php } ?>
                                                
                                                
                                                 <a class="btn btn-success"  href="<?php echo base_url()?>Edit_product/<?php echo $all_product_info->product_id;?>" >
                                                     <i class="fa fa-edit"></i></a>
                                                </button>
                                                <a class="btn btn-danger" href="<?php echo base_url()?>Delete-Product/<?php echo $all_product_info->product_id;?>" onclick="return checkdelete();">
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

