<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . './libraries/REST_Controller.php';

class Helpus extends REST_Controller {

    public function __construct(){
        parent::__construct();
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->load->model('help_us_model' ,'master_help_us');
        $this->load->library('upload');
        $this->title = 'Help Us';

    }


    function save_post(){
        
        /*$bimages      = true;
        $upload_path        = $this->config->item('upload_path');
        $this->upload_path  = $upload_path."helpus/";

        $image = array();
        if(!empty($_FILES['bimages']['name']) && count(array_filter($_FILES['bimages']['name'])) > 0){ 
            $countfiles = count($_FILES['bimages']['name']);
            for($i = 0; $i < $countfiles; $i++){
                $_FILES['file']['name']     = $_FILES['bimages']['name'][$i];
                $_FILES['file']['type']     = $_FILES['bimages']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['bimages']['tmp_name'][$i];
                $_FILES['file']['error']    = $_FILES['bimages']['error'][$i];
                $_FILES['file']['size']     = $_FILES['bimages']['size'][$i];
                $rtn = $this->upload_web('file', 'jpg|jpeg|png', 'image');
                if($rtn['status'] == true){
                    $image[$i]['file_name'] = $rtn['filename'];
                    $logoupload             = true;
                }else{
                    $errorUploadType .= $_FILES['file']['name'].' | ';  
                }

            }
        }
        */
        
        // print_r($this->post('bimages[]'));
        // die();

        $bimages      = true;
        $upload_path        = $this->config->item('upload_path');
        $this->upload_path  = $upload_path."helpus/";

        $data           = array('status' => false,'validate' => false, 'message' => array());
        $flag       = false;
        $this->form_validation->set_rules('help_details', 'Enter Details', 'required|trim');
        $this->form_validation->set_rules('help_title', 'Enter Title (Subject)', 'required|trim');
        $this->form_validation->set_rules('help_person', 'Enter Person Name', 'required|trim');
        $this->form_validation->set_rules('help_contact', 'Enter Contact Number', 'required|trim|numeric');

        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_message('required', ' %s');
        if ($this->form_validation->run()) {
     
            $data = array(
                'member_no'        	=> $this->post('help_by'),
                'family_no'         => $this->post('family_no'),
                'title'    			=> $this->post('help_title'),
                'contact_person'	=> $this->post('help_person'),
                'contact_number'    => $this->post('help_contact'),
                'details'			=> $this->post('help_details'),
                'help_for'        	=> $this->post('help_for')
            );

            $image = array();
            if(!empty($_FILES['bimages']['name']) && count(array_filter($_FILES['bimages']['name'])) > 0){ 
                $countfiles = count($_FILES['bimages']['name']);
                for($i = 0; $i < $countfiles; $i++){
                    $_FILES['file']['name']     = $_FILES['bimages']['name'][$i];
                    $_FILES['file']['type']     = $_FILES['bimages']['type'][$i];
                    $_FILES['file']['tmp_name'] = $_FILES['bimages']['tmp_name'][$i];
                    $_FILES['file']['error']    = $_FILES['bimages']['error'][$i];
                    $_FILES['file']['size']     = $_FILES['bimages']['size'][$i];
                    $rtn = $this->upload_web('file', 'jpg|jpeg|png', 'image');
                    if($rtn['status'] == true){
                        $image[$i]['file_name'] = $rtn['filename'];
                        $logoupload             = true;
                    }else{
                        $errorUploadType .= $_FILES['file']['name'].' | ';  
                    }

                }
            }

            $result = $this->master_help_us->savedata($data, $image, 0);
            
            

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
    
    function android_post(){

        $bimages      = true;
        $upload_path        = $this->config->item('upload_path');
        $this->upload_path  = $upload_path."helpus/";

        $data           = array('status' => false,'validate' => false, 'message' => array());
        $flag       = false;
        $this->form_validation->set_rules('help_details', 'Enter Details', 'required|trim');
        $this->form_validation->set_rules('help_title', 'Enter Title (Subject)', 'required|trim');
        $this->form_validation->set_rules('help_person', 'Enter Person Name', 'required|trim');
        $this->form_validation->set_rules('help_contact', 'Enter Contact Number', 'required|trim|numeric');

        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_message('required', ' %s');
        if ($this->form_validation->run()) {
     
            $data = array(
                'member_no'        	=> $this->post('help_by'),
                'family_no'         => $this->post('family_no'),
                'title'    			=> $this->post('help_title'),
                'contact_person'	=> $this->post('help_person'),
                'contact_number'    => $this->post('help_contact'),
                'details'			=> $this->post('help_details'),
                'help_for'        	=> $this->post('help_for')
            );

            $j = 0;
            $image = array();
            $errorUploadType = "";
            $temp_name = "";
            
            if(!empty($_FILES['bimages']['name']) && count(array_filter($_FILES['bimages']['name'])) > 0){ 
                
                $countfiles = count($_FILES['bimages']['name']);
                
                for($i = 0; $i < $countfiles; $i++){
                    
                    // $j++;
                    // $temp_name .= $_FILES['bimages']['error'][$i].', ';
                    // $rtn = $this->upload_web('bimages', 'jpg|jpeg|png', 'image');
                    // $temp_name .= $rtn['filename'].", ";
                    
                    $_FILES['file']['name']     = $_FILES['bimages']['name'][$i];
                    $_FILES['file']['type']     = $_FILES['bimages']['type'][$i];
                    $_FILES['file']['tmp_name'] = $_FILES['bimages']['tmp_name'][$i];
                    $_FILES['file']['error']    = $_FILES['bimages']['error'][$i];
                    $_FILES['file']['size']     = $_FILES['bimages']['size'][$i];
                    $rtn = $this->upload_android('file', 'jpg|jpeg|png', 'image', $i);
                    if($rtn['status'] == true){
                        $image[$i]['file_name'] = $rtn['filename'];
                        $logoupload             = true;
                    }else{
                        $errorUploadType .= $_FILES['file']['name'].' | ';  
                    }
                    
                    //$temp_name .= $rtn;
                    

                }
            }
            
            //$count = count(array_filter($_FILES['bimages']['name']));
            //$image = $_FILES['bimages']['name'];

            /*$this->response([
                'status'   => TRUE,
                'validate' => TRUE,
                'message'  => $temp_name,
            ], REST_Controller::HTTP_OK);*/

            $result = $this->master_help_us->savedata($data, $image, 0);

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

    //getPendingList
    public function getPendingList_get() {
        $result = $this->master_help_us->getpendinglist();
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

    public function list_get() {
        $result = $this->master_help_us->getlist();
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
    
    
    public function api_list_get() {
        $result = $this->master_help_us->getapprovedlist();
        if(!empty($result)){
            $data['status'] = TRUE;
            $data['message'] = 'Record Found';
            $data['data']   = $result;
            $this->response($data, REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status' => FALSE,
                'message' => 'No Record Found',
                'data'   => $result
            ], REST_Controller::HTTP_OK);
        }
    }


    public function getbyid_get($id = '') {
        // $this->master_help_us->_condition['id'] = $id;
        // $this->master_help_us->_condition['status'] = 1;
        // $this->master_help_us->_condition['deleted'] = 0;
        $result = $this->master_help_us->getbyid($id);
       
        //check if the user data exists
        if(!empty($result)){
            // $data['status'] = TRUE;
            // $data['data']   = $result;
            $data   = $result;
            $this->response($data, REST_Controller::HTTP_OK);
        }else{
            //set the response and exit
            $this->response([
                'data'   => $result,
                'status' => FALSE,
                'message' => 'No Record Found.'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    
    public function api_getbyid_get($id = '') {
        $result = $this->master_help_us->api_getmylistbyid($id);
        if(!empty($result)){
            $data['status'] = TRUE;
            $data['message'] = 'Record Found.';
            $data['data']   = $result;
            $this->response($data, REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'data'   => $result,
                'status' => FALSE,
                'message' => 'No Record Found.'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    
    public function api_getimgbyid_get($id = '') {
        
        $result = $this->master_help_us->api_getimgbyid($id);
        
        $onlyimage = array();
        
        foreach($result as $key => $value){
            //array_push($onlyimage, $result[$key]['image']);
            array_push($onlyimage, $result[$key]['image']);
        }
        
        // print_r($onlyimage);
        // die();
        
        if(!empty($result)){
            $data['status'] = TRUE;
            $data['message'] = 'Record Found.';
            $data['data']   = $result;
            $this->response($data, REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status' => FALSE,
                'message' => 'No Record Found.',
                'data'   => array()
            ], REST_Controller::HTTP_OK);
        }
    }

    public function approved_post() {
        $id = $this->post('id');
        $result = $this->master_help_us->approved($id);
        if(!empty($result)){
            $data['status'] = TRUE;
            $data['data']   = $result['msg'];
            $this->response($data, REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'data'   => $result['msg'],
                'status' => FALSE,
                'message' => 'No Record Found.'
            ], REST_Controller::HTTP_OK);
        }
    }

    public function reject_post() {
        $id = $this->post('id');
        $result = $this->master_help_us->reject($id);
        if(!empty($result)){
            $data['status'] = TRUE;
            $data['data']   = $result['msg'];
            $this->response($data, REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'data'   => $result['msg'],
                'status' => FALSE,
                'message' => 'No Record Found.'
            ], REST_Controller::HTTP_OK);
        }
    }




    public function updatedelete_post(){

    	$id = $this->post('id');
        $this->db->trans_begin();
        $rows = 1;
        $family_member = array();
        $family_member['deleted'] = 1;

        $this->db->select('id')->from('master_help_us')->where('id', $id);
        $query = $this->db->get();
        $rows = $query->num_rows();
        if($rows > 0){
            $this->db->where('id', $id);
            $this->db->update('master_help_us', $family_member);
            if($this->db->trans_status() === FALSE){
                $this->db->trans_rollback();
                //$result = array("status" => false,"false" => true,"msg" => "Error While Deleting Member");
                $this->response([
                	'status'   => FALSE,
	                'validate' => TRUE,
	                'message'  => "Error While Deleting Help Us",
	            ], REST_Controller::HTTP_OK);
            }else{
                $this->db->trans_commit();
                //$result = array("status" => true,"success" => true,"msg" => "Member Deleted Successfully");
                $this->response([
                	'status'   => TRUE,
	                'validate' => TRUE,
	                'message'  => "Help Us Deleted Successfully",
	            ], REST_Controller::HTTP_OK);
            }
        }else{
            //$result = array("status" => false,"success" => true,"msg" => "Invalid Member ID");
            $this->response([
            	'status'   => FALSE,
                'validate' => TRUE,
                'message'  => 'Invalid Help Us ID',
            ], REST_Controller::HTTP_OK);
        }  
        //return $result;
    }
    
    
    public function upload_android($img ='', $type='', $what='', $inc=''){
        
        $extension = pathinfo($_FILES[$img]["name"], PATHINFO_EXTENSION);
        $image_tmp      = $_FILES[$img]['tmp_name'];
        $filename     = "ajay_".date('Ymdhis').$inc.'.jpg';
        
        $upload = move_uploaded_file($image_tmp, $this->upload_path.$filename);
        $rtn = array();
        if($upload){
            $rtn = array('filename'=>$filename,'status'=>true);
        }else{
            $rtn =  array('filename'=>$filename,'status'=>false);
        }
        
        return $rtn;
    }
    

    public function upload_web($img ='', $type='', $what=''){
        $config    = array();
        $extension = pathinfo($_FILES[$img]["name"], PATHINFO_EXTENSION);
        $config['upload_path']   = $this->upload_path;
        $config['allowed_types'] = $type;
        $config['overwrite']     = false;
        $config['encrypt_name']  = false;
        $config['remove_spaces'] = true;
        $config['file_name']     = $what.'_'.date('Ymdhis'). '.' . $extension;
        if($img == 'file'){
            $config['max_size']      = '50000'; // max_size in kb
        }

        $rtn = array();
        $this->upload->initialize($config);    
        if($this->upload->do_upload($img)){
            $uploaddata         = array('upload_data' => $this->upload->data());
            $filename               = $uploaddata['upload_data']['file_name'];
            $rtn = array('filename'=>$filename,'status'=>true);
        }else{
            $filename = '['.$what.']['.$config.']['.$this->upload_path.']'. $this->upload->display_errors();
            $rtn =  array('filename'=>$filename,'status'=>false);
        }
        unset($config);
        return $rtn;
    }


    /*
    to take mime type as a parameter and return the equivalent extension
    */
    public function mime2ext($mime){
        $all_mimes = '{"png":["image\/png","image\/x-png"],"bmp":["image\/bmp","image\/x-bmp",
        "image\/x-bitmap","image\/x-xbitmap","image\/x-win-bitmap","image\/x-windows-bmp",
        "image\/ms-bmp","image\/x-ms-bmp","application\/bmp","application\/x-bmp",
        "application\/x-win-bitmap"],"gif":["image\/gif"],"jpeg":["image\/jpeg",
        "image\/pjpeg"],"xspf":["application\/xspf+xml"],"vlc":["application\/videolan"],
        "wmv":["video\/x-ms-wmv","video\/x-ms-asf"],"au":["audio\/x-au"],
        "ac3":["audio\/ac3"],"flac":["audio\/x-flac"],"ogg":["audio\/ogg",
        "video\/ogg","application\/ogg"],"kmz":["application\/vnd.google-earth.kmz"],
        "kml":["application\/vnd.google-earth.kml+xml"],"rtx":["text\/richtext"],
        "rtf":["text\/rtf"],"jar":["application\/java-archive","application\/x-java-application",
        "application\/x-jar"],"zip":["application\/x-zip","application\/zip",
        "application\/x-zip-compressed","application\/s-compressed","multipart\/x-zip"],
        "7zip":["application\/x-compressed"],"xml":["application\/xml","text\/xml"],
        "svg":["image\/svg+xml"],"3g2":["video\/3gpp2"],"3gp":["video\/3gp","video\/3gpp"],
        "mp4":["video\/mp4"],"m4a":["audio\/x-m4a"],"f4v":["video\/x-f4v"],"flv":["video\/x-flv"],
        "webm":["video\/webm"],"aac":["audio\/x-acc"],"m4u":["application\/vnd.mpegurl"],
        "pdf":["application\/pdf","application\/octet-stream"],
        "pptx":["application\/vnd.openxmlformats-officedocument.presentationml.presentation"],
        "ppt":["application\/powerpoint","application\/vnd.ms-powerpoint","application\/vnd.ms-office",
        "application\/msword"],"docx":["application\/vnd.openxmlformats-officedocument.wordprocessingml.document"],
        "xlsx":["application\/vnd.openxmlformats-officedocument.spreadsheetml.sheet","application\/vnd.ms-excel"],
        "xl":["application\/excel"],"xls":["application\/msexcel","application\/x-msexcel","application\/x-ms-excel",
        "application\/x-excel","application\/x-dos_ms_excel","application\/xls","application\/x-xls"],
        "xsl":["text\/xsl"],"mpeg":["video\/mpeg"],"mov":["video\/quicktime"],"avi":["video\/x-msvideo",
        "video\/msvideo","video\/avi","application\/x-troff-msvideo"],"movie":["video\/x-sgi-movie"],
        "log":["text\/x-log"],"txt":["text\/plain"],"css":["text\/css"],"html":["text\/html"],
        "wav":["audio\/x-wav","audio\/wave","audio\/wav"],"xhtml":["application\/xhtml+xml"],
        "tar":["application\/x-tar"],"tgz":["application\/x-gzip-compressed"],"psd":["application\/x-photoshop",
        "image\/vnd.adobe.photoshop"],"exe":["application\/x-msdownload"],"js":["application\/x-javascript"],
        "mp3":["audio\/mpeg","audio\/mpg","audio\/mpeg3","audio\/mp3"],"rar":["application\/x-rar","application\/rar",
        "application\/x-rar-compressed"],"gzip":["application\/x-gzip"],"hqx":["application\/mac-binhex40",
        "application\/mac-binhex","application\/x-binhex40","application\/x-mac-binhex40"],
        "cpt":["application\/mac-compactpro"],"bin":["application\/macbinary","application\/mac-binary",
        "application\/x-binary","application\/x-macbinary"],"oda":["application\/oda"],
        "ai":["application\/postscript"],"smil":["application\/smil"],"mif":["application\/vnd.mif"],
        "wbxml":["application\/wbxml"],"wmlc":["application\/wmlc"],"dcr":["application\/x-director"],
        "dvi":["application\/x-dvi"],"gtar":["application\/x-gtar"],"php":["application\/x-httpd-php",
        "application\/php","application\/x-php","text\/php","text\/x-php","application\/x-httpd-php-source"],
        "swf":["application\/x-shockwave-flash"],"sit":["application\/x-stuffit"],"z":["application\/x-compress"],
        "mid":["audio\/midi"],"aif":["audio\/x-aiff","audio\/aiff"],"ram":["audio\/x-pn-realaudio"],
        "rpm":["audio\/x-pn-realaudio-plugin"],"ra":["audio\/x-realaudio"],"rv":["video\/vnd.rn-realvideo"],
        "jp2":["image\/jp2","video\/mj2","image\/jpx","image\/jpm"],"tiff":["image\/tiff"],
        "eml":["message\/rfc822"],"pem":["application\/x-x509-user-cert","application\/x-pem-file"],
        "p10":["application\/x-pkcs10","application\/pkcs10"],"p12":["application\/x-pkcs12"],
        "p7a":["application\/x-pkcs7-signature"],"p7c":["application\/pkcs7-mime","application\/x-pkcs7-mime"],"p7r":["application\/x-pkcs7-certreqresp"],"p7s":["application\/pkcs7-signature"],"crt":["application\/x-x509-ca-cert","application\/pkix-cert"],"crl":["application\/pkix-crl","application\/pkcs-crl"],"pgp":["application\/pgp"],"gpg":["application\/gpg-keys"],"rsa":["application\/x-pkcs7"],"ics":["text\/calendar"],"zsh":["text\/x-scriptzsh"],"cdr":["application\/cdr","application\/coreldraw","application\/x-cdr","application\/x-coreldraw","image\/cdr","image\/x-cdr","zz-application\/zz-winassoc-cdr"],"wma":["audio\/x-ms-wma"],"vcf":["text\/x-vcard"],"srt":["text\/srt"],"vtt":["text\/vtt"],"ico":["image\/x-icon","image\/x-ico","image\/vnd.microsoft.icon"],"csv":["text\/x-comma-separated-values","text\/comma-separated-values","application\/vnd.msexcel"],"json":["application\/json","text\/json"]}';
        $all_mimes = json_decode($all_mimes,true);
        foreach ($all_mimes as $key => $value) {
            if(array_search($mime,$value) !== false) return $key;
        }
        return false;
    }

     
}