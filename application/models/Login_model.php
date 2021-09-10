<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Login_model extends MY_Model
{
    public $table;
    public function __construct() {
        parent::__construct();
        $this->load->library('bcrypt');
        $this->table = 'master_admin';
    }

    public function adminLogin($username, $password){

        $query   = "SELECT * FROM $this->table WHERE email = ? ";       
        $runtwo  = $this->db->query($query, array($username));
        $row     = $runtwo->row();
        $numrows = $runtwo->num_rows();
        if ($numrows === 1) {
            if ($row->activated==1) {
                $checkpassword = $this->checkpassword($password, $row->password);
                
                if ($checkpassword == 1) {
                    $newdata = array(
                        'user_id'   => $row->id,
                        'logintype' => 'admin',
                        'user_name' => $row->username,
                        'full_name' => $row->full_name,
                        'logged_in' => true,
                    );
                    $this->session->set_userdata($newdata);
                    $data2['userid']    = $row->id;
                    $data2['ip']        = $this->input->ip_address();
                    $data2['logintype'] = 'admin';
                    $this->db->insert("master_log", $data2);
                    $result = array('msg' => 'Successfully Login!', 'status' => true, 'success' => true );
                } else {
                    $result = array('msg' => 'Incorrect Password!', 'status' => false, 'success' => true);
                }
            } else {
                $result = array('msg' => 'User Account Not Activated!', 'status' => false, 'success' => true);
            }
        } else {
            $result = array('msg' => 'No Record Found!', 'status' => false, 'success' => true);
        }
        return $result;
    }

    public function userLogin($username, $password, $client, $ip){

        $query   = "SELECT id,member_no,family_no,family_id,CONCAT_WS(' ', first_name, second_name, third_name) AS full_name, DATE_FORMAT(dob, '%d/%M/%Y') AS dob, DATE_FORMAT(dom, '%d/%M/%Y') AS dom, email, member_type, live_type, contact, password FROM family_member WHERE username = ? AND deleted = ? ";       
        $runtwo  = $this->db->query($query, array($username,0));
        // print $this->db->last_query();
        $row     = $runtwo->row();
        $numrows = $runtwo->num_rows();
        if ($numrows === 1) {
            // if ($row->activated==1) {
                $checkpassword = $this->checkpassword($password, $row->password);
                
                if ($checkpassword == 1) {
                    $newdata = array(
                        'user_id'   => $row->id,
                        'logintype' => 'normal',
                        'full_name' => $row->full_name,
                        'member_no' => $row->member_no,
                        'family_no' => $row->family_no,
                        'family_id' => $row->family_id,
                        'logged_in' => true,
                    );
                    $this->session->set_userdata($newdata);
                    $data2['userid']    = $row->id;
                    $data2['ip']        = $ip;
                    $data2['client']    = $client;
                    $data2['logintype'] = 'normal';
                    $this->db->insert("master_log", $data2);
                    unset($row->password);
                    $result = array('msg' => 'Successfully Login!', 'status' => true, 'success' => true , 'user' => $row);
                } else {
                    $result = array('msg' => 'Incorrect Password!', 'status' => false, 'success' => true, 'user' => '');
                }
           /* } else {
                $result = array('msg' => 'User Account Not Activated!', 'status' => false, 'success' => true, 'user' => '');
            }*/
        } else {
            $result = array('msg' => 'No Record Found!', 'status' => false, 'success' => true, 'user' => '');
        }
        return $result;
    }

    public function changepassword($old_password,$new_password,$userid){
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
