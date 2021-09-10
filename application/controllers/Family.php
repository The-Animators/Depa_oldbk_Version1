<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Family extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        if ($this->session->userdata('logged_in') != 1 || $this->session->userdata('logintype') != 'admin' ) {
            redirect(base_url().'admin/login', 'refresh');
        }
        $this->load->model('family_model' ,'family');
    }

    public function new(){
        $this->edit(0);
        // $page_data['pagetitle'] = 'Family';
        // $page_data['pagename']  = 'family-new';
        // $page_data['surname']   = getmaster('surname', 'html', 'Surname', 'surname');
        // $page_data['bloodgroup']   = getmaster('bloodgroup', 'html', 'Bloodgroup', 'bloodgroup');
        // $page_data['relation']   = getmaster('relation', 'json', 'Relation', 'relation');
        // $page_data['maritalstatus']   = getmaster('marital_status', 'html', 'Marital Status', 'maritalstatus');
        // $page_data['education']   = getmaster('education', 'json', 'Education', 'education');
        // $page_data['occupation']   = getmaster('occupation', 'html', 'Occupation', 'occupation');
        // $page_data['dharmik']   = getmaster('dharmik_knowledge', 'html', 'Dharmik Knowledge', 'dharmikknowledge');
        // $page_data['sports']   = getmaster('sports', 'json', 'Sports', 'sports');
        // $page_data['village']   = getmaster('village', 'html', 'Village', 'village');
        // $page_data['area']   = getmaster('area', 'html', 'Area', 'area');
        // $page_data['css']       = array("assets/admin/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css");
        // $page_data['js']        = array(
        //     "assets/admin/plugins/momentjs/moment.js",
        //     "assets/admin/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js",
        // );
        // $this->load->view('admin/main',$page_data);
    }


    public function newmember(){
        $page_data['familyHead'] = getFamilyHead();
        $page_data['pagetitle'] = 'Member';
        $page_data['pagename']  = 'new-member';
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
        $page_data['css']       = array("assets/admin/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css",
            "assets/admin/plugins/select2/select2.css"
        );
        $page_data['js']        = array(
            "assets/admin/plugins/momentjs/moment.js",
            "assets/admin/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js",
            "assets/admin/plugins/select2/select2.min.js"
        );
        $this->load->view('admin/main',$page_data);
    }

    public function editmember($id){
        if($id != '' && $id != '0'){
            $this->family->_condition['fm.deleted'] = 0;
            $this->family->_condition['fm.id'] = $id;
            $result = $this->family->getmember();
            
            if($result){
                $page_data['result']  = $result['member'][0];
                $family_id = $result['member'][0]['family_id'];
            }else{
                $page_data['result']  = array();
            }
        }
        $page_data['familyHead'] = getFamilyHead();
        $page_data['pagetitle'] = 'Member';
        $page_data['pagename']  = 'edit-member';
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
        $page_data['css']       = array("assets/admin/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css",
            "assets/admin/plugins/select2/select2.css"
        );
        $page_data['js']        = array(
            "assets/admin/plugins/momentjs/moment.js",
            "assets/admin/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js",
            "assets/admin/plugins/select2/select2.min.js"
        );
        $this->load->view('admin/main',$page_data);
    }


    public function approvemember($id){
        if($id != '' && $id != '0'){
            $this->family->_condition['fm.deleted'] = 0;
            $this->family->_condition['fm.id'] = $id;
            $result = $this->family->getmember();
            
            if($result){
                $page_data['result']  = $result['member'][0];
                $family_id = $result['member'][0]['family_id'];
            }else{
                $page_data['result']  = array();
            }
        }
        $page_data['familyHead'] = getFamilyHead();
        $page_data['pagetitle'] = 'Approve Member';
        $page_data['pagename']  = 'approve-pending-member';
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
        $page_data['css']       = array("assets/admin/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css",
            "assets/admin/plugins/select2/select2.css"
        );
        $page_data['js']        = array(
            "assets/admin/plugins/momentjs/moment.js",
            "assets/admin/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js",
            "assets/admin/plugins/select2/select2.min.js"
        );
        $this->load->view('admin/main',$page_data);
    }


    public function edit($id = ''){
       
        $page_data['result'] = array();
        if($id != '' && $id != '0'){
            $this->family->_condition['fm.deleted'] = 0;
            // $this->family->_condition['mf.id'] = $id;
            $this->family->_condition['fm.family_id'] = $id;
            $result = $this->family->get(true);
            // echo "<pre>"; 
            // print_r($result);
            // exit;
            if($result){
                $page_data['result']  = $result['member'][0];
                $family_id = $result['member'][0]['family_id'];
            }else{
                $page_data['result']  = array();
            }
        }
        
        $page_data['pagetitle']     = 'Family Head';
        $page_data['pagename']      = 'edit-family-head';
        $page_data['surname']       = getmaster('surname', 'html', 'Surname', 'surname');
        $page_data['bloodgroup']    = getmaster('bloodgroup', 'html', 'Bloodgroup', 'bloodgroup');
        $page_data['maritalstatus'] = getmaster('marital_status', 'html', 'Marital Status', 'maritalstatus');
        $page_data['education']     = getmaster('education', 'json', 'Education', 'education');
        $page_data['occupation']    = getmaster('occupation', 'html', 'Occupation', 'occupation');
        $page_data['dharmik']       = getmaster('dharmik_knowledge', 'html', 'Dharmik Knowledge', 'dharmikknowledge');
        $page_data['sports']        = getmaster('sports', 'json', 'Sports', 'sports');
        $page_data['village']       = getmaster('village', 'html', 'Village', 'village');
        $page_data['area']          = getmaster('area', 'html', 'Area', 'area');
        $page_data['relation']      = getmaster('relation', 'json', 'Relation', 'relation');
        $page_data['css']           = array("assets/admin/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css");
        $page_data['js']            = array(
            "assets/admin/plugins/momentjs/moment.js",
            "assets/admin/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js",
        );
        $this->load->view('admin/main',$page_data);
    }

    public function list(){
        $page_data['pagetitle'] = 'Family';
        $page_data['pagename']  = 'family-list';
        $page_data['css']       = array("assets/admin/plugins/jquery-datatable/dataTables.bootstrap4.min.css");
        $page_data['js']        = array(
            "assets/admin/bundles/datatablescripts.bundle.js",
            "assets/admin/plugins/jquery-datatable/buttons/dataTables.buttons.min.js",
            "assets/admin/plugins/jquery-datatable/buttons/buttons.bootstrap4.min.js",
            "assets/admin/plugins/jquery-datatable/buttons/buttons.colVis.min.js",
            "assets/admin/plugins/jquery-datatable/buttons/buttons.flash.min.js",
            "assets/admin/plugins/jquery-datatable/buttons/buttons.html5.min.js",
            "assets/admin/plugins/jquery-datatable/buttons/buttons.print.min.js",
             "assets/admin/plugins/momentjs/moment.js",
        );
        $this->load->view('admin/main',$page_data);
    }

    public function bloodgroup(){
        $page_data['pagetitle'] = 'Blood Group';
        $page_data['pagename']  = 'manage-bloodgroup';
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

    public function surname(){
        $page_data['pagetitle'] = 'Surname';
        $page_data['pagename']  = 'manage-surname';
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