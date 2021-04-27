<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>          
 <script>
tinymce.init({
  selector: '#editor',
  
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
<div id="page-inner">
                 <!-- /. ROW  -->
               <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                              <h2>Add Product Sub Category.</h2>
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
                                  
                                    <form role="form" action="<?php echo base_url()?>Save_Subcategory" method="post">
                                        <div class="form-group">
                                            <label>Sub Category Name </label>
                                            <input class="form-control" type="text" name="sub_category_name" required=""/>
                                        </div>
                                        
                                         <div class="form-group">
                                            <label>Sub Category Short Description</label>
                                            <input class="form-control" type="text" name="sub_category_description" required=""/>
                                        </div>
                                        
                                         <div class="form-group">
                                            <label>Select Category For Sub Category</label>
                                            <select class="form-control" name="category_id" required="">
                                                <option value="">Select Any Category </option>
                                                <?php foreach ($publish_category as $all_publish_category ){ ?>
                                                <option value="<?php echo $all_publish_category->category_id;?>"><?php echo $all_publish_category->category_name; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                         <div class="form-group">
                                            <label>Publication Status</label>
                                            <select class="form-control" name="publication_status" required="">
                                                <option value="">Select Publication Status</option>
                                                <option value="1">Published</option>
                                                <option value="0">Unpublished</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Add Sub Category</button>
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
   

