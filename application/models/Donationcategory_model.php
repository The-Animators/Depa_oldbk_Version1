<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Donationcategory_model extends MY_Model
{

    public $table;
    public $_primary_key;
    public $_condition;
    public function __construct() {
        parent::__construct();
        $this->table = 'master_donation_category';
        $this->_primary_key = 'id';
        $this->_condition = array();
    }    
}