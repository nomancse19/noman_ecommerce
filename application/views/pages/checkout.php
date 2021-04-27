<div class="span9">
    <ul class="breadcrumb">
        <li><a href="<?php echo base_url();?>">Home</a> <span class="divider">/</span></li>
        <li class="active">Login</li>
    </ul>
    <h3>Login Or Register New Account</h3>	
    <hr class="soft"/>

    <div class="row">
        <div class="span4">
            <div class="well">
                <h5>CREATE YOUR ACCOUNT</h5><br/>
                Click to Create An Account.And Fill Up The Form <br/><br/><br/>
                    <div class="controls">
                       <a href="<?php echo base_url();?>Create-Customer"><button type="button" class="btn btn-success">Create New Account</button></a> 
                    </div>
            </div>
        </div>
        <div class="span1"> &nbsp;</div>
        <div class="span4">
            <div class="well">
                <h5>ALREADY REGISTERED ?</h5>
                <form action="<?php echo base_url();?>customer/customer_login_check" method="post">
                    <div class="control-group">
                        <label class="control-label" for="inputEmail1">Email</label>
                        <div class="controls">
                            <input class="span3"  type="email" id="inputEmail1" name="customer_email_address" placeholder="Enter Email" required="">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="inputPassword1">Password</label>
                        <div class="controls">
                            <input type="password" class="span3"  id="inputPassword1" name="customer_password" placeholder="Password" required="">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <button type="submit" class="btn">Sign in</button> <a href="forgetpass.html">Forget password?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>	

</div>