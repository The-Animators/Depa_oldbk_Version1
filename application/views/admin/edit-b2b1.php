<style type="text/css">
    video {
  width: 100%;
  height: auto;
}

.card .header {
    padding: 20px 0 20px 0;
}
</style>
<section class="content">
    <div class="body_scroll">
        <?php $this->load->view('admin/includes/breadcrumb');?>
        <?php
            $logo               = $result['logo'] ?? '';
            $video              = $result['video'] ?? '';
            $visitingcard       = $result['visitingcard'] ?? '';
            $businesscategory   = $result['catergory'] ?? '';
            $suscriptiondata    = $result['subscription'] ?? '';
            $status             = $result['status'] ?? 0;
            $id                 = $result['id'] ?? 0;
            $uploaded_by        = $result['uploaded_by'] ?? 'Admin';
            if($id == 0){
                $strong = 'Add';
            }else{
                $strong = 'Update';
            }
        ?>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2> <strong><?= $strong;?></strong><?= $pagetitle?> </h2>
                            <ul class="header-dropdown">
                                <li><a href="<?= base_url();?>admin/b2b/list/all" class="btn btn-raised btn-primary btn-round waves-effect"> <?= $pagetitle?> List</a>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" id="b2b-form" method="POST">
                                
                                <!--  -->
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-3 form-control-label">
                                        <label for="firm_name">Firm Name</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-3">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="firm_name" name="firm_name" value="<?= $result['firm_name'] ?? '';?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-3 form-control-label">
                                        <label for="cat_id">Category</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-3">
                                        <div class="form-group">
                                            <?php 
                                                $js = 'id="cat_id" class="form-control ms"';
                                                echo form_dropdown('cat_id', $businesscat,$businesscategory ,$js);
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <?php 
                                    if($id==0){
                                ?>
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-3 form-control-label">
                                            <label for="logo">Logo</label>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-3">
                                            <div class="form-group">
                                               <input type="file" id="logo" name="logo" class="form-control form_control">
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-3 form-control-label">
                                            <label for="visitingcard">Visiting Card</label>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-3">
                                            <div class="form-group">
                                                <input type="file" id="visitingcard" name="visitingcard" class="form-control form_control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-3 form-control-label">
                                            <label for="bimages"> Business Images <br/>
                                                <p class="text-center"><small class="size10">(Max 5)</small></p>
                                            </label>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-3">
                                            <div class="form-group">
                                               <input type="file" id="bimages" name="bimages[]" class="form-control form_control" multiple>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-3 form-control-label">
                                            <label for="bvideo">Video <small><i> Format (mp4)</i></small></label>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-3">
                                            <div class="form-group">
                                                <input type="file" id="bvideo" name="bvideo" class="form-control form_control">
                                            </div>
                                        </div>
                                    </div>
                                <?php }?>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-3 form-control-label">
                                        <label for="description">Description</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-9">
                                        <div class="form-group">
                                            <textarea class="form-control" id="description" name="description"><?= $result['description'] ?? '';?></textarea>
                                        </div>
                                    </div>                                    
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-3 form-control-label">
                                        <label for="website">Website</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-3">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="website" name="website" value="<?= $result['website'] ?? '';?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-3 form-control-label">
                                        <label for="facebook">Facebook</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-3">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="facebook" name="facebook" value="<?= $result['facebook'] ?? '';?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-3 form-control-label">
                                        <label for="instagram">Instagram</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-3">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="instagram" name="instagram" value="<?= $result['instagram'] ?? '';?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-3 form-control-label">
                                        <label for="twitter">Twitter</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-3">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="twitter" name="twitter" value="<?= $result['twitter'] ?? '';?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-3 form-control-label">
                                        <label for="skype_id">Skype Id</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-3">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="skype_id" name="skype_id" value="<?= $result['skype_id'] ?? '';?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-3 form-control-label">
                                        <label for="whatsapp_number">WhatsApp Number</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-3">
                                        <div class="form-group">
                                            <input type="text" class="form-control noonly" id="whatsapp_number" name="whatsapp_number" value="<?= $result['whatsapp_number'] ?? '';?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-3 form-control-label">
                                        <label for="contact_person">Contact Person</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-3">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="contact_person" name="contact_person" value="<?= $result['contact_person'] ?? '';?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-3 form-control-label">
                                        <label for="contact_number">Contact Number</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-3">
                                        <div class="form-group">
                                            <input type="text" class="form-control noonly" id="contact_number" name="contact_number" value="<?= $result['contact_number'] ?? '';?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-3 form-control-label">
                                        <label for="email">Email</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-3">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="email" name="email" value="<?= $result['email'] ?? '';?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-start_date col-md-2 col-sm-3 form-control-label">
                                        <label for="subscription">Select Subscription</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-3">
                                        <div class="form-group">
                                            <?php 
                                                $js = 'id="subscription" class="form-control ms"';
                                                echo form_dropdown('subscription', $subscription, $suscriptiondata,$js);
                                            ?>
                                           
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-3 form-control-label">
                                        <label for="address">Address</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-9">
                                        <div class="form-group">
                                            <textarea class="form-control" id="address" name="address"><?= $result['address'] ?? '';?></textarea>
                                        </div>
                                    </div>                                    
                                </div>    
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-3 form-control-label">
                                        <label for="status">Status</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-3">
                                        <div class="form-group">
                                            <select class="form-control ms" name="status" id="status">
                                                <option value="">Select Status</option>
                                                <option value="0"<?php if($status == 0){?> selected <?php }?>>Pending</option>
                                                <option value="1"<?php if($status == 1){?> selected <?php }?>>Approved</option>
                                                <option value="2"<?php if($status == 2){?> selected <?php }?>>Reject</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-3 form-control-label">
                                        <label for="expiry_date">Expire On</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-3">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="expiry_date" name="expiry_date" value="<?= $result['expiry_date'] ?? '';?>" readonly>
                                        </div>
                                    </div>
                                </div>
                                <?php 
                                    if($id > 0){
                                ?>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-3 form-control-label">
                                        <label for="logo">Logo</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-3">
                                        <div class="form-group">
                                            <?php
                                                if($logo != ''){
                                                    $fileName = FCPATH."uploads/b2b/".$logo;
                                                    if (file_exists($fileName)) {
                                                        $logoimg = '<img src="'.base_url().'uploads/b2b/'.$logo.'" class="img-responsive" id="logo" alt="Logo">';
                                                    }else{
                                                        $logoimg = '<img src="'.base_url().'assets/admin/images/noimage.png" id="logo" alt="Logo">';
                                                    } 
                                                }else{
                                                    $logoimg = '<img src="'.base_url().'assets/admin/images/noimage.png" id="logo" alt="Logo">';
                                                }

                                                echo $logoimg;
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-start_date col-md-2 col-sm-3 form-control-label">
                                        <label for="visitingcard">Visiting Card</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-3">
                                        <?php
                                            if($visitingcard != ''){
                                                $fileName = FCPATH."uploads/b2b/".$visitingcard;
                                                if (file_exists($fileName)) {
                                                    $visiting_img = '<img src="'.base_url().'uploads/b2b/'.$visitingcard.'" class="img-responsive" id="visitingcard" alt="Logo">';
                                                }else{
                                                    $visiting_img = '<img src="'.base_url().'assets/admin/images/noimage.png" id="visitingcard" alt="Logo">';
                                                } 
                                            }else{
                                                $visiting_img = '<img src="'.base_url().'assets/admin/images/noimage.png" id="visitingcard" alt="Logo">';
                                            }
                                            echo $visiting_img;
                                        ?>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-3 form-control-label">
                                        <label for="video">Video</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-3">
                                        <div class="form-group">
                                            <?php
                                                if($video != ''){
                                                    $fileName = FCPATH."uploads/b2b/".$video;
                                                    if (file_exists($fileName)) {
                                                        $video_src = '
                                                            <video controls>
                                                             <source src="'.base_url().'uploads/b2b/'.$video.'" type="video/mp4">
                                                              Your browser does not support the video tag.
                                                            </video>
                                                        ';
                                                    }
                                                }else{
                                                    $video_src = '';
                                                }
                                                echo $video_src;
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <?php }?>                                 
                                <div class="row clearfix">
                                    <div class="col-sm-8 offset-sm-2 text-center">
                                        <input type="hidden" name="id" id="id" value="<?= $id?>">
                                        <input type="hidden" name="uploaded_by" id="uploaded_by" value="<?= $uploaded_by?>">
                                        <input type="hidden" name="client" value="web">
                                        <input type="hidden" name="ip" value="<?= $this->input->ip_address();?>">
                                        <input type="hidden" name="memberid" value="<?= $this->session->userdata('user_id') ?? 1?>">
                                        <button type="button" id="save" data-form="b2b-form" class="btn btn-raised btn-primary btn-round waves-effect"><?= $strong. '' .$pagetitle ;?> <i class="zmdi zmdi-save" style="display: none"> </i> </button>
                                        <button type="reset" class="btn btn-raised btn-danger btn-round waves-effect">Clear </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>