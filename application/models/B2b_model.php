<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class B2b_model extends MY_Model
{

    public $table;
    public $_primary_key;
    public $_condition;
    private $title;
    public function __construct() {
        parent::__construct();
        $this->table = 'master_b2b';
        $this->_primary_key = 'id';
        $this->_condition = array();
        $this->title = 'B2B';
    }    

    public function saveData($master,$image, $id){
        $this->db->trans_begin();
        if($id == 0){
            $this->db->insert($this->table,$master);
            $bid = $this->db->insert_id();
        }else{
            $this->db->where('id',$id);
            $this->db->update($this->table,$master);
            $bid = $id;
        }
        $batch = array();
        $count = count($image);
        if($count > 0){
            foreach ($image as $row) {
                $batch[] = array(
                    'bid'   => $bid,
                    'image' => $row['file_name']
                );
            }
            $this->db->insert_batch('map_b2b_image',$batch);
        }
        // print $this->db->last_query();

        if ($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            $result = array('msg' => 'Error On Adding B2B', 'status' => false);
        } else{
            $this->db->trans_commit();
            $result = array('msg' => 'B2B Successfully Save', 'status' => true);
        }  
        return $result;
    }

    public function getb2b() {
        $this->db->select('mb2b.id, mb2b.email,mb2b.contact_number, mb2b.firm_name,mb2b.expiry_date, mbc.category, mb2b.contact_person, mb2b.description, mb2b.logo,
            CONCAT_WS(" ",fm.first_name, fm.second_name, fm.third_name) as uploaded_by,
            (CASE
               WHEN mb2b.status = 0 THEN "Pending" 
               WHEN mb2b.status = 1 THEN "Approved"
               WHEN mb2b.status = 2 THEN "Reject"
            END) AS status, can_reason,
            (select image from map_b2b_image ib2b where ib2b.bid = mb2b.id limit 1) as image');
        $this->db->from('master_b2b mb2b');
        $this->db->join('family_member fm' ,'fm.id = mb2b.memid','left');
        $this->db->join('master_business_category mbc' ,' mb2b.catergory = mbc.id','left');

        // if(!empty($this->_condition)){
            $this->db->where($this->_condition);
        // }
        
        $query = $this->db->get();
        // print $this->db->last_query();
        return $query->result_array();
    }   

    public function getbyid() {
       
        $this->db->select('mb2b.*,
            CONCAT_WS(" ",fm.first_name, fm.second_name, fm.third_name) as uploaded_by,
            (CASE
               WHEN mb2b.status = 0 THEN "Pending" 
               WHEN mb2b.status = 1 THEN "Approved"
               WHEN mb2b.status = 2 THEN "Reject"
            END) AS status, mbc.category as catergory, msub.subscription ');
        $this->db->from('master_b2b mb2b');
        $this->db->join('family_member fm' ,'mb2b.memid = fm.id','left');
        $this->db->join('master_business_category mbc', 'mb2b.catergory = mbc.id', 'left');
        $this->db->join('master_subscription msub', 'mb2b.subscription = msub.id', 'left');
        if($this->_condition){
            $this->db->where($this->_condition);
        }
        
        $query = $this->db->get();
        // print $this->db->last_query();
        $busenesdata = $query->result_array();
        
        if(count($busenesdata) > 0){
            $this->db->select('*');
            $this->db->from('map_b2b_image');
            $this->db->where('deleted',0);
            $this->db->where('bid',$busenesdata[0]['id']);
            $query2 = $this->db->get();
            $busenesimg = $query2->result_array();
        }else{
            $busenesimg = array();
        }

        $data['businessdata'] = $busenesdata;
        $data['busenessimg']  = $busenesimg;
        $data['status']  = TRUE;
        return $data;
    }   
}