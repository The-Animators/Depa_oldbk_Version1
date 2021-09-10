<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Changepassword extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->load->model('master_admin');
        $this->load->library('bcrypt');
    }

    public function changepwd(){
        $data   = array('status' => false,'validate' => false, 'message' => array());
        $this->form_validation->set_rules('oldpassword', 'Old Password', 'trim|required');
        $this->form_validation->set_rules('newpassword', 'Password', 'trim|required|min_length[6]');
        $this->form_validation->set_rules('confirmpassword', 'Password Confirmation', 'required|matches[newpassword]');
        $this->form_validation->set_error_delimiters('<p><i>', '</i></p>');
        $this->form_validation->set_message('required', 'Enter %s');
        
        if($this->form_validation->run()) {
            $oldpassword     = trim($this->input->post('oldpassword'));
            $password        = trim($this->input->post('newpassword'));
            $userid          = $this->session->userdata('user_id');
            $result          = $this->master_admin->changepassword($oldpassword, $password, $userid);
            $data['status']  = $result['status'];
            $data['validate']= true;
            $data['message'] = $result['msg'];
        }else{
            $data['message'] = false;
            foreach ($this->input->post() as $key => $value) {
                $data['message'][$key] = form_error($key);
            }
        }
        echo json_encode($data);
    }

}