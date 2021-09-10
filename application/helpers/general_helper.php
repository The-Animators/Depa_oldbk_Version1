<?php
/*
SELECT mv.name as visitor_name, em.emp_name, mm.purpose, mm.added_date as in_time, mm.checkouttime as out_time FROM `master_meeting` mm left join master_visitor mv on mv.id = mm.vis_id left join employee_master em on em.id = mm.emp_to_meet
*/

/**
 * send mail
 * 
 * @param string $to
 * @param string $subject
 * @param string $message
 * @param array $optoins
 * @return true/false
 */
if (!function_exists('send_app_mail')) {

    function send_app_mail($to, $subject, $message, $optoins = array()) {
        $email_config = Array(
            'charset' => 'utf-8',
            'mailtype' => 'html'
        );

        //check mail sending method from settings
        if (get_setting("email_protocol") === "smtp") {
            $email_config["protocol"] = "smtp";
            $email_config["smtp_host"] = get_setting("email_smtp_host");
            $email_config["smtp_port"] = get_setting("email_smtp_port");
            $email_config["smtp_user"] = get_setting("email_smtp_user");
            $email_config["smtp_pass"] = get_setting("email_smtp_pass");
        }

        $ci = get_instance();
        $ci->load->library('email', $email_config);
        $ci->email->clear();
        $ci->email->set_newline("\r\n");
        $ci->email->from(get_setting("email_sent_from_address"), get_setting("email_sent_from_name"));
        $ci->email->to($to);
        $ci->email->subject($subject);
        $ci->email->message($message);

        //add attachment
        $attachments = get_array_value($optoins, "attachments");
        if (is_array($attachments)) {
            foreach ($attachments as $value) {
                $ci->email->attach(trim($value));
            }
        }

        //check cc
        $cc = get_array_value($optoins, "cc");
        if ($cc) {
            $ci->email->cc($cc);
        }

        //send email
        if ($ci->email->send()) {
            return true;
        } else {
            //show error message in none production version
            if (ENVIRONMENT !== 'production') {
                show_error($ci->email->print_debugger());
            }
            return false;
        }
    }

}

if (!function_exists('checkSecretCode')){

    function checkSecretCode($code){
      
        if($code == SECRETCODE){
            return true;
        }else{
            return false;
        }
    }

}

if (!function_exists('getEvents')){

    function getEvents($id = ''){
        $ci =& get_instance();
        //returns all rows if the id parameter doesn't exist,
        //otherwise single row will be returned
        $condition['deleted'] = 0;
        if($id){
            $condition['id'] = $id;
        }else{
        $ci->load->model('event_model' ,'event');
        // get_all_where($where = array(), $limit = 1000000, $offset = 0)
        $result = $ci->event->get_all_where($condition,3,0,'event_date');      
        return $result;
        }
    }
}

if (!function_exists('getBlogs')){

    function getBlogs(){
        $ci =& get_instance();
        $ci->load->model('blog_model' ,'blog');
        $orderby = 'added_on';
        $limit   = 3;
        $condition['deleted'] = 0;
        $result = $ci->blog->getFooter();
        return $result;
    }

}
if (!function_exists('getcompany')){

    function getcompany(){
        $ci =& get_instance();
        $ci->load->database();
        $query  = $ci->db->query("SELECT * FROM master_company");
        if($query->num_rows() > 0){
            $return = $query->result_array();
            return $return[0];
        }else{
            return array();
        }
    }

}

if (!function_exists('getmaster')){

    function getmaster($master_type = '', $return_type = ''){
        $ci =& get_instance();
        $ci->load->database();
        $query  = $ci->db->query("SELECT * FROM system_settings");
        $count  = $query->num_rows();
        if($count > 0){
            $return = $query->result_array();
            return $return[0];
        }else{
            return array();
        }
    }

}

