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
                            <h2><strong>Add</strong> <?= $pagetitle?> </h2>
                            <ul class="header-dropdown">
                                <li><a href="<?= base_url();?>admin/family/list" class="btn btn-raised btn-primary btn-round waves-effect"> <?= $pagetitle?> List</a>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 form-control-label text-left">
                                    <p>Family Head Details</p>
                                </div>
                            </div>
                            <form class="form-horizontal" method="post" id="system-form" enctype="multipart/form-data">
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-3 form-control-label">
                                        <label for="head_name">Name</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-3">
                                        <div class="form-group">
                                            <input type="text" id="head_name" name="head_name" class="form-control" placeholder="Name" value="">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-3 form-control-label">
                                        <label for="hfname">Father/Husband</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-3">
                                        <div class="form-group">
                                            <input type="text" id="hfname" name="hfname" class="form-control" placeholder="Father/Husband" value="">
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-3 form-control-label">
                                        <label for="hgfname">Grand Father</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-3">
                                        <div class="form-group">
                                            <input type="text" id="hgfname" name="hgfname" class="form-control" placeholder="Grand Father" value="">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-3 form-control-label">
                                        <label for="surname">Surname</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-3">
                                        <div class="form-group">
                                            <input type="text" id="surname" name="surname" class="form-control" placeholder="Surname" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-3 form-control-label">
                                        <label for="gender">Sex</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-3">
                                        <div class="form-group">
                                            <select id="gender" name="gender" class="form-control ms">
                                                <option value="">Select Gender</option>
                                                <option value="M">Male</option>
                                                <option value="F">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-3 form-control-label">
                                        <label for="relation">Relation</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-3">
                                        <div class="form-group">
                                            <?php $js = 'id="relation" class="form-control ms"'; echo form_dropdown('relation', $relation, '',$js)?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-3 form-control-label">
                                        <label for="dob">DoB</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-3">
                                        <div class="form-group">
                                            <input type="text" id="dob" name="dob" class="form-control datepicker" placeholder="DoB" value="">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-3 form-control-label">
                                        <label for="dom">Marriage Date</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-3">
                                        <div class="form-group">
                                            <input type="text" id="dom" name="dom" class="form-control datepicker" placeholder="Marriage Date" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-8 offset-sm-2">
                                        <input type="hidden" name="id" id="id" value="<?= $id ?? 0;?>">
                                        <button type="button" id="save" data-form="system-form" class="btn btn-raised btn-primary btn-round waves-effect">Save </button>
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
