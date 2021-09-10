<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . './libraries/REST_Controller.php';

class Donors extends REST_Controller{

    public function __construct(){
        parent::__construct();
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->load->model('donors_model' ,'donors');
        $this->load->model('admin_log_model' ,'adminlog');
        $this->load->library('upload'); //load library upload 
    }

    /*
    1.  HTTP_OK
    2.  HTTP_BAD_REQUEST
    2.  HTTP_NOT_FOUND
    */
    function save_post(){

        $logdata  = array('status' => false,'validate' => false, 'message' => array());

        $data     = array('status' => false,'validate' => false, 'message' => array());

        $title    = $this->input->post('donor_title');
        $id       = $this->input->post('id');
        $image    = $this->input->post('old_image');
        $oldimage = $this->input->post('old_image');
        $flag     = false;
        $this->form_validation->set_rules('donor_title', 'Title', 'required|trim');
        $this->form_validation->set_rules('category', 'Category', 'required|trim');
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_message('required', 'Enter %s');
        if ($this->form_validation->run()) {

            $config['upload_path']  = $this->config->item('upload_path').'donors/'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //Allowing types
            $config['encrypt_name'] = TRUE; //encrypt file name 
    
            $this->upload->initialize($config);
            if(!empty($_FILES['donor_image']['name'])){
     
                if ($this->upload->do_upload('donor_image')){

                    $data   = $this->upload->data();
                    $image  = $data['file_name']; //get file name

                    $this->load->library('image_lib');                    
                    $config1['image_library'] = 'gd2';
                    $config1['source_image'] = $config['upload_path'].''.$data['file_name'];
                    $config1['create_thumb'] = FALSE;
                    $config1['maintain_ratio'] = FALSE;
                    $config1['width']     = 320;
                    $config1['height']   = 240;

                    $this->image_lib->clear();
                    $this->image_lib->initialize($config1);
                    $this->image_lib->resize();
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
                        'message'  => "XD Image file is empty.",
                    ], REST_Controller::HTTP_OK);
                }else{
                    $flag = true;
                }
            }
            if($flag){
                $data = array(
                    'donor_title' => $title,
                    'donor_image' => $image, 
                    'category'    => trim($this->post('category')), 
                );
                $result = $this->donors->save_donor($data, $id);

                if($result['status']) {
                    $logdata = array(
                        'user_id' => $this->session->userdata('user_id'),
                        'user_name' => $this->session->userdata('user_name'), 
                        'type'    => 'donor', 
                        'details' => 'New Donation Added = DATA: '.json_encode($data),
                        'date_time' => date('d-m-Y h:i:sA')
                    );
                    $this->adminlog->save_log($logdata);

                    $this->response([
                        'status'   => $result['status'],
                        'validate' => TRUE,
                        'message'  => $result['msg'],
                    ], REST_Controller::HTTP_OK);

                }else{

                    $this->response([
                        'status'   => TRUE,
                        'validate' => TRUE,
                        'message'  => 'Something went wrong',
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
        //returns all rows if the id parameter doesn't exist,
        //otherwise single row will be returned
        $this->donors->_condition['deleted'] = 0;
        if($id){
            $this->donors->_condition['id'] = $id;
        }
        $result = $this->donors->getRows();
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

    public function Donors_delete($id){
        // echo 'ID '.$id;exit;
        //check whether post id is not empty
        if($id){
            //delete post
            $this->donors->_condition['id'] = $id;
            $delete = $this->donors->delete(FALSE, $id);
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
    }


}