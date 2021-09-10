<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . './libraries/REST_Controller.php';

class Bulkemail extends REST_Controller{

    public function __construct(){
        parent::__construct();
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->load->model('bulkemail_model' ,'bulkemail');
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
        $subject    = $this->input->post('subject');
        $send_to    = $this->input->post('send_to');
        $emails 	= $this->input->post('emails');
        $message 	= $this->input->post('message');

        if($send_to=='specific'){
        	$this->form_validation->set_rules('emails', 'Email(s)', 'required|trim');	
        }
        $this->form_validation->set_rules('subject', 'Subject', 'required|trim');
        $this->form_validation->set_rules('send_to', 'Send To', 'required|trim');
        $this->form_validation->set_rules('message', 'Message', 'required|trim');
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_message('required', 'Enter %s');

        if ($this->form_validation->run()) {

        	$test = "";
        	$var = "";

        	if ($send_to=='all') {
        	
        		$emails_array = $this->familymembers->getAllFamilyMemberEmails();
        		$nemails = json_encode($emails_array);
        		foreach ($emails_array as $rows) {
        			foreach ($rows as $key => $value) {
	        			$var .= $value.", ";

                        $to      = $value;
                        $subject = $subject;
                        $message = $message;
                        $headers = 'From: support@google.com'       . "\r\n" .
                                     'Reply-To: support@google.com' . "\r\n" .
                                     'X-Mailer: PHP/' . phpversion();

                        mail($to, $subject, $message, $headers);

	        		}
        		}
        		$test = $var;
        	}else{
        		$akey = array();
        		$nemails = array();
        		$clean_email = str_replace(' ', '', $emails);
        		$emails = explode(",", $clean_email);
        		$i = 0;
        		foreach($emails AS $key){
        			$var .= $key.", ";
        			array_push($akey, array('email'=>$key));

                    $to      = $key;
                    $subject = $subject;
                    $message = $message;
                    $headers = 'From: support@google.com'       . "\r\n" .
                                 'Reply-To: support@google.com' . "\r\n" .
                                 'X-Mailer: PHP/' . phpversion();

                    mail($to, $subject, $message, $headers);

        		}
        		$test = $var;
        		$nemails = json_encode($akey);
        	}

        	$count = count(json_decode($nemails));

            if($flag){

                $data = array(
                    'type' 		=> $send_to.' || Total Members = '.$count, 
                    'subject' 	=> $subject,
                    'emails' 	=> $nemails,
                    'message'  	=> $message, 
                    'added_on'  => date('d-m-Y, h:i:sA'), 
                );

                $result = $this->bulkemail->save_email($data, $id);

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

        $this->bulkemail->_condition['deleted'] = 0;
        if($id){
            $this->bulkemail->_condition['id'] = $id;
        }

        $result = $this->bulkemail->getRows();

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

    /*public function Donors_delete($id){
        // echo 'ID '.$id;exit;
        //check whether post id is not empty
        if($id){
            //delete post
            $this->donors->_condition['id'] = $id;
            $delete = $this->donors->delete(FALSE,$id);
            // print $this->db->last_query();
            if($delete){
                //set the response and exit
                $this->response([
                    'status' => TRUE,
                    'message' => 'Donor has been removed successfully.'
                ], REST_Controller::HTTP_OK);
            }else{
                //set the response and exit
                $this->response("Some problems occurred, please try again.", REST_Controller::HTTP_BAD_REQUEST);
            }
        }else{
            //set the response and exit
            $this->response([
                'status' => FALSE,
                'message' => 'No Donor were found.'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }*/


}