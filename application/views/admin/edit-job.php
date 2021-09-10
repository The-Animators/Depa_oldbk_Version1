<style type="text/css">
.card .header {
    padding: 20px 0 20px 0;
}
</style>
<section class="content">
    <div class="body_scroll">
        <?php $this->load->view('admin/includes/breadcrumb');?>
        <?php
            $status      = $result['status'] ?? 0;
            $id          = $result['id'] ?? 0;
            $uploaded_by = $result['uploaded_by'] ?? 'Admin';
        ?>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong><?= $strong;?></strong> <?= $pagetitle?> </h2>
                            <ul class="header-dropdown">
                                <li><a href="<?= base_url();?>admin/job/list/all" class="btn btn-raised btn-primary btn-round waves-effect"> <?= $pagetitle?> List</a>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" method="post" id="jobs">
                                <?php  
                                    $startdate = $result['start_date'] ?? '';
                                    $enddate   = $result['end_date'] ?? '';
                                    /*if($startdate == '0000-00-00' || $startdate == NULL){
                                        $startdate = '';
                                    }else{
                                        $startdate = DateTime::createFromFormat('Y-m-d',$startdate)->format('d-m-Y');
                                    }if($enddate == '0000-00-00'  || $enddate == NULL){
                                        $enddate = '';
                                    }else{
                                        $enddate = DateTime::createFromFormat('Y-m-d',$enddate)->format('d-m-Y');
                                    }*/
                                ?>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-3 form-control-label">
                                        <label for="firm_name">Firm Name</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-3">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="firm_name" name="firm_name" value="<?= $result['firm_name'] ?? '';?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-3 form-control-label">
                                        <label for="designation">Designation</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-3">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="designation" name="designation" value="<?= $result['designation'] ?? '';?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-3 form-control-label">
                                        <label for="contact_person">Contact Person</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-3">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="contact_person" name="contact_person" value="<?= $result['contact_person'] ?? '';?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-3 form-control-label">
                                        <label for="contact_number">Contact Number</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-3">
                                        <div class="form-group">
                                            <input type="text" class="form-control noonly" id="contact_number" name="contact_number" value="<?= $result['contact_number'] ?? '';?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-3 form-control-label">
                                        <label for="contact_email">Contact Email</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-3">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="contact_email" name="contact_email" value="<?= $result['contact_email'] ?? '';?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-start_date col-md-2 col-sm-3 form-control-label">
                                        <label for="relation">Start Date</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-3">
                                        <div class="form-group">
                                            <input type="date" class="form-control" id="start_date" name="start_date" value="<?= $startdate;?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-3 form-control-label">
                                        <label for="end_date">End Date</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-3">
                                        <div class="form-group">
                                            <input type="date" class="form-control" id="end_date" name="end_date" value="<?= $enddate;?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-3 form-control-label">
                                        <label for="openings">No Of Vaccancy</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-3">
                                        <div class="form-group">
                                            <input type="text" class="form-control noonly" id="openings" name="openings" value="<?= $result['openings'] ?? '';?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-3 form-control-label">
                                        <label for="location">Location</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-3">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="location" name="location" value="<?= $result['location'] ?? '';?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-3 form-control-label">
                                        <label for="experience">Experience</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-3">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="experience" name="experience" value="<?= $result['experience'] ?? '';?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-3 form-control-label">
                                        <label for="salary_range_start">Salary Start</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-3">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="salary_range_start" name="salary_range_start" value="<?= $result['salary_range_start'] ?? '';?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-3 form-control-label">
                                        <label for="salary_range_end">Salary End</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-3">
                                        <div class="form-group">
                                            <input type="text" class="form-control noonly" id="salary_range_end" name="salary_range_end" value="<?= $result['salary_range_end'] ?? '';?>">
                                        </div>
                                    </div>
                                </div>       
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-3 form-control-label">
                                        <label for="status">Status</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-3">
                                        <div class="form-group">
                                            <select class="form-control ms" name="status" id="status">
                                                <option value="">Select Status</option>
                                                <option value="0"<?php if($status == 0){?> selected <?php }?>>Pending</option>
                                                <option value="1"<?php if($status == 1){?> selected <?php }?>>Approved</option>
                                                <option value="2"<?php if($status == 2){?> selected <?php }?>>Reject</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-3 form-control-label">
                                        <label for="description">Description</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-3">
                                        <div class="form-group">
                                            <textarea class="form-control" id="description" name="description"><?= $result['description'] ?? '';?></textarea>
                                        </div>
                                    </div>
                                </div>                                 
                                <div class="row clearfix">
                                    <div class="col-sm-8 offset-sm-2">
                                        <input type="hidden" name="id" id="id" value="<?= $id?>">
                                        <input type="hidden" name="job_cancel_reason" id="job_cancel_reason" value="<?= $result['can_reason'] ?? ''; ?>">
                                        <input type="hidden" name="uploaded_by" id="uploaded_by" value="<?= $uploaded_by; ?>">
                                        <input type="hidden" name="client" value="web">
                                        <input type="hidden" name="ip" value="<?= $this->input->ip_address();?>">
                                        <input type="hidden" name="memberid" value="<?= $this->session->userdata('user_id') ?? 1?>">

                                        <?php $this->load->view('admin/includes/button');?>
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