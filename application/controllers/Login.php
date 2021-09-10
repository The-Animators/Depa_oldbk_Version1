<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        if ($this->session->userdata('logged_in') != 0 && $this->session->userdata('logintype') == 'admin' ) {
            redirect(base_url().'admin/dashboard', 'refresh');
        }
    }

    public function index(){
        // exit();
        $page_data['pagetitle'] = 'Deepa Village Login Panel';
        $page_data['pagename']  = 'login';
        $this->load->view('admin/login',$page_data);
    }

}