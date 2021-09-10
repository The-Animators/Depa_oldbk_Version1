<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Marannondh_model extends MY_Model
{
    public $table;
    public $_primary_key;
    public $_condition;
    public function __construct() {
        parent::__construct();
        $this->table = 'maran_nondh';
        $this->_primary_key = 'id';
        $this->_condition = array();
    }

    public function save_marannond($data, $id){
        if($id == 0){
            $this->db->insert($this->table,$data);
            return array('msg' => 'MaranNondh Added Succesfully', 'status' => true, 'success' => true);
        }else{
            $this->db->where('id' , $id);
            $this->db->update($this->table , $data);
            return array('msg' => 'MaranNondh Updated Succesfully', 'status' => true, 'success' => true);
        }
    }
    
    public function getMaranMembers($fid = ''){

        $family = array();
        $this->db->select('*');
        $this->db->from('maran_nondh');
        $this->db->where('family_person', $fid);
        $query = $this->db->get();
        $family = $query->result_array();
        return $family;

    }

}
