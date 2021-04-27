<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Administrator Login Page</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="<?php echo base_url()?>admin_assets/assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="<?php echo base_url()?>admin_assets/assets/css/font-awesome.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body style="background-color: #E2E2E2;">
    <div class="container">
        <div class="row text-center " style="padding-top:100px;">
            <div class="col-md-12">
                <h1>Administrator Login </h1>
            </div>
        </div>
         <div class="row ">
               
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                           
                            <div class="panel-body">
                                <form role="form" action="<?php echo base_url()?>login_check" method="post">
                                    
                                    <hr />
                                    <span style="color:red;font-weight: bold">
                                        <?php
                                        $message=$this->session->flashdata('message');
                                        if($message){
                                            echo $message;
                                        }
                                        ?>
                                    </span>
                                    <h5>Enter Details to Login</h5>
                                       <br />
                                       <div class="form-group input-group">
                                           <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                           <input type="text" class="form-control"name="username" placeholder="Your Username " />
                                       </div>
                                       <div class="form-group input-group">
                                           <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                           <input type="password" name="password" class="form-control"  placeholder="Your Password" />
                                       </div>
                                       <div class="form-group">
                                            
                                            <span class="pull-right">
                                                   <a href="#" >Forget password ? </a> 
                                            </span>
                                        </div>
                                     
                                     <button class="btn btn-primary">Login Now</button>
                                    
                                    </form>
                            </div>
                           
                        </div>
                
                
        </div>
    </div>

</body>
</html>
