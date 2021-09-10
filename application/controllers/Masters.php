<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masters extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');

        // array(array('donors_model' ,'donors'), array('latest_model' ,'latest'), array('gallery_model' ,'gallery'));
        $this->load->model('donors_model' ,'donors');
        $this->load->model('latest_model' ,'latest');
        $this->load->model('gallery_model' ,'gallery');
        $this->load->model('marannondh_model' ,'maran_nondh');
        $this->load->model('saadri_model' ,'saadri');
        $this->load->model('blog_model' ,'blog');
        if ($this->session->userdata('logged_in') != 1 || $this->session->userdata('logintype') != 'admin' ) {
            redirect(base_url().'admin/login', 'refresh');
        }
    }

    public function education(){
        $page_data['pagetitle'] = 'Education';
        $page_data['pagename']  = 'manage-education';
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

    public function relation(){
        $page_data['pagetitle'] = 'Relation';
        $page_data['pagename']  = 'manage-relation';
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

    public function bloodgroup(){
        $page_data['pagetitle'] = 'Blood Group';
        $page_data['pagename']  = 'manage-bloodgroup';
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

    public function business_category(){
        $page_data['pagetitle'] = 'Business Category';
        $page_data['pagename']  = 'manage-business-category';
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

    public function village(){
        $page_data['pagetitle'] = 'village';
        $page_data['pagename']  = 'manage-village';
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

    public function surname(){
        $page_data['pagetitle'] = 'Surname';
        $page_data['pagename']  = 'manage-surname';
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
    
    public function maritalstatus(){
        $page_data['pagetitle'] = 'Marital Status';
        $page_data['pagename']  = 'manage-marital-status';
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
    
    public function dharmikknowledge(){
        $page_data['pagetitle'] = 'Dharmik Knowledge';
        $page_data['pagename']  = 'manage-dharmik-knowledge';
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

    public function sports(){
        $page_data['pagetitle'] = 'Sports';
        $page_data['pagename']  = 'manage-sports';
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

    public function area(){
        $page_data['pagetitle'] = 'Area';
        $page_data['pagename']  = 'manage-area';
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

    public function donationcategory(){
        $page_data['pagetitle'] = 'Donation Category';
        $page_data['pagename']  = 'manage-donation-category';
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

    public function occupation(){
        $page_data['pagetitle'] = 'Occupation';
        $page_data['pagename']  = 'manage-occupation';
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

    public function donor_new($id = 0){
        $page_data['pagetitle'] = 'Donor';
        $page_data['pagename']  = 'donors-new';
        if($id != 0){
            $this->donors->_condition['deleted'] = 0;
            if($id){
                $this->donors->_condition['id'] = $id;
            }
            $page_data['result'] = $this->donors->getRows();
        }
        $page_data['id']        = $id;
        $page_data['css']       = array("assets/admin/plugins/dropify/css/dropify.min.css");
        $page_data['js']        = array("assets/admin/plugins/dropify/js/dropify.min.js");
        $this->load->view('admin/main',$page_data);
    }

    public function donor_list(){
        $page_data['pagetitle'] = 'Donor';
        $page_data['pagename']  = 'donors-list';
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


    public function bulkemail_new($id = 0){
        $page_data['pagetitle'] = 'Bulk Email';
        $page_data['pagename']  = 'bulkemail';
        if($id != 0){
            $this->donors->_condition['deleted'] = 0;
            if($id){
                $this->donors->_condition['id'] = $id;
            }
            $page_data['result'] = $this->donors->getRows();
        }
        $page_data['id']        = $id;
        $page_data['css']       = array("assets/admin/plugins/dropify/css/dropify.min.css");
        $page_data['js']        = array("assets/admin/plugins/dropify/js/dropify.min.js");
        $this->load->view('admin/main',$page_data);
    }

    public function bulkemail_list(){
        $page_data['pagetitle'] = 'Bulk Email';
        $page_data['pagename']  = 'bulkemail-list';
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

    public function bulksms_new($id = 0){
        $page_data['pagetitle'] = 'Bulk SMS';
        $page_data['pagename']  = 'bulksms';
        if($id != 0){
            $this->donors->_condition['deleted'] = 0;
            if($id){
                $this->donors->_condition['id'] = $id;
            }
            $page_data['result'] = $this->donors->getRows();
        }
        $page_data['id']        = $id;
        $page_data['css']       = array("assets/admin/plugins/dropify/css/dropify.min.css");
        $page_data['js']        = array("assets/admin/plugins/dropify/js/dropify.min.js");
        $this->load->view('admin/main',$page_data);
    }

    public function bulksms_list(){
        $page_data['pagetitle'] = 'Bulk SMS';
        $page_data['pagename']  = 'bulksms-list';
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


    public function maran_nondh_new($id = 0){

        $page_data['familyHead'] = getFamilyHead();
        //$page_data['death_contact'] = getFamilyHead();
        $page_data['pagetitle'] = 'Maran Nondh';
        $page_data['pagename']  = 'maran-nondh';
        if($id != 0){
            $this->maran_nondh->_condition['deleted'] = 0;
            if($id){
                $this->maran_nondh->_condition['id'] = $id;
            }
            $page_data['result'] = $this->maran_nondh->getRows();
        }
        $page_data['id']        = $id;
        /*$page_data['css']       = array("assets/admin/plugins/dropify/css/dropify.min.css");
        $page_data['js']        = array(
            "assets/admin/plugins/dropify/js/dropify.min.js",
            "assets/admin/plugins/select2/select2.min.js",
            "assets/admin/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"
        );*/

        $page_data['css']       = array("assets/admin/plugins/dropify/css/dropify.min.css","assets/admin/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css", "assets/admin/plugins/bootstrap-select/css/bootstrap-select.css,assets/admin/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css",
            "assets/admin/plugins/select2/select2.css");
        $page_data['js']        = array("assets/admin/plugins/dropify/js/dropify.min.js","assets/admin/plugins/momentjs/moment.js","assets/admin/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js","assets/admin/plugins/momentjs/moment.js",
            "assets/admin/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js",
            "assets/admin/plugins/select2/select2.min.js");
        
        $this->load->view('admin/main',$page_data);
    }

    public function maran_nondh_list(){
        $page_data['pagetitle'] = 'MaranNondh';
        $page_data['pagename']  = 'maran-nondh-list';
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

public function saadri_add($id = 0){

        $page_data['familyHead'] = getFamilyHead();
        $page_data['pagetitle'] = 'Prarthana';
        $page_data['pagename']  = 'saadri-add';
        if($id != 0){
            $this->saadri->_condition['deleted'] = 0;
            if($id){
                $this->saadri->_condition['id'] = $id;
            }
            $page_data['result'] = $this->saadri->getRows();
        }
        $page_data['id']        = $id;

        $page_data['css']       = array("assets/admin/plugins/dropify/css/dropify.min.css","assets/admin/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css", "assets/admin/plugins/bootstrap-select/css/bootstrap-select.css,assets/admin/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css",
            "assets/admin/plugins/select2/select2.css");
        $page_data['js']        = array("assets/admin/plugins/dropify/js/dropify.min.js","assets/admin/plugins/momentjs/moment.js","assets/admin/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js","assets/admin/plugins/momentjs/moment.js",
            "assets/admin/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js",
            "assets/admin/plugins/select2/select2.min.js");
        
        $this->load->view('admin/main', $page_data);
    }

    public function saadri_list(){
        $page_data['pagetitle'] = 'Prarthana List';
        $page_data['pagename']  = 'saadri-list';
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

    public function latest_new($id = 0){
        
        $page_data['pagetitle'] = 'News & Events';
        $page_data['pagename']  = 'news-and-events';
        if($id != 0){
            $this->latest->_condition['deleted'] = 0;
            if($id){
                $this->latest->_condition['id'] = $id;
            }
            $page_data['result'] = $this->latest->getRows();
        }
        $page_data['id']        = $id;
        $page_data['css']       = array("assets/admin/plugins/dropify/css/dropify.min.css","assets/admin/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css", "assets/admin/plugins/bootstrap-select/css/bootstrap-select.css");
        $page_data['js']        = array("assets/admin/plugins/dropify/js/dropify.min.js","assets/admin/plugins/momentjs/moment.js","assets/admin/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js");
        $this->load->view('admin/main',$page_data);
    }

    public function latest_list(){
        $page_data['pagetitle'] = 'News & Events List';
        $page_data['pagename']  = 'news-and-events-list';
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

    public function gallery_new($id = 0){
        $page_data['gallery'] = array();
        if($id != 0){
            $this->gallery->_condition['deleted'] = 0;
            if($id){
                $this->gallery->_condition['id'] = $id;
            }
            $page_data['result']  = $this->gallery->getRows();
            $this->gallery->change_table('gallery_image');
            unset($this->gallery->_condition['id']);
            $this->gallery->_condition['gal_id'] = $id;    
            $page_data['gallery'] = $this->gallery->getRows($id);
            // print($this->db->last_query());
            // print_r($page_data['gallery']);
        }
        $page_data['pagetitle'] = 'Gallery';
        $page_data['pagename']  = 'gallery-new';
        $page_data['css']       = array("assets/admin/plugins/dropify/css/dropify.min.css",
                                        "assets/admin/css/croppie.css"
                                        );
        $page_data['js']        = array(
                                        "assets/admin/plugins/dropify/js/dropify.min.js",
                                        "assets/admin/js/croppie.js"
                                    );
        $this->load->view('admin/main',$page_data);
    }
    
    public function gallery_list(){
        $page_data['pagetitle'] = 'Gallery List';
        $page_data['pagename']  = 'gallery-list';
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

    // Blog Start 

    public function blog_new($id = 0){
        $page_data['blog'] = array();
        if($id != 0){
            $this->blog->_condition['deleted'] = 0;
            if($id){
                $this->blog->_condition['id'] = $id;
            }
            $page_data['result']  = $this->blog->getRows();

            // print($this->db->last_query());
            $this->blog->change_table('map_blog_img');
            unset($this->blog->_condition['id']);
            $this->blog->_condition['bid'] = $id;    
            $page_data['blog'] = $this->blog->getRows();
            // print($this->db->last_query());
            
        }
        $page_data['pagetitle'] = 'Blog';
        $page_data['pagename']  = 'blog-new';
        $page_data['js']        = array("assets/admin/plugins/ckeditor/ckeditor.js");
        $this->load->view('admin/main',$page_data);
    }

    public function blog_list($param1 = ''){
        $page_data['pagetitle'] = 'Blogs List';
        $page_data['listtype']  = $param1;
        $page_data['pagename']  = 'blog-list';
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

    // Blog End
    
    
    /*************** VIDEO GALLERY **********************/

    public function gallery_video_new($id = 0){
        $page_data['gallery'] = array();
        if($id != 0){
            $this->gallery->_condition['deleted'] = 0;
            if($id){
                $this->gallery->_condition['id'] = $id;
            }
            $this->gallery->change_table('master_videogallery');
            $page_data['result']  = $this->gallery->getRows();
        }

        $page_data['pagetitle'] = 'Video Gallery';
        $page_data['pagename']  = 'gallery-video-new';
        $page_data['css']       = array("assets/admin/plugins/dropify/css/dropify.min.css",
                                        "assets/admin/css/croppie.css"
                                        );
        $page_data['js']        = array(
                                        "assets/admin/plugins/dropify/js/dropify.min.js",
                                        "assets/admin/js/croppie.js"
                                    );
        $this->load->view('admin/main', $page_data);
    }
    
    public function gallery_video_list(){
        $page_data['pagetitle'] = 'Video Gallery List';
        $page_data['pagename']  = 'gallery-video-list';
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

    /**************************************************************/
    

}