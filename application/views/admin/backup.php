<section class="content">
    <div class="body_scroll">
        <?php $this->load->view('admin/includes/breadcrumb');?>
        <div class="container-fluid">
            <!-- Horizontal Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2>Database <strong>Backup</strong></h2>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" method="get" id="backup">
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <button type="button" id="backupButton" class="btn btn-raised btn-primary waves-effect" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Processing Order">Backup Database</button>

                                        <button type="button" id="resetButton" class="btn btn-raised btn-info waves-effect" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Processing Order">Reset Database</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card">
                        <div class="header">
                            <h2>Database <strong>Restore</strong></h2>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" method="post" id="restore">

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-3 form-control-label">
                                        <label for="restore_file">Select Backup File:</label>
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