if (!function_exists('format_to_relative_time')) {

    function format_to_relative_time($date_time, $convert_to_local = true, $is_short_date = false) {
        if ($convert_to_local) {
            $date_time = convert_date_utc_to_local($date_time);
        }
        $systemsetting = getsystemsetting();

        $target_date = new DateTime($date_time);
        $now = new DateTime();
        $now->setTimezone(new DateTimeZone($systemsetting['timezone'] ?? 'Asia/Kolkata'));
        $today = $now->format("Y-m-d");
        $date = "";
        $short_date = "";
        if ($now->format("Y-m-d") == $target_date->format("Y-m-d")) {
            $date = 'Today at';   //today
            $short_date = 'Today';
        } else if (date('Y-m-d', strtotime(' -1 day', strtotime($today))) === $target_date->format("Y-m-d")) {
            $date = "Yesterday at"; //yesterday
            $short_date = "Yesterday";
        } else if ($target_date->format("y") === $now->format("y")) {
            $date = $target_date->format("M d"); //this year
            $short_date = $target_date->format("d, F");
        } else {
            $date = $target_date->format("M d, Y");  //general date format
            $short_date = $date;
        }
        if ($is_short_date) {
            return $short_date;
        } else {
            return $date . " " . convert_time_to_12hours_format($target_date->format("H:i:s"));
        }
    }

}

/**
 * get current utc time
 * 
 * @param string $format
 * @return utc date
 */
if (!function_exists('get_current_utc_time')) {

    function get_current_utc_time($format = "Y-m-d H:i:s") {
        $d = DateTime::createFromFormat("Y-m-d H:i:s", date("Y-m-d H:i:s"));
        $d->setTimeZone(new DateTimeZone("UTC"));
        return $d->format($format);
    }

}

/**
 * convert a UTC time to local timezon as defined on users setting
 * 
 * @param string $date_time
 * @param string $format
 * @return local date
 */
if (!function_exists('convert_date_utc_to_local')) {

    function convert_date_utc_to_local($date_time, $format = "Y-m-d H:i:s") {
        $date = new DateTime($date_time . ' +00:00');
        $systemsetting = getsystemsetting();
        $date->setTimezone(new DateTimeZone($systemsetting['timezone'] ?? 'Asia/Kolkata'));
        return $date->format($format);
    }

}

/**
 * get current users local time
 * 
 * @param string $format
 * @return local date
 */
if (!function_exists('get_my_local_time')) {

    function get_my_local_time($format = "Y-m-d H:i:s") {
        return date($format, strtotime(get_current_utc_time()) + get_timezone_offset());
    }

}

/**
 * convert time string to 24 hours format 
 * 01:00 AM will be converted as 13:00:00 
 * 
 * @param string $time  required time format = 01:00 AM/PM
 * @return 24hrs time
 */
if (!function_exists('convert_time_to_24hours_format')) {
    function convert_time_to_24hours_format($time = "00:00 AM") {
        if (!$time)
            $time = "00:00 AM";

        if (strpos($time, "AM")) {
            $time = trim(str_replace("AM", "", $time));
            $check_time = explode(":", $time);
            if ($check_time[0] == 12) {
                $time = "00:" . get_array_value($check_time, 1);
            }
        } else if (strpos($time, "PM")) {
            $time = trim(str_replace("PM", "", $time));
            $check_time = explode(":", $time);
            if ($check_time[0] > 0 && $check_time[0] < 12) {
                $time = $check_time[0] + 12 . ":" . get_array_value($check_time, 1);
            }
        }
        $time.=":00";
        return $time;
    }
}

/**
 * convert time string to 12 hours format 
 * 13:00:00 will be converted as 01:00 AM
 * 
 * @param string $time  required time format =  00:00:00
 * @return 12hrs time
 */
if (!function_exists('convert_time_to_12hours_format')) {
    function convert_time_to_12hours_format($time = "") {
        $systemsetting = getsystemsetting();
        if ($time) {
            $am = " AM";
            $pm = " PM";
            /*if (get_setting("time_format") === "small") {
                $am = " am";
                $pm = " pm";
            }*/
            $check_time = explode(":", $time);
            $hour = $check_time[0] * 1;
            $minute = get_array_value($check_time, 1) * 1;
            $minute = ($minute < 10) ? "0" . $minute : $minute;

            if ($hour == 0) {
                $time = "12:" . $minute . $am;
            } else if ($hour == 12) {
                $time = $hour . ":" . $minute . $pm;
            } else if ($hour > 12) {
                $hour = $hour - 12;
                $hour = ($hour < 10) ? "0" . $hour : $hour;
                $time = $hour . ":" . $minute . $pm;
            } else {
                $hour = ($hour < 10) ? "0" . $hour : $hour;
                $time = $hour . ":" . $minute . $am;
            }
            return $time;
        }
    }
}

