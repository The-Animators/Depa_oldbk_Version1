<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . './libraries/REST_Controller.php';

class Member extends REST_Controller{
    private $upload_path;
    public function __construct(){
        parent::__construct();
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->load->library('upload');
        $this->load->model('marannondh_model' ,'maran_nondh');
        $this->load->model('member_model' ,'member');
        $this->load->model('memberedit_model' ,'member_edit');
        $this->load->model('family_model' ,'family');
        $this->load->model('area_model' ,'area');
        
    }

    /*
    1.  HTTP_OK
    2.  HTTP_BAD_REQUEST
    2.  HTTP_NOT_FOUND
    */
    
    
    public function search_post() { 
        // print_r ('Member Search Controller'); 
        // print_r ($this->post('search')); 
        // print_r ('Member Search Controller'); exit();
        $search_k1       = trim($this->post('search_k1'));
        $search_k2       = trim($this->post('search_k2'));
        $search_k3       = trim($this->post('search_k3'));
        $search_v1       = trim($this->post('search_v1'));
        $search_v2       = trim($this->post('search_v2'));
        $search_v3       = trim($this->post('search_v3'));
        $returntype   = $this->post('result') ?? 'json' ;
        $fetchData    = $this->member->searchMember($search_k1,$search_v1,$search_k2,$search_v2,$search_k3,$search_v3);
        // print $this->db->last_query();
        $output         = '';
        $cur_short_name = '';  
        $cur_alpha      = '';  

        if($returntype == 'html'){
            foreach ($fetchData as $rows) {
                $contact = $rows['contact'];
                $email   = $rows['email'];
                if($contact == ''){
                    $contact = '&nbsp;';
                }
                if($email == ''){
                    $email = '&nbsp;';
                }

                $image    = $rows['image'];
                if($image != ''){
                    $fileName = FCPATH."uploads/members/".$image;
                    if (file_exists($fileName)) {
                        $img = '<img src="'.base_url().'uploads/members/'.$image.'" class="img-responsive">';
                    }else{
                        $img = '<img src="'.base_url().'assets/img/noimage.jpg" class="img-responsive">';
                    } 
                }else{
                    $img = '<img src="'.base_url().'assets/img/noimage.jpg" class="img-responsive">';
                }

                $membername     = $rows['membername'];
                $cur_short_name = $membername;
                $alpha          = strtoupper(substr($cur_short_name, 0, 1));
                if($cur_alpha != $alpha){
                    if($cur_alpha != ''){ 
                        $output .= '</div>';
                    }   
                    $cur_alpha = $alpha;
                    $output .=  '<div class="col-sm-12 alphabat"><h4>'.$cur_alpha.'</h4></div>';
                }

                $output .= '
                    <div class="col-sm-6 col-lg-3 service-block-three">
                        <div class="inner-box">
                            <span class="thumb-info thumb-info-hide-wrapper-bg">
                                <span class="thumb-info-wrapper">
                                    <a href="about-me.html">
                                        '.$img.'
                                        <span class="thumb-info-title">
                                            <span class="thumb-info-inner">'.$membername.'</span>
                                        </span>
                                    </a>
                                </span>
                                <div class="team-desc text-left">
                                    <h3>'.$contact.'</h3>
                                    <span>'.$email.'</span>
                                </div>
                            </span>
                        </div>
                    </div>';
            }
            $datam = $output;
        }else{
            $datam = $fetchData;
        }

        if(!empty($datam)){
            $data['status'] = TRUE;
            $data['data']   = $datam;
            //set the response and exit
            $this->response($data, REST_Controller::HTTP_OK);
        }else{
            //set the response and exit
            $this->response([
                'data'   => $datam,
                'status' => FALSE,
                'message' => 'No Record Found.'
            ], REST_Controller::HTTP_OK);
        }
    }
    
    public function directory_get($by = '', $html = 'json') { 
        if($by == ''){
            $by = 'All';
        }
        $datam = $this->member->getdirMember($by);
        // print $this->db->last_query();
        $output         = '';
        $cur_short_name = '';  
        $cur_alpha      = '';  

        if($html == 'html'){
            foreach ($datam as $rows) {
                $contact = $rows['contact'];
                $email   = $rows['email'];
                if($contact == ''){
                    $contact = '&nbsp;';
                }
                if($email == ''){
                    $email = '&nbsp;';
                }

                $image    = $rows['image'];
                if($image != ''){
                    $fileName = FCPATH."uploads/members/".$image;
                    if (file_exists($fileName)) {
                        $img = '<img src="'.base_url().'uploads/members/'.$image.'" class="img-responsive">';
                    }else{
                        $img = '<img src="'.base_url().'assets/img/noimage.jpg" class="img-responsive">';
                    } 
                }else{
                    $img = '<img src="'.base_url().'assets/img/noimage.jpg" class="img-responsive">';
                }
                


                $membername     = $rows['membername'];
                $cur_short_name = $membername;
                $alpha          = strtoupper(substr($cur_short_name, 0, 1));
                if($cur_alpha != $alpha){
                    if($cur_alpha != ''){ 
                        $output .= '</div>';
                    }   
                    $cur_alpha = $alpha;
                    $output .=  '<div class="col-sm-12 alphabat"><h4>'.$cur_alpha.'</h4></div>';
                }

                $output .= '
                    <div class="col-sm-6 col-lg-3 service-block-three">
                        <div class="inner-box">
                            <span class="thumb-info thumb-info-hide-wrapper-bg">
                                <span class="thumb-info-wrapper">
                                    <a href="about-me.html">
                                        '.$img.'
                                        <span class="thumb-info-title">
                                            <span class="thumb-info-inner">'.$membername.'</span>
                                        </span>
                                    </a>
                                </span>
                                <div class="team-desc text-left">
                                    <h3>'.$contact.'</h3>
                                    <span>'.$email.'</span>
                                </div>
                            </span>
                        </div>
                        
                    </div>';
            }
            $datam = $output;
        }else{
            $datam = $datam;
        }

        if(!empty($datam)){
            $data['status'] = TRUE;
            $data['data']   = $datam;
            //set the response and exit
            $this->response($data, REST_Controller::HTTP_OK);
        }else{
            //set the response and exit
            $this->response([
                'data'   => $datam,
                'status' => FALSE,
                'message' => 'No Record Found.'
            ], REST_Controller::HTTP_OK);
        }
    }


