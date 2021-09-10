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
                                <li><a href="<?= base_url();?>admin/gallery_video/list" class="btn btn-raised btn-primary btn-round waves-effect"> <?= $pagetitle?> List</a>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" method="post" id="system-form" enctype="multipart/form-data">
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-3 offset-md-3">
                                        <label for="donor_title" style="float: left;">Title</label>
                                        <div class="form-group">
                                            <input type="text" id="title" name="title" class="form-control" placeholder="Title" value="<?= $result[0]['title'] ?? '';?>">
                                        </div>

                                        <label for="link" style="float: left;">YouTube Video</label>
                                        <div class="form-group">
                                            <input type="url" id="link" name="link" class="form-control" placeholder="YouTube Link" value="<?= $result[0]['link'] ?? '';?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-12 col-sm-12 offset-sm-5">
                                        <input type="hidden" name="id" id="id" value="<?= $result[0]['id'] ?? 0;?>">
                                        <button type="button" id="save" data-form="system-form" class="btn btn-raised btn-primary btn-round waves-effect">Save Details</button>
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
