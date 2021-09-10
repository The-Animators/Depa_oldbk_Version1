<?php
defined('BASEPATH') or exit('No direct script access allowed');
header('Content-Type: application/json');

require APPPATH . './libraries/REST_Controller.php';

class Autosms extends REST_Controller{

    public function __construct(){
        parent::__construct();
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->load->model('member_model' ,'member');
    }
    
    public function index_get($id = '') {
        
    }

    public function birthday_get() {
        
        //Dear {#var#} Wish You A Many Many Happy Returns of The Day - from SHREE DEPA JAIN MAHAJAN TRUST
        //"1207162764682004065"
        
        $newSet 	= array();

        $result = $this->member->getBirthdaySMS();
        $count = count($result);

        for ($i = 0; $i < $count; $i++) {

        	$fullname 	= $result[$i]['fullname'];
        	$contact 	= $result[$i]['contact'];
        	
        	$msg        = 'Dear '.$fullname.' Wish You A Many Many Happy Returns of The Day - from SHREE DEPA JAIN MAHAJAN TRUST';
            $template   = "1207162764682004065";

        	$data = array(
        		"id" 			=>	$result[$i]['id'],
		        "member_no"		=>	$result[$i]['member_no'],
		        "fullname"		=>	$result[$i]['fullname'],
		        "dob"			=>	$result[$i]['dob'],
		        "image"			=>	$result[$i]['image'],
		        "contact"		=>	$result[$i]['contact']
        	);

        	array_push($newSet, $data);

        	sendsms($contact, $msg, $template);

        }

        print_r(json_encode($newSet, JSON_PRETTY_PRINT));
        die();

    }

    public function anniversary_get() {
        
        //Dear {#var#} Wish You A Very Happy Marriage Anniversary - from SHREE DEPA JAIN MAHAJAN TRUST
        //"1207162764665137833"
        
        $newSet 	= array();

        $result = $this->member->getMarriageSMS();
        $count = count($result);

        for ($i = 0; $i < $count; $i++) {
            
            $name 	    = $result[$i]['name'];
        	$contact 	= $result[$i]['contact'];
        	
        	$msg        = 'Dear '.$name.' Wish You A Very Happy Marriage Anniversary - from SHREE DEPA JAIN MAHAJAN TRUST';
            $template   = "1207162764665137833";
        	
        	$data = array(
        		"id" 			=>	$result[$i]['id'],
		        "member_no"		=>	$result[$i]['member_no'],
		        "name"			=>	$result[$i]['name'],
		        "dom"			=>	$result[$i]['dom'],
		        "image"			=>	$result[$i]['image'],
		        "contact"		=>	$result[$i]['contact']
        	);

        	array_push($newSet, $data);

        	sendsms($contact, $msg, $template);

        }

        print_r(json_encode($newSet, JSON_PRETTY_PRINT));
        die();

    }

    public function punyatithi_get() {
        
        //Dear Member, May God Bless Peace To The Soul of {#var#} - from SHREE DEPA JAIN MAHAJAN TRUST
        //"1207162764673833032"

    	$newSet = array();

        $resultp = $this->member->getPuniyatithiSMS();
        $count = count($resultp);

        for ($i = 0; $i < $count; $i++) {

        	$getFamilyNo = $resultp[$i]['family_no'];
        	$contact = $this->member->getPuniyatithiSMSContact($getFamilyNo);
        	
        	$name 	    = $resultp[$i]['fullname'];
        	$phone 	    = $contact[0]['contact'];
        	
        	$msg        = 'Dear Member, May God Bless Peace To The Soul of '.$name.' - from SHREE DEPA JAIN MAHAJAN TRUST';
            $template   = "1207162764673833032";

        	$data = array(
        		"id" 		=> $resultp[$i]['id'],
		        "family_no" => $resultp[$i]['family_no'],
		        "member_no" => $resultp[$i]['member_no'],
		        "fullname" 	=> $resultp[$i]['fullname'],
		        "dod" 		=> $resultp[$i]['dod'],
		        "image" 	=> $resultp[$i]['image'],
		        "contact" 	=> $contact[0]['contact']
        	);

        	array_push($newSet, $data);

        	sendsms($phone, $msg, $template);
        }

        print_r(json_encode($newSet, JSON_PRETTY_PRINT));
        die();

    }

}