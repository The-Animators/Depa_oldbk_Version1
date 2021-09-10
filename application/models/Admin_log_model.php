<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Admin_log_model extends MY_Model
{

    public $table;
    public $_primary_key;
    public $_condition;
    public function __construct() {
        parent::__construct();
        $this->table = 'master_admin_log';
        $this->_primary_key = 'id';
        $this->_condition = array();
    }    

    public function save_log($data){
        $this->db->insert($this->table, $data);
        return array('msg' => 'Log Succesfully', 'status' => true, 'success' => true);
    }
}