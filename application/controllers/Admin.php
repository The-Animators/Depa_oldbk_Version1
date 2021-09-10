<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* include autoloader */
//require_once '../libraries/dompdf/autoload.inc.php';
require APPPATH . './libraries/dompdf/autoload.inc.php';


/* reference the Dompdf namespace */
use Dompdf\Dompdf;

class Admin extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->load->model('common_model','common');
        $this->load->model('matrimonial_model' ,'master_matrimonial');
        $this->load->model('help_us_model' ,'helpus');
        $this->load->library('upload'); //load library upload 
        if ($this->session->userdata('logintype') != 'admin' ) {
            redirect(base_url().'admin/login', 'refresh');
        }
    }

	public function index(){
        $this->dashboard();

        /*$dompdf = new Dompdf(array('enable_remote' => true));

        $html = '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

                <h1 align="center">
                    <img src="https://i.imgur.com/i96pBGp.png" style="width:90px">
                    DEPA - Donation has been made successfully!
                </h1>
                <table class="table table-bordered">
                    <tr>
                        <th colspan="2">Information</th>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td>Ajay Chauhan</td>
                    </tr>
                    <tr>
                        <th>Amount</th>
                        <td>₹ 100.10</td>
                    </tr>
                </table>

                <p>Best Regards, Lorazepam, sold under the brand name Ativan among others, is a benzodiazepine medication.</p>';

        $config = array();
        $config['upload_path'] = $this->config->item('upload_path').'receipts/';
        $config['allowed_types'] = 'pdf';
        $config['max_size']    = '15000000';
        $this->upload->initialize($config);

        $filename = $this->common->generateRandomString();

        $options = $dompdf->getOptions();
        $options->setDefaultFont('Courier');
        $dompdf->setOptions($options);
        $dompdf->loadHtml($html);
        $dompdf->render();
        $output = $dompdf->output();
        //file_put_contents($filename.".pdf", $output); // main directory
        file_put_contents($config['upload_path'].$filename.'.pdf', $output);*/

	}

    public function dashboard($param = ''){
        $page_data['pagetitle'] = 'Deepa Village';
        $page_data['pagename']  = 'dashboard';      
        $page_data['js']        = array(
            "assets/admin/bundles/datatablescripts.bundle.js",
            "assets/admin/plugins/jquery-datatable/buttons/dataTables.buttons.min.js",
            "assets/admin/plugins/jquery-datatable/buttons/buttons.bootstrap4.min.js",
            "assets/admin/plugins/jquery-datatable/buttons/buttons.colVis.min.js",
            "assets/admin/plugins/jquery-datatable/buttons/buttons.flash.min.js",
            "assets/admin/plugins/jquery-datatable/buttons/buttons.html5.min.js",
            "assets/admin/plugins/jquery-datatable/buttons/buttons.print.min.js",
        );
        
        $this->load->view('admin/main',$page_data);
    }

    public function forgotpassword($param = ''){
        $page_data['pagetitle'] = 'Forgot Password';
        $page_data['pagename']  = 'forgotpassword';      
        $page_data['js']        = array(
            "assets/admin/bundles/datatablescripts.bundle.js",
            "assets/admin/plugins/jquery-datatable/buttons/dataTables.buttons.min.js",
            "assets/admin/plugins/jquery-datatable/buttons/buttons.bootstrap4.min.js",
            "assets/admin/plugins/jquery-datatable/buttons/buttons.colVis.min.js",
            "assets/admin/plugins/jquery-datatable/buttons/buttons.flash.min.js",
            "assets/admin/plugins/jquery-datatable/buttons/buttons.html5.min.js",
            "assets/admin/plugins/jquery-datatable/buttons/buttons.print.min.js",
        );
        
        $this->load->view('admin/main',$page_data);
    }   

    public function headlist(){
        $page_data['pagetitle'] = 'Family Head';
        $page_data['pagename']  = 'headlist';      
        $page_data['css']       = array("assets/admin/plugins/jquery-datatable/dataTables.bootstrap4.min.css");
        $page_data['js']        = array(
            "assets/admin/bundles/datatablescripts.bundle.js",
            "assets/admin/plugins/jquery-datatable/buttons/dataTables.buttons.min.js",
            "assets/admin/plugins/jquery-datatable/buttons/buttons.bootstrap4.min.js",
            "assets/admin/plugins/jquery-datatable/buttons/buttons.colVis.min.js",
            "assets/admin/plugins/jquery-datatable/buttons/buttons.flash.min.js",
            "assets/admin/plugins/jquery-datatable/buttons/buttons.html5.min.js",
            "assets/admin/plugins/jquery-datatable/buttons/buttons.print.min.js",
        );
        $this->load->view('admin/main',$page_data);
    }   


    public function donation($status=''){
        $page_data['status'] = $status;
        $page_data['pagetitle'] = 'Donation List';
        $page_data['pagename']  = 'donation-list';      
        $page_data['css']       = array("assets/admin/plugins/jquery-datatable/dataTables.bootstrap4.min.css");
        $page_data['js']        = array(
            "assets/admin/bundles/datatablescripts.bundle.js",
            "https://unpkg.com/sweetalert/dist/sweetalert.min.js",
            "assets/admin/plugins/jquery-datatable/buttons/dataTables.buttons.min.js",
            "assets/admin/plugins/jquery-datatable/buttons/buttons.bootstrap4.min.js",
            "assets/admin/plugins/jquery-datatable/buttons/buttons.colVis.min.js",
            "assets/admin/plugins/jquery-datatable/buttons/buttons.flash.min.js",
            "assets/admin/plugins/jquery-datatable/buttons/buttons.html5.min.js",
            "assets/admin/plugins/jquery-datatable/buttons/buttons.print.min.js",
        );
        $this->load->view('admin/main',$page_data);
    }
    
    public function memberList(){
        $page_data['pagetitle'] = 'Family Member';
        $page_data['pagename']  = 'member-list';      
        $page_data['css']       = array("assets/admin/plugins/jquery-datatable/dataTables.bootstrap4.min.css");
        $page_data['js']        = array(
            "assets/admin/bundles/datatablescripts.bundle.js",
            "assets/admin/plugins/jquery-datatable/buttons/dataTables.buttons.min.js",
            "assets/admin/plugins/jquery-datatable/buttons/buttons.bootstrap4.min.js",
            "assets/admin/plugins/jquery-datatable/buttons/buttons.colVis.min.js",
            "assets/admin/plugins/jquery-datatable/buttons/buttons.flash.min.js",
            "assets/admin/plugins/jquery-datatable/buttons/buttons.html5.min.js",
            "assets/admin/plugins/jquery-datatable/buttons/buttons.print.min.js",
        );
        $this->load->view('admin/main',$page_data);
    }   
    
    
    
    public function helpus($status=''){
        $page_data['status'] = $status;
        $page_data['pagetitle'] = 'Help Us';
        $page_data['pagename']  = 'helpus-list';      
        $page_data['css']       = array("assets/admin/plugins/sweetalert/sweetalert.css","assets/admin/plugins/jquery-datatable/dataTables.bootstrap4.min.css");
        $page_data['js']        = array(
            "assets/admin/bundles/datatablescripts.bundle.js",
            "assets/admin/plugins/sweetalert/sweetalert.min.js",
            "assets/admin/plugins/jquery-datatable/buttons/dataTables.buttons.min.js",
            "assets/admin/plugins/jquery-datatable/buttons/buttons.bootstrap4.min.js",
            "assets/admin/plugins/jquery-datatable/buttons/buttons.colVis.min.js",
            "assets/admin/plugins/jquery-datatable/buttons/buttons.flash.min.js",
            "assets/admin/plugins/jquery-datatable/buttons/buttons.html5.min.js",
            "assets/admin/plugins/jquery-datatable/buttons/buttons.print.min.js",
        );
        $this->load->view('admin/main',$page_data);
    }

    public function matrimonial($status=''){
        $page_data['status'] = $status;
        $page_data['pagetitle'] = 'Matrimonial';
        $page_data['pagename']  = 'matrimonial-list';      
        $page_data['css']       = array("assets/admin/plugins/sweetalert/sweetalert.css","assets/admin/plugins/jquery-datatable/dataTables.bootstrap4.min.css");
        $page_data['js']        = array(
            "assets/admin/bundles/datatablescripts.bundle.js",
            "assets/admin/plugins/sweetalert/sweetalert.min.js",
            "assets/admin/plugins/jquery-datatable/buttons/dataTables.buttons.min.js",
            "assets/admin/plugins/jquery-datatable/buttons/buttons.bootstrap4.min.js",
            "assets/admin/plugins/jquery-datatable/buttons/buttons.colVis.min.js",
            "assets/admin/plugins/jquery-datatable/buttons/buttons.flash.min.js",
            "assets/admin/plugins/jquery-datatable/buttons/buttons.html5.min.js",
            "assets/admin/plugins/jquery-datatable/buttons/buttons.print.min.js",
        );
        $this->load->view('admin/main',$page_data);
    }

    public function matrimonial_view($id=''){
        $page_data['id'] = $id;
        $result = $this->master_matrimonial->matrimonial_view($id);
        $page_data['data']      = $result;
        $page_data['pagetitle'] = 'Matrimonial';
        $page_data['pagename']  = 'matrimonial-view';      
        $page_data['css']       = array("assets/admin/plugins/sweetalert/sweetalert.css",
            "assets/admin/plugins/jquery-datatable/dataTables.bootstrap4.min.css");
        $page_data['js']        = array(
            "assets/admin/bundles/datatablescripts.bundle.js",
            "assets/admin/plugins/sweetalert/sweetalert.min.js",
            "assets/admin/plugins/jquery-datatable/buttons/dataTables.buttons.min.js",
            "assets/admin/plugins/jquery-datatable/buttons/buttons.bootstrap4.min.js",
            "assets/admin/plugins/jquery-datatable/buttons/buttons.colVis.min.js",
            "assets/admin/plugins/jquery-datatable/buttons/buttons.flash.min.js",
            "assets/admin/plugins/jquery-datatable/buttons/buttons.html5.min.js",
            "assets/admin/plugins/jquery-datatable/buttons/buttons.print.min.js",
        );
        $this->load->view('admin/main',$page_data);
    }
    
    public function matrirequest($status=''){
        $page_data['status'] = $status;
        $page_data['pagetitle'] = 'Matrimonial Requests';
        $page_data['pagename']  = 'matrirequest-list';      
        $page_data['css']       = array("assets/admin/plugins/sweetalert/sweetalert.css","assets/admin/plugins/jquery-datatable/dataTables.bootstrap4.min.css");
        $page_data['js']        = array(
            "assets/admin/bundles/datatablescripts.bundle.js",
            "assets/admin/plugins/sweetalert/sweetalert.min.js",
            "assets/admin/plugins/jquery-datatable/buttons/dataTables.buttons.min.js",
            "assets/admin/plugins/jquery-datatable/buttons/buttons.bootstrap4.min.js",
            "assets/admin/plugins/jquery-datatable/buttons/buttons.colVis.min.js",
            "assets/admin/plugins/jquery-datatable/buttons/buttons.flash.min.js",
            "assets/admin/plugins/jquery-datatable/buttons/buttons.html5.min.js",
            "assets/admin/plugins/jquery-datatable/buttons/buttons.print.min.js",
        );
        $this->load->view('admin/main',$page_data);
    }
    
    
    public function helpus_view($id = 0, $view = ''){

        if($id != 0){

            $this->helpus->_condition['deleted'] = 0;

            if($id){
                $this->helpus->_condition['id'] = $id;
            }

            $page_data['result']  = $this->helpus->getRows();
            $this->helpus->change_table('map_helpus_image');
            unset($this->helpus->_condition['id']);    
            $this->helpus->_condition['hid'] = $id;    
            $page_data['images'] = $this->helpus->getRows($id);

        }
        
        if ($view=='view') {
            $page_data['show'] = true;
        }else{
            $page_data['show'] = false;
        }

        $page_data['pagetitle'] = 'Help Us Detail';
        $page_data['pagename']  = 'helpus_details';
        $page_data['css']       = array("assets/admin/plugins/jquery-datatable/dataTables.bootstrap4.min.css",
                                        "assets/admin/plugins/sweetalert/sweetalert.css",
                                        "assets/admin/plugins/dropify/css/dropify.min.css",
                                        "assets/admin/css/croppie.css"
                                        );
        $page_data['js']        = array(
                                        "assets/admin/plugins/dropify/js/dropify.min.js",
                                        "assets/admin/js/croppie.js",
                                        "assets/admin/bundles/datatablescripts.bundle.js",
            "assets/admin/plugins/jquery-datatable/buttons/dataTables.buttons.min.js",
            "assets/admin/plugins/jquery-datatable/buttons/buttons.bootstrap4.min.js",
            "assets/admin/plugins/jquery-datatable/buttons/buttons.colVis.min.js",
            "assets/admin/plugins/jquery-datatable/buttons/buttons.flash.min.js",
            "assets/admin/plugins/jquery-datatable/buttons/buttons.html5.min.js",
            "assets/admin/plugins/jquery-datatable/buttons/buttons.print.min.js",
                                    );
        $this->load->view('admin/main', $page_data);
    }
    
    

}