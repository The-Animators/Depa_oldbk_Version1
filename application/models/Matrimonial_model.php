<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Matrimonial_model extends MY_Model
{

    public $table;
    public $_primary_key;
    public $_condition;
    public function __construct() {
        parent::__construct();
        $this->table = 'master_matrimonial';
        $this->_primary_key = 'matrimonial_id';
        $this->_condition = array();
    }   


    public function savedata($data, $id){
        if($id == 0){
            $this->db->insert($this->table, $data);
            return array('msg' => 'Member Added Succesfully', 'status' => true, 'success' => true);
        }
    }

    public function matrimonial_list($id){
        $rtn = array();

        $this->db->select('mm.*, fm.id, fm.member_no, CONCAT_WS(" ",fm.first_name, fm.second_name, fm.third_name, ms.surname) as fullname, fm.contact, fm.email, fm.image, fm.relation_id, fm.dod');
        $this->db->from('master_matrimonial mm');
        $this->db->join('family_member fm' ,' fm.member_no = mm.member_no','left');
        $this->db->join('master_surname ms' ,' fm.surname_id = ms.id','left');
        $this->db->where('mm.family_no', $id);
        $this->db->where('mm.deleted', 0);
        $query = $this->db->get();
        $rtn['matrimonial_list'] = $query->result_array();

        return $rtn;
    }
    
    public function api_matrimonial_list($id){
        $rtn = array();

        $this->db->select('mm.*, fm.id, fm.member_no, fm.dob, CONCAT_WS(" ",fm.first_name, fm.second_name, fm.third_name, ms.surname) as fullname, fm.contact, fm.email, fm.image, fm.relation_id, fm.dod, fm.education_id, fm.occupation_id, medu.education, mocp.occupation');
        $this->db->from('master_matrimonial mm');
        $this->db->join('family_member fm' ,' fm.member_no = mm.member_no','left');
        $this->db->join('master_surname ms' ,' fm.surname_id = ms.id','left');
        $this->db->join('master_education medu', 'medu.id = fm.education_id', 'left');
        $this->db->join('master_occupation mocp', 'mocp.id = fm.occupation_id', 'left');
        $this->db->where('mm.family_no', $id);
        $this->db->where('mm.deleted', 0);
        $this->db->order_by("mm.matrimonial_id", "desc");
        $rtn = $this->db->get()->result_array();
        return $rtn;
    }

    public function matrimonial_view($id){
        $rtn = array();

        $this->db->select('mm.*, fm.id, fm.member_no, CONCAT_WS(" ",fm.first_name, fm.second_name, fm.third_name, ms.surname) as fullname, fm.contact, fm.email, fm.image, fm.relation_id, fm.dod');
        $this->db->from('master_matrimonial mm');
        $this->db->join('family_member fm' ,' fm.member_no = mm.member_no','left');
        $this->db->join('master_surname ms' ,' fm.surname_id = ms.id','left');
        $this->db->where('mm.member_no', $id);
        $this->db->where('mm.deleted', 0);
        $query = $this->db->get();
        $rtn = $query->result_array();

        return $rtn;
    }

    public function matrimonial_all_list(){
        $rtn = array();

        $this->db->select('mm.*, fm.id, fm.member_no, CONCAT_WS(" ",fm.first_name, fm.second_name, fm.third_name, ms.surname) as fullname, fm.contact, fm.email, fm.image, fm.relation_id, fm.dod');
        $this->db->from('master_matrimonial mm');
        $this->db->join('family_member fm' ,' fm.member_no = mm.member_no','left');
        $this->db->join('master_surname ms' ,' fm.surname_id = ms.id','left');
        //$this->db->where('mm.family_no', $id);
        $this->db->where('mm.deleted', 0);
        $this->db->where('mm.status', 1);
        $query = $this->db->get();
        $rtn['matrimonial_list'] = $query->result_array();

        return $rtn;
    }
    
    public function api_matrimonial_all_list(){
        $rtn = array();
        
        $this->db->select('mm.*, fm.id, fm.member_no, fm.dob, CONCAT_WS(" ",fm.first_name, fm.second_name, fm.third_name, ms.surname) as fullname, fm.contact, fm.email, fm.image, fm.relation_id, fm.dod, fm.education_id, fm.occupation_id, medu.education, mocp.occupation');
        $this->db->from('master_matrimonial mm');
        $this->db->join('family_member fm' ,' fm.member_no = mm.member_no','left');
        $this->db->join('master_surname ms' ,' fm.surname_id = ms.id','left');
        $this->db->join('master_education medu', 'medu.id = fm.education_id', 'left');
        $this->db->join('master_occupation mocp', 'mocp.id = fm.occupation_id', 'left');
        
        $this->db->where('mm.deleted', 0);
        $this->db->where('mm.status', 1);
        $query = $this->db->get();
        $rtn = $query->result_array();

        return $rtn;
    }

    public function matrimonial_get_list(){
        $rtn = array();

        $this->db->select('mm.*, fm.id, fm.member_no, CONCAT_WS(" ",fm.first_name, fm.second_name, fm.third_name, ms.surname) as fullname, fm.contact, fm.email, fm.image, fm.relation_id, fm.dod');
        $this->db->from('master_matrimonial mm');
        $this->db->join('family_member fm' ,' fm.member_no = mm.member_no','left');
        $this->db->join('master_surname ms' ,' fm.surname_id = ms.id','left');
        //$this->db->where('mm.family_no', $id);
        $this->db->where('mm.deleted', 0);
        $query = $this->db->get();
        $rtn = $query->result_array();
        return $rtn;
    }

    //matrimonial_details
    public function matrimonial_details($id){
        $rtn = array();

        $this->db->select('mm.*, fm.id, fm.member_no, CONCAT_WS(" ",fm.first_name, fm.second_name, fm.third_name, ms.surname) as fullname, fm.*, medu.education, mocp.occupation');
        $this->db->from('master_matrimonial mm');
        $this->db->join('family_member fm' ,' fm.member_no = mm.member_no','left');
        $this->db->join('master_surname ms' ,' fm.surname_id = ms.id','left');
        $this->db->join('master_education medu', 'medu.id = fm.education_id', 'left');
        $this->db->join('master_occupation mocp', 'mocp.id = fm.occupation_id', 'left');
        $this->db->where('mm.member_no',$id);
        $this->db->where('fm.deleted', 0);
        $rtn['matrimonial_data'] = $this->db->get()->row();

        return $rtn;
    }

    /*public function getpendinglist() {
        $return = array();
        $this->db->select('*');
        $this->db->from('master_matrimonial');
        $this->db->where('deleted', 0);
        $this->db->where('status', 0);
        $query = $this->db->get();
        $return = $query->result_array();

        return $return;
    }*/

    public function getpendinglist() {
        $return = array();
        
        $this->db->select('mm.*, fm.id, fm.member_no, CONCAT_WS(" ",fm.first_name, fm.second_name, fm.third_name, ms.surname) as fullname, fm.*');
        $this->db->from('master_matrimonial mm');
        $this->db->join('family_member fm' ,' fm.member_no = mm.member_no','left');
        $this->db->join('master_surname ms' ,' fm.surname_id = ms.id','left');
        $this->db->where('mm.deleted', 0);
        $this->db->where('mm.status', 0);
        
        $query = $this->db->get();
        $return = $query->result_array();

        return $return;
    }
    

    public function approved($id){
        $this->db->where('matrimonial_id', $id);
        $this->db->update($this->table, array('status' => 1));
        $error = $this->db->error();
        if($error['code'] == 0){
            return array('msg' => 'Matrimonial Succesfully Approved', 'status' => true);
        }else{
            return array('msg' => 'Error On Approving Matrimonial', 'status' => false);
        }
    }

    public function reject($id){
        $this->db->where('matrimonial_id', $id);
        $this->db->update($this->table, array('status' => 2));
        $error = $this->db->error();
        if($error['code'] == 0){
            return array('msg' => 'Matrimonial Succesfully Rejected', 'status' => true);
        }else{
            return array('msg' => 'Error On Rejecting Matrimonial', 'status' => false);
        }
    }
    

}