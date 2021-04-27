<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php echo $title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

<!-- Bootstrap style --> 

    <link id="callCss" rel="stylesheet" href="<?php echo base_url();?>front_end/themes/bootshop/bootstrap.min.css" media="screen"/>
    <link href="<?php echo base_url();?>front_end/themes/css/base.css" rel="stylesheet" media="screen"/>
<!-- Bootstrap style responsive -->	
	<link href="<?php echo base_url();?>front_end/themes/css/bootstrap-responsive.min.css" rel="stylesheet"/>
	<link href="<?php echo base_url();?>front_end/themes/css/font-awesome.css" rel="stylesheet" type="text/css">
<!-- Google-code-prettify -->	
	<link href="<?php echo base_url();?>front_end/themes/js/google-code-prettify/prettify.css" rel="stylesheet"/>
<!-- fav and touch icons -->
    <link rel="shortcut icon" href="<?php echo base_url();?>front_end/themes/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url();?>front_end/themes/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url();?>front_end/themes/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url();?>front_end/themes/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo base_url();?>front_end/themes/images/ico/apple-touch-icon-57-precomposed.png">
	<style type="text/css" id="enject"></style>
  
        <style type="text/css">
            .short_image{
                width:180px;
                height:150px;
            }
            .long_image{
                width:220px;
                height:180px;
            }
            .red{
                color:red;
            }
            .f_red{
                color:red;
                font-weight: bold;
            }
            .green{
                color:green;
            }
            .f_green{
                color:green;
                font-weight: bold;
            }
            
            #pagination {
                font-size: 25px;
                padding: 10px;
            }
        </style>
        	<script src="<?php echo base_url();?>front_end/themes/js/jquery.js" type="text/javascript"></script>
  </head>
<body>
<div id="header">
<div class="container">
<div id="welcomeLine" class="row">
    <div class="span6">
        <?php if($this->session->userdata('customer_id')){?>
      <div class="dropdown">
 <button class="btn btn-primary dropdown-toggle" type="button" aria-haspopup="true" data-toggle="dropdown">Welcome, <?php echo $this->customer_model->all_customer_info_customer_id($this->session->userdata('customer_id'))->customer_first_name.' '.$this->customer_model->all_customer_info_customer_id($this->session->userdata('customer_id'))->customer_last_name; ?>
        <span class="caret"></span></button>
        <ul class="dropdown-menu">
            <li style="border:1px solid #3A3F44;"><a href="<?php echo base_url();?>Customer-Info"><i class="icon-chevron-right"></i>Manage My Account</a></li>
          <li style="border:1px solid #3A3F44;"><a href="<?php echo base_url();?>Order-Info"><i class="icon-chevron-right"></i>My Order</a></li>
          <li style="border:1px solid #3A3F44;"><a href="#"><i class="icon-chevron-right"></i>Track My Order</a></li>
          <li style="border:1px solid #3A3F44;"><a href="<?php echo base_url();?>customer/signout"><i class="icon-chevron-right"></i>Sign Out</a></li>
        </ul>
      </div> 
        <?php } ?>
    </div>
	<div class="span6">
	<div class="pull-right">
		<a href="<?php echo base_url();?>Cart-details"><span>&#2547;</span>
		<span class="btn btn-mini"><?php echo $this->cart->format_number($this->cart->total());?></span></a>
		<a href="<?php echo base_url();?>Cart-details"><span class="btn btn-mini btn-primary"><i class="icon-shopping-cart icon-white"></i> [ <?php echo count($this->cart->contents());?> ] Itemes in your cart </span> </a> 
	</div>
	</div>
</div>
<!-- Navbar ================================================== -->
<div id="logoArea" class="navbar">
<a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
</a>
  <div class="navbar-inner">
      <a class="brand" href="<?php echo base_url();?>"><h1 style="color:#fff;">Beauty Shop</h1></a>
            <form class="form-inline navbar-search" method="GET" action="">
                <input type="text"  name="srch"/> 
                <button type="submit" name="btn" class="btn btn-primary">Search</button>
           </form>
  
      
    <ul id="topMenu" class="nav pull-right">
        <li class=""><a href="<?php echo base_url();?>Products">All Product</a></li>
	 <li class=""><a href="contact.html">Contact</a></li>
	 <li class=""><a href="<?php echo base_url();?>Create-Customer">Register</a></li>
         <?php if(!empty($this->cart->total())){ ?>
         <li class=""><a href="<?php echo base_url() ?>Checkout">Checkout</a></li>
         <?php } ?>
         <?php if(!$this->session->userdata('customer_id')){?>
         <li class="">
             <a href="<?php echo base_url();?>Login" role="button"  style="padding-right:0"><span class="btn btn-success">Login</span></a>
	</li>
         <?php } else{ ?>
        <li class="">
             <a href="<?php echo base_url();?>customer/signout" role="button"  style="padding-right:0"><span class="btn btn-danger">Logout</span></a>
	</li>
         <?php } ?>
    </ul>
  </div>
</div>
</div>
</div>
<!-- Header End====================================================================== -->
<?php if(isset($slider)){ echo $slider;} ?> 
<div id="mainBody">
	<div class="container">
	<div class="row">
