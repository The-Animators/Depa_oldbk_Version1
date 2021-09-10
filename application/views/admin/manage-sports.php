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
                            <h2><strong>Manage</strong> <?= $pagetitle?> </h2>
                            <ul class="header-dropdown">
                                <li><a href="javascript:void(0);" id="openmodal" class="btn btn-raised btn-primary btn-round waves-effect"> New <?= $pagetitle?></a>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>Sports</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Sports</th>
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

<div class="modal fade" id="Modal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="defaultModalLabel">New <?= $page_title;?></h4>
            </div>
            <div class="modal-body">
                <div class="body">
                    <form class="form-horizontal" method="post" id="userform">
                        <div class="row clearfix">
                            <div class="col-lg-4 col-md-4 col-sm-4 form-control-label">
                                <label for="sports">Sports</label>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <div class="form-group">
                                    <input type="hidden" id="id" name="id" value="0">
                                    <input type="text" id="sports" name="sports" class="form-control" placeholder="<?= $pagetitle;?>">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-round waves-effect" id="save">SAVE <?= $page_title;?></button>
                <button type="button" class="btn btn-danger waves-effect closemodal" data-dismiss="modal">CLOSE</button>
            </div>
        </div>
    </div>
</div>