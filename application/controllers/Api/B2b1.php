<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . './libraries/REST_Controller.php';

class B2b extends REST_Controller{
    private $title, $upload_path,$today;
    public function __construct(){
        parent::__construct();
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->load->library('upload');
        $this->load->model('B2b_model' ,'b2b');
        $this->title = 'Business';
        $this->today = date('Y-m-d');
    }

    /*
    1.  HTTP_OK
    2.  HTTP_BAD_REQUEST
    2.  HTTP_NOT_FOUND
    */

    public function getsubscription_post(){
        // echo($this->post('username'));
        // print_r($_POST);exit();
        $data       = array('status' => false,'validate' => false, 'message' => array());
        $status     = trim($this->post('status'));
        $id         = trim($this->post('id'));


        // $this->form_validation->set_rules('status', 'Select Status', 'required|trim');
        // $this->form_validation->set_error_delimiters('', '');
        // $this->form_validation->set_message('required', ' %s');
        // if ($this->form_validation->run()) {
            // if($id > 0){

            //     $this->b2b->_condition['id']= $id;
            //     $result         = $this->b2b->getRows();
            //     $subscription   = $result[0]['subscription'];

            //     $this->b2b->change_table('master_subscription');
                
            //     $this->b2b->_condition['id'] = $subscription;
            //     $subdata                     = $this->b2b->getRows();
            // }else{
                $this->b2b->change_table('master_subscription');
                $this->b2b->_condition['id'] = trim($this->post('subscription'));
                $subdata                     = $this->b2b->getRows();
            // }   
                // print_r($subdata);
            $duration       = $subdata[0]['months'];
            $date           = $this->today;
            $effectiveDate  = '';
            $expirydate     = '';
            
            $effectiveDate  = date('Y-m-d', strtotime($duration, strtotime($date)));
            
            //if($status == 1){
                $expirydate = $effectiveDate;
            // }else{
            //     $expirydate = '';
            // }
            $this->response([
                'status'   => true,
                'validate' => TRUE,
                'data'     => array('expirydate' => $expirydate),
            ], REST_Controller::HTTP_OK);
        // } else {
        //     foreach ($this->post() as $key => $value) {
        //         $verror[$key] = form_error($key);
        //     }
        //     $this->response([
        //         'status'    => FALSE,
        //         'validate'  => FALSE,
        //         'data'      => $verror,
        //     ], REST_Controller::HTTP_OK);
        // }
    }

    public function index_get($status = '') {
        //returns all rows if the id parameter doesn't exist,
        //otherwise single row will be returned
        // $this->job->_condition['deleted'] = 0;
        
        if($status != ''){

            if($status == 'pending'){
                $val = 0;
                $this->b2b->_condition['status'] = $val;
            }else if($status == 'confirm'){
                $val = 1;
                $this->b2b->_condition['status'] = $val;
            }else if($status == 'reject'){
                $val = 2;
                $this->b2b->_condition['status'] = $val;
            }else if($status == 'all'){
                
            }
        }else{
            $this->b2b->_condition['status'] = 1;
        }

        $this->b2b->_condition['mb2b.deleted'] = 0;
        $result = $this->b2b->getb2b();
        // print $this->db->last_query();
        //check if the user data exists
        if(!empty($result)){
            $data['status'] = TRUE;
            $data['data']   = $result;
            $data['message']   = 'Business Listing Found';
            //set the response and exit
            $this->response($data, REST_Controller::HTTP_OK);
        }else{
            //set the response and exit
            $this->response([
                'data'   => $result,
                'status' => FALSE,
                'message' => 'No Business Listing Found.'
            ], REST_Controller::HTTP_OK);
        }
    }

