<style type="text/css">
.card .header {
    padding: 20px 0 20px 0;
}
</style>
<section class="content">
    <div class="body_scroll">
        <?php $this->load->view('admin/includes/breadcrumb');?>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Import</strong> <?= $pagetitle?> </h2>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" method="post" id="importForm" enctype="multipart/form-data">
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-3 form-control-label">
                                        <label for="head_name">Browse</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-3">
                                        <div class="form-group">
                                            <input type="file" class="form-control" accept=".csv"  name="import" id="import" placeholder="Import Excel file"tabindex="1" autofocus >
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-3 form-control-label">
                                        <input type="button" class=" btn btn-success" id="importBtn" value="Import"  tabindex="2">
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 form-control-label">
                                        <label for="hfname"> Download Sample CSV File from <a href="#">Here</a> </label>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="alert alert-info" id="msgbox1" style="margin-top:20px;display: none;">
                                            <span class="message1"><img src="<?php echo base_url('assets/images/loading.gif');?>" width="20px"> Importing Data, Please wait....</span>
                                        </div>
                                        <div class="alert" id="msgbox" style="margin-top:20px;display:none;">
                                            <span class="message">
                                            </span>
                                        </div>
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
