<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Family_model extends MY_Model
{

    public $table;
    public $_primary_key;
    public $_condition;
    private $title;
    public function __construct() {
        parent::__construct();
        $this->table        = 'family_member';
        $this->_primary_key = 'id';
        $this->_condition   = array();
        $this->title        = 'Family';
    }    

    public function memberdetails($id){
        //Fetch Family Details
        $rtn = array();
        $this->db->select('family_id');
        $this->db->from('family_member');
        $this->db->where('id',$id);
        $query = $this->db->get();
        // print $this->db->last_query();
        $family = $query->result_array();
        if(!empty($family)){
            // print_r($family);
            $family_id = $family[0]['family_id'];
            //Fetch Family Contact
            $this->db->select('id, family_id, member_no, CONCAT_WS(" ",first_name, second_name, third_name) as fullname, relation_id, live_type ');
            $this->db->from('family_member');
            $this->db->where('family_id', $family_id);
            $query = $this->db->get();
            // print $this->db->last_query();
            $rtn = $query->result_array();
        }
        return $rtn;
    }

    public function familymemberdetails($ids){
        // Fetch Family Details
        // $family_id = $family[0]['family_id'];
        // Fetch Family Contact
        $this->db->select('id, family_id, member_no, CONCAT_WS(" ",first_name, second_name, third_name) as fullname, relation_id, live_type ');
        $this->db->from('family_member');
        $this->db->where_in('id', $ids);
        $query = $this->db->get();
        // print $this->db->last_query();
        $rtn = $query->result_array();
        return $rtn;
    }

    public function familydetails($id){
        //Fetch Family Details
        $rtn = array();
        $this->db->select('*');
        $this->db->from('family_master');
        $this->db->where('id',$id);
        $this->db->or_where('family_id',$id);
        $query = $this->db->get();
        // print $this->db->last_query();
        $family = $query->result_array();
        $area_id = $family[0]['area_id'];
        
        $this->db->select('*');
        $this->db->from('master_area');
        $this->db->where('id', $area_id);
        $this->db->where('deleted', 0);
        $query_area = $this->db->get();
        $data_area = $query_area->result_array();
        $area_name = $data_area[0]['area'];
        array_push($family[0], $family[0]['area_name']=$area_name);
        unset($family[0][0]);
        
        if(!empty($family)){
            
            // print_r($family);
            $rtn['family'] = $family;
            $id = $family[0]['id'];
            
            // print_r($rtn['family']);
            // die();

            //Fetch Family Contact
            $this->db->select('*');
            $this->db->from('family_contact');
            $this->db->where('family_id',$id);
            $query = $this->db->get();
            // print $this->db->last_query();
            $rtn['contact'] = $query->result_array();

            //Fetch Member Details
            $this->db->select('fm.id, fm.member_no, fm.fm_status, CONCAT_WS(" ",fm.first_name, fm.second_name, fm.third_name, ms.surname) as fullname, fm.contact, fm.email, fm.image, fm.relation_id, fm.dod, fm.live_type, fm.delete_reason as reason, merge_flag, merge_status');
            $this->db->from('family_member fm');
            $this->db->join('master_surname ms' ,' fm.surname_id = ms.id','left');
            // $this->db->where('fm.fm_status=1 OR fm.fm_status=2');
            $this->db->where('fm.family_id',$id);
            $this->db->where('fm.deleted',0);
            $query = $this->db->get();
            // print $this->db->last_query();
            $rtn['members'] = $query->result_array();
        }
        return $rtn;
    } 
    
    public function api_familydetails($id){
        $rtn = array();
        $this->db->select('fm.id, fm.member_no, fm.fm_status, CONCAT_WS(" ",fm.first_name, fm.second_name, fm.third_name, ms.surname) as fullname, fm.contact, fm.email, fm.image, fm.relation_id, fm.dod, fm.live_type, fm.delete_reason as reason, merge_flag, merge_status');
        $this->db->from('family_member fm');
        $this->db->join('master_surname ms' ,' fm.surname_id = ms.id','left');
        $this->db->where('fm.family_no',$id);
        $this->db->where('fm.deleted',0);
        $query = $this->db->get();
        $rtn = $query->result_array();
        return $rtn;
    } 

    public function familydetailsByNo($id){
        //Fetch Family Details
        $rtn = array();
        $this->db->select('id, family_id, member_no, CONCAT_WS(" ",first_name, second_name, third_name) as fullname, relation_id, contact, live_type, merge_flag ');
        $this->db->from('family_member');
        $this->db->where('family_no',$id);
        $query = $this->db->get();
        // print $this->db->last_query();
        $rtn = $query->result_array();
        return $rtn;
    }

    public function get($flag = false) {
        $return = array();
        $this->db->select('fm.id, fm.family_id, fm.member_no, fm.family_no, fm.old_value, fm.new_value, fm.first_name, fm.second_name, fm.third_name, CONCAT_WS(" ",fm.first_name, fm.second_name, fm.third_name, ms.surname) as fullname, fm.surname_id, fm.blood_id, fm.relation_id, fm.other_relation_details, fm.marriage_type, fm.education_id, fm.other_education_details, fm.occupation_id, fm.other_occupation_details, fm.other_surname_details, fm.sex, fm.dob, fm.dod, fm.dom, fm.contact, fm.altcontact, fm.email, fm.live_type, fm.image, fm.member_type, mf.address_1, mf.pincode, mf.landline, mf.area_id, mf.email as f_email, fm.email, mf.address_2, ms.surname, mbg.bloodgroup, mr.relation, mms.maritalstatus,  GROUP_CONCAT(DISTINCT sp.sports) as sports,dk.dharmikknowledge,  GROUP_CONCAT(DISTINCT me.education) as education, mo.occupation,fm.dharmik_id,fm.sports_id, fm.other_sports_details, fm.achivements, fm.life_insurance, fm.medical_insurance,fm.life_insurance_text, fm.medical_insurance_text, fm.sanjeevni, fmr.second_name as m_second_name, fmr.third_name as m_third_name, fmr.surname as m_surname_id, mfms.surname as m_surname, fmr.address as m_address, fmr.village as m_village_id, mv.village as m_village, fmr.contact as m_contact, fmr.email as m_email');
        $this->db->from($this->table.' fm');
        $this->db->join('family_master mf', 'fm.family_id = mf.id','left');
        $this->db->join('master_surname ms','fm.surname_id = ms.id','left');
        $this->db->join('master_bloodgroup mbg','fm.blood_id = mbg.id','left');
        $this->db->join('master_relation mr', 'fm.relation_id = mr.id','left');
        $this->db->join('master_marital_status mms' ,'fm.marriage_type = mms.id','left');
        $this->db->join('master_education me', 'FIND_IN_SET(me.id, fm.education_id)','left', false);
        $this->db->join('master_occupation mo', 'fm.occupation_id = mo.id','left');
        $this->db->join('master_sports sp', 'FIND_IN_SET(sp.id, fm.sports_id)','left', false);
        $this->db->join('master_dharmik_knowledge dk','fm.dharmik_id = dk.id','left');
        $this->db->join('family_marriage fmr', 'fm.family_id = fmr.family_id AND fm.first_name = fmr.first_name','left');
        $this->db->join('master_surname mfms', 'fmr.surname = mfms.id','left');
        $this->db->join('master_village mv', 'fmr.village = mv.id','left');
        // $this->db->join('family_business fb' ,' fm.family_id = fb.family_id','left');

        if(!empty($this->_condition)){
            $this->db->where($this->_condition);
        }
        // $this->db->where('fm.deleted',0);
        if($flag)
        $this->db->where('fm.relation_id',22);
        
        $this->db->order_by('fullname','ASC');
       
        $query = $this->db->get();
        // print $this->db->last_query();
        $return['member'] = $query->result_array();
        // print_r($return['member']);

        $this->db->select('fb.*, ma.area');
        $this->db->from('family_business fb');
        $this->db->join('family_member fm' ,'fm.id = fb.member_id','left');
        $this->db->join('master_area ma' ,'ma.id = fb.area_id','left');
        $this->db->where($this->_condition);
        // $this->db->where('fb.deleted',0);
        $this->db->order_by('company_name','ASC');
        $query = $this->db->get();
        // print $this->db->last_query();
        $return['business'] =  $query->result_array();
        // print_r($return['business']);
        return $return;
    } 


    public function getmember() {
        $return = array();
        $this->db->select('fm.id, fm.family_id, fm.fm_status,, fm.old_value, fm.new_value, fm.member_no, fm.family_no, fm.first_name, fm.second_name, fm.third_name, CONCAT_WS(" ",fm.first_name, fm.second_name, fm.third_name, ms.surname) as fullname, fm.surname_id, fm.blood_id, fm.relation_id, fm.marriage_type, fm.education_id, fm.occupation_id, fm.sex, fm.dob, fm.dod, fm.dom, fm.contact, fm.email, fm.live_type, fm.image, fm.member_type, ms.surname, mbg.bloodgroup, mr.relation, mms.maritalstatus,  GROUP_CONCAT(DISTINCT sp.sports) as sports,dk.dharmikknowledge,  GROUP_CONCAT(DISTINCT me.education) as education, mo.occupation,fm.dharmik_id,fm.sports_id,fm.achivements, fm.life_insurance, fm.medical_insurance,fm.life_insurance_text, fm.medical_insurance_text, fm.sanjeevni, fmr.second_name as m_second_name, fmr.third_name as m_third_name, fmr.surname as m_surname_id, mfms.surname as m_surname, fmr.address as m_address, fmr.village as m_village_id, mv.village as m_village, fmr.contact as m_contact, fmr.email as m_email');
        $this->db->from($this->table.' fm');
        $this->db->join('master_surname ms','fm.surname_id = ms.id','left');
        $this->db->join('master_bloodgroup mbg','fm.blood_id = mbg.id','left');
        $this->db->join('master_relation mr', 'fm.relation_id = mr.id','left');
        $this->db->join('master_marital_status mms' ,'fm.marriage_type = mms.id','left');
        $this->db->join('master_education me', 'FIND_IN_SET(me.id, fm.education_id)','left', false);
        $this->db->join('master_occupation mo', 'fm.occupation_id = mo.id','left');
        $this->db->join('master_sports sp', 'FIND_IN_SET(sp.id, fm.sports_id)','left', false);
        $this->db->join('master_dharmik_knowledge dk','fm.dharmik_id = dk.id','left');
        $this->db->join('family_marriage fmr', 'fm.family_id = fmr.family_id AND fm.first_name = fmr.first_name','left');
        $this->db->join('master_surname mfms', 'fmr.surname = mfms.id','left');
        $this->db->join('master_village mv', 'fmr.village = mv.id','left');
        // $this->db->join('family_business fb' ,' fm.family_id = fb.family_id','left');

        if(!empty($this->_condition)){
            $this->db->where($this->_condition);
        }
        $this->db->where('fm.deleted',0);
        $this->db->order_by('fullname','ASC');
       
        $query = $this->db->get();
        // print $this->db->last_query();
        $return['member'] = $query->result_array();
        // print_r($return['member']);

        $this->db->select('fb.*, ma.area');
        $this->db->from('family_business fb');
        $this->db->join('family_member fm' ,'fm.id = fb.member_id','left');
        $this->db->join('master_area ma' ,'ma.id = fb.area_id','left');
        $this->db->where($this->_condition);
        $this->db->where('fb.deleted',0);
        $this->db->order_by('company_name','ASC');
        $query = $this->db->get();
        // print $this->db->last_query();
        $return['business'] =  $query->result_array();
        // print_r($return['business']);
        return $return;
    }   

    public function addHead($family_master, $memberdata, $family_marriage = array(), $memberid=0, $family_id=0, $familyNo=''){
        $this->db->trans_begin();
        // 1st Insert Into family_master and generate family_id 
        // with last insert id and left pad
        // 2nd Insert Into family_member
        $family_no ='';
       
        if($family_id == 0){

            $this->db->insert('family_master', $family_master);
            $family_id   = $this->db->insert_id();
            $family_no  = "DPF".str_pad($family_id, 4, '0', STR_PAD_LEFT);


            $this->db->set('family_id', $family_no);
            $this->db->where('id', $family_id);
            $this->db->update('family_master');
            
            if($memberid == 0){
                $memberdata['family_id'] = $family_id;
                $memberdata['member_no'] = $family_no.'-01';
                $memberdata['family_no'] = $family_no;
            }

        }else{

            $this->db->where('id', $family_id);
            $this->db->update('family_master',$family_master);
            if($memberid == 0){
                $this->db->select('*')->from('family_member')->where('family_id', $family_id);
                $Query = $this->db->get();
                $rows  = $Query->num_rows();
                if($rows > 8){
                    $sno = $rows+1;
                }else{

                    $sno = str_pad($rows+1, 2, '0', STR_PAD_LEFT);
                }

                $memberdata['family_id'] = $family_id;
                $family_no               = "DPF".str_pad($family_id, 4, '0', STR_PAD_LEFT);
                $memberdata['member_no'] = $familyNo.'-'.$sno;
                $memberdata['family_no'] = $familyNo;
            }
        }

        if(isset($memberdata['image'])){
            $extension = pathinfo($memberdata['image'], PATHINFO_EXTENSION);
            $memberdata['image'] = $memberdata['member_no'].'.'.$extension;
        }

        if($memberid > 0){
            $this->db->where('id', $memberid);
            $this->db->update('family_member', $memberdata);
        }else{
            $this->db->insert('family_member', $memberdata);
        }
        // print $this->db->last_query();
        if(count($family_marriage) > 0){
            $family_marriage['member_id'] = $memberid;
            $family_marriage['family_id'] = $family_id;
            $this->db->insert('family_marriage', $family_marriage);
        }

        if ($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            $result = array('msg' => 'Error On Adding Head Of Family', 'status' => false, 'memberno' => '');
        } else{
            $this->db->trans_commit();
            $result = array('msg' => 'Head Of Family Successfully Save', 'status' => true, 'memberno' => $memberdata['member_no']);
        }  
        return $result;
    }

    public function getHead($id=''){
        $this->db->select('ms.surname, mf.id, fm.member_no, fm.family_no, fm.first_name, fm.second_name, fm.third_name, mf.address_1, mf.pincode, mf.landline, mf.email, ma.area');
        $this->db->from('family_master mf');
        $this->db->join('family_member fm', 'fm.family_id = mf.id', 'left');
        $this->db->join('master_surname ms', 'fm.surname_id = ms.id', 'left');
        $this->db->join('master_area ma', 'mf.area_id = ma.id', 'left');
            $this->db->where('fm.deleted', 0);
        if($id){
            $this->db->where('mf.id', $id);
            $this->db->where('fm.family_id', $id);
        }else{
            $this->db->where('fm.relation_id', 22);
            $this->db->where('fm.live_type != ', 'Death');
        }
        $query = $this->db->get();
        // print $this->db->last_query();
        return $query->result_array();
    }

    public function getPerson($id=''){
        $this->db->select('*');
        $this->db->from('family_member');
        $this->db->where('family_id', $id);
        $this->db->where('deleted', 0);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getHeadById(int $id){
        $this->db->select('mf.address_1, mf.pincode, mf.landline, mf.area_id, mf.id, fm.*');
        $this->db->from('family_master mf');
        $this->db->join('family_member fm' ,'fm.family_id = mf.id','left');
        $this->db->where('mf.id', $id);
        $this->db->where('fm.family_id', $id);
        $query = $this->db->get();
        // print $this->db->last_query();
        return $query->row();
    }

    public function updatedelete($family_member,$id){

        $this->db->trans_begin();
        $rows = 0;

        $this->db->select('id')->from('family_master')->where('id',$id);
        $query = $this->db->get();
        // print $this->db->last_query();exit;
        $rows = $query->num_rows();
        if($rows > 0){
            $this->db->where('id' ,$id);
            $this->db->update('family_master', $family_member);

            $family_member['delete_reason']     = 'Family Deleted';
            $this->db->where('family_id' ,$id);
            $this->db->update('family_member', $family_member);

            if($this->db->trans_status() === FALSE){
                $this->db->trans_rollback();
                $result = array("status" => false,"false" => true,"msg" => "Error While Deleting Family");
            }else{
                $this->db->trans_commit();
                $result = array("status" => true,"success" => true,"msg" => "Family Deleted Successfully");

            }
        }else{
            $result = array("status" => false,"success" => true,"msg" => "Invalid Family ID");
        }  
        return $result;
    }

    public function getAllFamilyMemberEmails(){

        $family = array();
        $this->db->select('email');
        $this->db->from('family_member');
        $this->db->where('email !="" ');
        $query = $this->db->get();
        $family = $query->result_array();
        return $family;

    }
    
    
    public function getAllFamilyMemberPhones(){

        $family = array();
        $this->db->select('contact');
        $this->db->from('family_member');
        $this->db->where('contact !="" ');
        $query = $this->db->get();
        $family = $query->result_array();
        return $family;

    }
    
    
}