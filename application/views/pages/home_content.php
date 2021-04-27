<div class="span9">		
			<div class="well well-small">
			<h4>Featured Products <small class="pull-right"><?php echo $this->welcome_model->total_all_featured_published_product();?>+ featured products</small></h4>
			<div class="row-fluid">
			<div id="featured" class="carousel slide">
			<div class="carousel-inner">
			  <div class="item active">
			  <ul class="thumbnails">
                              <?php
                              $featured_product_info=$this->welcome_model->all_featured_published_product_info();
                              foreach ($featured_product_info as $all_featured_product_info) {
                              ?>
				<li class="span3">
				  <div class="thumbnail">
				  <i class="tag"></i>
                                  <a href="<?php echo base_url();?>product_details/<?php echo $this->welcome_model->encryptstring($all_featured_product_info->product_id); ?>"><img src="<?php echo base_url().$all_featured_product_info->product_image;?>" alt=""></a>
                                  <div class="caption">
					  <h5><?php echo $all_featured_product_info->product_name; ?></h5>
					  <h4><a class="btn" href="<?php echo base_url();?>product_details/<?php echo $this->welcome_model->encryptstring($all_featured_product_info->product_id); ?>">VIEW</a> <span class="pull-right"><?php echo $all_featured_product_info->product_new_price; ?>.00<span style="font-size:22px;">&#2547;</span></span></h4>
					</div>
				  </div>
				</li>
                              <?php } ?>
			  </ul>
			  </div>
                            <?php
                             $last_featured_product=$this->welcome_model->last_featured_published_product_info();
                             if($last_featured_product){
                             ?>
                             <div class="item">
			  <ul class="thumbnails">
                              <?php
                              foreach ($last_featured_product as $last_featured_product_info) {
                              ?>
				<li class="span3">
				  <div class="thumbnail">
				  <i class="tag"></i>
                                  <a href="<?php echo base_url();?>product_details/<?php echo $this->welcome_model->encryptstring($last_featured_product_info->product_id); ?>"><img src="<?php echo base_url().$last_featured_product_info->product_image;?>"width="150" alt=""></a>
                                  <div class="caption">
					    <h5><?php echo $last_featured_product_info->product_name; ?></h5>
					  <h4><a class="btn" href="<?php echo base_url();?>product_details/<?php echo $this->welcome_model->encryptstring($last_featured_product_info->product_id); ?>">VIEW</a> <span class="pull-right"><?php echo $last_featured_product_info->product_new_price; ?></span></h4>
					</div>
				  </div>
				</li>
                              <?php } ?>
			  </ul>
			  </div>
                             <?php } ?>
			  </div>
			  <a class="left carousel-control" href="#featured" data-slide="prev">‹</a>
			  <a class="right carousel-control" href="#featured" data-slide="next">›</a>
			  </div>
			  </div>
		</div>
		<h4>Latest Products </h4>
                                
			  <ul class="thumbnails">
                              <?php 
                                    //$all_publish_product=$this->welcome_model->all_published_product_info();
                                    if($all_published_product){
                                       // foreach ($all_publish_product as $all_publish_product_info) {
                                       foreach ($all_published_product as $all_publish_product_info) {

                                    ?>
				<li class="span3">
				  <div class="thumbnail">
                                      <a  href="<?php echo base_url();?>product_details/<?php echo $this->welcome_model->encryptstring($all_publish_product_info->product_id); ?>"><img src="<?php echo base_url().$all_publish_product_info->product_image ;?>" alt=""/></a>
                                      <div class="caption">
					  <h5><?php echo $all_publish_product_info->product_name; ?></h5>
					  <p> 
                                            <?php echo $all_publish_product_info->product_short_description; ?>. 
					  </p>
					 
					  <h4 style="text-align:center"><a class="btn" href="<?php echo base_url();?>product_details/<?php echo $this->welcome_model->encryptstring($all_publish_product_info->product_id); ?>"> <i class="icon-zoom-in"></i></a>  <button type="button" class="add_cart btn" data-productid="<?php echo $all_publish_product_info->product_id;?>" data-productcode="<?php echo $all_publish_product_info->product_code;?>" data-productname="<?php echo $all_publish_product_info->product_name;?>" data-productprice="<?php echo $all_publish_product_info->product_new_price;?>" data-productimage="<?php echo $all_publish_product_info->product_image;?>"> Add to <i class="icon-shopping-cart"></i></button> <a class="btn btn-primary" href="#"><?php echo $all_publish_product_info->product_new_price;?>.00<span style="font-size:20px;">&#2547;</span></a></h4>
					</div>
				  </div>
                                   
				</li>
                                <?php } ?>
                              <?php } ?>
			  </ul>	
          <a  style="color:blue;font-size: 21px;margin-left: 300px;" href="<?php echo base_url();?>Products">More Product</a>     
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