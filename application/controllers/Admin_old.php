<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        // print_r($_SESSION);
        
        if ($this->session->userdata('logintype') != 'admin' ) {
           
            redirect(base_url().'admin/login', 'refresh');
        }
    }

	public function index(){
        $this->dashboard();
	}

    public function dashboard($param = ''){
        $page_data['pagetitle'] = 'Deepa Village';
        $page_data['pagename']  = 'dashboard';      
        $this->load->view('admin/main',$page_data);
    }   

    public function headlist(){
        $page_data['pagetitle'] = 'Family Head';
        $page_data['pagename']  = 'headlist';      
        $page_data['css']       = array("assets/admin/plugins/jquery-datatable/dataTables.bootstrap4.min.css");
        $page_data['js']        = array(
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


    public function donation($status=''){
        $page_data['status'] = $status;
        $page_data['pagetitle'] = 'Donation List';
        $page_data['pagename']  = 'donation-list';      
        $page_data['css']       = array("assets/admin/plugins/jquery-datatable/dataTables.bootstrap4.min.css");
        $page_data['js']        = array(
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
    
    public function memberList(){
        $page_data['pagetitle'] = 'Family Member';
        $page_data['pagename']  = 'member-list';      
        $page_data['css']       = array("assets/admin/plugins/jquery-datatable/dataTables.bootstrap4.min.css");
        $page_data['js']        = array(
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