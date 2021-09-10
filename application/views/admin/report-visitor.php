<style type="text/css">
.card .header {
    padding: 20px 0 20px 0;
}
.btn a:active{color: #FFF}
.btn.btn-clean {
    border-color: transparent;
    background: 0 0;
    color: #e47297;
}
.btn.btn-icons {
    display: -webkit-inline-box;
    display: -ms-inline-flexbox;
    display: inline-flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    padding: 0;
}
     .btn.btn-icons.btn-sm {
    height: 1.5rem;
    width: 1.5rem;
}.btn.btn-clean i {
    color: #e47297;
}
.wrapper .dropdown{
display: inline-block;}
tfoot {
     display: table-header-group;
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
                            <h2><strong>Visitor</strong> List </h2>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" method="post" id="restore">

                                <div class="row clearfix">
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <div class="form-group">
                                             <?php $js = 'id="employee" class="form-control ms select2"'; echo form_dropdown('employee', $employee, '',$js)?>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <input type="text" class="form-control" id="daterange" name="daterange" placeholder="Please choose date & time...">
                                    </div>
                                    <div class="col-lg-4 col-sm-4">
                                        <button type="button" id="filterButton" class="btn btn-raised btn-primary waves-effect"  data-loading-text="<i class='fa fa-spinner fa-spin '></i> Processing Order">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>Visitor Name</th>
                                            <th>Image</th>
                                            <th>Emplyee Name</th>
                                            <th>Visit Purpose</th>
                                            <th>In Time</th>
                                            <th>Out Time</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Visitor Name</th>
                                            <th>Image</th>
                                            <th>Emplyee Name</th>
                                            <th>Visit Purpose</th>
                                            <th>In Time</th>
                                            <th>Out Time</th>
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