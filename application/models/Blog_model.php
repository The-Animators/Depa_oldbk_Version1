<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Blog_model extends MY_Model
{

    public $table;
    public $_primary_key;
    public $_condition;
    private $title;
    public function __construct() {
        parent::__construct();
        $this->table        = 'master_blog';
        $this->_primary_key = 'id';
        $this->_condition   = array();
        $this->title        = 'Blog';
    }    

    public function saveData($master, $image, $id){
        $checkexist = $this->checkexist($id);
        if($checkexist > 0){
            $result = array('msg' => 'Title Already Exists ', 'status' => false);
        }else{
            $this->db->trans_begin();

            if($id == 0){
                $this->db->insert($this->table,$master);
                $bid = $this->db->insert_id();
            }else{
                $this->db->where('id',$id);
                $this->db->update($this->table,$master);
                $bid = $id;
            }

            if(count($image) > 0){
                $batch = array();
                foreach ($image as $row) {
                    # code...
                    $batch[] = array(
                        'bid'   => $bid,
                        'image' => $row['file_name']
                    );
                }
                $this->db->insert_batch('map_blog_img',$batch);
            }
            
            // print $this->db->last_query();

            if ($this->db->trans_status() === FALSE){
                $this->db->trans_rollback();
                $result = array('msg' => 'Error On Adding Blog', 'status' => false);
            } else{
                $this->db->trans_commit();
                $result = array('msg' => 'Blog Successfully Save', 'status' => true);
            }  
        }
        return $result;
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

    public function get($condition = array(), $orderby = '' , int $limit= 0) {

        $this->db->select('mb.id, mb.title, mb.slug,description, mb.uploaded_by, DATE_FORMAT(mb.added_on, "%e %b %Y") as added_on  ,
            (CASE
               WHEN mb.status = 0 THEN "Pending" 
               WHEN mb.status = 1 THEN "Approved"
               WHEN mb.status = 2 THEN "Reject"
            END) AS status,
            (select image from map_blog_img ib2b where ib2b.bid = mb.id limit 1) as image');
        $this->db->from('master_blog mb');
        

        if(!empty($this->_condition)){
            $this->db->where($this->_condition);
        }

        if($orderby){
            $this->db->order_by($orderby ,'DESC');            
        }

        if($limit > 0){
            $this->db->limit($limit);            
        }
        
        $query = $this->db->get();
        // print $this->db->last_query();exit();
        return $query->result_array();
    }
    
    public function getFooter() {

        $this->db->select('mb.id, mb.title, mb.slug,description, mb.uploaded_by, DATE_FORMAT(mb.added_on, "%e %b %Y") as added_on  ,
            (CASE
               WHEN mb.status = 0 THEN "Pending" 
               WHEN mb.status = 1 THEN "Approved"
               WHEN mb.status = 2 THEN "Reject"
            END) AS status,
            (select image from map_blog_img ib2b where ib2b.bid = mb.id limit 1) as image');
        $this->db->from('master_blog mb');
        $this->db->where('mb.deleted', 0);
        $this->db->where('mb.status', 1);
        $this->db->order_by('mb.id','DESC');  
        $this->db->limit(3); 
        
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getbyid() {
       
        $this->db->select('*');
        $this->db->from('master_blog');
        if($this->_condition){
            $this->db->where($this->_condition);
        }
        
        $query = $this->db->get();
        // print $this->db->last_query();
        $blogdata = $query->result_array();

        if(count($blogdata) > 0){
            $this->db->select('*');
            $this->db->from('map_blog_img');
            $this->db->where('deleted',0);
            $this->db->where('bid',$blogdata[0]['id']);
            
            $query2 = $this->db->get();
            // print $this->db->last_query();
            $blogimg = $query2->result_array();
        }else{
            $blogimg = array();
        }
        
        $data['blogdata'] = $blogdata;
        $data['blogimg']  = $blogimg;
        return $data;
    }   
    
    //getLastBlog
    
    public function getLastBlog() {
       
        $this->db->select('*');
        $this->db->from('master_blog');
        if($this->_condition){
            $this->db->where($this->_condition);
        }
        
        $query = $this->db->get();
        // print $this->db->last_query();
        $blogdata = $query->result_array();

        if(count($blogdata) > 0){
            $this->db->select('*');
            $this->db->from('map_blog_img');
            $this->db->where('deleted',0);
            $this->db->where('bid',$blogdata[0]['id']);
            
            $query2 = $this->db->get();
            // print $this->db->last_query();
            $blogimg = $query2->result_array();
        }else{
            $blogimg = array();
        }
        
        $data['blogdata'] = $blogdata;
        $data['blogimg']  = $blogimg;
        return $data;
    }   
    
}