<!doctype html>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">
<title>:: <?= $pagetitle;?> Admin :: Sign In</title>
<!-- Favicon-->
<link rel="icon" href="<?= base_url();?>assets/favicon.ico" type="image/x-icon">
<!-- Custom Css -->
<link rel="stylesheet" href="<?= base_url();?>assets/admin/plugins/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="<?= base_url();?>assets/admin/css/style.min.css">    
<meta name="base_url" content="<?= base_url();?>">
</head>

<body class="theme-blush">
    <div class="authentication">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-12">
                    <form class="card auth_form">
                        <div class="header">
                            <img class="logo" src="<?= base_url();?>assets/admin/images/logo.svg" alt="Logo">
                            <h5>Log in</h5>
                        </div>
                        <div class="body">
                            <div class="input-group mb-3">
                                <input type="text" name="username" class="form-control" placeholder="Username">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="zmdi zmdi-account-circle"></i></span>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" name="password" class="form-control" placeholder="Password">
                                <div class="input-group-append">                                
                                    <span class="input-group-text"><a href="javascript:void(0)" class="forgot" title="Forgot Password"><i class="zmdi zmdi-lock"></i></a></span>
                                </div>                            
                            </div>
                            <button type="submit" id="login" class="btn btn-primary btn-block waves-effect waves-light">SIGN IN <i class="zmdi zmdi-save" style="display: none"></i></button>                     
                        </div>
                    </form>
                    <div class="copyright text-center">
                        &copy;
                        <script>document.write(new Date().getFullYear())</script>,
                        <span>Designed by <a href="javascript:void(0)">Animator</a></span>
                    </div>
                </div>
                <div class="col-lg-8 col-sm-12">
                    <div class="card">
                        <img src="<?= base_url();?>assets/admin/images/signin.svg" alt="Sign In"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Jquery Core Js -->
<script src="<?= base_url();?>assets/admin/bundles/libscripts.bundle.js"></script>
<script src="<?= base_url();?>assets/admin/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
<script src="<?= base_url();?>assets/js/common.js?rand=<?= time();?>"></script> <!-- Lib Scripts Plugin Js -->
<script src="<?= base_url();?>assets/js/jquery.toaster.js"></script> <!-- Lib Scripts Plugin Js -->
<script src="<?= base_url();?>assets/js/login.js?rand=<?= time();?>"></script> <!-- Lib Scripts Plugin Js -->
</body>
</html>