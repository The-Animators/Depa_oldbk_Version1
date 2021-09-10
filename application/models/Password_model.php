<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Password_model extends MY_Model
{
    public $table;
    public function __construct() {
        parent::__construct();
        $this->load->library('bcrypt');
        $this->table = 'master_admin';
    }


    public function changepassword($old_password,$new_password,$userid){
        $this->db->where(array("id" => $userid));
        $query = $this->db->get('family_member');
        $row   = $query->row();
        $newpassword  = $this->bcrypt->hash_password($new_password);
        
        if($query->num_rows() === 1){
            $checkpassword = $this->checkpassword($old_password, $row->password);
            if($checkpassword == 1){
                $update = array('password' => $newpassword);
                $this->db->where('id' , $userid);
                $this->db->update('family_member' , $update);
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
