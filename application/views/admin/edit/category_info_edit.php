<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>  

<form class="form-horizontal" id="add-form" action="<?php base_url()?>Super_admin/update_category_info/<?php echo $all_category_by_id->category_id; ?>" method="post">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="add-modal-label">All Category Update Option</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="add-mobile" class="col-xs-5 control-label">Category Name</label>
                    <div class="col-sm-6">
                       <input class="form-control" type="text" value="<?php echo $all_category_by_id->category_name;?>" name="category_name" required=""/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="add-mobile" class="col-xs-5 control-label">Category Short Description</label>
                    <div class="col-sm-6">
                         <input class="form-control" type="text" value="<?php echo $all_category_by_id->category_description;?>"  name="category_description" required=""/>
                    </div>
                </div>
            </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="btn" class="btn btn-primary">Update Category Information</button>
          </div>
    </form>
