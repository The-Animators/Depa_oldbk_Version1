<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Master_admin extends MY_Model
{

    public $table;
    public $_primary_key;
    public $_condition;
    public function __construct() {
        parent::__construct();
        $this->table = 'master_admin';
        $this->_primary_key = 'id';
        $this->_condition = array();
    }

    /*public function changepassword($old_password, $password){
        $this->db->where(array("id" => $this->id));
        $query = $this->db->get($this->table);
        // print $this->db->last_query();
        $row   = $query->row();
        $newpassword  = $this->bcrypt->hash_password($password);
        if($query->num_rows() === 1){
            $checkpassword = $this->checkpassword($old_password, $row->password);
            if($checkpassword == 1){
                $update = array('password' => $newpassword);

                $this->db->trans_begin();
                $this->db->where('id',$this->id);
                $this->db->update($this->table,$update);

                $this->saveActivity('', $this->id, 'user','changepassword');
                if ($this->db->trans_status() === FALSE){
                    $this->db->trans_rollback();
                    return array('msg' => 'Error on Changing Password','status' => true, 'success' => false);
                } else{
                    $this->db->trans_commit();
                    return array('msg' => 'Password Updated Succefully','status' => true, 'success' => true);
                }
                return array('msg' => 'Password Updated Succefully','status' => true, 'success' => true);
            }else{
                return array('msg' => 'Old Password Not Match','status' => false, 'success' => true);
            }
        }else{
            return array('msg' => 'No Record Found','status' => false, 'success' => true);
        }
    }   

    public function checkpassword($password, $stored_hash){
        if ($this->bcrypt->check_password($password, $stored_hash)) {
            return 1;
            // Password does match stored password.
        } else {
            return 0;
            // Password does not match stored password.
        }
    } */

    public function changepassword($old_password, $new_password, $userid){
        $this->db->where(array("id" => $userid));
        $query = $this->db->get($this->table);
        $row   = $query->row();
        $newpassword  = $this->bcrypt->hash_password($new_password);

        if($query->num_rows() === 1){
            $checkpassword = $this->checkpassword($old_password, $row->password);
            if($checkpassword == 1){
                $update = array('password' => $newpassword);
                $this->db->where('id' , $userid);
                $this->db->update($this->table , $update);
                return array('msg' => 'Password Updated Succefully', 'status' => true, 'success' => true);
            }else{
                return array('msg' => 'Old Password Not Match', 'status' => false, 'success' => true);
            }
        }else{
            return array('msg' => 'No Record Found', 'status' => false, 'success' => true);
        }

    }   

    public function checkpassword($password, $stored_hash){
        if ($this->bcrypt->check_password($password, $stored_hash)) {
            return 1;
        } else {
            return 0;
        }
    }


}