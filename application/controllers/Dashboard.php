<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct(){
        parent::__construct();
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        // echo "fdsffsdfs";
        // exit;
        if ($this->session->userdata('logged_in') == 1 && $this->session->userdata('logintype') == 'admin')  {
	        //redirect(base_url().'dashboard', 'refresh');
	       //exit;
        }else if ($this->session->userdata('logged_in') == 1 && $this->session->userdata('logintype') == 'normal')  {
	        redirect(base_url().'admin', 'refresh');
	       exit;
        }else if ($this->session->userdata('logged_in') != 1) {
        	redirect(base_url().'admin', 'refresh');
        }
    }

	public function index()
	{
		$page_data['pagetitle'] = 'Home';
        $page_data['pagename']  = 'dashboard';
        $page_data['css']       = array("assets/admin/plugins/jquery-datatable/dataTables.bootstrap4.min.css");
        $page_data['js']		= array(
        	"assets/admin/bundles/datatablescripts.bundle.js",
            "assets/admin/plugins/jquery-datatable/buttons/dataTables.buttons.min.js",
            "assets/admin/plugins/jquery-datatable/buttons/buttons.bootstrap4.min.js",
            "assets/admin/plugins/jquery-datatable/buttons/buttons.colVis.min.js",
            "assets/admin/plugins/jquery-datatable/buttons/buttons.flash.min.js",
            "assets/admin/plugins/jquery-datatable/buttons/buttons.html5.min.js",
            "assets/admin/plugins/jquery-datatable/buttons/buttons.print.min.js",
			"assets/admin/bundles/countTo.bundle.js",
			"assets/admin/bundles/knob.bundle.js",
			"assets/admin/bundles/sparkline.bundle.js",
			"assets/admin/js/pages/widgets/infobox/infobox-1.js",
			"assets/admin/js/pages/charts/jquery-knob.js",
			"assets/admin/js/pages/charts/sparkline.js",
        );
		$this->load->view('admin/main',$page_data);
	}
}
