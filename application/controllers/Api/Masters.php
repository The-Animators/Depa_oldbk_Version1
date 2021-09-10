<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . './libraries/REST_Controller.php';

class Masters extends REST_Controller{
    public function __construct(){
        parent::__construct();
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }

    /*
    1.  HTTP_OK
    2.  HTTP_BAD_REQUEST
    2.  HTTP_NOT_FOUND
    */

    public function index_get($type=''){

        if($type != ''){
            // print_r($result);exit;
            $data = getmaster($type, 'json','');
            if(count($data) > 0){
                $this->response([
                    'status' => TRUE,
                    'data'   => $data,
                ], REST_Controller::HTTP_OK);
            }else{
                $this->response([
                    'status'  => FALSE,
                    'message' => "No Data Available",
                ], REST_Controller::HTTP_OK);
            }
        }else{
            $this->response([
                'status'   => FALSE,
                'message'  => 'Master Type Missing',
            ], REST_Controller::HTTP_OK);
        }
    }
}