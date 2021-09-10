<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller {

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
    }

	public function index(){
        $page_data['pagetitle']   = 'Depa Mahajan';
        $page_data['pagename']    = 'index';
        $page_data['breadcrumb']  = 'Home';
        $this->load->view('web/main', $page_data);
    }
	
	public function president_message(){
        $page_data['client']      = 'web';
        $page_data['pagetitle']   = 'President Message';
        $page_data['pagename']    = 'about-president-message';
        $page_data['breadcrumb']  = 'President Message';
        $this->load->view('web/main', $page_data);
    }

    public function history(){
        $page_data['pagetitle']   = 'History';
        $page_data['pagename']    = 'about-history';
        $page_data['breadcrumb']  = 'History';
        $page_data['client']      = 'web';
        $this->load->view('web/main', $page_data);
    }

    public function committee(){
        $page_data['client']      = 'web';
        $page_data['pagetitle']   = 'Committee';
        $page_data['pagename']    = 'about-committee';
        $page_data['breadcrumb']  = 'Committee';
        $this->load->view('web/main', $page_data);
    }

    public function deepamap(){
        $page_data['client']      = 'web';
        $page_data['pagetitle']   = 'Depa Map';
        $page_data['pagename']    = 'about-deepa-map';
        $page_data['breadcrumb']  = 'Depa Map';
        $this->load->view('web/main', $page_data);
    }

    public function familytree(){
        $page_data['client']      = 'web';
        $page_data['pagetitle']   = 'Family Tree';
        $page_data['pagename']    = 'about-family-tree';
        $page_data['breadcrumb']  = 'Family Tree';
        $this->load->view('web/main', $page_data);
    }

    public function jovar(){
        $page_data['client']      = 'web';
        $page_data['pagetitle']   = 'Jovar';
        $page_data['pagename']    = 'about-jovar';
        $page_data['breadcrumb']  = 'Jovar';
        $this->load->view('web/main', $page_data);
    }

    public function placestovisit(){
        $page_data['client']      = 'web';
        $page_data['pagetitle']   = 'Place To Visit';
        $page_data['pagename']    = 'about-places-to-visit';
        $page_data['breadcrumb']  = 'Place To Visit';
        $this->load->view('web/main', $page_data);
    }

    public function sports(){
        $page_data['pagetitle']   = 'Sports';
        $page_data['pagename']    = 'activity-sports';
        $page_data['breadcrumb']  = 'Sports';
        $this->load->view('web/main', $page_data);
    }

    public function sportscricket(){
        $page_data['pagetitle']   = 'Sports Cricket';
        $page_data['pagename']    = 'activity-sports-cricket';
        $page_data['breadcrumb1'] = 'Sports';
        $page_data['br_url'] 	  = 'sports';
        $page_data['breadcrumb']  = 'Cricket';
        $this->load->view('web/main', $page_data);
    }

    public function sportsvollyball(){
        $page_data['pagetitle']   = 'Sports volyball';
        $page_data['pagename']    = 'activity-sports-volyball';
        $page_data['breadcrumb1'] = 'Sports';
        $page_data['br_url'] 	  = 'sports';
        $page_data['breadcrumb']  = 'Volyball';
        $this->load->view('web/main', $page_data);
    }

    public function sportsbasketball(){
        $page_data['pagetitle']   = 'Sports basketball';
        $page_data['pagename']    = 'activity-sports-basketball';
        $page_data['breadcrumb1'] = 'Sports';
        $page_data['br_url'] 	  = 'sports';
        $page_data['breadcrumb']  = 'Basketball';
        $this->load->view('web/main', $page_data);
    }

    public function sportscarrom(){
        $page_data['pagetitle']   = 'Sports Carrom';
        $page_data['pagename']    = 'activity-sports-carrom';
        $page_data['breadcrumb1'] = 'Sports';
        $page_data['br_url'] 	  = 'sports';
        $page_data['breadcrumb']  = 'Carrom';
        $this->load->view('web/main', $page_data);
    }

    public function sportstabletennis(){
        $page_data['pagetitle']   = 'Sports Table Tennis';
        $page_data['pagename']    = 'activity-sports-tabletennis';
        $page_data['breadcrumb1'] = 'Table Sports';
        $page_data['br_url'] 	  = 'sports';
        $page_data['breadcrumb']  = 'Table Tennis';
        $this->load->view('web/main', $page_data);
    }

    public function sportschess(){
        $page_data['pagetitle']   = 'Sports Chess';
        $page_data['pagename']    = 'activity-sports-chess';
        $page_data['breadcrumb1'] = 'Sports';
        $page_data['br_url'] 	  = 'sports';
        $page_data['breadcrumb']  = 'Chess';
        $this->load->view('web/main', $page_data);
    }

    public function medical(){
        $page_data['pagetitle']   = 'Medical';
        $page_data['pagename']    = 'activity-medical';
        $page_data['breadcrumb']  = 'Medical';
        $this->load->view('web/main', $page_data);
    }

    public function education(){
        $page_data['pagetitle']   = 'Education';
        $page_data['pagename']    = 'activity-education';
        $page_data['breadcrumb']  = 'Education';
        $this->load->view('web/main', $page_data);
    }

    public function religions(){
        $page_data['pagetitle']   = 'Religions';
        $page_data['pagename']    = 'activity-religions';
        $page_data['breadcrumb']  = 'Religions';
        $this->load->view('web/main', $page_data);
    }

    public function gunjanmandal(){
        $page_data['pagetitle']   = 'Gunjan Mandal';
        $page_data['pagename']    = 'activity-gunjanmandal';
        $page_data['breadcrumb']  = 'Gunjan Mandal';
        $this->load->view('web/main', $page_data);
    }

    public function ongoing(){
        $page_data['pagetitle']   = 'Ongoing';
        $page_data['pagename']    = 'activity-ongoing';
        $page_data['breadcrumb']  = 'Ongoing';
        $this->load->view('web/main', $page_data);
    }

    public function others(){
        $page_data['pagetitle']   = 'Others';
        $page_data['pagename']    = 'activity-others';
        $page_data['breadcrumb']  = 'Others';
        $this->load->view('web/main', $page_data);
    }

    public function donate(){
        $page_data['catdata']      = getmaster('donation_category','html','Donation Category','donationcategory');
        $page_data['pagetitle']   = 'Donate';
        $page_data['pagename']    = 'activity-donate';
        $page_data['breadcrumb']  = 'Donate';
        $this->load->view('web/main', $page_data);
    }


    public function donations(){
        $page_data['pagetitle']   = 'Donations List';
        $page_data['pagename']    = 'activity-donations';
        $page_data['breadcrumb']  = 'Donations';
        $this->load->view('web/donations', $page_data);
    }

	
	public function blog(){
        $page_data['pagetitle']   = 'Blog';
        $page_data['pagename']    = 'blog';
        $page_data['breadcrumb']  = 'Blog';
        $this->load->view('web/main', $page_data);
    }

	public function blogdetail($title){
        $page_data['pagetitle']   = 'Blog '.$title;
        $page_data['pagename']    = 'blogdetail';
        $page_data['breadcrumb1'] = 'Blog';
        $page_data['br_url'] 	  = 'blog';
        $page_data['breadcrumb']  = $title;
        $this->load->view('web/main', $page_data);
    }

	public function b2b(){
        $page_data['pagetitle']   = 'B2B';
        $page_data['pagename']    = 'b2b';
        $page_data['breadcrumb']  = 'B2B';
        $this->load->view('web/main', $page_data);
    }
	
	public function job(){
        $page_data['pagetitle']   = 'Job';
        $page_data['pagename']    = 'job';
        $page_data['breadcrumb']  = 'Job';
        $this->load->view('web/main', $page_data);
    }

	public function jobdetail($title){
        $page_data['pagetitle']   = 'Job '.$title;
        $page_data['pagename']    = 'jobdetail';
        $page_data['br_url'] 	  = 'jobs';
        $page_data['breadcrumb1'] = 'Job';
        $page_data['breadcrumb']  = $title;
        $this->load->view('web/main', $page_data);
    }

	public function newsandevent(){
        $page_data['pagetitle']   = 'News And Events';
        $page_data['pagename']    = 'newsandevent';
        $page_data['breadcrumb']  = 'News And Events';
        $this->load->view('web/main', $page_data);
    }

    public function newseventsdetail($title){
        $page_data['pagetitle']   = 'News and Events '.$title;
        $page_data['pagename']    = 'newseventsdetail';
        $page_data['br_url'] 	  = 'news-and-event';
        $page_data['breadcrumb1'] = 'News and Events';
        $page_data['breadcrumb']  = $title;
        $this->load->view('web/main', $page_data);
    }

	public function gallery(){
        $page_data['pagetitle']   = 'Gallery';
        $page_data['pagename']    = 'gallery';
        $page_data['breadcrumb']  = 'Gallery';
        $this->load->view('web/main', $page_data);
    }

	public function contactus(){
        $page_data['pagetitle']   = 'Contact Us';
        $page_data['pagename']    = 'contact-us';
        $page_data['breadcrumb']  = 'Contact Us';
        $this->load->view('web/main', $page_data);
    }

	public function register(){
        $page_data['pagetitle']   = 'Register';
        $page_data['pagename']    = 'register';
        $page_data['breadcrumb']  = 'Register';
        $this->load->view('web/main', $page_data);
    }

	public function forgotpassword(){
        $page_data['pagetitle']   = 'Forgot Password';
        $page_data['pagename']    = 'forgot-password';
        $page_data['breadcrumb']  = 'Forgot Password';
        $this->load->view('web/main', $page_data);
    }

    public function ads(){
        $page_data['pagetitle']   = 'Advertise';
        $page_data['pagename']    = 'ads';
        $page_data['breadcrumb']  = 'Advertise';
        $this->load->view('web/main', $page_data);
    }

    public function blood_donation_camp(){
        $page_data['pagetitle']   = 'Blood Donation Camp';
        $page_data['pagename']    = 'blood-donation-camp';
        $page_data['breadcrumb']  = 'Blood Donation Camp';
        $this->load->view('web/main', $page_data);
    }

	public function matrimonial(){
        $page_data['pagetitle']   = 'Matrimonial';
        $page_data['pagename']    = 'matrimonial';
        $page_data['breadcrumb']  = 'Matrimonial';
        $this->load->view('web/main', $page_data);
    }

    public function matrimonialdetail($title){
        $page_data['pagetitle']   = 'Matrimonial '.$title;
        $page_data['pagename']    = 'matrimonialdetail';
        $page_data['br_url'] 	  = 'matrimonial';
        $page_data['breadcrumb1'] = 'Matrimonial';
        $page_data['breadcrumb']  = $title;
        $this->load->view('web/main', $page_data);
    }

}