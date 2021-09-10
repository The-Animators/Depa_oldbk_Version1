<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Job_model extends MY_Model
{

    public $table;
    public $_primary_key;
    public $_condition;
    public function __construct() {
        parent::__construct();
        $this->table        = 'master_job';
        $this->_primary_key = 'id';
        $this->_condition   = array();
    }    

    public function getJob() {
       
        /*$this->db->select('mj.id,mj.can_reason,mj.firm_name,mj.designation,mj.contact_person,mj.contact_number,mj.experience,mj.contact_email,mj.start_date,mj.end_date,mj.openings,mj.salary_range_start,mj.salary_range_end,
             CONCAT_WS(" ",fm.first_name,fm.second_name,fm.third_name) as uploaded_by,
             (CASE
               WHEN mj.status = 0 THEN "Pending" 
               WHEN mj.status = 1 THEN "Approved"
               WHEN mj.status = 2 THEN "Reject"
            END) AS status

            ');*/
            
        $this->db->select('mj.*,
             CONCAT_WS(" ",fm.first_name,fm.second_name,fm.third_name) as uploaded_by,
             (CASE
               WHEN mj.status = 0 THEN "Pending" 
               WHEN mj.status = 1 THEN "Approved"
               WHEN mj.status = 2 THEN "Reject"
            END) AS status

            ');
            
        $this->db->from('master_job mj');
        $this->db->join('family_member fm' ,'mj.memid = fm.id','left');

        $this->db->where($this->_condition);
        
        $query = $this->db->get();
        return $query->result_array();
    }    
    
    
    
    public function getUserJob($status='') {
       
       $today = date('Y-m-d');
       
        $this->db->select('mj.id,mj.can_reason,mj.firm_name,mj.designation,mj.contact_person,mj.contact_number,mj.experience,mj.contact_email,mj.start_date,mj.end_date,mj.openings,mj.salary_range_start,mj.salary_range_end,
             CONCAT_WS(" ",fm.first_name,fm.second_name,fm.third_name) as uploaded_by,
             (CASE
               WHEN mj.status = 0 THEN "Pending" 
               WHEN mj.status = 1 THEN "Approved"
               WHEN mj.status = 2 THEN "Reject"
            END) AS status

            ');
        $this->db->from('master_job mj');
        $this->db->join('family_member fm' ,'mj.memid = fm.id','left');
        
        $this->db->where('mj.status', $status);
        $this->db->where('mj.end_date > ', date('Y-m-d'));
        $this->db->where('mj.deleted', 0);
        
        $query = $this->db->get();
        return $query->result_array();
    }    
    
}