/**
 * prepare a decimal value from a time string
 * 
 * @param string $time  required time format =  00:00:00
 * @return number
 */
if (!function_exists('convert_time_string_to_decimal')) {

    function convert_time_string_to_decimal($time = "00:00:00") {
        $hms = explode(":", $time);
        return $hms[0] + ($hms[1] / 60) + ($hms[2] / 3600);
    }

}

/**
 * prepare a human readable time format from a decimal value of seconds
 * 
 * @param string $seconds
 * @return time
 */
if (!function_exists('convert_seconds_to_time_format')) {

    function convert_seconds_to_time_format($seconds = 0) {
        $is_negative = false;
        if ($seconds < 0) {
            $seconds = $seconds * -1;
            $is_negative = true;
        }
        $seconds = $seconds * 1;
        $hours = floor($seconds / 3600);
        $mins = floor(($seconds - ($hours * 3600)) / 60);
        $secs = floor($seconds % 60);

        $hours = ($hours < 10) ? "0" . $hours : $hours;
        $mins = ($mins < 10) ? "0" . $mins : $mins;
        $secs = ($secs < 10) ? "0" . $secs : $secs;

        $string = $hours . ":" . $mins . ":" . $secs;
        if ($is_negative) {
            $string = "-" . $string;
        }
        return $string;
    }

}

/**
 * get seconds form a given time string
 * 
 * @param string $time
 * @return seconds
 */
if (!function_exists('convert_time_string_to_second')) {

    function convert_time_string_to_second($time = "00:00:00") {
        $hms = explode(":", $time);
        return $hms[0] * 3600 + ($hms[1] * 60) + ($hms[2]);
    }

}


/**
 * check the array key and return the value 
 * 
 * @param array $array
 * @return extract array value safely
 */
if (!function_exists('get_array_value')) {

    function get_array_value(array $array, $key) {
        if (array_key_exists($key, $array)) {
            return $array[$key];
        }
    }

}

/*
if (!function_exists('slugify')) {
    setlocale(LC_ALL, 'en_US.UTF8');
    function slugify($text){
      $text = preg_replace('~[^\\pL\d]+~u', '-', $text);
      // trim
      $text = trim($text, '-');
      // transliterate
      $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
      // lowercase
      $text = strtolower($text);
      // remove unwanted characters
      $text = preg_replace('~[^-\w]+~', '', $text);
      if (empty($text)){
        return 'n-a';
      }
      return $text;
    }
}*/


if (!function_exists('slugify')) {
    function slugify($string, $wordLimit = 0){
        $separator = '-';
        
        if($wordLimit != 0){
            $wordArr = explode(' ', $string);
            $string = implode(' ', array_slice($wordArr, 0, $wordLimit));
        }
    
        $quoteSeparator = preg_quote($separator, '#');
    
        $trans = array(
            '&.+?;'                    => '',
            '[^\w\d _-]'            => '',
            '\s+'                    => $separator,
            '('.$quoteSeparator.')+'=> $separator
        );
    
        $string = strip_tags($string);
        foreach ($trans as $key => $val){
            $string = preg_replace('#'.$key.'#i'.(UTF8_ENABLED ? 'u' : ''), $val, $string);
        }
    
        $string = strtolower($string);
    
        return trim(trim($string, $separator));
    }
}


if (!function_exists('showLog')) {
    function showLog($filename = "logfile.txt"){
    return file_get_contents(APPPATH.'logs/'.$filename);
    }
}

if (!function_exists('WriteLog')) {
    function WriteLog($str){
        date_default_timezone_set('UTC');

        $ci=& get_instance();
        $ci->load->helper('file');
        // $path = $ci->config->item('path');
        $class = $ci->router->fetch_class();
        $method = $ci->router->fetch_method();
        $dataString = "-------------------------------------------------------------------\n";
        $dataString .= "Class Name : ".$class." Function: ".$method." Time : ";
        $dataString .=  date('Y-m-d H:i:s');
        $dataString .= "\n-------------------------------------------------------------------\n";
        if(is_array($str)){$str = json_encode($str);}
        $dataString .= $str;
        $dataString .= "\n-------------------------------------------------------------------\n\n";

        if ( ! write_file(APPPATH.'logs/logfile.txt', $dataString, 'a'))
        {
            // echo "not written";
                //return false;
        }
        else
        {
            // echo "written";
                //return true;
        }
    }
}
