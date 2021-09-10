<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . './libraries/REST_Controller.php';

class Business extends REST_Controller{
    private $title;
    public function __construct(){
        parent::__construct();
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->load->model('Business_model' ,'business');
        $this->title = 'Business';
    }

    /*
    1.  HTTP_OK
    2.  HTTP_BAD_REQUEST
    2.  HTTP_NOT_FOUND
    */

    public function savecategory_post(){
        // echo($this->post('username'));
        // print_r($_POST);exit();
        $data 	  = array('status' => false,'validate' => false, 'message' => array());
        $category = trim($this->post('category'));
        $id       = trim($this->post('id'));
        $this->form_validation->set_rules('category', 'category', 'required|trim');
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_message('required', 'Enter %s');
        if ($this->form_validation->run()) {
            $master['category']   = $category;
            $this->business->change_table('master_business_category');
            $this->business->_condition['category'] = $category;
            $this->business->_condition['deleted'] = 0;
            $result = $this->business->insert($master, $id);
            // print $this->db->last_query();
            // print_r($result);exit;
            $this->response([
                'status'   => $result['status'],
                'validate' => TRUE,
                'message'  => 'area '.$result['msg'],
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

    public function category_get($id = '') {
        //returns all rows if the id parameter doesn't exist,
        //otherwise single row will be returned
        $this->business->change_table('master_business_category');
        $this->business->_condition['deleted'] = 0;
        if($id){
            $this->business->_condition['id'] = $id;
        }
        $result = $this->business->getRows();
        // print $this->db->last_query();
        //check if the user data exists
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

    public function category_delete($id){
        // echo 'ID '.$id;exit;
        //check whether post id is not empty
        if($id){
            //delete post
            $this->business->change_table('master_business_category');
            $this->business->_condition['id'] = $id;
            $delete = $this->business->delete(FALSE,$id);
            // print $this->db->last_query();
            if($delete){
                //set the response and exit
                $this->response([
                    'status' => TRUE,
                    'message' => $this->title.' has been removed successfully.'
                ], REST_Controller::HTTP_OK);
            }else{
                //set the response and exit
                $this->response("Some problems occurred, please try again.", REST_Controller::HTTP_BAD_REQUEST);
            }
        }else{
            //set the response and exit
            $this->response([
                'status' => FALSE,
                'message' => 'No '.$this->title.' were found.'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    
}