<!-- Sidebar ================================================== -->
<!-- <a id="myCart" href="<?php echo base_url();?>Cart-details"><img src="<?php echo base_url();?>front_end/themes/images/ico-cart.png" alt="cart"> <?php echo count($this->cart->contents());?>  Items in your cart  <span class="badge badge-warning pull-right">&#2547;<?php echo $this->cart->format_number($this->cart->total());?></span></a> -->
	<div id="sidebar" class="span3">
            <div class="well well-small">
       <form class="form-inline navbar-search" method="post" action="<?php echo base_url();?>Category-Product" >
        <select  name="category_id" style="width:190px;">
                    <option value="">Select Category</option>
                    <?php $publish_category=$this->super_admin_model->select_all_published_category(); 
                    if($publish_category){
                        foreach ($publish_category as $all_publish_category) {
                    ?>
			<option value="<?php echo $all_publish_category->category_id; ?>"><?php echo $all_publish_category->category_name; ?></option>
                    <?php } ?>
                    <?php } ?>
	</select> 
		  <button type="submit" id="submitButton" class="btn btn-primary">Go</button>
        </form>
                
                
                <br>
                <br>
            </div>
		<?php
                $catgory_info = $this->super_admin_model->select_all_published_category();
                foreach ($catgory_info as $category_result) {
                ?>
                
                <ul id="sideManu" class="nav nav-tabs nav-stacked">
                 <li class="subMenu open"><a> <?php echo $category_result->category_name;?> [<?php echo $this->welcome_model->all_product_count_by_category_id($category_result->category_id); ?>]</a>
				<ul style="display:none">
                                  <?php 
                                  $sub_category=$this->super_admin_model->select_all_published_subcategory_by_category_id($category_result->category_id);
                                  foreach ($sub_category as $all_subcatgory_bycatgoryid){
                                  ?>
                                    <li><a class="active" href="<?php echo base_url();?>Subcategory-Product/<?php echo $all_subcatgory_bycatgoryid->sub_category_id;?>"><i class="icon-chevron-right"></i><?php echo  $all_subcatgory_bycatgoryid->sub_category_name; ?> [<?php echo $this->welcome_model->all_product_count_by_sub_category_id($all_subcatgory_bycatgoryid->sub_category_id);?>]</a></li>
                                  <?php } ?>
                                </ul>
			</li>
		</ul>
                <?php } ?>
		<br/>
		  <div class="thumbnail">
			<img src="<?php echo base_url();?>front_end/themes/images/products/panasonic.jpg" alt="Bootshop panasonoc New camera"/>
			<div class="caption">
			  <h5>Panasonic</h5>
				<h4 style="text-align:center"><a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">$222.00</a></h4>
			</div>
		  </div><br/>
			<div class="thumbnail">
				<img src="<?php echo base_url();?>front_end/themes/images/products/kindle.png" title="Bootshop New Kindel" alt="Bootshop Kindel">
				<div class="caption">
				  <h5>Kindle</h5>
				    <h4 style="text-align:center"><a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">$222.00</a></h4>
				</div>
			  </div><br/>
			<div class="thumbnail">
				<img src="<?php echo base_url();?>front_end/themes/images/payment_methods.png" title="Bootshop Payment Methods" alt="Payments Methods">
				<div class="caption">
				  <h5>Payment Methods</h5>
				</div>
			  </div>
	</div>
<!-- Sidebar end=============================================== -->
		<?php echo $main_content; ?>
		</div>
	</div>
</div>
<!-- Footer ================================================================== -->
	<div  id="footerSection">
	<div class="container">
		<div class="row">
			<div class="span3">
				<h5>ACCOUNT</h5>
				<a href="login.html">YOUR ACCOUNT</a>
				<a href="login.html">PERSONAL INFORMATION</a> 
				<a href="login.html">ADDRESSES</a> 
				<a href="login.html">DISCOUNT</a>  
				<a href="login.html">ORDER HISTORY</a>
			 </div>
			<div class="span3">
				<h5>INFORMATION</h5>
				<a href="contact.html">CONTACT</a>  
				<a href="register.html">REGISTRATION</a>  
				<a href="legal_notice.html">LEGAL NOTICE</a>  
				<a href="tac.html">TERMS AND CONDITIONS</a> 
				<a href="faq.html">FAQ</a>
			 </div>
			<div class="span3">
				<h5>OUR OFFERS</h5>
				<a href="#">NEW PRODUCTS</a> 
				<a href="#">TOP SELLERS</a>  
				<a href="special_offer.html">SPECIAL OFFERS</a>  
				<a href="#">MANUFACTURERS</a> 
				<a href="#">SUPPLIERS</a> 
			 </div>
			<div id="socialMedia" class="span3 pull-right">
				<h5>SOCIAL MEDIA </h5>
				<a href="#"><img width="60" height="60" src="<?php echo base_url();?>front_end/themes/images/facebook.png" title="facebook" alt="facebook"/></a>
				<a href="#"><img width="60" height="60" src="<?php echo base_url();?>front_end/themes/images/twitter.png" title="twitter" alt="twitter"/></a>
				<a href="#"><img width="60" height="60" src="<?php echo base_url();?>front_end/themes/images/youtube.png" title="youtube" alt="youtube"/></a>
			 </div> 
		 </div>
		<p class="pull-right">&copy; Bootshop</p>
	</div><!-- Container End -->
	</div>
<!-- Placed at the end of the document so the pages load faster ============================================= -->
	<script src="<?php echo base_url();?>front_end/themes/js/jquery.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>front_end/themes/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>front_end/themes/js/google-code-prettify/prettify.js"></script>
	
	<script src="<?php echo base_url();?>front_end/themes/js/bootshop.js"></script>
    <script src="<?php echo base_url();?>front_end/themes/js/jquery.lightbox-0.5.js"></script>
	
	<!-- Themes switcher section ============================================================================================= -->

</body>
<script>
</html>