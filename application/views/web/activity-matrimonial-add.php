<!-- Home Design Inner Pages -->
<div class="ulockd-inner-home">
    <div class="container text-center">
        <div class="row">
            <div class="ulockd-inner-conraimer-details">
                <div class="col-md-12">
                    <h1 class="text-uppercase"><?= $pagetitle;?></h1>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
?>
<!-- Home Design Inner Pages -->
<?php $this->load->view('web/includes/breadcrumb');?>
<style type="text/css">
    .ulockd-dtitle{margin-bottom:20px!important }
    .size10{font-size: 10px}
    label{line-height: 45px;height: 45px}
    .lbl{line-height: 21px !important;height: auto !important;}
</style>
<!-- Inner Pages Main Section -->
<section class="ulockd-fservice">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 text-center">
                <div class="ulockd-dtitle hvr-float-shadow">
                    <h2 class="text-uppercase">Add New Matrimoni</span></h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-md-12">

                <?php //print_r($result); ?>

                <form class="matri-form member-details" id="matri-form" method="POST">
                    <div class="row">

                        <div class="col-md-10 col-lg-10" firstname>
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="required">Select Member</label>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select class="form-control" name="member_no" id="member_no" required>
                                            <option selected value="">Select Member</option>
                                            <?php foreach($result['members'] as $members){ ?>
                                            <option value="<?= $members['member_no']; ?>"><?= $members['fullname']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6" secondname>
                            <div class="row">
                                <div class="col-md-5">
                                    <label class="required">Education</label>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="education" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6" secondname>
                            <div class="row">
                                <div class="col-md-5">
                                    <label class="required">Occupation</label>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="occupation" readonly>
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
                                        <input type="text" class="form-control" id="mother_name" name="mother_name" value="<?= $result['mother_name'] ?? ''; ?>">
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
                                        <input type="text" class="form-control" id="age" name="age" value="<?= $result['age'] ?? '' ;?>">
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
                                        <input type="text" class="form-control" id="height" name="height" value="<?= $result['height'] ?? '' ;?>">
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
                                        <input type="text" class="form-control" id="weight" name="weight" value="<?= $result['weight'] ?? '' ;?>">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6" thirdname style="display: none;">
                            <div class="row">
                                <div class="col-md-5">
                                    <label class="required">Kundali</label>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="kundali" name="kundali" value="0">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6" thirdname style="display: none;">
                            <div class="row">
                                <div class="col-md-5">
                                    <label class="required">Rashi</label>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="rashi" name="rashi" value="0">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6" thirdname>
                            <div class="row">
                                <div class="col-md-5">
                                    <label class="required">Birth Time</label>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <input type="time" class="form-control" id="birth_time" name="birth_time" value="<?= $result['birth_time'] ?? '' ;?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6" thirdname>
                            <div class="row">
                                <div class="col-md-5">
                                    <label class="required">Place Of Birth</label>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="place" name="place" value="<?= $result['place'] ?? '' ;?>">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6" thirdname>
                            <div class="row">
                                <div class="col-md-5">
                                    <label class="required">Contact Number</label>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="contact" name="contact">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6" thirdname style="display: none;">
                            <div class="row">
                                <div class="col-md-5">
                                    <label class="required">Dharmik</label>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="dharmik" name="dharmik" value="0">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6" thirdname>
                            <div class="row">
                                <div class="col-md-5">
                                    <label class="required">Nana Nani’s Village</label>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="maternal" name="maternal" value="<?= $result['maternal'] ?? '' ;?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        

                        
                    </div>
                    <div class="form-group text-center">
                        <input type="hidden" name="client" value="web">
                        <input type="hidden" name="ip" value="<?= $this->input->ip_address();?>">
                        <input type="hidden" name="id" value="<?= $result['id'] ?? 0; ?>">
                        <input type="hidden" id="family_no" name="family_no" value="<?= $this->session->userdata('family_no') ?? 0; ?>">
                        <input type="hidden" name="family_id" value="<?= $this->session->userdata('family_id') ?? 0; ?>">
                        <button type="submit" class="btn btn-md btn-success" id="submit_matri" data-form="matri-form"> Save Detail <i class="fa fa-save"></i></button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</section>
