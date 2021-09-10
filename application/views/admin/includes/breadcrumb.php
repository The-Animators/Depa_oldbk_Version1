<div class="block-header">
    <div class="row">
        <div class="col-lg-7 col-md-6 col-sm-12">
            <h2> <?= $pagetitle;?></h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url();?>dashboard"><i class="zmdi zmdi-home"></i> <?= DASHBOARD;?> </a></li>
                <li class="breadcrumb-item active"> <?= $pagetitle;?></li>
            </ul>
            <!-- <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button> -->
        </div>
        <?php 

        if($pagename != 'dashboard' && $pagename != 'check-in'){?>
            <div class="col-lg-5 col-md-6 col-sm-12">                
                <button class="btn btn-primary btn-icon float-right" type="button" id="back"><i class="zmdi zmdi-arrow-left"></i> </button>                                
            </div>
        <?php }?>
    </div>
</div>