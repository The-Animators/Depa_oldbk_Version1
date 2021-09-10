<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . './libraries/REST_Controller.php';

class Contact extends REST_Controller{
    private $title;
    public function __construct(){
        parent::__construct();
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate,post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }

    /*
    1.  HTTP_OK
    2.  HTTP_BAD_REQUEST
    2.  HTTP_NOT_FOUND
    */
    
    public  function index_post(){
        
        $data   = array('status' => false, 'validate' => false, 'message' => array());
        // $verror = array();
        $this->form_validation->set_rules('name', 'Enter Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Enter Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('phone', 'Enter Contact Number', 'required|trim|numeric|min_length[10]|max_length[10]');
        $this->form_validation->set_rules('subject', 'Enter Subject', 'required|trim');
        $this->form_validation->set_rules('message', 'Enter Message', 'required|trim');
        $this->form_validation->set_rules('client', 'Enter Client', 'required|trim');
        $this->form_validation->set_rules('ip', 'Enter IP Address', 'required|trim');
       
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_message('required', ' %s');
        if ($this->form_validation->run()) {
        
            // $master['name']          = $this->post('name');
            // $master['email']        = $this->post('email');
            // $master['phone']     = $this->post('phone');
            // $master['subject']      = $this->post('subject');
            // $master['message'] = $this->post('message');
            // $master['client']   = $this->post('client');
            // $master['ip']           = $this->post('ip');
            
            $name       = $this->post('name');
            $email      = $this->post('email');
            $phone      = $this->post('phone');
            $usubject   = $this->post('subject');
            $message    = $this->post('message');
            $client     = $this->post('client');
            $ip         = $this->post('ip');
            
            
            $to = "info@theanimator.in"; //info@theanimator.in - contact@panjodepa.com 
            $subject = "New Contact Detail - Shree Depa Jain Mahajan Trust";
            
            $message = "
            <!DOCTYPE html>
            <html lang='en'>
            <head>
            	<meta charset='utf-8'>
            	<style>

                    body, table, td, a { -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
                    table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; }
                    img { -ms-interpolation-mode: bicubic; }
                    
                    img { border: 0; outline: none; text-decoration: none; }
                    table { border-collapse: collapse !important; }
                    body { margin: 0 !important; padding: 0 !important; width: 100% !important; }
                    
                    a[x-apple-data-detectors] {
                      color: inherit !important;
                      text-decoration: none !important;
                      font-size: inherit !important;
                      font-family: verdana !important;
                      font-weight: inherit !important;
                      line-height: inherit !important;
                    }
                
                </style>
            </head>
            <body>
            <div id='container'>
            	<table width='640' cellspacing='0' cellpadding='0' border='0' align='center' style='max-width:640px; width:100%;' bgcolor='#FFFFFF'>
                  <tr>
                    <td align='center' valign='top' style='padding:10px;'>
                      
                    <table width='100%' border='1' cellpadding='7' cellspacing='0' bordercolor='#CCCCCC'>
                    <tbody>
                      <tr>
                        <td width='100%' colspan='2' bgcolor='#d1d1d1' align='center'><strong>Contact Details</strong></td>
                      </tr>
                      <tr>
                        <td>Name</td>
                        <td>".$name."</td>
                      </tr>
                      <tr>
                        <td bgcolor='#f1f1f1'>Email</td>
                        <td bgcolor='#f1f1f1'>".$email."</td>
                      </tr>
                      
                      <tr>
                        <td bgcolor='#f1f1f1'>Phone </td>
                        <td bgcolor='#f1f1f1'>".$phone."</td>
                      </tr>
                      <tr>
                        <td>Subject </td>
                        <td>".$usubject."</td>
                      </tr>
                      <tr>
                        <td bgcolor='#f1f1f1'>Message</td>
                        <td bgcolor='#f1f1f1'>".$message."</td>
                      </tr>
                      <tr>
                        <td>Client</td>
                        <td>".$client."</td>
                      </tr>
                      <tr>
                        <td bgcolor='#f1f1f1'>IP</td>
                        <td bgcolor='#f1f1f1'>".$ip."</td>
                      </tr>
                      
                    </tbody>
                    </table>
                
                    </td>
                  </tr>
                </table>
            </body>
            </html>
            ";
            
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= 'From: <support@panjodepa.com>' . "\r\n";
        
            $tst = mail($to, $subject, $message, $headers);
           

            // $this->load->library('email'); 
            // $config              = array();
            // $config['useragent'] = "CodeIgniter";
            // $config['mailpath']  = "/usr/bin/sendmail";
            //  $config['protocol']  = "mail";
            // $config['smtp_host'] = "mail.ekraj.org";
            // $config['smtp_port'] = "587";
            // $config['smtp_user'] = 'contactdeepa@ekraj.org';
            // $config['smtp_pass'] = "_I,jL,Z1MLS)";
            // $config['mailtype']  = 'html';
            // $config['charset']   = 'utf-8';
            // $config['newline']   = "\r\n";
            // $config['crlf']      = "\r\n";
            // $this->email->initialize($config);
            // $this->email->from('contactdeepa@ekraj.org', 'Deepa Village');
           
            // $this->email->to('smarshad86@gmail.com');
            // $this->email->subject('New Contact Detail');
            // $body = $this->load->view('email/admin/new-contact', $master, true);
            // $this->email->message($body);
            // $tst = $this->email->send();
            
            if($tst == true){
                $result['status'] = true;
                $result['msg']    = 'Thank you for contact us we will get back to you soon';
            }else{
                $result['status'] = false;
                $result['msg']    = 'Error On Sending Email';
            }
          
            $this->response([
                'status'   => $result['status'],
                'validate' => TRUE,
                'message'  => $result['msg'],
            ], REST_Controller::HTTP_OK);
        } else {
            foreach ($this->post() as $key => $value) {
                $verror[$key] = form_error($key);
            }
            $ab = validation_errors();
            $this->response([
                'status'    => FALSE,
                'validate'  => FALSE,
                'message'   => $verror,
                'ab'   => $ab,
            ], REST_Controller::HTTP_OK);
        }
    }
}