<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Users_model extends Crud_model
{

    private $id;
    private $table;
    public function __construct() {
        parent::__construct();
        $this->table = 'master_users';
        $this->id = $this->session->userdata('user_id');
        $this->load->library('bcrypt'); 
        parent::__construct($this->table);
        // $log_type = "", $log_type_title_key = "", $log_for = "", $log_for_key = 0, $log_for2 = "", $log_for_key2 = 0
        parent::init_activity_log("users", "title", "users", "id");       
    }
    public function schema() {
        return array(
            "id" => array(
                "label" => "id",
                "type" => "int"
            ),
            "full_name" => array(
                "label" => "Full Name",
                "type" => "varchar"
            ),
            "email" => array(
                "label" => "Email",
                "type" => "varchar"
            ),
            "contact_no" => array(
                "label" => "Contact Number",
                "type" => "varchar"
            ),
            
            "user_type" => array(
                "label" => "User Type",
                "type" => "varchar"
            ),
            "activated" => array(
                "label" => "Activated",
                "type" => "tinyint"
            ),
            "deleted" => array(
                "label" => "Deleted",
                "type" => "tinyint"
            ),
            "added_by" => array(
                "label" => "Created by",
                "type" => "int"
            ),
            "added_on" => array(
                "label" => "Created On",
                "type" => "timestamp"
            ),
            "ip" => array(
                "label" => "Ip Address",
                "type" => "varchar"
            ),
        );
    }

    public function newuser($data, $id){
        $data['id']  = $id;
        $chekisexist = $this->isexist($data, $id);
        if($chekisexist == 0){
            if($id == 0){
                $this->db->trans_begin();
                $logid = $this->saveActivity($data, $id, 'user','created');
                $this->db->insert($this->table,$data);

                $ins_userid = $this->db->insert_id();;

                $this->db->where('id',$logid);
                $this->db->set('changes', 'CONCAT(changes,\',\',\''.$ins_userid.'\')', FALSE);
                $this->db->update('master_activity');

                if ($this->db->trans_status() === FALSE){
                    $this->db->trans_rollback();
                    $result = array('msg' => 'Error On Adding User', 'status' => true, 'success' => false);
                } else{
                    $this->db->trans_commit();
                    $result = array('msg' => 'User Successfully Save', 'status' => true, 'success' => true);
                }
            }else{
                $this->db->trans_begin();
                $this->saveActivity($data, $id, 'user','updated');
                
                $this->db->where('id',$id);
                $this->db->update($this->table,$data);

                if ($this->db->trans_status() === FALSE){
                    $this->db->trans_rollback();
                    $result = array('msg' => 'Error On Updating User', 'status' => true, 'success' => false);
                } else{
                    $this->db->trans_commit();
                    $result = array('msg' => 'User Successfully Updated', 'status' => true, 'success' => true);
                }
            }
        }else{
            $result = array('msg' => 'User Already Exists!', 'status' => false, 'success' => true);
        }
        return $result;
    }

    private function isexist($data,$id){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where("(contact_no = ".$data['contact_no']." OR email = '".$data['email']."')");
        if($id > 0){
            $this->db->where('id != ',$id);
        }
        $result = $this->db->get();
        return $result->num_rows();
    }

    public function get(){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('deleted',0);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function getbyid($id){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('id',$id);
        $result = $this->db->get();
        return $result->row();
    }
    
    public function delete( $id){
        $this->db->where('id', $id);
        $this->db->update($this->table,array('deleted'=>1));

        $this->saveActivity('', $id, 'user','deleted');
        $error = $this->db->error();
        if($error['code']==0){
            $result = array('msg' => 'User Successfully Deleted', 'status' => true, 'success' => true);
        }else{
            $result = array('msg' => 'Error On Deleting User', 'status' => true, 'success' => false);
        }
        return $result;
    }

    public function changepassword($old_password, $password){
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
    }
}