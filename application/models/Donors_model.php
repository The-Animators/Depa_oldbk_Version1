<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Donors_model extends MY_Model
{

    public $table;
    public $_primary_key;
    public $_condition;
    public function __construct() {
        parent::__construct();
        $this->table = 'master_donors';
        $this->_primary_key = 'id';
        $this->_condition = array();
    }    

    public function save_donor($data, $id){
        if($id == 0){
            $this->db->insert($this->table,$data);
            return array('msg' => 'Donor Added Succesfully', 'status' => true, 'success' => true);
        }else{
            $this->db->where('id' , $id);
            $this->db->update($this->table , $data);
            return array('msg' => 'Donor Updated Succesfully', 'status' => true, 'success' => true);
        }
    }
}