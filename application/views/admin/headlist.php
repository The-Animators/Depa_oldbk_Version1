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
                            <h2><strong><?= $pagetitle?></strong> List</h2>
                            <ul class="header-dropdown">
                                <li>
                                    <a href="<?= base_url();?>admin/family/new" class="btn btn-raised btn-primary btn-round waves-effect"> 
                                        New <?= $pagetitle?>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>Family No</th>
                                            <th>F Name</th>
                                            <th>S Name</th>
                                            <th>T Name</th>
                                            <th>Sur Name</th>
                                            <th>Address</th>
                                            <th>Pincode</th>
                                            <th>Landline</th>
                                            <th>Email</th>
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
    </div>
</section>