    public function detail_get($id = '') {
        // if($member_no != ''){
            $this->family->_condition['fm.deleted'] = 0;
            
            $this->family->_condition['fm.id'] = $id;
            $result = $this->family->get();            

            if(!empty($result)){
                $data['status'] = TRUE;
                $data['data'][]   = $result;
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
            
        // }
    }


    public function getpuniyatithi_get($id = '') {
        //returns all rows if the id parameter doesn't exist,
        //otherwise single row will be returned
        $this->member->_condition['deleted'] = 0;
        if($id){
            $this->member->_condition['id'] = $id;
        }
        $result = $this->member->getPuniyatithi();
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

    public function getmarannondh_get($id = '') {
        //returns all rows if the id parameter doesn't exist,
        //otherwise single row will be returned
        $this->member->_condition['deleted'] = 0;
        if($id){
            $this->member->_condition['id'] = $id;
        }
        $result = $this->member->getMarannondh();
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
    
    public function prarthana_get($id = '') {
        //returns all rows if the id parameter doesn't exist,
        //otherwise single row will be returned
        $this->member->_condition['deleted'] = 0;
        if($id){
            $this->member->_condition['id'] = $id;
        }
        $result = $this->member->getPrarthana();
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

    public function getbirthday_get($id = '') {
        //returns all rows if the id parameter doesn't exist,
        //otherwise single row will be returned
        $this->member->_condition['deleted'] = 0;
        if($id){
            $this->member->_condition['id'] = $id;
        }
        $result = $this->member->getBirthday();
        // print_r($result);
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

    public function getmarriage_get($id = '') {
        //returns all rows if the id parameter doesn't exist,
        //otherwise single row will be returned
        $this->member->_condition['deleted'] = 0;
        if($id){
            $this->member->_condition['id'] = $id;
        }
        $result = $this->member->getMarriage();
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

    public function getusername_post(){
 
        $data     = array('status' => false, 'validate' => false, 'message' => array());
        
        $this->form_validation->set_rules('first_name', 'Enter First Name', 'required|trim');
        $this->form_validation->set_rules('second_name', 'Enter Second Name', 'required|trim');
        $this->form_validation->set_rules('surname_id', 'Select Surname', 'required|trim');
        $this->form_validation->set_rules('dob', 'Select Date of Birth', 'required|trim');

        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_message('required', ' %s');
        if ($this->form_validation->run()) {

            $this->member->_condition['deleted']        = 0;
            $this->member->_condition['first_name']     = $this->input->post('first_name');
            $this->member->_condition['second_name']    = $this->input->post('second_name');
            $this->member->_condition['surname_id']     = $this->input->post('surname_id');
            $this->member->_condition['dob']            = $this->input->post('dob');

            $result = $this->member->getMemberDetails();
            //check if the user data exists
            if(!empty($result)){
                if($result[0]['username'] != '' && (!is_null($result[0]['username'])) ){ // If username is already created
                    $code   = mt_rand(100000, 999999);
                    $sent   = false;
                    if($result[0]['contact'] != ''){
                        
                        $msg        = ' Dear Member, your OTP is '. $code .' for the request of reset password with SHREE DEPA JAIN MAHAJAN TRUST. Please Do Not Share To Anyone.';
                        $mobile     =  $result[0]['contact'];
                        $template     = "1207162764583631891";
                        $sms_send   = sendsms($mobile,$msg,$template);
                        WriteLog($sms_send);
                        $data['sms_send'] = $sms_send;
                        $sent       = true;
                        
                    }
                    if($result[0]['email'] != ''){
                        $email_data['code']         = $code;
                        $email_data['first_name']   = $result[0]['first_name'];

                        $settings = array(); 
                        $settings['messagebody']    = $this->load->view('email/otp', $email_data, true);
                        $settings['to_email']       = $result[0]['email'];
                        // $settings['cc_email']       = 'harshnagda95@gmail.com';
                        // $settings['bcc_email']      = 'muffadal.haji@gmail.com';
                        // $master_user['pagename']           = 'register';
                        //$settings['subject']        = 'OTP to Reset Password - '.$this->config->item('company_name').' @ '.$this->config->item('web_url');
                        $settings['subject']         = 'OTP to Reset Password - Shree Depa Jain Mahajan Trust'; 
                        $msg_send                   = SendUserEmail($settings);
                        WriteLog($msg_send);
                        $sent   = true;
                    }
                    if($sent){
                        $data['message']  = 'otp';
                        $data['code']     = $code;
                        $data['username'] = $result[0]['username'];
                    }else{
                        $data['message']  = 'nodetails';
                        $data['code']     = $code;
                        $data['username'] = $result[0]['username'];
                    }
                }else{
                    $data['message']  = 'new';
                }
                $data['member_id']       = $result[0]['id'];
                $data['status'] = TRUE;
                $data['validate'] = TRUE;
                //set the response and exit
                $this->response($data, REST_Controller::HTTP_OK);
            }else{
                //set the response and exit
                $this->response([
                    'data'   => $result,
                    'status' => FALSE,
                    'validate' => TRUE,
                    'message' => 'No Record Found.'
                ], REST_Controller::HTTP_OK);
            }
        } else {
            foreach ($this->post() as $key => $value) {
                $verror[$key] = form_error($key);
            }
            $cer = validation_errors();
            $this->response([
                'status'    => FALSE,
                'validate'  => FALSE,
                'message'   => $verror,
                'cer'       => $cer,
            ], REST_Controller::HTTP_OK);
        }
    }
    
    
    public function generatepinandroid_post(){
 
        $data     = array('status' => false, 'validate' => false, 'message' => array());
        
        $android_pin = $this->input->post('token');
        
        $this->member->_condition['deleted']   = 0;
        $this->member->_condition['id']        = $this->input->post('member_id');

        $result = $this->member->getMemberPinInfo();
        $check = count($result);

        if ($check == 1) {
            $email = $result[0]['email'];
            $phone = $result[0]['contact'];
        }else{
            $email = '';
            $phone = '';
        }

        // print_r($result);
        // die();

        if(!empty($result)){

            $code   = $android_pin;
            $sent   = false;

            if($phone != ''){
                
                $msg        = ' Dear Member, your unique PIN is '. $code .' with SHREE DEPA JAIN MAHAJAN TRUST. Only for first time and then set a new password. Do Not Share To Anyone.';
                $sms_send   = sendsms($phone, $msg, "1207162797011858538");
                $sent       = true;

                //Set OTP in session
                $otp_session_data = array('otp_pin' => $code);
                $this->session->set_userdata($otp_session_data);

            }

            if($email != ''){

                $sent = true;
                
                $subject = "First Time Login PIN Verification - Shree Depa Jain Mahajan Trust";
            
                $message = "
                <!DOCTYPE html>
                <html lang='en'>
                <head>
                	<meta charset='utf-8'>
                	<style type='text/css'>#container,code{border:1px solid #D0D0D0}::selection{background-color:#E13300;color:#fff}::-moz-selection{background-color:#E13300;color:#fff}body{background-color:#fff;margin:40px;font:13px/20px normal Helvetica,Arial,sans-serif;color:#4F5155}a,h1{background-color:transparent;font-weight:400}a{color:#039}h1{color:#444;border-bottom:1px solid #D0D0D0;font-size:19px;margin:0 0 14px;padding:14px 15px 10px}code{font-family:Consolas,Monaco,Courier New,Courier,monospace;font-size:12px;background-color:#f9f9f9;color:#002166;display:block;margin:14px 0;padding:12px 10px}#body{margin:0 15px}p.footer{text-align:right;font-size:11px;border-top:1px solid #D0D0D0;line-height:32px;padding:0 10px;margin:20px 0 0}#container{margin:10px;box-shadow:0 0 8px #D0D0D0}</style>
                </head>
                <body>
                <div id='container'>
                	<div id='body' style='margin-top: 20px;'>
                
                		Dear Member, <br><br> Your unique PIN is <b>".$code."</b> with SHREE DEPA JAIN MAHAJAN TRUST. Only for first time and then set a new password.

                        <br>

                        Do Not Share To Anyone.
                	</div>
                	<p class='footer'>Team The Animator</p><br><br>
                	
                </div>
                </body>
                </html>
                ";
                
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $headers .= 'From: <support@panjodepa.com>' . "\r\n";
            
                mail($email, $subject, $message, $headers);

            }

            if ($sent) {
                $this->response([
                    'status' => TRUE,
                    'validate' => TRUE,
                    'message' => 'OTP Sent.'
                ], REST_Controller::HTTP_OK);
            }else{
                $this->response([
                    'status' => FALSE,
                    'validate' => TRUE,
                    'message' => 'Failed to send OTP.'
                ], REST_Controller::HTTP_OK);
            }

        }else{
            $this->response([
                'status' => FALSE,
                'validate' => FALSE,
                'message' => 'No Record Found.'
            ], REST_Controller::HTTP_OK);
        }
        
    }
    
    
    
    public function generatepin_post(){
 
        $data     = array('status' => false, 'validate' => false, 'message' => array());

        $this->member->_condition['deleted']    = 0;
        $this->member->_condition['id']        = $this->input->post('member_id');

        $result = $this->member->getMemberPinInfo();
        $check = count($result);

        if ($check == 1) {
            $email = $result[0]['email'];
            $phone = $result[0]['contact'];
        }else{
            $email = '';
            $phone = '';
        }

        // print_r($result);
        // die();

        if(!empty($result)){

            $code   = mt_rand(1000, 9999);
            $sent   = false;

            if($phone != ''){
                // $msg        = $code .' is the OTP for your request to reset your password. DO NOT SHARE WITH ANYONE';
                // $sms_send   = sendsms($phone, $msg, "1207161822005340487");
                
                $msg        = ' Dear Member, your unique PIN is '. $code .' with SHREE DEPA JAIN MAHAJAN TRUST. Only for first time and then set a new password. Do Not Share To Anyone.';
                $sms_send   = sendsms($phone, $msg, "1207162797011858538");
                $sent       = true;

                //Set OTP in session
                $otp_session_data = array('otp_pin' => $code);
                $this->session->set_userdata($otp_session_data);

                //Read The Session
                //$otp_pin = $this->session->userdata('otp_pin');

                //Unset The Session
                //$data = array('otp_pin' => '');
                //$this->session->unset_userdata($data);
                //$this->session->sess_destroy();

            }

            if($email != ''){

                $sent = true;
                
                $subject = "First Time Login PIN Verification - Shree Depa Jain Mahajan Trust";
            
                $message = "
                <!DOCTYPE html>
                <html lang='en'>
                <head>
                	<meta charset='utf-8'>
                	<style type='text/css'>#container,code{border:1px solid #D0D0D0}::selection{background-color:#E13300;color:#fff}::-moz-selection{background-color:#E13300;color:#fff}body{background-color:#fff;margin:40px;font:13px/20px normal Helvetica,Arial,sans-serif;color:#4F5155}a,h1{background-color:transparent;font-weight:400}a{color:#039}h1{color:#444;border-bottom:1px solid #D0D0D0;font-size:19px;margin:0 0 14px;padding:14px 15px 10px}code{font-family:Consolas,Monaco,Courier New,Courier,monospace;font-size:12px;background-color:#f9f9f9;color:#002166;display:block;margin:14px 0;padding:12px 10px}#body{margin:0 15px}p.footer{text-align:right;font-size:11px;border-top:1px solid #D0D0D0;line-height:32px;padding:0 10px;margin:20px 0 0}#container{margin:10px;box-shadow:0 0 8px #D0D0D0}</style>
                </head>
                <body>
                <div id='container'>
                	<div id='body' style='margin-top: 20px;'>
                
                		Dear Member, <br><br> Your unique PIN is <b>".$code."</b> with SHREE DEPA JAIN MAHAJAN TRUST. Only for first time and then set a new password.

                        <br>

                        Do Not Share To Anyone.
                	</div>
                	<p class='footer'>Team The Animator</p><br><br>
                	
                </div>
                </body>
                </html>
                ";
                
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $headers .= 'From: <support@panjodepa.com>' . "\r\n";
            
                mail($email, $subject, $message, $headers);

            }

            if ($sent) {
                //$otp_pin = $this->session->userdata('otp_pin');
                $this->response([
                    'status' => TRUE,
                    'validate' => TRUE,
                    'message' => 'OTP Sent.'
                ], REST_Controller::HTTP_OK);
            }else{
                $this->response([
                    'status' => FALSE,
                    'validate' => TRUE,
                    'message' => 'Failed to send OTP.'
                ], REST_Controller::HTTP_OK);
            }

        }else{
            $this->response([
                'status' => FALSE,
                'validate' => FALSE,
                'message' => 'No Record Found.'
            ], REST_Controller::HTTP_OK);
        }
        
    }

    public function verifypin_post(){
 
        $data       = array('status' => false, 'validate' => false, 'message' => array());

        $this->form_validation->set_rules('pin', '4 Digit PIN', 'trim|numeric|required|min_length[4]|max_length[4]');
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_message('required', 'Enter %s');
        
        if ($this->form_validation->run()) {

            $verified   = false;

            //Set OTP in session
            //$otp_session_data = array('otp_pin' => $code);
            //$this->session->set_userdata($otp_session_data);

            //Read The Session
            $otp_pin = $this->session->userdata('otp_pin');

            //Unset The Session
            //$data = array('otp_pin' => '');
            //$this->session->unset_userdata($data);
            //$this->session->sess_destroy();

            $verification_pin = $this->input->post('pin');

            // print_r($verification_pin);
            // die();

            if($otp_pin == $verification_pin){
                $verified = true;
            }

            if ($verified) {
                $this->response([
                    'status' => TRUE,
                    'validate' => TRUE,
                    'message' => 'Verified, Please Create Username & Password'
                ], REST_Controller::HTTP_OK);
            }else{
                $this->response([
                    'status' => FALSE,
                    'validate' => TRUE,
                    'message' => 'Invalid, Failed to verify OTP.'
                ], REST_Controller::HTTP_OK);
            }
        }else{
            foreach ($this->post() as $key => $value) {
                $verror[$key] = form_error($key);
            }
            $this->response([
                'status'    => FALSE,
                'validate'  => FALSE,
                'message'   => $verror,
            ], REST_Controller::HTTP_OK);
        }
        
    }   

    public function getaltlogin_post(){
 
       $data     = array('status' => false, 'validate' => false, 'message' => array(),'member_id'=> 0);
        
        $this->form_validation->set_rules('first_name', 'Enter First Name', 'required|trim');
        $this->form_validation->set_rules('second_name', 'Enter Second Name', 'required|trim');
        $this->form_validation->set_rules('surname_id', 'Select Surname', 'required|trim');
        // $this->form_validation->set_rules('village_id', 'Select Village', 'required|trim');
        $this->form_validation->set_rules('dob', 'Select Date of Birth', 'required|trim');

        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_message('required', ' %s');
        if ($this->form_validation->run()) {

            $this->member->_condition['deleted']        = 0;
            $this->member->_condition['first_name']     = $this->input->post('first_name');
            $this->member->_condition['second_name']    = $this->input->post('second_name');
            $this->member->_condition['surname_id']     = $this->input->post('surname_id');
            $this->member->_condition['dob']            = $this->input->post('dob');

            $result = $this->member->getMemberPinInfo();
            $check = count($result);

            if ($check == 0) {
                    
                $array = array(
                    'id' => 0,
                    'contact' => '',
                    'email' => '',
                    'status' => false
                );

            }else{

                $phone = $result[0]['contact'];
                $email = $result[0]['email'];
                $password = $result[0]['password'];

                $maskedPhone = substr($phone, 0, 2) . "****" . substr($phone, 7, 3);
                $maskedEmail = $this->member->emailMask($email);

                if (!empty($password)) {
                    $array = array(
                        'id' => $result[0]['id'],
                        'contact' => $maskedPhone,
                        'email' => $maskedEmail,
                        'status' => true
                    );
                }else{
                    $array = array(
                        'id' => $result[0]['id'],
                        'contact' => $maskedPhone,
                        'email' => $maskedEmail,
                        'status' => false
                    );
                }

            }

            if(!empty($result)){
                $data['status']     = TRUE;
                $data['validate']   = TRUE;
                $data['message']    = 'Member Found';
                $data['data']       = $array;
                $this->response($data, REST_Controller::HTTP_OK);
            }else{
                $this->response([
                    'data'   => $result,
                    'status' => FALSE,
                    'validate' => TRUE,
                    'message' => 'No Record Found.'
                ], REST_Controller::HTTP_OK);
            }
        } else {
            foreach ($this->post() as $key => $value) {
                $verror[$key] = form_error($key);
            }
            $cer = validation_errors();
            $this->response([
                'status'    => FALSE,
                'validate'  => FALSE,
                'message'   => $verror,
                'cer'       => $cer,
            ], REST_Controller::HTTP_OK);
        }
    }
    

    /*public function getaltlogin_post(){
 
       $data     = array('status' => false, 'validate' => false, 'message' => array(),'member_id'=> 0);
        
        $this->form_validation->set_rules('first_name', 'Enter First Name', 'required|trim');
        $this->form_validation->set_rules('second_name', 'Enter Second Name', 'required|trim');
        $this->form_validation->set_rules('surname_id', 'Select Surname', 'required|trim');
        $this->form_validation->set_rules('dob', 'Select Date of Birth', 'required|trim');

        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_message('required', ' %s');
        if ($this->form_validation->run()) {

            $this->member->_condition['deleted']        = 0;
            $this->member->_condition['first_name']     = $this->input->post('first_name');
            $this->member->_condition['second_name']    = $this->input->post('second_name');
            $this->member->_condition['surname_id']     = $this->input->post('surname_id');
            $this->member->_condition['dob']            = $this->input->post('dob');

            $result = $this->member->getMemberId();
            
            if(!empty($result)){
                $data['status']     = TRUE;
                $data['validate']   = TRUE;
                $data['message']    = 'Member Found';
                $data['member_id']  = $result[0]['id'];
                $this->response($data, REST_Controller::HTTP_OK);
            }else{
                $this->response([
                    'data'   => $result,
                    'status' => FALSE,
                    'validate' => TRUE,
                    'message' => 'No Record Found.'
                ], REST_Controller::HTTP_OK);
            }
        } else {
            foreach ($this->post() as $key => $value) {
                $verror[$key] = form_error($key);
            }
            $cer = validation_errors();
            $this->response([
                'status'    => FALSE,
                'validate'  => FALSE,
                'message'   => $verror,
                'cer'       => $cer,
            ], REST_Controller::HTTP_OK);
        }
    }   */


    public function create_username_post(){
        $data     = array('status' => false, 'validate' => false, 'message' => array());
        $this->form_validation->set_rules('member_id', 'Member ID', 'required|trim');
        $this->form_validation->set_rules('user_name', 'User Name', 'required|trim|callback_alpha_dash_space');
        $this->form_validation->set_rules('newpassword', 'Password', 'trim|required|min_length[6]');
        $this->form_validation->set_rules('repassword', 'Confirm Password', 'trim|matches[newpassword]');
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_message('required', '%s');
        if ($this->form_validation->run()) {

            $this->member->_condition['deleted']        = 0;
            $this->member->_condition['username']      = $this->input->post('user_name');

            $result = $this->member->CheckUsername();
            //check if the user data exists
            if(!empty($result)){

                $data['status'] = FALSE;
                $data['validate'] = TRUE;
                $data['message']   = 'Username Already Exist, Please try another username';
                //set the response and exit
                $this->response($data, REST_Controller::HTTP_OK);
            }else{
                $memberdata['member_id']    = $this->input->post('member_id');
                $memberdata['user_name']    = $this->input->post('user_name');
                $memberdata['password']     = $this->input->post('newpassword');

                $result = $this->member->CreateUsername($memberdata);
                $data['status']     = $result['status'];
                $data['validate']   = TRUE;
                $data['message']    = $result['msg'];
                //set the response and exit
                $this->response($data, REST_Controller::HTTP_OK);
            }
        } else {
            foreach ($this->post() as $key => $value) {
                $verror[$key] = form_error($key);
            }
            $cer = validation_errors();
            $this->response([
                'status'    => FALSE,
                'validate'  => FALSE,
                'message'   => $verror,
                'cer'       => $cer,
            ], REST_Controller::HTTP_OK);
        }
    }

    public function address_post(){

        $pst['post'] = $_POST;
        $pst['files'] = $_FILES;

        WriteLog($pst);
        $data     = array('status' => false, 'validate' => false, 'message' => array());
        $this->form_validation->set_rules('memberid', 'Enter Member ID', 'trim|numeric|required');
        $this->form_validation->set_rules('address1', 'Enter Address1', 'trim|required');
        $this->form_validation->set_rules('address2', 'Enter Address2', 'trim|required');
        $this->form_validation->set_rules('area_id', 'Select Area', 'trim|numeric|required');
        $this->form_validation->set_rules('pincode', 'Enter Pincode', 'trim|numeric|min_length[6]|max_length[6]|required');
        $this->form_validation->set_rules('email', 'Enter Email', 'trim|valid_email|required');
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_message('required', ' %s');
        if ($this->form_validation->run()) {

            $memberid                   = $this->input->post('memberid');
            $memberdata['address_1']    = $this->input->post('address1');
            $memberdata['address_2']    = $this->input->post('address2');
            
            $memberdata['landline']     = $this->input->post('landline');
            $memberdata['area_id']      = $this->input->post('area_id');
            $memberdata['pincode']      = $this->input->post('pincode');
            $memberdata['email']        = $this->input->post('email');

            $result = $this->member->Changeaddress($memberdata,$memberid);
            $data['status']     = $result['status'];
            $data['validate']   = TRUE;
            $data['message']    = $result['msg'];
            //set the response and exit
            $this->response($data, REST_Controller::HTTP_OK);
        } else {
            foreach ($this->post() as $key => $value) {
                $verror[$key] = form_error($key);
            }
            $cer = validation_errors();
            $this->response([
                'status'    => FALSE,
                'validate'  => FALSE,
                'message'   => $verror,
                'cer'       => $cer,
            ], REST_Controller::HTTP_OK);
        }
    }
    
    public function androidaddress_post(){

        $pst['post'] = $_POST;
        $pst['files'] = $_FILES;

        WriteLog($pst);
        $data     = array('status' => false, 'validate' => false, 'message' => array());
        $this->form_validation->set_rules('memberid', 'Enter Member ID', 'trim|numeric|required');
        $this->form_validation->set_rules('address1', 'Enter Address1', 'trim|required');
        $this->form_validation->set_rules('address2', 'Enter Address2', 'trim|required');
        $this->form_validation->set_rules('area_id', 'Select Area', 'trim|required');
        $this->form_validation->set_rules('pincode', 'Enter Pincode', 'trim|numeric|min_length[6]|max_length[6]|required');
        $this->form_validation->set_rules('email', 'Enter Email', 'trim|valid_email|required');
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_message('required', ' %s');
        if ($this->form_validation->run()) {

            $memberid                   = $this->input->post('memberid');
            $memberdata['address_1']    = $this->input->post('address1');
            $memberdata['address_2']    = $this->input->post('address2');
            
            $getAreaID = $this->area->getAreaId($this->input->post('area_id'));
            
            // print_r();
            // die();
            
            $memberdata['landline']     = $this->input->post('landline');
            $memberdata['area_id']      = $getAreaID[0]['id'];
            $memberdata['pincode']      = $this->input->post('pincode');
            $memberdata['email']        = $this->input->post('email');

            $result = $this->member->Changeaddress($memberdata, $memberid);
            $data['status']     = $result['status'];
            $data['validate']   = TRUE;
            $data['message']    = $result['msg'];
            //set the response and exit
            $this->response($data, REST_Controller::HTTP_OK);
        } else {
            foreach ($this->post() as $key => $value) {
                $verror[$key] = form_error($key);
            }
            $cer = validation_errors();
            $this->response([
                'status'    => FALSE,
                'validate'  => FALSE,
                'message'   => $verror,
                'cer'       => $cer,
            ], REST_Controller::HTTP_OK);
        }
    }

    public function marriage_post(){
        $pst['post'] = $_POST;
        $pst['files'] = $_FILES;

        WriteLog($pst);
        $data     = array('status' => false, 'validate' => false, 'message' => array());
        $this->form_validation->set_rules('memberid', 'Enter Member ID', 'trim|numeric|required');
        $this->form_validation->set_rules('marriage_type', 'Enter Marriage Type', 'trim|numeric|required');
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_message('required', ' %s');
        if ($this->form_validation->run()) {

            $memberid                    = $this->input->post('memberid');
            $memberdata['marriage_type'] = $this->input->post('marriage_type');
            $memberdata['dom']           = $this->input->post('dom');

            $result = $this->member->updatemarriage($memberdata,$memberid);
            $data['status']     = $result['status'];
            $data['validate']   = TRUE;
            $data['message']    = $result['msg'];
            //set the response and exit
            $this->response($data, REST_Controller::HTTP_OK);
        } else {
            foreach ($this->post() as $key => $value) {
                $verror[$key] = form_error($key);
            }
            $cer = validation_errors();
            $this->response([
                'status'    => FALSE,
                'validate'  => FALSE,
                'message'   => $verror,
                'cer'       => $cer,
            ], REST_Controller::HTTP_OK);
        }
    }   

    public function resetpassword_post(){
 
       $data     = array('status' => false, 'validate' => false, 'message' => array());
        
        $this->form_validation->set_rules('member_id', 'Enter Member ID', 'required|trim');
        $this->form_validation->set_rules('reset_password', 'Password Required', 'trim|required|min_length[6]');
        $this->form_validation->set_rules('reset_repassword', 'Confirm Password', 'trim|matches[reset_password]');
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_message('required', ' %s');
        if ($this->form_validation->run()) {

            $memberdata['member_id']    = $this->input->post('member_id');
            $memberdata['password']     = $this->input->post('reset_password');

            $result = $this->member->ResetPassword($memberdata);
            $data['status']     = $result['status'];
            $data['validate']   = TRUE;
            $data['message']    = $result['msg'];
            //set the response and exit
            $this->response($data, REST_Controller::HTTP_OK);
        } else {
            foreach ($this->post() as $key => $value) {
                $verror[$key] = form_error($key);
            }
            $cer = validation_errors();
            $this->response([
                'status'    => FALSE,
                'validate'  => FALSE,
                'message'   => $verror,
                'cer'       => $cer,
            ], REST_Controller::HTTP_OK);
        }
    }



    public function rejectprofile_post(){
        $data               = array('status' => false, 'validate' => false, 'message' => array());
        $member_id          = $this->input->post('id');

        // print_r($member_id);
        // die();

        $memberdata['fm_status']                  = 1;
        $memberdata['updated_on']                 = date('Y-m-d h:i:s');
        $result  = $this->member->rejectprofile($memberdata, $member_id);

        if ($result['status']) {
            $data['status']     = $result['status'];
            $data['validate']   = TRUE;
            $data['message']    = $result['msg'];
            $this->response(true, REST_Controller::HTTP_OK);
        }else{
            $data['status']     = FALSE;
            $data['validate']   = TRUE;
            $data['message']    = "Something went wrong";
            $this->response($data, REST_Controller::HTTP_OK);
        }

    }


    public function approveprofile_post(){

        $data               = array('status' => false, 'validate' => false, 'message' => array());
        $member_no          = $this->input->post('member_no');
        $member_id          = $this->input->post('member_id');
        $family_id          = $this->input->post('family_id');

        $getData = $this->member->getNewValue($member_id);
        
        // print_r($getData);
        // die();
        
        $result_new         = json_decode($getData);
        $ndata              = $result_new[0];

        $memberdata['first_name']                 = $ndata->first_name;
        $memberdata['second_name']                = $ndata->second_name;
        $memberdata['third_name']                 = $ndata->third_name;
        $memberdata['sex']                        = $ndata->sex;
        $memberdata['surname_id']                 = $ndata->surname_id;
        $memberdata['other_surname_details']      = $ndata->other_surname_details;
        $memberdata['blood_id']                   = $ndata->blood_id;
        $memberdata['relation_id']                = $ndata->relation_id;
        $memberdata['other_relation_details']     = $ndata->other_relation_details;
        $memberdata['marriage_type']              = $ndata->marriage_type;
        $memberdata['education_id']               = $ndata->education_id;
        $memberdata['other_education_details']    = $ndata->other_education_details;
        $memberdata['occupation_id']              = $ndata->occupation_id;
        $memberdata['other_occupation_details']   = $ndata->other_occupation_details;
        $memberdata['dob']                        = $ndata->dob;
        $memberdata['dom']                        = $ndata->dom;
        $memberdata['dod']                        = $ndata->dod;
        $memberdata['contact']                    = $ndata->contact;
        $memberdata['altcontact']                 = $ndata->altcontact;
        $memberdata['email']                      = $ndata->email;
        $memberdata['member_type']                = $ndata->member_type;
        $memberdata['medical_insurance']          = $ndata->medical_insurance;
        $memberdata['achivements']                = $ndata->achivements;
        $memberdata['sports_id']                  = $ndata->sports_id;
        $memberdata['other_sports_details']       = $ndata->other_sports_details;
        $memberdata['dharmik_id']                 = $ndata->dharmik_id;
        $memberdata['life_insurance_text']        = $ndata->life_insurance_text;
        $memberdata['medical_insurance_text']     = $ndata->medical_insurance_text;
        $memberdata['sanjeevni']                  = $ndata->sanjeevni;
        $memberdata['life_insurance']             = $ndata->life_insurance;
        $memberdata['image']                      = $ndata->image;
        $memberdata['old_value']                  = $getData;
        $memberdata['fm_status']                  = 1;
        $memberdata['updated_on']                 = date('Y-m-d h:i:s'); //2020-10-21 13:19:46

        if(($memberdata['marriage_type'] > 2 && $memberdata['marriage_type'] < 6) && $memberdata['sex'] == 'F'){
            $family_marriage['family_id']        = $family_id;
            $family_marriage['member_id']        = $member_id;
            $family_marriage['first_name']        = $ndata->first_name;
            $family_marriage['second_name']       = $ndata->m_secondname;
            $family_marriage['third_name']        = $ndata->m_thirdname;
            $family_marriage['surname']          = $ndata->m_surname;
            $family_marriage['village']          = $ndata->m_village;
            $family_marriage['address']          = $ndata->m_address;
            $family_marriage['type']             = $ndata->m_type;
            $family_marriage['contact']          = $ndata->m_contact;
            $family_marriage['email']            = $ndata->m_email;
        }else{
            $family_marriage = array();
        }
        
        // print_r($memberdata);
        // die();

        $family_business = array();
        $family_master = array();
        $result  = $this->member->updateprofile($memberdata, $member_id, $family_marriage, $family_business, $family_master);

        if ($result['status']) {
            $data['status']     = $result['status'];
            $data['validate']   = TRUE;
            $data['message']    = $result['msg'];
            $this->response($data, REST_Controller::HTTP_OK);
        }else{
            $data['status']     = FALSE;
            $data['validate']   = TRUE;
            $data['message']    = "Something went wrong";
            $this->response($data, REST_Controller::HTTP_OK);
        }


    }




    public function profile_post(){

        $data               = array('status' => false, 'validate' => false, 'message' => array());
        
        $pst['post']        = $_POST;
        $pst['files']       = $_FILES;

        $family_marriage    = array();
        $family_business    = array();
        $family_master      = array();
        $member_id          = $this->input->post('member_id') ?? 0 ;
        $family_id          = $this->input->post('family_id') ?? 0 ;
        $member_no          = $this->input->post('member_no') ;
        $status             = $this->input->post('status') ;

        $surname            = $this->input->post('surname');
        $occupation         = $this->input->post('occupation');
        $education_id       = $this->input->post('education_id');
        $relation           = $this->input->post('relation');
        
        $upload_path        = $this->config->item('upload_path');
        $this->upload_path  = $upload_path."members/";

        $this->form_validation->set_rules('family_id', 'Family Id', 'trim|numeric|required');
        $this->form_validation->set_rules('member_id', 'Member Id', 'trim|numeric|required');

        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
        $this->form_validation->set_rules('second_name', 'Second Name', 'trim|required');
        $this->form_validation->set_rules('third_name', 'Third Name', 'trim|required');
        $this->form_validation->set_rules('surname', 'Surname', 'trim|numeric|required');

        if ($this->input->post('education_id')) {
            for($count=0; $count < count($this->input->post('education_id')); $count++){
                $check = $this->input->post('education_id')[$count];
                if ($check==1) {
                    // education-input
                    $this->form_validation->set_rules('education-input', 'Other Education Details', 'trim|required');
                }
            }
        }else{
            $this->form_validation->set_rules('education_id', 'Please Select Education', 'trim|required');
        }

        if ($surname==115) {
            $this->form_validation->set_rules('surname_input', 'Other Surname Details', 'trim|required');
        }
        $this->form_validation->set_rules('gender', 'Gender', 'trim|required');
        $this->form_validation->set_rules('dob', 'Date Of Birth', 'trim|required');
        $this->form_validation->set_rules('relation', 'Relation', 'trim|numeric|required');
        if ($relation==39) {
            $this->form_validation->set_rules('relation_input', 'Other Relation Details', 'trim|required');
        }
        $this->form_validation->set_rules('blood', 'Blood Group', 'trim|numeric|required');
        $this->form_validation->set_rules('occupation', 'Occupation', 'trim|required');
        if ($occupation==19) {
            $this->form_validation->set_rules('occupation-input', 'Other Occupation Details', 'trim|required');
        }
        $this->form_validation->set_rules('marriage_type', 'Marital Status', 'trim|numeric|required');
        if($this->input->post('m_type') !='' && ($this->input->post('marriage_type') > 2 && $this->input->post('marriage_type') < 6) && $this->input->post('gender') == 'F'){
            $this->form_validation->set_rules('m_secondname', 'Father/Husband Name', 'trim|required');
            $this->form_validation->set_rules('m_surname', 'Father/Husband Surname', 'trim|numeric|required');
            $this->form_validation->set_rules('m_village', 'Village', 'trim|numeric|required');
            $this->form_validation->set_rules('m_contact', 'Contact', 'trim|required');
        }
        $this->form_validation->set_rules('contact', 'Contact', 'trim|numeric|required');
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_message('required', 'Enter %s');
        
        if ($this->form_validation->run()) {
            
            // print_r($member_no.' - '.$member_id);
            // die();

            /*********** FORM EDIT ********************/
            if ($member_no!='' && $member_id!=0) {
                

                /***** OLD WALA VALUE *****/
                $first_name               = $this->input->post('old_first_name');
                $second_name              = $this->input->post('old_second_name');
                $third_name               = $this->input->post('old_third_name');
                $sex                      = $this->input->post('old_gender');
                $surname_id               = $this->input->post('old_surname');
                $other_surname_details    = $this->input->post('old_surname_input') ?? null;
                $blood_id                 = $this->input->post('old_blood');
                $relation_id              = $this->input->post('old_relation');
                $other_relation_details   = $this->input->post('old_relation_input') ?? null;
                $marriage_type              = $this->input->post('old_marriage_type');
                $education_id               = $this->input->post('old_education') ?? null;
                $other_education_details    = $this->input->post('old_education_input') ?? null;
                $occupation_id              = $this->input->post('old_occupation') ?? null;
                $other_occupation_details   = $this->input->post('old_occupation_input') ?? null;
                $dob                        = $this->input->post('old_dob') ?? null;
                $old_dom                    = $this->input->post('old_dom') ?? null;
                $dod                        = $this->input->post('old_dod') ?? null;
                $contact              = $this->input->post('old_contact');
                $altcontact           = $this->input->post('old_altcontact') ?? null;
                $email                = $this->input->post('old_email') ?? null;
                $member_type          = $this->input->post('old_member_type') ?? null;
                $medical_insurance    = $this->input->post('old_medical_insurance');
                $medical_insurance_text    = $this->input->post('old_medical_insurance_text');
                $achivements          = $this->input->post('old_achivements');
                $sports_id            = $this->input->post('old_sports') ?? null;
                $other_sports_details = $this->input->post('old_sports_input') ?? null;
                $dharmik_id           = $this->input->post('old_dharmik') ?? null;

                $life_insurance_text      = $this->input->post('old_life_insurance_text') ?? '';
                $sanjeevni                = $this->input->post('old_sanjeevni') ?? 0 ;
                $life_insurance           = $this->input->post('old_life_insurance') ?? 0 ;
                $old_image                = $this->input->post('old_image');

                if($this->input->post('old_gender') == 'F'){
                    $m_secondname     = $this->input->post('old_m_secondname');
                    $m_thirdname      = $this->input->post('old_m_thirdname');
                    $m_surname         = $this->input->post('old_m_surname');
                    $m_village         = $this->input->post('old_m_village');
                    $m_address         = $this->input->post('old_m_address');
                    $m_type            = $this->input->post('old_m_type');
                    $m_contact         = $this->input->post('old_m_contact');
                    $m_email           = $this->input->post('old_m_email');
                }else{
                    $m_secondname     = "";
                    $m_thirdname      = "";
                    $m_surname         = "";
                    $m_village         = "";
                    $m_address         = "";
                    $m_type            = "";
                    $m_contact         = "";
                    $m_email           = "";
                }

                $old_data = array(
                    'first_name'            => $first_name,
                    'second_name'           => $second_name,
                    'third_name'            => $third_name,
                    'sex'                   => $sex,
                    'surname_id'            => $surname_id,
                    'other_surname_details' => $other_surname_details,
                    'blood_id'              => $blood_id,
                    'relation_id'           => $relation_id,
                    'other_relation_details'    => $other_relation_details,
                    'marriage_type'             => $marriage_type,
                    'education_id'              => $education_id,
                    'other_education_details'   => $other_education_details,
                    'occupation_id'             => $occupation_id,
                    'other_surname_details'     => $other_surname_details,
                    'other_occupation_details'  => $other_occupation_details,
                    'dob'                       => $dob,
                    'dom'                       => $old_dom,
                    'dod'                       => $dod,
                    'contact'                   => $contact,
                    'altcontact'                => $altcontact,
                    'email'                     => $email,
                    'member_type'               => $member_type,
                    'medical_insurance'         => $medical_insurance,
                    'achivements'               => $achivements,
                    'sports_id'                 => $sports_id,
                    'other_sports_details'      => $other_sports_details,
                    'dharmik_id'                => $dharmik_id,
                    'medical_insurance_text'    => $medical_insurance_text,
                    'life_insurance_text'       => $life_insurance_text,
                    'sanjeevni'                 => $sanjeevni,
                    'life_insurance'            => $life_insurance,
                    'image'                     => $old_image,

                    'm_secondname'              => $m_secondname,
                    'm_thirdname'               => $m_thirdname,
                    'm_surname'                 => $m_surname,
                    'm_village'                 => $m_village,
                    'm_address'                 => $m_address,
                    'm_type'                    => $m_type,
                    'm_contact'                 => $m_contact,
                    'm_email'                   => $m_email

                );
                
                // print_r($old_data.' - '.$member_id);
                // die();

                $old_array_data[] = $old_data;
                $old_store_data = json_encode($old_array_data);
                if($status=='false'){
                    $memberdata['old_value'] = $old_store_data;
                }
                $memberdata['fm_status'] = 2;
                $result  = $this->member->updateprofile($memberdata, $member_id, $family_marriage, $family_business, $family_master);

                /****** NEW VALUE ******/

                $first_name               = $this->input->post('first_name');
                $second_name              = $this->input->post('second_name');
                $third_name               = $this->input->post('third_name');
                $sex                      = $this->input->post('gender');
                $surname_id               = $this->input->post('surname');
                $other_surname_details    = $this->input->post('surname_input') ?? null;
                $blood_id                 = $this->input->post('blood');
                $relation_id              = $this->input->post('relation');
                $other_relation_details   = $this->input->post('relation_input') ?? null;
                $marriage_type              = $this->input->post('marriage_type');
                $education_id               = $this->input->post('education') ?? 0;
                $other_education_details    = $this->input->post('education_input') ?? null;
                $occupation_id              = $this->input->post('occupation') ?? 0;
                $other_occupation_details   = $this->input->post('occupation_input') ?? null;
                $dob                        = $this->input->post('dob');
                if($this->input->post('dom') != ''){
                    $dom                 = $this->input->post('dom');
                }else{
                    $dom = "";
                }
                if($this->input->post('live_type') != 'Live'){
                    $dod                     = $this->input->post('dod');
                }else{$dod = "";}
                $contact              = $this->input->post('contact');
                $altcontact           = $this->input->post('altcontact') ?? null;
                $email                = $this->input->post('email');
                $member_type          = $this->input->post('member_type');
                $medical_insurance    = $this->input->post('medical_insurance');
                $achivements          = $this->input->post('achivements');
                $sports_id            = $this->input->post('sports') ?? null;
                $other_sports_details = $this->input->post('sports_input') ?? null;
                $dharmik_id           = $this->input->post('dharmik') ?? 0;

                $life_insurance_text      = $this->input->post('life_insurance_text') ?? '';
                $medical_insurance_text   = $this->input->post('medical_insurance_text') ?? '';
                $sanjeevni                = $this->input->post('sanjeevni') ?? 0 ;
                $life_insurance           = $this->input->post('life_insurance') ?? 0 ;

                if($this->input->post('m_type') !='' && ($this->input->post('marriage_type') > 2 && $this->input->post('marriage_type') < 6) && $this->input->post('gender') == 'F'){
                    $m_secondname     = $this->input->post('m_secondname');
                    $m_thirdname      = $this->input->post('m_thirdname');
                    $m_surname         = $this->input->post('m_surname');
                    $m_village         = $this->input->post('m_village');
                    $m_address         = $this->input->post('m_address');
                    $m_type            = $this->input->post('m_type');
                    $m_contact         = $this->input->post('m_contact');
                    $m_email           = $this->input->post('m_email');
                }

                if($_FILES['photo_file'] && $_FILES['photo_file']['size'] > 0){
                    $extension = pathinfo($_FILES['photo_file']["name"], PATHINFO_EXTENSION);
                    $file_name = $member_no.'.'.$extension;
                    $rtn = $this->upload_web($file_name,'members','photo_file', 'jpg|png|jpeg');
                    if($rtn['status'] == true){
                        $image     = $rtn['filename'];
                    }else{
                        $logoupload         = false;
                        $data['status']     = false;
                        $data['validate']   = true;
                        $data['message']    = $rtn['filename'];
                        echo json_encode($data);
                        exit();
                    }
                }
                else{
                    $image = $old_image;
                }

                $new_data = array(
                    'first_name'                => $first_name,
                    'second_name'               => $second_name,
                    'third_name'                => $third_name,
                    'sex'                       => $sex,
                    'surname_id'                => $surname_id,
                    'other_surname_details'     => $other_surname_details,
                    'blood_id'                  => $blood_id,
                    'relation_id'               => $relation_id,
                    'other_relation_details'    => $other_relation_details,
                    'marriage_type'             => $marriage_type,
                    'education_id'              => $education_id,
                    'other_education_details'   => $other_education_details,
                    'occupation_id'             => $occupation_id,
                    'other_surname_details'     => $other_surname_details,
                    'other_occupation_details'  => $other_occupation_details,
                    'dob'                       => $dob,
                    'dom'                       => $dom,
                    'dod'                       => $dod,
                    'contact'                   => $contact,
                    'altcontact'                => $altcontact,
                    'email'                     => $email,
                    'member_type'               => $member_type,
                    'medical_insurance'         => $medical_insurance,
                    'achivements'               => $achivements,
                    'sports_id'                 => $sports_id,
                    'other_sports_details'      => $other_sports_details,
                    'dharmik_id'                => $dharmik_id,
                    'life_insurance_text'       => $life_insurance_text,
                    'medical_insurance_text'    => $medical_insurance_text,
                    'sanjeevni'                 => $sanjeevni,
                    'life_insurance'            => $life_insurance,
                    'image'                     => $image,

                    'm_secondname'              => $m_secondname,
                    'm_thirdname'               => $m_thirdname,
                    'm_surname'                 => $m_surname,
                    'm_village'                 => $m_village,
                    'm_address'                 => $m_address,
                    'm_type'                    => $m_type,
                    'm_contact'                 => $m_contact,
                    'm_email'                   => $m_email

                );

                $new_array_data[] = $new_data;
                $new_store_data = json_encode($new_array_data);
                $memberdata['new_value'] = $new_store_data;
                $result  = $this->member->updateprofile($memberdata, $member_id, $family_marriage, $family_business, $family_master);


                $data['status']     = $result['status'];
                $data['validate']   = TRUE;
                $data['message']    = $result['msg'];
                $this->response($data, REST_Controller::HTTP_OK);

            }else{ ///*********** FORM ADD DATA ********************/

                $memberdata['life_insurance_text']      = '' ;
                $memberdata['medical_insurance_text']   = '' ;
                $memberdata['sanjeevni']                = $this->input->post('sanjeevni') ?? 0 ;
                $memberdata['life_insurance']           = $this->input->post('life_insurance') ?? 0 ;
                $memberdata['medical_insurance']        = $this->input->post('medical_insurance') ?? 0 ;
                
                if($memberdata['life_insurance'] == 1){
                    $memberdata['life_insurance_text']    = $this->input->post('life_insurance_text') ?? '' ;

                }
                if($memberdata['medical_insurance'] == 1){
                    $memberdata['sanjeevni']                = $this->input->post('sanjeevni') ?? 0 ;
                    if($memberdata['sanjeevni'] == 0){
                        $memberdata['medical_insurance_text']   = $this->input->post('medical_insurance_text') ?? '' ;
                    }
                }

                if($member_no ==''){
                    $member_no = $family_id.'_new' ;
                }
                
                if ($member_id != 0) {
                    $memberdata['fm_status']                 = 2;
                }else{
                    $memberdata['fm_status']                 = 1;
                }

                if($this->input->post('m_type') !='' && ($this->input->post('marriage_type') > 2 && $this->input->post('marriage_type') < 6) && $this->input->post('gender') == 'F'){

                    $family_marriage['family_id']       = $family_id;
                    $family_marriage['member_id']       = $member_id;
                    $family_marriage['first_name']      = $this->input->post('first_name');
                    $family_marriage['second_name']     = $this->input->post('m_secondname');
                    $family_marriage['third_name']      = $this->input->post('m_thirdname');
                    $family_marriage['surname']         = $this->input->post('m_surname');
                    $family_marriage['village']         = $this->input->post('m_village');
                    $family_marriage['address']         = $this->input->post('m_address');
                    $family_marriage['type']            = $this->input->post('m_type');
                    $family_marriage['contact']         = $this->input->post('m_contact');
                    $family_marriage['email']           = $this->input->post('m_email');
                }
                $memberdata['first_name']               = $this->input->post('first_name');
                $memberdata['second_name']              = $this->input->post('second_name');
                $memberdata['third_name']               = $this->input->post('third_name');
                $memberdata['sex']                      = $this->input->post('gender');
                $memberdata['surname_id']               = $this->input->post('surname');
                $memberdata['other_surname_details']   = $this->input->post('surname_input') ?? null;
                $memberdata['blood_id']                 = $this->input->post('blood');
                $memberdata['relation_id']              = $this->input->post('relation');
                $memberdata['other_relation_details']   = $this->input->post('relation_input') ?? null;
                $memberdata['marriage_type']        = $this->input->post('marriage_type');
                $memberdata['education_id']         = $this->input->post('education');
                $memberdata['other_education_details']   = $this->input->post('education-input') ?? null;
                $memberdata['occupation_id']        = $this->input->post('occupation');
                $memberdata['other_occupation_details']   = $this->input->post('occupation-input') ?? null;
                $memberdata['dob']                  = $this->input->post('dob');
                if($this->input->post('dom') != ''){
                    $memberdata['dom']                  = $this->input->post('dom');
                }
                if($this->input->post('live_type') != 'Live'){
                    $memberdata['dod']                  = $this->input->post('dod');
                }
                $memberdata['family_id']            = $family_id;
                $memberdata['contact']              = $this->input->post('contact');
                $memberdata['altcontact']           = $this->input->post('altcontact') ?? null;
                $memberdata['email']                = $this->input->post('email');
                $memberdata['member_type']          = $this->input->post('member_type');
                $memberdata['medical_insurance']    = $this->input->post('medical_insurance');
                $memberdata['achivements']          = $this->input->post('achivements');
                $memberdata['sports_id']            = $this->input->post('sports');
                $memberdata['other_sports_details'] = $this->input->post('sports-input') ?? null;
                $memberdata['dharmik_id']           = $this->input->post('dharmik');
                $logoupload                         = true;

                if($_FILES['photo_file'] && $_FILES['photo_file']['size'] > 0){
                    $extension = pathinfo($_FILES['photo_file']["name"], PATHINFO_EXTENSION);
                    $file_name = $member_no.'.'.$extension;
                    $rtn = $this->upload_web($file_name,'members','photo_file', 'jpg|png|jpeg');
                    if($rtn['status'] == true){
                        $memberdata['image']     = $rtn['filename'];
                    }else{
                        $logoupload         = false;
                        $data['status']     = false;
                        $data['validate']   = true;
                        $data['message']    = $rtn['filename'];
                        echo json_encode($data);
                        exit();
                    }
                }
                
                $result  = $this->member->addprofile($memberdata, $member_id, $family_marriage, $family_business, $family_master);

                $data['status']     = $result['status'];
                $data['validate']   = TRUE;
                $data['message']    = $result['msg'];
                $this->response($data, REST_Controller::HTTP_OK);
                
            }

            //$family_master = array();
            //$result  = $this->member->updateprofile($memberdata, $member_id, $family_marriage, $family_business, $family_master);

            //$member_no = $this->member->getMemberNo($family_id);
            //$family_no = $this->member->getFamilyNo($family_id);

            // if ($member_id == 0) {
            //     $result  = $this->member->addprofile($memberdata, $member_id, $family_marriage, $family_business, $family_master);
            // }else{
            //     $result  = $this->member->updateprofile($memberdata, $member_id, $family_marriage, $family_business, $family_master);
            // }

            // $data['status']     = $result['status'];
            // $data['validate']   = TRUE;
            // $data['message']    = $result['msg'];
            // $this->response($data, REST_Controller::HTTP_OK);

        } else {
            foreach ($this->post() as $key => $value) {
                $verror[$key] = form_error($key);
            }
            $cer = validation_errors();
            $this->response([
                'status'    => FALSE,
                'validate'  => FALSE,
                'message'   => $verror,
                'cer'       => $cer,
            ], REST_Controller::HTTP_OK);
        }
    } 
    
    
    public function android_post(){

        $data               = array('status' => false, 'validate' => false, 'message' => array());
        
        $pst['post']        = $_POST;
        $pst['files']       = $_FILES;

        $family_marriage    = array();
        $family_business    = array();
        $family_master      = array();
        $member_id          = $this->input->post('member_id') ?? 0 ;
        $family_id          = $this->input->post('family_id') ?? 0 ;
        $member_no          = $this->input->post('member_no') ;
        $status             = $this->input->post('status') ;

        $surname            = $this->input->post('surname');
        $occupation         = $this->input->post('occupation');
        $education_id       = $this->input->post('education_id');
        $relation           = $this->input->post('relation');
        
        $upload_path        = $this->config->item('upload_path');
        $this->upload_path  = $upload_path."members/";

        $this->form_validation->set_rules('family_id', 'Family Id', 'trim|numeric|required');
        $this->form_validation->set_rules('member_id', 'Member Id', 'trim|numeric|required');

        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
        $this->form_validation->set_rules('second_name', 'Second Name', 'trim|required');
        $this->form_validation->set_rules('third_name', 'Third Name', 'trim|required');
        $this->form_validation->set_rules('surname', 'Surname', 'trim|numeric|required');

        /*if ($this->input->post('education_id')) {
            for($count=0; $count < count($this->input->post('education_id')); $count++){
                $check = $this->input->post('education_id')[$count];
                if ($check==1) {
                    // education-input
                    $this->form_validation->set_rules('education-input', 'Other Education Details', 'trim|required');
                }
            }
        }else{
            $this->form_validation->set_rules('education_id', 'Please Select Education', 'trim|required');
        }*/

        
        $this->form_validation->set_rules('gender', 'Gender', 'trim|required');
        $this->form_validation->set_rules('dob', 'Date Of Birth', 'trim|required');
        $this->form_validation->set_rules('relation', 'Relation', 'trim|numeric|required');
        
        $this->form_validation->set_rules('blood', 'Blood Group', 'trim|numeric|required');
        $this->form_validation->set_rules('occupation', 'Occupation', 'trim|required');
        
        //$this->form_validation->set_rules('marriage_type', 'Marital Status', 'trim|numeric|required');
        
        if($this->input->post('m_type') !='' && ($this->input->post('marriage_type') > 2 && $this->input->post('marriage_type') < 6) && $this->input->post('gender') == 'F'){
            $this->form_validation->set_rules('m_secondname', 'Father/Husband Name', 'trim|required');
            $this->form_validation->set_rules('m_surname', 'Father/Husband Surname', 'trim|numeric|required');
            $this->form_validation->set_rules('m_village', 'Village', 'trim|numeric|required');
            $this->form_validation->set_rules('m_contact', 'Contact', 'trim|required');
        }
        
        $this->form_validation->set_rules('contact', 'Contact', 'trim|numeric|required');
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_message('required', 'Enter %s');
        
        if ($this->form_validation->run()) {
            
            // print_r($member_no.' - '.$member_id);
            // die();

            /*********** FORM EDIT ********************/
            if ($member_no!='' && $member_id!=0) {
                

                /***** OLD WALA VALUE *****/
                $first_name               = $this->input->post('old_first_name');
                $second_name              = $this->input->post('old_second_name');
                $third_name               = $this->input->post('old_third_name');
                $sex                      = $this->input->post('old_gender');
                $surname_id               = $this->input->post('old_surname');
                $other_surname_details    = $this->input->post('old_surname_input') ?? null;
                $blood_id                 = $this->input->post('old_blood');
                $relation_id              = $this->input->post('old_relation');
                $other_relation_details   = $this->input->post('old_relation_input') ?? null;
                $marriage_type              = $this->input->post('old_marriage_type');
                $education_id               = $this->input->post('old_education') ?? null;
                $other_education_details    = $this->input->post('old_education_input') ?? null;
                $occupation_id              = $this->input->post('old_occupation') ?? null;
                $other_occupation_details   = $this->input->post('old_occupation_input') ?? null;
                $dob                        = $this->input->post('old_dob') ?? null;
                $old_dom                    = $this->input->post('old_dom') ?? null;
                $dod                        = $this->input->post('old_dod') ?? null;
                $contact              = $this->input->post('old_contact');
                $altcontact           = $this->input->post('old_altcontact') ?? null;
                $email                = $this->input->post('old_email') ?? null;
                $member_type          = $this->input->post('old_member_type') ?? null;
                $medical_insurance    = $this->input->post('old_medical_insurance');
                $medical_insurance_text    = $this->input->post('old_medical_insurance_text');
                $achivements          = $this->input->post('old_achivements');
                $sports_id            = $this->input->post('old_sports') ?? null;
                $other_sports_details = $this->input->post('old_sports_input') ?? null;
                $dharmik_id           = $this->input->post('old_dharmik') ?? null;

                $life_insurance_text      = $this->input->post('old_life_insurance_text') ?? '';
                $sanjeevni                = $this->input->post('old_sanjeevni') ?? 0 ;
                $life_insurance           = $this->input->post('old_life_insurance') ?? 0 ;
                $old_image                = $this->input->post('old_image');

                if($this->input->post('old_gender') == 'F'){
                    $m_secondname     = $this->input->post('old_m_secondname');
                    $m_thirdname      = $this->input->post('old_m_thirdname');
                    $m_surname         = $this->input->post('old_m_surname');
                    $m_village         = $this->input->post('old_m_village');
                    $m_address         = $this->input->post('old_m_address');
                    $m_type            = $this->input->post('old_m_type');
                    $m_contact         = $this->input->post('old_m_contact');
                    $m_email           = $this->input->post('old_m_email');
                }else{
                    $m_secondname     = "";
                    $m_thirdname      = "";
                    $m_surname         = "";
                    $m_village         = "";
                    $m_address         = "";
                    $m_type            = "";
                    $m_contact         = "";
                    $m_email           = "";
                }

                $old_data = array(
                    'first_name'            => $first_name,
                    'second_name'           => $second_name,
                    'third_name'            => $third_name,
                    'sex'                   => $sex,
                    'surname_id'            => $surname_id,
                    'other_surname_details' => $other_surname_details,
                    'blood_id'              => $blood_id,
                    'relation_id'           => $relation_id,
                    'other_relation_details'    => $other_relation_details,
                    'marriage_type'             => $marriage_type,
                    'education_id'              => $education_id,
                    'other_education_details'   => $other_education_details,
                    'occupation_id'             => $occupation_id,
                    'other_surname_details'     => $other_surname_details,
                    'other_occupation_details'  => $other_occupation_details,
                    'dob'                       => $dob,
                    'dom'                       => $old_dom,
                    'dod'                       => $dod,
                    'contact'                   => $contact,
                    'altcontact'                => $altcontact,
                    'email'                     => $email,
                    'member_type'               => $member_type,
                    'medical_insurance'         => $medical_insurance,
                    'achivements'               => $achivements,
                    'sports_id'                 => $sports_id,
                    'other_sports_details'      => $other_sports_details,
                    'dharmik_id'                => $dharmik_id,
                    'medical_insurance_text'    => $medical_insurance_text,
                    'life_insurance_text'       => $life_insurance_text,
                    'sanjeevni'                 => $sanjeevni,
                    'life_insurance'            => $life_insurance,
                    'image'                     => $old_image,

                    'm_secondname'              => $m_secondname,
                    'm_thirdname'               => $m_thirdname,
                    'm_surname'                 => $m_surname,
                    'm_village'                 => $m_village,
                    'm_address'                 => $m_address,
                    'm_type'                    => $m_type,
                    'm_contact'                 => $m_contact,
                    'm_email'                   => $m_email

                );
                
                // print_r($old_data.' - '.$member_id);
                // die();

                $old_array_data[] = $old_data;
                $old_store_data = json_encode($old_array_data);
                if($status=='false'){
                    $memberdata['old_value'] = $old_store_data;
                }
                $memberdata['fm_status'] = 2;
                $result  = $this->member->updateprofile($memberdata, $member_id, $family_marriage, $family_business, $family_master);

                /****** NEW VALUE ******/

                $first_name               = $this->input->post('first_name');
                $second_name              = $this->input->post('second_name');
                $third_name               = $this->input->post('third_name');
                $sex                      = $this->input->post('gender');
                $surname_id               = $this->input->post('surname');
                $other_surname_details    = $this->input->post('surname_input') ?? null;
                $blood_id                 = $this->input->post('blood');
                $relation_id              = $this->input->post('relation');
                $other_relation_details   = $this->input->post('relation_input') ?? null;
                $marriage_type              = $this->input->post('marriage_type');
                $education_id               = $this->input->post('education') ?? 0;
                $other_education_details    = $this->input->post('education_input') ?? null;
                $occupation_id              = $this->input->post('occupation') ?? 0;
                $other_occupation_details   = $this->input->post('occupation_input') ?? null;
                $dob                        = $this->input->post('dob');
                if($this->input->post('dom') != ''){
                    $dom                 = $this->input->post('dom');
                }else{
                    $dom = "";
                }
                if($this->input->post('live_type') != 'Live'){
                    $dod                     = $this->input->post('dod');
                }else{$dod = "";}
                $contact              = $this->input->post('contact');
                $altcontact           = $this->input->post('altcontact') ?? null;
                $email                = $this->input->post('email');
                $member_type          = $this->input->post('member_type');
                $medical_insurance    = $this->input->post('medical_insurance');
                $achivements          = $this->input->post('achivements');
                $sports_id            = $this->input->post('sports') ?? null;
                $other_sports_details = $this->input->post('sports_input') ?? null;
                $dharmik_id           = $this->input->post('dharmik') ?? 0;

                $life_insurance_text      = $this->input->post('life_insurance_text') ?? '';
                $medical_insurance_text   = $this->input->post('medical_insurance_text') ?? '';
                $sanjeevni                = $this->input->post('sanjeevni') ?? 0 ;
                $life_insurance           = $this->input->post('life_insurance') ?? 0 ;

                if($this->input->post('m_type') !='' && ($this->input->post('marriage_type') > 2 && $this->input->post('marriage_type') < 6) && $this->input->post('gender') == 'F'){
                    $m_secondname     = $this->input->post('m_secondname');
                    $m_thirdname      = $this->input->post('m_thirdname');
                    $m_surname         = $this->input->post('m_surname');
                    $m_village         = $this->input->post('m_village');
                    $m_address         = $this->input->post('m_address');
                    $m_type            = $this->input->post('m_type');
                    $m_contact         = $this->input->post('m_contact');
                    $m_email           = $this->input->post('m_email');
                }

                if($_FILES['photo_file'] && $_FILES['photo_file']['size'] > 0){
                    $extension = pathinfo($_FILES['photo_file']["name"], PATHINFO_EXTENSION);
                    $file_name = $member_no.'.'.$extension;
                    $rtn = $this->upload_web($file_name,'members','photo_file', 'jpg|png|jpeg');
                    if($rtn['status'] == true){
                        $image     = $rtn['filename'];
                    }else{
                        $logoupload         = false;
                        $data['status']     = false;
                        $data['validate']   = true;
                        $data['message']    = $rtn['filename'];
                        echo json_encode($data);
                        exit();
                    }
                }
                else{
                    $image = $old_image;
                }

                $new_data = array(
                    'first_name'                => $first_name,
                    'second_name'               => $second_name,
                    'third_name'                => $third_name,
                    'sex'                       => $sex,
                    'surname_id'                => $surname_id,
                    'other_surname_details'     => $other_surname_details,
                    'blood_id'                  => $blood_id,
                    'relation_id'               => $relation_id,
                    'other_relation_details'    => $other_relation_details,
                    'marriage_type'             => $marriage_type,
                    'education_id'              => $education_id,
                    'other_education_details'   => $other_education_details,
                    'occupation_id'             => $occupation_id,
                    'other_surname_details'     => $other_surname_details,
                    'other_occupation_details'  => $other_occupation_details,
                    'dob'                       => $dob,
                    'dom'                       => $dom,
                    'dod'                       => $dod,
                    'contact'                   => $contact,
                    'altcontact'                => $altcontact,
                    'email'                     => $email,
                    'member_type'               => $member_type,
                    'medical_insurance'         => $medical_insurance,
                    'achivements'               => $achivements,
                    'sports_id'                 => $sports_id,
                    'other_sports_details'      => $other_sports_details,
                    'dharmik_id'                => $dharmik_id,
                    'life_insurance_text'       => $life_insurance_text,
                    'medical_insurance_text'    => $medical_insurance_text,
                    'sanjeevni'                 => $sanjeevni,
                    'life_insurance'            => $life_insurance,
                    'image'                     => $image,

                    'm_secondname'              => $m_secondname,
                    'm_thirdname'               => $m_thirdname,
                    'm_surname'                 => $m_surname,
                    'm_village'                 => $m_village,
                    'm_address'                 => $m_address,
                    'm_type'                    => $m_type,
                    'm_contact'                 => $m_contact,
                    'm_email'                   => $m_email

                );

                $new_array_data[] = $new_data;
                $new_store_data = json_encode($new_array_data);
                $memberdata['new_value'] = $new_store_data;
                $result  = $this->member->updateprofile($memberdata, $member_id, $family_marriage, $family_business, $family_master);


                $data['status']     = $result['status'];
                $data['validate']   = TRUE;
                $data['message']    = $result['msg'];
                $this->response($data, REST_Controller::HTTP_OK);

            }else{ ///*********** FORM ADD DATA ********************/

                $memberdata['life_insurance_text']      = '' ;
                $memberdata['medical_insurance_text']   = '' ;
                $memberdata['sanjeevni']                = $this->input->post('sanjeevni') ?? 0 ;
                $memberdata['life_insurance']           = $this->input->post('life_insurance') ?? 0 ;
                $memberdata['medical_insurance']        = $this->input->post('medical_insurance') ?? 0 ;
                
                if($memberdata['life_insurance'] == 1){
                    $memberdata['life_insurance_text']    = $this->input->post('life_insurance_text') ?? '' ;

                }
                if($memberdata['medical_insurance'] == 1){
                    $memberdata['sanjeevni']                = $this->input->post('sanjeevni') ?? 0 ;
                    if($memberdata['sanjeevni'] == 0){
                        $memberdata['medical_insurance_text']   = $this->input->post('medical_insurance_text') ?? '' ;
                    }
                }

                if($member_no ==''){
                    $member_no = $family_id.'_new' ;
                }
                
                if ($member_id != 0) {
                    $memberdata['fm_status']                 = 2;
                }else{
                    $memberdata['fm_status']                 = 1;
                }

                if($this->input->post('m_type') !='' && ($this->input->post('marriage_type') > 2 && $this->input->post('marriage_type') < 6) && $this->input->post('gender') == 'F'){

                    $family_marriage['family_id']       = $family_id;
                    $family_marriage['member_id']       = $member_id;
                    $family_marriage['first_name']      = $this->input->post('first_name');
                    $family_marriage['second_name']     = $this->input->post('m_secondname');
                    $family_marriage['third_name']      = $this->input->post('m_thirdname');
                    $family_marriage['surname']         = $this->input->post('m_surname');
                    $family_marriage['village']         = $this->input->post('m_village');
                    $family_marriage['address']         = $this->input->post('m_address');
                    $family_marriage['type']            = $this->input->post('m_type');
                    $family_marriage['contact']         = $this->input->post('m_contact');
                    $family_marriage['email']           = $this->input->post('m_email');
                }
                $memberdata['first_name']               = $this->input->post('first_name');
                $memberdata['second_name']              = $this->input->post('second_name');
                $memberdata['third_name']               = $this->input->post('third_name');
                $memberdata['sex']                      = $this->input->post('gender');
                $memberdata['surname_id']               = $this->input->post('surname');
                $memberdata['other_surname_details']   = $this->input->post('surname_input') ?? null;
                $memberdata['blood_id']                 = $this->input->post('blood');
                $memberdata['relation_id']              = $this->input->post('relation');
                $memberdata['other_relation_details']   = $this->input->post('relation_input') ?? null;
                $memberdata['marriage_type']        = $this->input->post('marriage_type');
                $memberdata['education_id']         = $this->input->post('education');
                $memberdata['other_education_details']   = $this->input->post('education-input') ?? null;
                $memberdata['occupation_id']        = $this->input->post('occupation');
                $memberdata['other_occupation_details']   = $this->input->post('occupation-input') ?? null;
                $memberdata['dob']                  = $this->input->post('dob');
                if($this->input->post('dom') != ''){
                    $memberdata['dom']                  = $this->input->post('dom');
                }
                if($this->input->post('live_type') != 'Live'){
                    $memberdata['dod']                  = $this->input->post('dod');
                }
                $memberdata['family_id']            = $family_id;
                $memberdata['contact']              = $this->input->post('contact');
                $memberdata['altcontact']           = $this->input->post('altcontact') ?? null;
                $memberdata['email']                = $this->input->post('email');
                $memberdata['member_type']          = $this->input->post('member_type');
                $memberdata['medical_insurance']    = $this->input->post('medical_insurance');
                $memberdata['achivements']          = $this->input->post('achivements');
                $memberdata['sports_id']            = $this->input->post('sports');
                $memberdata['other_sports_details'] = $this->input->post('sports-input') ?? null;
                $memberdata['dharmik_id']           = $this->input->post('dharmik');
                $logoupload                         = true;

                if($_FILES['photo_file'] && $_FILES['photo_file']['size'] > 0){
                    $extension = pathinfo($_FILES['photo_file']["name"], PATHINFO_EXTENSION);
                    $file_name = $member_no.'.'.$extension;
                    $rtn = $this->upload_web($file_name,'members','photo_file', 'jpg|png|jpeg');
                    if($rtn['status'] == true){
                        $memberdata['image']     = $rtn['filename'];
                    }else{
                        $logoupload         = false;
                        $data['status']     = false;
                        $data['validate']   = true;
                        $data['message']    = $rtn['filename'];
                        echo json_encode($data);
                        exit();
                    }
                }
                
                $result  = $this->member->addprofile($memberdata, $member_id, $family_marriage, $family_business, $family_master);

                $data['status']     = $result['status'];
                $data['validate']   = TRUE;
                $data['message']    = $result['msg'];
                $this->response($data, REST_Controller::HTTP_OK);
                
            }

            //$family_master = array();
            //$result  = $this->member->updateprofile($memberdata, $member_id, $family_marriage, $family_business, $family_master);

            //$member_no = $this->member->getMemberNo($family_id);
            //$family_no = $this->member->getFamilyNo($family_id);

            // if ($member_id == 0) {
            //     $result  = $this->member->addprofile($memberdata, $member_id, $family_marriage, $family_business, $family_master);
            // }else{
            //     $result  = $this->member->updateprofile($memberdata, $member_id, $family_marriage, $family_business, $family_master);
            // }

            // $data['status']     = $result['status'];
            // $data['validate']   = TRUE;
            // $data['message']    = $result['msg'];
            // $this->response($data, REST_Controller::HTTP_OK);

        } else {
            foreach ($this->post() as $key => $value) {
                $verror[$key] = form_error($key);
            }
            $cer = validation_errors();
            $this->response([
                'status'    => FALSE,
                'validate'  => FALSE,
                'message'   => $verror,
                'cer'       => $cer,
            ], REST_Controller::HTTP_OK);
        }
    } 
    

    public function business_post(){

        $data     = array('status' => false, 'validate' => false, 'message' => array());
        
        $pst['post'] = $_POST;

        WriteLog($pst);
        // echo "<pre>";
        // print_r($_POST);
        // exit();
        $member_id   = $this->input->post('member_id') ?? 0 ;
        $family_id   = $this->input->post('family_id') ?? 0 ;
        $business_id   = $this->input->post('business_id') ?? 0 ;

        if($member_id == 0){
            $data['status']     = FALSE;
            $data['validate']   = TRUE;
            $data['message']    = 'Member Not Defined';
            $this->response($data, REST_Controller::HTTP_OK);
        }else if($family_id == 0){
            $data['status']     = FALSE;
            $data['validate']   = TRUE;
            $data['message']    = 'Family Not Defined';
            $this->response($data, REST_Controller::HTTP_OK);
        }else{
            $this->form_validation->set_rules('member_id', 'Member Id', 'trim|numeric|required');
            $this->form_validation->set_rules('family_id', 'Family Id', 'trim|numeric|required');
            $this->form_validation->set_rules('company_name', 'Company Name ', 'trim|required');
            $this->form_validation->set_rules('designation', 'Designation', 'trim|required');
            $this->form_validation->set_rules('pincode', 'Pincode', 'trim|numeric|required');
            $this->form_validation->set_rules('area', 'Area', 'trim|required');

            $this->form_validation->set_error_delimiters('', '');
            $this->form_validation->set_message('required', 'Enter %s');


            if ($this->form_validation->run()) {
                $family_business['member_id']       = $member_id;
                $family_business['family_id']       = $family_id;
                $family_business['company_name']    = $this->input->post('company_name');
                $family_business['designation']     = $this->input->post('designation');
                $family_business['address_1']       = $this->input->post('address');
                $family_business['pincode']         = $this->input->post('pincode');
                $family_business['area_id']         = $this->input->post('area');
                $family_business['email']           = $this->input->post('email');
                $family_business['contact']         = $this->input->post('contact');
                $family_business['website']         = $this->input->post('website');

                $result             = $this->member->updatebusiness($family_business,$business_id);
                $data['status']     = $result['status'];
                $data['validate']   = TRUE;
                $data['message']    = $result['msg'];
                $this->response($data, REST_Controller::HTTP_OK);
            } else {
                foreach ($this->post() as $key => $value) {
                    $verror[$key] = form_error($key);
                }
                $cer = validation_errors();
                $this->response([
                    'status'    => FALSE,
                    'validate'  => FALSE,
                    'message'   => $verror,
                    'cer'       => $cer,
                ], REST_Controller::HTTP_OK);
            }
        }
    } 

    public function approve_post(){

        $data           = array('status' => false, 'validate' => false, 'message' => array());
        $pst['post']    = $_POST;

        $member_id      = $this->input->post('id') ?? 0 ;
        $family_member['fm_status']           = 1;

        $result             = $this->member->approve_member($family_member, $member_id);
        $data['status']     = $result['status'];
        $data['validate']   = TRUE;
        $data['message']    = $result['msg'];
        $this->response($data, REST_Controller::HTTP_OK);

    }
    
    public function delete_post(){

        $data     = array('status' => false, 'validate' => false, 'message' => array());
        
        $pst['post'] = $_POST;

        WriteLog($pst);
        // echo "<pre>";
        // print_r($_POST);
        // exit();
        $member_id      = $this->input->post('member_id') ?? 0 ;
        $reason         = $this->input->post('reason') ?? '' ;

        if($member_id == 0){
            $data['status']     = FALSE;
            $data['validate']   = TRUE;
            $data['message']    = 'Member Not Defined';
            $this->response($data, REST_Controller::HTTP_OK);
        }else if($reason == ''){
            $data['status']     = FALSE;
            $data['validate']   = TRUE;
            $data['message']    = 'Please Enter Reason for Delete';
            $this->response($data, REST_Controller::HTTP_OK);
        }else{

            // $family_business['member_id']       = $member_id;
            $family_member['deleted']           = 1;
            $family_member['delete_reason']     = $reason;
            $family_member['deleted_on']        = date('Y-m-d H:i:s');

            $result             = $this->member->updatedelete($family_member,$member_id);
            $data['status']     = $result['status'];
            $data['validate']   = TRUE;
            $data['message']    = $result['msg'];
            $this->response($data, REST_Controller::HTTP_OK);

        }
    }
        
    public function death_post(){

        $data     = array('status' => false, 'validate' => false, 'message' => array());
        
        $pst['post'] = $_POST;

        WriteLog($pst);
        // echo "<pre>";
        // print_r($_POST);
        // exit();
        $member_id      = $this->input->post('member_id') ?? 0 ;
        $dod            = $this->input->post('dod') ?? '' ;

        if($member_id == 0){
            $data['status']     = FALSE;
            $data['validate']   = TRUE;
            $data['message']    = 'Member Not Defined';
            $this->response($data, REST_Controller::HTTP_OK);
        }else if($dod == ''){
            $data['status']     = FALSE;
            $data['validate']   = TRUE;
            $data['message']    = 'Please Select Date of Death';
            $this->response($data, REST_Controller::HTTP_OK);
        }else{

            // $family_business['member_id']       = $member_id;
            $family_member['dod']             = $dod;
            $family_member['live_type']       = 'Death';

            $result             = $this->member->updatedeath($family_member,$member_id);
            $data['status']     = $result['status'];
            $data['validate']   = TRUE;
            $data['message']    = $result['msg'];
            $this->response($data, REST_Controller::HTTP_OK);

        }
    }
    
    public function deathself_post(){

        $data     = array('status' => false, 'validate' => false, 'message' => array());
        
        $pst['post'] = $_POST;

        WriteLog($pst);
        // echo "<pre>";
        // print_r($_POST);
        $member_id      = $this->input->post('member_id') ?? 0 ;
        $dod            = $this->input->post('dod') ?? '' ;
        $relation      = $this->input->post('relation') ?? array() ;
        // echo "Member ID:".$member_id;
        // echo "DOD:".$dod;

        // exit();
        if($member_id == 0){
            $data['status']     = FALSE;
            $data['validate']   = TRUE;
            $data['message']    = 'Member Not Defined';
            $this->response($data, REST_Controller::HTTP_OK);
        }else if($dod == ''){
            $data['status']     = FALSE;
            $data['validate']   = TRUE;
            $data['message']    = 'Please Select Date of Death';
            $this->response($data, REST_Controller::HTTP_OK);
        }else{

            // $family_business['member_id']       = $member_id;
            $family_member['dod']             = $dod;
            $family_member['live_type']       = 'Death';
            $result             = $this->member->updatedeathself($family_member,$member_id,$relation);
            $data['status']     = $result['status'];
            $data['validate']   = TRUE;
            $data['message']    = $result['msg'];
            $this->response($data, REST_Controller::HTTP_OK);

        }
    }

    public function splitfamily_post(){

        $data     = array('status' => false, 'validate' => false, 'message' => array());
        
        // $pst['post'] = $_POST;

        // WriteLog($pst);
        // echo "<pre>";
        // print_r($_POST);
        // exit;
        $member_id      = $this->input->post('member_id') ?? 0 ;
        $relation      = $this->input->post('relation') ?? array() ;
        // echo "Member ID:".$member_id;
        // echo "DOD:".$dod;

        // exit();
        if(count($relation) ==  0){
            $data['status']     = FALSE;
            $data['validate']   = TRUE;
            $data['message']    = 'Relation Not Defined';
            $this->response($data, REST_Controller::HTTP_OK);
        }else{

            $family_member['address_1']     = $this->input->post('address_1');
            $family_member['landline']      = $this->input->post('landline');
            $family_member['area_id']       = $this->input->post('area_id');
            $family_member['pincode']       = $this->input->post('pincode');

            $family_id    = $this->session->userdata('family_no');

            // $result             = $this->member->updatesplitfamily($family_member, $relation, $family_id, false);
            // $data['status']     = $result['status'];
            // $data['validate']   = TRUE;
            // $data['message']    = $result['msg'];

            // print_r($family_member);
            // die();

            $user[] = $family_member;
            $user[] = $relation;
            $json_data = json_encode($user);
            
            // print_r($family_id);
            // die();

            $result = $this->member->holdsplitfamily($json_data, $family_id);
            $data['status']     = $result['status'];
            $data['validate']   = TRUE;
            $data['message']    = $result['msg'];

            $this->response($data, REST_Controller::HTTP_OK);

        }
    } 
    
    
    
    public function rejectsplitfamily_post(){

        $data     = array('status' => false, 'validate' => false, 'message' => array());

        $id       = $this->input->post('id');
        //$getData  = $this->member->getSplitData($id);

        // print_r($family_id);
        // die();

        $result = $this->member->rejectsplitfamily($id);
        if($result['status']){
            $this->response(true, REST_Controller::HTTP_OK);
        }else{
            $this->response(false, REST_Controller::HTTP_OK);
        }
        

    } 
    


    public function approvesplitfamily_post(){

        $data     = array('status' => false, 'validate' => false, 'message' => array());

        $id       = $this->input->post('id');
        $getData  = $this->member->getSplitData($id);

        $nid = $getData->id;
        $family_id = $getData->family_id;
        $address_1 = $getData->address_1;
        $address_2 = $getData->address_2;
        $added_on = $getData->added_on;
        $area_id = $getData->area_id;
        $pincode = $getData->pincode;
        $landline = $getData->landline;
        $email = $getData->email;
        $split_status = $getData->split_status;
        $split_data = $getData->split_data;

        $json_data = json_decode($split_data);
        $family_member = $json_data[0];
        $relation = $json_data[1];

        $relation = json_decode(json_encode($relation), true);

        // foreach ($relation as $value){
        //     $array[] = $value->id;
        // }

        $family_member= array();
        $family_member['address_1'] = $address_1;
        $family_member['landline'] = $landline;
        $family_member['area_id'] = $area_id;
        $family_member['pincode'] = $pincode;

        // print_r($family_id);
        // die();

        $result             = $this->member->updatesplitfamily($family_member, $relation, $family_id, true);

        // print_r($result);
        // die();

        // $data['status']     = $result['status'];
        // $data['validate']   = TRUE;
        // $data['message']    = $result['msg'];
        $this->response(true, REST_Controller::HTTP_OK);

    } 


    /*public function mergefamily_post(){

        $data     = array('status' => false, 'validate' => false, 'message' => array());
        
        $pst['post'] = $_POST;
        
        // print_r($_POST);
        // die();

        
        $member_id      = $this->input->post('member_id') ?? array() ;
        $family_id      = $this->input->post('family_id') ?? 0 ;
        if(count($member_id) ==  0){
            $data['status']     = FALSE;
            $data['validate']   = TRUE;
            $data['message']    = 'Member Not Defined';
            $this->response($data, REST_Controller::HTTP_OK);
        }else if($family_id ==  0){
            $data['status']     = FALSE;
            $data['validate']   = TRUE;
            $data['message']    = 'Family Not Defined';
            $this->response($data, REST_Controller::HTTP_OK);
        }else{

            $result             = $this->member->updatemergefamily($member_id,$family_id);
            $data['status']     = $result['status'];
            $data['validate']   = TRUE;
            $data['message']    = $result['msg'];
            $this->response($data, REST_Controller::HTTP_OK);

        }
    }*/ 
    
    
    public function mergefamily_post(){

        $data     = array('status' => false, 'validate' => false, 'message' => array());
        
        $pst['post'] = $_POST;

        $family_no    = $this->session->userdata('family_no') ?? 0 ;
        $member_no    = $this->session->userdata('member_no') ?? 0 ;

        $member_id      = $this->input->post('member_id') ?? array() ;
        $family_id      = $this->input->post('family_id') ?? 0 ;
        $user_data      = $this->input->post('merge_members_info') ?? 0 ;
        //$member_no      = $this->input->post('member_no') ?? 0 ;
        //$family_no      = $this->input->post('family_no') ?? 0 ;
        $members_json   = json_encode($member_id);

        // print_r($user_data);
        // die();

        if(count($member_id) ==  0){
            $data['status']     = FALSE;
            $data['validate']   = TRUE;
            $data['message']    = 'Member Not Defined';
            $this->response($data, REST_Controller::HTTP_OK);
        }else if($family_id ==  0){
            $data['status']     = FALSE;
            $data['validate']   = TRUE;
            $data['message']    = 'Family Not Defined';
            $this->response($data, REST_Controller::HTTP_OK);
        }else{

            //$result             = $this->member->updatemergefamily($member_id, $family_id);

            $result             = $this->member->holdMergeFamily($member_id, $members_json, $user_data, $member_no, $family_no);
            $data['status']     = $result['status'];
            $data['validate']   = TRUE;
            $data['message']    = $result['msg'];
            $this->response($data, REST_Controller::HTTP_OK);

        }

    }

    public function approvemergefamily_post(){

        $data     = array('status' => false, 'validate' => false, 'message' => array());

        $id       = $this->input->post('id');
        $getData  = $this->member->getMergeData($id);


        $nid            = $getData->id;
        $family_id      = $getData->family_id;
        $family_no      = $getData->family_no;
        $member_no      = $getData->member_no;
        $merge_status   = $getData->merge_status;
        $merge_flag     = $getData->merge_flag;
        $merge_data     = $getData->merge_data;
        $member_ids     = json_decode($merge_data);

        // print_r($getDatas);
        // die();

        if(count($member_ids) ==  0){

            // 'Member Not Defined';
            $this->response(false, REST_Controller::HTTP_OK);

        }else if($family_id ==  0){

            // 'Family Not Defined';
            $this->response(false, REST_Controller::HTTP_OK);

        }else{

            $result             = $this->member->updatemergefamily($member_ids, $family_id, $family_no, $member_no);

            if ($result['status']) {
                $this->response(true, REST_Controller::HTTP_OK);
            }else{
                $this->response(false, REST_Controller::HTTP_OK);
            }

        }

    }

    public function rejectmergefamily_post(){

        $id       = $this->input->post('id');
        $getData  = $this->member->getMergeData($id);

        $nid            = $getData->id;
        $family_id      = $getData->family_id;
        $family_no      = $getData->family_no;
        $member_no      = $getData->member_no;
        $merge_status   = $getData->merge_status;
        $merge_flag     = $getData->merge_flag;
        $merge_data     = $getData->merge_data;
        $member_ids     = json_decode($merge_data);

        if(count($member_ids) ==  0){
            $this->response(false, REST_Controller::HTTP_OK);
        }else if($family_id ==  0){
            $this->response(false, REST_Controller::HTTP_OK);
        }else{

            $result = $this->member->rejectmergefamily($member_ids, $family_id, $family_no, $member_no);
            if ($result['status']) {
                $this->response(true, REST_Controller::HTTP_OK);
            }else{
                $this->response(false, REST_Controller::HTTP_OK);
            }
        }

    }

    function alpha_dash_space($fullname){
        if (! preg_match('/^[a-zA-Z0-9_.]+$/', $fullname)) {
            $this->form_validation->set_message('alpha_dash_space', 'The %s field may only contain alpha Numeric characters, comma and dot');
            return FALSE;
        } else {
            return TRUE;
        }
    }

   // upload_web($file_name,'members','photo_file', 'jpg|png|jpeg')
    public function upload_web($file_name='', $what='',$img ='', $type=''){
        $config    = array();
        $extension = pathinfo($_FILES[$img]["name"], PATHINFO_EXTENSION);
        // echo "inside upload_web img :".$img."\n";
        // echo "inside upload_web what :".$what."\n";
        $config['upload_path']   = $this->upload_path;
        // if($what != 'video')
        $config['allowed_types'] = $type;
        $config['overwrite']     = false;
        $config['encrypt_name']  = false;
        $config['remove_spaces'] = true;
        $config['file_name']     = $file_name;
        if($img == 'file'){
            $config['max_size']      = '5000'; // max_size in kb
        }
        // print_r($config);
        $rtn = array();
        $this->upload->initialize($config);    
        if($this->upload->do_upload($img)){
            $uploaddata         = array('upload_data' => $this->upload->data());
            // print_r($uploaddata);
            $filename               = $uploaddata['upload_data']['file_name'];
            // echo "inside upload_web Filename: [".$filename."]\n"; 
            $rtn = array('filename'=>$filename,'status'=>true);
        }else{
            // echo "Error:".$this->upload->file_type;
            $filename = '['.$what.']['.$config.']['.$this->upload_path.']'. $this->upload->display_errors();
            $rtn =  array('filename'=>$filename,'status'=>false);
        }
        unset($config);
        return $rtn;
    }

    public function getlist_get() {
        $result = $this->member->getlist();
        // print_r($result);
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

    public function getpendinglist_get() {
        $result = $this->member->getpendinglist();
        // print_r($result);
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

    public function getSplitMergeHold_get() {
        $result = $this->member->getSplitMergeHold();
        // print_r($result);
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
    
    public function getMergeHold_get() {
        $result = $this->member->getMergeHold();
        // print_r($result);
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
    
    public function getmatrimony_post(){
 
        $data       = array('data' => array(), 'status' => false, 'validate' => false, 'message' => array());
        $id         = $this->input->post('id');
        $result     = $this->member->getMemberDetailsMatrimony($id);

        if(!empty($result)){
            $data['data']       = $result;
            $data['message']    = "Data Successfully Found";
            $data['status']     = TRUE;
            $data['validate']   = TRUE;
            $this->response($data, REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'data'      => array(),
                'status'    => FALSE,
                'validate'  => FALSE,
                'message'   => 'No Record Found.'
            ], REST_Controller::HTTP_OK);
        }

    }   
    
    public function api_getmatrimony_post(){
 
        $data       = array('data' => array(), 'status' => false, 'validate' => false, 'message' => array());
        $id         = $this->input->post('id');
        $result     = $this->member->getMemberDetailsMatrimony($id);

        if(!empty($result)){
            
            $this->response([
                'education' => $result[0]['education'],
                'occupation' => $result[0]['occupation'],
                'status'    => TRUE,
                'validate'  => TRUE,
                'message'   => 'No Record Found.'
            ], REST_Controller::HTTP_OK);
            
        }else{
            $this->response([
                'education' => "",
                'occupation' => "",
                'status'    => FALSE,
                'validate'  => FALSE,
                'message'   => 'No Record Found.'
            ], REST_Controller::HTTP_OK);
        }

    }   

}