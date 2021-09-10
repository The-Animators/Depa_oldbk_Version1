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
                                <li><a href="<?= base_url();?>admin/donor/list" class="btn btn-raised btn-primary btn-round waves-effect"> <?= $pagetitle?> List</a>
                                </li>
                            </ul>
                        </div>
                        <?php 
                            $category = $result[0]['category'] ?? '';
                        ?>
                        <div class="body">
                            <form class="form-horizontal" method="post" id="system-form" enctype="multipart/form-data">
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-3">
                                        <label for="donor_title" style="float: left;">Title</label>
                                        <div class="form-group">
                                            <input type="text" id="donor_title" name="donor_title" class="form-control" placeholder="Title" value="<?= $result[0]['donor_title'] ?? '';?>">
                                        </div>

                                        <div class="row clearfix">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <label for="category" style="float: left;">Category</label>
                                                <div class="form-group">
                                                    <select id="category" name="category" class="form-control ms">
                                                        <option value="">Select Category</option>
                                                        <option value="main" <?php if($category == 'main' ){?> selected <?php }?>>Main</option>
                                                        <option value="sports" <?php if($category == 'sports' ){?> selected <?php }?>>Sports</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-3">
                                        <div class="form-group">
                                        <label for="donor_image" style="float: left;">Donor Image</label>
                                            <input type="file" class="dropify" name="donor_image" id="donor_image" data-height="240" data-allowed-file-extensions="png jpg jpeg gif bmp" data-default-file="<?= isset($result[0]['donor_image']) ? base_url(). 'uploads/donors/'.$result[0]['donor_image'] : '';?>">
                                        <p style="color: red; margin-top: 10px;"><b>Upload 1:1 Image Size</b> (Square Image Only)</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row clearfix">
                                    <div class="col-sm-8 offset-sm-2">
                                        <input type="hidden" name="id" id="id" value="<?= $result[0]['id'] ?? 0;?>">
                                        <input type="hidden" name="old_image" id="old_image" value="<?= $result[0]['donor_image'] ?? '';?>">
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
