<style>
.overlay{
  position: absolute;
  width: 100%;
  height: 100%;
  z-index: 10;
  background: url(../../assets/spinner.gif) 50% 50% no-repeat #ede9df;
}
</style>
<section class="content">
    <div class="body_scroll">
        <div id="processingDiv" class="overlay" style="display: none;"></div>
        <?php $this->load->view('admin/includes/breadcrumb');?>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Add</strong> <?= $pagetitle?> </h2>
                            <ul class="header-dropdown">
                                <li><a href="<?= base_url();?>admin/gallery/list" class="btn btn-raised btn-primary btn-round waves-effect"> <?= $pagetitle?> List</a>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" method="post" id="system-form" enctype="multipart/form-data">
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-3">
                                        <label for="donor_title" style="float: left;">Title</label>
                                        <div class="form-group">
                                            <input type="text" id="title" name="title" class="form-control" placeholder="Title" value="<?= $result[0]['title'] ?? '';?>">
                                        </div>
                                        
                                        <label for="gdrive_link" style="float: left;">Google Drive Link</label>
                                        <div class="form-group">
                                            <input type="url" id="gdrive_link" name="gdrive_link" class="form-control" placeholder="Google Drive Link" value="<?= $result[0]['gdrive_link'] ?? '';?>">
                                        </div>

                                        <div class="row clearfix">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <label for="donor_title" style="float: left;">Gallery Image</label>
                                                <div class="form-group">
                                                    <input type="file" id="gallery" name="gallery[]" class="form-control" placeholder="Image Gallery" multiple>
                                                    <small><i>Max 20 Files Can Be Uploaded & Max Total size 50MB</i></small>
                                                </div>
                                            </div>
                                        </div>

                                        <?php 
                                        // print_r($gallery);
                                        if(count($gallery) > 0) { ?>
                                            <div class="row clearfix">
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <h3>Gallery Image</h3>
                                                    <input type="hidden" name="mainid" id="mainid" value="<?= $result[0]['id'];?>">
                                                    <div class="checkbox">
                                                        <input id="delete_all" name="delete_all" type="checkbox">
                                                        <label for="delete_all" style="margin-bottom: 10px ">
                                                            Delete All
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="image-uploader">
                                                    <div class="uploaded" id="mydiv">
                                                        <?php 
                                                            foreach($gallery as $row):
                                                                $fileName = FCPATH."uploads/gallery/".$row['image'];
                                                                if(file_exists($fileName)){
                                                                    $img = '<img src="'.base_url().'uploads/gallery/'.$row['image'].'" width="125" alt="'.$result[0]['title'].'">'
                                                            ?>

                                                            <!-- <div class="col-lg-3 col-md-3 col-sm-3"> -->
                                                                <div class="uploaded-image">
                                                                    <?= $img; ?>
                                                                    <span class="delete-image" data-id="<?= $row['id'];?>" data-image="<?= $row['image'];?>">
                                                                        <i class="ti-close delete"></i>
                                                                    </span>
                                                                </div>
                                                            <!-- </div> -->
                                                        <?php }  
                                                        endforeach?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php }?>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-3">
                                        <div class="form-group">
                                        <label for="thumbnail" style="float: left;">Thumbnail Image</label>
                                            <input type="file" class="dropify" name="thumbnail" id="thumbnail" data-height="240" data-allowed-file-extensions="png jpg jpeg gif bmp" data-default-file="<?= isset($result[0]['thumbnail']) ? base_url().'uploads/gallery/'.$result[0]['thumbnail'] : ''?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-sm-8 offset-sm-2">
                                        <input type="hidden" name="id" id="id" value="<?= $result[0]['id'] ?? 0;?>">
                                        <input type="hidden" name="old_thumbnail" id="old_thumbnail" value="<?= $result[0]['thumbnail'] ?? '';?>">
                                        <button type="button" id="save" data-form="system-form" class="btn btn-raised btn-primary btn-round waves-effect">Save </button>
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
