<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *      http://example.com/index.php/welcome
     *  - or -
     *      http://example.com/index.php/welcome/index
     *  - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    private $page_data = array();
    public function __construct(){
        parent::__construct();
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->page_data['client'] = 'web';
        $this->page_data['addbtn'] = 0;
        $this->page_data['addbtnlink'] = '';
    }

    public function index(){
        // print_r($_SESSION);
        $this->page_data['pagetitle']   = 'SHREE DEPA JAIN MAHAJAN TRUST';
        $this->page_data['pagename']    = 'index';
        $this->page_data['breadcrumb']  = 'Home';
        $this->load->view('web/main', $this->page_data);
    }
    
    public function president_message(){
        $this->page_data['pagetitle']   = 'President Message';
        $this->page_data['pagename']    = 'about-president-message';
        $this->page_data['breadcrumb']  = 'President Message';
        $this->load->view('web/main', $this->page_data);
    }

    public function history(){
        $this->page_data['pagetitle']   = 'History';
        $this->page_data['pagename']    = 'about-history';
        $this->page_data['breadcrumb']  = 'History';
        $this->load->view('web/main', $this->page_data);
    }

    public function committee(){
        $this->page_data['pagetitle']   = 'Committee';
        $this->page_data['pagename']    = 'about-committee';
        $this->page_data['breadcrumb']  = 'Committee';
        $this->load->view('web/main', $this->page_data);
    }

    public function deepamap(){
        $this->page_data['pagetitle']   = 'Depa Map';
        $this->page_data['pagename']    = 'about-depa-map';
        $this->page_data['breadcrumb']  = 'Depa Map';
        $this->load->view('web/main', $this->page_data);
    }

    public function familytree(){
        $this->page_data['pagetitle']   = 'Family Tree';
        $this->page_data['pagename']    = 'about-family-tree';
        $this->page_data['breadcrumb']  = 'Family Tree';
        $this->load->view('web/main', $this->page_data);
    }

    public function family($family_id = '',$msg = ''){
       if ($family_id == '' || ($this->session->userdata('logged_in') != 1 && $this->session->userdata('logintype') != 'normal' )) {
            redirect(base_url(), 'refresh');
        }
        $this->load->model('family_model' ,'family');
        $this->page_data['pagetitle']   = 'Family Details';
        $this->page_data['result']      = $this->family->familydetails($family_id);
        $this->page_data['msg']         = $msg;
        $this->page_data['pagename']    = 'family';
        $this->page_data['breadcrumb']  = 'Family Details';
        $this->load->view('web/main', $this->page_data);
    }

    public function business($business_id = ''){
       if ($business_id == '') {
            redirect(base_url(), 'refresh');
        }
        $this->load->model('business_model' ,'business');
        $this->page_data['pagetitle']   = 'Business Details';
        $result                         = $this->business->details($business_id);
        $this->page_data['result']      = $result;
        $this->page_data['pagename']    = 'business';
        $this->page_data['breadcrumb']  = 'Business Details';
        $this->page_data['breadcrumb1'] = "Family Details";
        $this->page_data['br_url']      = 'family/'.$result['family'][0]['family_no'];
        $this->load->view('web/main', $this->page_data);
    }

    public function jovar(){
        $this->page_data['pagetitle']   = 'Jovar';
        $this->page_data['pagename']    = 'about-jovar';
        $this->page_data['breadcrumb']  = 'Jovar';
        $this->load->view('web/main', $this->page_data);
    }

    public function placestovisit(){
        $this->page_data['pagetitle']   = 'Place To Visit';
        $this->page_data['pagename']    = 'about-places-to-visit';
        $this->page_data['breadcrumb']  = 'Place To Visit';
        $this->load->view('web/main', $this->page_data);
    }

    public function sportscricket(){
        $this->page_data['pagetitle']   = 'Sports';
        $this->page_data['pagename']    = 'activity-sports-cricket';
        $this->page_data['breadcrumb1'] = 'Sports';
        $this->page_data['br_url']    = 'sports';
        $this->page_data['breadcrumb']  = 'Cricket';
        $this->load->view('web/main', $this->page_data);
    }

    public function sportsvollyball(){
        $this->page_data['pagetitle']   = 'Sports volyball';
        $this->page_data['pagename']    = 'activity-sports-volyball';
        $this->page_data['breadcrumb1'] = 'Sports';
        $this->page_data['br_url']    = 'sports';
        $this->page_data['breadcrumb']  = 'Volyball';
        $this->load->view('web/main', $this->page_data);
    }

    public function sportsbasketball(){
        $this->page_data['pagetitle']   = 'Sports basketball';
        $this->page_data['pagename']    = 'activity-sports-basketball';
        $this->page_data['breadcrumb1'] = 'Sports';
        $this->page_data['br_url']    = 'sports';
        $this->page_data['breadcrumb']  = 'Basketball';
        $this->load->view('web/main', $this->page_data);
    }

    public function sportscarrom(){
        $this->page_data['pagetitle']   = 'Sports Carrom';
        $this->page_data['pagename']    = 'activity-sports-carrom';
        $this->page_data['breadcrumb1'] = 'Sports';
        $this->page_data['br_url']      = 'sports';
        $this->page_data['breadcrumb']  = 'Carrom';
        $this->load->view('web/main', $this->page_data);
    }

    public function sportstabletennis(){
        $this->page_data['pagetitle']   = 'Sports Table Tennis';
        $this->page_data['pagename']    = 'activity-sports-tabletennis';
        $this->page_data['breadcrumb1'] = 'Table Sports';
        $this->page_data['br_url']      = 'sports';
        $this->page_data['breadcrumb']  = 'Table Tennis';
        $this->load->view('web/main', $this->page_data);
    }

    public function sportschess(){
        $this->page_data['pagetitle']   = 'Sports Chess';
        $this->page_data['pagename']    = 'activity-sports-chess';
        $this->page_data['breadcrumb1'] = 'Sports';
        $this->page_data['br_url']      = 'sports';
        $this->page_data['breadcrumb']  = 'Chess';
        $this->load->view('web/main', $this->page_data);
    }

    public function general(){
        $this->page_data['pagetitle']   = 'General Samiti';
        $this->page_data['pagename']    = 'activity-general';
        $this->page_data['breadcrumb']  = 'General Samiti';
        $this->load->view('web/main', $this->page_data);
    }

    public function education(){
        $this->page_data['pagetitle']   = 'Education Samiti';
        $this->page_data['pagename']    = 'activity-education';
        $this->page_data['breadcrumb']  = 'Education Samiti';
        $this->load->view('web/main', $this->page_data);
    }

    public function sports(){
        $this->page_data['pagetitle']   = 'Sports Samiti';
        $this->page_data['pagename']    = 'activity-sports';
        $this->page_data['breadcrumb']  = 'Sports Samiti';
        $this->load->view('web/main', $this->page_data);
    }
    
    public function medical(){
        $this->page_data['pagetitle']   = 'Medical Samiti';
        $this->page_data['pagename']    = 'activity-medical';
        $this->page_data['breadcrumb']  = 'Medical Samiti';
        $this->load->view('web/main', $this->page_data);
    }

    public function religions(){
        $this->page_data['pagetitle']   = 'Dharmik Samiti';
        $this->page_data['pagename']    = 'activity-religions';
        $this->page_data['breadcrumb']  = 'Dharmik Samiti';
        $this->load->view('web/main', $this->page_data);
    }

    public function regional(){
        $this->page_data['pagetitle']   = 'Regional Samiti';
        $this->page_data['pagename']    = 'activity-regional';
        $this->page_data['breadcrumb']  = 'Regional Samiti';
        $this->load->view('web/main', $this->page_data);
    }

    public function aathkotisangh(){
        $this->page_data['pagetitle']   = 'Depa Aath Koti Nani Paksh Jain Sangh';
        $this->page_data['pagename']    = 'activity-aathkotisangh';
        $this->page_data['breadcrumb']  = 'Depa Aath Koti Nani Paksh Jain Sangh';
        $this->load->view('web/main', $this->page_data);
    }

    public function seniorcitizen(){
        $this->page_data['pagetitle']   = 'Senior Citizen Samiti';
        $this->page_data['pagename']    = 'activity-seniorcitizen';
        $this->page_data['breadcrumb']  = 'Senior Citizen Samiti';
        $this->load->view('web/main', $this->page_data);
    }

    public function depayuvak(){
        $this->page_data['pagetitle']   = 'Depa Yuvak Mandal';
        $this->page_data['pagename']    = 'activity-depayuvak';
        $this->page_data['breadcrumb']  = 'Depa Yuvak Mandal';
        $this->load->view('web/main', $this->page_data);
    }

    public function gunjanmandal(){
        $this->page_data['pagetitle']   = 'Depa Gunjan Mahila Mandal';
        $this->page_data['pagename']    = 'activity-gunjanmandal';
        $this->page_data['breadcrumb']  = 'Depa Gunjan Mahila Mandal';
        $this->load->view('web/main', $this->page_data);
    }

    public function donate(){
        $this->page_data['pagetitle']   = 'Donation';
        $this->page_data['pagename']    = 'activity-donate';
        $this->page_data['breadcrumb']  = 'Donation';
        $this->load->view('web/main', $this->page_data);
    }


    public function donations($ids){
        if ($ids == '') {
            redirect(base_url(), 'refresh');
        }
        $this->load->model('donation_model' ,'donations');
        //$this->page_data['pagetitle']   = 'Family Details';
        $this->page_data['result']      = $this->donations->donations_list($ids);
        //$this->page_data['msg']         = $msg;
        
        $this->page_data['pagetitle']   = 'Donations';
        $this->page_data['pagename']    = 'activity-donations';
        $this->page_data['breadcrumb']  = 'Donations';
        $this->page_data['addbtn']      = 1;
        $this->page_data['addbtnlink']  = base_url().'donate';
        $this->load->view('web/main', $this->page_data);
    }
    

    public function ongoing(){
        $this->page_data['pagetitle']   = 'Ongoing';
        $this->page_data['pagename']    = 'activity-ongoing';
        $this->page_data['breadcrumb']  = 'Ongoing';
        $this->load->view('web/main', $this->page_data);
    }

    public function others(){
        $this->page_data['pagetitle']   = 'Others';
        $this->page_data['pagename']    = 'activity-others';
        $this->page_data['breadcrumb']  = 'Others';
        $this->load->view('web/main', $this->page_data);
    }
    public function blog(){
        $this->page_data['pagetitle']   = 'Blog';
        $this->page_data['pagename']    = 'blog';
        $this->page_data['breadcrumb']  = 'Blog';
        $this->page_data['addbtn']      = 1;
        $this->page_data['addbtnlink']  = base_url().'blog/add';
        $this->load->view('web/main', $this->page_data);
    }

    public function newblog(){
        $this->page_data['pagetitle']   = 'New Blog';
        $this->page_data['pagename']    = 'new-blog';
        $this->page_data['breadcrumb']  = 'New Blog';
        $this->load->view('web/main', $this->page_data);
    }

    public function blogdetail($title){
        $this->page_data['slug']        = $title;
        $this->page_data['pagetitle']   = 'Blog - '.$title;
        $this->page_data['pagename']    = 'blogdetail';
        $this->page_data['breadcrumb1'] = 'Blog';
        $this->page_data['br_url']      = 'blog';
        $this->page_data['breadcrumb']  = $title;
        $this->load->view('web/main', $this->page_data);
    }

    public function b2b(){
        $this->page_data['pagetitle']   = 'B2B';
        $this->page_data['pagename']    = 'b2b';
        $this->page_data['breadcrumb']  = 'B2B';
        $this->page_data['addbtn']      = 1;
        $this->page_data['addbtnlink']  = base_url().'business/add';
        $this->load->view('web/main', $this->page_data);
    }

    public function b2bdetail($id){
        $this->page_data['pagetitle']   = 'B2B Detail';
        $this->page_data['id']          = $id;
        $this->page_data['pagename']    = 'b2bdetail';
        $this->page_data['breadcrumb1'] = 'B2B';
        $this->page_data['br_url']      = 'b2b';
        $this->page_data['breadcrumb']  = 'B2B Detail';
        $this->load->view('web/main', $this->page_data);
    }

    public function newbusiness(){
        $this->page_data['pagetitle']   = 'New Business';
        $this->page_data['pagename']    = 'new-business';
        $this->page_data['breadcrumb']  = 'New Business';
        $this->page_data['businesscat'] = getmaster('business_category', 'html', 'Business Category', 'category');
        $this->page_data['subscription'] = getmaster('subscription', 'html', 'Business Subscription', 'subscription');
        $this->load->view('web/main', $this->page_data);
    }
    
    public function job(){
        $this->page_data['pagetitle']   = 'Job';
        $this->page_data['pagename']    = 'job';
        $this->page_data['breadcrumb']  = 'Job';
        $this->page_data['addbtn']      = 1;
        $this->page_data['addbtnlink']  = base_url().'job/add';
        $this->load->view('web/main', $this->page_data);
    }

    public function newjob(){

        $this->page_data['pagetitle']   = 'New Job';
        $this->page_data['pagename']    = 'new-job';
        $this->page_data['breadcrumb']  = 'NewJob';
        $this->load->view('web/main', $this->page_data);
    }

    public function jobdetail($jobid){
        $this->page_data['pagetitle']   = 'Job Detail';
        $this->page_data['jobid']       = $jobid;
        $this->page_data['pagename']    = 'jobdetail';
        $this->page_data['br_url']      = 'jobs';
        $this->page_data['breadcrumb1'] = 'Job';
        $this->page_data['breadcrumb']  = 'Job Detail';
        $this->load->view('web/main', $this->page_data);
    }

    public function newsandevent(){
        $this->page_data['pagetitle']   = 'Latest';
        $this->page_data['pagename']    = 'newsandevent';
        $this->page_data['breadcrumb']  = 'Latest';
        $this->load->view('web/main', $this->page_data);
    }

    public function newseventsdetail($title){
        $this->page_data['pagetitle']   = 'Latest '.$title;
        $this->page_data['pagename']    = 'newseventsdetail';
        $this->page_data['br_url']      = 'news-and-event';
        $this->page_data['breadcrumb1'] = 'Latest';
        $this->page_data['breadcrumb']  = $title;
        $this->load->view('web/main', $this->page_data);
    }

    public function gallery(){
        $this->page_data['pagetitle']   = 'Gallery';
        $this->page_data['pagename']    = 'gallery';
        $this->page_data['breadcrumb']  = 'Gallery';
        $this->load->view('web/main', $this->page_data);
    }

    public function gallerydetail($title){
        $this->load->model('gallery_model', 'gallery');        
        $this->page_data['gallerytitle'] = ucwords(str_replace('-', ' ', $title));
        $gal_id = $this->gallery->getid($title);
        
        $this->gallery->_condition['deleted'] = 0;
        $this->gallery->_condition['slug'] = $title;

        $thumbnail = $this->gallery->getRows();
// print_r($thumbnail);
        unset($this->gallery->_condition['slug']);
        $this->gallery->change_table('gallery_image');
        $this->gallery->_condition['deleted'] = 0;
        $this->gallery->_condition['gal_id'] = $gal_id->id;

        $data = $this->gallery->getRows();
        $html = $this->createGallerymansion($data, $thumbnail[0], $title);
        
        $this->page_data['html']        = $html;
        $this->page_data['slug']        = $title;
        $this->page_data['data']        = $thumbnail[0];
        $this->page_data['pagetitle']   = 'Gallery '.$title;
        $this->page_data['pagename']    = 'gallery-detail';
        $this->page_data['breadcrumb1'] = 'Gallery';
        $this->page_data['br_url']      = 'gallery';
        $this->page_data['breadcrumb']  = $title;
        $this->load->view('web/main', $this->page_data);
    }


    public function createGallerymansion($data,$thumbnail, $title){

        $html = '';
        $html .= '<div class="col-md-12">
                    <div id="grid" class="masonry-gallery grid-four-item clearfix">';

        $html .= '<div class="isotope-item creative corporate">
                  <div class="gallery-thumb">
                      <img class="img-responsive zoom img-whp" src="'.base_url().'uploads/gallery/'.$thumbnail['thumbnail'].'" alt="'.$title.'">
                      <div class="overlayer">
                          <div class="lbox-caption">
                              <div class="lbox-details">
                                  <ul class="list-inline">
                                      <li>
                                          <a class="popup-img" href="'.base_url().'uploads/gallery/'.$thumbnail['thumbnail'].'" title="'.$title.'"><span class="flaticon-add-square-button"></span></a>
                                      </li>
                                  </ul>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>';

        foreach ($data as $row) {
            # code...
            $html .= '<div class="isotope-item creative corporate">
                              <div class="gallery-thumb">
                                  <img class="img-responsive img-whp" src="'.base_url().'uploads/gallery/'.$row['image'].'" alt="'.$title.'">
                                  <div class="overlayer">
                                      <div class="lbox-caption">
                                          <div class="lbox-details">
                                              <ul class="list-inline">
                                                  <li>
                                                      <a class="popup-img" href="'.base_url().'uploads/gallery/'.$row['image'].'" title="'.$title.'"><span class="flaticon-add-square-button"></span></a>
                                                  </li>
                                              </ul>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>';
        }
        $html .='</div></div>';

        return $html;
    }

    public function contactus(){
        $this->page_data['pagetitle']   = 'Contact Us';
        $this->page_data['pagename']    = 'contact-us';
        $this->page_data['breadcrumb']  = 'Contact Us';
        $this->load->view('web/main', $this->page_data);
    }

    public function register(){
        $this->page_data['pagetitle']   = 'Register';
        $this->page_data['pagename']    = 'register';
        $this->page_data['breadcrumb']  = 'Register';
        $this->load->view('web/main', $this->page_data);
    }

    public function forgotpassword(){
        $this->page_data['pagetitle']   = 'Forgot Password';
        $this->page_data['pagename']    = 'forgot-password';
        $this->page_data['breadcrumb']  = 'Forgot Password';
        $this->page_data['surname']      = getmaster('surname','html','Surname','surname');
        $this->load->view('web/main', $this->page_data);
    }
   
    public function alternativelogin(){
        $this->page_data['pagetitle']   = 'Alternative Login';
        $this->page_data['pagename']    = 'alternative-login';
        $this->page_data['breadcrumb']  = 'Alternative Login';
        // $this->page_data['village']      = getmaster('village','html','Village','village');
        $this->page_data['surname']      = getmaster('surname','html','Surname','surname');

        $this->load->view('web/main', $this->page_data);
    }

    public function ads(){
        $this->page_data['pagetitle']   = 'Advertise';
        $this->page_data['pagename']    = 'ads';
        $this->page_data['breadcrumb']  = 'Advertise';
        $this->load->view('web/main', $this->page_data);
    }

    public function blood_donation_camp(){
        $this->page_data['pagetitle']   = 'Blood Donation Camp';
        $this->page_data['pagename']    = 'blood-donation-camp';
        $this->page_data['breadcrumb']  = 'Blood Donation Camp';
        $this->load->view('web/main', $this->page_data);
    }

    /*public function matrimonial(){
        $this->page_data['pagetitle']   = 'Matrimonial';
        $this->page_data['pagename']    = 'matrimonial';
        $this->page_data['breadcrumb']  = 'Matrimonial';
        $this->load->view('web/main', $this->page_data);
    }

    public function matrimonialdetail($title){
        $this->page_data['pagetitle']   = 'Matrimonial '.$title;
        $this->page_data['pagename']    = 'matrimonialdetail';
        $this->page_data['br_url']    = 'matrimonial';
        $this->page_data['breadcrumb1'] = 'Matrimonial';
        $this->page_data['breadcrumb']  = $title;
        $this->load->view('web/main', $this->page_data);
    }*/

    public function directory(){
        if ($this->session->userdata('logged_in') != 1 && $this->session->userdata('logintype') != 'normal' ) {
            redirect(base_url(), 'refresh');
        }
        // print_r($_SESSION);
        $this->page_data['pagetitle']   = 'Directory';
        $this->page_data['pagename']    = 'directory';
        $this->page_data['breadcrumb']  = 'directory';
        $this->load->view('web/main', $this->page_data);
    }

    public function directory_1(){
        if ($this->session->userdata('logged_in') != 1 && $this->session->userdata('logintype') != 'normal' ) {
            redirect(base_url(), 'refresh');
        }
        // print_r($_SESSION);
        $this->page_data['pagetitle']   = 'Directory';
        $this->page_data['pagename']    = 'directory_1';
        $this->page_data['breadcrumb']  = 'directory';
        $this->load->view('web/main', $this->page_data);
    }

    public function search(){
        if ($this->session->userdata('logged_in') != 1 && $this->session->userdata('logintype') != 'normal' ) {
            redirect(base_url(), 'refresh');
        }
        // print_r($_SESSION);
        $search                         = $_POST['search'] ?? '';
        $this->page_data['pagetitle']   = 'Search';
        $this->page_data['pagename']    = 'search';
        $this->page_data['breadcrumb']  = 'Search';
        $this->page_data['search']      = $search;
        $this->load->view('web/main', $this->page_data);
    }
    
    
    
    /**************************************************************************/
    
    
    public function matrimonial($ids){
        if ($ids == '') {
            redirect(base_url(), 'refresh');
        }
        $this->load->model('matrimonial_model' ,'matrimonial_model');
        $this->page_data['result']      = $this->matrimonial_model->matrimonial_list($ids);
    
        $this->page_data['pagetitle']   = 'Matrimony List';
        $this->page_data['pagename']    = 'activity-matrimonial';
        $this->page_data['breadcrumb']  = 'Matrimony List';
        $this->load->view('web/main', $this->page_data);
    }

    public function matrimonials(){

        $this->load->model('matrimonial_model' ,'matrimonial_model');
        $this->page_data['result']      = $this->matrimonial_model->matrimonial_all_list();

        $this->page_data['pagetitle']   = 'Matrimony';
        $this->page_data['pagename']    = 'matrimonial';
        $this->page_data['breadcrumb']  = 'Matrimony';
        $this->load->view('web/main', $this->page_data);
    }

    public function matrimonialdetail($ids){

        if ($ids == '') {
            redirect(base_url(), 'refresh');
        }
        $this->load->model('matrimonial_model' ,'matrimonial_model');
        $this->page_data['result']      = $this->matrimonial_model->matrimonial_details($ids);

        $this->page_data['pagetitle']   = 'Matrimony Details';
        $this->page_data['pagename']    = 'matrimonialdetail';
        $this->page_data['breadcrumb'] = 'Matrimony';
        $this->load->view('web/main', $this->page_data);
    }
    
    public function matrimonial_add(){
        $this->load->model('family_model' ,'family');
        $family_id = $this->session->userdata('family_id');
        $this->page_data['result']      = $this->family->familydetails($family_id);
    
        $this->page_data['pagetitle']   = 'Matrimony Add';
        $this->page_data['pagename']    = 'activity-matrimonial-add';
        $this->page_data['breadcrumb']  = 'Matrimony Add';
        $this->load->view('web/main', $this->page_data);
    }

    public function help_us($ids){
        if ($ids == '') {
            redirect(base_url(), 'refresh');
        }
        $this->load->model('help_us_model' ,'help_us');
        $this->page_data['result']      = $this->help_us->help_us_list($ids);
        
        $this->page_data['pagetitle']   = 'Help us List';
        $this->page_data['pagename']    = 'help_us';
        $this->page_data['breadcrumb']  = 'Help Us List';
        $this->load->view('web/main', $this->page_data);
    }

    public function add_help_us(){
        $this->page_data['pagetitle']   = 'Add Help Us';
        $this->page_data['pagename']    = 'add_help_us';
        $this->page_data['breadcrumb']  = 'Add Help Us';
        $this->page_data['addbtn']      = 0;
        $this->page_data['addbtnlink']  = base_url().'add_help_us';
        $this->load->view('web/main', $this->page_data);
    }

    public function helpus(){
        $id = $this->session->userdata('family_no');
        $this->load->model('help_us_model' ,'help_us');
        $this->page_data['data']   = $this->help_us->getapprovedlist();
        $this->page_data['pagetitle']   = 'Help Us';
        $this->page_data['pagename']    = 'helpus_list';
        $this->page_data['breadcrumb']  = 'Help Us';
        $this->page_data['addbtn']      = 1;
        $this->page_data['addbtnlink']  = base_url().'help_us/'.$id;
        $this->load->view('web/main', $this->page_data);
    }

    public function helpus_detail($id){
        $this->load->model('help_us_model' ,'help_us');
        $this->page_data['data']   = $this->help_us->getbyid($id);

        $this->page_data['pagetitle']   = 'Help Us Detail';
        $this->page_data['id']          = $id;
        $this->page_data['pagename']    = 'helpus_detail';
        $this->page_data['breadcrumb1'] = 'Help Us';
        $this->page_data['br_url']      = 'helpus';
        $this->page_data['breadcrumb']  = 'Help Us Detail';
        $this->load->view('web/main', $this->page_data);
    }

    public function gallery_video(){

        $this->load->model('gallery_video_model', 'gallery');
        $data = $this->gallery->getall();

        $this->page_data['data']        = $data;
        $this->page_data['pagetitle']   = 'Video Gallery';
        $this->page_data['pagename']    = 'gallery-video';
        $this->page_data['breadcrumb']  = 'Video Gallery';
        $this->load->view('web/main', $this->page_data);
    }
    
    
    
    
}