    public function getbyid_get($id = '') {
        //returns all rows if the id parameter doesn't exist,
        //otherwise single row will be returned
        //$this->job->_condition['mb2b.deleted'] = 0;
        $this->b2b->_condition['mb2b.id'] = $id;
        $result = $this->b2b->getbyid();
       
        //check if the user data exists
        if(!empty($result)){
            // $data['status'] = TRUE;
            // $data['data']   = $result;
            $data   = $result;
            //set the response and exit
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

    public function update_post(){
        $data       = array('status' => false,'validate' => false, 'message' => array());
        $this->form_validation->set_rules('firm_name', 'Firm Name', 'required|trim');
        $this->form_validation->set_rules('cat_id', 'Select Category', 'required|trim');
        $this->form_validation->set_rules('contact_person', 'Contact Person', 'required|trim');
        $this->form_validation->set_rules('contact_number', 'Contact Number', 'required|trim|numeric');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_message('required', 'Enter %s');
        if ($this->form_validation->run()) {
            $status                     = $this->post('status');
            $id                         = $this->post('id');
            if($status == 1){
                $master['expiry_date']  = $this->post('expiry_date');
                $master['approve_date'] = $this->today;
            }else{
                $master['expiry_date']  = '';
                $master['approve_date'] = '';
            }

            $master['firm_name']        = $this->post('firm_name');
            $master['catergory']        = $this->post('cat_id');
            $master['description']      = $this->post('description');
            $master['website']          = $this->post('website');
            $master['facebook']         = $this->post('facebook');
            $master['instagram']        = $this->post('instagram');
            $master['twitter']          = $this->post('twitter');
            $master['skype_id']         = $this->post('skype_id');
            $master['whatsapp_number']  = $this->post('whatsapp_number');
            $master['contact_person']   = $this->post('contact_person');
            $master['contact_number']   = $this->post('contact_number');
            $master['email']            = $this->post('email');
            $master['subscription']     = $this->post('subscription');
            $master['address']          = $this->post('address');
            
            $master['status']           = $status;
            $master['ip']               = $this->post('ip');

            $this->b2b->_condition['id'] = $id;

            $result = $this->b2b->insert($master, $id);
            // print $this->db->last_query();
            // print_r($result);exit;
            $this->response([
                'status'   => $result['status'],
                'validate' => TRUE,
                'message'  => 'Blood Group '.$result['msg'],
            ], REST_Controller::HTTP_OK);
        } else {
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
    
    public function index_delete($id){
        // echo 'ID '.$id;exit;
        //check whether post id is not empty
        if($id){
            //delete post
            $this->b2b->_condition['id'] = $id;
            $delete = $this->b2b->delete(TRUE,$id);
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

    public function save_post(){
        // print_r($_POST);exit();
        
        $pst['post'] = $_POST;
        $pst['files'] = $_FILES;

        WriteLog($pst);

        // WriteLog();
        // print_r($pst);
        // echo($this->post('firm_name'));
        // echo($this->post('logo'));
        // exit;
        $logoupload   = true;
        $visitingcard = true;
        $bvideo       = true;
        $bimages      = true;
        $upload_path        = $this->config->item('upload_path');
        $this->upload_path  = $upload_path."b2b/";
        $client             = $this->post('client');
        // print_r($_POST);exit();
        // print_r($_FILES);exit();
        $data     = array('status' => false, 'validate' => false, 'message' => array());
        
        $this->form_validation->set_rules('firm_name', 'Firm Name', 'required|trim');
        $this->form_validation->set_rules('cat_id', 'Select Category', 'required|trim');
        $this->form_validation->set_rules('whatsapp_number', 'Whatsapp Number', 'required|trim|numeric');
        $this->form_validation->set_rules('contact_person', 'Contact Person', 'required|trim');
        $this->form_validation->set_rules('contact_number', 'Contact Number', 'required|trim|numeric');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');

        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_message('required', ' %s');
        if ($this->form_validation->run()) {
            $uploaded_by                = $this->post('uploaded_by') ?? '';
            $id                         = $this->post('id') ?? 0;
            $status                     = $this->post('status') ?? 0;
            $memberid                   = $this->post('memberid') ?? 0;
            $subscription               = $this->post('subscription');
            $master['status']           = $status;
            if($status == 1){
                $master['expiry_date']  = $this->post('expiry_date') ?? '';
                $master['approve_date'] = $this->today;
            }else{
                $master['expiry_date']  = NULL;
                $master['approve_date'] = NULL;
            }

            $master['firm_name']        = $this->post('firm_name');
            $master['catergory']        = $this->post('cat_id');
            $master['description']      = $this->post('description');
            $master['website']          = $this->post('website');
            $master['facebook']         = $this->post('facebook');
            $master['instagram']        = $this->post('instagram');
            $master['twitter']          = $this->post('twitter');
            $master['skype_id']         = $this->post('skype_id');
            $master['whatsapp_number']  = $this->post('whatsapp_number');
            $master['contact_person']   = $this->post('contact_person');
            $master['contact_number']   = $this->post('contact_number');
            $master['email']            = $this->post('email');
            $master['subscription']     = $subscription;
            $master['address']          = $this->post('address');
            // $master['memid']            = $this->post('memberid');
            if($uploaded_by == '' ){
                $uploaded_by = getFullname($memberid);
            }
            $master['uploaded_by']      = $uploaded_by;
            // if($id == 0){
            $master['client']           = $client;
            $master['memid']            = $memberid;
            $master['ip']               = $this->post('ip');
            // }

            $image = array();
            if($id == 0){
                //echo 'size: '. $_FILES['logo']['size'];
                // if($client == "web"){
                if($_FILES['logo'] && $_FILES['logo']['size'] > 0){
                    // echo "Calling upload_web for logo<br>\n";
                    $rtn = $this->upload_web('logo', 'jpg|png|jpeg', 'logo');
                    if($rtn['status'] == true){
                        $master['logo']     = $rtn['filename'];
                        $logoupload         = true;
                    }else{
                        $logoupload         = false;
                        $data['status']     = false;
                        $data['validate']   = true;
                        $data['message']    = $rtn['filename'];
                        echo json_encode($data);
                        exit();
                    }
                }else{
                    $data['status']     = false;
                    $data['validate']   = true;
                    $data['message']    = 'Please upload Logo';
                    echo json_encode($data);
                    exit();
                }
                if($_FILES['visitingcard']['size'] > 0){
                    // echo "Calling upload_web for visiting Card<br>\n";
                    $rtn = $this->upload_web('visitingcard', 'jpg|png|jpeg', 'vc');
                    if($rtn['status'] == true){
                        $master['visitingcard'] = $rtn['filename'];
                        $logoupload             = true;
                    }else{
                        $logoupload         = false;
                        $data['status']     = false;
                        $data['validate']   = true;
                        $data['message']    = $rtn['filename'];
                        echo json_encode($data);
                        exit();
                    }
                }

                if($_FILES['bvideo']['size'] > 0){
                    // echo "Calling upload_web for Video <br>\n";
                    $rtn = $this->upload_web('bvideo', '*', 'video');
                    if($rtn['status'] == true){
                        $master['video'] = $rtn['filename'];
                        $logoupload             = true;
                    }else{
                        $logoupload         = false;
                        $data['status']     = false;
                        $data['validate']   = true;
                        $data['message']    = $rtn['filename'];
                        echo json_encode($data);
                        exit();
                    }
                }

                if(!empty($_FILES['bimages']['name']) && count(array_filter($_FILES['bimages']['name'])) > 0){ 
                    $countfiles = count($_FILES['bimages']['name']);
                    for($i = 0; $i < $countfiles; $i++){
                        // Define new $_FILES array - $_FILES['file']
                        $_FILES['file']['name']     = $_FILES['bimages']['name'][$i];
                        $_FILES['file']['type']     = $_FILES['bimages']['type'][$i];
                        $_FILES['file']['tmp_name'] = $_FILES['bimages']['tmp_name'][$i];
                        $_FILES['file']['error']    = $_FILES['bimages']['error'][$i];
                        $_FILES['file']['size']     = $_FILES['bimages']['size'][$i];
                        // echo "Calling upload_web for Images [".$i."]<br>\n";
                        $rtn = $this->upload_web('file', 'jpg|jpeg|png', 'image');
                        if($rtn['status'] == true){
                            $image[$i]['file_name'] = $rtn['filename'];
                            $logoupload             = true;
                        }else{
                            $errorUploadType .= $_FILES['file']['name'].' | ';  
                        }

                    }
                }
            }
            $result = $this->b2b->saveData($master,$image,$id);
            // print $this->db->last_query();
            $this->response([
                'status'   => $result['status'],
                'validate' => TRUE,
                'message'  => $result['msg'],
            ], REST_Controller::HTTP_OK);
        } else {
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

    public function upload_web($img ='', $type='', $what=''){
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
        $config['file_name']     = $what.'_'.date('Ymdhis'). '.' . $extension;
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

    public function upload_app($img ='', $type='', $what=''){
        $config    = array();
        // $extension = pathinfo($_FILES[$img]["name"], PATHINFO_EXTENSION);
        // echo "inside upload_web img :".$img."\n";
        // echo "inside upload_web what :".$what."\n";
        $config['upload_path']   = $this->upload_path;
        // if($what != 'video')
        $config['allowed_types'] = $type;
        $config['overwrite']     = false;
        $config['encrypt_name']  = false;
        $config['remove_spaces'] = true;
        // $config['file_name']     = $what.'_'.date('Ymdhis'). '.' . $extension;
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
            $filename = '['.$what.']'. $this->upload->display_errors();
            $rtn =  array('filename'=>$filename,'status'=>false);
        }
        unset($config);
        return $rtn;
    }

    public function upload_app1($img='',$what=''){

        $image      = base64_decode($img);
        $mime_type  = finfo_buffer(finfo_open(), $image, FILEINFO_MIME_TYPE); // extract mime type
        $extension  = $this->mime2ext($mime_type); // extract extension from mime type

        $filename = $what.'_'.date("Ymdhis"). '.' . $extension;
        //rename file name with random number
        $path = $this->upload_path.$filename;
        try {
            file_put_contents($path, $image);
            return array('filename'=>$filename,'status'=>true);
        } catch (Exception $e) {
            return array('filename'=>$filename,'status'=>false);
        }
        //image uploading folder path
        // image is bind and upload to respective folde
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