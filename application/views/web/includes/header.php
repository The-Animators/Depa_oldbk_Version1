        
<style type="text/css">
.lohgu{
  position: fixed;
  top: 2px;
  left: 2px;
  width: max-content;
  height: max-content;
  z-index: 1010;
}

button.navbar-toggle{
    float:right !important;
    margin-right: 0px !important;
}

@media screen and (max-width: 992px) {
    div#navbar-menu{
        margin-top:50px;
    }
    .topsearchcontainer {
      float: left !important;
      margin-top: 15px!important;
      margin-left: 100px;
    }

}
.topsearchcontainer {
  float: right;
  margin-top: 15px
}

.search-container input[type=text],.search-container button{
    border:1px solid #11c0b4;
}

.search-container button {
    padding: 1px 6px;
    /*margin-right: 16px;*/
    /*background: #ddd;*/
    font-size: 14px;
    margin-left: -5px;
    cursor: pointer;
}

@media screen and (max-width: 600px) {
  /*.search-container {*/
  /*  float: left;*/
  /*  margin-left: 100px;*/
  /*}*/
  /*.search-container button {*/
  /*  float: none;*/
  /*  display: inline-block;*/
  /*  text-align: left;*/
  /*  margin: 0;*/
    /*width: 100%;*/
    /*padding: 14px;*/
  /*}*/
  /*.search-container input[type=text] {*/
  /*  border: 1px solid #ccc;  */
  /*}*/
  .ulockd-welcntxt, .welcm-ht {
    /*float: right;*/
    /*margin-bottom: 0px;*/
  }
}
</style>

