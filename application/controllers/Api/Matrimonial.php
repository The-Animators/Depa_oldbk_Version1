<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . './libraries/REST_Controller.php';

class Matrimonial extends REST_Controller{

    public function __construct(){
        parent::__construct();
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->load->model('matrimonial_model' ,'master_matrimonial');
        $this->load->model('common_model','common');
        $this->title = 'Matrimonial';

    }


    function save_post(){

        //print_r($_POST);
        //die();

        $data           = array('status' => false,'validate' => false, 'message' => array());
        $flag       = false;
        /*$this->form_validation->set_rules('member_no', 'Select Member', 'required|trim');
        $this->form_validation->set_rules('mother_name', 'Enter Mother Name', 'required|trim');
        $this->form_validation->set_rules('age', 'Enter Age', 'required|trim');
        $this->form_validation->set_rules('height', 'Enter Height', 'required|trim|numeric');
        $this->form_validation->set_rules('weight', 'Enter Weight', 'required|trim|numeric');
        $this->form_validation->set_rules('kundali', 'Enter Kundali', 'required|trim');
        $this->form_validation->set_rules('rashi', 'Enter Rashi', 'required|trim');
        $this->form_validation->set_rules('birth_time', 'Enter Birth Time', 'required|trim');
        $this->form_validation->set_rules('place', 'Enter Place', 'required|trim');
        $this->form_validation->set_rules('dharmik', 'Enter Dharmik', 'required|trim');
        $this->form_validation->set_rules('maternal', 'Enter maternal', 'required|trim');*/
        
        $this->form_validation->set_rules('member_no', 'Select Member', 'required|trim');
        $this->form_validation->set_rules('mother_name', 'Enter Mother Name', 'required|trim');
        $this->form_validation->set_rules('age', 'Enter Age', 'required|trim');
        $this->form_validation->set_rules('height', 'Enter Height', 'required|trim|numeric');
        $this->form_validation->set_rules('weight', 'Enter Weight', 'required|trim|numeric');
        //$this->form_validation->set_rules('kundali', 'Enter Kundali', 'required|trim');
        //$this->form_validation->set_rules('rashi', 'Enter Rashi', 'required|trim');
        $this->form_validation->set_rules('birth_time', 'Enter Birth Time', 'required|trim');
        $this->form_validation->set_rules('place', 'Enter Place Of Birth', 'required|trim');
        //$this->form_validation->set_rules('dharmik', 'Enter Dharmik', 'required|trim');
        $this->form_validation->set_rules('maternal', 'Enter maternal', 'required|trim');
        $this->form_validation->set_rules('contact', 'Enter Contact Number', 'required|trim|numeric|min_length[10]|max_length[10]');
        
        
        $client = $this->post('client');
        $id = $this->post('id');
        if($client == 'web'){
            $ip = $this->input->ip_address();
        }else if($client == 'app'){
            $ip = $this->post('ip');
        }

        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_message('required', ' %s');
        if ($this->form_validation->run()) {
     
            $data = array(
                //$this->session->userdata('family_id')
                //'id'     			=> $this->post('id'),
                'member_no'        	=> $this->post('member_no'),
                'family_no'         => $this->post('family_no'),
                'age'    			=> $this->post('age'),
                'weight'			=> $this->post('weight'),
                'rashi'    			=> $this->post('rashi'),
                'place'				=> $this->post('place'),
                'material'        	=> $this->post('maternal'),
                'mother_name'   	=> $this->post('mother_name'),
                'height'        	=> $this->post('height'),
                'kundali'           => $this->post('kundali'),
                'birth_time'        => $this->post('birth_time'),
                'dharmik'           => $this->post('dharmik'),
                'contact'           => $this->post('contact')
            );

            /*print_r($data);
        	die();*/

            $result = $this->master_matrimonial->savedata($data, 0);

            /*print_r($result);
        	die();*/

            $this->response([
                'status'   => $result['status'],
                'validate' => TRUE,
                'message'  => $result['msg'],
            ], REST_Controller::HTTP_OK);


        } else {
            foreach ($this->input->post() as $key => $value) {
                $verror[$key] = form_error($key);
            }
            $this->response([
                'status'    => FALSE,
                'validate'  => FALSE,
                'message'   => $verror,
            ], REST_Controller::HTTP_OK);
        }
                 
    }

    function rcd_post(){

        // print_r($_POST);
        // die();

        $data           = array('status' => false,'validate' => false, 'message' => array());
        $flag           = false;
        $this->form_validation->set_rules('name', 'Enter Full Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Enter Email ID', 'required|trim|valid_email|xss_clean');
        $this->form_validation->set_rules('phone', 'Enter Phone Numbr', 'required|trim|numeric|min_length[10]|max_length[10]');
        
        $client = $this->post('client');
        $ip     = $this->input->ip_address();

        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_message('required', ' %s');
        if ($this->form_validation->run()) {
     
            $data = array(
                
                'member_no'         => $this->post('member_no'),
                'family_no'         => $this->post('family_no'),
                'age'               => $this->post('age'),
                'weight'            => $this->post('weight'),
                'rashi'             => $this->post('rashi'),
                'place'             => $this->post('place'),
                'material'          => $this->post('maternal'),
                'mother_name'       => $this->post('mother_name'),
                'height'            => $this->post('height'),
                'kundali'           => $this->post('kundali'),
                'birth_time'        => $this->post('birth_time'),
                'dharmik'           => $this->post('dharmik')
            );

            /*print_r($data);
            die();*/

            $result = $this->master_matrimonial->savedata($data, $id);

            /*print_r($result);
            die();*/

            $this->response([
                'status'   => $result['status'],
                'validate' => TRUE,
                'message'  => $result['msg'],
            ], REST_Controller::HTTP_OK);


        } else {
            foreach ($this->input->post() as $key => $value) {
                $verror[$key] = form_error($key);
            }
            $this->response([
                'status'    => FALSE,
                'validate'  => FALSE,
                'message'   => $verror,
            ], REST_Controller::HTTP_OK);
        }
                 
    }
    
