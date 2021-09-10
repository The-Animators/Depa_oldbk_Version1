<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('actionbtn')) {
    $btn = '';
    function actionbtn($id, $setting=false){
    	if($setting == false){
    		$btn = "<span class='wrapper'>
				    <a title=\"Edit details\" data-id='".$id."' class=\"btn btn-sm btn-clean btn-icons btn-icon-sm getdetail\"> 
				    	<i class=\"zmdi zmdi-edit\"></i> 
				    </a> 
				    <a title=\"Delete\" class=\"btn btn-sm btn-clean btn-icons btn-icon-sm delete\" onclick=\"deletemodal('confirmation','Delete_User','".$id."')\"> 
				    	<i class=\"zmdi zmdi-delete\"></i> 
				    </a>
				</span>";
    	}else{
    		$btn = "<span class='wrapper'>
				    	<div class=\"dropdown\"> 
				    		<a data-toggle=\"dropdown\" class=\"btn btn-sm btn-clean btn-icons btn-icon-sm\"> 
				    			<i class=\"zmdi zmdi-settings\"></i> 
				    		</a>
				        	<div class=\"dropdown-menu dropdown-menu-right\"> 
				        		<a href=\"#\" class=\"dropdown-item\">
				        			<i class=\"zmdi zmdi-edit\"></i> 
				        			Edit Details
				        		</a> 
				        		<a href=\"#\" class=\"dropdown-item\">
				        			<i class=\"la la-leaf\"></i> 
				        			Update Status
				        		</a> 
				        		<a href=\"#\" class=\"dropdown-item\">
				        			<i class=\"la la-print\"></i> Generate Report
				        		</a> 
				        	</div>
				    	</div> 
				    <a title=\"Edit details\" data-id='".$id."' class=\"btn btn-sm btn-clean btn-icons btn-icon-sm getdetail\"> 
				    	<i class=\"zmdi zmdi-edit\"></i> 
				    </a> 
				    <a title=\"Delete\" class=\"btn btn-sm btn-clean btn-icons btn-icon-sm delete\" data-id='".$id."'> 
				    	<i class=\"zmdi zmdi-delete\"></i> 
				    </a>
				</span>";
    	}
        return $btn;
    }
}


if (!function_exists('actionicon')) {
    $btn='';
    function actionicon($editurl,$id){
        $btn = "<a href='javascript:void(0)' class='delete' data-id='".$id."' title='Delete'>
        			<i class='fa fa-trash'></i>
        		</a>
                <a href='".base_url()."admin/advisor/detail/".$id."' data-id='".$id."' title='View Detail'>
                	<i class='fa fa-eye'></i>
                </a>";
        return $btn;
    }
}


if (!function_exists('getmaster')){
	function getmaster($master_type = '', $return_type = '', $selectplaceholder = '', $selectoption = ''){
		$table = '';
		if($master_type == 'area'){
			$table = 'master_area';
		}else if($master_type == 'bloodgroup'){
			$table = 'master_bloodgroup';
		}else if($master_type == 'dharmik_knowledge'){
			$table = 'master_dharmik_knowledge';
		}else if($master_type == 'donation_category'){
			$table = 'master_donation_category';
		}else if($master_type == 'business_category'){
			$table = 'master_business_category';
		}else if($master_type == 'education'){
			$table = 'master_education';
		}else if($master_type == 'marital_status'){
			$table = 'master_marital_status';
		}else if($master_type == 'occupation'){
			$table = 'master_occupation';
		}else if($master_type == 'relation'){
			$table = 'master_relation';
		}else if($master_type == 'sports'){
			$table = 'master_sports';
		}else if($master_type == 'surname'){
			$table = 'master_surname';
		}else if($master_type == 'village'){
			$table = 'master_village';
		}else if($master_type == 'subscription'){
			$table = 'master_subscription';
		}

		$ci =& get_instance();
	    $ci->load->database();
		$return = array();
		$query  = $ci->db->query("SELECT * FROM ".$table." WHERE deleted = 0");
		$data   = $query->result_array();
		if($return_type == 'html'){
			if( is_array( $data ) && count( $data ) > 0 ){
				$return[''] = 'Select '.ucwords($selectplaceholder);
				foreach($data as $row){
					$return[$row['id']] = $row[$selectoption];
				}
			}
		}else if($return_type == 'json'){
			$return = $data;	
		}
		return $return;
	}
}


