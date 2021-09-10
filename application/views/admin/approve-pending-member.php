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
                                <li><a href="<?= base_url();?>admin/family/member-list" class="btn btn-raised btn-primary btn-round waves-effect">
                                    <?= $pagetitle?> List</a>
                                </li>
                            </ul>
                        </div>
                        <div class="body" id='DivIdToPrint'>
                            <form class="donation-form donor-details" id="member-form" method="POST">
                                
                                <!--<div class="row" align="center">
                                    <div class="col-md-6">
                                        <h3>Old Information</h3>
                                    </div>
                                    <div class="col-md-6">
                                        <h3>New Information</h3>
                                    </div>
                                </div>
                                <hr />-->

                                <div class="row">
                                	
	                                <div class="col-lg-6">
	                                    
	                                    <div class="col-md-12">
                                            <h3>Old Information</h3>
                                        </div>
                                        <hr>
                                    
	                                	<div class="row">
		                                    <div class="col-md-6" firstname>
		                                        <div class="row">
		                                            <div class="col-md-4">
		                                                <label>First name</label>
		                                            </div>
		                                            <div class="col-md-8">
		                                                <div class="form-group">
		                                                    <input readonly type="text" class="form-control" value="<?= $result['first_name'] ?? '' ;?>">
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
		                                                    <input readonly type="text" class="form-control" value="<?= $result['second_name'] ?? '' ;?>">
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
		                                                    <input readonly type="text" class="form-control" value="<?= $result['third_name'] ?? '' ;?>">
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
		                                                	<input readonly type="text" class="form-control" value="<?php echo $surname[($result['surname_id']  ?? '')]; ?>">
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
		                                                   <input readonly type="text" class="form-control" value="<?php if(($result['sex'] ?? '')  == "M"){ echo 'Male'; } if(($result['sex'] ?? '')  == "F"){ echo 'Female'; } ?>" >
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
		                                                    <input readonly type="text" class="form-control" value="<?= $result['dob'] ?? '';?>">
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

		                                                	<input readonly type="text" class="form-control" value="<?php foreach($relation as $key => $value){ if(($result['relation_id']  ?? '') == $value['id']){ echo ($value['relation'] ?? ''); } } ?>">
		                                                   
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
		                                                    <input readonly type="text" class="form-control" value="<?php echo $bloodgroup[($result['blood_id']  ?? '')]; ?>">
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
		                                                	<input readonly type="text" class="form-control" value="<?php echo $occupation[($result['occupation_id']  ?? '')]; ?>">
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
		                                                	<input readonly type="text" class="form-control" value="<?php echo $maritalstatus[($result['marriage_type']  ?? '')]; ?>">
		                                                    <?php 
		                                                        $js = 'id="marriage_type" class="form-control ms" style="display:none;"';
		                                                        echo form_dropdown('', $maritalstatus, ($result['marriage_type'] ?? ''), $js);
		                                                    ?>
		                                                </div>
		                                            </div>
		                                        </div>
		                                    </div>
		                                </div>   

		                                <!--<div class="row" style="display:none; margin-bottom: 10px;" id="marriage_details">-->
		                                <!--<div class="row" >-->
		                                
		                                <div class="row" <?php if($result['sex']  == "M"){ echo 'style="display:none; margin-bottom: 10px;"'; }else{echo 'style="margin-bottom: 10px;"'; } ?> >
		                                
		                                    <div class="col-md-12" style="background-color: #e1e1e1;">
		                                        <h4>Marriage Details</h4>
		                                    </div>
		                                    
		                                    <div class="col-md-12" style="background-color: #ececec;padding-top: 10px">
		                                        <div class="row">
		                                            <div class="col-md-6" secondname>
		                                                <div class="row">
		                                                    <div class="col-md-12">
		                                                        <div class="form-group">
		                                                        	<label>Father/Husband Name</label>
		                                                            <input readonly type="text" class="form-control" value="<?= $result['m_second_name'] ?? '';?>">
		                                                        </div>
		                                                    </div>
		                                                </div>
		                                            </div>
		                                            <div class="col-md-6" m_thirdname>
		                                                <div class="row">
		                                                    <div class="col-md-12">
		                                                        <div class="form-group">
		                                                        	<label>Third Name</label>
		                                                            <input readonly type="text" class="form-control" value="<?= $result['m_third_name'] ?? '';?>">
		                                                        </div>
		                                                    </div>
		                                                </div>
		                                            </div>
		                                        </div>
		                                        <div class="row">
		                                            <div class="col-md-6" m_surname>
		                                                <div class="row">
		                                                    <div class="col-md-12">
		                                                        <div class="form-group">
		                                                        	<label>Father/Husband Surname</label>
		                                                        	<input readonly type="text" class="form-control" value="<?php echo $surname[$result['m_surname']] ?? ''; ?>">
		                                                            
		                                                        </div>
		                                                    </div>
		                                                </div>
		                                            </div>
		                                            <div class="col-md-6" m_village>
		                                                <div class="row">
		                                                    <div class="col-md-12">
		                                                        <div class="form-group">
		                                                        	<label>Village</label>
		                                                        	<input readonly type="text" class="form-control" value="<?php echo $result['m_village']  ?? ''; ?>">
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
		                                                            <input readonly type="text" class="form-control" value="<?= $result['m_address'] ?? '';?>">
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
		                                                            <input readonly type="text" class="form-control" value="<?= $result['m_contact'] ?? '';?>">
		                                                        </div>
		                                                    </div>
		                                                </div>
		                                            </div>
		                                            <div class="col-md-6" m_email>
		                                                <div class="row">
		                                                    <div class="col-md-4">
		                                                        <label>Email</label>
		                                                    </div>
		                                                    <div class="col-md-8">
		                                                        <div class="form-group">
		                                                            <input readonly type="text" class="form-control" value="<?= $result['m_email'] ?? '';?>">
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
		                                                    <select style="display: none;" id="education_id" class="form-control ms" multiple>
		                                                    <?php
		                                                    $xdval = '';
		                                                    $edu_array = explode(",", ($result['education_id'] ?? ''));
		                                                    foreach($education as $key => $value){
		                                                        $sel = '';
		                                                        if(in_array($value['id'], $edu_array)){
		                                                        // if($result['education_id'] == $value['id']){
		                                                            $sel = 'selected';
		                                                            $xdval .= $value['education'].', ';
		                                                        }
		                                                        echo '<option '.$sel.' value="'.$value['id'].'">'.$value['education'].'</option>';
		                                                    }
		                                                    ?>
		                                                    </select>

		                                                    <input readonly type="text" class="form-control" value="<?= $xdval; ?>">

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
		                                                    <input readonly type="text" class="form-control" value="<?= $result['dom'] ?? '';?>">
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
		                                                    <input readonly type="text" class="form-control" value="<?= $result['contact'] ?? '';?>">
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
		                                                    <input readonly type="text" class="form-control" value="<?= $result['email'] ?? '';?>">
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
		                                                    <textarea readonly class="form-control" style="min-height:130px;resize: none;"><?= $result['achivements'] ?? '';?></textarea>
		                                                </div>
		                                            </div>
		                                        </div>
		                                    </div>

		                                    <div class="col-md-6" photo>
		                                        <div class="row">
		                                            <div class="col-md-12">
		                                                <label>Photo</label> &nbsp;&nbsp;
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
		                                                        echo '<img width="250" src="'.$img.'" class="img-responsive" id="photo_name">';
		                                                        // echo $img;
		                                                    ?>
		                                                </div>                                </div>
		                                            
		             
		                                        </div>
		                                    </div>

		                                    <div class="col-md-6" sports>
		                                        <div class="row">
		                                            <div class="col-md-4">
		                                                <label>Sports</label>
		                                            </div>
		                                            <div class="col-md-8">
		                                                <div class="form-group">
		                                                    <select style="display: none;" id="sports_id" class="form-control ms" multiple >
		                                                    <?php 
		                                                    $xdval = '';
		                                                    $sport_array = explode(",", ($result['sports_id'] ?? ''));
		                                                    foreach($sports as $key => $value){
		                                                        $sel = '';
		                                                        if(in_array($value['id'], $sport_array)){
		                                                            $sel = 'selected';
		                                                            $xdval .= $value['sports'].', ';
		                                                        }
		                                                        echo '<option '.$sel.' value="'.$value['id'].'">'.$value['sports'].'</option>';
		                                                    }
		                                                    ?>
		                                                    </select>
		                                                    <input readonly type="text" class="form-control" value="<?= $xdval; ?>">
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
		                                                   

		                                                    <input readonly type="text" class="form-control" value="<?php echo $dharmik[($result['dharmik_id']  ?? '')]; ?>">

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
		                                                    <input readonly type="radio" value="1" <?php if($result['life_insurance'] == 1) echo 'checked'; ?>>
		                                                    <label >Yes</label>
		                                                    <input readonly type="radio" value="0" <?php if($result['life_insurance'] == 0) echo 'checked'; ?>>
		                                                    <label >No</label>
		                                                </div>

		                                                
		                                            </div>
		                                        </div>
		                                        <div class="row" life_insurance_text  style="display:none; margin-bottom: 10px;" id="life_insurance_txt">
		                                            <div class="col-md-4">
		                                                <label>Please Specify Company</label>
		                                            </div>
		                                            <div class="col-md-8">
		                                                <div class="form-group">
		                                                    <input readonly type="text" class="form-control" value="<?= $result['life_insurance_text'] ?? '' ; ?>">
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
		                                                    <input readonly type="radio" value="1" <?php if($result['medical_insurance'] == 1) echo 'checked'; ?> >
		                                                    <label>Yes</label>
		                                                    <input readonly type="radio" value="0" <?php if($result['medical_insurance'] == 0) echo 'checked'; ?> >
		                                                    <label>No</label>
		                                                </div>
		                                            </div>
		                                        </div>
		                                        <div class="row" medical_insurance_ask style="display:none;" id="medical_insurance_ask">
		                                            <div class="col-md-4">
		                                                <label>Sanjeevni</label>
		                                            </div>
		                                            <div class="col-md-8">
		                                                <div class="radio">
		                                                    <input readonly type="radio" value="1" <?php if($result['sanjeevni'] == 1) echo 'checked'; ?> >
		                                                    <label>Yes</label>
		                                                    <input readonly type="radio" value="0" <?php if($result['sanjeevni'] == 0) echo 'checked'; ?> >
		                                                    <label>No</label>
		                                                </div>
		                                            </div>
		                                        </div>
		                                        <div class="row" medical_insurance_txt  style="display:none; margin-bottom: 10px;" id="medical_insurance_txt">
		                                            <div class="col-md-4">
		                                                <label>Please Specify Company</label>
		                                            </div>
		                                            <div class="col-md-8">
		                                                <div class="form-group">
		                                                    <input readonly type="text" class="form-control" value="<?= $result['medical_insurance_text'] ?? '' ; ?>">
		                                                </div>
		                                            </div>
		                                        </div>
		                                    </div>
		                                </div>

	                                </div>


	                                <!-- NewVal -->
	                            	<div class="col-lg-6">
                                        
                                        <div class="col-md-12">
                                            <h3>New Information</h3>
                                        </div>
                                        <hr>
                                    
	                            		<?php 

		                            		//echo $result['new_value'];
		                            		$old_value = $result['old_value'];
		                            		$result_old = json_decode($old_value);
		                            		$result_new = json_decode($result['new_value']);
		                            		$ndata = $result_new[0];
		                            		
		                            		//print_r($maritalstatus);
		                            		
		                            		//print_r($result_old[0]->first_name);

	                            		?>
                                        
	                            		<div class="row">
                                            <div class="col-md-6" firstname style="<?php if($result['first_name'] != $ndata->first_name){echo 'color:red;';} ?>">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label>First name</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <input readonly type="text" class="form-control" value="<?= $ndata->first_name;?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6" secondname style="<?php if($result['second_name'] != $ndata->second_name){echo 'color:red;';} ?>">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label>Second name</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <input readonly type="text" class="form-control" value="<?= $ndata->second_name;?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6" thirdname style="<?php if($result['third_name'] != $ndata->third_name){echo 'color:red;';} ?>">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label>Third name</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <input readonly type="text" class="form-control" value="<?= $ndata->third_name;?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6" surname style="<?php if( $surname[$result['surname_id']] != $surname[$ndata->surname_id]){echo 'color:red;';} ?>">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label>Surname</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <input readonly type="text" class="form-control" value="<?php echo $surname[$ndata->surname_id]; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6" gender style="<?php if($result['sex'] != $ndata->sex){echo 'color:red;';} ?>">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label>Gender</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                           <input readonly type="text" class="form-control" value="<?php if(($ndata->sex ?? '')  == "M"){ echo 'Male'; } if(($ndata->sex ?? '')  == "F"){ echo 'Female'; } ?>" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6" dob style="<?php if($result['dob'] != $ndata->dob){echo 'color:red;';} ?>">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label>Date of Birth</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <input readonly type="text" class="form-control" value="<?= $ndata->dob;?>">
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-md-6" relation style="<?php if($result['relation_id'] != $ndata->relation_id){echo 'color:red;';} ?>">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label>Relation</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group">

                                                            <input readonly type="text" class="form-control" value="<?php foreach($relation as $key => $value){ if($ndata->relation_id == $value['id']){ echo ($value['relation'] ?? ''); } } ?>">
                                                           
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6" bloodgroup style="<?php if($result['blood_id'] != $ndata->blood_id){echo 'color:red;';} ?>">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label>Blood Group</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <input readonly type="text" class="form-control" value="<?= $bloodgroup[$ndata->blood_id];?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6" occupation style="<?php if( $occupation[$result['occupation_id']] != $occupation[$ndata->occupation_id]){echo 'color:red;';} ?>">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label>Occupation</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <input readonly type="text" class="form-control" value="<?= $occupation[$ndata->occupation_id];?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6" maritalstatus style="<?php if($maritalstatus[$result['marriage_type']] != $maritalstatus[$ndata->marriage_type]){echo 'color:red;';} ?>">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label>Marital Status</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <input readonly type="text" class="form-control" value="<?= $maritalstatus[$ndata->marriage_type];?>">
                                                            <?php 
                                                                $js = 'id="marriage_type" class="form-control ms" style="display:none;"';
                                                                echo form_dropdown('', $maritalstatus, ($result['marriage_type'] ?? ''), $js);
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>   

                                        <div class="row" <?php if(($ndata->sex ?? '')  == "M"){ echo 'style="display:none; margin-bottom: 10px;"'; }else{echo 'style="margin-bottom: 10px;"'; } ?> >
                                            <div class="col-md-12" style="background-color: #e1e1e1;">
                                                <h4>Marriage Details</h4>
                                            </div>
                                                
                                            <div class="col-md-12" style="background-color: #ececec;padding-top: 10px">
                                                <div class="row">
                                                    <div class="col-md-6" secondname style="<?php if($result_old[0]->m_secondname != $ndata->m_secondname){echo 'color:red;';} ?>">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label>Father/Husband Name</label>
                                                                    <input readonly type="text" class="form-control" value="<?= $ndata->m_secondname;?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6" m_thirdname style="<?php if($result_old[0]->m_thirdname != $ndata->m_thirdname){echo 'color:red;';} ?>">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label>Third Name</label>
                                                                    <input readonly type="text" class="form-control" value="<?= $ndata->m_thirdname;?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <?php // echo $surname['m_surname'] ?? '' .' :: '.$surname[$ndata->m_surname].' == '.$ndata->m_surname; ?>
                                                
                                                <div class="row">
                                                    <div class="col-md-6" m_surname style="<?php if($surname[$result['m_surname']] != $surname[$ndata->m_surname]){echo 'color:red;';} ?>">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label>Father/Husband Surname</label>
                                                                    <input readonly type="text" class="form-control" value="<?= $surname[$ndata->m_surname];?>">
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6" m_village style="<?php if($result['m_village'] != $ndata->m_village){echo 'color:red;';} ?>">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label>Village</label>
                                                                    <input readonly type="text" class="form-control" value="<?= $village[$ndata->m_village];?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12" m_address style="<?php if($result['m_address'] != $ndata->m_address){echo 'color:red;';} ?>">
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <label>Address</label>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <div class="form-group">
                                                                    <input readonly type="text" class="form-control" value="<?= $ndata->m_address;?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6" m_contact style="<?php if($result['m_contact'] != $ndata->m_contact){echo 'color:red;';} ?>">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <label>Contact</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="form-group">
                                                                    <input readonly type="text" class="form-control" value="<?= $ndata->m_contact;?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6" m_email style="<?php if($result['m_email'] != $ndata->m_email){echo 'color:red;';} ?>">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <label>Email</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="form-group">
                                                                    <input readonly type="text" class="form-control" value="<?= $ndata->m_email;?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            
                                            <div class="col-md-6" education style="<?php if($result['education_id'] != $ndata->education_id){echo 'color:red;';} ?>">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label>Education</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <select style="display: none;" id="education_id" class="form-control ms" multiple>
                                                            <?php
                                                            $xdval = '';
                                                            $edu_array = explode(",", ($result['education_id'] ?? ''));
                                                            foreach($education as $key => $value){
                                                                $sel = '';
                                                                if(in_array($value['id'], $edu_array)){
                                                                // if($result['education_id'] == $value['id']){
                                                                    $sel = 'selected';
                                                                    $xdval .= $value['education'].', ';
                                                                }
                                                                echo '<option '.$sel.' value="'.$value['id'].'">'.$value['education'].'</option>';
                                                            }
                                                            ?>
                                                            </select>

                                                            <input readonly type="text" class="form-control" value="<?= $xdval; ?>">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            

                                            <div class="col-md-6" dom style="<?php if($result['dom'] != $ndata->dom){echo 'color:red;';} ?>">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label>Date of Marriage</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <input readonly type="text" class="form-control" value="<?= $ndata->dom;?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6" contact style="<?php if($result['contact'] != $ndata->contact){echo 'color:red;';} ?>">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label>Contact</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <input readonly type="text" class="form-control" value="<?= $ndata->contact;?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6" email style="<?php if($result['email'] != $ndata->email){echo 'color:red;';} ?>">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label>Email</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <input readonly type="text" class="form-control" value="<?= $ndata->email;?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-md-6" achievements style="<?php if($result['achivements'] != $ndata->achivements){echo 'color:red;';} ?>">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label>Achivements</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <textarea readonly class="form-control" style="min-height:130px;resize: none;"><?= $ndata->achivements;?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6" photo>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label>Photo</label>
                                                        <div class="form-group">
                                                            <?php 
                                                                $image = $ndata->image;
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
                                                                echo '<img width="250" src="'.$img.'" class="img-responsive" id="photo_name">';
                                                                // echo $img;
                                                            ?>
                                                        </div>                                </div>
                                                    
                     
                                                </div>
                                            </div>

                                            <div class="col-md-6" sports>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label>Sports</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <select style="display: none;" id="sports_id" class="form-control ms" multiple >
                                                            <?php 
                                                            $xdval = '';
                                                            $sport_array = explode(",", $ndata->sports_id);
                                                            foreach($sports as $key => $value){
                                                                $sel = '';
                                                                if(in_array($value['id'], $sport_array)){
                                                                    $sel = 'selected';
                                                                    $xdval .= $value['sports'].', ';
                                                                }
                                                                echo '<option '.$sel.' value="'.$value['id'].'">'.$value['sports'].'</option>';
                                                            }
                                                            ?>
                                                            </select>
                                                            <input readonly type="text" class="form-control" value="<?= $xdval; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6" dharmik style="<?php if($dharmik[$result['dharmik_id']] != $dharmik[$ndata->dharmik_id] ){echo 'color:red;';} ?>">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label>Dharmik</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            
                                                            <input readonly type="text" class="form-control" value="<?= $dharmik[$ndata->dharmik_id];?>">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6" life_insurance style="<?php if($result['life_insurance'] != $ndata->life_insurance){echo 'color:red;';} ?> background-color: #e1e1e1;padding: 10px;">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label>Life Insurance</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="radio">
                                                            <input readonly type="radio" value="1" <?php if($ndata->life_insurance == 1) echo 'checked'; ?>>
		                                                    <label >Yes</label>
		                                                    <input readonly type="radio" value="0" <?php if($ndata->life_insurance == 0) echo 'checked'; ?>>
		                                                    <label >No</label>
                                                        </div>

                                                        
                                                    </div>
                                                </div>
                                                <div class="row" life_insurance_text style="<?php if($result['life_insurance_text'] != $ndata->life_insurance_text){echo 'color:red;';} ?> display:none; margin-bottom: 10px;" id="life_insurance_txt">
                                                    <div class="col-md-4">
                                                        <label>Please Specify Company</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <input readonly type="text" class="form-control" value="<?= $ndata->life_insurance_text ?? '' ; ?>">
                                                        </div>
                                                    </div>
                                                </div>                            
                                            </div>
                                            <div class="col-md-6" medical_insurance  style="<?php if($result['medical_insurance'] != $ndata->medical_insurance){echo 'color:red;';} ?> background-color: #ececec">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label>Medical Insurance</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="radio">
                                                            <input readonly type="radio" value="1" <?php if($ndata->medical_insurance == 1) echo 'checked'; ?>>
		                                                    <label >Yes</label>
		                                                    <input readonly type="radio" value="0" <?php if($ndata->medical_insurance == 0) echo 'checked'; ?>>
		                                                    <label >No</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row" medical_insurance_ask style="<?php if($result['sanjeevni'] != $ndata->sanjeevni){echo 'color:red;';} ?> display:none;" id="medical_insurance_ask">
                                                    <div class="col-md-4">
                                                        <label>Sanjeevni</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="radio">
                                                            <input readonly type="radio" class="sanjeevni" value="1" <?php if($ndata->sanjeevni == 1) echo 'checked'; ?> >
                                                            <label for="sjye">Yes</label>
                                                            <input readonly type="radio" class="sanjeevni" value="0" <?php if($ndata->sanjeevni == 0) echo 'checked'; ?> >
                                                            <label for="sjno">No</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row" medical_insurance_txt  style="<?php if($result['medical_insurance_text'] != $ndata->medical_insurance_text){echo 'color:red;';} ?> display:none; margin-bottom: 10px;" id="medical_insurance_txt">
                                                    <div class="col-md-4">
                                                        <label>Please Specify Company</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <input readonly type="text" class="form-control" value="<?= $ndata->medical_insurance_text ?? '' ; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

	                            	</div>

                                </div>

                                <div class="form-group text-center">
                                	<input type="hidden" id="member_id" name="member_id" value="<?= $result['id'] ?? ''; ?>">
                                    <input type="hidden" name="member_no" value="<?= $result['member_no'] ?? ''; ?>">
                                    <input type="hidden" name="family_id" value="<?= $result['family_id'] ?? ''; ?>">
                                    <button type="submit" class="btn btn-md btn-success" id="submitb2b" data-form="member-form">Approve </button>
                                    <button type="button" class="btn btn-md btn-danger" id="cancel">Reject <i class="fa fa-close"></i></button>
                                    <button type="button" class="btn btn-md btn-primary" id='btn' value='Print' onclick='printDiv();'>Print </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>