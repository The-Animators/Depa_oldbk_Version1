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
                                <li><a href="<?= base_url();?>admin/helpus" class="btn btn-raised btn-primary btn-round waves-effect"> <?= $pagetitle?> List</a>
                                </li>
                            </ul>
                        </div>
                        <div class="body">

                            <form class="form-horizontal" method="post" id="system-form" enctype="multipart/form-data">
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-3">

                                        <label for="1" style="float: left;">Member No</label>
                                        <div class="form-group">
                                            <input type="text" id="1" name="1" class="form-control" value="<?= $result[0]['member_no']; ?>" readonly>
                                        </div>

                                        <label for="2" style="float: left;">Title</label>
                                        <div class="form-group">
                                            <input type="text" id="2" name="2" class="form-control" value="<?= $result[0]['title']; ?>" readonly>
                                        </div>

                                        <label for="3" style="float: left;">Contact Person</label>
                                        <div class="form-group">
                                            <input type="text" id="3" name="3" class="form-control" value="<?= $result[0]['contact_person']; ?>"readonly>
                                        </div>

                                        <label for="5" style="float: left;">Contact Number</label>
                                        <div class="form-group">
                                            <input type="text" id="5" name="5" class="form-control" value="<?= $result[0]['contact_number']; ?>"readonly>
                                        </div>

                                        <label for="6" style="float: left;">Help For</label>
                                        <div class="form-group">
                                            <input type="text" id="6" name="6" class="form-control" value="<?= $result[0]['help_for']; ?>"readonly>
                                        </div>

                                        <label for="6" style="float: left;">Details</label>
                                        <div class="form-group">
                                            <textarea class="form-control" rows="10"readonly><?= $result[0]['details']; ?></textarea>
                                        </div>

                                        
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-3">
                                        <div class="form-group">
                                        <label for="thumbnail" style="float: left;">Thumbnail Images</label>
                                        <br><br>

                                        <?php foreach($images as $key => $value){ ?>

                                        <a class="btn btn-sm" href="<?= base_url()."uploads/helpus/".$images[$key]['image']; ?>" target="_blank">View Full Screen</a>
                                        <img src="<?= base_url()."uploads/helpus/".$images[$key]['image']; ?>" style="width: 40% !important;" class="form-control">

                                        <br>

                                    	<?php } ?>

                                        </div>
                                    </div>
                                </div>

                                <?php if (!$show) { ?>

                                <div class="row clearfix">
                                    <div class="col-sm-8 offset-sm-2" align="center">

                                        <input type="hidden" name="id" id="id" value="<?= $result[0]['id']; ?>">
                                        
                                        <button data-id='<?= $result[0]['id']; ?>' type="button" href="javascript:void(0)" class="btn btn-success approve">Approve</button>
                                		<button data-id='<?= $result[0]['id']; ?>' type="button" href="javascript:void(0)" class="btn btn-danger reject">Cancel</button>

                                    </div>
                                </div>

                                <?php } ?>
                                 
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
