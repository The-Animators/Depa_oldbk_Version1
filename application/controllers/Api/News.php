<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . './libraries/REST_Controller.php';

class News extends REST_Controller{
    private $title;
    public function __construct(){
        parent::__construct();
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->load->model('latest_model' ,'latest');
        $this->load->library('upload'); //load library upload 
        $this->title = 'News & Event';
    }

    /*
    1.  HTTP_OK
    2.  HTTP_BAD_REQUEST
    2.  HTTP_NOT_FOUND
    */
    function save_post(){
        // echo date('d F Y');
        // print_r($this->post());exit;
        $data       = array('status' => false,'validate' => false, 'message' => array());
        
        $id         = $this->post('id');
        $flag       = false;
        $this->form_validation->set_rules('title', 'Title', 'required|trim');
        $this->form_validation->set_rules('event_date', 'Event Date', 'required|trim');
        $this->form_validation->set_rules('description', 'Description', 'required|trim');
        $this->form_validation->set_rules('link', 'Link', 'required|trim');
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_message('required', 'Enter %s');
        if ($this->form_validation->run()) {
            $title          = $this->post('title');
            $description    = $this->post('description');
            $link           = $this->post('link');
            $event_date     = DateTime::createFromFormat('d F Y',$this->post('event_date'))->format('Y-m-d');
            $image          = $this->post('old_image');
            $oldimage       = $this->post('old_image');

            $config['upload_path'] = $this->config->item('upload_path').'news/'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //Allowing types
            $config['encrypt_name'] = TRUE; //encrypt file name 
    
            $this->upload->initialize($config);
            if(!empty($_FILES['image']['name'])){
     
                if ($this->upload->do_upload('image')){
     
                    $data   = $this->upload->data();
                    $image  = $data['file_name']; //get file name

                    /*$this->load->library('image_lib');                    
                    $config1['image_library']   = 'gd2';
                    $config1['source_image']    = $config['upload_path'].''.$data['file_name'];
                    $config1['create_thumb']    = FALSE;
                    $config1['maintain_ratio']  = FALSE;
                    $config1['width']           = 320;
                    $config1['height']          = 240;

                    $this->image_lib->clear();
                    $this->image_lib->initialize($config1);
                    $this->image_lib->resize();*/
                    $flag = true;
                    if($id!=0){
                        unlink($config['upload_path'].''.$oldimage);                    
                    }
                    
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
                $data = array(
                    'title'         => $title,
                    'image'         => $image,
                    'description'   => $description,
                    'event_date'    => $event_date,
                    'link'          => $link,
                );
                $result = $this->latest->save_data($data, $id);
                // echo "Upload Successful";
                $this->response([
                    'status'   => $result['status'],
                    'validate' => TRUE,
                    'message'  => $result['msg'],
                ], REST_Controller::HTTP_OK);

            }

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

    public function index_get($id = '') {
        //returns all rows if the id parameter doesn't exist,
        //otherwise single row will be returned
        $this->latest->_condition['deleted'] = 0;
        if($id){
            $this->latest->_condition['id'] = $id;
        }
        $result = $this->latest->getRows();
        // print $this->db->last_query();
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

    public function news_delete($id){
        // echo 'ID '.$id;exit;
        //check whether post id is not empty
        if($id){
            //delete post
            $this->latest->_condition['id'] = $id;
            $delete = $this->latest->delete(FALSE,$id);
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