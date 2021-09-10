<section class="content">
    <div class="body_scroll">
        <?php $this->load->view('admin/includes/breadcrumb');?>
        <div class="container-fluid">
            <!-- Horizontal Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Database</strong> Restore</h2>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" method="post" id="general">

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-3 form-control-label">
                                        <label for="restore_file">Backup File:</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-3">
                                        <div class="form-group">
                                            <input type="file" id="restore_file" name="restore_file" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <button type="button" id="restoreButton" class="btn btn-raised btn-primary waves-effect"  data-loading-text="<i class='fa fa-spinner fa-spin '></i> Processing Order">Restore Database</button>
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