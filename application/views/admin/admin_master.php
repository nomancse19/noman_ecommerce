<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Administrator Dashboard</title>
	<!-- BOOTSTRAP STYLES-->
        <script src="<?php echo base_url() ?>admin_assets/assets/js/jquery-1.10.2.js"></script>
        <script src="<?php echo base_url() ?>admin_assets/assets/linecontrol/line_editor.js"></script> 
        <script src="<?php echo base_url() ?>admin_assets/assets/tinymce/js/tinymce/tinymce.min.js"></script>

        <link href="<?php echo base_url() ?>admin_assets/assets/css/bootstrap.css" rel="stylesheet" />
        <!-- FONTAWESOME STYLES-->
        <link href="<?php echo base_url() ?>admin_assets/assets/font-awesome/css/all.css" rel="stylesheet" />
        <link href="<?php echo base_url() ?>admin_assets/assets/linecontrol/line_editor.css" rel="stylesheet" />
        <!-- MORRIS CHART STYLES-->
        <link href="<?php echo base_url() ?>admin_assets/assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
        <link href="<?php echo base_url() ?>admin_assets/assets/css/custom.css" rel="stylesheet" />
        <!-- Data Table Added CSS Start-->
     
     <link href="<?php echo base_url() ?>admin_assets/assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
     <!-- Data Table Added CSS End -->
    
    <!-- GOOGLE FONTS-->
    <style type="text/css">
        .center{
            text-align: center;
        }
    </style> 
   <!--<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />-->
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Binary admin</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;">Currently Login as <?php echo $this->session->userdata('fullname'); ?> &nbsp; &nbsp; <a href="<?php base_url()?>logout" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li class="text-center">
                        <img src="<?php echo base_url() ?>admin_assets/assets/img/find_user.png" class="user-image img-responsive"/>
                    </li>
				
					
                    <li>
                        <a class="active-menu"  href="dashboard"><i class="fa fa-home fa-2x"></i> Dashboard</a>
                    </li>
		                   
                    <li>
                        <a href="#1"><i class="fa fa-list-alt fa-2x"></i>Category Control<span class="fa arrow fa-2x"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a 
                                <?php
                                    $path=current_url();
                                    $page= basename($path);
                                    if($page=='Addcategory'){
                                 echo "class='active-menu'";
                              }?>
                                  href="<?php echo base_url();?>Addcategory">Add Category </a>
                            </li>
                            <li>
                                <a 
                                <?php
                                    $path=current_url();
                                    $page= basename($path);
                                    if($page=='ManageCategory'){
                                 echo "class='active-menu'";
                              }?>
                                  href="<?php echo base_url();?>ManageCategory">Manage Category </a>
                            </li>
                        </ul>
                      </li>
                    
                    <li>
                        <a href="#"><i class="fa fa-list fa-2x"></i>Sub Category Control<span class="fa arrow fa-2x"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a 
                                  <?php
                                    $path=current_url();
                                    $page= basename($path);
                                    if($page=='AddSubCategory'){
                                 echo "class='active-menu'";
                              }?>  
                                    
                                    href="<?php echo base_url();?>AddSubCategory">Add Sub Category</a>
                            </li>
                            <li>
                                <a 
                                  <?php
                                    $path=current_url();
                                    $page= basename($path);
                                    if($page=='ManageSubcategory'){
                                 echo "class='active-menu'";
                              }?>  
                                    
                                    href="<?php echo base_url();?>ManageSubcategory">Manage Sub Category</a>
                            </li>
                            
                        </ul>
                    </li>
                    
                    <li>
                        <a href="#"><i class="fa fa-industry fa-2x"></i>Manufacture Control<span class="fa arrow fa-2x"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a 
                                  <?php
                                    $path=current_url();
                                    $page= basename($path);
                                    if($page=='AddManufacture'){
                                 echo "class='active-menu'";
                              }?>  
                                    
                                    href="<?php echo base_url();?>AddManufacture">Add Manufacture</a>
                            </li>
                            <li>
                                <a 
                                  <?php
                                    $path=current_url();
                                    $page= basename($path);
                                    if($page=='ManageManufacture'){
                                 echo "class='active-menu'";
                              }?>  
                                    
                                    href="<?php echo base_url();?>ManageManufacture">Manage Manufacture</a>
                            </li>
                            
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fab fa-product-hunt fa-2x"></i>Product Control<span class="fa arrow fa-2x"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a 
                                  <?php
                                    $path=current_url();
                                    $page= basename($path);
                                    if($page=='Addproduct'){
                                 echo "class='active-menu'";
                              }?>  
                                    
                                    href="<?php echo base_url();?>Addproduct">Add Product</a>
                            </li>
                            <li>
                                <a 
                                  <?php
                                    $path=current_url();
                                    $page= basename($path);
                                    if($page=='Manageproduct'){
                                 echo "class='active-menu'";
                              }?>  
                                    
                                    href="<?php echo base_url();?>Manageproduct">Manage Product</a>
                            </li>
                            
                        </ul>
                    </li>
                    
                    
                       <li>
                        <a href="#"><i class="fab fa-first-order fa-2x"></i>Order Control<span class="fa arrow fa-2x"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a 
                                  <?php
                                    $path=current_url();
                                    $page= basename($path);
                                    if($page=='Pending-Order'){
                                 echo "class='active-menu'";
                              }?>  
                                    
                                    href="<?php echo base_url();?>Pending-Order">Pending Order</a>
                            </li>
                            <li>
                                <a 
                                  <?php
                                    $path=current_url();
                                    $page= basename($path);
                                    if($page=='Confirm-Order'){
                                 echo "class='active-menu'";
                              }?>  
                                    
                                    href="<?php echo base_url();?>Confirm-Order">All Confirm Order</a>
                            </li>
                            
                        </ul>
                    </li>
                    
                    
                    
                    
                     <li>
                        <a  href="blank.html"><i class="fa fa-square fa-2x"></i> Blank Page</a>
                    </li>	
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
     <?php echo $admin_main_content; ?>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
         <div style="color:#fff;text-align: center;font-weight: bold;padding: 2px;">
             <p>All Right Reserved Md. Jahidul Islam Noman</p>
         </div>
         
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
   

      <!-- BOOTSTRAP SCRIPTS -->
    <script src="<?php echo base_url() ?>admin_assets/assets/js/bootstrap.min.js"></script>

    <!-- METISMENU SCRIPTS -->
    <script src="<?php echo base_url() ?>admin_assets/assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="<?php echo base_url() ?>admin_assets/assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="<?php echo base_url() ?>admin_assets/assets/js/morris/morris.js"></script>
        <!-- DATA TABLE SCRIPTS -->
    <script src="<?php echo base_url() ?>admin_assets/assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url() ?>admin_assets/assets/js/dataTables/dataTables.bootstrap.js"></script>
     <script>
            $(document).ready(function () {
                $('#datatable').dataTable();
            });
    </script>
    
    
    <!-- CUSTOM SCRIPTS -->
    <script src="<?php echo base_url() ?>admin_assets/assets/js/custom.js"></script>
   
    
   
</body>
</html>

