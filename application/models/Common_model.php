<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Common_model extends MY_Model
{

    public $table;
    public $_primary_key;
    public $_condition;
    public function __construct() {
        parent::__construct();
        $this->table = 'common_model';
        $this->_primary_key = 'id';
        $this->_condition = array();
    }    

    public function generateRandomString($length = 10){
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
    }

}

?>