<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . './libraries/REST_Controller.php';

class Pages extends REST_Controller{

    private $title;
    public function __construct(){
        parent::__construct();
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }

    public function about_get($pagename = '') {
        
        //returns all rows if the id parameter doesn't exist,
        //otherwise single row will be returned
        $page_data['pagetitle']   = strtoupper($pagename);
        $page_data['pagename']    = 'about-'.$pagename;
        $page_data['breadcrumb']  = $pagename;
        $page_data['padding']     = 'style = "padding-top:0;padding-bottom:0"';
        $page_data['client']      = 'app';
        $page_data['container']   = 'container-fluid';
        $this->load->view('web/main', $page_data);
        
    }

    public function activity_get($pagename = '') {
        
        //returns all rows if the id parameter doesn't exist,
        //otherwise single row will be returned
        $page_data['pagetitle']   = strtoupper($pagename);
        $page_data['pagename']    = 'activity-'.$pagename;
        $page_data['breadcrumb']  = $pagename;
        $page_data['padding']     = 'style = "padding-top:0;padding-bottom:0"';
        $page_data['client']      = 'app';
        $page_data['container']   = 'container-fluid';
        $this->load->view('web/main', $page_data);
        
    }

}