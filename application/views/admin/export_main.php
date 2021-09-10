<?php 

// header('Content-Description: File Transfer');
// header('Content-Type: application/ms-excel');
// header('Content-Disposition: attachment; filename=file.csv');
// header('Expires: 0');
// header('Cache-Control: must-revalidate');
// header('Pragma: public');
// header('Content-Length: ' . filesize($file));

?>

<?php $this->load->view('admin/includes/top');?>
<!-- Main Content -->
<?php $this->load->view('admin/'.$pagename);?> 
<!-- Script -->
<?php $this->load->view('admin/includes/script');?>