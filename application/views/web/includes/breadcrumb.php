<?php if(isset($addbtn)){
      
}else{
    $addbtn =0;
}
?>
<div class="ulockd-inner-page">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="ulockd-icd-layer">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url();?>"> HOME </a></li>
                            <?php if(isset($br_url)){?>
                            <li class="breadcrumb-item"><a href="<?= base_url();?><?= $br_url;?>"> <?= strtoupper($breadcrumb1);?> </a></li>
                            <?php } ?>
                            <li class="breadcrumb-item active text-uppercase" aria-current="page"><?= $breadcrumb;?></li>
                        </ol>
                    </nav>
                    <!-- <ul class="list-inline ulockd-icd-sub-menu">
                        <li><a href="<?= base_url();?>"> HOME </a></li>
                        <li><a href="javascript:void(0)"> > </a></li>
                        <li><a href="javascript:void(0)" class="text-uppercase"> <?= $breadcrumb;?> </a> </li>
                    </ul> -->
                </div>
            </div>
            <?php 
                if(($this->session->userdata('logintype') == 'normal') && ($this->session->userdata('logged_in'))){

                    ?>
                <div class="col-md-6">
                    <div class="ulockd-icd-layer text-right">
                        <ul class="list-inline ulockd-icd-sub-menu">
                            <?php if($addbtn==1) { ?> <li> <a href="<?= $addbtnlink;?>"> Add New <?= $pagetitle;?></a> </li> <? } ?>
                            <!--<li> <a href="<?= base_url();?>search"> Search Member Profile</a> </li>-->
                            <button class="btn btn-dark" type="button" id=""><a href="<?= base_url();?>search"><i class="fa fa-search"></i>Members Profile Search</a></button>
                        </ul>
                    </div>
                </div>
            <?php }?>
        </div>
    </div>
</div>