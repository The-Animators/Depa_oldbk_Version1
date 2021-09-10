<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . './libraries/REST_Controller.php';

class Matrirequiests extends REST_Controller{

    public function __construct(){
        parent::__construct();
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->load->model('matrirequest_model' ,'mr');
        $this->title = 'Matrimonial Requests';

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
                'name'         		=> $this->post('name'),
                'email'             => $this->post('email'),
                'phone'            	=> $this->post('phone'),
                'client'            => $this->post('client'),
                'ip'             	=> $this->post('ip')
            );

            $result = $this->mr->savedata($data, 0);

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
        $result = $this->mr->get_list();
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

    public function updatedelete_post(){

    	$member_no = $this->post('member_no');
    	$id = $this->post('id');

        $this->db->trans_begin();
        $rows = 1;
        $family_member = array();

        $family_member['deleted'] = 1;

        $this->db->select('id')->from('matrimonial_requests')->where('id', $id);
        $query = $this->db->get();
        $rows = $query->num_rows();
        if($rows > 0){
            $this->db->where('id', $id);
            $this->db->update('matrimonial_requests', $family_member);
            if($this->db->trans_status() === FALSE){
                $this->db->trans_rollback();
                $this->response([
                	'status'   => FALSE,
	                'validate' => TRUE,
	                'message'  => "Error While Deleting Request",
	            ], REST_Controller::HTTP_OK);
            }else{
                $this->db->trans_commit();
                $this->response([
                	'status'   => TRUE,
	                'validate' => TRUE,
	                'message'  => "Request Deleted Successfully",
	            ], REST_Controller::HTTP_OK);
            }
        }else{
            $this->response([
            	'status'   => FALSE,
                'validate' => TRUE,
                'message'  => 'Invalid Request ID',
            ], REST_Controller::HTTP_OK);
        }  
    }

    public function approved_post() {
        $id = $this->post('id');
        $result = $this->mr->approved($id);
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
        $result = $this->mr->reject($id);
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