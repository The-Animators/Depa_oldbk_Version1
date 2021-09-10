<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Business_model extends MY_Model
{

    public $table;
    public $_primary_key;
    public $_condition;
    public function __construct() {
        parent::__construct();
        $this->table = 'master_b2b';
        $this->_primary_key = 'id';
        $this->_condition = array();
    }    

    public function details($id){
        $rtn = array();
        //Fetch Family Details
        // SELECT fb.*, fm.member_no FROM family_business fb left join family_member fm on fm.id = fb.member_id
        $this->db->select('id as member_id,member_no, family_id, family_no');
        $this->db->from('family_member');
        $this->db->where('id',$id);
        $query = $this->db->get();
        // print $this->db->last_query();
        $rtn['family'] = $query->result_array();


        $this->db->select('fb.*, fm.member_no, ma.area,fm.family_id, fm.family_no');
        $this->db->from('family_business fb');
        $this->db->join('family_member fm','fm.id = fb.member_id');
        $this->db->join('master_area ma','ma.id = fb.area_id');
        // $this->db->where('id',$id);
        $this->db->where('fb.member_id',$id);
        $query = $this->db->get();
        // print $this->db->last_query();
        $rtn['business'] = $query->result_array();
        return $rtn;
    }

    public function get() {
        $this->db->select('*');
        $this->db->from('family_business');

        if(!empty($this->_condition)){
            $this->db->where($this->_condition);
        }
       
        $query = $this->db->get();
        // echo $this->db->last_query();
        // exit;
        return $query->result_array();
    }   

}