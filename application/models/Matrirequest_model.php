<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Matrirequest_model extends MY_Model
{

    public $table;
    public $_primary_key;
    public $_condition;
    public function __construct() {
        parent::__construct();
        $this->table = 'matrimonial_requests';
        $this->_primary_key = 'id';
        $this->_condition = array();
    }   


    public function savedata($data, $id){
        if($id == 0){
            $this->db->insert($this->table, $data);
            return array('msg' => 'Request Sent Succesfully', 'status' => true, 'success' => true);
        }
    }

    public function get_list(){
        $rtn = array();

        $this->db->select('*');
        $this->db->from('matrimonial_requests');
        $this->db->where('deleted', 0);
        $query = $this->db->get();
        $rtn = $query->result_array();
        return $rtn;
    }

    public function approved($id){
        $this->db->where('id', $id);
        $this->db->update($this->table, array('status' => 1));
        $error = $this->db->error();
        if($error['code'] == 0){
            return array('msg' => 'Request Succesfully Sent (Approved)', 'status' => true);
        }else{
            return array('msg' => 'Error On Approving Request', 'status' => false);
        }
    }

    public function reject($id){
        $this->db->where('id', $id);
        $this->db->update($this->table, array('status' => 2));
        $error = $this->db->error();
        if($error['code'] == 0){
            return array('msg' => 'Request Succesfully (Cancelled) Rejected', 'status' => true);
        }else{
            return array('msg' => 'Error On Rejecting Request', 'status' => false);
        }
    }
    

}