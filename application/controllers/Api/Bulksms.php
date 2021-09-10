<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . './libraries/REST_Controller.php';

class Bulksms extends REST_Controller{

    public function __construct(){
        parent::__construct();
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->load->model('bulksms_model' ,'bulksms');
        $this->load->model('family_model' ,'familymembers');
        $this->load->library('upload'); //load library upload 
    }

    /*
    1.  HTTP_OK
    2.  HTTP_BAD_REQUEST
    2.  HTTP_NOT_FOUND
    */
    function save_post(){

    	$flag     	= true;
        $data     	= array('status' => false,'validate' => false, 'message' => array());

        $id       	= $this->input->post('id');
        $send_to    = $this->input->post('send_to');
        $phones 	= $this->input->post('phones');
        $multi_phone = $phones;
        $message 	= $this->input->post('message');

        if($send_to=='specific'){
        	$this->form_validation->set_rules('phones', 'Phone(s)', 'required|trim');	
        }
        $this->form_validation->set_rules('send_to', 'Send To', 'required|trim');
        $this->form_validation->set_rules('message', 'Message', 'required|trim');
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_message('required', 'Enter %s');

        if ($this->form_validation->run()) {

        	$test = "";
        	$var = "";
        	
        	//Dear Member, {#var#}{#var#}{#var#}{#var#}{#var#}{#var#}{#var#} -- from SHREE DEPA JAIN MAHAJAN TRUST
        	//[ __ each #var# is allowed only 30 characters, so use string length and break accordingly ]
        	//"1207162764704739219"
        	
        	$msg        = 'Dear Member, '.$message.' this a general notice from SHREE DEPA JAIN MAHAJAN TRUST.';
            $template   = "1207162796996711040";
            $sms_send   = "";

        	if ($send_to=='all') {
        	
        		$phones_array = $this->familymembers->getAllFamilyMemberPhones();
        		$nphones = json_encode($phones_array);
        		foreach ($phones_array as $rows) {
        			foreach ($rows as $key => $value) {
	        			$var .= $value.", ";
	        			$sms_send   = sendsms($value, $msg, $template);
	        		}
        		}
        		$test = $var;
        		
        		die();
        
        	}else{
        		$akey = array();
        		$nphones = array();
        		$clean_phone = str_replace(' ', '', $phones);
        		$phones = explode(",", $clean_phone);
        		$i = 0;
        		foreach($phones AS $key){
        		    
        		    if ($key === end($phones)) {
                        $var .= $key;
                    } else {
                        $var .= $key.", ";
                    }
        			array_push($akey, array('phone'=>$key));
        			$sms_send   = sendsms($key, $msg, $template);
        		}
        		$test = $var;
        		$nphones = json_encode($akey);

        	}
        	
        	WriteLog($sms_send);
            $data['sms_send'] = $sms_send;

        	$count = count(json_decode($nphones));

            if($flag){

                $data = array(
                    'send_to' 	=> $send_to.' || Total Members = '.$count,
                    'phones' 	=> $nphones,
                    'message'  	=> $message, 
                    'added_on'  => date('d-m-Y, h:i:sA'), 
                );

                $result = $this->bulksms->save_phone($data, $id);

                if ($result['status']) {
	                $this->response([
	                    'status'   => $result['status'],
	                    'validate' => TRUE,
	                    'message'  => $result['msg'],
	                ], REST_Controller::HTTP_OK);
	            }else{
	            	$this->response([
	                    'status'   => FALSE,
	                    'validate' => TRUE,
	                    'message'  => 'Failed, Something went wrong...',
	                ], REST_Controller::HTTP_OK);
	            }

            }
            

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

    public function index_get($id = '') {

        $this->bulksms->_condition['deleted'] = 0;
        if($id){
            $this->bulksms->_condition['id'] = $id;
        }

        $result = $this->bulksms->getRows();

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


}