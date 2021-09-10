<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->load->model('users_model');
        $this->load->library('bcrypt');
        $this->users_model->_primary_key = "id";
    }

    public function getbyid(){
        $data   = array('status' => false,'validate' => false, 'message' => array());
        $id     = $this->input->post('id');
        $this->form_validation->set_rules('id', 'User Id', 'trim|required|numeric');
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_message('required', 'Enter %s');
        if ($this->form_validation->run()) {
            $result = $this->users_model->getbyid($id);
            $data['status']   = true;
            $data['validate'] = true;
            $data['data']     = $result;
        }else{
            foreach ($this->input->post() as $key => $value) {
                $data['message'][$key] = form_error($key);
            }
        }
        echo json_encode($data);
    }

    public function delete(){
        $data   = array('status' => false,'validate' => false, 'message' => array());
        $id     = $this->input->post('id');
        $this->form_validation->set_rules('id', 'User Id', 'trim|required|numeric');
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_message('required', 'Enter %s');
        if ($this->form_validation->run()) {
            $result = $this->users_model->delete($id);
            $data['status']   = $result['status'];
            $data['validate'] = true;
            $data['message']  = $result['msg'];
        }else{
            foreach ($this->input->post() as $key => $value) {
                $data['message'][$key] = form_error($key);
            }
        }
        echo json_encode($data);
    }

    public function get(){
        $result = $this->users_model->get();
        $data   = array();
        $no     = 0;
        $policy = '';
        foreach ($result as $row_data) {
            $sessionid = $this->session->userdata('user_id');
            $userid = $row_data['id'];
            if($row_data['activated'] == 1){
                $status = '<span class="badge badge-success">Active</span>';
            }else{
                $status = '<span class="badge badge-danger">InActive</span>';
            }
            $no++;
            $row    = array();
            $row[]  = $row_data['full_name'];
            $row[]  = $row_data['email'];
            $row[]  = $row_data['contact_no'];
            $row[]  = $row_data['user_type'];
            $row[]  = $status;
            if($userid == $sessionid){
                $row[]  = '';
            }else{
                $row[]  = actionbtn($userid,false);
            }
            $data[] = $row;
        }
        echo json_encode(array('data' => $data));
    }

    public function save(){
        // print_r($_POST);
        $data = array('status' => false,'validate' => false, 'message' => array());
        $id = $this->input->post('id');
        $this->form_validation->set_rules('full_name', 'Full Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('contact_no', 'Contact Number', 'trim|required|numeric');
        if($id==0){
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
        }
        $this->form_validation->set_rules('user_type', 'User Type', 'trim|required');
        $this->form_validation->set_rules('activated', 'User Status', 'trim|required|numeric');
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_message('required', 'Enter %s');

        if ($this->form_validation->run()) {
            $master_users['full_name']  = trim($this->input->post('full_name'));
            $master_users['email']      = trim($this->input->post('email'));
            $master_users['contact_no'] = trim($this->input->post('contact_no'));
            $master_users['password']   = trim($this->bcrypt->hash_password($this->input->post('password')));
            $master_users['user_type']  = trim($this->input->post('user_type'));
            $master_users['activated']  = trim($this->input->post('activated'));
            $master_users['ip']         = trim($this->input->ip_address());
            $master_users['added_by']   = trim($this->session->userdata('user_id'));
            $result                     = $this->users_model->newuser($master_users, $id);
            $data['status']   = $result['status'];
            $data['validate'] = true;
            $data['message']  = $result['msg'];

        } else {
            foreach ($this->input->post() as $key => $value) {
                $data['message'][$key] = form_error($key);
            }
        }
        echo json_encode($data);
    }
}