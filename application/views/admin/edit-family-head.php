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
                            <h2><strong>Edit</strong>
                                <?= $pagetitle?>  </h2>
                            <ul class="header-dropdown">
                                <li><a href="<?= base_url();?>admin/family/head-list" class="btn btn-raised btn-primary btn-round waves-effect">
                                        <?= $pagetitle?> List</a>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <form class="donation-form donor-details" id="member-form" method="POST">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label class="required">Address</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <textarea class="form-control" id="address_1" name="address_1" style="min-height:130px;resize: none;"><?= $result['address_1'] ?? ''?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label class="required">Area</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <?php 
                                                        $js = 'id="area_id" class="form-control ms"';
                                                        echo form_dropdown('area_id', $area, ($result['area_id'] ?? ''), $js);
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label class="required">Pincode</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="pincode" name="pincode" value="<?= $result['pincode'] ?? ''?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label >Landline</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="landline" name="landline" value="<?= $result['landline'] ?? '' ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="f_email" name="f_email" value="<?= $result['f_email'] ?? '' ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr />
                                <!-- <div class="row"> -->
                                    <div class="row">
                                        <div class="col-md-6" firstname>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label class="required">First name</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="first_name" name="first_name" value="<?= $result['first_name'] ?? '' ;?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6" secondname>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label class="required">Second name</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="second_name" name="second_name" value="<?= $result['second_name'] ?? '' ;?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6" thirdname>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label >Third name</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="third_name" name="third_name" value="<?= $result['third_name'] ?? '' ;?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6" surname>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label class="required">Surname</label>
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
                                                    <label class="required">Gender</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <select name="gender" id="gender" class="form-control ms">
                                                            <option <?php if(($result['sex'] ?? '')  == "M"){ echo 'selected'; }?> value="M">Male</option>
                                                            <option <?php if(($result['sex'] ?? '')  == "F"){ echo 'selected'; }?> value="F">Female</option>
                                                        </select>
                                                       <!--  <input type="text" class="form-control" id="gender" name="gender" value="<?= $result['sex'];?>" maxlength='1'> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6" dob>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label class="required">Date of Birth</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="dob" name="dob" value="<?= $result['dob'] ?? '';?>">
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-6" relation>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label class="required">Relation</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                       <select name="relation" id="relation" class="form-control ms">
                                                       <?php 
                                                       // print_r($relation);
                                                        foreach($relation as $key => $value){
                                                            $sel = '';
                                                            // echo "<br>relation id: ".$result['relation_id']."--id : ".$value['id'];
                                                            if(($result['relation_id']  ?? '') == $value['id']){
                                                                $sel = 'selected';
                                                            }
                                                            echo '<option '.$sel.' data-type="'.$value['m_type'].'" value="'.$value['id'].'">'.($value['relation'] ?? '').'</option>';
                                                        }

                                                            //$js = 'id="relation" class="form-control ms"';
                                                           // echo form_dropdown('relation', $relation, $result['relation_id'], $js);
                                                        ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6" bloodgroup>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label class="required">Blood Group</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <?php 
                                                            $js = 'id="blood" class="form-control ms"';
                                                            echo form_dropdown('blood', $bloodgroup, ($result['blood_id'] ?? ''), $js);
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
                                                            echo form_dropdown('occupation', $occupation, ($result['occupation_id'] ?? ''), $js);
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6"maritalstatus>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label>Marital Status</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                       <?php 
                                                            $js = 'id="marriage_type" class="form-control ms"';
                                                            echo form_dropdown('marriage_type', $maritalstatus, ($result['marriage_type'] ?? ''), $js);
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>   

                                    <div class="row" style="display:none; margin-bottom: 10px;" id="marriage_details">
                                        <div class="col-md-12" style="background-color: #e1e1e1;">
                                            <h4>Marriage Details</h4>
                                        </div>
                                        
                                        <div class="col-md-12" style="background-color: #ececec;padding-top: 10px">
                                            <div class="row">
                                                <div class="col-md-6" secondname>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label>Father/Husband Name</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" id="m_secondname" name="m_secondname" value="<?= $result['m_second_name'] ?? '';?>">
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
                                                                <input type="text" class="form-control" id="m_thirdname" name="m_thirdname" value="<?= $result['m_third_name'] ?? '';?>">
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
                                                                    echo form_dropdown('m_surname', $surname, ($result['m_surname'] ?? ''), $js);
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
                                                                    echo form_dropdown('m_village', $village, ($result['m_village'] ?? ''), $js);
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
                                                            <label >Address</label>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" id="m_address" name="m_address" value="<?= $result['m_address'] ?? '';?>">
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
                                                                <input type="text" class="form-control" id="m_contact" name="m_contact" value="<?= $result['m_contact'] ?? '';?>">
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
                                                                <input type="text" class="form-control" id="m_email" name="m_email" value="<?= $result['m_email'] ?? '';?>">
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
                                                        <select name="education_id[]" id="education_id" class="form-control selectpicker ms" multiple data-actions-box="true" data-max-options="5" data-selected-text-format="count > 3" data-live-search="true"  data-style="btn-default">
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
                                                        <input type="text" class="form-control" id="dom" name="dom" value="<?= $result['dom'] ?? '';?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6" contact>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label class="required">Contact</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="contact" name="contact" value="<?= $result['contact'] ?? '';?>">
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
                                                        <input type="text" class="form-control" id="email" name="email" value="<?= $result['email'] ?? '';?>">
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
                                                        <textarea class="form-control" id="achivements" name="achivements" style="min-height:130px;resize: none;"><?= $result['achivements'] ?? '';?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6" photo>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label class="required">Photo</label>
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
                                                            // echo $img;
                                                        ?>
                                                    </div>                                </div>
                                                <div class="col-md-8">
                                                    <input type="file" class="btn btn-info btn-sm" id="photo_file" name="photo_file" style="width:200px;" title="Member Photo" accept="image/x-png,image/jpeg"><br/>
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
                                                            echo form_dropdown('dharmik', $dharmik, ($result['dharmik_id'] ?? ''), $js);
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6" life_insurance style="background-color: #e1e1e1;padding: 10px;">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label>Life Insurance</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="radio">
                                                        <input type="radio" class="life_insurance" id="light" name="life_insurance" value="1" <?php if(isset($result['life_insurance']) && $result['life_insurance'] == 1) echo 'checked'; ?> value="1">
                                                        <label for="light">Yes</label>
                                                        <input type="radio" class="life_insurance" id="dark" name="life_insurance" value="0" <?php if(isset($result['life_insurance']) && $result['life_insurance'] == 0) echo 'checked'; ?> value="1">
                                                        <label for="dark">No</label>
                                                    </div>

                                                    
                                                </div>
                                            </div>
                                            <div class="row" life_insurance_text  style="display:none; margin-bottom: 10px;" id="life_insurance_txt">
                                                <div class="col-md-4">
                                                    <label>Please Specify Company</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="life_insurance_text" name="life_insurance_text" value="<?= $result['life_insurance_text'] ?? '' ; ?>">
                                                    </div>
                                                </div>
                                            </div>                            
                                        </div>
                                        <div class="col-md-6" medical_insurance  style="background-color: #ececec">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label>Medical Insurance</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="radio">
                                                        <input type="radio" class="medical_insurance" id="miye" name="medical_insurance" value="1" <?php if(isset($result['medical_insurance']) &&  $result['medical_insurance'] == 1) echo 'checked'; ?> >
                                                        <label for="miye">Yes</label>
                                                        <input type="radio" class="medical_insurance" id="mino" name="medical_insurance" value="0" <?php if(isset($result['medical_insurance']) &&  $result['medical_insurance'] == 0) echo 'checked'; ?> >
                                                        <label for="mino">No</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" medical_insurance_ask style="display:none;" id="medical_insurance_ask">
                                                <div class="col-md-4">
                                                    <label>Sanjeevni</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="radio">
                                                        <input type="radio" class="sanjeevni" name="sanjeevni" id="sjye" value="1" <?php if(isset($result['sanjeevni']) && $result['sanjeevni'] == 1) echo 'checked'; ?> >
                                                        <label for="sjye">Yes</label>
                                                        <input type="radio" class="sanjeevni" name="sanjeevni" id="sjno" value="0" <?php if(isset($result['sanjeevni']) && $result['sanjeevni'] == 0) echo 'checked'; ?> >
                                                        <label for="sjno">No</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" medical_insurance_txt  style="display:none; margin-bottom: 10px;" id="medical_insurance_txt">
                                                <div class="col-md-4">
                                                    <label>Please Specify Company</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="medical_insurance_text" name="medical_insurance_text" value="<?= $result['medical_insurance_text'] ?? '' ; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group text-center">
                                        <input type="hidden" name="client" value="web">
                                        <input type="hidden" name="ip" value="<?= $this->input->ip_address();?>">
                                        <!-- <input type="hidden" name="photo_file_old" id="photo_file_old" value="<?= $result['image'] ?? '';?>"> -->
                                        <input type="hidden" name="m_type" id="m_type" value="">
                                        <input type="hidden" name="member_id" value="<?= $result['id'] ?? 0;?>">
                                        <input type="hidden" name="family_id" id="family_id" value="<?= $result['family_id'] ?? 0;?>">
                                        <input type="hidden" name="member_no" value="<?= $result['member_no'] ?? ''; ?>">
                                        <button type="submit" class="btn btn-md btn-success" id="submitb2b" data-form="member-form">Update Detail <i class="fa fa-save"></i></button>
                                        <button type="button" class="btn btn-md btn-danger" id="cancel">Cancel <i class="fa fa-close"></i></button>
                                    </div>
                                <!-- </div> -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>