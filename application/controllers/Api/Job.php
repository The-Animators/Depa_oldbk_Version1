<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . './libraries/REST_Controller.php';

class Job extends REST_Controller{
    private $title;
    public function __construct(){
        parent::__construct();
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->load->model('job_model' ,'job');
        $this->title = 'Job';
    }

    /*
    1.  HTTP_OK
    2.  HTTP_BAD_REQUEST
    2.  HTTP_NOT_FOUND
    */
    
    public  function index_post(){
        
        $data   = array('status' => false, 'validate' => false, 'message' => array());
        $id     = $this->post('id') ?? 0;
        
        // print_r("OK: ".$id);
        // die();

        $this->form_validation->set_rules('firm_name', 'Enter Firm Name', 'required|trim');
        $this->form_validation->set_rules('designation', 'Enter Designation', 'required|trim');
        $this->form_validation->set_rules('contact_person', 'Enter Contact Person', 'required|trim');
        $this->form_validation->set_rules('contact_number', 'Enter Contact Number', 'required|trim|numeric|min_length[10]|max_length[10]');
        $this->form_validation->set_rules('contact_email', 'Enter Contact Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('start_date', 'Enter Start Date', 'required|trim');
        $this->form_validation->set_rules('end_date', 'Enter End Date', 'required|trim');
        $this->form_validation->set_rules('openings', 'Enter Number Of Openings', 'required|trim|numeric');
        $this->form_validation->set_rules('location', 'Enter Location', 'required|trim');
        $this->form_validation->set_rules('experience', 'Enter Experience', 'required|trim');
        $this->form_validation->set_rules('description', 'Enter Description', 'required|trim');
        if($id == 0){
            $this->form_validation->set_rules('client', 'Client Missing Missing', 'required|trim');
            $this->form_validation->set_rules('memberid', 'Member Missing', 'required|trim');
        }
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_message('required', ' %s');
        if ($this->form_validation->run()) {
            
            if($this->post('client') == "app"){
                $ip  = $this->post('ip') ?? 0;                
            }else{
                $ip  = $this->input->ip_address();                
            }
            //job_cancel_reason
            $master['can_reason']          = "";
            $master['firm_name']          = $this->post('firm_name');
            $master['designation']        = $this->post('designation');
            $master['contact_person']     = $this->post('contact_person');
            $master['contact_number']     = $this->post('contact_number');
            $master['contact_email']      = $this->post('contact_email');
            $master['salary_range_start'] = $this->post('salary_range_start');
            $master['salary_range_end']   = $this->post('salary_range_end');
            $master['openings']           = $this->post('openings');
            $master['location']           = $this->post('location');
            $master['experience']         = $this->post('experience');
            $master['description']        = $this->post('description');
            $master['status']             = $this->post('status') ?? 0;
            $master['start_date']         = $this->post('start_date');
            $master['end_date']           = $this->post('end_date');
            
            // $master['start_date']         = DateTime::createFromFormat('m/d/Y',$this->post('start_date'))->format('Y-m-d');
            // $master['end_date']           = DateTime::createFromFormat('m/d/Y',$this->post('end_date'))->format('Y-m-d');
            
            $uploaded_by                  = $this->post('uploaded_by') ?? '';
            if($uploaded_by != ''){
                $master['uploaded_by']    = $this->post('uploaded_by');
            }else{
                $master['uploaded_by']    = getFullname($this->post('memberid'));
            }
            if($id == 0){
                $master['client']       = $this->post('client');
                $master['memid']        = $this->post('memberid');
                $master['ip']           = $this->post('ip');
            }
            $result = $this->job->insert($master, $id);
            $this->response([
                'status'   => $result['status'],
                'validate' => TRUE,
                'message'  => $result['msg'],
            ], REST_Controller::HTTP_OK);
        } else {
            foreach ($this->input->post() as $key => $value) {
                $verror[$key] = form_error($key);
            }
            $ab = validation_errors();
            $this->response([
                'status'    => FALSE,
                'validate'  => FALSE,
                'message'   => $verror,
            ], REST_Controller::HTTP_OK);
        }
    }
    
    
    
    
    
    
    
    public  function update_post(){
        // print_r($_POST);exit;
        $data   = array('status' => false, 'validate' => false, 'message' => array());
        $id     = $this->post('id') ?? 0;
        
        // print_r("UPDATE OK: ".$id);
        // die();

        $this->form_validation->set_rules('firm_name', 'Enter Firm Name', 'required|trim');
        $this->form_validation->set_rules('designation', 'Enter Designation', 'required|trim');
        $this->form_validation->set_rules('contact_person', 'Enter Contact Person', 'required|trim');
        $this->form_validation->set_rules('contact_number', 'Enter Contact Number', 'required|trim|numeric|min_length[10]|max_length[10]');
        $this->form_validation->set_rules('contact_email', 'Enter Contact Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('start_date', 'Enter Start Date', 'required|trim');
        $this->form_validation->set_rules('end_date', 'Enter End Date', 'required|trim');
        $this->form_validation->set_rules('openings', 'Enter Number Of Openings', 'required|trim|numeric');
        $this->form_validation->set_rules('location', 'Enter Location', 'required|trim');
        $this->form_validation->set_rules('experience', 'Enter Experience', 'required|trim');
        $this->form_validation->set_rules('description', 'Enter Description', 'required|trim');
        if($id == 0){
            $this->form_validation->set_rules('client', 'Client Missing Missing', 'required|trim');
            $this->form_validation->set_rules('memberid', 'Memberid Missing', 'required|trim');
        }
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_message('required', ' %s');
        if ($this->form_validation->run()) {
            
            if($this->post('client') == "app"){
                $ip  = $this->post('ip') ?? 0;                
            }else{
                $ip  = $this->input->ip_address();                
            }
            //job_cancel_reason
            $master['can_reason']          = $this->post('job_cancel_reason');
            $master['firm_name']          = $this->post('firm_name');
            $master['designation']        = $this->post('designation');
            $master['contact_person']     = $this->post('contact_person');
            $master['contact_number']     = $this->post('contact_number');
            $master['contact_email']      = $this->post('contact_email');
            $master['salary_range_start'] = $this->post('salary_range_start');
            $master['salary_range_end']   = $this->post('salary_range_end');
            $master['openings']           = $this->post('openings');
            $master['location']           = $this->post('location');
            $master['experience']         = $this->post('experience');
            $master['description']        = $this->post('description');
            $master['status']             = $this->post('status') ?? 0;
            $master['start_date']         = $this->post('start_date');
            $master['end_date']           = $this->post('end_date');
            //$master['start_date']         = DateTime::createFromFormat('m/d/Y',$this->post('start_date'))->format('Y-m-d');
            //$master['end_date']           = DateTime::createFromFormat('m/d/Y',$this->post('end_date'))->format('Y-m-d');
            $uploaded_by                  = $this->post('uploaded_by') ?? '';
            if($uploaded_by != ''){
                $master['uploaded_by']    = $this->post('uploaded_by');
            }else{
                $master['uploaded_by']    = getFullname($this->post('memberid'));
            }
            if($id == 0){
                $master['client']       = $this->post('client');
                $master['memid']        = $this->post('memberid');
                $master['ip']           = $this->post('ip');
            }
           // print_r($master);exit();
            $result = $this->job->insert($master, $id);
            // print $this->db->last_query();
            // echo "Upload Successful";
            $this->response([
                'status'   => $result['status'],
                'validate' => TRUE,
                'message'  => $result['msg'],
            ], REST_Controller::HTTP_OK);
        } else {
            foreach ($this->input->post() as $key => $value) {
                $verror[$key] = form_error($key);
            }
            $ab = validation_errors();
            $this->response([
                'status'    => FALSE,
                'validate'  => FALSE,
                'message'   => $verror,
                // 'ab'   => $ab,
            ], REST_Controller::HTTP_OK);
        }
    }
    
    
    
    

    public function getjobbyid_get($jobid = '') {
        //returns all rows if the id parameter doesn't exist,
        //otherwise single row will be returned
        // $this->job->_condition['deleted'] = 0;
       
        $this->job->_condition['mj.deleted'] = 0;
        $this->job->_condition['mj.id']      = $jobid;
        $this->job->_condition['mj.status']  = 1;
       
        $result = $this->job->getJob();
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
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function index_get($jobstatus = '') {
        //returns all rows if the id parameter doesn't exist,
        //otherwise single row will be returned
        // $this->job->_condition['deleted'] = 0;
        
        if($jobstatus != ''){

            if($jobstatus == 'pending'){
                $jobstatus = 0;
                $this->job->_condition['status'] = $jobstatus;
                $result = $this->job->getUserJob($jobstatus);
            }else if($jobstatus == 'confirm'){
                $jobstatus = 1;
                $result = $this->job->getUserJob($jobstatus);
            }else if($jobstatus == 'reject'){
                $jobstatus = 2;
                $this->job->_condition['status'] = $jobstatus;
                $result = $this->job->getUserJob($jobstatus);
            }else if($jobstatus == 'all'){
                $result = $this->job->getJob();
            }
            
        }else{
            
            //$jobstatus = 0;
            
            //$today = date('Y-m-d');
            //$this->job->_condition['mj.end_date'] <= $today;
            //$this->job->_condition['status'] = 1;
            //$this->job->_condition['mj.deleted'] = 0;
            
            $result = $this->job->getJob();
        }
        //$today = date('Y-m-d');
        //$this->job->_condition['mj.end_date'] <= ''.$today;
        // $this->job->_condition['mj.deleted'] = 0;
        // $result = $this->job->getUserJob($jobstatus);
       
        //check if the user data exists
        if(!empty($result)){
            $data['status'] = TRUE;
            $data['data']   = $result;
            $data['message']= 'Record Found';
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

    public function index_delete($id){
        // echo 'ID '.$id;exit;
        //check whether post id is not empty
        if($id){
            //delete post
            // $this->job->_condition['id'] = $id;
            // $delete = $this->job->delete(FALSE, $id);
            
            $this->db->where("id", $id);
            $delete = $this->db->delete("master_job");
            
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