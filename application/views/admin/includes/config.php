<div class="br-logo">
    <div class="navbar-brand">
        <a href="<?= base_url();?>admin">
          <img class="logo" src="<?= base_url();?>assets/web/images/logo1.png" alt="Logo" width="50">
          <span class="m-l-10">DEPA</span>
        </a>
    </div>
</div>
<div class="br-header">
      <div class="br-header-left"><button class="btn-menu ls-toggle-btn mmenu" type="button"><i class="zmdi zmdi-menu"></i></button>
      <button class="btn-menu mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
      </div>
      <!-- br-header-left -->
      <div class="br-header-right">
         <nav class="nav">
         	<div class="detail" style="padding-right: 10px">
                <small><?= $this->session->userdata('full_name')?><br /><i>Login As <?= $this->session->userdata('logintype')?></i></small>
            </div>
            <!-- <ul class="header-dropdown list-unstyled">
                <div class="body">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle menu-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="zmdi zmdi-settings"></i><span> </a>
                        <ul class="dropdown-menu slideUp">
                          <?php
                              if($this->session->userdata('logintype') == 'admin'){
                          ?>
                            <li><a href="<?= base_url();?>general-settings"><i class="zmdi zmdi-settings"></i><span>General Settings</span></a></li>
                            <li><a href="<?= base_url();?>system-settings"><i class="zmdi zmdi-settings"></i><span>System Settings</span></a></li>
                            <li><a href="<?= base_url();?>email-settings"><i class="zmdi zmdi-settings"></i><span>Email Settings</span></a></li>
                            <li><a href="<?= base_url();?>sms-settings"><i class="zmdi zmdi-account-o"></i><span>SMS Setting</span></a></li>
                            <li><a href="<?= base_url();?>users"><i class="zmdi zmdi-account-o"></i><span>Manage Users</span></a></li>
                          <?php }?>
                            <li><a href="<?= base_url();?>change-password"><i class="zmdi zmdi-key"></i><span>Change Password</span></a></li>
                        </ul>
                    </li>
                </div>
            </ul> -->
         </nav>
      </div>
   </div>
<div class="fright">
    <div class="dropdown">
        <a href="#" class="nav-link nav-link-profile" data-toggle="dropdown" aria-expanded="true">
            <span class="logged-name hidden-md-down"></span>
            <i class="zmdi zmdi-settings"></i><span>
            <!-- <img src="http://localhost/admin/sample1/assets/img/img1.jpg" class="wd-32 rounded-circle" alt=""> -->
            <span class="square-10 bg-success"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-header wd-200" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 48px, 0px); top: 0px; left: 0px; will-change: transform;">
            <ul class="list-unstyled user-profile-nav">
                <li><a href="#"><i class="icon ion-ios-person-outline"></i> Edit Profile</a></li>
                <li><a href="#"><i class="icon ion-ios-gear-outline"></i> Settings</a></li>
                <li><a href="#"><i class="icon ion-ios-download-outline"></i> Downloads</a></li>
                <li><a href="#"><i class="icon ion-ios-star-outline"></i> Favorites</a></li>
                <li><a href="#"><i class="icon ion-ios-folder-outline"></i> Collections</a></li>
                <li><a href="#"><i class="icon ion-power"></i> Sign Out</a></li>
            </ul>
        </div>
    </div>
</div>   