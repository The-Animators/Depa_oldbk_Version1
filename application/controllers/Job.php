<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Job extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        if ($this->session->userdata('logged_in') != 1 || $this->session->userdata('logintype') != 'admin' ) {
            redirect(base_url().'admin/login', 'refresh');
        }
        $this->load->model('job_model','job');
    }

    public function listing($param1=''){
        $page_data['pagetitle'] = 'Job';
        $page_data['jobstatus'] = $param1;
        $page_data['pagename']  = 'manage-job';
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

    public function edit($id=''){
        $page_data['pagetitle'] = 'Job';
        $page_data['pagename']  = 'edit-job';
        $page_data['result']    = array();
        $page_data['strong']    = 'Add';
        if(intval($id)){
            $this->job->_condition['id'] = $id;
            $jobdata                = $this->job->getRows();
            $page_data['result']    = $jobdata[0];
            $page_data['strong']    = 'Update';
        }
        $page_data['relation']  = getrelation('html');
        $page_data['css']       = array("assets/admin/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css");
        $page_data['js']        = array(
            "assets/admin/plugins/momentjs/moment.js",
            "assets/admin/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js",
        );
        $this->load->view('admin/main',$page_data);
    }

}