if (!function_exists('getFamilyHead')){
	function getFamilyHead($type=''){
		$ci =& get_instance();
	    $ci->load->database();
		$return = array();
		$ci->db->select('fm.id,fm.family_id, fm.member_no, fm.family_no, CONCAT_WS(" ", fm.first_name, fm.second_name, fm.third_name, ms.surname, " - ", fm.contact) as fullname');
		$ci->db->from('family_member fm');
		$ci->db->join('master_surname ms' ,' fm.surname_id = ms.id','left');
		$ci->db->where('fm.relation_id', 22);
        $ci->db->where('fm.live_type != ', 'Death');
        $ci->db->order_by('fullname');
		$query  = $ci->db->get();
		$data   = $query->result_array();
		if($type == 'html'){
			if( is_array( $data ) && count( $data ) > 0 ){
				$return[''] = 'Select Relation';
				foreach($data as $row){
					$return[$row['id']] = $row['relation'];
				}
			}
		}else{
			$return = $data;	
		}
		return $return;
	}
}

if (!function_exists('getrelation')){
	function getrelation($type=''){
		$ci =& get_instance();
	    $ci->load->database();
		$return = array();
		$query  = $ci->db->query("SELECT * FROM master_relation WHERE deleted = 0");
		$data   = $query->result_array();
		if($type=='html'){
			if( is_array( $data ) && count( $data ) > 0 ){
				$return[''] = 'Select Relation';
				foreach($data as $row){
					$return[$row['id']] = $row['relation'];
				}
			}
		}else{
			$return = $data;	
		}
		return $return;
	}
}

/*
sms.theanimator.in/client
Sender Id- DEPASA
User- depa
Pass- Depa587
PE ID - 1201161685177339456
Template Id- 1207161822005340487


$message = urlencode("This is an example message to test sms.");
$url ="http://domainname/sendsms/sendsms.php?username=XXXX&password=XXXXX&type=TEXT&sender=Alerts&mobile=XXXXXXXXXX&message=$message";
$return = file($url);
$msgcode = split("\|",$return[0]);
if ($msgcode[0] == "1701"){
echo "Message sent successfully";}
else{
echo "Message Failed";}
exit();

		$username	= "purnam";
		$password	= "express";
		$mobileno	= $mobile;
		$senderid	= "PURNAM";
		$cdm		  = "alert";
		$message	= $message;
		
		http://sms.theanimator.in/sendsms/sendsms.php?username=TAdepa&password=Depa587&type=TEXT&sender=DEPASA&mobile=8369965108&message=$sms_body&peId=1201161685177339456&tempId=1207161822005340487
*/

