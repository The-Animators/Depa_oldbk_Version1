<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . './libraries/REST_Controller.php';

class Relation extends REST_Controller{

    public function __construct(){
        parent::__construct();
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->load->model('Relation_model' ,'relation');
    }

    /*
    1.  HTTP_OK
    2.  HTTP_BAD_REQUEST
    2.  HTTP_NOT_FOUND
    */



    public function save_post(){
        // echo($this->post('username'));
        // print_r($_POST);exit();
        $data 	    = array('status' => false,'validate' => false, 'message' => array());
        $relation  = trim($this->post('relation'));
        $id         = trim($this->post('id'));
        $this->form_validation->set_rules('relation', 'Relation', 'required|trim');
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_message('required', 'Enter %s');
        if ($this->form_validation->run()) {
            $raster_Relation['relation']            = $relation;
            $this->relation->_condition['relation'] = $relation;
            $this->relation->_condition['deleted'] = 0;

            $result = $this->relation->insert($raster_Relation, $id);
            // print $this->db->last_query();
            // print_r($result);exit;
            $this->response([
                'status'   => $result['status'],
                'validate' => TRUE,
                'message'  => 'Relation '.$result['msg'],
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

    public function list_get($id = '') {
        //returns all rows if the id parameter doesn't exist,
        //otherwise single row will be returned
        $this->relation->_condition['deleted'] = 0;
        if($id){
            $this->relation->_condition['id'] = $id;
        }
        $result = $this->relation->getRows();
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

    public function relation_delete($id){
        // echo 'ID '.$id;exit;
        //check whether post id is not empty
        if($id){
            //delete post
            $this->relation->_condition['id'] = $id;
            $delete = $this->relation->delete(FALSE,$id);
            // print $this->db->last_query();
            if($delete){
                //set the response and exit
                $this->response([
                    'status' => TRUE,
                    'message' => 'Relation has been removed successfully.'
                ], REST_Controller::HTTP_OK);
            }else{
                //set the response and exit
                $this->response("Some problems occurred, please try again.", REST_Controller::HTTP_BAD_REQUEST);
            }
        }else{
            //set the response and exit
            $this->response([
                'status' => FALSE,
                'message' => 'No Relation were found.'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }


    /*
        public function user_post() {
        $userData = array();
        $userData['first_name'] = $this->post('first_name');
        $userData['last_name'] = $this->post('last_name');
        $userData['email'] = $this->post('email');
        $userData['phone'] = $this->post('phone');
        if(!empty($userData['first_name']) && !empty($userData['last_name']) && !empty($userData['email']) && !empty($userData['phone'])){
            //insert user data
            $insert = $this->user->insert($userData);
            
            //check if the user data inserted
            if($insert){
                //set the response and exit
                $this->response([
                    'status' => TRUE,
                    'message' => 'User has been added successfully.'
                ], REST_Controller::HTTP_OK);
            }else{
                //set the response and exit
                $this->response("Some problems occurred, please try again.", REST_Controller::HTTP_BAD_REQUEST);
            }
        }else{
            //set the response and exit
            $this->response("Provide complete user information to create.", REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    
    public function user_put() {
        $userData = array();
        $id = $this->put('id');
        $userData['first_name'] = $this->put('first_name');
        $userData['last_name'] = $this->put('last_name');
        $userData['email'] = $this->put('email');
        $userData['phone'] = $this->put('phone');
        if(!empty($id) && !empty($userData['first_name']) && !empty($userData['last_name']) && !empty($userData['email']) && !empty($userData['phone'])){
            //update user data
            $update = $this->user->update($userData, $id);
            
            //check if the user data updated
            if($update){
                //set the response and exit
                $this->response([
                    'status' => TRUE,
                    'message' => 'User has been updated successfully.'
                ], REST_Controller::HTTP_OK);
            }else{
                //set the response and exit
                $this->response("Some problems occurred, please try again.", REST_Controller::HTTP_BAD_REQUEST);
            }
        }else{
            //set the response and exit
            $this->response("Provide complete user information to update.", REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    
     
    */
}
