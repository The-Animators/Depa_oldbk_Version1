<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Help_us_model extends MY_Model
{

    public $table;
    public $_primary_key;
    public $_condition;
    public function __construct() {
        parent::__construct();
        $this->table = 'master_help_us';
        $this->_primary_key = 'id';
        $this->_condition = array();
    }    

    public function savedata($master, $image, $id){

        $this->db->trans_begin();

        /*if($id == 0){
            $this->db->insert($this->table, $master);
            return array('msg' => 'Ticket Generated Succesfully', 'status' => true, 'success' => true);
        }*/

        if($id == 0){
            $this->db->insert($this->table, $master);
            $hid = $this->db->insert_id();
        }else{
            $this->db->where('id',$id);
            $this->db->update($this->table, $master);
            $hid = $id;
        }
        $batch = array();
        $count = count($image);
        if($count > 0){
            foreach ($image as $row) {
                $batch[] = array(
                    'hid'   => $hid,
                    'image' => $row['file_name']
                );
            }
            $this->db->insert_batch('map_helpus_image', $batch);
        }

        if ($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            $result = array('msg' => 'Error On Adding Help Us', 'status' => false, 'success' => false);
        } else{
            $this->db->trans_commit();
            $result = array('msg' => 'Help Us Successfully Save', 'status' => true, 'success' => true);
        }  
        return $result;

    }

    public function help_us_list($id){
        $rtn = array();
        $this->db->select('*');
        $this->db->from('master_help_us');
        $this->db->where('family_no', $id);
        $this->db->where('deleted', 0);
        $query = $this->db->get();
        $get_dlist = $query->result_array();

        $rtn['help_us_list']=$get_dlist;

        return $rtn;
    }

    public function getpendinglist() {
        $return = array();
        $this->db->select('*');
        $this->db->from('master_help_us');
        $this->db->where('deleted', 0);
        $this->db->where('status', 0);
        $query = $this->db->get();
        $return = $query->result_array();

        return $return;
    }

    public function getapprovedlist() {
        $return = array();
        $this->db->select('*');
        $this->db->from('master_help_us');
        $this->db->where('deleted', 0);
        $this->db->where('status', 1);
        $query = $this->db->get();
        $return = $query->result_array();

        return $return;
    } 

    public function getlist() {
        $return = array();
        $this->db->select('*');
        $this->db->from('master_help_us');
        $this->db->where('deleted', 0);
        $query = $this->db->get();
        $return = $query->result_array();

        return $return;
    } 
    
    public function getListWithImage() {
        $return = array();
        $this->db->select('mhs.*, mhi.*');
        $this->db->from('master_help_us mhs');
        $this->db->join('map_helpus_image mhi', 'mhs.id = mhi.hid', 'left');
        //$this->db->join('master_surname ms' ,' fm.surname_id = ms.id','left');
        $this->db->where('mhs.deleted', 0);
        $query = $this->db->get();
        $return = $query->result_array();

        return $return;
    }
    

    public function approved($id){
        $this->db->where('id', $id);
        $this->db->update($this->table, array('status' => 1));
        $error = $this->db->error();
        if($error['code'] == 0){
            return array('msg' => 'Help Us Succesfully Approved', 'status' => true);
        }else{
            return array('msg' => 'Error On Approving Help Us', 'status' => false);
        }
    }

    public function reject($id){
        $this->db->where('id', $id);
        $this->db->update($this->table, array('status' => 2));
        $error = $this->db->error();
        if($error['code'] == 0){
            return array('msg' => 'Help Us Succesfully Rejected', 'status' => true);
        }else{
            return array('msg' => 'Error On Rejecting Help Us', 'status' => false);
        }
    }

    public function getbyid($id) {
       
        $this->db->select('*');
        $this->db->from('master_help_us');
        $this->db->where('id', $id);
        $this->db->where('status', 1);
        $this->db->where('deleted', 0);

        // if($this->_condition){
        //     $this->db->where($this->_condition);
        // }
        
        $query = $this->db->get();
        $help_data = $query->result_array();
        
        if(count($help_data) > 0){
            $this->db->select('*');
            $this->db->from('map_helpus_image');
            $this->db->where('deleted', 0);
            $this->db->where('hid', $help_data[0]['id']);
            $query2 = $this->db->get();
            $help_image = $query2->result_array();
        }else{
            $help_image = array();
        }

        $data['help_data'] = $help_data;
        $data['help_image']  = $help_image;
        $data['status']  = TRUE;
        return $data;
    }   


    public function api_getimgbyid($id) {
        $help_image = array();
        $this->db->select('image');
        $this->db->from('map_helpus_image');
        $this->db->where('deleted', 0);
        $this->db->where('hid', $id);
        $query2 = $this->db->get();
        $help_image = $query2->result_array();
        return $help_image;
    }  
    
    public function api_getmylistbyid($id) {
        $help_data = array();
        $this->db->select('*');
        $this->db->from('master_help_us');
        $this->db->where('family_no', $id);
        $this->db->where('deleted', 0);
        $query = $this->db->get();
        $help_data = $query->result_array();
        return $help_data;
    }   



}