<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Gallery_video_model extends MY_Model
{
    private $title;
    public $table;
    public $_primary_key;
    public $_condition;
    public function __construct() {
        parent::__construct();
        $this->table = 'master_videogallery';
        $this->_primary_key = 'id';
        $this->_condition = array();
        $this->title = 'Video Gallery';
    }


    public function save_data($data, $id){
        $checkexist = $this->checkexist($id);
        if($checkexist > 0){
            return array('msg' => 'Title Already Exists ', 'status' => false);
        }else{
            $gallery_detail = array();
            if($id == 0){
                $this->db->trans_begin();
                $this->db->insert($this->table,$data);
                $last_id = $this->db->insert_id();

                $this->db->trans_complete();
                if ($this->db->trans_status() === FALSE){
                    $this->db->trans_rollback();
                    return array("status" => false, "msg" => "Error On Adding ".$this->title);
                } else{
                    $this->db->trans_commit();
                    return array("status" => true, "msg" => $this->title." Successfully Added!");
                }
         
            }else{
                $this->db->trans_begin();

                $this->db->where('id' , $id);
                $this->db->update($this->table , $data);
                
                $this->db->trans_complete();
                if ($this->db->trans_status() === FALSE){
                    $this->db->trans_rollback();
                    return array("status" => false, "msg" => "Error On Updating ".$this->title);
                } else{
                    $this->db->trans_commit();
                    return array("status" => true, "msg" => $this->title." Successfully Updated!");
                }
            }
        }
    }
    
    public function getid($slug){
        $this->db->select('id')->from($this->table)->where('deleted', 0);
        $query = $this->db->get();
        return $query->row();
    }

    public function getall(){
        $this->db->select('*')->from($this->table)->where('deleted', 0);
        $query = $this->db->get();
        $rtn = $query->result_array();
        return $rtn;
    }

    private function checkexist($id){
        if(isset($this->_condition) && !empty($this->_condition)){
            $this->db->select('*');
            $this->db->from($this->table);
            $this->db->where($this->_condition);
            if($id > 0){
                $this->db->where($this->_primary_key.'!=',$id);
            }
            $query = $this->db->get();
            // print $this->db->last_query();
            return $query->num_rows();
        }else{
            return 0;
        }
    }
}