<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }

    public function index($param1=''){

        $str = showLog();
        echo nl2br($str);
    }

    public function clear(){
        $this->load->helper('file');

        $str = showLog();

        if ( ! write_file(APPPATH.'logs/logfile_archieve.txt', $str, 'a'))
        {
            echo "Error While Creating Archive Log File [".APPPATH."logs/logfile_archieve.txt]";
            echo "<hr>";
            echo nl2br($str);
            // echo 
        }
        else
        {
            if ( ! write_file(APPPATH.'logs/logfile.txt', '', 'w')){
                echo "Error While Clearing Log File";
            }else{
                    echo "Log File Cleared";
            }   
        }

    }

}