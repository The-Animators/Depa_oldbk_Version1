<style type="text/css">
.card .header {
    padding: 20px 0 20px 0;
}
</style>
<?php
   $date = $result[0]['event_date'] ?? '';
   if($date != '' && $date != '0000-00-00'){
        $event_date = DateTime::createFromFormat('Y-m-d',$date)->format('d F Y');
   }else{
        $event_date = '';
   }
?>
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
                                <li><a href="<?= base_url();?>admin/latest/list" class="btn btn-raised btn-primary btn-round waves-effect"> <?= $pagetitle?> List</a>
                                </li>
                            </ul>
                        </div>
                        
                        <div class="body" id="form_loader">
                            <form class="form-horizontal" method="post" id="system-form" enctype="multipart/form-data">
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-3">
                                        <label for="title" style="float: left;">Title</label>
                                        <div class="form-group">
                                            <input type="text" id="title" name="title" class="form-control" placeholder="Title" value="<?= $result[0]['title'] ?? '';?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-3">
                                        <label for="event_date" style="float: left;">Date</label>
                                        <div class="form-group">
                                            <input type="text" id="event_date" name="event_date" class="form-control datepicker" placeholder="Title" value="<?= $event_date ?? '';?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-3">
                                        <label for="description" style="float: left;">Description</label>
                                        <div class="form-group">
                                            <textarea id="description" name="description" rows="8" class="form-control"><?= $result[0]['description'] ?? '';?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-3">
                                        <div class="form-group">
                                        <label for="image" style="float: left;">Event Image</label>
                                            <input type="file" class="dropify" name="image" id="image" data-height="150" data-allowed-file-extensions="png jpg jpeg gif bmp" data-default-file="<?= isset($result[0]['image']) ? base_url(). 'uploads/news/'.$result[0]['image'] : '';?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-3">
                                        <label for="link" style="float: left;">Link</label>
                                        <div class="form-group">
                                            <input type="text" id="link" name="link" class="form-control" placeholder="link" value="<?= $result[0]['link'] ?? '';?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-sm-6 offset-sm-3 text-center">
                                        <input type="hidden" name="id" id="id" value="<?= $result[0]['id'] ?? 0;?>">
                                        <input type="hidden" name="old_image" id="old_image" value="<?= $result[0]['image'] ?? '';?>">
                                        <button type="button" id="save" data-form="system-form" class="btn btn-raised btn-primary btn-round waves-effect">Save </button>
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
