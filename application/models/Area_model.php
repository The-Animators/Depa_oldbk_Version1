<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Area_model extends MY_Model
{

    public $table;
    public $_primary_key;
    public $_condition;
    public function __construct() {
        parent::__construct();
        $this->table = 'master_area';
        $this->_primary_key = 'id';
        $this->_condition = array();
    }    
    
    public function getAreaName($id = ''){
        $rtn = array();
        $this->db->select('*');
        $this->db->from('master_area');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query;
    }
    
    public function getAreaId($id = ''){
        //$rtn = array();
        $this->db->select('id');
        $this->db->from('master_area');
        $this->db->where('area', $id);
        $rtn = $this->db->get();
        return $rtn->result_array();
    }
    
}