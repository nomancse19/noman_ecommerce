<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>  

<form class="form-horizontal" id="add-form" action="<?php base_url()?>Super_admin/update_subcategory_info/<?php echo $all_sub_category_by_id->sub_category_id; ?>" method="post">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="add-modal-label">All Sub Category Update Option</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="add-mobile" class="col-xs-5 control-label">Sub Category Name</label>
                    <div class="col-sm-6">
                       <input class="form-control" type="text" value="<?php echo $all_sub_category_by_id->sub_category_name;?>" name="sub_category_name" required=""/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="add-mobile" class="col-xs-5 control-label">Sub Category Description</label>
                    <div class="col-sm-6">
                         <input class="form-control" type="text" value="<?php echo $all_sub_category_by_id->sub_category_description;?>"  name="sub_category_description" required=""/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="add-mobile" class="col-xs-5 control-label">Select Category</label>
                    <div class="col-sm-6">
                        <select class="form-control" name="category_id" required="">
                            <option selected="" value="<?php echo $all_sub_category_by_id->category_id; ?>"><?php echo $all_sub_category_by_id->category_name; ?></option>
                       <?php $publish_category=$this->super_admin_model->select_all_published_category();
                          foreach ($publish_category as $all_publish_category) {
                             ?>
                             <option value="<?php echo $all_publish_category->category_id;?>"><?php echo $all_publish_category->category_name; ?></option>   
                          <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="btn" class="btn btn-primary">Update Sub Category Information</button>
          </div>
    </form>

