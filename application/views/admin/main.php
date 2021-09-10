<?php $this->load->view('admin/includes/top');?>

    <?php $this->load->view('admin/includes/config');?>

<!-- Right Icon menu Sidebar -->
<?php $this->load->view('admin/includes/righticon');?>

<!-- Left Sidebar -->
<?php $this->load->view('admin/includes/leftside');?>

<!-- Right Sidebar -->

<!-- Main Content -->
<?php $this->load->view('admin/'.$pagename);?>
<?php $this->load->view('admin/hiddenModel')?>  
<!-- Script -->
<?php $this->load->view('admin/includes/script');?>