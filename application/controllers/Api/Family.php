<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . './libraries/REST_Controller.php';

class Family extends REST_Controller{
    private $title;
    public function __construct(){
        parent::__construct();
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->load->library('upload');
        // $this->load->model('member_model' ,'member');
        $this->load->model('family_model' ,'family');
        $this->title = 'Family';
    }

    /*
    1.  HTTP_OK
    2.  HTTP_BAD_REQUEST
    2.  HTTP_NOT_FOUND
    */


    public function index_get($id = '') {
        //returns all rows if the id parameter doesn't exist,
        //otherwise single row will be returned
        // $this->family->_condition['fm.deleted'] = 0;
        // if($id){
        //     $this->family->_condition['fm.id'] = $id;
        // }
        // $result = $this->family->get();
        $result = $this->family->familydetails($id);
        // print $this->db->last_query();
        //check if the user data exists
        if(!empty($result)){
            $data['status'] = TRUE;
            $data['data']   = array($result);
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
    
    public function api_getmembers_get($id = '') {
        
        $result = $this->family->api_familydetails($id);
        
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

    public function getHead_get() {
        $result = $this->family->getHead();
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


    public function getPerson_get($id = '') {
        $result = $this->family->getPerson($id);
        // print_r($result);
        // die();
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

    public function addmember_post(){
        // echo "<pre>";
        // print_r($_POST);
        // print_r($_FILES);
        // exit();
    }

    public function head_post(){
        $file_name    = '';
        $logoupload   = true;
        $extension    = '';
        $newfilename  = '';
        $data         = array('status' => false, 'validate' => false, 'message' => array());        
        $pst['post']  = $_POST;
        $pst['files'] = $_FILES;

        WriteLog($pst);
        // echo "<pre>";
        // print_r($_POST);
        // print_r($_FILES);
        // exit();

        $upload_path       = $this->config->item('upload_path');
        $this->upload_path = $upload_path."members/";
        $family_id         = $this->input->post('family_id') ?? 0;
        $this->form_validation->set_rules('family_id', 'Family ID', 'trim|numeric|required');
        if($family_id == 0){
            $this->form_validation->set_rules('address_1', 'Address', 'trim|required');
            $this->form_validation->set_rules('area_id', 'Area', 'trim|numeric|required');
            $this->form_validation->set_rules('pincode', 'Pincode', 'trim|numeric|required');
        }

        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
        $this->form_validation->set_rules('second_name', 'Second Name', 'trim|required');
        //$this->form_validation->set_rules('third_name', 'Third Name', 'trim|required');
        $this->form_validation->set_rules('surname', 'Surname', 'trim|numeric|required');
        $this->form_validation->set_rules('gender', 'Gender', 'trim|required');
        $this->form_validation->set_rules('relation', 'Relation', 'trim|numeric|required');
        //$this->form_validation->set_rules('education', 'Education', 'trim|required');
        $this->form_validation->set_rules('blood', 'Blood Group', 'trim|numeric|required');
        //$this->form_validation->set_rules('occupation', 'Occupation', 'trim|numeric|required');
        $this->form_validation->set_rules('contact', 'Contact', 'trim|numeric|required');
        $this->form_validation->set_rules('dob', 'Date Of Birth', 'trim|required');
        //$this->form_validation->set_rules('dharmik', 'Dharmik Knowledge', 'trim|numeric|required');
        //$this->form_validation->set_rules('sports', 'Sports', 'trim|required');
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_message('required', 'Enter Or Select %s');

        $family_marriage = array();
        $family_business = array();
        $member_id       = $this->input->post('member_id') ?? 0 ;

        $memberdata['life_insurance_text']    = '' ;
        $memberdata['medical_insurance_text'] = '' ;
        $memberdata['sanjeevni']              = 0 ;
        $memberdata['life_insurance']         = $this->input->post('life_insurance') ?? 0 ;
        $memberdata['medical_insurance']      = $this->input->post('medical_insurance') ?? 0 ;
        
        if($memberdata['life_insurance'] == 1){
            $memberdata['life_insurance_text']    = $this->input->post('life_insurance_text') ?? '' ;

        }
        if($memberdata['medical_insurance'] == 1){
            $memberdata['sanjeevni']                = $this->input->post('sanjeevni') ?? 0 ;
            if($memberdata['sanjeevni'] == 0){
                $memberdata['medical_insurance_text']   = $this->input->post('medical_insurance_text') ?? '' ;
            }
        }

        if ($this->form_validation->run()) {
            
            if($this->input->post('m_type') !='' && ($this->input->post('marriage_type') > 2 && $this->input->post('marriage_type') < 6) && $this->input->post('gender') == 'F'){

                $family_marriage['first_name']  = $this->input->post('first_name');
                $family_marriage['second_name'] = $this->input->post('m_secondname');
                $family_marriage['third_name']  = $this->input->post('m_thirdname');
                $family_marriage['surname']     = $this->input->post('m_surname');
                $family_marriage['village']     = $this->input->post('m_village');
                $family_marriage['address']     = $this->input->post('m_address');
                $family_marriage['type']        = $this->input->post('m_type');
                $family_marriage['contact']     = $this->input->post('m_contact');
                $family_marriage['email']       = $this->input->post('m_email');
            }
 if($family_id == 0){
            $family_master  = array(
                'address_1' => $this->input->post('address_1'),
                'area_id'   => $this->input->post('area_id'),
                'pincode'   => $this->input->post('pincode'),
                'landline'  => $this->input->post('landline'),
                'email'     => $this->input->post('f_email')
            );
}else{
     $family_master  = array('email'     => $this->input->post('f_email'));
}
            $memberdata['member_no']            = $this->input->post('member_no');
            $memberdata['first_name']           = $this->input->post('first_name');
            $memberdata['second_name']          = $this->input->post('second_name');
            $memberdata['third_name']           = $this->input->post('third_name');
            $memberdata['sex']                  = $this->input->post('gender');
            $memberdata['surname_id']           = $this->input->post('surname');
            $memberdata['blood_id']             = $this->input->post('blood');
            $memberdata['relation_id']          = $this->input->post('relation');
            $memberdata['marriage_type']        = $this->input->post('marriage_type');
            $memberdata['education_id']         = $this->input->post('education');
            $memberdata['occupation_id']        = $this->input->post('occupation');
            $memberdata['dob']                  = $this->input->post('dob');
            $memberdata['live_type']            = 'Live';
            $family_no                          = $this->input->post('family_no');
            if($this->input->post('dom') != ''){
                $memberdata['dom']              = $this->input->post('dom');
            }
            if($this->input->post('live_type') != 'Live'){
                $memberdata['dod']             = $this->input->post('dod');
            }
            // $memberdata['family_id']            = $family_id;
            $memberdata['contact']              = $this->input->post('contact');
            $memberdata['email']                = $this->input->post('email');
            $memberdata['member_type']          = $this->input->post('member_type');
            $memberdata['medical_insurance']    = $this->input->post('medical_insurance');
            $memberdata['achivements']          = $this->input->post('achivements');

            $memberdata['sports_id']            = $this->input->post('sports');
            $memberdata['dharmik_id']           = $this->input->post('dharmik');
            $memberdata['fm_status']           = 1;
            
            if($_FILES['photo_file'] && $_FILES['photo_file']['size'] > 0){
                // echo "Calling upload_web for logo<br>\n";
                $extension = pathinfo($_FILES['photo_file']["name"], PATHINFO_EXTENSION);
                $file_name = time().'.'.$extension;
                // upload_image($file_name ='', $path ='', $img ='', $type='') 
                $rtn = $this->upload_web($file_name,'members','photo_file', 'jpg|png|jpeg');
                if($rtn['status'] == true){
                    $memberdata['image']     = $rtn['filename'];
                }else{
                    $logoupload         = false;
                    $data['status']     = false;
                    $data['validate']   = true;
                    $data['message']    = $rtn['filename'];
                    echo json_encode($data);
                    exit();
                }
            }
            
            $result  = $this->family->addHead($family_master, $memberdata, $family_marriage, $member_id, $family_id, $family_no);
            $newfilename = $_SERVER['DOCUMENT_ROOT']."/uploads/members/".$file_name;
            if($result['status'] == false){
                if (file_exists($filename)) {
                    unlink($filename);
                } 
            }else{
                if($extension)
                    rename(FCPATH.'uploads/members/'.$file_name, FCPATH.'uploads/members/'.$result['memberno'].'.'.$extension);
            }
            // print_r($result);
            $data['status']     = $result['status'];
            $data['validate']   = TRUE;
            $data['message']    = $result['msg'];
            $this->response($data, REST_Controller::HTTP_OK);
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


    // upload_web($file_name,'members','photo_file', 'jpg|png|jpeg')
    public function upload_web($file_name='', $what='',$img ='', $type=''){
        // echo 'file_name: '.$file_name;
        // echo 'what: '.$what;
        // echo 'img: '.$img;
        // echo 'type: '.$type;
        $config    = array();
        $extension = pathinfo($_FILES[$img]["name"], PATHINFO_EXTENSION);
        $config['upload_path']   = $this->upload_path;
        // if($what != 'video')
        $config['allowed_types'] = $type;
        $config['overwrite']     = false;
        $config['encrypt_name']  = false;
        $config['remove_spaces'] = true;
        $config['file_name']     = $file_name;
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
            $rtn      = array('filename'=>$filename, 'status'=>false);
        }
        unset($config);
        return $rtn;
    }

    public function index_delete($id){
        // echo 'ID '.$id;exit;
        //check whether post id is not empty
        if($id){
            $family_member['deleted']           = 1;
            $family_member['deleted_on']        = date('Y-m-d H:i:s');

            $result             = $this->family->updatedelete($family_member,$id);
            $data['status']     = $result['status'];
            $data['validate']   = TRUE;
            $data['message']    = $result['msg'];
            $this->response($data, REST_Controller::HTTP_OK);
            
        }else{
            //set the response and exit
            $this->response([
                'status' => FALSE,
                'message' => 'No '.$this->title.' were found.'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    } 

}