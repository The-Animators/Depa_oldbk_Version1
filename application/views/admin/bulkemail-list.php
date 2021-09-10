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
                            <h2><strong><?= $pagetitle?></strong>  List (Sent Mails) </h2>
                            <ul class="header-dropdown">
                                <li><a href="<?= base_url('admin/bulkemail/new'); ?>" class="btn btn-raised btn-primary btn-round waves-effect"> Send New <?= $pagetitle?></a>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>Type</th>
                                            <th>Subject</th>
                                            <!-- <th>Email</th> -->
                                            <th>Message</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Type</th>
                                            <th>Subject</th>
                                            <!-- <th>Email</th> -->
                                            <th>Message</th>
                                            <th>Date</th>
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
