<?php
defined('BASEPATH') or exit('No direct script access allowed');

putenv('GDFONTPATH=' . realpath('../../assets/fonts'));

require APPPATH . './libraries/REST_Controller.php';
require APPPATH . './libraries/dompdf/autoload.inc.php';
use Dompdf\Dompdf;

class Donation extends REST_Controller{

    public function __construct(){
        parent::__construct();
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->load->model('donation_model' ,'donation');
        $this->load->model('common_model','common');
        $this->load->library('upload'); //load library upload 
        $this->title = 'Donation';

    }

    /*
    1.  HTTP_OK
    2.  HTTP_BAD_REQUEST
    2.  HTTP_NOT_FOUND
    */
    function save_post(){
        // print_r($_POST);exit();
        $data           = array('status' => false,'validate' => false, 'message' => array());
        $flag       = false;
        $this->form_validation->set_rules('amount', 'Enter Amount', 'required|trim|numeric');
        $this->form_validation->set_rules('address', 'Enter Address', 'required');
        $this->form_validation->set_rules('email', 'Enter Email', 'required|trim|valid_email|xss_clean');
        $this->form_validation->set_rules('donor_name', 'Enter Donor Name', 'required|trim');
        $this->form_validation->set_rules('contact_number', 'Enter Contact Number', 'required|trim|numeric|min_length[10]|max_length[10]');
        
        $amount = $this->post('amount');
        $client = $this->post('client');
        if($client == 'web'){
            $ip = $this->input->ip_address();
        }else if($client == 'app'){
            $ip = $this->post('ip');
        }
        if($amount >= 50000){
            $this->form_validation->set_rules('pan_no', 'Enter A Valid PAN Number', 'required|trim|min_length[10]|max_length[10]|regex_match[/^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/]');
        }
        // $this->form_validation->set_rules('cat_id', 'Select Donation Category', 'required|trim');
        $this->form_validation->set_rules('rnumber', 'Enter Reference Number', 'required|trim');
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_message('required', ' %s');
        if ($this->form_validation->run()) {
            
            $data = array(
                //$this->session->userdata('family_id')
                'family_id'     => $this->post('family_id'),
                'amount'        => $amount,
                'email'         => $this->post('email'),
                'address'         => $this->post('address'),
                'donor_name'    => $this->post('donor_name'),
                'contact_number'=> $this->post('contact_number'),
                'pan_number'    => $this->post('pan_no'),
                'category_amount'=> json_encode($this->post('general')),
                'reason'        => $this->post('reason'),
                'refernumber'   => $this->post('rnumber'),
                'client'        => $this->post('client'),
                'ip'            => $ip,
            );
            
            $result = $this->donation->savedata($data);
            
            
            //Dear Member, your Donation has been submitted successfully on SHREE DEPA JAIN MAHAJAN TRUST for further process.
            //"1207162764599607149"
            
            $sms_phone      = $this->post('contact_number');
            $msg            = 'Dear Member, your Donation has been submitted successfully on SHREE DEPA JAIN MAHAJAN TRUST for further process.';
            $template       = "1207162764599607149";
            sendsms($sms_phone, $msg, $template);
            
            
            $to = $this->post('email');
            $subject = "Donation Acknowledgement - Shree Depa Jain Mahajan Trust";
            
            $message = "
            <!DOCTYPE html>
            <html lang='en'>
            <head>
            	<meta charset='utf-8'>
            	<style type='text/css'>#container,code{border:1px solid #D0D0D0}::selection{background-color:#E13300;color:#fff}::-moz-selection{background-color:#E13300;color:#fff}body{background-color:#fff;margin:40px;font:13px/20px normal Helvetica,Arial,sans-serif;color:#4F5155}a,h1{background-color:transparent;font-weight:400}a{color:#039}h1{color:#444;border-bottom:1px solid #D0D0D0;font-size:19px;margin:0 0 14px;padding:14px 15px 10px}code{font-family:Consolas,Monaco,Courier New,Courier,monospace;font-size:12px;background-color:#f9f9f9;color:#002166;display:block;margin:14px 0;padding:12px 10px}#body{margin:0 15px}p.footer{text-align:right;font-size:11px;border-top:1px solid #D0D0D0;line-height:32px;padding:0 10px;margin:20px 0 0}#container{margin:10px;box-shadow:0 0 8px #D0D0D0}</style>
            </head>
            <body>
            <div id='container'>
            	<div id='body'>
            		Hello ".$this->post('donor_name').",<br><br>
            
            		Thanks for your Donation of <b>Rs.".$amount."</b> with reference Number : <b>".$this->post('rnumber')."</b> for ".$this->post('reason').".
            		
            		<br>
            		Receipt will be generated after approval.
            	</div>
            	<p class='footer'>Team The Animator</p><br><br>
            	
            </div>
            </body>
            </html>
            ";
            
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= 'From: <support@panjodepa.com>' . "\r\n";
        
            mail($to, $subject, $message, $headers);


            $this->response([
                'status'   => $result['status'],
                'validate' => TRUE,
                'message'  => $result['msg'],
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

    /*public function index_get($id = '') {
        //returns all rows if the id parameter doesn't exist,
        //otherwise single row will be returned
        $this->donors->_condition['deleted'] = 0;
        if($id){
            $this->donors->_condition['id'] = $id;
        }
        $result = $this->donors->getRows();
        print $this->db->last_query();
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
    }*/
    
    public function list_get($status = '') {
        //returns all rows if the id parameter doesn't exist,
        //otherwise single row will be returned
       
        $result = $this->donation->getList($status);
        // print $this->db->last_query();exit();
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

    public function approved_post() {
        
        $this->form_validation->set_rules('id', 'No User Found', 'required|trim|numeric');
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_message('required', ' %s');
        if ($this->form_validation->run()) {

            $result = $this->donation->approved($_POST);

            $getEmail = $this->donation->getUserEmail($_POST);

            foreach($getEmail as $new){

                $email          = $new['email'];
                $donor_name     = $new['donor_name'];
                $amount         = $new['amount'];
                $refernumber    = $new['refernumber']; 
                
                $receipt_no = $new['id'];
                $receipt_dt = date_format(date_create($new['added_date']),"d-m-Y");
                $recipient_name = $new['donor_name'];
                $recipient_address = $new['address'];
                $recipient_phone = $new['contact_number'];
                $amountnumber = $new['amount']; //₹
                $amount_number = $this->donation->getIndianRupee($amountnumber);
                $amount_words = ucwords($this->donation->getIndianCurrency($amountnumber));
                $refrence = $new['refernumber'];
                $banck_name = '';
                $recipient_mail = $new['email'];

            }
            
            if ($result['status']) {

                $dompdf = new Dompdf(array('enable_remote' => true));
                
                $filename = $this->common->generateRandomString();

                $config = array();
                $config['upload_path'] = $this->config->item('upload_path').'receipts/';
                $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                $config['max_size']    = '15000000';

                $img_path = $config['upload_path'].'receipt.jpg';

                $img = imagecreatefromjpeg($config['upload_path'].'receipt.jpg');
                $white = imagecolorallocate($img, 0, 0, 128);

                // $receipt_no = "00003";
                // $receipt_dt = "18/06/2021";
                // $recipient_name = "CHAUHAN AJAYKUMAR JULESH CHAUHAN";
                // $recipient_address = "Bldg no 85/A201 Nehru Nagar, Kurla (E), Mumbai-400024, Maharashtra 400024";
                // $recipient_phone = "9619527226";
                // $amount_number = "10,000.00"; //₹
                // $amount_words = "Ten Thousand Only";
                // $refrence = "REF123AD654";
                // $banck_name = "Central Bank Of India";
                // $first_address = substr($recipient_address, 0, 55);
                // $second_address = substr($recipient_address, 55, 30);

                
                $font = $_SERVER['DOCUMENT_ROOT'].'/depa_oldbk/assets/fonts/arial.ttf';
                
                
                imagettftext($img, 36, 0, 750, 390, $white, $font, $receipt_no);
                imagettftext($img, 32, 0, 1670, 390, $white, $font, $receipt_dt);
                imagettftext($img, 32, 0, 645, 475, $white, $font, $recipient_name);
                imagettftext($img, 30, 0, 700, 570, $white, $font, $recipient_mail);
                imagettftext($img, 32, 0, 1630, 570, $white, $font, $recipient_phone);
                imagettftext($img, 40, 0, 1860, 675, $white, $font, $amount_number);
                
                if(strlen($amount_words)<62){imagettftext($img, 30, 0, 815, 750, $white, $font, $amount_words);}
                else{imagettftext($img, 18, 0, 815, 750, $white, $font, $amount_words);}

                if(strlen($recipient_address)<75){imagettftext($img, 30, 0, 785, 825, $white, $font, $recipient_address);} //WIDTH , HEIGHT
                else{imagettftext($img, 18, 0, 785, 825, $white, $font, $recipient_address);}
                
                
                imagettftext($img, 32, 0, 885, 670, $white, $font, $refrence);
                imagettftext($img, 32, 0, 700, 570, $white, $font, $banck_name);

                //header('Content-type: image/jpeg');
                //imagejpeg($img);
                imagejpeg($img, $config['upload_path'].$filename.".jpg", 100);

                // print_r($font);
                // die();

                //$output = $config['upload_path'].$filename.'.jpg';

                $main_img = 'https://deepafarsan.in/depa_oldbk/'.$config['upload_path'].$filename.'.jpg';

                $html = '<div align="center">
                            <img src="'.$main_img.'" style="width:80%;">
                        </div>';

                //$html = ''.$main_img;

                $this->upload->initialize($config);
                

                $options = $dompdf->getOptions();
                $options->setDefaultFont('Courier');
                $dompdf->setOptions($options);
                $dompdf->loadHtml($html);
                $dompdf->render();
                $output = $dompdf->output();
                //file_put_contents($filename.".pdf", $output); // main directory
                file_put_contents($config['upload_path'].'depa_recipt_'.$filename.'.pdf', $output);

                /*************************************/
                /*************** EMAIL ***************/
                /*************************************/
                $link_file = 'https://deepafarsan.in/depa_oldbk/uploads/receipts/'.'depa_recipt_'.$filename.'.pdf';
                $file = $config['upload_path'].'depa_recipt_'.$filename.'.pdf';

                $to = $email;
                $subject = 'Donation Approved - Shree Depa Jain Mahajan Trust';

                $message = "
                <!DOCTYPE html>
                <html lang='en'>
                <head>
                	<meta charset='utf-8'>
                	<style type='text/css'>#container,code{border:1px solid #D0D0D0}::selection{background-color:#E13300;color:#fff}::-moz-selection{background-color:#E13300;color:#fff}body{background-color:#fff;margin:40px;font:13px/20px normal Helvetica,Arial,sans-serif;color:#4F5155}a,h1{background-color:transparent;font-weight:400}a{color:#039}h1{color:#444;border-bottom:1px solid #D0D0D0;font-size:19px;margin:0 0 14px;padding:14px 15px 10px}code{font-family:Consolas,Monaco,Courier New,Courier,monospace;font-size:12px;background-color:#f9f9f9;color:#002166;display:block;margin:14px 0;padding:12px 10px}#body{margin:0 15px}p.footer{text-align:right;font-size:11px;border-top:1px solid #D0D0D0;line-height:32px;padding:0 10px;margin:20px 0 0}#container{margin:10px;box-shadow:0 0 8px #D0D0D0}</style>
                </head>
                <body>
                <div id='container'>
                	<div id='body'>
                		Hello ".$donor_name.",<br><br>
                
                		Your Donation has been approved, of <b>Rs.".$amount."</b> with reference Number : <b>".$refernumber."</b>
                		
                		<br>
                		<h6 style='color: green;'>Donation Approved</h6>. <br><br>
                		<a href=".$link_file." download >Download Receipt</a>
                	</div>
                	<p class='footer'>Team The Animator</p><br><br>
                </div>
                </body>
                </html>
                ";
                
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $headers .= 'From: <support@panjodepa.com>' . "\r\n";
            
                $mailer = mail($to, $subject, $message, $headers);
                
                
                

                if ($mailer) {

                    $this->donation->update_receipt($_POST['id'], 'depa_recipt_'.$filename.'.pdf');
                
                    
                    $sms_phone      = $recipient_phone;
                    $msg            = 'Dear Member, your Donation with receipt '.$filename.' has been accepted by SHREE DEPA JAIN MAHAJAN TRUST';
                    $template       = "1207162764618670347";
                    sendsms($sms_phone, $msg, $template);

                    $this->response([
                        'status'   => $result['status'],
                        'validate' => TRUE,
                        'message'  => $result['msg'],
                    ], REST_Controller::HTTP_OK);

                }else{
                    $this->response([
                        'status'   => TRUE,
                        'validate' => TRUE,
                        'message'  => 'Approved Success, Mailer Failed',
                    ], REST_Controller::HTTP_OK);
                }

            }else{
                $this->response([
                    'status'   => FALSE,
                    'validate' => TRUE,
                    'message'  => 'Something went wrong... ',
                ], REST_Controller::HTTP_OK);
            }

            
        }else {
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

    public function reject_post() {
        // print_r($_POST);
        //returns all rows if the id parameter doesn't exist,
        //otherwise single row will be returned
        // $this->form_validation->set_rules('id', 'Select Amount', 'required|trim|numeric');
        $this->form_validation->set_rules('cancel_reason', 'Enter Reason', 'required|trim');
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_message('required', ' %s');
        if ($this->form_validation->run()) {
            
            $result = $this->donation->reject($_POST);
            
            $getEmail = $this->donation->getUserEmail($_POST);

            foreach($getEmail as $new){

                $email          = $new['email'];
                $donor_name     = $new['donor_name'];
                $amount         = $new['amount'];
                $refernumber    = $new['refernumber']; 
                $contact         = $new['contact_number']; 

            }
            
            $sms_phone      = $contact;
            $msg            = 'Dear Member, your Donation for amount '.$amount.' has been rejected by SHREE DEPA JAIN MAHAJAN TRUST';
            $template       = "1207162764626027939";
            sendsms($sms_phone, $msg, $template);
            
            $to = $email;
            $subject = "Donation Rejected - Shree Depa Jain Mahajan Trust";
            $txt = "Hey, we're really sorry, you donation has been rejected due to, ".$_POST['cancel_reason'];
            $headers = "From: support@panjodepa.com" . "\r\n";
            mail($to, $subject, $txt, $headers);
            
            $this->response([
                'status'   => $result['status'],
                'validate' => TRUE,
                'message'  => $result['msg'],
            ], REST_Controller::HTTP_OK);
        }else {
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

    public function index_delete($id){
        // echo 'ID '.$id;exit;
        //check whether post id is not empty
        if($id){
            //delete post
            $this->latest->_condition['id'] = $id;
            $delete = $this->donation->delete(FALSE,$id);
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