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
                    <h2 class="text-uppercase"><?= $title;?>Member Details</span></h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-md-12">
                <?php //print_r($result);?>
                <form class="member-form member-details" id="member-form" method="POST">
                    <div class="row">


<input type="hidden" id="old_first_name" name="old_first_name" value="<?= $result['first_name'] ?? '' ;?>">
<input type="hidden" id="old_second_name" name="old_second_name" value="<?= $result['second_name'] ?? '' ;?>">
<input type="hidden" id="old_third_name" name="old_third_name" value="<?= $result['third_name'] ?? '' ;?>">
<input type="hidden" id="old_surname" name="old_surname" value="<?= $result['surname_id'] ?? '' ;?>">
<input type="hidden" id="old_surname_input" name="old_surname_input" value="<?= $result['other_surname_details'] ?? '' ;?>">
<input type="hidden" id="old_gender" name="old_gender" value="<?= $result['sex'] ?? '' ;?>">
<input type="hidden" id="old_dob" name="old_dob" value="<?= $result['dob'] ?? '' ;?>">
<input type="hidden" id="old_relation" name="old_relation" value="<?= $result['relation_id'] ?? '' ;?>">
<input type="hidden" id="old_relation_input" name="old_relation_input" value="<?= $result['other_relation_details'] ?? '' ;?>">
<input type="hidden" id="old_blood" name="old_blood" value="<?= $result['blood_id'] ?? '' ;?>">
<input type="hidden" id="old_occupation" name="old_occupation" value="<?= $result['occupation_id'] ?? '' ;?>">
<input type="hidden" id="old_occupation_input" name="old_occupation_input" value="<?= $result['other_occupation_details'] ?? '' ;?>">
<input type="hidden" id="old_marriage_type" name="old_marriage_type" value="<?= $result['marriage_type'] ?? '' ;?>">

<!-- FEMALE -- MARRIAGE -->
<input type="hidden" id="old_m_secondname" name="old_m_secondname" value="<?= $result['m_second_name'] ?? '' ;?>">
<input type="hidden" id="old_m_thirdname" name="old_m_thirdname" value="<?= $result['m_third_name'] ?? '' ;?>">
<input type="hidden" id="old_m_surname" name="old_m_surname" value="<?= $result['m_surname'] ?? '' ;?>">
<input type="hidden" id="old_m_village" name="old_m_village" value="<?= $result['m_village'] ?? '' ;?>">
<input type="hidden" id="old_m_address" name="old_m_address" value="<?= $result['m_address'] ?? '' ;?>">
<input type="hidden" id="old_m_contact" name="old_m_contact" value="<?= $result['m_contact'] ?? '' ;?>">
<input type="hidden" id="old_m_email" name="old_m_email" value="<?= $result['m_email'] ?? '' ;?>">


