<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');

        // array(array('donors_model' ,'donors'), array('latest_model' ,'latest'), array('gallery_model' ,'gallery'));
        $this->load->model('family_model' ,'family');
        
        // if ($this->session->userdata('logged_in') != 1 && $this->session->userdata('logintype') != 'admin' ) {
        //     redirect(base_url(), 'refresh');
        // }
    }

    public function view($member_no = ''){
        if ($member_no == '' || ($this->session->userdata('logged_in') != 1 && $this->session->userdata('logintype') != 'normal' )) {
            redirect(base_url(), 'refresh');
        }

        $page_data['result'] = array();
        if($member_no != ''){
            $this->family->_condition['fm.deleted'] = 0;
            $this->family->_condition['fm.member_no'] = $member_no;
            $result = $this->family->get();            
            if($result){
                $page_data['result']  = $result['member'][0];
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
            $page_data['br_url']      = 'family/'.$result['member'][0]['family_no'];
        }
        $page_data['client'] = 'web';
        $this->load->view('web/main',$page_data);
    }

    public function add(){
        $this->edit('0');
    }    

    public function edit($id = ''){
        if (($this->session->userdata('logged_in') != 1 || $this->session->userdata('logintype') != 'normal') || $id == '') {

            redirect(base_url(), 'refresh');
        }
        $title = 'Edit ';
        if($id == '0'){
            $title = 'Add ';
        }

        $page_data['result'] = array();
        if($id != '' && $id != '0'){
            // $this->family->_condition['fm.deleted'] = 0;
            $this->family->_condition['fm.id'] = $id;
            $result = $this->family->get();
            if($result){
                // exit;
                $page_data['result']  = $result['member'][0];

                
                $family_id = $result['member'][0]['family_id'];
            }else{
                $page_data['result']  = array();
                $family_id = $this->session->userdata('family_id');
            }
        }else{
            $page_data['result']  = array();
            
            $family_id = $this->session->userdata('family_id');
        }

        if($this->session->userdata('family_id') != $family_id){
           redirect(base_url(), 'refresh');
        }
        $page_data['pagetitle'] = $title.'Member';
        $page_data['family_id'] = $family_id;
        $page_data['title']     = $title;
        $page_data['pagename']  = 'member-edit';
        $page_data['surname']   = getmaster('surname', 'html', 'Surname', 'surname');
        $page_data['bloodgroup']   = getmaster('bloodgroup', 'html', 'Bloodgroup', 'bloodgroup');
        $page_data['relation']   = getmaster('relation', 'json', 'Relation', 'relation');
        $page_data['maritalstatus']   = getmaster('marital_status', 'html', 'Marital Status', 'maritalstatus');
        $page_data['education']   = getmaster('education', 'json', 'Education', 'education');
        $page_data['occupation']   = getmaster('occupation', 'html', 'Occupation', 'occupation');
        $page_data['dharmik']   = getmaster('dharmik_knowledge', 'html', 'Dharmik Knowledge', 'dharmikknowledge');
        $page_data['sports']   = getmaster('sports', 'json', 'Sports', 'sports');
        $page_data['village']   = getmaster('village', 'html', 'Village', 'village');
        $page_data['area']   = getmaster('area', 'html', 'Area', 'area');
        $page_data['addbtn'] = 0;
        $page_data['breadcrumb']  = $title.'Member Detail';
        $page_data['breadcrumb1'] = "Family Details";
        $page_data['br_url']      = 'family/'.$family_id;
        $page_data['addbtnlink']  = '';
        $page_data['client'] = 'web';
        // $page_data['css']       = array("assets/admin/plugins/select2/select2.css");
        // $page_data['js']        = array("assets/admin/plugins/select2/select2.js");
        $page_data['css']       = array("assets/libs/bootstrap-select/bootstrap-select.min.css");
        $page_data['js']        = array("assets/libs/bootstrap-select/bootstrap-select.min.js");
        $this->load->view('web/main',$page_data);
    }

    public function death($id = ''){
        if (($this->session->userdata('logged_in') != 1 || $this->session->userdata('logintype') != 'normal') || $id == '') {
            redirect(base_url(), 'refresh');
        }

        $title = 'Update Death Details';

        $page_data['result'] = array();
        $family_id = $this->session->userdata('family_id');
        $page_data['result']  = array();

        if($id != '' && $id != '0'){
            $result = $this->family->memberdetails($id);
            if($result){
                $page_data['result']  = $result;
            }
        }

        $page_data['pagetitle'] = $title;
        $page_data['family_id'] = $family_id;
        $page_data['member_id'] = $id;
        $page_data['title']     = $title;
        $page_data['pagename']  = 'member-death';
        $page_data['addbtn'] = 0;
        $page_data['relation']   = getmaster('relation', 'json', 'Relation', 'relation');
        $page_data['breadcrumb']  = $title;
        $page_data['breadcrumb1'] = "Family Details";
        $page_data['br_url']      = 'family/'.$family_id;
        $page_data['addbtnlink']  = '';
        $page_data['client'] = 'web';
        $this->load->view('web/main',$page_data);
    }

    
    public function split($id = ''){

        if (($this->session->userdata('logged_in') != 1 || $this->session->userdata('logintype') != 'normal')) {
            redirect(base_url(), 'refresh');
        }

        $title = 'Split Family';
        $page_data['result'] = array();
        $family_id = $this->session->userdata('family_id');

        $result = $this->family->familydetails($family_id);
        if($result){
            $page_data['result']  = $result;
        }

        $page_data['pagetitle'] = $title;
        $page_data['family_id'] = $family_id;
        $page_data['title']     = $title;
        $page_data['pagename']  = 'family-split';
        $page_data['addbtn'] = 0;
        $page_data['relation']   = getmaster('relation', 'json', 'Relation', 'relation');
        $page_data['breadcrumb']  = $title;
        $page_data['breadcrumb1'] = "Family Details";
        $page_data['br_url']      = 'family/'.$family_id;
        $page_data['addbtnlink']  = '';
        $page_data['client'] = 'web';
        $this->load->view('web/main',$page_data);
    }

    public function splithof(){
        if (($this->session->userdata('logged_in') != 1 || $this->session->userdata('logintype') != 'normal')) {
            redirect(base_url(), 'refresh');
        }
        $member_ids = $this->input->post('member_id');
        if(count($member_ids) == 0){
            redirect(base_url(), 'refresh');
        }

        $title = 'Split Family';

        $page_data['result'] = array();
        $family_id = $this->session->userdata('family_id');

        $result = $this->family->familymemberdetails($member_ids);

        if($result){
            $page_data['result']  = $result;
        }

        $page_data['pagetitle']     = $title;
        $page_data['family_id']     = $family_id;
        $page_data['title']         = $title;
        $page_data['pagename']      = 'family-split-hof';
        $page_data['addbtn']        = 0;
        $page_data['area']          = getmaster('area', 'html', 'Area', 'area');
        $page_data['relation']      = getmaster('relation', 'json', 'Relation', 'relation');
        $page_data['breadcrumb']    = $title;
        $page_data['breadcrumb1']   = "Family Details";
        $page_data['br_url']        = 'family/'.$family_id;
        $page_data['addbtnlink']    = '';
        $page_data['client']        = 'web';
        $this->load->view('web/main',$page_data);
    }

    // public function merge($id = ''){

    //     if (($this->session->userdata('logged_in') != 1 || $this->session->userdata('logintype') != 'normal')) {
    //         redirect(base_url(), 'refresh');
    //     }

    //     $title = 'Merge Family';
    //     $page_data['result'] = array();

    //     $family_id = $this->session->userdata('family_id');
    //     $mfamily_no = $this->input->post('mfamily_no');
    //     $result = $this->family->familydetailsByNo($mfamily_no);
    //     if($result){
    //         $page_data['result']  = $result;
    //     }

    //     $page_data['pagetitle'] = $title;
    //     $page_data['family_id'] = $family_id;
    //     $page_data['title']     = $title;
    //     $page_data['pagename']  = 'family-merge';
    //     $page_data['addbtn'] = 0;
    //     $page_data['relation']   = getmaster('relation', 'json', 'Relation', 'relation');
    //     $page_data['breadcrumb']  = $title;
    //     $page_data['breadcrumb1'] = "Family Details";
    //     $page_data['br_url']      = 'family/'.$family_id;
    //     $page_data['addbtnlink']  = '';
    //     $page_data['client'] = 'web';
    //     $this->load->view('web/main',$page_data);
    // }

    public function merge(){
        if (($this->session->userdata('logged_in') != 1 || $this->session->userdata('logintype') != 'normal')) {
            redirect(base_url(), 'refresh');
        }
        $mfamily_no = $this->input->post('mfamily_no');
        $title = 'Merge Family';

        $page_data['result'] = array();
        $family_id = $this->session->userdata('family_id');
        $result_family = $this->family->familydetails($family_id);
        $result = $this->family->familydetailsByNo($mfamily_no);
        if($result){
            $page_data['result']  = $result;
        }else{
            redirect(base_url().'family/'.$family_id.'/1');
            // $msg = 'Family Number not found';
            // $config = array($family_id,$msg);
            // call_user_func(array('Web', 'family'), $config);
            // $this->load->library('Web');
            // $this->web->family($family_id,$msg);
        }
        $page_data['family']        = $result_family;
        $page_data['pagetitle']     = $title;
        $page_data['family_id']     = $family_id;
        $page_data['title']         = $title;
        $page_data['pagename']      = 'family-merge';
        $page_data['addbtn']        = 0;
        $page_data['relation']      = getmaster('relation', 'json', 'Relation', 'relation');
        $page_data['breadcrumb']    = $title;
        $page_data['breadcrumb1']   = "Family Details";
        $page_data['br_url']        = 'family/'.$family_id;
        $page_data['addbtnlink']    = '';
        $page_data['client']        = 'web';
        $this->load->view('web/main',$page_data);
    }
    // Blog End

}