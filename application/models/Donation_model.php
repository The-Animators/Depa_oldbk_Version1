<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Donation_model extends MY_Model
{

    public $table;
    public $_primary_key;
    public $_condition;
    public function __construct() {
        parent::__construct();
        $this->table = 'master_donation';
        $this->_primary_key = 'id';
        $this->_condition = array();
    }    

    public function savedata($data){
        $this->db->insert($this->table, $data);
        $error = $this->db->error();
        if($error['code'] == 0){
            $settings = array(); 
            $settings['messagebody']    = $this->load->view('email/donation-receipt', $data, true);
            return array('msg' => 'Donation Added Succesfully', 'status' => true);
        }else{
            return array('msg' => 'Error  On Adding Donation', 'status' => false);
        }
    }

    public function donations_list($id){
        //Fetch Family Details
        $rtn = array();
        $this->db->select('*');
        $this->db->from('master_donation');
        $this->db->where('family_id', $id);
        $this->db->order_by('added_date', 'desc');
        $query = $this->db->get();
        $get_dlist = $query->result_array();
        //$rtn['donations'] = $get_dlist;

        /*if(!empty($family)){
            
            // print_r($family);
            $rtn['family'] = $family;
            $id = $family[0]['id'];

            //Fetch Family Contact
            $this->db->select('*');
            $this->db->from('family_contact');
            $this->db->where('family_id',$id);
            $query = $this->db->get();
            // print $this->db->last_query();
            $rtn['contact'] = $query->result_array();

            //Fetch Member Details
            $this->db->select('fm.id, fm.member_no, CONCAT_WS(" ",fm.first_name, fm.second_name, fm.third_name, ms.surname) as fullname, fm.contact, fm.email, fm.image, fm.relation_id, fm.dod,fm.live_type, fm.delete_reason as reason');
            $this->db->from('family_member fm');
            $this->db->join('master_surname ms' ,' fm.surname_id = ms.id','left');
            $this->db->where('fm.family_id',$id);
            $this->db->where('fm.deleted',0);
            $query = $this->db->get();
            // print $this->db->last_query();
            $rtn['members'] = $query->result_array();
        }*/
        //return $rtn['donations_list']=$get_dlist;

        $rtn['donations_list']=$get_dlist;

        return $rtn;
    }
    

    public function approved($data){
        $this->db->where('id', $data['id']);
        $this->db->update($this->table, array('status' =>1));
        $error = $this->db->error();
        if($error['code'] == 0){
            return array('msg' => 'Donation Succesfully Approved', 'status' => true);
        }else{
            return array('msg' => 'Error On Approving Donation', 'status' => false);
        }
    }

    public function reject($data){
        // print_r($data);
        $this->db->where('id', $data['id']);
        $this->db->update($this->table, array('status' => 2, 'cancel_reason' => $_POST['cancel_reason']));
        $error = $this->db->error();
        if($error['code'] == 0){
            return array('msg' => 'Donation Succesfully Rejected', 'status' => true);
        }else{
            return array('msg' => 'Error On Rejecting Donation', 'status' => false);
        }
    }


    public function getUserEmail($data){
        /*$this->db->trans_begin();
        $this->db->select('email')->from('master_donation')->where('id', $data['id']);
        $data = $this->db->get()->row();
        $r = $data->email;*/

        $this->db->select('*')->from('master_donation')->where('id', $data['id']);
        $data = $this->db->get();
        $r = $data->result_array();
        return $r;
    }

    //update_receipt
    public function update_receipt($id, $rno){
        $this->db->where('id', $id);
        $this->db->update($this->table, array('recept_number' => $rno));
        $error = $this->db->error();
        if($error['code'] == 0){
            return array('msg' => 'Donation Updated', 'status' => true);
        }else{
            return array('msg' => 'Error On Updating', 'status' => false);
        }
    }
    
    public function getList($status = '') {
        $this->db->select('*');
        $this->db->from('master_donation');
        if($status != ''){
            if($status == 'pending'){
                $cond = 0;
            }else if($status == 'approved'){
                $cond = 1;
            }else if($status == 'reject'){
                $cond = 2;
            }
            $this->db->where('status', $cond);
        }
        $this->db->order_by('added_date', 'desc');
       $data = $this->db->get();
       // print $this->db->last_query();
       $r = $data->result_array();
       return $r;
    }
    
    public function getIndianRupee($number){
        $decimal = (string)($number - floor($number));
        $money = floor($number);
        $length = strlen($money);
        $delimiter = '';
        $money = strrev($money);

        for($i=0;$i<$length;$i++){
            if(( $i==3 || ($i>3 && ($i-1)%2==0) )&& $i!=$length){
                $delimiter .=',';
            }
            $delimiter .=$money[$i];
        }

        $result = strrev($delimiter);
        $decimal = preg_replace("/0\./i", ".", $decimal);
        $decimal = substr($decimal, 0, 3);

        if( $decimal != '0'){
            $result = $result.$decimal;
        }
        $result = $result." /-";

        return $result;
    }
    
    public function getIndianCurrency(float $number)
    {
        $decimal = round($number - ($no = floor($number)), 2) * 100;
        $hundred = null;
        $digits_length = strlen($no);
        $i = 0;
        $str = array();
        $words = array(0 => '', 1 => 'one', 2 => 'two',
            3 => 'three', 4 => 'four', 5 => 'five', 6 => 'six',
            7 => 'seven', 8 => 'eight', 9 => 'nine',
            10 => 'ten', 11 => 'eleven', 12 => 'twelve',
            13 => 'thirteen', 14 => 'fourteen', 15 => 'fifteen',
            16 => 'sixteen', 17 => 'seventeen', 18 => 'eighteen',
            19 => 'nineteen', 20 => 'twenty', 30 => 'thirty',
            40 => 'forty', 50 => 'fifty', 60 => 'sixty',
            70 => 'seventy', 80 => 'eighty', 90 => 'ninety');
        $digits = array('', 'hundred','thousand','lakh', 'crore');
        while( $i < $digits_length ) {
            $divider = ($i == 2) ? 10 : 100;
            $number = floor($no % $divider);
            $no = floor($no / $divider);
            $i += $divider == 10 ? 1 : 2;
            if ($number) {
                $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
                $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
                $str [] = ($number < 21) ? $words[$number].' '. $digits[$counter]. $plural.' '.$hundred:$words[floor($number / 10) * 10].' '.$words[$number % 10]. ' '.$digits[$counter].$plural.' '.$hundred;
            } else $str[] = null;
        }
        $Rupees = implode('', array_reverse($str));
        $paise = ($decimal > 0) ? "." . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' Paise' : '';
        return ($Rupees ? $Rupees . 'Rupees ' : '') . $paise;
    }


}