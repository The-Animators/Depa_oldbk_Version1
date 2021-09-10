<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Changepassword extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        if ($this->session->userdata('logged_in') != 1) {
            redirect(base_url(), 'refresh');
        }
    }

	public function index()
	{
        // print_r($_SESSION);
		$page_data['pagetitle'] = 'Change Password';
        $page_data['pagename']  = 'change-password';
		$this->load->view('admin/main',$page_data);
	}
}
