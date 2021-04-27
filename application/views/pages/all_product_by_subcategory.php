<div class="span9">
    <ul class="breadcrumb">
		<li><a href="<?php echo base_url(); ?>">Home</a> <span class="divider">/</span></li>
		<li class="active">All  <?php echo $subcategory_name; ?>  Products</li>
    </ul>
    <h3>You Are Showing,All <span style="color:blue;"> <?php echo $subcategory_name; ?> </span>Product <small class="pull-right"> <?php echo $this->welcome_model->all_product_count_by_sub_category_id($subcategory_id); ?> products are available </small></h3>	
	<hr class="soft"/>
	  
<div id="myTab" class="pull-right">
 <a href="#listView" data-toggle="tab"><span class="btn btn-large"><i class="icon-list"></i></span></a>
 <a href="#blockView" data-toggle="tab"><span class="btn btn-large btn-primary"><i class="icon-th-large"></i></span></a>
</div>
<br class="clr"/>
<div class="tab-content">
	<div class="tab-pane" id="listView">
            <?php 
            if($all_published_product){
           foreach ($all_published_product as $all_publish_product_info) {
            ?>
		<div class="row">	  
			<div class="span2">
				<img src="<?php echo base_url().$all_publish_product_info->product_image; ?>" alt=""/>
			</div>
			<div class="span4">
				<h3>New | Available</h3>				
				<hr class="soft"/>
				<h5><?php echo $all_publish_product_info->product_name; ?></h5>
				<p>
				<?php echo $all_publish_product_info->product_short_description; ?>
				</p>
				<a class="btn btn-small pull-right" href="<?php echo base_url();?>product_details/<?php echo $this->welcome_model->encryptstring($all_publish_product_info->product_id); ?>">View Details</a>
				<br class="clr"/>
			</div>
			<div class="span3 alignR">
			<form class="form-horizontal qtyFrm">
                            <h3><?php echo " &#2547 ".number_format($all_publish_product_info->product_new_price,2); ?></h3>
			
			  <button type="button" class="add_cart btn btn-large btn-primary" data-productid="<?php echo $all_publish_product_info->product_id;?>" data-productcode="<?php echo $all_publish_product_info->product_code;?>" data-productname="<?php echo $all_publish_product_info->product_name;?>" data-productprice="<?php echo $all_publish_product_info->product_new_price;?>" data-productimage="<?php echo $all_publish_product_info->product_image;?>"> Add to <i class=" icon-shopping-cart"></i></button>
			  <a href="<?php echo base_url();?>product_details/<?php echo $this->welcome_model->encryptstring($all_publish_product_info->product_id); ?>" class="btn btn-large"><i class="icon-zoom-in"></i></a>
			
				</form>
			</div>
		</div>
		<hr class="soft"/>
                
           <?php } ?>
           <?php } else{redirect('/Products');} ?>
	</div>
    
	<div class="tab-pane  active" id="blockView">
		<ul class="thumbnails">
                     <?php 
                        if($all_published_product){
                    // foreach ($all_publish_product as $all_publish_product_info) {
                       foreach ($all_published_product as $all_publish_product_info) {
                        ?>
			<li class="span3">
			  <div class="thumbnail">
				<a href="<?php echo base_url();?>product_details/<?php echo $this->welcome_model->encryptstring($all_publish_product_info->product_id); ?>"><img src="<?php echo base_url().$all_publish_product_info->product_image; ?>" alt=""/></a>
				<div class="caption">
				  <h5><?php echo $all_publish_product_info->product_name; ?></h5>
				  <p> 
				<?php echo $all_publish_product_info->product_short_description; ?>	
				  </p>
                                  <h4 style="text-align:center"><a class="btn" href="<?php echo base_url();?>product_details/<?php echo $this->welcome_model->encryptstring($all_publish_product_info->product_id); ?>"><i class="icon-zoom-in"></i></a>  <button type="button" class="add_cart btn" data-productid="<?php echo $all_publish_product_info->product_id;?>" data-productcode="<?php echo $all_publish_product_info->product_code;?>" data-productname="<?php echo $all_publish_product_info->product_name;?>" data-productprice="<?php echo $all_publish_product_info->product_new_price;?>" data-productimage="<?php echo $all_publish_product_info->product_image;?>"> Add to <i class="icon-shopping-cart"></i></button> <a class="btn btn-primary" href="#"><?php echo " &#2547 ".number_format($all_publish_product_info->product_new_price,2); ?></a></h4>
				</div>
			  </div>
			</li>
                       <?php } ?>
                       <?php } else{redirect('/Products');} ?>
			
		  </ul>
	<hr class="soft"/>
	</div>
</div>

<div class="pagination pagination-centered" id="pagination">
          <ul>
            <li><?php echo $links; ?></li>
        </ul>
      </div>
<br class="clr"/>
</div>


<script type="text/javascript">
	$(document).ready(function(){
		$('.add_cart').click(function(){
			var product_id    = $(this).data("productid");
			var product_name  = $(this).data("productname");
			var product_price = $(this).data("productprice");
			var product_image = $(this).data("productimage");
			var product_code = $(this).data("productcode");
			var qty   	  = 1;
			$.ajax({
                            url : "<?php echo base_url();?>cart/add_to_cart",
                            type : "POST",
                            data : {'product_id':product_id,'product_code':product_code,'product_name':product_name,'product_price':product_price,'product_image':product_image,'qty':qty},
                            success: function(data){
                               alert('Product Added To Cart Success');
                                location.reload();
                            }      
			});
                      });
          
	});
</script>