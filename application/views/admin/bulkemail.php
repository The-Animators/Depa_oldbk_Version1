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
                                <li><a href="<?= base_url();?>admin/bulkemail/list" class="btn btn-raised btn-primary btn-round waves-effect"> <?= $pagetitle?> List (Sent Mail)</a>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" method="post" id="system-form" enctype="multipart/form-data">
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-3">
                                        
                                        <div class="form-group">
                                        	<label for="subject" style="float: left;">Subject</label>
                                            <input type="text" id="subject" name="subject" class="form-control" placeholder="Subject" required>
                                        </div>

                                        <div class="form-group">
                                        	<label for="send_to" style="float: left;">Send To,</label>
	                                        <select id="send_to" name="send_to" class="form-control ms" required>
	                                            <option value="" selected>Select Type</option>
	                                            <option value="all">ALL - Family Members</option>
	                                            <option value="specific">SPECIFIC - Family Member(s)</option>
	                                        </select>
	                                    </div>

	                                    <div class="form-group" id="specific_email">
                                        	<label for="emails" style="float: left;">Members Email (Seperated By Comma ",")</label>
	                                        <input type="text" id="emails" name="emails" class="form-control" placeholder="Eg. one@gmail.com, two@gmail.com, three@gmail.com, etc">
	                                    </div>

                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-3">
                                        <div class="form-group">
                                        	<label for="message" style="float: left;">Message</label>
                                        	<textarea type="text" rows="5" id="message" name="message" class="form-control" placeholder="Email Message" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row clearfix">
                                    <div class="col-sm-8 offset-sm-2">
                                        <input type="hidden" name="id" id="id" value="0">
                                        <button type="button" id="save" name="save" data-form="system-form" class="btn btn-raised btn-primary btn-round waves-effect">Send Now </button>
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
