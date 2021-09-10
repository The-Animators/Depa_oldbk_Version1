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
<section class="ulockd-fservice">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 text-center">
                <div class="ulockd-dtitle hvr-float-shadow">
                    <h2 class="text-uppercase">Matrimony</span></h2>
                </div>
            </div>
        </div>

        <div class="row">

            <?php 

            $size  = sizeof($result['matrimonial_list']);
            if($size > 0){
                foreach($result['matrimonial_list'] as $members){

            ?>
            <div class="col-md-4" style="margin-bottom: 30px;">
                <div class="row dbox">
                    <div class="col-md-4">
                        <img src="<?= base_url();?>uploads/members/<?php echo $members['image']; ?>" width="100%" class="img-responsive dpic" />
                    </div>
                    <div class="col-md-8 memberdetail">
                        <p><span><?php echo $members['fullname']; ?></span></p>
                    </div>
                    <div class="col-md-12" style="margin-top: 15px; text-align: right;">
                        <a href="matrimonialdetail/<?php echo $members['member_no']; ?>" class="btn btn-primary btn-sm"> Read More </a>
                    </div>
                </div>
            </div>

            <?php } } ?>



        </div>

        <!--<div class="row ulockd-mrgn1240">
            <div class="col-md-12 text-center">
                <nav aria-label="Page navigation navigation-lg">
                    <ul class="pagination">
                        <li>
                            <a href="#" aria-label="Previous">
                                <span aria-hidden="true">PREV</span>
                            </a>
                        </li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li>
                            <a href="#" aria-label="Next">
                                <span aria-hidden="true">NEXT</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>-->

    </div>
</section>