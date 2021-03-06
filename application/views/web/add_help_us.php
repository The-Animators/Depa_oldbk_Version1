<!-- Home Design Inner Pages -->
<div class="ulockd-inner-home">
    <div class="container text-center">
        <div class="row">
            <div class="ulockd-inner-conraimer-details">
                <div class="col-md-12">
                    <h1 class="text-uppercase"><?= $pagetitle; ?></h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Home Design Inner Pages -->
<?php $this->load->view('web/includes/breadcrumb');?>

<?php

if ($this->session->userdata('logintype') != 'normal') {
    redirect(base_url(), 'refresh');
}

?>

<!-- Inner Pages Main Section -->
<section class="ulockd-about">
    <div class="container">
	<?php if($client == 'web'){ ?>
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 text-center">
                <div class="ulockd-dtitle hvr-float-shadow">
                    <h2 class="text-uppercase">Submit a ticket</span></h2>
                  
                </div>
            </div>
        </div>
    <?php } ?>
        <h3>Ticket Details</h3>
        <div class="container">
			<form class="help-form" id="help-form" method="POST">
			     <div class="row">
			            <div class="col-md-6">

			              <div class="form-group">
			              	<label class="form-label" for="fname">Help For:</label>
			              	<select class="form-control" name="help_for" id="help_for" required>
				                <option value="" selected="" disabled="">Help For</option>
				                <option value="Property">Property</option>
				                <option value="Education">Education</option>
				                <option value="Medical">Medical</option>
				                <option value="Medical">Medical</option>
				                <option value="Others">Others</option>
				            </select>
			              </div>

			              <div class="form-group">
				              <label class="form-label">Details:</label>
				              <textarea class="form-control" name="help_details" id="help_details" cols="30" rows="10"></textarea>
				          </div>

			            </div>
			            <div class="col-md-6">

				            <div class="form-group">
				              <label class="form-label">Title:</label>
				              <input type="text" class="form-control" name="help_title" id="help_title">
				          	</div>

				            <div class="form-group">
	                            <label for="bimages">Help Us Banner Images (Max 3)</label>
	                            <input type="file" id="bimages" name="bimages[]" class="form-control form_control" multiple>
	                        </div>

				          	<div class="form-group">
				              <label class="form-label">contact person:</label> 
				              <input type="text" class="form-control" name="help_person" id="help_person">   
				            </div> 

				            <div class="form-group">
				              <label class="form-label">contact number:</label> 
				              <input type="text" class="form-control" name="help_contact" id="help_contact">
				            </div>

				            <div class="form-group">
				              <label class="form-label">Ticket Generated By</label> 
				              <input type="text" class="form-control" name="help_by" id="help_by" value="<?php echo $this->session->userdata('member_no'); ?>" readonly>
				            </div>

				            <input type="hidden" id="family_no" name="family_no" value="<?php echo $this->session->userdata('family_no'); ?>">

			            </div>
			            <div class="col-md-12">
			            	
			            	<input class="btn btn-md btn-success" data-form="help-form" name="submit" id="submit_help" type="submit" value="Submit Ticket">

			            </div>
			 	 </div>
		 	</form>
 	 	</div>	

   </div>
</section>