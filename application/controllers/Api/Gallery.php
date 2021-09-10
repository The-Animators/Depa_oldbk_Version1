<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . './libraries/REST_Controller.php';

class Gallery extends REST_Controller{

    private $title;
    public function __construct(){
        parent::__construct();
        $this->output->set_header('Cache-Control: no-store,no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->load->model('gallery_model' ,'gallery');
        $this->load->library('upload'); //load library upload 
        $this->title = 'Gallery';
    }

    /*
    1.  HTTP_OK
    2.  HTTP_BAD_REQUEST
    2.  HTTP_NOT_FOUND
    */

    function save_post(){
        $upload_path    = $this->config->item('upload_path');
        $data           = array('status' => false,'validate' => false, 'message' => array());
        $title          = $this->post('title');
        $gdrive_link    = $this->post('gdrive_link');
        $id             = $this->post('id');
        $image          = '';
        $oldimage       = $this->post('old_thumbnail');
        $flag           = false;
        $slug         	= slugify($title);
        $this->form_validation->set_rules('title', 'Title', 'required|trim');
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_message('required', 'Enter %s');
        if ($this->form_validation->run()) {

            $config['upload_path']   = $this->config->item('upload_path').'gallery/'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //Allowing types
            $config['encrypt_name']  = FALSE;
            $config['file_name']     = date("Ymdhis");
        
            $this->upload->initialize($config);
            $ins = array();
            if ($_FILES['gallery']['size'] > 0) {
                $gallery_image = [];
                $count = count($_FILES['gallery']['name']);
                for($i = 0; $i < $count; $i++){
                    if(!empty($_FILES['gallery']['name'][$i])){
                        $_FILES['file']['name']     = $_FILES['gallery']['name'][$i];
                        $_FILES['file']['type']     = $_FILES['gallery']['type'][$i];
                        $_FILES['file']['tmp_name'] = $_FILES['gallery']['tmp_name'][$i];
                        $_FILES['file']['error']    = $_FILES['gallery']['error'][$i];
                        $_FILES['file']['size']     = $_FILES['gallery']['size'][$i];

                        $this->load->library('upload',$config); 
                        if($this->upload->do_upload('file')){
                            $uploadData       = $this->upload->data();
                            $filename         = $uploadData['file_name'];
                            $gallery_image[]  = $filename;

                            $this->load->library('image_lib');                    
                            $config1['image_library']   = 'gd2';
                            $config1['source_image']    = $config['upload_path'].''.$filename;
                            $config1['create_thumb']    = FALSE;
                            $config1['maintain_ratio']  = TRUE;
                            // $config1['width']           = 320;
                            // $config1['height']          = 640;
                            $this->load->library('image_lib');
                            $this->image_lib->initialize($config1);
                            $this->image_lib->resize();
                            unset($config1);
                            $this->image_lib->clear();
                        }else{
                            echo $this->upload->display_errors();
                        }
                    }
                }
                // print_r($gallery_image);
            }
            

            if(!empty($_FILES['thumbnail']['name'])){
                if ($this->upload->do_upload('thumbnail')){
                    
                    $data   = $this->upload->data();
                    $image  = $data['file_name']; //get file name

                    $this->load->library('image_lib');                    
                    $config1['image_library']  = 'gd2';
                    $config1['source_image']   = $config['upload_path'].''.$data['file_name'];
                    $config1['create_thumb']   = FALSE;
                    $config1['maintain_ratio'] = TRUE;
                    // $config1['width']          = 320;
                    // $config1['height']         = 240;

                    $this->load->library('image_lib');
                    $this->image_lib->initialize($config1);
                    $this->image_lib->resize();
                    unset($config1);
                    $this->image_lib->clear();
                    $flag = true;
                    
                }else{
                    
                    $this->response([
                        'status'   => FALSE,
                        'validate' => TRUE,
                        'message'  => "Upload failed. Image file must be gif|jpg|png|jpeg|bmp",
                    ], REST_Controller::HTTP_OK);
                }
                          
            }else{
                if($id == 0){
                    $this->response([
                        'status'   => FALSE,
                        'validate' => TRUE,
                        'message'  => "Image file is empty.",
                    ], REST_Controller::HTTP_OK);
                }else{
                    $flag = true;
                }
            }
            if($flag){
                // print_r($gallery_image);
                if($oldimage != '' && $image == '' && $id > 0){
                    $data = array(
                        'title'     => $title,
                        'gdrive_link'   => $gdrive_link,
                        'slug'     => $slug,
                    );
                }else{
                    $data = array(
                        'title'     => $title,
                        'gdrive_link'   => $gdrive_link,
                        'slug' 		=> $slug,
                        'thumbnail' => $image,
                    );
                }

                if($image != '' && $oldimage != ''){
                    $filename = FCPATH."uploads/gallery/".$oldimage;
                    if (file_exists($filename)) {
                        unlink($filename);
                    }
                }
                $this->gallery->_condition['slug'] = $data['slug'];
                $result = $this->gallery->save_data($data, $gallery_image, $id);
                $this->response([
                    'status'   => $result['status'],
                    'validate' => TRUE,
                    'message'  => $result['msg'],
                ], REST_Controller::HTTP_OK);
                
                if($result['status'] == false){

                    if(count($gallery_image) > 0){
                        
                        for ($i = 0; $i < count($gallery_image); $i++) {
                            $filename = FCPATH."uploads/gallery/".$gallery_image[$i];
                            if (file_exists($filename)) {
                                unlink($filename);
                            }
                        }
                        $filename = FCPATH."uploads/gallery/".$image;
                        if (file_exists($filename)) {
                            unlink($filename);
                        } 
                    }
                }
                // echo "Upload Successful";

            }else{
                echo 'no flag';
            }

        } else {
            $verror=array();
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

    public function index_get($id = '') {
        //returns all rows if the id parameter doesn't exist,
        //otherwise single row will be returned
        $this->gallery->_condition['deleted'] = 0;
        if($id){
            $this->gallery->_condition['id'] = $id;
        }
        $result = $this->gallery->getRows();
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

    public function home_get() {
        //returns all rows if the id parameter doesn't exist,
        //otherwise single row will be returned
        $this->gallery->_condition['deleted'] = 0;
        
        $result  = $this->gallery->get_all_where($this->gallery->_condition,1,0,'id');
        

        $row_set = array();
        $galid   = 0;
        if( count($result) > 0){
            $new_row['image'] = $result[0]['thumbnail'];
            $galid            = $result[0]['id'];
            $slug             = $result[0]['slug'];
            $title            = $result[0]['title'];
            $row_set[]        = $new_row;
        }
        $this->gallery->change_table('gallery_image');
        $this->gallery->_condition['gal_id']  = $galid;
        $this->gallery->_condition['deleted'] = 0;

        $result1  = $this->gallery->getRows();
        // print $this->db->last_query();exit;
        if( count($result1) > 0){
            foreach ($result1 as $row){
                $new_row['image'] = $row['image'];
                $row_set[]        = $new_row;
            }
        }
        // echo count($row_set);
        // print $this->db->last_query();
        // $result = $this->gallery->getRows();
        //check if the user data exists
        if(count($row_set) > 0){
            $data['status'] = TRUE;
            $data['data']   = $row_set;
            $data['id']     = $galid;
            $data['slug']   = $slug;
            $data['title']  = $title;
            //set the response and exit
            $this->response($data, REST_Controller::HTTP_OK);
        }else{
            //set the response and exit
            $this->response([
                'data'   => '',
                'status' => FALSE,
                'message' => 'No Record Found.'
            ], REST_Controller::HTTP_OK);
        }
    }
    
    public function getgallery_get() {
        //returns all rows if the id parameter doesn't exist,
        //otherwise single row will be returned
        $this->gallery->_condition['deleted'] = 0;
        if($id){
            $this->gallery->_condition['id'] = $id;
        }
        $result = $this->gallery->getRows();
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

    public function gallery_delete($id){
        // echo 'ID '.$id;exit;
        //check whether post id is not empty
        if($id){
            //delete post
            $this->gallery->_condition['id'] = $id;
            $delete = $this->gallery->delete(FALSE,$id);
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

    public function deleteall_delete($mainid){
        if($mainid){
            $delete = $this->gallery->deleteall($mainid);
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

    public function deletegallery_post(){
        $this->form_validation->set_rules('id', 'Id', 'required|trim|numeric');
        $this->form_validation->set_rules('image', 'Image Name', 'required|trim');
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_message('required', 'Enter %s');
        if ($this->form_validation->run()) {
            $id     = $this->post('id');
            $image  = $this->post('image');

            $this->gallery->change_table('gallery_image');

            $this->gallery->_condition['id'] = $id;
            $delete = $this->gallery->delete(TRUE,$id);
            // print_r($delete); $this->db->last_query();
            if($delete['code']){
                $this->response([
                    'status' => FALSE,
                    'message' => "Some problems occurred, ".$delete['message']
                ], REST_Controller::HTTP_OK);
            }else{
                $filename = FCPATH."uploads/gallery/".$this->post('image');
                if (file_exists($filename)) {
                    unlink($filename);
                }
                $this->response([
                    'status' => TRUE,
                    'message' => $this->title.' has been removed successfully.'
                ], REST_Controller::HTTP_OK);
                //set the response and exit
            }
            
        }else {
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

    public function detail_get($slug = '') {
        //returns all rows if the id parameter doesn't exist,
        //otherwise single row will be returned
        
        
        // $this->gallery->change_table('master_gallery');
        // $this->gallery->_condition['deleted'] = 0;
        // $result1 = $this->gallery->getRows();
        
        $getThumb = $this->gallery->getSingleThumb($slug);

        // Step1 Get Galleryid
        $gal_id = $this->gallery->getid($slug);
        $this->gallery->change_table('gallery_image');
        $this->gallery->_condition['deleted'] = 0;
        $this->gallery->_condition['gal_id'] = $gal_id->id;

        $result = $this->gallery->getRows();
        
        //print_r($getThumb);
        //die();
        
        $thumb = array();
        $thumb['id'] = "0";
        $thumb['gal_id'] = $getThumb->id;
        $thumb['image'] = $getThumb->thumbnail;
        $thumb['deleted'] = "0";
        
        //check if the user data exists
        if(!empty($result)){
            $data['status'] = TRUE;
            
            //array_push($result, $thumb);
            $data['data']   = $result;
            array_unshift($data['data'], $thumb);
            
            // array_push($data['data'], $thumb);
            //$data['thumb'] = $result1;
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
    
}