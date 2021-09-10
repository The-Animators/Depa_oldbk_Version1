<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Member_model extends MY_Model
{

    public $table;
    public $_primary_key;
    public $_condition;
    public function __construct() {
        parent::__construct();
        $this->table        = 'family_member';
        $this->_primary_key = 'id';
        $this->_condition   = array();
        $this->load->library('bcrypt');
    }    
    
    public function searchMember($key1='',$val1='',$key2='',$val2='',$key3='',$val3=''){

        $this->db->select('fm.id, , fm.family_no, fm.member_no, fm.email, fm.contact, CONCAT_WS(" ",fm.first_name, fm.second_name, fm.third_name, ms.surname) AS membername, fm.image');
        $this->db->from('family_member fm');
        $this->db->join('master_surname ms', 'ms.id = fm.surname_id');
        $this->db->join('master_relation mrel', 'mrel.id = fm.relation_id', "LEFT");
        $this->db->join('master_education medu', 'medu.id = fm.education_id', "LEFT");
        $this->db->join('master_occupation mocc', 'mocc.id = fm.occupation_id', "LEFT");
        $this->db->join('master_bloodgroup mbg', 'mbg.id = fm.blood_id', "LEFT");
        $this->db->join('master_marital_status mmrs', 'mmrs.id = fm.marriage_type', "LEFT"); //maritalstatus
        $this->db->join('family_master f_m', 'f_m.family_id = fm.family_no');
        $this->db->join('master_area madd', 'madd.id = f_m.area_id', "LEFT");

            //Checking Fields if selected or not
            
            //Surname if any key field
            if($key1 == 'surname' || $key2 == 'surname' || $key3 == 'surname' ){
                if($key1 == 'surname' && $val1 != ''){
                $this->db->where("(ms.surname = '".$val1."')");
                }
                if($key2 == 'surname' && $val2 != ''){
                $this->db->where("(ms.surname = '".$val2."')");
                }
                if($key3 == 'surname' && $val3 != ''){
                $this->db->where("(ms.surname = '".$val3."')");
                }
            }
            //Education if any key field
            if($key1 == 'education' || $key2 == 'education' || $key3 == 'education' ){
                if($key1 == 'education' && $val1 != ''){
                $this->db->where("(medu.education = '".$val1."')");
                }
                if($key2 == 'education' && $val2 != ''){
                $this->db->where("(medu.education = '".$val2."')");
                }
                if($key3 == 'education' && $val3 != ''){
                $this->db->where("(medu.education = '".$val3."')");
                }
            }
            //Occupation if any key field
            if($key1 == 'occupation' || $key2 == 'occupation' || $key3 == 'occupation' ){
                if($key1 == 'occupation' && $val1 != ''){
                $this->db->where("mocc.occupation = '".$val1."'");
                }
                if($key2 == 'occupation' && $val2 != ''){
                $this->db->where("mocc.occupation = '".$val2."'");
                }
                if($key3 == 'occupation' && $val3 != ''){
                $this->db->where("mocc.occupation = '".$val3."'");
                }
            }
            //BloodGroup if any key field
            if($key1 == 'bloodgroup' || $key2 == 'bloodgroup' || $key3 == 'bloodgroup' ){
                if($key1 == 'bloodgroup' && $val1 != ''){
                $this->db->where("mbg.bloodgroup = '".$val1."'");
                }
                if($key2 == 'bloodgroup' && $val2 != ''){
                $this->db->where("mbg.bloodgroup = '".$val2."'");
                }
                if($key3 == 'bloodgroup' && $val3 != ''){
                $this->db->where("mbg.bloodgroup = '".$val3."'");
                }
            }
            //Gender if any key field
            if($key1 == 'sex' || $key2 == 'sex' || $key3 == 'sex' ){
                if($key1 == 'sex' && $val1 != ''){ 
                    $this->db->where("fm.sex = '".$val1."'");
                }
                if($key2 == 'sex' && $val2 != ''){
                    $this->db->where("fm.sex = '".$val2."'");
                }
                if($key3 == 'sex' && $val3 != ''){
                    $this->db->where("fm.sex = '".$val3."'");
                }
            }
            //Area if any key field
            if($key1 == 'area' || $key2 == 'area' || $key3 == 'area' ){
                if($key1 == 'area' && $val1 != ''){
                $this->db->where("madd.area = '".$val1."'");
                }
                if($key2 == 'area' && $val2 != ''){
                $this->db->where("madd.area = '".$val2."'");
                }
                if($key3 == 'area' && $val3 != ''){
                $this->db->where("madd.area = '".$val3."'");
                }
            }
            
            if($key1 == 'relation' || $key2 == 'relation' || $key3 == 'relation' ){
                if($key1 == 'relation' && $val1 != ''){ 
                    $this->db->where("mrel.relation = '".$val1."'");
                }
                if($key2 == 'relation' && $val2 != ''){
                    $this->db->where("mrel.relation = '".$val2."'");
                }
                if($key3 == 'relation' && $val3 != ''){
                    $this->db->where("mrel.relation = '".$val3."'");
                }
            }
            
            if($key1 == 'maritalstatus' || $key2 == 'maritalstatus' || $key3 == 'maritalstatus' ){
                if($key1 == 'maritalstatus' && $val1 != ''){ 
                    $this->db->where("mmrs.maritalstatus = '".$val1."'");
                }
                if($key2 == 'maritalstatus' && $val2 != ''){
                    $this->db->where("mmrs.maritalstatus = '".$val2."'");
                }
                if($key3 == 'maritalstatus' && $val3 != ''){
                    $this->db->where("mmrs.maritalstatus = '".$val3."'");
                }
            }
            if($key1 != '' && $key1 != 'surname' && $key1 != 'education' && $key1 != 'occupation' && $key1 != 'bloodgroup' && $key1 != 'sex'  && $key1 != 'area' && $key1 != 'relation'  && $key1 != 'maritalstatus'){
                if($val1 != ''){
                        $this->db->where("fm.".$key1." LIKE '%".$val1."%'");   
                    /*if( ($key2 == $key1 && $val2 != '') || ($key3 == $key1 && $val3 != '') )
                    {
                        $this->db->or_where("fm.".$key1." LIKE '%".$val1."%'");
                    }else{
                        $this->db->where("fm.".$key1." LIKE '%".$val1."%'");   
                    }*/
                }
            }
            if($key2 != '' && $key2 != 'surname' && $key2 != 'education' && $key2 != 'occupation' && $key2 != 'bloodgroup'  && $key2 != 'sex'  && $key2 != 'area' && $key2 != 'relation' && $key2 != 'maritalstatus'){
                if($val2 != ''){
                    $this->db->where("fm.".$key2." LIKE '%".$val2."%'");   
                    /*if( ($key1 == $key2 && $val1 != '') || ($key3 == $key2 && $val3 != '') )
                    {
                        $this->db->or_where("fm.".$key2." LIKE '%".$val2."%'");
                    }else{
                        $this->db->where("fm.".$key2." LIKE '%".$val2."%'");   
                    }*/
                }
            }
            if($key3 != '' && $key3 != 'surname' && $key3 != 'education' && $key3 != 'occupation' && $key3 != 'bloodgroup'  && $key3 != 'sex'  && $key3 != 'area' && $key3 != 'relation' && $key3 != 'maritalstatus'){
                if($val3 != ''){
                    $this->db->where("fm.".$key3." LIKE '%".$val3."%'");
                    /*if( ($key1 == $key3 && $val1 != '') || ($key2 == $key3 && $val2 != '') )
                    {
                        $this->db->or_where("fm.".$key3." LIKE '%".$val3."%'");
                    }else{
                        $this->db->where("fm.".$key3." LIKE '%".$val3."%'");
                    }*/
                }
            }
                // $this->db->where("(fm.".$key1." RLIKE '".$val1."' OR fm.".$key2." RLIKE '".$val2."' OR fm.".$key3." RLIKE '".$val3."')");
/*        // if($search != ''){
            $text   = str_getcsv($search, ' ');
            $searchtext = implode("|", $text);

            $this->db->where("(fm.first_name RLIKE '".$searchtext."' OR fm.second_name RLIKE '".$searchtext."' OR fm.third_name RLIKE '".$searchtext."' OR ms.surname RLIKE '".$searchtext."' OR mbg.bloodgroup RLIKE '".$searchtext."' OR madd.area RLIKE '".$searchtext."' OR medu.education LIKE '%".$searchtext."%' OR f_m.address_1 LIKE '%".$searchtext."%' OR f_m.address_2 LIKE '%".$searchtext."%')");
        // }
*/        
        $this->db->where('fm.surname_id=ms.id');
        $this->db->where('fm.deleted',0);
        $this->db->order_by('membername','ASC');
       
        $query = $this->db->get();
        // print_r ($this->db->last_query()); exit();
        return $query->result_array();
    }
    
    public function getdirMember($filterby){
        $this->db->select('fm.id, fm.family_id, fm.family_no, fm.member_no, fm.email, fm.contact, CONCAT_WS(" ",fm.first_name, fm.second_name, fm.third_name, ms.surname) AS membername, fm.image');
        $this->db->from($this->table. ' fm');
        $this->db->join('master_surname ms', 'ms.id = fm.surname_id');
        if($filterby != 'All'){
            $this->db->like('UPPER(first_name)', $filterby, 'after');
        }
        
        $this->db->where('fm.deleted',0);
        $this->db->order_by('membername','ASC');
        $query = $this->db->get();
        // print $this->db->last_query();
        return $query->result_array();
    }
    
    public function getMemberDetails(){
        $this->db->select('id ,first_name, username, email, contact');
        $this->db->from($this->table);
        $this->db->where($this->_condition);
        $query = $this->db->get();
        // print $this->db->last_query();
        return $query->result_array();
    }

    public function Changeaddress($memberdata,$memberid){

        $this->db->where('id = (SELECT family_id FROM family_member WHERE id='.$memberid.')');
        $this->db->update('family_master', $memberdata);
        $error = $this->db->error();
        if($error['code'] == 0){
            $result = array("status" => true,"success" => true,"msg" => "Address Successfully Change");
        }else{
            $result = array("status" => false,"false" => true,"msg" => "Error While Changing Address");
        }   
        return $result;
    }

    public function approve_member($memberdata, $memberid){

        $this->db->where('id='.$memberid);
        $this->db->update('family_member', $memberdata);
        $error = $this->db->error();
        if($error['code'] == 0){
            $result = array("status" => true,"success" => true,"msg" => "Approved Successfully");
        }else{
            $result = array("status" => false,"false" => true,"msg" => "Error While Approving");
        }   
        return $result;
    }


    public function updatemarriage($memberdata,$memberid){
        $this->db->select('id')->from('family_member')->where('id',$memberid);
        $query = $this->db->get();
        $rows = $query->num_rows();
        if($rows > 0){
            $this->db->where('id' ,$memberid);
            $this->db->update('family_member', $memberdata);
            $error = $this->db->error();
            if($error['code'] == 0){
                $result = array("status" => true,"success" => true,"msg" => "Marriage Detail Successfully Change");
            }else{
                $result = array("status" => false,"false" => true,"msg" => "Error While Updating Marriage Detail");
            }   
        }else{
            $result = array("status" => false,"success" => true,"msg" => "Invalid Member Id");
        }  
        return $result;
    }

    public function updateprofile($memberdata, $memberid, $family_marriage=array(), $family_business=array(), $family_master=array()){
        // print_r($memberdata);
        // exit;
        $this->db->trans_begin();
        $rows = 1;
        if($memberid != 0){
            $this->db->select('id')->from('family_member')->where('id',$memberid);
            $query = $this->db->get();
            // print $this->db->last_query();exit;
            $rows = $query->num_rows();
        }
        if($rows > 0){
            if($memberid != 0){
                $this->db->where('id' ,$memberid);
                $this->db->update('family_member', $memberdata);
            }else{
                $this->db->select('member_no,family_no')->from('family_member')->where('family_id', $memberdata['family_id'])->order_by('member_no DESC')->limit(1,0);
                $query      = $this->db->get()->row();
                $member_no  = $query->member_no;
                $family_no  = $query->family_no;

                $cnt        = intval(substr($member_no, -2));
                // $this->db->select('family_no, count(family_id) as cnt');
                // $this->db->from('family_member');
                // $this->db->where('family_id',$memberdata['family_id']);
                // $query      = $this->db->get()->row();
                // $cnt        = $query->cnt;
                $cnt        = str_pad((intval($cnt) + 1),2,"0",STR_PAD_LEFT);
                $member_no  = $family_no .'-'.$cnt;
                $memberdata['member_no'] = $member_no;  
                $memberdata['family_no'] = $family_no;  

                $image                   = $memberdata['image'];

                // Extracting only filename using constants 
                $filename = pathinfo($image, PATHINFO_FILENAME); 
                  
                $upload_path             = $this->config->item('upload_path')."members/"; 
                $upload_path_old         = $upload_path.$image; 

                $image                   = str_replace($filename, $member_no, $image);     
                $memberdata['image']     = $image;

                $upload_path_new         = $upload_path.$image; 
                rename($upload_path_old, $upload_path_new);

                $this->db->insert('family_member', $memberdata);
                $memberid = $this->db->insert_id();
            }
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


    public function addprofile($memberdata, $memberid, $family_marriage=array(), $family_business=array(), $family_master=array()){

        $this->db->trans_begin();
        $rows = 1;
        
        if($rows > 0){

            $this->db->select('member_no, family_no')->from('family_member')->where('family_id', $memberdata['family_id'])->order_by('member_no DESC')->limit(1,0);
            $query      = $this->db->get()->row();
            $member_no  = $query->member_no;
            $family_no  = $query->family_no;

            $cnt        = intval(substr($member_no, -2));
            
            $cnt        = str_pad((intval($cnt) + 1),2,"0",STR_PAD_LEFT);
            $member_no  = $family_no .'-'.$cnt;
            $memberdata['member_no'] = $member_no;  
            $memberdata['family_no'] = $family_no;  

            $image                   = $memberdata['image'];

            // Extracting only filename using constants 
            $filename = pathinfo($image, PATHINFO_FILENAME); 
              
            $upload_path             = $this->config->item('upload_path')."members/"; 
            $upload_path_old         = $upload_path.$image; 

            $image                   = str_replace($filename, $member_no, $image);     
            $memberdata['image']     = $image;

            $upload_path_new         = $upload_path.$image; 
            rename($upload_path_old, $upload_path_new);

            $this->db->insert('family_member', $memberdata);
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


    public function getMemberNo($fid){
        $this->db->trans_begin();
        $this->db->select('member_no')->from('family_member')->where('family_id', $fid)->order_by('member_no DESC')->limit(1,0);
        $query      = $this->db->get()->row();
        $member_no = $query->member_no;
        return $member_no;
    }

    public function getFamilyNo($fid){
        $this->db->trans_begin();
        $this->db->select('family_no')->from('family_member')->where('family_id', $fid)->order_by('family_no DESC')->limit(1,0);
        $query      = $this->db->get()->row();
        $family_no = $query->family_no;
        return $family_no;
    }


    public function updatebusiness($family_business,$business_id){
        $this->db->trans_begin();
        $rows = 1;

        if($business_id != 0){
            $this->db->select('id')->from('family_business')->where('id',$business_id);
            $query = $this->db->get();
            // print $this->db->last_query();exit;
            $rows = $query->num_rows();
        }
        if($rows > 0){
            if($business_id != 0){
                $this->db->where('id' ,$business_id);
                $this->db->update('family_business', $family_business);
            }else{

                $this->db->insert('family_business', $family_business);
            }
            if($this->db->trans_status() === FALSE){
                $this->db->trans_rollback();
                $result = array("status" => false,"false" => true,"msg" => "Error While Updating Business Details");
            }else{
                $this->db->trans_commit();
                $result = array("status" => true,"success" => true,"msg" => "Business Details Successfully Updated");

            }
        }else{
            $result = array("status" => false,"success" => true,"msg" => "Invalid Business ID");
        }  
        return $result;
    }
    public function updatedelete($family_member,$member_id){
        $this->db->trans_begin();
        $rows = 1;

        $this->db->select('id')->from('family_member')->where('id',$member_id);
        $query = $this->db->get();
        // print $this->db->last_query();exit;
        $rows = $query->num_rows();
        if($rows > 0){
            $this->db->where('id' ,$member_id);
            $this->db->update('family_member', $family_member);
            if($this->db->trans_status() === FALSE){
                $this->db->trans_rollback();
                $result = array("status" => false,"false" => true,"msg" => "Error While Deleting Member");
            }else{
                $this->db->trans_commit();
                $result = array("status" => true,"success" => true,"msg" => "Member Deleted Successfully");

            }
        }else{
            $result = array("status" => false,"success" => true,"msg" => "Invalid Member ID");
        }  
        return $result;
    }
    public function updatedeath($family_member,$member_id){
        $this->db->trans_begin();
        $rows = 1;

        $this->db->select('id')->from('family_member')->where('id',$member_id);
        $query = $this->db->get();
        // print $this->db->last_query();exit;
        $rows = $query->num_rows();
        if($rows > 0){
            $this->db->where('id' ,$member_id);
            $this->db->update('family_member', $family_member);
            if($this->db->trans_status() === FALSE){
                $this->db->trans_rollback();
                $result = array("status" => false,"false" => true,"msg" => "Error While Updating Death Details");
            }else{
                $this->db->trans_commit();
                $result = array("status" => true,"success" => true,"msg" => "Death Details Successfully Updated");

            }
        }else{
            $result = array("status" => false,"success" => true,"msg" => "Invalid Member ID");
        }  
        return $result;
    }

    public function holdsplitfamily($json_data, $family_id){
        $this->db->trans_begin();
        $this->db->where('family_id', $family_id);
        $data['split_status'] = 1;
        $data['split_data'] = $json_data;
        $data['split_created'] = date("d/m/Y H:i A");
            
        $this->db->update('family_master', $data);

        if($this->db->trans_status() === FALSE){
                $this->db->trans_rollback();
                $result = array("status" => false,"false" => true,"msg" => "Error While Holding Spliting Family");
        }else{
            $this->db->trans_commit();
            $result = array("status" => true,"success" => true,"msg" => "Split Family Hold Done");
        }  
        return $result;

    }
    
    
    public function rejectsplitfamily($id){
        $data = array();
        $this->db->trans_begin();
        $this->db->where('id', $id);
        $data['split_status'] = 0;
        $data['split_data'] = "";
        $this->db->update('family_master', $data);
        if($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            $result = array("status" => false, "false" => true, "msg" => "Error While Rejecting");
        }else{
            $this->db->trans_commit();
            $result = array("status" => true, "success" => true, "msg" => "Rejected Successfully");
        }
        return $result;
    }

    public function updatesplitfamily($family_member, $relation, $fid, $status){
        $this->db->trans_begin();
        $rows = 1;
        $this->db->select('family_id')->from('family_master')->order_by('family_id DESC')->limit(1,0);
        $query  = $this->db->get();
        $rows = $query->num_rows();
        if($rows > 0){
            $query  = $query->row();
            $family_id  = $query->family_id;
            preg_match_all('!\d+!', $family_id, $matches);
            $family_id = $matches[0][0];
            $family_id = intval($family_id)  + 1;
            $family_id = 'DPF'.str_pad($family_id,4, '0' , STR_PAD_LEFT);
            $family_member['family_id'] = $family_id;
            // print_r($status);
            // die();
            $this->db->insert('family_master', $family_member);
            $id     = $this->db->insert_id();
            $i      = 1;
            foreach($relation as $rel){
                $j = str_pad($i,2, '0' , STR_PAD_LEFT);
                $rel['family_no'] = $family_id;
                $rel['family_id'] = $id;
                $rel['member_no'] = $family_id.'-'.$j;
                $i++;
                // print_r($rel);
                $this->db->where('id', $rel['id']);
                $this->db->update('family_member', $rel);

            }

            if ($status) {
                $fidata = array();
                $fidata['split_status'] = 0;
                $this->db->where('family_id', $fid);
                $this->db->update('family_master', $fidata);
            }

            if($this->db->trans_status() === FALSE){
                $this->db->trans_rollback();
                $result = array("status" => false,"false" => true,"msg" => "Error While Updating Spliting Family");
            }else{
                $this->db->trans_commit();
                $result = array("status" => true,"success" => true,"msg" => "Split Family Successfully Done");
            }
        }else{
            $result = array("status" => false,"success" => true,"msg" => "Invalid Family ID");
        }  
        return $result;
    }
    
    /*public function updatemergefamily($member_id,$family_id){
        $this->db->trans_begin();
        $this->db->select('member_no, family_no')->from('family_member')->where('family_id',$family_id)->order_by('member_no DESC')->limit(1,0);
        $query      = $this->db->get()->row();
        $member_no  = $query->member_no;
        $family_no  = $query->family_no;
        $cnt        = intval(substr($member_no, -2));       

        foreach($member_id as $member){
            $mem        = str_pad((intval($cnt) + 1),2,"0",STR_PAD_LEFT);
            $member_no  = $family_no .'-'.$mem;
            $memberdata['member_no']    = $member_no;  
            $memberdata['family_id']    = $family_id;  
            $memberdata['family_no']    = $family_no;
            $this->db->where('id' ,$member);
            $this->db->update('family_member',$memberdata);
            $cnt++;  
        }
        if($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            $result = array("status" => false,"false" => true,"msg" => "Error While Updating Merging Family");
        }else{
            $this->db->trans_commit();
            $result = array("status" => true,"success" => true,"msg" => "Merge Family Successfully Done");
        }
        return $result;
    }*/
    
    
    public function holdMergeFamily($member_ids, $members_json, $user_data, $member_no, $family_id){
        $this->db->trans_begin();

        $data['merge_status'] = 1;
        $data['merge_data'] = $members_json;
        $data['merge_user_data'] = $user_data;
        $this->db->where('member_no', $member_no);
        $this->db->where('merge_status', 0);
        $this->db->update('family_member', $data);

        $data_fm['merge_status'] = 1;
        $data_fm['merge_data'] = $members_json;
        $this->db->where('family_id', $family_id);
        $this->db->where('merge_status', 0);
        $this->db->where('deleted', 0);
        $this->db->update('family_master', $data_fm);

        foreach($member_ids as $id){
            $memberdata['merge_flag'] = 1;
            $this->db->where('id', $id);
            $this->db->where('merge_flag', 0);
            $this->db->update('family_member',$memberdata);
        }

        if($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            $result = array("status" => false,"false" => true,"msg" => "Error While Updating Merging Family");
        }else{
            $this->db->trans_commit();
            $result = array("status" => true,"success" => true,"msg" => "Merge Family Approval Pending");
        }
        return $result;
    }

    public function updatemergefamily($member_id, $family_id, $old_family_no, $old_member_no){
        $this->db->trans_begin();

        /****** Roll Back All Members To Default State ******/

        $data['merge_status'] = 0;
        $data['merge_data'] = null;
        $data['merge_user_data'] = null;
        $this->db->where('member_no', $old_member_no);
        $this->db->where('merge_status', 1);
        $this->db->update('family_member', $data);

        $data_fm['merge_status'] = 0;
        $data_fm['merge_data'] = '';
        $this->db->where('family_id', $old_family_no);
        $this->db->where('merge_status', 1);
        $this->db->where('deleted', 0);
        $this->db->update('family_master', $data_fm);

        foreach($member_id as $id){
            $memberdata['merge_flag'] = 0;
            $this->db->where('id', $id);
            $this->db->where('merge_flag', 1);
            $this->db->update('family_member',$memberdata);
        }

        /****** Roll Back All Members To Default State ******/


        // Start The Merge Process From Here

        $this->db->select('member_no, family_no')->from('family_member')->where('family_id', $family_id)->order_by('member_no DESC')->limit(1,0);
        $query      = $this->db->get()->row();
        $member_no  = $query->member_no;
        $family_no  = $query->family_no;
        $cnt        = intval(substr($member_no, -2));       

        foreach($member_id as $member){
            $mem        = str_pad((intval($cnt) + 1),2,"0",STR_PAD_LEFT);
            $member_no  = $family_no .'-'.$mem;
            $memberdata['member_no']    = $member_no;  
            $memberdata['family_id']    = $family_id;  
            $memberdata['family_no']    = $family_no;
            // $memberdata['id']           = $member;
            // echo $member;
            // echo "------";
            // print_r($memberdata);
            $this->db->where('id', $member);
            $this->db->update('family_member',$memberdata);
            $cnt++;  
        }
        if($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            $result = array("status" => false,"false" => true,"msg" => "Error While Updating Merging Family");
        }else{
            $this->db->trans_commit();
            $result = array("status" => true,"success" => true,"msg" => "Merge Family Successfully Done");
        }
        return $result;
    }

    public function rejectmergefamily($member_id, $family_id, $old_family_no, $old_member_no){

        $this->db->trans_begin();

        /****** Roll Back All Members To Default State ******/

        $data['merge_status'] = 0;
        $data['merge_data'] = null;
        $data['merge_user_data'] = null;
        $this->db->where('member_no', $old_member_no);
        $this->db->where('merge_status', 1);
        $this->db->update('family_member', $data);

        $data_fm['merge_status'] = 0;
        $data_fm['merge_data'] = '';
        $this->db->where('family_id', $old_family_no);
        $this->db->where('merge_status', 1);
        $this->db->where('deleted', 0);
        $this->db->update('family_master', $data_fm);

        foreach($member_id as $id){
            $memberdata['merge_flag'] = 0;
            $this->db->where('id', $id);
            $this->db->where('merge_flag', 1);
            $this->db->update('family_member',$memberdata);
        }

        /****** Roll Back All Members To Default State ******/

        if($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            $result = array("status" => false,"false" => true,"msg" => "Error While Rejecting Merging Family");
        }else{
            $this->db->trans_commit();
            $result = array("status" => true,"success" => true,"msg" => "Merge Family Rejected Successfully");
        }
        return $result;

    }
    
    
    public function getMemberPinInfo()
    {
         // $sqlQuery = "SELECT id, first_name, FROM family_member WHERE DATE_FORMAT(dob, '%d') =  DAY(CURDATE()) AND DATE_FORMAT(dob, '%m') =  MONTH(NOW()) AND live_type = 'Live' ";
        $this->db->select('id, email, contact, username, password');
        $this->db->from($this->table);
        $this->db->where($this->_condition);
        $query = $this->db->get();
        // print $this->db->last_query();
        return $query->result_array();
    }

    public function emailMask($email)
    {
        $resultmob = substr($email,0,5);
        $resultmob .= "*****";
        $resultmob .= substr($email,strpos($email, "."));
        return $resultmob;
    }
    
    
    public function updatedeathself($family_member,$member_id,$relation){
        $this->db->trans_begin();
        $rows = 1;

        $this->db->select('id')->from('family_member')->where('id',$member_id);
        $query = $this->db->get();
        // print $this->db->last_query();exit;
        $rows = $query->num_rows();
        if($rows > 0){
            $this->db->where('id' ,$member_id);
            $this->db->update('family_member', $family_member);
            if(count($relation)>0)
                $this->db->update_batch('family_member',$relation, 'id');
            if($this->db->trans_status() === FALSE){
                $this->db->trans_rollback();
                $result = array("status" => false,"false" => true,"msg" => "Error While Updating Death Details");
            }else{
                $this->db->trans_commit();
                $result = array("status" => true,"success" => true,"msg" => "Death Details Successfully Updated");

            }
        }else{
            $result = array("status" => false,"success" => true,"msg" => "Invalid Member ID");
        }  
        return $result;
    }
    
    
    public function getMemberId()
    {
         // $sqlQuery = "SELECT id, first_name, FROM family_member WHERE DATE_FORMAT(dob, '%d') =  DAY(CURDATE()) AND DATE_FORMAT(dob, '%m') =  MONTH(NOW()) AND live_type = 'Live' ";
        $this->db->select('id');
        $this->db->from($this->table);
        $this->db->where($this->_condition);
        $query = $this->db->get();
        // print $this->db->last_query();
        return $query->result_array();
    }

    public function CheckUsername(){

        $this->db->select('id');
        $this->db->from($this->table);
        $this->db->where($this->_condition);
        $query = $this->db->get();
        // print $this->db->last_query();
        return $query->result_array();
    }

    public function CreateUsername($pwddata){

        $data = array();
        // echo "Password: ".$pwddata['password'];
        $data['password']               = $this->bcrypt->hash_password($pwddata['password']);
        $data['updated_on']             = date('Y-m-d H:i:s');
        $data['username']              = $pwddata['user_name'];

        $this->db->trans_begin();

        $this->db->where('id',$pwddata['member_id']);
        $insert  = $this->db->update($this->table,$data);
        // print $this->db->last_query();

        if($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            $result = array("status" => false,"success" => true,"msg" => "Error While Creating Username !");
        }else{
            $this->db->trans_commit();
            /*
            $settings = array(); 
            $settings['messagebody']    = $this->load->view('email/reset-password', $data1, true);
            $settings['to_email']       = $data1['email'];
            // $data['pagename']           = 'register';
            $settings['subject']        = 'Password Reset';
            $msg_send                   = SendUserEmail($settings);    
            */
            $result= array("status" => true,"success" => true,"msg" => 'Username Created successsfully !');
        }
        return $result;    

    }

    public function ResetPassword($pwddata){

        $data = array();
        // echo "Password: ".$pwddata['password'];
        $data['password']               = $this->bcrypt->hash_password($pwddata['password']);
        $data['updated_on']             = date('Y-m-d H:i:s');

        $this->db->trans_begin();

        $this->db->where('id',$pwddata['member_id']);
        $insert  = $this->db->update($this->table,$data);
        // print $this->db->last_query();

        if($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            $result = array("status" => false,"success" => true,"msg" => "Error While Reseting Password !");
        }else{
            $this->db->trans_commit();
            /*
            $settings = array(); 
            $settings['messagebody']    = $this->load->view('email/reset-password', $data1, true);
            $settings['to_email']       = $data1['email'];
            $settings['subject']        = 'Password Reset';
            $msg_send                   = SendUserEmail($settings);    
            */
            $result= array("status" => true,"success" => true,"msg" => 'Password reset successsfully !');
        }
        return $result;    

    }


    public function getBirthday()
    {
         // $sqlQuery = "SELECT id, first_name, FROM family_member WHERE DATE_FORMAT(dob, '%d') =  DAY(CURDATE()) AND DATE_FORMAT(dob, '%m') =  MONTH(NOW()) AND live_type = 'Live' ";
        $this->db->select('fm.id, fm.member_no, CONCAT( fm.first_name, " ", fm.second_name , " ", ms.surname) AS fullname, DATE_FORMAT(dob, "%d %M %Y") AS dob, image, contact');
        $this->db->from('family_member fm');
        $this->db->where("DATE_FORMAT(fm.dob, '%d') = DAY(CURDATE())" );
        $this->db->where("DATE_FORMAT(fm.dob, '%m') = MONTH(NOW())" );
        $this->db->where("fm.live_type","Live" );
        $this->db->join('master_surname ms' ,' fm.surname_id = ms.id','left');

        $query = $this->db->get();
        // print $this->db->last_query();
        return $query->result_array();
    }

    public function getMarannondh()
    {
         // $sqlQuery = "SELECT id, first_name, FROM family_member WHERE DATE_FORMAT(dob, '%d') =  DAY(CURDATE()) AND DATE_FORMAT(dob, '%m') =  MONTH(NOW()) AND live_type = 'Live' ";
        $this->db->select('fm.id, fm.fullname, fm.family_person, fm.family_no, fm.family_id, fm.description, DATE_FORMAT(date, "%d %M %Y") AS date, image, contact');
        $this->db->from('maran_nondh fm');
        $this->db->where("fm.deleted = 0");
        $this->db->where("DATE_FORMAT(fm.date, '%d') = DAY(CURDATE())" );
        $this->db->where("DATE_FORMAT(fm.date, '%m') = MONTH(NOW())" );
        //$this->db->join('family_member ffm' ,' fm.id = ffm.id','left');

        $query = $this->db->get();
        // print $this->db->last_query();
        return $query->result_array();
    }
    
    public function getPrarthana()
    {
         // $sqlQuery = "SELECT id, first_name, FROM family_member WHERE DATE_FORMAT(dob, '%d') =  DAY(CURDATE()) AND DATE_FORMAT(dob, '%m') =  MONTH(NOW()) AND live_type = 'Live' ";
        $this->db->select('fm.id, fm.fullname, fm.family_person, fm.family_no, fm.family_id,  DATE_FORMAT(date, "%d %M %Y") AS date, image');
        $this->db->from('saadri fm');
        $this->db->where("fm.deleted = 0");
        $this->db->where("DATE_FORMAT(fm.date, '%d') = DAY(CURDATE())" );
        $this->db->where("DATE_FORMAT(fm.date, '%m') = MONTH(NOW())" );
        //$this->db->join('family_member ffm' ,' fm.id = ffm.id','left');

        $query = $this->db->get();
        // print $this->db->last_query();
        return $query->result_array();
    }

    public function getMarriage()
    {
         $sqlQuery = 'SELECT fm.id, fm.member_no as h_member_no, ff.member_no as w_member_no, fm.first_name as h_first_name, ff.first_name as w_first_name, CONCAT( fm.first_name, " ", fm.second_name , " ", ms.surname) AS h_name, CONCAT( ff.first_name, " ", ff.second_name , " ", ms.surname) AS w_name, ms.surname as surname, DATE_FORMAT(fm.dom, "%d %M %Y") AS dom, fm.image as h_image,  ff.image as w_image, fm.contact  FROM `family_member` fm left join family_member ff on ff.family_id = fm.family_id AND fm.first_name = ff.second_name AND fm.dom = ff.dom left join master_surname ms on fm.surname_id = ms.id WHERE DATE_FORMAT(fm.dom, "%d") = DAY(CURDATE()) AND DATE_FORMAT(fm.dom, "%m") = MONTH(NOW()) AND fm.sex="M" AND fm.live_type = "Live"';
        // $this->db->select('fm.id, CONCAT( fm.first_name, " ", fm.second_name , " ", ms.surname) AS fullname, DATE_FORMAT(dom, "%d %M %Y") AS dom, image, contact');
        // $this->db->select('id, CONCAT( first_name, " ", second_name , " ", third_name) AS fullname,  DATE_FORMAT(dom, "%d/%M/%Y") AS dom, image, contact');
        // $this->db->from('family_member fm');
        // $this->db->where("DATE_FORMAT(fm.dom, '%d') = DAY(CURDATE())" );
        // $this->db->where("DATE_FORMAT(fm.dom, '%m') = MONTH(NOW())" );
        // $this->db->where("fm.live_type","Live" );
        // $this->db->join('master_surname ms' ,' fm.surname_id = ms.id','left');
        $query = $this->db->query($sqlQuery);
        // print $this->db->last_query();
        return $query->result_array();
    }


    public function getPuniyatithi()
    {
         // $sqlQuery = "SELECT id, first_name, FROM family_member WHERE DATE_FORMAT(dob, '%d') =  DAY(CURDATE()) AND DATE_FORMAT(dob, '%m') =  MONTH(NOW()) AND live_type = 'Live' ";
        $this->db->select('fm.id, fm.member_no, CONCAT( fm.first_name, " ", fm.second_name , " ", ms.surname) AS fullname, DATE_FORMAT(dod, "%d %M %Y") AS dod, image, contact');
        // $this->db->select('id, CONCAT( first_name, " ", second_name , " ", third_name) AS fullname,  DATE_FORMAT(dom, "%d/%M/%Y") AS dom, image, contact');
        $this->db->from('family_member fm');
        $this->db->where("DATE_FORMAT(fm.dod, '%d') = DAY(CURDATE())" );
        $this->db->where("DATE_FORMAT(fm.dod, '%m') = MONTH(NOW())" );
        $this->db->where("fm.live_type","Death" );
        $this->db->join('master_surname ms' ,' fm.surname_id = ms.id','left');
        $query = $this->db->get();
        // print $this->db->last_query();
        return $query->result_array();
    }

    public function getlist() {
        /*{"id":"692","family_id":"324","member_no":"DPF0173-02","family_no":"DPF0173","first_name":"Aarati","second_name":"Laherchand","third_name":"Maganlal","fullname":"Aarati Laherchand Maganlal Maru","surname_id":"106","blood_id":"1","relation_id":"28","marriage_type":"3","education_id":"216","occupation_id":"0","sex":"F","dob":"1972-12-26","dod":null,"dom":null,"contact":"7387211124","email":"","live_type":"Live","image":"DPF0173-02.jpg","member_type":"","surname":"Maru","relation":"Wife","maritalstatus":"Married","dharmikknowledge":null,"occupation":null,"dharmik_id":"0","sports_id":"0","achivements":"","life_insurance":"0","medical_insurance":"0","life_insurance_text":null,"medical_insurance_text":null,"sanjeevni":"0","bloodgroup":"A+"},*/
        $return = array();
        $this->db->select('fm.id, fm.family_id, fm.member_no, fm.family_no, fm.first_name, fm.second_name, fm.third_name, CONCAT_WS(" ", fm.first_name, fm.second_name, fm.third_name, ms.surname) as fullname, fm.surname_id, fm.blood_id, fm.relation_id, fm.marriage_type, fm.education_id, fm.occupation_id, fm.sex, fm.dob, fm.dod, fm.dom, fm.contact, fm.email, fm.fm_status, fm.live_type, fm.image, fm.member_type, ms.surname, mr.relation, mms.maritalstatus,  dk.dharmikknowledge,  edu.education, mo.occupation, fm.dharmik_id, fm.sports_id,  fm.achivements, fm.life_insurance, fm.medical_insurance, fm.life_insurance_text, fm.medical_insurance_text, fm.sanjeevni, mbg.bloodgroup');
        $this->db->from($this->table.' fm'); 
        $this->db->join('master_surname ms' ,' fm.surname_id = ms.id','left');
        $this->db->join('master_bloodgroup mbg' ,' fm.blood_id = mbg.id','left');
        $this->db->join('master_relation mr' ,' fm.relation_id = mr.id','left');
        $this->db->join('master_marital_status mms' ,' fm.marriage_type = mms.id','left');
        $this->db->join('master_occupation mo' ,' fm.occupation_id = mo.id','left');
        $this->db->join('master_education edu', 'edu.id = fm.education_id', 'left');
        $this->db->join('master_dharmik_knowledge dk' ,' fm.dharmik_id = dk.id','left');
        if(!empty($this->_condition)){
            $this->db->where($this->_condition);
        }
        $this->db->where('fm.deleted',0);
        $this->db->order_by('fullname','ASC');
        $query = $this->db->get();
        // print $this->db->last_query();

        return $query->result_array();
    }   



    public function getpendinglist() {
        $return = array();
        $this->db->select('*');
        $this->db->from('family_member');
        $this->db->where('deleted', 0);
        $this->db->where('fm_status', 2);
        $query = $this->db->get();
        $return = $query->result_array();

        return $return;
    } 

    public function rejectprofile($memberdata, $id = '') {
        $this->db->trans_begin();
        $this->db->where('id', $id);
        $this->db->update('family_member', $memberdata);
        if($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            $result = array("status" => false,"false" => true,"msg" => "Error While Rejecting");
        }else{
            $this->db->trans_commit();
            $result = array("status" => true,"success" => true,"msg" => "Member Rejected");
        }
        return $result;
    }

    public function getNewValue($id = '') {
        $return = array();
        $this->db->select('new_value');
        $this->db->from('family_member');
        $this->db->where('id', $id);
        $this->db->where('deleted', 0);
        $this->db->where('fm_status', 2);
        $query = $this->db->get()->row();
        return $query->new_value;
    }   

    public function getSplitMergeHold(){

        $family = array();
        $this->db->select('*');
        $this->db->from('family_master');
        $this->db->where('split_status', 1);
        $query = $this->db->get();
        $family = $query->result_array();
        return $family;

    }
    
    public function getMergeHold(){

        $family = array();
        $this->db->select('fm.id, fm.family_id, fm.family_no, fm.member_no, fm.merge_status, fm.merge_data, fm.merge_user_data, CONCAT_WS(" ", fm.first_name, fm.second_name, ms.surname) AS membername');
        $this->db->from('family_member fm');
        $this->db->join('master_surname ms', 'ms.id = fm.surname_id');
        $this->db->where('fm.merge_status', 1);
        $query = $this->db->get();
        $family = $query->result_array();
        return $family;

    }

    public function getSplitData($id = ''){

        $family = array();
        $this->db->select('*');
        $this->db->from('family_master');
        $this->db->where('id', $id);
        //$this->db->where('split_status', 0);
        $query = $this->db->get()->row();
        //$family = $query->result_array();
        return $query;

    }
    
    public function getMergeData($id = ''){

        $family = array();
        $this->db->select('id, family_id, family_no, member_no, merge_status, merge_flag, merge_data');
        $this->db->from('family_member');
        $this->db->where('id', $id);
        $this->db->where('merge_status', 1);
        $this->db->where('deleted', 0);
        $query = $this->db->get()->row();
        //$family = $query->result_array();
        return $query;

    }
    
    
    /**********************************/
    /************ AUTO SMS *************/
    /**********************************/
    
    public function getBirthdaySMS()
    {
        $this->db->select('fm.id, fm.member_no, CONCAT( fm.first_name, " ", fm.second_name , " ", ms.surname) AS fullname, DATE_FORMAT(dob, "%d %M %Y") AS dob, image, contact');
        $this->db->from('family_member fm');
        $this->db->where("DATE_FORMAT(fm.dob, '%d') = DAY(CURDATE())" );
        $this->db->where("DATE_FORMAT(fm.dob, '%m') = MONTH(NOW())" );
        $this->db->where("fm.live_type","Live" );
        $this->db->where("fm.contact !='' ");
        $this->db->join('master_surname ms' ,' fm.surname_id = ms.id','left');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function getMarriageSMS()
    {
        $sqlQuery = 'SELECT fm.id, fm.member_no, CONCAT( fm.first_name, " ", fm.second_name , " ", ms.surname) AS name, DATE_FORMAT(fm.dom, "%d %M %Y") AS dom, fm.image as image, fm.contact  FROM `family_member` fm left join master_surname ms on fm.surname_id = ms.id WHERE DATE_FORMAT(fm.dom, "%d") = DAY(CURDATE()) AND DATE_FORMAT(fm.dom, "%m") = MONTH(NOW()) AND fm.live_type = "Live" AND fm.contact != "" AND fm.deleted = 0 ';
        $query = $this->db->query($sqlQuery);
        return $query->result_array();
    }

    public function getPuniyatithiSMS()
    {
        $this->db->select('fm.id, fm.family_no, fm.member_no, CONCAT( fm.first_name, " ", fm.second_name , " ", ms.surname) AS fullname, DATE_FORMAT(dod, "%d %M %Y") AS dod, image');
        $this->db->from('family_member fm');
        $this->db->where("DATE_FORMAT(fm.dod, '%d') = DAY(CURDATE())" );
        $this->db->where("DATE_FORMAT(fm.dod, '%m') = MONTH(NOW())" );
        $this->db->where("fm.live_type","Death" );
        $this->db->where("fm.deleted", 0);
        $this->db->join('master_surname ms' , 'fm.surname_id = ms.id','left');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function getPuniyatithiSMSContact($id = '')
    {
        $this->db->select('fm.contact');
        $this->db->from('family_member fm');
        $this->db->where("fm.family_no", $id);
        $this->db->where("fm.relation_id", 22);
        $this->db->where("fm.live_type", "Live");
        $this->db->where("fm.deleted", 0);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function getMemberDetailsMatrimony($id = 0){
        $query = array();
        //$this->db->select('fm.id, , fm.family_no, fm.member_no, fm.email, fm.contact, CONCAT_WS(" ",fm.first_name, fm.second_name, fm.third_name, ms.surname) AS membername, fm.image, medu.education, mocp.occupation');
        $this->db->select('fm.member_no, CONCAT_WS(" ",fm.first_name, fm.second_name, ms.surname) AS membername, medu.education, mocp.occupation');
        $this->db->from('family_member fm');
        $this->db->join('master_surname ms', 'ms.id = fm.surname_id', 'left');
        $this->db->join('master_education medu', 'medu.id = fm.education_id', 'left');
        $this->db->join('master_occupation mocp', 'mocp.id = fm.occupation_id', 'left');
        $this->db->where('fm.deleted', 0);
        $this->db->where('fm.member_no', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
    

}