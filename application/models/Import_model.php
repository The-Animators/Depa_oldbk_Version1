<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Import_model extends MY_Model
{

    public function __construct() {
        parent::__construct();
        $this->table = 'family_member';
        $this->_primary_key = 'id';
        $this->_condition = array();
        $this->title = 'Family';
    }    

    public function GetFilename(){
        $this->db->select('id, member_no,image');
        $this->db->from($this->table);
        $this->db->where("image != 'noimage.jpg' AND image != ''");
        $query = $this->db->get();
        // print $this->db->last_query();
        
        return $query->result_array();


    }

    public function save_data($data){
        $result         = array();
        $cnt = 0;
        $this->db->trans_begin();
        foreach ($data as $family) {
            $this->db->insert('family_master',$family['family_master']);
            $f_id = $this->db->insert_id();
            $family_member              = $family['family_member'];
            foreach ($family_member as $family_m) {
                $family_m['family_id'] = $f_id;
                $this->db->insert('family_member',$family_m);
            }
            $family_business            = $family['family_business'];
            foreach ($family_business as $family_b) {
                $family_b['family_id'] = $f_id;
                $this->db->insert('family_business',$family_b);
                $f_b_id = $this->db->insert_id();
            }

            $family_business_contact    = $family['family_business_contact'];
            foreach ($family_business_contact as $family_b_c) {
                $family_b_c['family_business_id'] = $f_b_id;
                $this->db->insert('family_business_contact',$family_b_c);
            }

            $family_contact             = $family['family_contact'];
            foreach ($family_contact as $family_c) {
                $family_c['family_id'] = $f_id;
                $this->db->insert('family_contact',$family_c);
            }

            $family_marriage            = $family['family_marriage'];
            foreach ($family_marriage as $family_m) {
                $family_m['family_id'] = $f_id;
                $this->db->insert('family_marriage',$family_m);
            }
            $cnt++;
        }
        if($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            $result = array("status" => false,"msg" => "Error While Importing Member Data!");
        }else{
            $this->db->trans_commit();
            $result= array("status" => true, "msg" => "<b>".$cnt."</b> Family Added Successfully! ");
        }       
        return $result;
    }
}