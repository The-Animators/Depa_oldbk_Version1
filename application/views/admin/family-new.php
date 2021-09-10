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
}.filter-option{color: #495057!important}
</style>
<section class="content">
    <div class="body_scroll">
        <?php $this->load->view('admin/includes/breadcrumb');?>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Add</strong>
                                <?= $pagetitle?> Head </h2>
                            <ul class="header-dropdown">
                                <li><a href="<?= base_url();?>admin/family/head-list" class="btn btn-raised btn-primary btn-round waves-effect">
                                        <?= $pagetitle?> List</a>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <!-- <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 form-control-label text-left">
                                    <p>Family Head Details</p>
                                </div>
                            </div> -->
                            <form class="donation-form donor-details" id="member-form" method="POST">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Address</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <textarea class="form-control" id="address_1" name="address_1" style="min-height:130px;resize: none;"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Area</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <?php 
                                                        $js = 'id="area_id" class="form-control ms"';
                                                        echo form_dropdown('area_id', $area, '', $js);
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Pincode</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="pincode" name="pincode" value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Landline</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="landline" name="landline" value="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr />
                                <div class="row">
                                    <div class="col-md-6" firstname>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>First name</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="first_name" name="first_name" value="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6" secondname>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Second name</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="second_name" name="second_name" value="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6" thirdname>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Third name</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="third_name" name="third_name" value="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6" surname>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Surname</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <?php 
                                                        $js = 'id="surname" class="form-control ms"';
                                                        echo form_dropdown('surname', $surname, ($result['surname_id']  ?? '') , $js);
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6" gender>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Gender</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <select name="gender" id="gender" class="form-control ms">
                                                        <option value="M">Male</option>
                                                        <option value="F">Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6" dob>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Date of Birth</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="dob" name="dob" value="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6" relation>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Relation</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <select name="relation" id="relation" class="form-control ms" readonly>
                                                    <?php 
                                                        foreach($relation as $key => $value){
                                                            $sel = '';
                                                            if($value['id'] == 22){
                                                                $sel = "selected='selected'";
                                                            }else{
                                                                $sel = '';
                                                            }
                                                            echo '<option data-type="'.$value['m_type'].'" '.$sel.' value="'.$value['id'].'" '.$value['m_type'].'>'.($value['relation'] ?? '').'</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6" bloodgroup>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Blood Group</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <?php 
                                                        $js = 'id="blood" class="form-control ms"';
                                                        echo form_dropdown('blood', $bloodgroup, '', $js);
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6" occupation>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Occupation</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <?php 
                                                        $js = 'id="occupation" class="form-control ms"';
                                                        echo form_dropdown('occupation', $occupation,'',$js);
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6" maritalstatus>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Marital Status</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <?php 
                                                        $js = 'id="marriage_type" class="form-control ms"';
                                                        echo form_dropdown('marriage_type', $maritalstatus,'', $js);
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="display:none; margin-bottom: 10px;" id="marriage_details">
                                    <div class="col-md-12" style="background-color: #e1e1e1">
                                        <h4>Marriage Details</h4>
                                    </div>

                                    <div class="col-md-12" style="background-color: #ececec">
                                        <div class="row">
                                            <div class="col-md-6" secondname>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label>Father/Husband Name</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="m_secondname" name="m_secondname" value="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6" m_thirdname>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label>Third Name</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="m_thirdname" name="m_thirdname" value="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6" m_surname>
                                                <div class="row">
                                                    <div class="col-md-4" style="white-space: nowrap;">
                                                        <label>Father/Husband Surname</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <?php 
                                                                $js = 'id="m_surname" class="form-control ms"';
                                                                echo form_dropdown('m_surname', $surname, '', $js);
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6" m_village>
                                                <div class="row">
                                                    <div class="col-md-4" style="white-space: nowrap;">
                                                        <label>Village</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <?php 
                                                                $js = 'id="m_village" class="form-control ms"';
                                                                echo form_dropdown('m_village', $village, '', $js);
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12" m_address>
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <label>Address</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="m_address" name="m_address" value="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6" m_contact>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label>Contact</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="m_contact" name="m_contact" value="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6" m_email>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label>Email </label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="m_email" name="m_email" value="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6" education>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Education</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <select name="education_id[]" id="education_id" class="form-control selectpicker ms" multiple data-actions-box="true" data-max-options="5" data-selected-text-format="count > 3" data-live-search="true" data-style="btn-default">
                                                    <?php 
                                                        $edu_array = explode(",", ($result['education_id'] ?? ''));
                                                        foreach($education as $key => $value){
                                                            $sel = '';
                                                            if(in_array($value['id'], $edu_array)){
                                                            // if($result['education_id'] == $value['id']){
                                                                $sel = 'selected';
                                                            }
                                                            echo '<option '.$sel.' value="'.$value['id'].'">'.$value['education'].'</option>';
                                                        }
                                                    ?>
                                                    </select>
                                                    <input type="hidden" name="education" id="education">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6" dom>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Date of Marriage</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="dom" name="dom" value="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6" contact>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Contact</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="contact" name="contact" value="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6" email>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="email" name="email" value="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6" achievements>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Achivements</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <textarea class="form-control" id="achivements" name="achivements" style="min-height:130px;resize: none;"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6" photo>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Photo</label>
                                                <div class="form-group">
                                                    <?php 
                                                        $image = $result['image'] ?? '';
                                                        if($image != ''){
                                                            $fileName = FCPATH."uploads/members/".$image;
                                                            if (file_exists($fileName)) {
                                                                $img = base_url().'uploads/members/'.$image;
                                                            }else{
                                                                $img = base_url().'assets/img/noimage.jpg';
                                                            } 
                                                        }else{
                                                            $img = base_url().'assets/img/noimage.jpg';
                                                        }
                                                        echo '<img src="'.$img.'" class="img-responsive" id="photo_name">';
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="file" class="btn btn-info btn-sm" id="photo_file" name="photo_file" style="width:200px;" title="Member Photo" accept="image/x-png,image/jpeg"><br />
                                                <input id="reset_img" type="button" class="btn btn-warning" value="Reset Photo" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6" sports>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Sports</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <select name="sports_id[]" id="sports_id" class="form-control selectpicker ms" multiple data-actions-box="true" data-max-options="5" data-selected-text-format="count > 3" data-live-search="true" data-style="btn-default">
                                                        <?php 
                                                            $sport_array = explode(",", ($result['sports_id'] ?? ''));
                                                            foreach($sports as $key => $value){
                                                                $sel = '';
                                                                if(in_array($value['id'], $sport_array)){
                                                                    $sel = 'selected';
                                                                }
                                                                echo '<option '.$sel.' value="'.$value['id'].'">'.$value['sports'].'</option>';
                                                            }
                                                        ?>
                                                    </select>
                                                    <input type="hidden" name="sports" id="sports">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6" dharmik>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Dharmik</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <?php 
                                                        $js = 'id="dharmik" class="form-control ms"';
                                                        echo form_dropdown('dharmik', $dharmik, '', $js);
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6" style="background-color: #e1e1e1 ;padding: 10px;">
                                        <div class="row">
                                            <div class="col-md-4 text-left">
                                                <label>Life Insurance</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="radio">
                                                    <input type="radio" class="life_insurance" id="light" name="life_insurance" value="1">
                                                    <label for="light">Yes</label>
                                                    <input type="radio" class="life_insurance" id="dark" name="life_insurance" value="0" checked>
                                                    <label for="dark">No</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" life_insurance_text style="display:none; margin-bottom: 10px;" id="life_insurance_txt">
                                            <div class="col-md-4">
                                                <label>Please Specify</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="life_insurance_text" name="life_insurance_text" value="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6" medical_insurance style="background-color: #ececec;padding: 10px;">
                                        <div class="row">
                                            <div class="col-md-4 text-left">
                                                <label>Medical Insurance</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="radio">
                                                    <input type="radio" class="medical_insurance" id="miye" name="medical_insurance" value="1">
                                                    <label for="miye">Yes</label>
                                                    <input type="radio" class="medical_insurance" id="mino" name="medical_insurance" value="0"  checked>
                                                    <label for="mino">No</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" medical_insurance_ask style="display:none;" id="medical_insurance_ask">
                                            <div class="col-md-4">
                                                <label>Sanjeevni</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <div class="radio">
                                                        <input type="radio" class="sanjeevni" id="sjye" name="sanjeevni" value="1">
                                                        <label for="sjye">Yes</label>
                                                        <input type="radio" class="sanjeevni" id="sjno" name="sanjeevni" value="0">
                                                        <label for="sjno">No</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" medical_insurance_txt style="display:none; margin-top: 10px;" id="medical_insurance_txt">
                                            <div class="col-md-4">
                                                <label>Please Specify Company</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="medical_insurance_text" name="medical_insurance_text" value="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group text-center">
                                    <input type="hidden" name="client" value="web">
                                    <input type="hidden" name="ip" value="<?= $this->input->ip_address();?>">
                                    <input type="hidden" name="m_type" id="m_type" value="">
                                    <input type="hidden" name="member_id" value="0">
                                    <input type="hidden" name="member_no" value="0">
                                    <input type="hidden" name="family_id" value="0">
                                    <button type="submit" class="btn btn-md btn-success" id="submitb2b" data-form="member-form">Update Detail <i class="fa fa-save"></i></button>
                                    <button type="button" class="btn btn-md btn-danger" id="cancel">Cancel <i class="fa fa-close"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>