<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>          
 <script>
tinymce.init({
  selector: '#editor2',
  
   plugins: [
      'advlist autolink lists link image code charmap print preview hr anchor pagebreak',
      'searchreplace wordcount visualblocks visualchars fullscreen',
      'insertdatetime media nonbreaking table contextmenu directionality',
      'emoticons paste textcolor colorpicker textpattern imagetools codesample toc help',
    ],
    toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | code',
    toolbar2: 'print preview media | fontselect fontsizeselect | forecolor backcolor emoticons | codesample help',
    fontsize_formats: "8pt 10pt 12pt 14pt 18pt 24pt 36pt",
    image_advtab: true,
  // enable title field in the Image dialog
    image_title: true, 
  // enable automatic uploads of images represented by blob or data URIs
    automatic_uploads: true,
  // add custom filepicker only to Image dialog
  file_picker_types: 'image',
  file_picker_callback: function(cb, value, meta) {
    var input = document.createElement('input');
    input.setAttribute('type', 'file');
    input.setAttribute('accept', 'image/*');

    input.onchange = function() {
      var file = this.files[0];
      var reader = new FileReader();
      
      reader.onload = function () {
        var id = 'blobid' + (new Date()).getTime();
        var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
        var base64 = reader.result.split(',')[1];
        var blobInfo = blobCache.create(id, file, base64);
        blobCache.add(blobInfo);

        // call the callback and populate the Title field with the file name
        cb(blobInfo.blobUri(), { title: file.name });
      };
      reader.readAsDataURL(file);
    };
    
    input.click();
  }
});
</script>
<script type="text/javascript">
tinymce.init({
  selector: '#editor1'  // change this value according to your HTML
});

</script>
<div id="page-inner">
                 <!-- /. ROW  -->
               <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           <h2>Add Product Details</h2>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                    <span style="color:blue;font-weight: bold;font-size:16px;"><?php 
                                    $message=$this->session->flashdata('message');
                                    if($message){
                                        echo $message;
                                    }
                                    ?></span>
                                    
                                <form role="form" action="<?php echo base_url()?>Save_Product" method="post" enctype="multipart/form-data">
                                        
                                        
                                         <div class="form-group" >
                                            <label class="col-sm-4">Product Name</label>
                                           <div class="col-sm-5">
                                               <input class="form-control" type="text" size="60" onkeyup="maxlength(this,'product_name',26)" name="product_name" required=""/>
                                           </div>
                                           <div class="col-sm-2">
                                               <input style="color:red;font-weight: bold;" class="form-control" disabled maxlength="26" size="1" value="Max Length-26" id="product_name"/>
                                           </div>
                                           </div>
                                    
                                         <div class="form-group">
                                            <label class="col-sm-4 control-label">Product Price</label>
                                           <div class="col-sm-5">
                                            <input class="form-control" type="number" name="product_price" required=""/>
                                           </div>
                                           </div>
                                         <div class="form-group">
                                            <label class="col-sm-4 control-label">Product New Price</label>
                                           <div class="col-sm-5">
                                            <input class="form-control" type="number" name="product_new_price" required=""/>
                                           </div>
                                           </div>
                                         <div class="form-group">
                                            <label class="col-sm-4 control-label">Product Total Quantity</label>
                                           <div class="col-sm-5">
                                            <input class="form-control" type="number" name="product_quantity" required=""/>
                                           </div>
                                           </div>
                                        
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Product Category Name</label>
                                          <div class="col-sm-5">
                                            <select class="form-control" id="category" name="category_id" required="">
                                                <option value="#">Select Product Category Name</option>
                                                <?php 
                                                if($publish_category){
                                                    foreach ($publish_category as $all_publish_category){
                                                 ?>
                                                <option value="<?php echo $all_publish_category->category_id;?>"><?php echo $all_publish_category->category_name; ?></option>
                                                <?php } ?>
                                                <?php } ?>
                                            </select>
                                          </div>
                                        </div>
                                         
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Product Sub Category Name</label>
                                          <div class="col-sm-5">
                                            <select class="form-control" id="subcategory" name="sub_category_id" required="">
                                                <option value="">Select Product Sub Category</option>
                                            </select>
                                          </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Product Manufacture Name</label>
                                          <div class="col-sm-5">
                                            <select class="form-control" name="manufacture_id" required="">
                                                <option value="#">Select Manufacture Name</option>
                                                <?php 
                                                if($publish_manufacture){
                                                    foreach ($publish_manufacture as $all_manufacture_info) {
                                                ?>
                                                <option value="<?php echo $all_manufacture_info->manufacture_id; ?>"><?php echo $all_manufacture_info->manufacture_name; ?></option>
                                                <?php } ?>
                                                <?php } ?>
                                            </select>
                                          </div>
                                        </div>
                                        
                                         <div class="form-group">
                                            <label class="col-sm-4 control-label">Upload Product Image</label>
                                           <div class="col-sm-5">
                                            <input class="form-control" type="file" name="product_image" required=""/>
                                           </div>
                                           </div>

                                            <div class="form-group">
                                                <label class="col-sm-4 control-label"></label>
                                           <div class="col-sm-5">
                                               <span class="form-control"></span>
                                           </div>

                                            </div>
                                    
                                           <div class="form-group">
                                            <label class="col-sm-4 control-label">Product Publication Status</label>
                                          <div class="col-sm-5">
                                            <select class="form-control" name="product_publication_status" required="">
                                                <option value="#">Select Publication Status</option>
                                                <option value="1">Published</option>
                                                <option value="0">Unpublished</option>
                                            </select>
                                          </div>
                                        </div>
                                           <div class="form-group">
                                            <label class="col-sm-4 control-label">Product Is Featured</label>
                                          <div class="col-sm-5">
                                           <input class="form-control"  type="checkbox" name="featured" id="" />
                                          </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-sm-4 control-label">Product Short Description</label>
                                            <div class="col-sm-5">
                                            <textarea name="product_short_description" onkeyup="maxlength(this,'short_description',70)" cols="58" rows="1"></textarea>
                                            </div>
                                            <div class="col-sm-2">
                                               <input style="color:red;font-weight: bold;" class="form-control" disabled maxlength="32" size="1" value="Max Length-70" id="short_description"/>
                                           </div>
                                            </div>
                                         <div class="form-group">
                                            <label class="col-sm-4 control-label">Product Long Description</label>
                                            <div class="col-sm-5">
                                            <textarea name="product_long_description" id="editor2"></textarea>
                                            </div>
                                            </div>
                                      
                                        <label class="col-sm-6 control-label"></label> 
                                        <div class="col-sm-6">
                                        <button type="submit" class="btn btn-primary">Add Product Information</button>
                                        </div>
                                    </form>
                                
                            </div>
                        </div>
                    </div>
                     <!-- End Form Elements -->
                </div>
            </div>

                <!-- /. ROW  -->
    </div>
             <!-- /. PAGE INNER  -->
   
      <script>
$(document).ready(function(){
  $("#category").change(function(){
    var uid = $(this).val();
    $.ajax({
      url: '<?php echo base_url()?>Super_admin/dependent_publish_subcategory/'+uid,
      type: 'POST',
      dataType: 'html',
      success: function(data){
          $("#subcategory").html(data);
         }
    });
  });
});

</script>
<script>
function maxlength(field,field2,maxlimit)
{
var countfield = document.getElementById(field2);
if ( field.value.length > maxlimit ) {
field.value = field.value.substring( 0, maxlimit );
return false;
} else {
countfield.value = maxlimit - field.value.length;
}
}
</script>