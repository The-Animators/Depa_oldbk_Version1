<?php $this->load->view('web/includes/top');?>

<!-- Main Content -->
<?php $this->load->view('web/'.$pagename);?>

<!-- Script -->
<?php if($client == 'web'){?>
	<?php $this->load->view('web/includes/footer');?>
<?php }?>
	<?php $this->load->view('web/includes/script');?>