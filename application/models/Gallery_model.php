<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Gallery_model extends MY_Model
{
    private $title;
    public $table;
    public $_primary_key;
    public $_condition;
    public function __construct() {
        parent::__construct();
        $this->table = 'master_gallery';
        $this->_primary_key = 'id';
        $this->_condition = array();
        $this->title = 'Gallery';
    }    

    public function deleteall($mainid){ 
        $this->db->select('*')->from('gallery_image')->where('gal_id',$mainid);
        $query  = $this->db->get();
        $result = $query->result_array();
        if(count($result) > 0){
            foreach ($result as $row) {
                $filename = FCPATH."uploads/gallery/".$row['image'];
                if (file_exists($filename)) {
                    unlink($filename);
                }
            }
            $this->db->where('gal_id', $mainid);
            $this->db->delete('gallery_image');
            // print $this->db->last_query();
            $error = $this->db->error();
            if($error['code'] == 0){
                return array("status" => TRUE, "msg" => $this->title." Successfully Deleted ");
            }else{
                return array("status" => TRUE, "msg" => "Error On Deleting ".$this->title);
            }
        }

    }

    public function save_data($data, $gallery, $id){
        $checkexist = $this->checkexist($id);
        if($checkexist > 0){
            return array('msg' => 'Title Already Exists ', 'status' => false);
        }else{
            $gallery_detail = array();
            if($id == 0){
                $this->db->trans_begin();
                $this->db->insert($this->table,$data);
                $last_id = $this->db->insert_id();

                if(count($gallery) > 0){
                    for ($i = 0; $i < count($gallery); $i++) {
                        $gallery_detail[] = array('gal_id' => $last_id, 'image' => $gallery[$i]);
                    }
                    // print_r($gallery_detail);
                    $this->db->insert_batch('gallery_image',$gallery_detail);
                }
                // print $this->db->last_query();
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
                if(count($gallery) > 0){
                    for ($i = 0; $i < count($gallery); $i++) {
                        $gallery_detail[] = array('gal_id' => $id, 'image' => $gallery[$i]);
                    }
                    // print_r($gallery_detail);
                    $this->db->insert_batch('gallery_image',$gallery_detail);
                }
                // print $this->db->last_query();
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
        $this->db->select('id')->from($this->table)->where('slug', $slug)->where('deleted',0);
        $query = $this->db->get();
        return $query->row();
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
    
    public function getSingleThumb($slug){
        $this->db->select('*')->from($this->table)->where('slug', $slug)->where('deleted',0);
        $query = $this->db->get();
        return $query->row();
    }
    
}