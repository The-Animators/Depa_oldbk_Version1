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
                            <li class="breadcrumb-item"><a href="<?= base_url();?><?= $br_url;?>"> <?= strtoupper($breadcrumb1);?> </a></li>
                            <li class="breadcrumb-item active text-uppercase" id='breadtitle' aria-current="page text-uppercase"><?= str_replace('-',' ',$breadcrumb);?></li>
                        </ol>
                    </nav>
                </div>
            </div>
            <?php 
                if($addbtn==1 && ($this->session->userdata('logintype') == 'normal') && ($this->session->userdata('logged_in'))){?>
                <div class="col-md-6">
                    <div class="ulockd-icd-layer text-right">
                        <ul class="list-inline ulockd-icd-sub-menu">
                            <li> <a href="<?= $addbtnlink;?>"> Add New <?= $pagetitle;?></a> </li>
                        </ul>
                    </div>
                </div>
            <?php }?>
        </div>
    </div>
</div>