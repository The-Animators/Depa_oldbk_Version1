<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Business extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');

        // array(array('donors_model' ,'donors'), array('latest_model' ,'latest'), array('gallery_model' ,'gallery'));
        $this->load->model('business_model' ,'business');
        
        // if ($this->session->userdata('logged_in') != 1 && $this->session->userdata('logintype') != 'admin' ) {
        //     redirect(base_url(), 'refresh');
        // }
    }

    public function view($member_no = ''){
        if ($member_no == '') {
            redirect(base_url(), 'refresh');
        }

        $page_data['result'] = array();
        if($member_no != ''){
            $this->family->_condition['fm.deleted'] = 0;
            $this->family->_condition['fm.member_no'] = $member_no;
            $result = $this->family->get();            
            if($result){
                $page_data['result']  = $result[0];
            }else{

            }
        }
        // print_r($page_data['result']);

        $page_data['pagetitle'] = 'Member';
        // $page_data['pagename']  = 'member-edit';
        $page_data['pagename']  = 'member-detail';
        $page_data['breadcrumb']  = 'Member Detail';
        $page_data['addbtn'] = 0;
        // $page_data['breadcrumb']  = 'Edit Member Detail';
         if($result){
            $page_data['breadcrumb1'] = "Family Details";
            $page_data['br_url']      = 'family/'.$result[0]['family_no'];
        }
        $page_data['client'] = 'web';
        $this->load->view('web/main',$page_data);
    }

    public function add($id = ''){
        $this->edit('0',$id);
    }    

    public function edit($id = '', $member_id =''){
        if (($this->session->userdata('logged_in') != 1 || $this->session->userdata('logintype') != 'normal') || $id == '') {
            redirect(base_url(), 'refresh');
        }
        $title = 'Edit ';
        if($id == '0'){
            $title = 'Add ';
        }
        $page_data['result'] = array();
        if($id != '' && $id != '0'){
            $this->business->_condition['deleted'] = 0;
            $this->business->_condition['id'] = $id;
            $result = $this->business->get();            
            if($result){
                // print_r($result);
                $page_data['result']  = $result[0];
                $family_id = $result[0]['family_id'];
                $member_id = $result[0]['member_id'];
            }else{
                $page_data['result']  = array();
                $id         = 0;
                $family_id  = $this->session->userdata('family_id');
                $member_id  = $member_id;
            }
        }else{
            $page_data['result']  = array();
            $family_id = $this->session->userdata('family_id');
            $member_id = $member_id;
        }

        if($this->session->userdata('family_id') != $family_id){
        //   redirect(base_url(), 'refresh');
        }
        $page_data['pagetitle'] = $title.'Business';
        $page_data['family_id'] = $family_id;
        $page_data['member_id'] = $member_id;
        $page_data['business_id'] = $id;
        $page_data['title']     = $title;
        $page_data['pagename']  = 'business-edit';
        $page_data['area']   = getmaster('area', 'html', 'Area', 'area');
        $page_data['addbtn'] = 0;
        $page_data['breadcrumb']  = $title.'Business Detail';
        $page_data['breadcrumb1'] = "Business Details";
        $page_data['br_url']      = 'business/'.$member_id;
        $page_data['addbtnlink']  = '';
        $page_data['client'] = 'web';
        // $page_data['css']       = array("assets/admin/plugins/select2/select2.css");
        // $page_data['js']        = array("assets/admin/plugins/select2/select2.js");
        $page_data['css']       = array("assets/libs/bootstrap-select/bootstrap-select.min.css");
        $page_data['js']        = array("assets/libs/bootstrap-select/bootstrap-select.min.js");
        $this->load->view('web/main',$page_data);
    }

    

    // Blog End

}