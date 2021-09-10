<!doctype html>
<html class="no-js " lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="description" content="Visitor Management">
<title>:: <?= $pagetitle;?> :: </title>

<link href="<?= base_url();?>assets/web/images/favicon.ico" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
<link href="<?= base_url();?>assets/web/images/favicon.ico" sizes="128x128" rel="shortcut icon" />

<link rel="stylesheet" href="<?= base_url();?>assets/admin/plugins/bootstrap/css/bootstrap.min.css">
<meta name="base_url" content="<?= base_url();?>">
<?php 
	if(isset($css)){
		load_css($css);
	}
?>
<!-- Custom Css -->

<link rel="stylesheet" href="<?= base_url();?>assets/admin/css/style.min.css">
<link rel="stylesheet" href="<?= base_url();?>assets/admin/css/custom.css?ver=<?= time();?>">
<link rel="stylesheet" href="<?= base_url();?>assets/admin/plugins/sweetalert/sweetalert.css">
<link rel="stylesheet" href="<?= base_url();?>assets/libs/bootstrap-select/bootstrap-select.min.css">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
<style type="text/css">
  .right_icon_toggle_btn{display: none}
</style>
</head>

<body class="theme-blush right_icon_toggle">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img class="zmdi-hc-spin" src="<?= base_url();?>assets/admin/images/loader.svg" width="48" height="48" alt="Aero"></div>
        <p>Please wait...</p>
    </div>
</div>
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
