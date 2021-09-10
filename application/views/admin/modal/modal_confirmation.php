<div class="sky-form">
  <div class="form-horizontal padding-rl-20 marbot0" id="form">
      <div class="form-group">
        <div class="col-md-12 col-lg-12">
  		    <p class="bold marbot0">Are You Sure You Want To delete this Record?</p>		
         	<input type="hidden" name="id" id="id" value="<?php echo $id;?>">
        </div>
      </div>
    <hr>
    <div class="row marbot0">
      <div class="col-md-9 col-md-offset-3">
        <input type="submit" class="btn btn-primary" id="deletebtn" value="Delete">
        <input type="reset" class="btn btn-default" id="cancel" data-dismiss="modal" value="Cancel">
      </div>
    </div>
  </div>
</div>