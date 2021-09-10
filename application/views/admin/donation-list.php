<style type="text/css">
.card .header {
    padding: 20px 0 20px 0;
}
</style>
<input type="hidden" id="status" value="<?= $status;?>">
<section class="content">
    <div class="body_scroll">
        <?php $this->load->view('admin/includes/breadcrumb');?>

        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong><?= $pagetitle?></strong>  List </h2>
                            <!--<ul class="header-dropdown">-->
                            <!--    <li><a href="<?= base_url('admin/donor/new'); ?>" class="btn btn-raised btn-primary btn-round waves-effect"> New <?= $pagetitle?></a>-->
                            <!--    </li>-->
                            <!--</ul>-->
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Contact</th>
                                            <th>Amount</th>
                                            <th>Pan</th>
                                            <th>Category</th>
                                            <th>Reference Number</th>
                                            <?php if ($status != 'approve') { ?>
                                            <th>Reason</th>
                                            <?php } ?>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Contact</th>
                                            <th>Amount</th>
                                            <th>Pan</th>
                                            <th>Category</th>
                                            <th>Reference Number</th>
                                            <?php if ($status != 'approve') { ?>
                                            <th>Reason</th>
                                            <?php } ?>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
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
