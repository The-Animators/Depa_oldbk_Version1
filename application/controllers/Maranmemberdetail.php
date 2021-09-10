<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Maranmemberdetail extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->load->model('marannondh_model' ,'maran');
    }

    public function view($member_no = ''){
        if ($member_no == '') {
            redirect(base_url(), 'refresh');
        }

        $page_data['result'] = array();

        if($member_no != ''){
            // $this->maran->_condition['fm.deleted'] = 0;
            // $this->maran->_condition['fm.member_no'] = $member_no;
            $result = $this->maran->getMaranMembers($member_no);            
            if($result){
                $page_data['result']  = $result[0];
            }
        }

        // print_r($page_data['result']);

        $page_data['pagetitle'] = 'Maran Member Details';
        $page_data['pagename']  = 'maran-member-detail';
        $page_data['breadcrumb']  = 'Maran Member Details';
        $page_data['client'] = 'web';
        $this->load->view('web/main',$page_data);
    }

   

}