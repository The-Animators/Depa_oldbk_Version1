<section class="content">
    <div class="body_scroll">
        <?php $this->load->view('admin/includes/breadcrumb');?>
        
        <div class="container-fluid">
            <!-- Horizontal Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Change</strong> Password</h2>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" method="post" id="general">
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                                        <label for="oldpassword">Old Password</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8">
                                        <div class="form-group">
                                            <input type="password" id="oldpassword" name="oldpassword" class="form-control" placeholder="Old Password">
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                                        <label for="newpassword">New Password</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8">
                                        <div class="form-group">
                                            <input type="password" id="newpassword" name="newpassword" class="form-control" placeholder="New Password">
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                                        <label for="confirmpassword">Confirm Password</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8">
                                        <div class="form-group">
                                            <input type="password" id="confirmpassword" name="confirmpassword" class="form-control" placeholder="Confirm Password">
                                        </div>
                                    </div>
                                </div>
                              
                                <div class="row clearfix">
                                    <div class="col-sm-8 offset-sm-2">
                                        <input type="hidden" name="id" id="id" value="<?= $this->session->userdata('user_id'); ?>">
                                        <button type="button" id="submitButton" class="btn btn-raised btn-primary btn-round waves-effect"  data-loading-text="<i class='fa fa-spinner fa-spin '></i> Processing Order">Change password</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>