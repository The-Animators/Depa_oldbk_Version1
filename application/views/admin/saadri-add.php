<section class="content">
    <div class="body_scroll">
		<?php $this->load->view('admin/includes/breadcrumb');?>
		<div class="container-fluid">
            <!-- Horizontal Layout -->
            <div class="row clearfix">
                <div class="row">
            <div class="col-sm-12 col-md-12">
                <?php //print_r($result);?>
                
                <div class="card">
                    
                    <div class="card-body">
                        
                        <form class="maran_nondh_form member-details" id="saadri_form" method="POST">
		                    <div class="row">

		                        <div class="col-md-6" head>
		                            <div class="row">
		                                <div class="col-md-5">
		                                    <label class="required">Select Head (Family ID)</label>
		                                </div>
		                                <div class="col-md-7">
		                                    <select name="family_id" id="family_id" class="form-control ms show-tick ms select2" data-placeholder="Select Family Head">
		                                        <option value=""></option>
		                                        <?php 
		                                            foreach($familyHead as $key => $value){
		                                                echo '<option data-familypk-id="'.$value['family_no'].'" data-familyno="'.$value['family_no'].'" value="'.$value['family_id'].'">'.($value['fullname'] ?? ''). ' ('.$value['member_no'].')</option>';
		                                            }
		                                        ?>
		                                    </select>
		                                </div>
		                                
		                            </div>
		                        </div>

		                        <div class="col-md-6" person>
		                            <div class="row">
		                                <div class="col-md-5">
		                                    <label class="required">Select Person</label>
		                                </div>
		                                <div class="col-md-7">
		                                    <select name="family_person" id="family_person" class="form-control ms select" data-placeholder="Select Person">
		                                    </select>
		                                </div>
		                                
		                            </div>
		                        </div>

		                        <div class="col-md-6" date>
		                            <div class="row">
		                                <div class="col-md-5">
		                                    <label class="required">Prarthana Date</label>
		                                </div>
		                                <div class="col-md-7">
		                                    <div class="form-group">
		                                        <input type="text" class="form-control" id="mdate" name="mdate" placeholder="Prarthana Date" value="<?= $result[0]['date'] ?? '';?>">
		                                    </div>
		                                </div>
		                                
		                            </div>
		                        </div>
		                        
		                        <div class="col-md-6" photo>
		                            <div class="row">
		                                <div class="col-md-5">
		                                    <label class="required">Photo</label>
		                                </div>

		                                <div class="col-md-7">

		                                    <input type="file" class="btn btn-info btn-sm" id="photo_file" name="photo_file" style="width:200px;" title="Member Photo" accept="image/x-png,image/jpeg" value=""><br/>
		                                    <input id="reset_img" type="button" class="btn btn-warning" value="Reset Photo" />
		                                </div>
		 
		                            </div>

		                        </div>
		                        
		                        <div class="col-sm-12 d-flex justify-content-center">
		                            <div class="form-group">
		                                <?php 
		                                    $image = $result[0]['image'] ?? '';
		                                    if($image != ''){
		                                        $fileName = FCPATH."uploads/marannondh/".$image;
		                                        if (file_exists($fileName)) {
		                                            $img = base_url().'uploads/marannondh/'.$image;
		                                        }else{
		                                            $img = base_url().'assets/img/noimage.jpg';
		                                        } 
		                                    }else{
		                                        $img = base_url().'assets/img/noimage.jpg';
		                                    }
		                                    echo '<img src="'.$img.'" class="img-responsive " id="photo_name">';
		                                    // echo $img;
		                                ?>
		                            </div>
		                        </div>

		                        
		                    </div>
		                    <div class="col-sm-8 offset-sm-2">
		                        <input type="hidden" name="id" id="id" value="0">
		                        <input type="hidden" name="person_name" id="person_name" value="">
		                        <input type="hidden" name="family_no" id="family_no" value="">
		                        <button type="button" id="save" name="save" data-form="system-form" class="btn btn-raised btn-primary btn-round waves-effect">Save </button>
		                    </div>
		                </form>

                    </div>

                </div>

            </div>
            
        </div>
            </div>
        </div>
	</div>
</section>