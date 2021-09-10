<style type="text/css">
.card .header {
    padding: 20px 0 20px 0;
}
</style>
<section class="content">
    <div class="body_scroll">
        <?php $this->load->view('admin/includes/breadcrumb');?>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Add</strong> <?= $pagetitle?> </h2>
                            <ul class="header-dropdown">
                                <li><a href="<?= base_url();?>admin/blog/list" class="btn btn-raised btn-primary btn-round waves-effect"> <?= $pagetitle?> List</a>
                                </li>
                            </ul>
                        </div>
                        
                        <div class="body" id="form_loader">
                           <?php 
                            $status = $result[0]['status'] ?? 0;
                           ?>
                            <form class="form-horizontal" method="post" id="system-form">
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-3 form-control-label">
                                        <label for="title">Title</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-3">
                                        <div class="form-group">
                                            <input type="text" id="title" name="title" class="form-control" placeholder="Name" value="<?= $result[0]['title'] ?? '';?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-3 form-control-label">
                                        <label for="files">Image</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-3">
                                        <div class="form-group">
                                            <input type="file" id="images" name="images[]" class="form-control" multiple="">
                                            <small><i>Max 3 Files Can Be Uploaded & Max Total size 10MB</i></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-3 form-control-label">
                                        <label for="title">Description</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-9">
                                        <div class="form-group">
                                            <textarea class="form-control" name="content1" id="content1" placeholder="Content 1"><?= ($result[0]['description'] ?? '');?></textarea>
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
                                    
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-8 offset-sm-2">
                                        <input type="hidden" name="description" id="description" value='<?= $result[0]['description'] ?? '';?>'>
                                        <input type="hidden" name="uploaded_by" value="admin">
                                        <input type="hidden" name="client" value="web">
                                        <input type="hidden" name="ip" value="<?= $this->input->ip_address();?>">
                                        <input type="hidden" name="id" id="id" value="<?= $result[0]['id'] ?? 0;?>">
                                        <input type="hidden" name="memberid" value="<?= $this->session->userdata('user_id');?>">
                                        <button type="button" id="save" data-form="system-form" class="btn btn-raised btn-primary btn-round waves-effect">Save <i class="zmdi zmdi-save" style="display: none"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        
                        <div class="body" id="loading_loader" align="center" style="display: none;">
                            <img src="<?php echo base_url().'assets/admin/images/loader.gif'; ?>" width="50%">
                        </div>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
