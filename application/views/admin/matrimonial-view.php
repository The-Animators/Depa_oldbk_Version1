<style type="text/css">
.card .header {
    padding: 20px 0 20px 0;
}
label {
    float: left !important
}
.radio label::before,
.radio label::after {
    border: 1px solid #000000 !important;
}
.actions-btn {
    color: #000000 !important
}
.bootstrap-select .btn-default {
    background: transparent !important;
}
.dropdown-menu.inner li {
    padding: 5px 10px
}
.dropdown-menu .show {
    height: 450px !important;
    overflow-y: scroll !important;
}
.filter-option{color: #495057!important}
</style>
<section class="content">
    <div class="body_scroll">
        <?php $this->load->view('admin/includes/breadcrumb');?>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>View</strong>
                                <?= $pagetitle?>  </h2>
                            <ul class="header-dropdown">
                                <li><a href="<?= base_url();?>admin/matrimonial" class="btn btn-raised btn-primary btn-round waves-effect">
                                    <?= $pagetitle ?> List</a>
                                </li>
                            </ul>
                        </div>
                        <div class="body" id='DivIdToPrint'>
                            <!-- <form class="donation-form donor-details" id="member-form" method="POST"> -->
                            	<br>
                                <div class="row">

			                        <div class="col-md-6" firstname>
			                            <div class="row">
			                                <div class="col-md-5">
			                                    <label class="required">Select Member</label>
			                                </div>
			                                <div class="col-md-7">
			                                    <div class="form-group">
			                                        <input type="text" class="form-control" id="mother_name" name="mother_name" value="<?= $data[0]['fullname'] ?? ''; ?>" readonly>
			                                    </div>
			                                </div>
			                            </div>
			                        </div>
			                        <div class="col-md-6" secondname>
			                            <div class="row">
			                                <div class="col-md-5">
			                                    <label class="required">Mother Name</label>
			                                </div>
			                                <div class="col-md-7">
			                                    <div class="form-group">
			                                        <input type="text" class="form-control" id="mother_name" name="mother_name" value="<?= $data[0]['mother_name'] ?? ''; ?>" readonly>
			                                    </div>
			                                </div>
			                            </div>
			                        </div>
			                        <div class="col-md-6" thirdname>
			                            <div class="row">
			                                <div class="col-md-5">
			                                    <label class="required">Age</label>
			                                </div>
			                                <div class="col-md-7">
			                                    <div class="form-group">
			                                        <input type="text" class="form-control" id="age" name="age" value="<?= $data[0]['age'] ?? '' ;?>" readonly>
			                                    </div>
			                                </div>
			                            </div>
			                        </div>

			                        <div class="col-md-6" thirdname>
			                            <div class="row">
			                                <div class="col-md-5">
			                                    <label class="required">Height</label>
			                                </div>
			                                <div class="col-md-7">
			                                    <div class="form-group">
			                                        <input type="text" class="form-control" id="height" name="height" value="<?= $data[0]['height'] ?? '' ;?>" readonly>
			                                    </div>
			                                </div>
			                            </div>
			                        </div>
			                        <div class="col-md-6" thirdname>
			                            <div class="row">
			                                <div class="col-md-5">
			                                    <label class="required">Weight</label>
			                                </div>
			                                <div class="col-md-7">
			                                    <div class="form-group">
			                                        <input type="text" class="form-control" id="weight" name="weight" value="<?= $data[0]['weight'] ?? '' ;?>" readonly>
			                                    </div>
			                                </div>
			                            </div>
			                        </div>
			                        <!--<div class="col-md-6" thirdname>
			                            <div class="row">
			                                <div class="col-md-5">
			                                    <label class="required">Kundali</label>
			                                </div>
			                                <div class="col-md-7">
			                                    <div class="form-group">
			                                        <input type="text" class="form-control" id="kundali" name="kundali" value="<?= $data[0]['kundali'] ?? '' ;?>" readonly>
			                                    </div>
			                                </div>
			                            </div>
			                        </div>-->
			                        <!--<div class="col-md-6" thirdname>
			                            <div class="row">
			                                <div class="col-md-5">
			                                    <label class="required">Rashi</label>
			                                </div>
			                                <div class="col-md-7">
			                                    <div class="form-group">
			                                        <input type="text" class="form-control" id="rashi" name="rashi" value="<?= $data[0]['rashi'] ?? '' ;?>" readonly>
			                                    </div>
			                                </div>
			                            </div>
			                        </div>-->
			                        <div class="col-md-6" thirdname>
			                            <div class="row">
			                                <div class="col-md-5">
			                                    <label class="required">Birth Time</label>
			                                </div>
			                                <div class="col-md-7">
			                                    <div class="form-group">
			                                        <input type="time" class="form-control" id="birth_time" name="birth_time" value="<?= $data[0]['birth_time'] ?? '' ;?>" readonly>
			                                    </div>
			                                </div>
			                            </div>
			                        </div>
			                        <div class="col-md-6" thirdname>
			                            <div class="row">
			                                <div class="col-md-5">
			                                    <label class="required">Place</label>
			                                </div>
			                                <div class="col-md-7">
			                                    <div class="form-group">
			                                        <input type="text" class="form-control" id="place" name="place" value="<?= $data[0]['place'] ?? '' ;?>" readonly>
			                                    </div>
			                                </div>
			                            </div>
			                        </div>
			                        <!--<div class="col-md-6" thirdname>
			                            <div class="row">
			                                <div class="col-md-5">
			                                    <label class="required">Dharmik</label>
			                                </div>
			                                <div class="col-md-7">
			                                    <div class="form-group">
			                                        <input type="text" class="form-control" id="dharmik" name="dharmik" value="<?= $data[0]['dharmik'] ?? '' ;?>" readonly>
			                                    </div>
			                                </div>
			                            </div>
			                        </div>-->
			                        <div class="col-md-6" thirdname>
			                            <div class="row">
			                                <div class="col-md-5">
			                                    <label class="required">NANA NANI’S VILLAGE</label>
			                                </div>
			                                <div class="col-md-7">
			                                    <div class="form-group">
			                                        <input type="text" class="form-control" id="maternal" name="maternal" value="<?= $data[0]['material'] ?? '' ;?>" readonly>
			                                    </div>
			                                </div>
			                            </div>
			                        </div>
			                        <div class="col-md-6" thirdname>
			                            <div class="row">
			                                <div class="col-md-5">
			                                    <label class="required">Contact</label>
			                                </div>
			                                <div class="col-md-7">
			                                    <div class="form-group">
			                                        <input type="text" class="form-control" id="dharmik" name="dharmik" value="<?= $data[0]['contact'] ?? '' ;?>" readonly>
			                                    </div>
			                                </div>
			                            </div>
			                        </div>
			                        

			                        
			                    </div>

                                <div class="form-group text-center">
                                	<input type="hidden" id="id" name="id" value="<?= $data[0]['matrimonial_id'] ?? ''; ?>">
                                    <input type="hidden" name="member_no" value="<?= $data[0]['member_no'] ?? ''; ?>">
                                    <input type="hidden" name="family_id" value="<?= $data[0]['family_no'] ?? ''; ?>">
                                    <button type="submit" data-id="<?= $data[0]['matrimonial_id'] ?? ''; ?>" class="btn btn-md btn-success approve" id="approve">Approve </button>
                                    <button type="button" data-id="<?= $data[0]['matrimonial_id'] ?? ''; ?>" class="btn btn-md btn-danger reject" id="reject">Reject <i class="fa fa-close"></i></button>
                                </div>

                            <!-- </form> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>