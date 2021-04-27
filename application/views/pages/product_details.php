
<div class="span9">
    
    <ul class="breadcrumb">
    <li><a href="<?php echo base_url(); ?>">Home</a> <span class="divider">/</span></li>
    <li><a href="products.html">Products</a> <span class="divider">/</span></li>
    <li class="active">product Details</li>
    </ul>
        <div id="detail_cart">
         </div> 
	<div class="row">	  
	<div id="gallery" class="span3">
            <a href="<?php echo base_url().$all_join_product->product_image;?>" title="<?php echo $all_join_product->product_name;?>">
                <img src="<?php echo base_url().$all_join_product->product_image; ?>" style="width:100%" alt="<?php echo $all_join_product->product_name;?>"/>
            </a>
	  <div id="differentview" class="moreOptopm carousel slide">
                <div class="carousel-inner">
                  <div class="item active">
                   <a href="<?php echo base_url().$all_join_product->product_image; ?>"> <img style="width:29%" src="<?php echo base_url().$all_join_product->product_image; ?>" alt=""/></a>
                   <a href="<?php echo base_url().$all_join_product->product_image; ?>"> <img style="width:29%" src="<?php echo base_url().$all_join_product->product_image; ?>" alt=""/></a>
                   <a href="<?php echo base_url().$all_join_product->product_image; ?>" > <img style="width:29%" src="<?php echo base_url().$all_join_product->product_image; ?>" alt=""/></a>
                  </div>
                  <div class="item">
                    <a href="<?php echo base_url().$all_join_product->product_image; ?>" > <img style="width:29%" src="<?php echo base_url().$all_join_product->product_image; ?>" alt=""/></a>
                    <a href="<?php echo base_url().$all_join_product->product_image; ?>" > <img style="width:29%" src="<?php echo base_url().$all_join_product->product_image; ?>" alt=""/></a>
                    <a href="<?php echo base_url().$all_join_product->product_image; ?>" > <img style="width:29%" src="<?php echo base_url().$all_join_product->product_image; ?>" alt=""/></a>
                  </div>
                </div>
              <!--  
			  <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
              <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a> 
			  -->
              </div>
			  
			 <div class="btn-toolbar">
			  <div class="btn-group">
				<span class="btn"><i class="icon-envelope"></i></span>
				<span class="btn" ><i class="icon-print"></i></span>
				<span class="btn" ><i class="icon-zoom-in"></i></span>
				<span class="btn" ><i class="icon-star"></i></span>
				<span class="btn" ><i class=" icon-thumbs-up"></i></span>
				<span class="btn" ><i class="icon-thumbs-down"></i></span>
			  </div>
			</div>
			</div>
			<div class="span6">
				<h3><?php echo $all_join_product->product_name;?></h3>
				<p style="font-size:15px;"><?php echo $all_join_product->product_short_description;?></p>
				<hr class="soft"/>
                                <span class="form-horizontal qtyFrm">
				  <div class="control-group">
                                      <label class="control-label"><span>BDT <?php echo $all_join_product->product_new_price;?>.00 <span style="font-size:25px;">&#2547;</span></span></label>
					<div class="controls">
                                            <input type="number" name="qty" class="span1" id="qty" value="1" min="1" placeholder="Qty."/>
					  <button type="button" class="add_cart btn btn-large btn-primary pull-right" data-productid="<?php echo $all_join_product->product_id;?>" data-productcode="<?php echo $all_join_product->product_code;?>" data-productname="<?php echo $all_join_product->product_name;?>" data-productprice="<?php echo $all_join_product->product_new_price;?>" data-productimage="<?php echo $all_join_product->product_image;?>"> Add to cart <i class=" icon-shopping-cart"></i></button>
					</div>
				  </div>
				</span>
                                <p style="font-size: 20px;">Product Code : <span style="color:blue;font-weight: bold;"> <?php echo $all_join_product->product_code; ?> </span></p>
				<hr class="soft"/>
                                
				<h4><?php echo $all_join_product->product_quantity;?> items in stock</h4>
                              
				<hr class="soft clr"/>
                                <h5>
				<?php echo $all_join_product->product_short_description; ?>
                                </h5>
				<a class="btn btn-small pull-right" href="#detail">More Details</a>
				<br class="clr"/>
			<a href="#" name="detail"></a>
			<hr class="soft"/>
			</div>
			
			<div class="span9">
            <ul id="productDetail" class="nav nav-tabs">
              <li class="active"><a href="#home" data-toggle="tab">Product Details</a></li>
              <li><a href="#profile" data-toggle="tab">Related Products</a></li>
            </ul>
            <div id="myTabContent" class="tab-content">
              <div class="tab-pane fade active in" id="home">
			  <h4>Product Information</h4>
                         <table class="table table-bordered">
				<tbody>
				<tr class="techSpecRow"><th colspan="2">Product Details</th></tr>
				<tr class="techSpecRow"><td class="techSpecTD1" width="35%">Product Category:</td><td class="techSpecTD2"><?php echo $all_join_product->category_name; ?></td></tr>
                                <tr class="techSpecRow"><td class="techSpecTD1" width="35%">Product Sub Category:</td><td class="techSpecTD2"> <?php echo $all_join_product->sub_category_name; ?></td></tr>
				<tr class="techSpecRow"><td class="techSpecTD1" width="35%">Product Manufacture:</td><td class="techSpecTD2"><?php echo $all_join_product->manufacture_name; ?></td></tr>

				</tbody>
				</table>
				
				<h5>Features</h5>
				<?php echo $all_join_product->product_long_description; ?>
              </div>
		<div class="tab-pane fade" id="profile">
		<div id="myTab" class="pull-right">
		 <a href="#listView" data-toggle="tab"><span class="btn btn-large"><i class="icon-list"></i></span></a>
		 <a href="#blockView" data-toggle="tab"><span class="btn btn-large btn-primary"><i class="icon-th-large"></i></span></a>
		</div>
		<br class="clr"/>
		<hr class="soft"/>
		<div class="tab-content">
			<div class="tab-pane active" id="blockView">
				<ul class="thumbnails">
					<li class="span3">
					  <div class="thumbnail">
						<a href="product_details.html"><img src="themes/images/products/10.jpg" alt=""/></a>
						<div class="caption">
						  <h5>Manicure &amp; Pedicure</h5>
						  <p> 
							Lorem Ipsum is simply dummy text. 
						  </p>
						  <h4 style="text-align:center"><a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">&euro;222.00</a></h4>
						</div>
					  </div>
					</li>
					<li class="span3">
					  <div class="thumbnail">
						<a href="product_details.html"><img src="themes/images/products/11.jpg" alt=""/></a>
						<div class="caption">
						  <h5>Manicure &amp; Pedicure</h5>
						  <p> 
							Lorem Ipsum is simply dummy text. 
						  </p>
						  <h4 style="text-align:center"><a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">&euro;222.00</a></h4>
						</div>
					  </div>
					</li>
					<li class="span3">
					  <div class="thumbnail">
						<a href="product_details.html"><img src="themes/images/products/12.jpg" alt=""/></a>
						<div class="caption">
						  <h5>Manicure &amp; Pedicure</h5>
						  <p> 
							Lorem Ipsum is simply dummy text. 
						  </p>
						   <h4 style="text-align:center"><a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">&euro;222.00</a></h4>
						</div>
					  </div>
					</li>
					<li class="span3">
					  <div class="thumbnail">
						<a href="product_details.html"><img src="themes/images/products/13.jpg" alt=""/></a>
						<div class="caption">
						  <h5>Manicure &amp; Pedicure</h5>
						  <p> 
							Lorem Ipsum is simply dummy text. 
						  </p>
						   <h4 style="text-align:center"><a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">&euro;222.00</a></h4>
						</div>
					  </div>
					</li>
					<li class="span3">
					  <div class="thumbnail">
						<a href="product_details.html"><img src="themes/images/products/1.jpg" alt=""/></a>
						<div class="caption">
						  <h5>Manicure &amp; Pedicure</h5>
						  <p> 
							Lorem Ipsum is simply dummy text. 
						  </p>
						   <h4 style="text-align:center"><a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">&euro;222.00</a></h4>
						</div>
					  </div>
					</li>
					<li class="span3">
					  <div class="thumbnail">
						<a href="product_details.html"><img src="themes/images/products/2.jpg" alt=""/></a>
						<div class="caption">
						  <h5>Manicure &amp; Pedicure</h5>
						  <p> 
							Lorem Ipsum is simply dummy text. 
						  </p>
						   <h4 style="text-align:center"><a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">&euro;222.00</a></h4>
						</div>
					  </div>
					</li>
				  </ul>
			<hr class="soft"/>
			</div>
		</div>
				<br class="clr">
					 </div>
		</div>
          </div>

	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('.add_cart').click(function(){
			var product_id    = $(this).data("productid");
			var product_name  = $(this).data("productname");
			var product_price = $(this).data("productprice");
			var product_image = $(this).data("productimage");
			var product_code = $(this).data("productcode");
			var qty   	  = $('#qty').val();
			$.ajax({
                            url : "<?php echo base_url();?>cart/add_to_cart",
                            type : "POST",
                            data : {'product_id':product_id,'product_code':product_code,'product_name':product_name,'product_price':product_price,'product_image':product_image,'qty':qty},
                            success: function(data){
                                setTimeout(function(){
                                  location.reload();
                                 },5000)  
                                 $('#detail_cart').html(data);
                            }      
			});
                      });
             
	});
</script>


