<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Bulksms_model extends MY_Model
{

    public $table;
    public $_primary_key;
    public $_condition;
    public function __construct() {
        parent::__construct();
        $this->table = 'master_bulk_sms';
        $this->_primary_key = 'id';
        $this->_condition = array();
    }    

    public function save_phone($data, $id){
        if($id == 0){
            $this->db->insert($this->table, $data);
            return array('msg' => 'SMS Added Succesfully', 'status' => true, 'success' => true);
        }
    }

    /*public function getEmails(){

        $family = array();
        $this->db->select('id');
        $this->db->from('family_member');
        $this->db->where('email !="" ');
        $query = $this->db->get();
        $family = $query->result_array();
        return $family;

    }*/

}