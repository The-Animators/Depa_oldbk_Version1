<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . './libraries/REST_Controller.php';

class Event extends REST_Controller{

    public function __construct(){
        parent::__construct();
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->load->model('event_model' ,'event');
    }

    /*
    1.  HTTP_OK
    2.  HTTP_BAD_REQUEST
    2.  HTTP_NOT_FOUND
    */
    

    public function index_get($id = '') {
        //returns all rows if the id parameter doesn't exist,
        //otherwise single row will be returned

        // $this->event->_condition['deleted'] = 0;
        // if($id){
        //     $this->event->_condition['id'] = $id;
        // }
        // // get_all_where($where = array(), $limit = 1000000, $offset = 0)
        // $result = $this->event->get_all_where($this->event->_condition,3,0,'event_date');
        $result = getEvents($id);
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

    public function getevent_get() {
        //returns all rows if the id parameter doesn't exist,
        //otherwise single row will be returned
        $this->event->_condition['deleted'] = 0;
        $this->event->_condition['event_date < '] = date('Y-m-d');
        $pastevent = $this->event->getRows();

        unset($this->event->_condition['event_date < ']);

        $this->event->_condition['deleted'] = 0;
        $this->event->_condition['event_date > '] = date('Y-m-d');
        $upcomingevent = $this->event->getRows();
       
        $result['pastevent']     = $pastevent;
        $result['upcomingevent'] = $upcomingevent;
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

    public function geteventbyid_get($id) {
        //returns all rows if the id parameter doesn't exist,
        //otherwise single row will be returned
        $this->event->_condition['deleted'] = 0;
        if($id){
            $this->event->_condition['id'] = $id;
        }
        $result = $this->event->getRows();
        //check if the user data exists
        if(!empty($result)){
            $data['status'] = TRUE;
            $data['data']   = $result;
            $data['message']   = 'Record Found';
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
}