<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . './libraries/REST_Controller.php';

class Blog extends REST_Controller{

    private $title,$upload_path;
    public function __construct(){
        parent::__construct();
        $this->output->set_header('Cache-Control: no-store, no-cache,must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->load->model('blog_model','blog');
        $this->load->library('upload'); //load library upload 
        $this->title = 'Blog';
    }

    /*
    1.  HTTP_OK
    2.  HTTP_BAD_REQUEST
    2.  HTTP_NOT_FOUND
    */

    public function index_post(){
        $upload_path    = $this->config->item('upload_path');

        $this->upload_path  = $upload_path."blog/";
        $this->load->library('upload');

        $data     = array('status' => false, 'validate' => false, 'message' => array());
        
        $this->form_validation->set_rules('title', 'Enter Title', 'required|trim');
        $this->form_validation->set_rules('description', 'Enter Description', 'required|trim');
        $this->form_validation->set_rules('ip', 'Enter Ip', 'required|trim');
        //$this->form_validation->set_rules('uploaded_by', 'Enter Uploded By', 'required|trim');
        $this->form_validation->set_rules('memberid', 'Memberid Misssing', 'required|trim');
        $this->form_validation->set_rules('client', 'Enter Client', 'required|trim');

        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_message('required', ' %s');
        if ($this->form_validation->run()) {
            $id                       = $this->post('id');
            $master['title']          = $this->input->post('title');
            $master['slug']           = slugify($this->input->post('title'));
            $master['description']    = $this->input->post('description');
            $master['status']         = $this->input->post('status') ?? 0;
            $uploaded_by              = $this->input->post('uploaded_by') ?? '';
            if($id == 0){
                $master['ip']         = $this->input->post('ip');
                $master['memberid']   = $this->input->post('memberid');
                $master['client']     = $this->input->post('client');
                if($uploaded_by != ''){
                    $master['uploaded_by']    = $this->post('uploaded_by');
                }else{
                    $master['uploaded_by']    = getFullname($this->post('memberid'));
                }
            }

            $image = array();
            $errorUploadType = "";

            if(!empty($_FILES['images']['name']) && count(array_filter($_FILES['images']['name'])) > 0){ 
                $countfiles = count($_FILES['images']['name']);
                for($i = 0; $i < $countfiles; $i++){
                    // Define new $_FILES array - $_FILES['file']
                    $_FILES['file']['name']     = $_FILES['images']['name'][$i];
                    $_FILES['file']['type']     = $_FILES['images']['type'][$i];
                    $_FILES['file']['tmp_name'] = $_FILES['images']['tmp_name'][$i];
                    $_FILES['file']['error']    = $_FILES['images']['error'][$i];
                    $_FILES['file']['size']     = $_FILES['images']['size'][$i];
                    // echo "Calling upload_web for Images [".$i."]<br>\n";
                    $rtn = $this->upload_web('file', 'jpg|jpeg|png', 'image');
                    if($rtn['status'] == true){
                        $image[$i]['file_name'] = $rtn['filename'];
                        $logoupload             = true;
                    }else{
                        $errorUploadType = $_FILES['file']['name'].' | ';  
                    }
                }
            }

            $this->blog->_condition['slug'] = $master['slug'];
            
            $result = $this->blog->saveData($master, $image, $id);
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
        
        $upload_path    = $this->config->item('upload_path');
        $this->upload_path  = $upload_path."blog/";
        $this->load->library('upload');

        $data     = array('status' => false, 'validate' => false, 'message' => array());
        
        $this->form_validation->set_rules('title', 'Enter Title', 'required|trim');
        $this->form_validation->set_rules('description', 'Enter Description', 'required|trim');
        $this->form_validation->set_rules('ip', 'Enter Ip', 'required|trim');
        $this->form_validation->set_rules('memberid', 'Memberid Misssing', 'required|trim');
        $this->form_validation->set_rules('client', 'Enter Client', 'required|trim');

        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_message('required', ' %s');
        if ($this->form_validation->run()) {
            $id                       = $this->post('id');
            $master['title']          = $this->input->post('title');
            $master['slug']           = slugify($this->input->post('title'));
            $master['description']    = $this->input->post('description');
            $master['status']         = $this->input->post('status') ?? 0;
            $uploaded_by              = $this->input->post('uploaded_by') ?? '';
            
            if($id == 0){
                $master['ip']         = $this->input->post('ip');
                $master['memberid']   = $this->input->post('memberid');
                $master['client']     = $this->input->post('client');
                if($uploaded_by != ''){
                    $master['uploaded_by']    = $this->post('uploaded_by');
                }else{
                    $master['uploaded_by']    = getFullname($this->post('memberid'));
                }
            }

            $image = array();
            $errorUploadType = "";

            if(!empty($_FILES['images']['name']) && count(array_filter($_FILES['images']['name'])) > 0){ 
                $countfiles = count($_FILES['images']['name']);
                for($i = 0; $i < $countfiles; $i++){
                    
                    $_FILES['file']['name']     = $_FILES['images']['name'][$i];
                    $_FILES['file']['type']     = $_FILES['images']['type'][$i];
                    $_FILES['file']['tmp_name'] = $_FILES['images']['tmp_name'][$i];
                    $_FILES['file']['error']    = $_FILES['images']['error'][$i];
                    $_FILES['file']['size']     = $_FILES['images']['size'][$i];
                    
                    $rtn = $this->upload_android('file', 'jpg|jpeg|png', 'image', $i);
                    if($rtn['status'] == true){
                        $image[$i]['file_name'] = $rtn['filename'];
                        $logoupload             = true;
                    }else{
                        $errorUploadType .= $_FILES['file']['name'].' | ';  
                    }
                    
                }
            }

            $this->blog->_condition['slug'] = $master['slug'];
            $result = $this->blog->saveData($master, $image, $id);
            
            $this->response([
                'status'   => $result['status'],
                'validate' => TRUE,
                'message'  => $result['msg'],
            ], REST_Controller::HTTP_OK);
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

    public function getbyid_get($id = '') {
        //returns all rows if the id parameter doesn't exist,
        //otherwise single row will be returned
        $this->blog->_condition['deleted'] = 0;
        $this->blog->_condition['slug'] = $id;
        $result = $this->blog->getbyid();
       
        //check if the user data exists
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
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function index_get($id = '') {
        //returns all rows if the id parameter doesn't exist,
        //otherwise single row will be returned
        $this->blog->_condition['deleted'] = 0;
        $this->blog->_condition['status']  = 1;
        if($id){
            $this->blog->_condition['id'] = $id;
        }
        $result = $this->blog->get();
        // print_r($result);

        //check if the user data exists
        if(!empty($result)){
            $data['status'] = TRUE;
            $data['data']   = $result;
            $data['message']= 'Blog Found';
            //set the response and exit
            $this->response($data, REST_Controller::HTTP_OK);
        }else{
            //set the response and exit
            $this->response([
                'data'   => $result,
                'status' => FALSE,
                'message' => 'No Blog Found.'
            ], REST_Controller::HTTP_OK);
        }
    }

    public function home_get() {
        // $orderby = 'added_on';
        // $limit   = 3;
        // $condition['deleted'] = 0;
        // $result = $this->blog->get($condition,$orderby, $limit);
        $this->blog->_condition['deleted'] = 0;
        //$result = getBlogs();
        $result = getBlog();
        //check if the user data exists
        if(!empty($result)){
            $data['status'] = TRUE;
            $data['data']   = $result;
            $data['message']= 'Blog Found';
            //set the response and exit
            $this->response($data, REST_Controller::HTTP_OK);
        }else{
            //set the response and exit
            $this->response([
                'data'   => $result,
                'status' => FALSE,
                'message' => 'No Blog Found.'
            ], REST_Controller::HTTP_OK);
        }
    }

    public function list_get($listype = '') {
        //returns all rows if the id parameter doesn't exist,
        //otherwise single row will be returned
        $this->blog->_condition['deleted'] = 0;
        // $this->blog->_condition['status']  = 1;
        if($listype=='pending'){
            $this->blog->_condition['status'] = 0;
        }else if($listype=='confirm'){
            $this->blog->_condition['status'] = 1;
        }else if($listype=='reject'){
            $this->blog->_condition['status'] = 2;
        }
        $result = $this->blog->get();

        //check if the user data exists
        if(!empty($result)){
            $data['status'] = TRUE;
            $data['data']   = $result;
            $data['message']= 'Blog Found';
            //set the response and exit
            $this->response($data, REST_Controller::HTTP_OK);
        }else{
            //set the response and exit
            $this->response([
                'data'   => $result,
                'status' => FALSE,
                'message' => 'No Blog Found.'
            ], REST_Controller::HTTP_OK);
        }
    }
    
    
    public function getLastBlog_get($listype = '') {
        //returns all rows if the id parameter doesn't exist,
        //otherwise single row will be returned
        $this->blog->_condition['deleted'] = 0;
        // $this->blog->_condition['status']  = 1;
        if($listype=='pending'){
            $this->blog->_condition['status'] = 0;
        }else if($listype=='confirm'){
            $this->blog->_condition['status'] = 1;
        }else if($listype=='reject'){
            $this->blog->_condition['status'] = 2;
        }
        $result = $this->blog->get();

        //check if the user data exists
        if(!empty($result)){
            $data['status'] = TRUE;
            $data['data']   = $result;
            $data['message']= 'Blog Found';
            //set the response and exit
            $this->response($data, REST_Controller::HTTP_OK);
        }else{
            //set the response and exit
            $this->response([
                'data'   => $result,
                'status' => FALSE,
                'message' => 'No Blog Found.'
            ], REST_Controller::HTTP_OK);
        }
    }
    
    public function upload_android($img ='', $type='', $what='', $inc=''){
        
        $extension = pathinfo($_FILES[$img]["name"], PATHINFO_EXTENSION);
        $image_tmp      = $_FILES[$img]['tmp_name'];
        $filename     = "blog_".date('Ymdhis').$inc.'.jpg';
        
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
            $config['max_size']      = '50000'; // max_size in kb
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

    public function upload_app($img='',$what=''){

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

    public function index_delete($id){
        // echo 'ID '.$id;exit;
        //check whether post id is not empty
        if($id){
            //delete post
            $this->latest->_condition['id'] = $id;
            $delete = $this->blog->delete(FALSE,$id);
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