<?php
    $date = date('Y-m-d');
?>
<style type="text/css">h2 a {color:#bdbdbd}.error{color: #FF0000}
.bd-highlight h5{color:#FFF; font-size: 18px;font-weight: bold}
.bd-highlight small{color:#FFF}
.mcard_1 .user{margin-top: 0}
.mcard_1 .user h5{font-weight: bold}
.card .header {
    padding: 20px 0 20px 0;
}
</style>
<section class="content">
    <?php $this->load->view('admin/includes/breadcrumb');?>
    <div class="container-fluid">

        <div class="row clearfix">
            <div class="col-lg-4 col-md-6">
                <?php 
                    $query1 = $this->db->get_where('master_job', array('status' => 0,'deleted' => 0));
                    $rows1  = $query1->num_rows();

                    $query2 = $this->db->get_where('master_job', array('status' => 1,'deleted' => 0));
                    $rows2  = $query2->num_rows();

                    $query3 = $this->db->get_where('master_job', array('deleted' => 0));
                    $rows3  = $query3->num_rows();
                ?>
                <div class="card mcard_1">
                    <div class="body l-blush">
                        <div class="user">
                            <h5 class="mt-3 mb-1">Jobs</h5>
                        </div>
                        <div class="d-flex bd-highlight text-center mt-4">
                            <div class="flex-fill bd-highlight">
                                <a href="<?= base_url();?>admin/job/list/pending">
                                    <h5 class="mb-0"><?= $rows1;?></h5>
                                    <small>Pending</small>
                                </a>
                            </div>
                            <div class="flex-fill bd-highlight">
                                <a href="<?= base_url();?>admin/job/list/confirm">
                                    <h5 class="mb-0"><?= $rows2;?></h5>
                                    <small>Approved</small>
                                </a>
                            </div>
                            <div class="flex-fill bd-highlight">
                                <a href="<?= base_url();?>admin/job/list/all">
                                    <h5 class="mb-0"><?= $rows3;?></h5>
                                    <small>Total</small>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <?php 
                    $query1 = $this->db->get_where('master_b2b', array('status' => 0, 'deleted' => 0));
                    $rows1  = $query1->num_rows();

                    $query2 = $this->db->get_where('master_b2b', array('status' => 1, 'deleted' => 0));
                    $rows2  = $query2->num_rows();

                    $query3 = $this->db->get_where('master_b2b', array('deleted' => 0));
                    $rows3  = $query3->num_rows();
                ?>
                <div class="card mcard_1">
                    <div class="body l-purple">
                        <div class="user">
                            <h5 class="mt-3 mb-1">B2B</h5>
                        </div>
                        <div class="d-flex bd-highlight text-center mt-4">
                            <div class="flex-fill bd-highlight">
                                <a href="<?= base_url();?>admin/b2b/list/pending">
                                    <h5 class="mb-0"><?= $rows1;?></h5>
                                    <small>Pending</small>
                                </a>
                            </div>
                            <div class="flex-fill bd-highlight">
                                <a href="<?= base_url();?>admin/b2b/list/confirm">
                                    <h5 class="mb-0"><?= $rows2;?></h5>
                                    <small>Approved</small>
                                </a>
                            </div>
                            <div class="flex-fill bd-highlight">
                                <a href="<?= base_url();?>admin/b2b/list/all">
                                    <h5 class="mb-0"><?= $rows3;?></h5>
                                    <small>Total</small>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <?php 
                    $query1 = $this->db->get_where('master_blog', array('status' => 0, 'deleted' => 0));
                    $rows1  = $query1->num_rows();

                    $query2 = $this->db->get_where('master_blog', array('status' => 1, 'deleted' => 0));
                    $rows2  = $query2->num_rows();

                    $query3 = $this->db->get_where('master_blog', array('deleted' => 0));
                    $rows3  = $query3->num_rows();
                ?>
                <div class="card mcard_1">
                    <div class="body l-blush">
                        <div class="user">
                            <h5 class="mt-3 mb-1">Blog</h5>
                        </div>
                        <div class="d-flex bd-highlight text-center mt-4">
                            <div class="flex-fill bd-highlight">
                                <a href="<?= base_url();?>admin/blog/list/pending">
                                    <h5 class="mb-0"><?= $rows1;?></h5>
                                    <small>Pending</small>
                                </a>
                            </div>
                            <div class="flex-fill bd-highlight">
                                <a href="<?= base_url();?>admin/blog/list/confirm">
                                    <h5 class="mb-0"><?= $rows2;?></h5>
                                    <small>Approved</small>
                                </a>
                            </div>
                            <div class="flex-fill bd-highlight">
                                <a href="<?= base_url();?>admin/blog/list">
                                    <h5 class="mb-0"><?= $rows3;?></h5>
                                    <small>Total</small>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
       </div>


        <div class="row clearfix">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card info-box-2">
                        <div class="body bg-red">
                            <div class="icon col-12">
                                <i class="zmdi zmdi-account"></i>
                            </div>
                            <div class="content col-12">
                                <a href="<?= base_url();?>admin/family/member">
                                    <div class="text">Members</div>
                                    <div class="number"><?= $this->db->count_all('family_member');?></div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                <?php 
                    $query1 = $this->db->get_where('master_donation', array('status' => 0));
                    $rows1  = $query1->num_rows();

                    $query2 = $this->db->get_where('master_donation', array('status' => 1));
                    $rows2  = $query2->num_rows();

                    $query3 = $this->db->get_where('master_donation', array('status' => 2));
                    $rows3  = $query3->num_rows();
                ?>
                <div class="card mcard_1">
                    <div class="body l-blush">
                        <div class="user">
                            <h5 class="mt-3 mb-1">Donation</h5>
                        </div>
                        <div class="d-flex bd-highlight text-center mt-4">
                            <div class="flex-fill bd-highlight">
                                <a href="<?= base_url();?>admin/donation/pending">
                                    <h5 class="mb-0"><?= $rows1;?></h5>
                                    <small>Pending</small>
                                </a>
                            </div>
                            <div class="flex-fill bd-highlight">
                                <a href="<?= base_url();?>admin/donation/approved">
                                    <h5 class="mb-0"><?= $rows2;?></h5>
                                    <small>Approved</small>
                                </a>
                            </div>
                            <div class="flex-fill bd-highlight">
                                <a href="<?= base_url();?>admin/donation/reject">
                                    <h5 class="mb-0"><?= $rows3;?></h5>
                                    <small>Canceled</small>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<section class="content">
    <div class="container-fluid body_scroll">
        <div class="row clearfix">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Pending</strong> <?= $pagetitle='jobs';?> </h2>
                            <ul class="header-dropdown">
                                <li><a href="<?= base_url('admin/job/add');?>" class="btn btn-raised btn-primary btn-round waves-effect"> New <?= $pagetitle?></a>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable" id="jobsTable">
                                    <thead>
                                        <tr>
                                            <th>Firm Name</th>
                                            <th>Person</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Pending</strong> <?= $pagetitle="B2B"?> </h2>
                            <ul class="header-dropdown">
                                <li><a href="<?= base_url('admin/b2b/add');?>" class="btn btn-raised btn-primary btn-round waves-effect"> New <?= $pagetitle?></a>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable" id="b2bTable">
                                    <thead>
                                        <tr>
                                            <th>Firm Name</th>
                                            
                                            <th>Person</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Pending</strong>  <?= $pagetitle = "Blogs"?> </h2>
                            <ul class="header-dropdown">
                                <li><a href="<?= base_url('admin/blog/new'); ?>" class="btn btn-raised btn-primary btn-round waves-effect"> New Blog</a>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable" id="blogsTable">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Pending</strong> <?= $pagetitle= "Donation"?></h2>
                            
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Amount</th>
                                            <th>Reference Number</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Pending</strong> <?= $pagetitle= "Members"?></h2>
                            
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable" id="membersTable">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Familt ID</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Pending</strong> <?= $pagetitle= "Split"?></h2>
                            
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable" id="spmeMembersTable">
                                    <thead>
                                        <tr>
                                            <!--<th>Name</th>-->
                                            <th>Family ID</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Pending</strong> <?= $pagetitle= "Merge"?></h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable" id="mergeMembersTable">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Merge Data</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Pending</strong> <?= $pagetitle= "Help Us"?></h2>
                            
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable" id="helpusTable">
                                    <thead>
                                        <tr>
                                            <th>Family ID</th>
                                            <th>Name</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Pending</strong> <?= $pagetitle = "Matrimonial" ?></h2>
                            
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable" id="matrimonialTable">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Family ID</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                
        </div>
    </div>
</section>

<div class="modal fade" id="cameraModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="largeModalLabel">Test Camera</h4>
            </div>
            <div class="modal-body">  
                <div class="row">
                    <div class="col-md-12 form-control-label">
                        <div id="my_camera" class="camerror"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="testemailModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="smModalLabel">Test Email</h4>
            </div>
            <div class="modal-body">  
                 <form class="form-horizontal" method="post" id="email-form">
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-3 form-control-label">
                            <label for="sendto">Email </label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-9">
                            <div class="form-group">
                                <input type="text" id="sendto" name="sendto" class="form-control" placeholder="email">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 text-center">
                        <button type="button" id="sendtestemail" class="btn btn-raised btn-primary btn-round waves-effect"> Send Email <i class="zmdi zmdi-email"></i></button>
                        <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">CLOSE</button>
                    </div>
                </form>
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">CLOSE</button>
            </div> -->
        </div>
    </div>
</div>