<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Import extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        /*cache control*/
        $this->path = '';
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->load->helper(array('form', 'url'));
        $this->page_data['client'] = 'web';
        $this->load->model('import_model');
        
    }

    public function index($param='')
    {
        $this->page_data['pagetitle']   = 'Member Data ';
        $this->page_data['pagename']    = 'import';
        $this->page_data['breadcrumb']  = 'Import';
        $this->load->view('admin/main', $this->page_data);
    }

    public function changephotoname(){
        ob_start();
        $data = $this->import_model->GetFilename();
        foreach($data as $row){
            $newdata = array();
            $member_no = $row['member_no'];
            $id = $row['id'];
            $oldimage = $row['image'];
            $newimage = $member_no.".jpg";
            if($oldimage != $newimage){
                $old = FCPATH."uploads/members/".$oldimage;
                $new = FCPATH."uploads/members/".$newimage;
                if(file_exists($old)){
                    rename($old,$new);
                    $newdata['image'] = $newimage;
                    echo "<br> File Renamed from ".$oldimage." to ".$newimage;
                    $this->db->where('id',$id);
                    $this->db->update("family_member",$newdata); 
                }else{
                    echo "<br> File ".$oldimage." not found.";
                    //$newdata['image'] = "noimage.jpg";
                }
            }else{
                echo "<br> File ".$oldimage." is already updated.";
            }
            ob_flush();
            flush();
        }
        echo "<br>Update complete.";
    }

    public function importcsv(){
        ini_set('max_execution_time', 500000);
        ob_start();
       // setlocale(LC_CTYPE, 'en_US');
        $familyNoOld    = '';
        $familyNo       = '';
        $familyCount    = 0;
        $MemberCount = 0;
        $data = array('Response-Status' => FALSE,'Response-Validate' => FALSE, 'Response-Message' => array());
        $import = array();
        if (isset($_FILES['import']) && is_uploaded_file($_FILES['import']['tmp_name'])) {
            $csv = $_FILES['import']['tmp_name'];
            $type = $_FILES['import']['type'];
            // echo "<br>Type: ".$type;
            
            if($type = 'text/csv'){
                $handle = fopen($csv,"r");
                while (($row = fgetcsv($handle, 10000, ",")) != FALSE) //get row vales
                {
                    if(strtolower($row[0])!='memberid'){
                        $familyNo =  isset($row[1]) ? (($row[1] != '') ? $row[1] : '') : '';
                        if($familyNo != $familyNoOld || $familyNo == ''){
                            //echo "FamilyCount : ".$familyCount;
                            //print_r($row);
                            if($familyCount > 0){
                                $family['family_master'] = isset($family_master) ? $family_master : array() ;
                                $family['family_member'] = isset($family_member) ? $family_member : array() ;
                                $family['family_contact'] = isset($family_contact) ? $family_contact : array() ;
                                $family['family_business_contact'] = isset($family_b_contact) ? $family_b_contact : array() ;
                                $family['family_marriage'] = isset($family_marriage) ? $family_marriage : array() ;
                                $family['family_business'] = isset($family_business) ? $family_business : array() ;
                                $import[] = $family;

                                unset($family_master);
                                unset($family_member);
                                unset($family_contact);
                                unset($family_b_contact);
                                unset($family_marriage);
                                unset($family_business);
                                unset($family);
                                $MemberCount = 0;
                            }
                            $family_master['family_id']       = $familyNo;
                            $familyNoOld = $familyNo;
                            $familyCount++;                            
                        }
                        $address_1 = isset($row[35]) ? (($row[35] != '') ? $row[35] : '') : '';
                        $address_2 = isset($row[36]) ? (($row[36] != '') ? $row[36] : '') : '';
                        if($address_1 !=''){
                            $family_master['address_1'] = $address_1;
                        }
                        if($address_2 !=''){
                            $family_master['address_2'] = $address_2; 
                        }
                        $MemberCount++;
                        // Adding Family Contact No.
                        $familycontact =  isset($row[37]) ? (($row[37] != '') ? $row[37] : '') : '';
                        if($familycontact != '' ){
                            $family_contact_inner['contact'] = $familycontact;
                            $family_contact[] = $family_contact_inner ;
                        }
                        // Adding Family Member.
                        $familymember =  isset($row[0]) ? (($row[0] != '') ? $row[0] : '') : '';
                        if($familymember != '' ){
                            $memberNo = str_pad($MemberCount, 2,'0',STR_PAD_LEFT);
                            $family_member_inner['member_no']       = $familyNo.'-'.$memberNo;
                            $family_member_inner['family_no']       = $familyNo;
                            $family_member_inner['first_name']      = isset($row[2]) ? (($row[2] != '') ? $row[2] : '') : '';
                            $family_member_inner['second_name']     = isset($row[3]) ? (($row[3] != '') ? $row[3] : '') : '';
                            $family_member_inner['third_name']      = isset($row[4]) ? (($row[4] != '') ? $row[4] : '') : '';
                            $surname                                = isset($row[5]) ? (($row[5] != '') ? $row[5] : '') : '';
                            $family_member_inner['surname_id']      = $this->getID('master_surname','surname',$surname);
                            $family_member_inner['regd_id']         = isset($row[6]) ? (($row[6] != '') ? $row[6] : '') : '';
                            $family_member_inner['sex']             = isset($row[7]) ? (($row[7] != '') ? $row[7] : '') : '';
                            $bloodgroup                             = isset($row[8]) ? (($row[8] != '') ? $row[8] : '') : '';
                            $family_member_inner['blood_id']        = $this->getID('master_bloodgroup','bloodgroup',$bloodgroup);
                            $relation                               = isset($row[9]) ? (($row[9] != '') ? $row[9] : '') : '';
                            $family_member_inner['relation_id']     = $this->getID('master_relation','relation',$relation);
                            $family_member_inner['dob']             = isset($row[10]) ? (($row[10] != '') ? $row[10] : '') : '';
                            $marriage_type                          = isset($row[11]) ? (($row[11] != '') ? $row[11] : '') : '';
                            $family_member_inner['marriage_type']   = $this->getID('master_marital_status','maritalstatus',$marriage_type);
                            $family_member_inner['dom']             = isset($row[12]) ? (($row[12] != '') ? $row[12] : NULL) : NULL;
                            $education                              = isset($row[13]) ? (($row[13] != '') ? $row[13] : '') : '';
                            $family_member_inner['education_id']    = $this->getID('master_education','education',$education);
                            $occupation                             = isset($row[14]) ? (($row[14] != '') ? $row[14] : '') : '';
                            $family_member_inner['occupation_id']   = $this->getID('master_occupation','occupation',$occupation);
                            $family_member_inner['contact']         = isset($row[15]) ? (($row[15] != '') ? $row[15] : '') : '';
                            $family_member_inner['email']           = isset($row[16]) ? (($row[16] != '') ? $row[16] : '') : '';
                            $family_member_inner['live_type']       = isset($row[17]) ? (($row[17] != '') ? $row[17] : '') : '';
                            $family_member_inner['member_type']     = isset($row[18]) ? (($row[18] != '') ? $row[18] : '') : '';
                            $family_member_inner['image']           = isset($row[19]) ? (($row[19] != '') ? $row[19] : '') : '';
                            $family_member[] = $family_member_inner;
                        }

                        // Adding Marriage Member.
                        $familymarriage =  isset($row[29]) ? (($row[29] != '') ? $row[29] : '') : '';
                        if($familymarriage != '' ){
                            $family_marriage_inner['first_name']      = isset($row[28]) ? (($row[28] != '') ? $row[28] : $row[2]) : $row[2];
                            $family_marriage_inner['second_name']     = isset($row[29]) ? (($row[29] != '') ? $row[29] : '') : '';
                            $family_marriage_inner['third_name']      = isset($row[29]) ? (($row[29] != '') ? $row[29] : '') : '';
                            // $family_marriage_inner['third_name']      = isset($row[28]) ? (($row[28] != '') ? $row[28] : '') : '';
                            $m_surname                                = isset($row[30]) ? (($row[30] != '') ? $row[30] : '') : '';
                            $family_marriage_inner['surname']         = $this->getID('master_surname','surname',$m_surname);
                            $family_marriage_inner['address']         = isset($row[31]) ? (($row[31] != '') ? $row[31] : '') : '';
                            $family_marriage_inner['contact']         = isset($row[32]) ? (($row[32] != '') ? $row[32] : '') : '';
                            $family_marriage_inner['email']         = isset($row[33]) ? (($row[33] != '') ? $row[33] : '') : '';
                            $family_marriage_inner['type']         = isset($row[34]) ? (($row[34] != '') ? $row[34] : '') : '';
                            $family_marriage[] = $family_marriage_inner;
                        }

                        // Adding Business Member.
                        $familybusiness =  isset($row[20]) ? (($row[20] != '') ? $row[20] : '') : '';
                        if($familybusiness != '' ){
                            $family_business_inner['company_name']  = $familybusiness;
                            $family_business_inner['designation']   = isset($row[21]) ? (($row[21] != '') ? $row[21] : '') : '';
                            $family_business_inner['address_1']     = isset($row[22]) ? (($row[22] != '') ? $row[22] : '') : '';
                            $family_business_inner['address_2']     = isset($row[23]) ? (($row[23] != '') ? $row[23] : '') : '';
                            $family_business_inner['pincode']         = isset($row[24]) ? (($row[24] != '') ? $row[24] : '') : '';
                            $family_business_inner['email']         = isset($row[26]) ? (($row[26] != '') ? $row[26] : '') : '';
                            $family_business_inner['website']       = isset($row[27]) ? (($row[27] != '') ? $row[27] : '') : '';
                            $family_business[] = $family_business_inner;
                        }

                         // Adding Business Contact No.
                        $familyBcontact =  isset($row[25]) ? (($row[25] != '') ? $row[25] : '') : '';
                        if($familyBcontact != '' ){
                            $family_b_contact_inner['contact'] = $familyBcontact;
                            $family_b_contact[] = $family_b_contact_inner ;
                        }
                        // if($familyCount > 1){ 
                        //     // echo "<pre>";
                        //     // print_r($import);
                        //     // echo "<hr>";
                        //     $rtn = $this->import_model->save_data($import);
                        //     $data['Response-Status']    = $rtn['status'];
                        //     $data['Response-Message']   = $rtn['msg'];
                        //     echo json_encode($data);
                        //     // print_r($data);
                        //     // echo "</pre>";
                        //     exit;
                        // }

                    }
                }
                if(isset($family_master)){
                    $family['family_master'] = isset($family_master) ? $family_master : array() ;
                    $family['family_member'] = isset($family_member) ? $family_member : array() ;
                    $family['family_contact'] = isset($family_contact) ? $family_contact : array() ;
                    $family['family_business_contact'] = isset($family_b_contact) ? $family_b_contact : array() ;
                    $family['family_marriage'] = isset($family_marriage) ? $family_marriage : array() ;
                    $family['family_business'] = isset($family_business) ? $family_business : array() ;
                    $import[] = $family;

                    unset($family_master);
                    unset($family_member);
                    unset($family_contact);
                    unset($family_b_contact);
                    unset($family_marriage);
                    unset($family_business);
                    unset($family);

                }

                $rtn = $this->import_model->save_data($import);
                $data['Response-Status']    = $rtn['status'];
                $data['Response-Message']   = $rtn['msg'];
            }else{
                $data['Response-Message'] = "Please Upload a CSV File";
            }
        }else{
            $data['Response-Message'] = "Please Upload a CSV File";
        }
         echo json_encode($data);
    }

    public function GetID($table_name,$field_name,$value){
        $id = 0;
        if(trim($value)!= ''){
            $id = $this->IsExist($table_name,$field_name,$value);
            if($id == 0){
                $i_array = array();
                $i_array[$field_name] = trim($value);
                $insert     = $this->db->insert($table_name,$i_array);
                $id         = $this->db->insert_id();
            }

        }
        return $id;
    }

    public function IsExist($table_name,$field_name,$value){
        $return = 0;
        $this->db->select('id');
        $this->db->from($table_name);
        $this->db->where($field_name,$value);
        $result = $this->db->get();
        $query  = $result->result_array();
        if (is_array($query) && count($query) > 0) {
            foreach ($query as $row) {
                $return = $row['id'];
            }
        }
        return $return;
    }

  
}

