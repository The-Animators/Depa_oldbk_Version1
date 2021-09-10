<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Saadri_model extends MY_Model
{
    public $table;
    public $_primary_key;
    public $_condition;
    public function __construct() {
        parent::__construct();
        $this->table = 'saadri';
        $this->_primary_key = 'id';
        $this->_condition = array();
    }

    public function save_saadri($data, $id){
        if($id == 0){
            $this->db->insert($this->table,$data);
            return array('msg' => 'Saadri Added Succesfully', 'status' => true, 'success' => true);
        }else{
            $this->db->where('id' , $id);
            $this->db->update($this->table , $data);
            return array('msg' => 'Saadri Updated Succesfully', 'status' => true, 'success' => true);
        }
    }


    public function getSadriMembers($fid = ''){

        $family = array();
        $this->db->select('*');
        $this->db->from('saadri');
        $this->db->where('family_person', $fid);
        $query = $this->db->get();
        $family = $query->result_array();
        return $family;

    }


}
