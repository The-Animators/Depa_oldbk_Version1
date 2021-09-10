<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Memberedit_model extends MY_Model
{

    public $table;
    public $_primary_key;
    public $_condition;
    public function __construct() {
        parent::__construct();
        $this->table        = 'family_member_edit';
        $this->_primary_key = 'id';
        $this->_condition   = array();
        $this->load->library('bcrypt');
    }    
    

    public function addprofile($memberdata, $memberid, $family_marriage=array(), $family_business=array(), $family_master=array(), $member_no, $family_no){

        $this->db->trans_begin();
        $rows = 1;
        
        if($rows > 0){

            // $this->db->select('member_no, family_no')->from('family_member_edit')->where('family_id', $memberdata['family_id'])->order_by('member_no DESC')->limit(1,0);
            // $query      = $this->db->get()->row();
            // $member_no  = $query->member_no;
            // $family_no  = $query->family_no;

            $cnt        = intval(substr($member_no, -2));
            
            $cnt        = str_pad((intval($cnt) + 1),2,"0",STR_PAD_LEFT);
            $member_no  = $family_no .'-'.$cnt;
            $memberdata['member_no'] = $member_no;  
            $memberdata['family_no'] = $family_no;  

            $image                   = $memberdata['image'];

            // Extracting only filename using constants 
            $filename = pathinfo($image, PATHINFO_FILENAME); 
              
            // $upload_path             = $this->config->item('upload_path')."members/"; 
            // $upload_path_old         = $upload_path.$image; 

            $image                   = str_replace($filename, $member_no, $image);     
            $memberdata['image']     = $image;

            // $upload_path_new         = $upload_path.$image; 
            // rename($upload_path_old, $upload_path_new);

            $this->db->insert('family_member_edit', $memberdata);
            $memberid = $this->db->insert_id();
            
            if(count($family_marriage) > 0 ){
                $family_marriage['member_id'] = $memberid ;
                $this->db->select('id');
                $this->db->from('family_marriage');
                $this->db->where('family_id',$family_marriage['family_id']);
                $this->db->where('first_name',$family_marriage['first_name']);
                // $this->db->where('second_name',$family_marriage['second_name']);
                $query = $this->db->get();
                $rows = $query->num_rows();
                if($rows > 0){
                    $fm_id =  $query->row()->id;
                    $this->db->where('id' ,$fm_id);
                    $this->db->update('family_marriage', $family_marriage);
                }else{
                    $this->db->insert('family_marriage',$family_marriage);
                }
            }

            if(count($family_business) > 0 ){
                $family_business['member_id'] = $memberid ;
                $this->db->select('id');
                $this->db->from('family_business');
                $this->db->where('family_id',$family_business['family_id']);
                $this->db->where('member_id',$family_business['member_id']);
                $this->db->where('company_name',$family_business['company_name']);
                $query = $this->db->get();
                $rows = $query->num_rows();
                if($rows > 0){
                    $fb_id  =  $query->row()->id;
                    $this->db->where('id' ,$fb_id);
                    $this->db->update('family_business', $family_business);
                }else{
                    $this->db->insert('family_business',$family_business);
                }
            }

            if(count($family_master) > 0 ){
                if($family_master['landline'] != ''){
                    $this->db->set('landline', $family_master['landline']);
                }if($family_master['address_1'] != ''){
                    $this->db->set('address_1', $family_master['address_1']);
                }if($family_master['area_id'] != '' && $family_master['area_id'] > 0){
                    $this->db->set('area_id', $family_master['area_id']);
                }if($family_master['pincode'] != '' && strlen($family_master['pincode']) == 6){
                    $this->db->set('pincode', $family_master['pincode']);
                }if($family_master['email'] != ''){
                    $this->db->set('email', $family_master['email']);
                }
                if($family_master['landline'] !='' || $family_master['address_1'] !='' || $family_master['area_id'] !='' || ($family_master['pincode'] != '' && strlen($family_master['pincode']) == 6) || $family_master['email'] !=''){
                    $this->db->where('id', $memberdata['family_id']);
                    $this->db->update('family_master');
                }
                // print $this->db->last_query();
            }

            if($this->db->trans_status() === FALSE){
                $this->db->trans_rollback();
                $result = array("status" => false,"false" => true,"msg" => "Error While Updating Member Profile");
            }else{
                $this->db->trans_commit();
                $result = array("status" => true,"success" => true,"msg" => "Member Profile Successfully Updated");

            }
        }else{
            $result = array("status" => false,"success" => true,"msg" => "Invalid Member Id");
        }  

        return $result;
    }

    
}