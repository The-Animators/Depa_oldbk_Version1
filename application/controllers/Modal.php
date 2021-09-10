<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Modal extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        /*cache control*/
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }

    public function popup($param1 = '', $param2 = '', $param3 = '')
    {
        
        $page_data['mtitle'] = str_replace('_', ' ', $param2);
        $page_data['bname']  = str_replace('_', ' ', $param3);
        $page_data['id'] 	 = $param3;
        $this->load->view('admin/modal/modal_'.$param1, $page_data);
    }

    public function openModal($param1, $param2){        
        $page_data['modalName'] = $param1;
        $page_data['id']        = $param2;
        $page_data['result']    = '';
        $page_data['page'] = $this->load->view('admin/modal/modal_'.$param1, $page_data, false);
        echo json_encode($page_data);
    }
}