if(!function_exists('sendsms')){
	function sendsms($mobile,$message,$templateid){
		$data 		= array();
		$username	= "TAdepa";
		$password	= "Depa28ps";
		$mobileno	= $mobile;
		$senderid	= "DEPASA";
// 		$cdm		= "alert";
		$message	= $message;
		$pe_id      = "1201161685177339456";
// 		$tempid      = "1207161822005340487"; //OTP Sms
		$tempid      = $templateid;
// 		$flash		= "flas";
		$message	= urlencode($message);
// 		http://www.nooranisms.org/gosms.aspx?user=purnam&pass=express&msg=hello&mobs=9820686479&sender=purnam
		$baseurl  	= "http://sms.theanimator.in/sendsms/sendsms.php";
		$url	    = $baseurl."?username=".$username."&password=".$password."&type=TEXT&sender=".$senderid."&message=".$message."&mobile=".$mobileno."&peId=".$pe_id."&tempId=".$tempid;
		$ch 		= curl_init ($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$string = curl_exec($ch);
		if(curl_error($ch)) {
			$data =  array('status'=>false,'msg'=>'ERROR ON SMS SENT! ['.curl_error($ch).']');
		    //fwrite($fp, curl_error($ch));
		}else{
			$data =  array('status'=>true,'msg'=>'SMS SUCCESSFULLY SENT ON DEPA!');
		}
		curl_close($ch);
		
		/*$return = file($url);
$msgcode = split("\|",$return[0]);
if ($msgcode[0] == "1701"){
$data =  array('status'=>true,'msg'=>'SMS SUCCESSFULLY SENT ON DEPA!');
}
else{
$data =  array('status'=>false,'msg'=>'ERROR ON SMS SENT! ['.$msgcode[0].']');    
}*/
		
		return $data;
		// curl_setopt ($ch, CURLOPT_COOKIEJAR, $ckfile);
		// curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
		// $string  	= curl_exec ($ch);
		// //$string   	= file_get_contents ($url);
		// if($string != ""){
		// 	return array('status'=>true,'msg'=>'SMS SUCCESSFULLY SENT!['.$string.']');
		// }else{
		// 	return array('status'=>false,'msg'=>'ERROR ON SMS SENT!');
		// }
	}
}

if (!function_exists('SendUserEmail')) {
    function SendUserEmail($settings){
         $ci=& get_instance();

        if(isset($settings['to_email'])){
	 		$config = Array(
	            'protocol'  => 'sendmail',
	            'smtp_host' => $ci->config->item('smtp_host'),
	            'smtp_port' => $ci->config->item('smtp_port'),
	            'smtp_user' => $ci->config->item('smtp_user'),
	            'smtp_pass' => $ci->config->item('smtp_pass'),
	            'mailtype'  => 'html',
	            // 'charset' 	=> 'utf-8',
	            'starttls'  => true,
	            'newline'   => "\r\n"
	        );

	        $ci->email->initialize($config);
            // $ci->load->library('email',$config);
            //$ci->email->initialize($config);
            $ci->email->from($ci->config->item('smtp_user'), $ci->config->item('company_name'));
            /*
            $ci->email->to('someone@example.com');
            $ci->email->to('one@example.com, two@example.com, three@example.com');
            $ci->email->to(array('one@example.com', 'two@example.com', 'three@example.com'));
            */
            $ci->email->to($settings['to_email']);
            
            if(isset($settings['cc_email'])) $ci->email->cc($settings['cc_email']);

            if(isset($settings['bcc_email'])) $ci->email->bcc($settings['bcc_email']);

            if(!isset($settings['subject'])) $settings['subject'] = 'No Subject'; 
            if(!isset($settings['messagebody'])) $settings['messagebody'] = '';

            $ci->email->set_mailtype("html");

            $ci->email->subject($settings['subject']);
            $ci->email->message($settings['messagebody']);
            if(isset($settings['attachments'])){
                foreach($settings['attachments'] as $filename){
                    $ci->email->attach($filename);
            //        $ci->email->attach('/path/to/photo2.jpg');
                }
            }
			$tst = $ci->email->send();
			if($tst == true){
				return array('status'=>true,'msg'=>'Email Successfully sent!');
			}else{
				return array('status'=>false,'msg'=>$ci->email->print_debugger());
			}
        }
    }
}

if (!function_exists('sendemail')){
     function sendemail($sendto, $type = 'general', $arraydata = array()){
     	$data = array();
        $ci=& get_instance();
        if($type != 'setting'){
	        $ci->load->database();
			$ci->db->select('*')->from('email_setting');
		    $sql 	= $ci->db->get();
	        $rtn 	= $sql->result_array();
	        if(count($rtn) > 0){
	        	$result = $rtn[0];
	        }else{
	        	$result = array();;
	        }
        }else{
        	$result = $arraydata;
        }

        if(count($result) == 0){
            $data['status']   	= false;
            $data['validate'] 	= true;
            $data['message']  	= 'Email Config Setting Missisng!!!';
            $data['mailerror']  = '';
        }else{
	 		$config = Array(
	            'protocol'  => 'smtp',
	            'smtp_host' => $result['smtp_host'],
	            'smtp_port' => $result['smtp_port'],
	            'smtp_user' => $result['smtp_username'],
	            'smtp_pass' => $result['smtp_password'],
	            'mailtype'  => 'html',
	            'starttls'  => true,
	            'newline'   => "\r\n"
	        );
	        $emailBody 		= $result['msg_body'] ?? 'Test Email Body From Dashboard';
	        $emailSubject 	= $result['subject'] ?? 'Test Email From Dashboard';
	        if($type == 'visitor'){
	        	$emailBody = str_replace('%employee_name%', $arraydata['employee_name'], $emailBody);
	        	$emailBody = str_replace('%visitor_name%', $arraydata['visitor_name'], $emailBody);
	        	$emailBody = str_replace('%visitor_company_name%', $arraydata['visitor_company_name'], $emailBody);
	        	$emailBody = str_replace('%visit_purpose%', $arraydata['visit_purpose'], $emailBody);
	        	$emailBody = str_replace('%visiting_time%', $arraydata['visiting_time'], $emailBody);
	        }
	        // echo "\nEmail Body : \n";
	        // echo $emailBody;
	        // exit;
	        $systemsetting = getsystemsetting();
	        $ci->load->library('email', $config);
	        $ci->email->from($result['smtp_username'], $systemsetting['app_name']);
	        $ci->email->to($sendto);
	        $ci->email->subject($emailSubject);
	        $ci->email->message($emailBody);
            $tst = $ci->email->send();
            if ($tst== true) {
                $data['status']   	= true;
                $data['validate'] 	= true;
                $data['message']  	= 'Email Successfully Sent!!!';
                $data['mailerror']  = '';
            } else {
                $data['status']     = false;
                $data['validate']   = true;
                $data['message']    = 'Error On Sending Email';
                $data['mailerror']  = $ci->email->print_debugger();
            }
    	}
    	return $data;
	}
}

if (!function_exists('timezones')){
	 function timezones(){
		$zones_array = array();
		$timestamp = time();
		foreach(timezone_identifiers_list() as $key => $zone) {
			date_default_timezone_set($zone);
			$offset 		= (int) ((int) date('O', $timestamp))/100;
			$diff_from_GMT	= 'UTC/GMT ' . date('P', $timestamp);
			$zones_array[$zone] = $zone. " (".$diff_from_GMT.")";
		}
		ksort($zones_array); 
   		return $zones_array;
	}
}

/**
 * link the css files 
 * 
 * @param array $array
 * @return print css links
 */
if (!function_exists('load_css')) {

    function load_css(array $array) {
        foreach ($array as $uri) {
            echo "<link rel='stylesheet' type='text/css' href='" . base_url($uri) . "' />\n";
        }
    }

}

/**
 * link the javascript files 
 * 
 * @param array $array
 * @return print js links
 */
if (!function_exists('load_js')) {

    function load_js(array $array) {
        foreach ($array as $uri) {
            echo "<script type='text/javascript'  src='" . base_url($uri) . "'></script>\n";
        }
    }

}

/**
 * Get member Full name 
 * 
 * @param int $memberid
 * @return string $fullname
 */
if (!function_exists('getFullname')) {

    function getFullname($member_id) {
 		$ci =& get_instance();
	    $ci->load->database();
       $fullname = '';
        $query   = "SELECT CONCAT_WS(' ', first_name, second_name, third_name) AS full_name FROM family_member WHERE id = ?";       
        $runtwo  = $ci->db->query($query, array($member_id));
        // print $this->db->last_query();
        $row     = $runtwo->row();
        $numrows = $runtwo->num_rows();
        if ($numrows === 1) {
			$fullname =  $row->full_name ; 
		}
		return $fullname;
    }

}
/**
 * Get member Full name 
 * 
 * @param int $memberid
 * @return string $fullname
 */
if (!function_exists('upload_image')) {

    function upload_image($file_name ='', $path ='', $img ='', $type='') {
 		$ci =& get_instance();

        $ci->load->library('upload');
        $config    = array();
        $upload_path        = $ci->config->item('upload_path');
        $config['upload_path']   = $upload_path .''. $path;
        // if($what != 'video')
        $config['allowed_types'] = $type;
        $config['overwrite']     = false;
        $config['encrypt_name']  = false;
        $config['remove_spaces'] = true;
        $config['file_name']     = $file_name;
        if($img == 'file'){
            $config['max_size']      = '5000'; // max_size in kb
        }
        // print_r($config);
        $rtn = array();
        $this->upload->initialize($config);    
        if($this->upload->do_upload($img)){
            $uploaddata         = array('upload_data' => $this->upload->data());
            // print_r($uploaddata);
            $filename               = $uploaddata['upload_data']['file_name'];
            // echo "inside upload_web Filename: [".$filename."]\n"; 
            $rtn = array('filename'=>$filename,'status'=>true);
        }else{
            // echo "Error:".$this->upload->file_type;
            $filename = '['.$config.']['.$upload_path.']'. $this->upload->display_errors();
            $rtn =  array('filename'=>$filename,'status'=>false);
        }
        unset($config);
        return $rtn;
    }
}