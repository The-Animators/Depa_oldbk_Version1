<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Meeting_model extends Crud_model
{

    private $id;
    private $table;
    public function __construct() {
        parent::__construct();
        $this->id = $this->session->userdata('user_id');
    }
    public function get($type=''){
        $date = date('Y-m-d');
        $this->db->select("mv.name,mv.mobile,mv.company_name,mvt.visitor_type,mm.emp_to_meet,mm.purpose,mm.belongs_to");
        $this->db->from('master_meeting mm');
        $this->db->join('master_visitor mv' ,'mm.vis_id = mv.id','left');
        $this->db->join('master_visitor_type mvt' ,'mv.visitor_type = mvt.id','left');
        if($type=='today'){
            $this->db->where('DATE_FORMAT(mm.added_date,"%Y-%m-%d")',$date);
        }
        $query = $this->db->get();
        // print $this->db->last_query();
        return $query->result_array();
    }

    public function getpass($id=''){
        $date = date('Y-m-d');
        $this->db->select("mv.name,mv.mobile,mv.company_name, mv.company_location,mv.photo,mvt.visitor_type,mm.id as passid,mm.purpose,mm.belongs_to,mm.added_date,mm.barcode,em.emp_name as emp_to_meet");
        $this->db->from('master_meeting mm');
        $this->db->join('master_visitor mv' ,'mm.vis_id = mv.id','left');
        $this->db->join('master_visitor_type mvt' ,'mv.visitor_type = mvt.id','left');
        $this->db->join('employee_master em' ,'mm.emp_to_meet = em.id','left');
        if($id > 0){
            $this->db->where('mm.id',$id);
        }
        $query = $this->db->get();
        // print $this->db->last_query();
        return $query->row();
    }
}