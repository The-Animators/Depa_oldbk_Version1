<?php 
	$client = $client ?? 'web';
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="base_url" content="<?= base_url();?>">

<!-- css file -->
<link rel="stylesheet" href="<?= base_url();?>assets/web/css/bootstrap.css">

<link rel="stylesheet" href="<?= base_url();?>assets/web/css/style.css?v=<?= time();?>">
<!-- Responsive stylesheet -->
<link rel="stylesheet" href="<?= base_url();?>assets/web/css/responsive.css">
<!-- Title -->
<title><?= $pagetitle;?></title>
<!-- Favicon -->
<link href="<?= base_url();?>assets/web/images/favicon.ico" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
<link href="<?= base_url();?>assets/web/images/favicon.ico" sizes="128x128" rel="shortcut icon" />
<link href="<?= base_url();?>assets/web/lightbox/css/lightbox.css" rel="stylesheet" />

<link href="<?= base_url();?>assets/web/ism/css/my-slider.css" rel="stylesheet" />

<style type="text/css">
	.mfp-img{
		width: 900px !important;
	}

	/*.full-img{
		width: 95% !important;
	}*/

</style>

<?php 
	if(isset($css)){
		load_css($css);
	}
?>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

		

</head>
<body>
<div class="wrapper">
  	<?php if($client == 'web'){?>
		<?php $this->load->view('web/includes/topheader');?>
		<!-- Header Styles -->
		<?php $this->load->view('web/includes/header');?>
	<?php }?>
</div>
<!-- Wrapper End -->