<input type="hidden" id="old_education_id" name="old_education_id" value="<?= $result['education_id'] ?? '' ;?>">
<input type="hidden" id="old_education_input" name="old_education_input" value="<?= $result['other_education_details'] ?? '' ;?>">
<input type="hidden" id="old_dom" name="old_dom" value="<?= $result['dom'] ?? '' ;?>">
<input type="hidden" id="old_contact" name="old_contact" value="<?= $result['contact'] ?? '' ;?>">
<input type="hidden" id="old_altcontact" name="old_altcontact" value="<?= $result['altcontact'] ?? '' ;?>">
<input type="hidden" id="old_email" name="old_email" value="<?= $result['email'] ?? '' ;?>">
<input type="hidden" id="old_achivements" name="old_achivements" value="<?= $result['achivements'] ?? '' ;?>">
<input type="hidden" id="old_photo_file" name="old_photo_file" value="<?= $result['image'] ?? '' ;?>">
<input type="hidden" id="old_sports_id" name="old_sports_id" value="<?= $result['sports_id'] ?? '' ;?>">
<input type="hidden" id="old_sports_input" name="old_sports_input" value="<?= $result['other_sports_details'] ?? '' ;?>">
<input type="hidden" id="old_dharmik" name="old_dharmik" value="<?= $result['dharmik_id'] ?? '' ;?>">
<input type="hidden" id="old_life_insurance" name="old_life_insurance" value="<?= $result['life_insurance'] ?? '' ;?>">
<input type="hidden" id="old_life_insurance_text" name="old_life_insurance_text" value="<?= $result['life_insurance_text'] ?? '' ;?>">
<input type="hidden" id="old_medical_insurance" name="old_medical_insurance" value="<?= $result['medical_insurance'] ?? '' ;?>">
<input type="hidden" id="old_sanjeevni" name="old_sanjeevni" value="<?= $result['sanjeevni'] ?? '' ;?>">
<input type="hidden" id="old_medical_insurance_text" name="old_medical_insurance_text" value="<?= $result['medical_insurance_text'] ?? '' ;?>">
<input type="hidden" id="old_image" name="old_image" value="<?= $result['image'] ?? '' ;?>">

                        


                        <div class="col-md-6" firstname>
                            <div class="row">
                                <div class="col-md-5">
                                    <label class="required">First name</label>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="first_name" name="first_name" value="<?= $result['first_name'] ?? '' ;?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6" secondname>
                            <div class="row">
                                <div class="col-md-5">
                                    <label class="required">Middle name</label>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="second_name" name="second_name" value="<?= $result['third_name'] ?? ''; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6" thirdname>
                            <div class="row">
                                <div class="col-md-5">
                                    <label class="required">Last name</label>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="third_name" name="third_name" value="<?= $result['third_name'] ?? '' ;?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6" surname>
                            <div class="row">
                                <div class="col-md-5">
                                    <label class="required">Surname</label>
                                </div>
                                <div class="col-md-7">
                                    <div class="row">
                                        <div class="col-md-12" id="surname_div">
                                            <div class="form-group">
                                                <?php 
                                                    $js = 'id="surname" class="form-control ms"';
                                                    echo form_dropdown('surname', $surname, ($result['surname_id']  ?? '') , $js);
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6" id="surname-input-div">
                                            <div class="form-group">
                                                <input type="text" placeholder="Other Surname Detail" class="form-control" id="surname_input" name="surname_input" value="<?= $result['other_surname_details'] ?? ''; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6" gender>
                            <div class="row">
                                <div class="col-md-5">
                                    <label class="required">Gender</label>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <select name="gender" id="gender" class="form-control ms">
                                            <option <?php if(($result['sex'] ?? '')  == "M"){ echo 'selected'; }?> value="M">Male</option>
                                            <option <?php if(($result['sex'] ?? '')  == "F"){ echo 'selected'; }?> value="F">Female</option>
                                        </select>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6" dob>
                            <div class="row">
                                <div class="col-md-5">
                                    <label class="required">Date of Birth</label>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <input type="date" class="form-control" id="dobddddd" name="dob" value="<?= $result['dob'] ?? '';?>">
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-md-6" >
                            <div class="row">
                                <div class="col-md-5">
                                    <label class="required">Relation With Family Head</label>
                                </div>
                                <div class="col-md-7" >
                                    <div class="row">
                                        <div class="col-md-12" id="relation_div">
                                            <div class="form-group">
                                               <select name="relation" id="relation" class="form-control ms">
                                                <option value="" >Select Relation With Family Head</option>
                                                   <?php 
                                                   // print_r($result['relation_id']);
                                                    foreach($relation as $key => $value){
                                                        $sel = '';
                                                        // echo "<br>relation id: ".$result['relation_id']."--id : ".$value['id'];
                                                        if(($result['relation_id']  ?? '') == $value['id'] ){
                                                            $sel = 'selected';
                                                        }
                                                        if($value['id'] == 22 && $result['relation_id'] != 22 ){
                                                            $sel .= 'disabled';
                                                        }
                                                        echo '<option '.$sel.' data-type="'.$value['m_type'].'" value="'.$value['id'].'">'.($value['relation'] ?? '').'</option>';
                                                    }

                                                        //$js = 'id="relation" class="form-control ms"';
                                                       // echo form_dropdown('relation', $relation, $result['relation_id'], $js);
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6" id="relation-input-div">
                                            <div class="form-group">
                                                <input type="text" placeholder="Other Relation Detail" class="form-control" id="relation_input" name="relation_input" value="<?= $result['other_relation_details'] ?? ''; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6" bloodgroup>
                            <div class="row">
                                <div class="col-md-5">
                                    <label class="required">Blood Group</label>
                                </div>
                                <div class="col-md-7">
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
                                <div class="col-md-5">
                                    <label class="required">Occupation</label>
                                </div>
                                <div class="col-md-7">
                                    <div class="row">
                                        <div class="col-md-12" id="occupation_div">
                                            <div class="form-group">
                                               <?php 
                                                    $js = 'id="occupation" class="form-control ms"';
                                                    echo form_dropdown('occupation', $occupation, ($result['occupation_id'] ?? ''), $js);
                                                ?>
                                            </div>
                                        </div>

                                        <div class="col-md-6" id="occupation-input-div">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Other Occupation Details" id="occupation-input" name="occupation-input" value="<?= $result['other_occupation_details'] ?? ''; ?>">
                                    </div>
                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-6"maritalstatus>
                            <div class="row">
                                <div class="col-md-5">
                                    <label class="required">Marital Status</label>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                       <?php 
                                            $js = 'id="marriage_type" class="form-control ms"';
                                            echo form_dropdown('marriage_type', $maritalstatus, ($result['marriage_type'] ?? ''), $js);
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" marriage_details style="display:none; margin-bottom: 10px;" id="marriage_details">
                            <div class="col-md-12" style="background-color: #e1e1e1">
                                <h4>Marriage Details</h4>
                            </div>
                            <div class="col-md-12" style="background-color: #ececec">
                                <div class="col-md-6" secondname>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <label class="required">Father/Husband Name</label>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                 <input type="text" class="form-control" id="m_secondname" name="m_secondname" value="<?= $result['m_second_name'] ?? '';?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6" m_thirdname>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <label>Middle Name</label>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                 <input type="text" class="form-control" id="m_thirdname" name="m_thirdname" value="<?= $result['m_third_name'] ?? '';?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6" m_surname>
                                    <div class="row">
                                        <div class="col-md-5" style="white-space: nowrap;">
                                            <label class="required">Father/Husband Surname</label>
                                        </div>
                                        <div class="col-md-7">
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
                                        <div class="col-md-5" style="white-space: nowrap;">
                                            <label class="required">Village</label>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <?php 
                                                    $js = 'id="m_village" class="form-control ms"';
                                                    echo form_dropdown('m_village', $village, ($result['m_village'] ?? ''), $js);
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12" m_address>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label>Address</label>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                 <input type="text" class="form-control" id="m_address" name="m_address" value="<?= $result['m_address'] ?? '';?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6" m_contact>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <label class="required">Contact</label>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                 <input type="text" class="form-control" id="m_contact" name="m_contact" value="<?= $result['m_contact'] ?? '';?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6" m_email>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <label>Email </label>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                 <input type="email" class="form-control" id="m_email" name="m_email" value="<?= $result['m_email'] ?? '';?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6" education>
                            <div class="row">
                                <div class="col-md-5">
                                    <label>Education</label>
                                </div>
                                <div class="col-md-7">
                                    <div class="row">
                                        <div class="col-md-12" id="education_div">
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
                                        <div class="col-md-6" id="education-input-div">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Other Education Details" id="education-input" name="education-input" value="<?= $result['other_education_details'] ?? ''; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        

                        <div class="col-md-6" dom>
                            <div class="row">
                                <div class="col-md-5">
                                    <label>Date of Marriage</label>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <input type="date" class="form-control" id="dom" name="dom" value="<?= $result['dom'] ?? '';?>">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6" contact>
                            <div class="row">
                                <div class="col-md-5">
                                    <label class="required">Contact</label>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="contact" name="contact" value="<?= $result['contact'] ?? '';?>">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6" altcontact>
                            <div class="row">
                                <div class="col-md-5">
                                    <label>Alternative Number</label>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="altcontact" name="altcontact" value="<?= $result['altcontact'] ?? '';?>">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6" email>
                            <div class="row">
                                <div class="col-md-5">
                                    <label>Email</label>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="email" name="email" value="<?= $result['email'] ?? '';?>">
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-6" achievements>
                            <div class="row">
                                <div class="col-md-5">
                                    <label>Achivements</label>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <textarea class="form-control" id="achivements" name="achivements" style="min-height:130px;resize: none;"><?= $result['achivements'] ?? '';?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6" photo>
                            <div class="row">
                                <div class="col-md-5">
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
                                <div class="col-md-7">

                                    <input type="file" class="btn btn-info btn-sm" id="photo_file" name="photo_file" style="width:200px;" title="Member Photo" accept="image/x-png,image/jpeg"><br/>
                                    <input id="reset_img" type="button" class="btn btn-warning" value="Reset Photo" />
                                </div>
 
                            </div>
                        </div>

                        <div class="col-md-6" sports>
                            <div class="row">
                                <div class="col-md-5">
                                    <label>Sports</label>
                                </div>
                                <div class="col-md-7">
                                    <div class="row">
                                        <div class="col-md-12" id="sports_div">
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

                                        <div class="col-md-6" id="sports-input-div">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Other Sports details" id="sports-input" name="sports-input" value="<?= $result['other_sports_details'] ?? ''; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6" dharmik>
                            <div class="row">
                                <div class="col-md-5">
                                    <label>Dharmik</label>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                       <?php 
                                            $js = 'id="dharmik" class="form-control ms"';
                                            echo form_dropdown('dharmik', $dharmik, ($result['dharmik_id'] ?? ''), $js);
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 " life_insurance style="background-color: #e1e1e1">
                            <div class="row">
                                <div class="col-md-5">
                                    <label>Life Insurance</label>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label class="lbl radio-inline"><input type="radio" class="life_insurance" name="life_insurance" <?php if(isset($result['life_insurance']) && $result['life_insurance'] == 1) echo 'checked'; ?> value="1">Yes</label>
                                        <label class="lbl radio-inline"><input type="radio" class="life_insurance" name="life_insurance" <?php if(isset($result['life_insurance']) && $result['life_insurance'] == 0) echo 'checked'; ?> value="0">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row" life_insurance_text  style="display:none; margin-bottom: 10px;" id="life_insurance_txt">
                                <div class="col-md-5">
                                    <label>Please Specify Company</label>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="life_insurance_text" name="life_insurance_text" value="<?= $result['life_insurance_text'] ?? '' ; ?>">
                                    </div>
                                </div>
                            </div>                            
                        </div>
                        <div class="col-md-6" medical_insurance  style="background-color: #ececec">
                            <div class="row">
                                <div class="col-md-5">
                                    <label>Medical Insurance</label>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label class="lbl radio-inline"><input type="radio" class="medical_insurance" name="medical_insurance" <?php if(isset($result['medical_insurance']) && $result['medical_insurance'] == 1) echo 'checked'; ?> value="1">Yes</label>
                                        <label class="lbl radio-inline"><input type="radio" class="medical_insurance" name="medical_insurance" <?php if(isset($result['medical_insurance']) && $result['medical_insurance']== 0) echo 'checked'; ?> value="0">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row" medical_insurance_ask style="display:none;" id="medical_insurance_ask">
                                <div class="col-md-5">
                                    <label>Sanjeevni</label>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label class="lbl radio-inline"><input type="radio" class="sanjeevni" name="sanjeevni" <?php if(isset($result['sanjeevni']) && $result['sanjeevni'] == 1) echo 'checked'; ?> value="1">Yes</label>
                                        <label class="lbl radio-inline"><input type="radio" class="sanjeevni" name="sanjeevni" <?php if(isset($result['sanjeevni']) && $result['sanjeevni'] == 0) echo 'checked'; ?> value="0">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row" medical_insurance_txt  style="display:none; margin-bottom: 10px;" id="medical_insurance_txt">
                                <div class="col-md-5">
                                    <label>Please Specify Company</label>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="medical_insurance_text" name="medical_insurance_text" value="<?= $result['medical_insurance_text'] ?? '' ; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <?php //print_r($result); ?>
                    
                    <div class="form-group text-center">
                        <input type="hidden" name="client" value="web">
                        <input type="hidden" name="ip" value="<?= $this->input->ip_address();?>">
                        <input type="hidden" name="status" value="<?php if($pagetitle ==  "Edit Member"){ if($result['old_value'] != ''){echo 'true'; }else{echo 'false';} }else{echo 'false'; } ?>">
                         <!--<input type="hidden" name="photo_file_old" id="photo_file_old" value="<?= $result['image'] ?? '';?>"> -->
                        <input type="hidden" name="m_type" id="m_type" value="">
                        <input type="hidden" name="member_id" value="<?= $result['id'] ?? 0;?>">
                        <input type="hidden" name="family_id" id="family_id" value="<?= $result['family_id'] ?? $family_id;?>">
                        <input type="hidden" name="member_no" value="<?= $result['member_no'] ?? ''; ?>">
                        <button type="submit" class="btn btn-md btn-success" id="submitb2b" data-form="member-form"> <?php if($pagetitle ==  "Edit Member"){
                            echo "Update";
                        }else{
                            echo "Add";
                        } ?>  Detail <i class="fa fa-save"></i></button>
                        <button type="button" class="btn btn-md btn-danger" id="cancel">Cancel <i class="fa fa-close"></i></button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</section>
<script type="text/javascript">
    var img = "<?= $img; ?>";
    var dob = "<?= $result['dob'] ?? ''; ?>";
    var dom = "<?= $result['dom'] ?? ''; ?>";

</script>