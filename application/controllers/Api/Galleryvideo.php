<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . './libraries/REST_Controller.php';

class Galleryvideo extends REST_Controller{

    private $title;
    public function __construct(){
        parent::__construct();
        $this->output->set_header('Cache-Control: no-store,no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->load->model('gallery_video_model' ,'gallery');
        $this->title = 'Video Gallery';
    }

    /*
    1.  HTTP_OK
    2.  HTTP_BAD_REQUEST
    2.  HTTP_NOT_FOUND
    */

    function save_post(){
        $data           = array('status' => false,'validate' => false, 'message' => array());
        $title          = $this->post('title');
        $link    		= $this->post('link');
        $id             = $this->post('id');

        $this->form_validation->set_rules('title', 'Title', 'required|trim');
        $this->form_validation->set_rules('link', 'YouTube Video Link', 'required|trim');
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_message('required', 'Enter %s');
        if ($this->form_validation->run()) {

	        $data = array(
                'title'         => $title,
                'link'   		=> $link
            );

            $result = $this->gallery->save_data($data, $id);
            $this->response([
                'status'   => $result['status'],
                'validate' => TRUE,
                'message'  => $result['msg'],
            ], REST_Controller::HTTP_OK);

        } else {
            $verror = array();
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
    
    public function android_get() {
        
        $this->gallery->_condition['deleted'] = 0;
        $result = $this->gallery->getRows();
        
        $newData = array();
        
        foreach($result as $key => $values){
            
            if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/\s]{11})%i', $result[$key]['link'], $match)) {
                $video_id = $match[1];
            }
            
            $thumbnail = "https://img.youtube.com/vi/".$video_id."/0.jpg";
            
            $ndata = array(
                "id" => $result[$key]['id'],
                "title" => $result[$key]['title'],
                "link" => $result[$key]['link'],
                "status" => $result[$key]['status'],
                "deleted" => $result[$key]['deleted'],
                "created_on" => $result[$key]['created_on'],
                "thumbnail" => $thumbnail,
                "vid" => $video_id
                );
                
                array_push($newData, $ndata);
            
        }
        
        if(!empty($result)){
            $data['status'] = TRUE;
            $data['data']   = $newData;
            $this->response($data, REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status' => FALSE,
                'data'   => $newData,
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
        if($id){
            //delete post
            $this->gallery->_condition['id'] = $id;
            $delete = $this->gallery->delete(FALSE, $id);
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