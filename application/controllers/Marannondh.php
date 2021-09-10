<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Marannondh extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->load->library('upload');
        $this->load->model('marannondh_model' ,'maran_nondh');
        if ($this->session->userdata('logged_in') != 1) {
            redirect(base_url().'admin/login', 'refresh');
        }
    }

	public function index()
	{
        // print_r($_SESSION);
		$page_data['pagetitle'] = 'Maran Nondh';
        $page_data['pagename']  = 'maran-nondh';
		
        //$page_data['css']       = array();
        $page_data['js']        = array(
                                        "assets/js/common.js",
                                        "assets/libs/bootstrap-select/bootstrap-select.min.js",
                                        "assets/admin/plugins/select2/select2.min.js",
                                        "assets/admin/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"
                                    );
        $this->load->view('admin/main',$page_data);
	}


}
