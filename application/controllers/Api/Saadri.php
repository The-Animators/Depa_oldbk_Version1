<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . './libraries/REST_Controller.php';

class Saadri extends REST_Controller{

    public function __construct(){
        parent::__construct();
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->load->model('saadri_model' ,'saadri');
        $this->load->model('admin_log_model' ,'adminlog');
        $this->load->library('upload'); //load library upload 
    }

    /*
    1.  HTTP_OK
    2.  HTTP_BAD_REQUEST
    2.  HTTP_NOT_FOUND
    */
    function save_post(){

        $data           = array('status' => false,'validate' => false, 'message' => array());

        $id             = $this->input->post('id');
        $person_name    = $this->input->post('person_name');
        $family_no      = $this->input->post('family_no');
        $family_id      = $this->input->post('family_id');
        $family_person  = $this->input->post('family_person');
        $date           = $this->input->post('mdate');
        $image          = $this->input->post('photo_file');
        $flag           = false;

        $this->form_validation->set_rules('family_id', 'Family Head', 'required|trim');
        $this->form_validation->set_rules('family_person', 'Family Death Person', 'required|trim');
        $this->form_validation->set_rules('mdate', 'End Date (Saadri)', 'required');
        
        
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_message('required', 'Enter %s');

        if ($this->form_validation->run()) {

            $config['upload_path']  = $this->config->item('upload_path').'saadri/'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //Allowing types
            $config['encrypt_name'] = TRUE; //encrypt file name 
    
            $this->upload->initialize($config);
            if(!empty($_FILES['photo_file']['name'])){
     
                if ($this->upload->do_upload('photo_file')){

                    $data   = $this->upload->data();
                    $image  = $data['file_name']; //get file name

                    $this->load->library('image_lib');                    
                    $config1['image_library'] = 'gd2';
                    $config1['source_image'] = $config['upload_path'].''.$data['file_name'];
                    $config1['create_thumb'] = FALSE;
                    $config1['maintain_ratio'] = TRUE;
                    $config1['width']     = 320;
                    // $config1['height']   = 240;

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
                        'message'  => "Image file is empty.",
                    ], REST_Controller::HTTP_OK);
                }else{
                    $flag = true;
                }
            }
            if($flag){
                $data = array(
                    'fullname' => $person_name,
                    'family_no' => $family_no,
                    'family_id' => $family_id, 
                    'family_person' => $family_person,
                    'date' => $date,
                    'image' => $image, 
                );
                $result = $this->saadri->save_saadri($data, $id);

                if($result['status']) {
                    $logdata = array(
                        'user_id' => $this->session->userdata('user_id'),
                        'user_name' => $this->session->userdata('user_name'), 
                        'type'    => 'saadri', 
                        'details' => 'New member as asaadri added',
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
        $this->saadri->_condition['deleted'] = 0;
        if($id){
            $this->saadri->_condition['id'] = $id;
        }
        $result = $this->saadri->getRows();
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

    public function Saadri_delete($id){
        
        if($id){
            
            // $this->saadri->_condition['id'] = $id;
            // $delete = $this->saadri->delete(FALSE,$id);
            
            //$this->load->model("saadri_model");
            $this->db->where('id', $id);
            $delete = $this->db->delete('saadri');
            
            if($delete){
                //set the response and exit
                $this->response([
                    'status' => TRUE,
                    'message' => 'Saadri has been removed successfully.'
                ], REST_Controller::HTTP_OK);
            }else{
                //set the response and exit
                $this->response("Some problems occurred, please try again.", REST_Controller::HTTP_BAD_REQUEST);
            }
        }else{
            //set the response and exit
            $this->response([
                'status' => FALSE,
                'message' => 'No Sadri were found.'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }


}