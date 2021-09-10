<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prarthanadetails extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->load->model('saadri_model' ,'saadri');
    }

    public function view($member_no = ''){
        if ($member_no == '') {
            redirect(base_url(), 'refresh');
        }

        $page_data['result'] = array();

        if($member_no != ''){
            // $this->maran->_condition['fm.deleted'] = 0;
            // $this->maran->_condition['fm.member_no'] = $member_no;
            $result = $this->saadri->getSadriMembers($member_no);            
            if($result){
                $page_data['result']  = $result[0];
            }
        }

        // print_r($page_data['result']);

        $page_data['pagetitle'] = 'Prarthana Member Details';
        $page_data['pagename']  = 'prarthana-member-detail';
        $page_data['breadcrumb']  = 'Prarthana Member Details';
        $page_data['client'] = 'web';
        $this->load->view('web/main',$page_data);
    }

   

}