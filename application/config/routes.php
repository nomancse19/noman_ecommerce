<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home';
$route['Checkout'] = 'checkout/checkout';


  /* Customer Routes And Customer Controller  */
  $route['Create-Customer'] = 'customer/customer_registration';
  $route['Shipping-address'] = 'customer/customer_address';
  
  $route['Login'] = 'customer/customer_login';
  $route['Forgetpassword'] = 'customer/forget_password';
  $route['Verifycode'] = 'customer/verification_details';
  $route['Password-reset'] = 'customer/reset_password';
  
  $route['PreOrder-Details'] = 'checkout/preorder_details';
  $route['Payment'] = 'checkout/payment';
  $route['Success-Order'] = 'checkout/success_order';
  $route['Customer-Info'] = 'customer/customer_details';
  $route['Order-Info'] = 'customer/order_details';
 

  /* Admin Routes */
$route['Admin'] = 'admin/index';
$route['login_check'] = 'admin/admin_login_check';
$route['dashboard'] = 'super_admin/index';
$route['logout'] = 'super_admin/logout';
$route['Addcategory'] = 'super_admin/Addcategory';
$route['AddSubCategory'] = 'super_admin/Addsubcategory';
$route['Save_Category'] = 'super_admin/Savecategory';
$route['ManageCategory'] = 'super_admin/Managecategory';
$route['Unpublish-Category/(.+)'] = 'super_admin/Unpublish_Category/$1';
$route['Publish-Category/(.+)'] = 'super_admin/Publish_Category/$1';
$route['Delete-Category/(.+)'] = 'super_admin/Delete_Category/$1';
$route['Save_Subcategory'] = 'super_admin/Savesubcategory';
$route['ManageSubcategory'] = 'super_admin/Managesubcategory';
$route['Unpublish-Subcategory/(.+)'] = 'super_admin/Unpublish_Subcategory/$1';
$route['Publish-Subcategory/(.+)'] = 'super_admin/Publish_Subcategory/$1';
$route['Delete-Subcategory/(.+)'] = 'super_admin/Delete_Subcategory/$1';
$route['AddManufacture'] = 'super_admin/Addmanufacture';
$route['Save_Manufacture'] = 'super_admin/Savemanufacture';
$route['ManageManufacture'] = 'super_admin/Managemanufacture';
$route['Unpublish-Manufacture/(.+)'] = 'super_admin/Unpublish_Manufacture/$1';
$route['Publish-Manufacture/(.+)'] = 'super_admin/Publish_Manufacture/$1';
$route['Delete-Manufacture/(.+)'] = 'super_admin/Delete_Manufacture/$1';
$route['Addproduct'] = 'super_admin/Addproduct';
$route['Save_Product'] = 'super_admin/Save_Product';
$route['Manageproduct'] = 'super_admin/Manageproduct';

$route['Delete-Product/(.+)'] = 'super_admin/Delete_Product/$1';
$route['Edit_product/(.+)'] = 'super_admin/Edit_product/$1';
$route['Update_Product'] = 'super_admin/Update_Product';
$route['Pending-Order'] = 'super_admin/pending_order';
$route['Confirm-Order'] = 'super_admin/confirm_order_info';
$route['Confirm-Payment/(.+)'] = 'super_admin/bkash_payment_status/$1';
$route['Order-View/(.+)'] = 'super_admin/order_view_order_id/$1';
$route['Order-Status/(.+)'] = 'super_admin/order_status/$1';




  /* Front end Routes  Home Controller */
$route['product_details/(.+)'] = 'home/product_details/$1';
$route['Products'] = 'home/all_product';
 
  //Pagination Routing system 
  $route['Category-Product'] = 'home/Category_Product';
  $route['Category-Product/(.+)'] = 'home/Category_Product/$1';
  $route['All-Product'] = 'home/all_product';
  $route['All-Product/(.+)'] = 'home/all_product/$1';
  $route['Subcategory-Product'] = 'home/Subcategory_Product';
  $route['Subcategory-Product/(.+)'] = 'home/Subcategory_Product/$1';
  /*  Cart  Controller */
$route['Cart-details'] = 'cart/cart_details';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