    public function list_get() {
        $result = $this->master_matrimonial->matrimonial_get_list();
        if(!empty($result)){
            $data['status'] = TRUE;
            $data['data']   = $result;
            $this->response($data, REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'data'   => $result,
                'status' => FALSE,
                'message' => 'No Record Found.'
            ], REST_Controller::HTTP_OK);
        }
    }
    
    public function alllist_get() {
        $result = $this->master_matrimonial->api_matrimonial_all_list();
        if(!empty($result)){
            $data['status'] = TRUE;
            $data['data']   = $result;
            $this->response($data, REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'data'   => $result,
                'status' => FALSE,
                'message' => 'No Record Found.'
            ], REST_Controller::HTTP_OK);
        }
    }
    
    public function memberslist_get($id='') {
        $result = $this->master_matrimonial->api_matrimonial_list($id);
        if(!empty($result)){
            $data['status'] = TRUE;
            $data['data']   = $result;
            $this->response($data, REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'data'   => $result,
                'status' => FALSE,
                'message' => 'No Record Found.'
            ], REST_Controller::HTTP_OK);
        }
    }


    //getPendingList
    public function getPendingList_get() {
        $result = $this->master_matrimonial->getpendinglist();
        // print_r($result);
        if(!empty($result)){
            $data['status'] = TRUE;
            $data['data']   = $result;
            //set the response and exit
            $this->response($data, REST_Controller::HTTP_OK);
        }else{
            //set the response and exit
            $this->response([
                'data'   => $result,
                'status' => FALSE,
                'message' => 'No Record Found.'
            ], REST_Controller::HTTP_OK);
        }
    }

    public function updatedelete_post(){

    	$member_no = $this->post('member_no');
    	$id = $this->post('id');

    	/*print_r($member_no);
    	die();*/

        $this->db->trans_begin();
        $rows = 1;
        $family_member = array();

        $family_member['deleted']           = 1;
        //$family_member['deleted_on']        = date('Y-m-d H:i:s');

        //$this->db->select('matrimonial_id')->from('master_matrimonial')->where('matrimonial_id', $id);
        
        //$this->db->delete('master_matrimonial')->where('matrimonial_id', $id);
        //$query = $this->db->get();
        //$rows = $query->num_rows();
        if($rows > 0){
            // $this->db->where('matrimonial_id', $id);
            // $this->db->update('master_matrimonial', $family_member);
            
            $this->db->where('matrimonial_id', $id);
            $this->db->delete('master_matrimonial');
            
            if($this->db->trans_status() === FALSE){
                $this->db->trans_rollback();
                //$result = array("status" => false,"false" => true,"msg" => "Error While Deleting Member");
                $this->response([
                	'status'   => FALSE,
	                'validate' => TRUE,
	                'message'  => "Error While Deleting Member",
	            ], REST_Controller::HTTP_OK);
            }else{
                $this->db->trans_commit();
                //$result = array("status" => true,"success" => true,"msg" => "Member Deleted Successfully");
                $this->response([
                	'status'   => TRUE,
	                'validate' => TRUE,
	                'message'  => "Member Deleted Successfully",
	            ], REST_Controller::HTTP_OK);
            }
        }else{
            //$result = array("status" => false,"success" => true,"msg" => "Invalid Member ID");
            $this->response([
            	'status'   => FALSE,
                'validate' => TRUE,
                'message'  => 'Invalid Member ID',
            ], REST_Controller::HTTP_OK);
        }  
        //return $result;
    }


    public function index_delete($id){
        if($id){
            $this->latest->_condition['matrimonial_id'] = $id;
            $delete = $this->master_matrimonial->delete(FALSE, $id);
            if($delete){
                $this->response([
                    'status' => TRUE,
                    'message' => 'Matrimonial has been removed successfully.'
                ], REST_Controller::HTTP_OK);
            }else{
                $this->response("Some problems occurred, please try again.", REST_Controller::HTTP_BAD_REQUEST);
            }
        }else{
            $this->response([
                'status' => FALSE,
                'message' => 'No aatrimonial were found.'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    } 


    public function approved_post() {
        $id = $this->post('id');
        $result = $this->master_matrimonial->approved($id);
        if(!empty($result)){
            $data['status'] = TRUE;
            $data['data']   = $result['msg'];
            $this->response($data, REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'data'   => $result['msg'],
                'status' => FALSE,
                'message' => 'No Record Found.'
            ], REST_Controller::HTTP_OK);
        }
    }

    public function reject_post() {
        $id = $this->post('id');
        $result = $this->master_matrimonial->reject($id);
        if(!empty($result)){
            $data['status'] = TRUE;
            $data['data']   = $result['msg'];
            $this->response($data, REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'data'   => $result['msg'],
                'status' => FALSE,
                'message' => 'No Record Found.'
            ], REST_Controller::HTTP_OK);
        }
    }

     
}