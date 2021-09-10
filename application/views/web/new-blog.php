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
<!-- Home Design Inner Pages -->
<?php $this->load->view('web/includes/breadcrumb');?>

<!-- Inner Pages Main Section -->
<section class="ulockd-ip-latest-news">
    <div class="container">
        <div class="row">
             <div class="col-sm-12 col-md-12">
                <form class="donation-form donor-details" id="blog-form" method="POST">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="required"> Title / Name of Blog</label><br>
                            <div class="form-group">
                                <input type="text" class="form-control" id="title" name="title" placeholder="Blog Title">
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <label class="required"> Images</label><br>
                            <div class="form-group">
                                <input type="file" class="form-control" id="images" name="images[]" multiple="multiple">
                                <small><i>Max 3 Files Can Be Uploaded & Max Total size 10MB</i></small>
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea class="form-control" name="content1" id="content1" placeholder="Descrption"></textarea>
                            </div>
                        </div>
                    </div>
                   
                    <div class="form-group text-center">
                        <input type="hidden" name="description" id="description">
                        <input type="hidden" name="client" value="web">
                        <input type="hidden" name="ip" value="<?= $this->input->ip_address();?>">
                        <input type="hidden" name="id" id="id" value="0">
                        <input type="hidden" name="memberid" value="<?= $this->session->userdata('user_id');?>">
                        <input type="hidden" name="uploaded_by" value="<?= $this->session->userdata('full_name');?>">
                        <button type="submit" class="btn btn-lg btn-block ulockd-btn-thm2" data-toggle="modal" data-target=".bs-example-modal-default" id="save" data-form="blog-form" >Add Blog <i class="zmdi zmdi-save" style="display: none"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>