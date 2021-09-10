<style>
#leftsidebar{top:70px}
.list li a,.navbar-brand span {font-size: 14px}
.sub-menu{list-style: none;display: none}
.sidebar .menu .list a{padding:10px }
</style>
<aside id="leftsidebar" class="sidebar">
    <div class="menu">
        <ul class="list">
            <li><a href="<?= base_url();?>dashboard"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
            <!-- <li><a href="javascript:void(0)"><i class="zmdi zmdi-home"></i><span>Import</span></a></li> -->
            <li><a href="javascript:void(0)" class="menu-toggle"><i class="zmdi zmdi-book"></i><span>Masters</span></a>
                <ul class="ml-menu">
                    <li><a href="<?= base_url('admin/masters/area');?>">Area</a></li>
                    <li><a href="<?= base_url('admin/masters/bloodgroup');?>">Blood Group</a></li>
                    <li><a href="<?= base_url('admin/masters/business-category');?>">Business Category</a></li>
                    <li><a href="<?= base_url('admin/masters/dharmik-knowledge');?>">Dharmik Knowledge</a></li>
                    <li><a href="<?= base_url('admin/masters/donation-category');?>">Donation Category</a></li>
                    <li><a href="<?= base_url('admin/masters/education');?>">Education</a></li>
                    <li><a href="<?= base_url('admin/masters/marital-status');?>">Marital Status</a></li>
                    <li><a href="<?= base_url('admin/masters/occupation');?>">Occupation</a></li>
                    <li><a href="<?= base_url('admin/masters/relation');?>">Relation</a></li>
                    <li><a href="<?= base_url('admin/masters/sports');?>">Sports</a></li>
                    <li><a href="<?= base_url('admin/masters/surname');?>">Surname</a></li>
                    <li><a href="<?= base_url('admin/masters/village');?>">Village</a></li>
                </ul>
            </li>
            <li><a href="javascript:void(0)" class="menu-toggle"><i class="zmdi zmdi-book"></i><span>Manage </span></a>
                <ul class="sub-menu">
                    <li><a href="<?= base_url('admin/donation');?>"><i class="zmdi zmdi-book"></i><span>Donation</span></a></li>
                    <li><a href="<?= base_url('admin/helpus');?>"><i class="zmdi zmdi-help"></i><span>Help Us</span></a></li>
                    <li><a href="<?= base_url('admin/matrimonial');?>"><i class="zmdi zmdi-flower"></i><span>Matrimonial</span></a></li>
                    <li><a href="<?= base_url('admin/matrirequest');?>"><i class="zmdi zmdi-male-female"></i><span>Matri.. Requests</span></a></li>
                    <li><a href="javascript:void(0)" class="menu-toggle"><i class="zmdi zmdi-book"></i><span>Family</span></a>
                        <ul class="ml-menu">
                            <li><a href="<?= base_url('admin/family/new');?>">Add</a></li>
                            <li><a href="<?= base_url('admin/family/head-list');?>">View</a></li>
                        </ul>
                    </li>
                
                    <li><a href="javascript:void(0)" class="menu-toggle"><i class="zmdi zmdi-book"></i><span>Member</span></a>
                        <ul class="ml-menu">
                            <li><a href="<?= base_url('admin/family/new-member')?>">Add</a></li>
                            <li><a href="<?= base_url('admin/family/member-list');?>">View</a></li>
                        </ul>
                    </li>

                    <li><a href="javascript:void(0)" class="menu-toggle"><i class="zmdi zmdi-book"></i><span> Donors</span></a>
                        <ul class="ml-menu">
                            <li><a href="<?= base_url('admin/donor/new');?>">Add</a></li>
                            <li><a href="<?= base_url('admin/donor/list');?>">View</a></li>
                        </ul>
                    </li>

                    <li><a href="javascript:void(0)" class="menu-toggle"><i class="zmdi zmdi-book"></i><span> News & Event</span></a>
                        <ul class="ml-menu">
                            <li><a href="<?= base_url('admin/latest/new');?>">Add</a></li>
                            <li><a href="<?= base_url('admin/latest/list');?>">View</a></li>
                        </ul>
                    </li>
                    
                    <li><a href="javascript:void(0)" class="menu-toggle"><i class="zmdi zmdi-book"></i><span> Blog</span></a>
                        <ul class="ml-menu">
                            <li><a href="<?= base_url('admin/blog/new');?>">Add</a></li>
                            <li><a href="<?= base_url('admin/blog/list');?>">View</a></li>
                        </ul>
                    </li>

                   <!--  <li><a href="javascript:void(0)" class="menu-toggle"><i class="zmdi zmdi-book"></i><span> Article</span></a>
                        <ul class="ml-menu">
                            <li><a href="#">Add</a></li>
                            <li><a href="#">View</a></li>
                        </ul>
                    </li> -->

                    <li><a href="javascript:void(0)" class="menu-toggle"><i class="zmdi zmdi-book"></i><span> Gallery</span></a>
                        <ul class="ml-menu">
                            <li><a href="<?= base_url('admin/gallery/new');?>">Add</a></li>
                            <li><a href="<?= base_url('admin/gallery/list');?>">View</a></li>
                        </ul>
                    </li>
                    
                    <li><a href="javascript:void(0)" class="menu-toggle"><i class="zmdi zmdi-book"></i><span>Video Gallery</span></a>
                        <ul class="ml-menu">
                            <li><a href="<?= base_url('admin/gallery_video/new');?>">Add</a></li>
                            <li><a href="<?= base_url('admin/gallery_video/list');?>">View</a></li>
                        </ul>
                    </li>

                   <!--  <li><a href="javascript:void(0)" class="menu-toggle"><i class="zmdi zmdi-book"></i><span> Advertisement</span></a>
                        <ul class="ml-menu">
                            <li><a href="#">Add</a></li>
                            <li><a href="#">View</a></li>
                        </ul>
                    </li> -->

                    <li><a href="javascript:void(0)" class="menu-toggle"><i class="zmdi zmdi-book"></i><span> B2B</span></a>
                        <ul class="ml-menu">
                            <li><a href="<?= base_url('admin/b2b/add');?>">Add</a></li>
                            <li><a href="<?= base_url('admin/b2b/list/all');?>">View</a></li>
                        </ul>
                    </li>

                    <li><a href="javascript:void(0)" class="menu-toggle"><i class="zmdi zmdi-book"></i><span> Jobs</span></a>
                        <ul class="ml-menu">
                            <li><a href="<?= base_url('admin/job/add');?>">Add</a></li>
                            <li><a href="<?= base_url('admin/job/list/all');?>">View</a></li>
                        </ul>
                    </li>

                    <li><a href="javascript:void(0)" class="menu-toggle"><i class="zmdi zmdi-book"></i><span> Maran Nondh</span></a>
                        <ul class="ml-menu">
                            <li><a href="<?= base_url('admin/marannondh/add');?>">Add</a></li>
                            <li><a href="<?= base_url('admin/marannondh/list');?>">View</a></li>
                        </ul>
                    </li>
                    <li><a href="javascript:void(0)" class="menu-toggle"><i class="zmdi zmdi-book"></i><span> Prarthana</span></a>
                        <ul class="ml-menu">
                            <li><a href="<?= base_url('admin/saadri/add');?>">Add</a></li>
                            <li><a href="<?= base_url('admin/saadri/list');?>">View</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <!-- <li><a href="#"><i class="zmdi zmdi-book"></i><span>Maran Nondh</span></a></li> -->
           <!--  <li><a href="javascript:void(0)" class="menu-toggle"><i class="zmdi zmdi-book"></i><span>Export</span></a>
                <ul class="ml-menu">
                    <li><a href="#">Family Head</a></li>
                    <li><a href="#">All Family</a></li>
                    <li><a href="#">Member</a></li>
                    <li><a href="#">Matrimonial</a></li>
                </ul>
            </li> -->
            <!-- <li><a href="javascript:void(0)" class="menu-toggle"><i class="zmdi zmdi-book"></i><span>Anshan</span></a>
                <ul class="ml-menu">
                    <li><a href="#">Add</a></li>
                    <li><a href="#">List</a></li>
                </ul>
            </li> -->

            <li><a href="javascript:void(0)" class="menu-toggle"><i class="zmdi zmdi-book"></i><span>Bulk SMS/Email</span></a>
                <ul class="ml-menu">
                    <li><a href="<?= base_url();?>admin/bulksms/new">SMS (Send/View)</a></li>
                    <li><a href="<?= base_url();?>admin/bulkemail/new">Email (Send/View)</a></li>
                </ul>
            </li>
            
            <!--<li><a href="javascript:void(0)" class="menu-toggle"><i class="zmdi zmdi-book"></i><span>Data Export</span></a>
                <ul class="ml-menu">
                    <li><a href="<?= base_url();?>exportdata" target="_blank">Family (Export)</a></li>
                    <li><a href="<?= base_url();?>exportdata">Member (Export)</a></li>
                </ul>
            </li>-->
            
            <li><a href="javascript:void(0)" class="menu-toggle"><i class="zmdi zmdi-book"></i><span>Info Update</span></a>
                <ul class="ml-menu">
                    <!-- <li><a href="#">Add Death Info</a></li>
                    <li><a href="#">Change Committee Member</a></li> -->
                    <li><a href="<?= base_url();?>changepassword">Reset Password</a></li>
                </ul>
            </li>
            <li><a href="<?= base_url();?>Api/login/logout"><i class="zmdi zmdi-lock"></i><span>Logout</span></a></li>

           <!--  <li><a href="javascript:void(0)" class="menu-toggle"><i class="zmdi zmdi-book"></i><span>SMS / MAIL</span></a>
                <ul class="ml-menu">
                    <li><a href="#">Today Mail/SMS</a></li>
                    <li><a href="#">Group Mail/SMS</a></li>
                    <li><a href="#">Committee Mail/SMS</a></li>
                    <li><a href="#">Personal Mail/SMS</a></li>
                </ul>
            </li> -->
        </ul>
    </div>
</aside>