<header class="header-nav">
    <div class="main-header-nav navbar-scrolltofixed">
        <div class="container">
            <nav class="navbar navbar-default bootsnav menu-style1">
                <!-- Start Top Search -->
                <!-- End Top Search -->
                <div class="container ulockd-pad90">
                    <!-- <?php 
                 // if( ($this->session->userdata('logintype') == 'normal') && ($this->session->userdata('logged_in'))){ ?>

                    <div class="search-container topsearchcontainer">
                        <form action="<?= base_url();?>search" method="POST">
                          <input type="text" name="search" id="search" placeholder="Search" value="<?= $search ?? '';?>">
                          <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    
                <?php //} ?>-->
                    <!-- Start Header Navigation -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                            <i class="fa fa-bars"></i>
                        </button>
                    </div>
                    <!-- End Header Navigation -->
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="navbar-menu">
                        <ul class="nav navbar-nav navbar-left" data-in="fadeIn">
                            <li>
                                <a href="<?= base_url();?>">Home</a>
                            </li>
                            <li class="dropdown">
                                <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">About Us</a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?= base_url();?>history" class="text-uppercase">History</a></li>
                                    <li><a href="<?= base_url();?>president-message" class="text-uppercase">President Message</a></li>
                                    <li><a href="<?= base_url();?>committee" class="text-uppercase">Committee (Mahajan)</a></li>
                                    <li><a href="<?= base_url();?>depa-map" class="text-uppercase">DEPA MAP</a></li>
                                    <li><a href="<?= base_url();?>family-tree" class="text-uppercase">Family Tree</a></li>
                                    <li><a href="<?= base_url();?>jovar" class="text-uppercase">Mataji Jovar Info</a></li>
                                    <li><a href="<?= base_url();?>places-to-visit" class="text-uppercase">Places to Visit</a></li>
                                </ul>
                            </li>
                            <!--<li class="dropdown">
                                <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">Activity</a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?= base_url();?>general" class="text-uppercase">General Samiti</a></li>
                                    <li><a href="<?= base_url();?>education" class="text-uppercase">Education Samiti</a></li>
                                    <li><a href="<?= base_url();?>sports" class="text-uppercase">Sports Samiti</a></li>
                                    <li><a href="<?= base_url();?>medical" class="text-uppercase">Medical Samiti</a></li>
                                    <li><a href="<?= base_url();?>religions" class="text-uppercase">Dharmik Samiti</a></li>
                                    <li><a href="<?= base_url();?>regional" class="text-uppercase">Regional Samiti</a></li>
                                    <li><a href="<?= base_url();?>aathkotisangh" class="text-uppercase">Depa Aath Koti Nani Paksh Jain Sangh</a></li>
                                    <li><a href="<?= base_url();?>seniorcitizen" class="text-uppercase">Senior Citizen Samiti</a></li>
                                    <li><a href="<?= base_url();?>depayuvak" class="text-uppercase">Depa Yuvak Mandal</a></li>
                                    <li><a href="<?= base_url();?>gunjanmandal" class="text-uppercase">Depa Gunjan Mandal</a></li>
                                </ul>
                            </li>-->
                            <li class="dropdown">
                                <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">Activity</a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?= base_url();?>education" class="text-uppercase">Education Samiti</a></li>
                                    <li><a href="<?= base_url();?>medical" class="text-uppercase">Medical Samiti</a></li>
                                    <li><a href="<?= base_url();?>religions" class="text-uppercase">Dharmik Samiti</a></li>
                                    <li><a href="<?= base_url();?>gunjanmandal" class="text-uppercase">Depa Gunjan Mandal</a></li>
                                    <li><a href="<?= base_url();?>seniorcitizen" class="text-uppercase">Senior Citizen Samiti</a></li>
                                    <li><a href="<?= base_url();?>sports" class="text-uppercase">Sports Samiti</a></li>
                                    <!--<li><a href="<?= base_url();?>regional" class="text-uppercase">Regional Samiti</a></li>-->
                                    <li><a href="<?= base_url();?>depayuvak" class="text-uppercase">Depa Yuvak Mandal</a></li>
                                    <li><a href="<?= base_url();?>aathkotisangh" class="text-uppercase">Depa Aath Koti Nani Paksh Jain Sangh</a></li>
                                    <li><a href="<?= base_url();?>general" class="text-uppercase">General Samiti</a></li>
                                    <!-- <li><a href="<?= base_url();?>ongoing" class="text-uppercase">On Going</a></li> -->
                                    <!-- <li><a href="<?= base_url();?>others" class="text-uppercase">Others</a></li> -->
                                    
                                </ul>
                            </li>
                            <li><a href="<?= base_url();?>news-and-event" class="text-uppercase">Latest</a></li>
                            <li><a href="<?= base_url();?>blog" class="text-uppercase">Blog</a></li>
                            <li><a href="<?= base_url();?>b2b" class="text-uppercase">B2B</a></li>
                            <li><a href="<?= base_url();?>jobs" class="text-uppercase">Jobs</a></li>
                            <!-- <li><a href="<?= base_url();?>gallery" class="text-uppercase">Gallery</a></li> -->

                            <li class="dropdown">
                                <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">Gallery</a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?= base_url();?>gallery" class="text-uppercase">Image Gallery</a></li>
                                    <li><a href="<?= base_url();?>gallery_video" class="text-uppercase">Video Gallery</a></li>
                                </ul>
                            </li>
                            
                            <li><a href="<?= base_url();?>matrimonials" class="text-uppercase">Matrimony</a></li>
                            <li><a href="<?= base_url();?>helpus" class="text-uppercase">Help Us</a></li>
                            
                            <?php  if( ($this->session->userdata('logintype') == 'normal') && ($this->session->userdata('logged_in'))){?>
                            
                                <li><a href="<?= base_url();?>directory" class="text-uppercase">Directory</a></li>
                            
                            <?php } ?>
                            
                            <li><a href="<?= base_url();?>donate" class="text-uppercase">Donation</a></li>
                            <li><a href="<?= base_url();?>contact-us" class="text-uppercase">Contact us</a></li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div>
            </nav>
        </div>
    </div>
</header>