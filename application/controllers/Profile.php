<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

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

	public function index()
	{
		$page_data['pagetitle'] = 'Home';
        $page_data['pagename']  = 'profile';
        $page_data['css']  		= array('assets/admin/plugins/light-gallery/css/lightgallery.css' ,'assets/admin/plugins/fullcalendar/fullcalendar.min.css');
        $page_data['js']  		= array('assets/admin/plugins/light-gallery/js/lightgallery-all.min.js' ,'assets/admin/bundles/fullcalendarscripts.bundle.js','assets/admin/js/pages/medias/image-gallery.js','assets/admin/js/pages/calendar/calendar.js');
		$this->load->view('admin/main',$page_data);
	}

	public function myprofile()
	{
		$page_data['pagetitle'] = 'Home';
        $page_data['pagename']  = 'my-profile';
		$this->load->view('admin/main',$page_data);
	}

	public function edit()
	{
		$page_data['pagetitle'] = 'Home';
        $page_data['pagename']  = 'profile-edit';
		$this->load->view('admin/main',$page_data);
	}
}
