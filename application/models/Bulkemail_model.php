<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Bulkemail_model extends MY_Model
{

    public $table;
    public $_primary_key;
    public $_condition;
    public function __construct() {
        parent::__construct();
        $this->table = 'master_bulk_email';
        $this->_primary_key = 'id';
        $this->_condition = array();
    }    

    public function save_email($data, $id){
        if($id == 0){
            $this->db->insert($this->table, $data);
            return array('msg' => 'Email Added Succesfully', 'status' => true, 'success' => true);
        }
    }

}