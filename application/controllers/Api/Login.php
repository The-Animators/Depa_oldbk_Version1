<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . './libraries/REST_Controller.php';

class Login extends REST_Controller{

    public function __construct(){
        parent::__construct();
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->load->model('login_model');
    }
    /*
    1.  HTTP_OK
    2.  HTTP_BAD_REQUEST
    2.  HTTP_NOT_FOUND
    */

    public function index_post(){ 
        $pst = $_POST;
        WriteLog($pst);

        $data      = array('status' => false,'validate' => false, 'message' => array());
        $this->form_validation->set_rules('username', 'User Name', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $this->form_validation->set_rules('client', 'Client', 'required|trim');
        $this->form_validation->set_rules('ip', 'IP Address', 'required|trim');
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_message('required', 'Enter %s');
        if ($this->form_validation->run()) {
            $username  = trim($this->post('username'));
            $password  = trim($this->post('password'));
            $client    = trim($this->post('client'));
            $ip        = trim($this->post('ip'));
            $result    = $this->login_model->userLogin($username, $password,$client,$ip);
            $this->response([
                'status'    => $result['status'],
                'validate'  => TRUE,
                'message'   => $result['msg'],
                'user'      => $result['user'],
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


    public function signin_post(){
        // echo($this->post('username'));
        // print_r($_POST);exit();
        $data 	   = array('status' => false,'validate' => false, 'message' => array());
        $username  = trim($this->post('username'));
        $password  = trim($this->post('password'));
        $this->form_validation->set_rules('username', 'User Name', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_message('required', 'Enter %s');
        if ($this->form_validation->run()) {
            $result = $this->login_model->adminLogin($username, $password);
            $this->response([
                'status' => $result['status'],
                'validate' => TRUE,
                'message' => $result['msg'],
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
        // echo json_encode($data);
    }

    public function logout_get()
    {
        $logintype = $this->session->userdata('logintype');
        $newdata = array(
            'user_id' 	=> '',
            'logintype'	=> '',
            'user_name' => '',
            'email' 	=> '',
            'logged_in' => false,
        );
        $this->session->unset_userdata($newdata);
        $this->session->sess_destroy();
        if($logintype == 'admin'){
            redirect('/admin/login', 'refresh');
        }else{
            redirect('/', 'refresh');
        }
    }
}
