<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . './libraries/REST_Controller.php';

class Banner extends REST_Controller{

    public function __construct(){
        parent::__construct();
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        // $this->load->model('event_model' ,'event');
    }

    /*
    1.  HTTP_OK
    2.  HTTP_BAD_REQUEST
    2.  HTTP_NOT_FOUND
    */
    

    public function index_get($id = '') {
        $data   = array('path' => 'assets/web/images/home/','data' =>  array(), 'status' => FALSE);
        $data['data'][]['images'] = 's1.jpeg';
        $data['data'][]['images'] = 'h2.jpeg';
        $data['data'][]['images'] = 'h3.jpeg';
        if(!empty($data)){
            $data['status'] = TRUE;
            // $result['data']   = $data;
            //set the response and exit
            $this->response($data, REST_Controller::HTTP_OK);
        }else{
            //set the response and exit
            $this->response($data, REST_Controller::HTTP_OK);
        }
    }

}