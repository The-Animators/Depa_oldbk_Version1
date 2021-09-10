<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        if ($this->session->userdata('logged_in') != 1 || $this->session->userdata('logintype') != 'admin') {
            redirect(base_url(), 'refresh');
        }
    }

	public function index()
	{
		$page_data['pagetitle'] = 'Manage Users';
        $page_data['pagename']  = 'manage-users';
        $page_data['css']		= array("assets/admin/plugins/jquery-datatable/dataTables.bootstrap4.min.css");
        $page_data['js']		= array(
			"assets/admin/bundles/datatablescripts.bundle.js",
			"assets/admin/plugins/jquery-datatable/buttons/dataTables.buttons.min.js",
			"assets/admin/plugins/jquery-datatable/buttons/buttons.bootstrap4.min.js",
			"assets/admin/plugins/jquery-datatable/buttons/buttons.colVis.min.js",
			"assets/admin/plugins/jquery-datatable/buttons/buttons.flash.min.js",
			"assets/admin/plugins/jquery-datatable/buttons/buttons.html5.min.js",
			"assets/admin/plugins/jquery-datatable/buttons/buttons.print.min.js",
        );
		$this->load->view('admin/main',$page_data);
	}
}