<style>.bold{font-weight:bold}</style>
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
<style type="text/css">
    .ulockd-dtitle{margin-bottom:20px!important }
    .size10{font-size: 10px}
    label{line-height: 45px;height: 45px}
</style>
<!-- Inner Pages Main Section -->
<section class="ulockd-fservice">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 text-center">
                <div class="ulockd-dtitle hvr-float-shadow">
                    <h2 class="text-uppercase">Prarthana Detail</span></h2>
                </div>
            </div>
        </div>
<?php if(!$result) { ?>
        <div class="row ">
            <div class="col-sm-12 col-md-12 align-center bold">
                No Record Found
            </div>
        </div>
<?php }else{?>

        <div class="row ">
            <div class="col-sm-12 col-md-12">
                
                    <div class="row">

                        <div class="col-md-3">
                        <?php 
                            $image = $result['image'];
                            if($image != ''){
                                $fileName = FCPATH."uploads/saadri/".$image;
                                if (file_exists($fileName)) {
                                    $img = base_url().'uploads/saadri/'.$image;
                                }else{
                                    $img = base_url().'assets/img/noimage.jpg';
                                } 
                            }else{
                                $img = base_url().'assets/img/noimage.jpg';
                            }
                            echo '<a href="'.$img.'" target="_blank"><img src="'.$img.'" class="img-responsive" id="photo_name"></a>';
                            // echo $img;
                        ?>
                        </div>
                        <div class="col-md-9">
                            <div class="col-md-12 col-xs-12">
                                <div class="row">
                                    <div class="col-md-3 col-xs-5 lbl bold">
                                        <h3>Full Name: </h3>
                                    </div>
                                    <div class="col-md-7 col-xs-7">
                                       <h3><?= $result['fullname']; ?></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="row">
                                    <div class="col-md-5 col-xs-5 lbl bold">
                                        Date:
                                    </div>
                                    <div class="col-md-7 col-xs-7">
                                       <?= $result['date']; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="row">
                                    <div class="col-md-5 col-xs-5 lbl bold">
                                        View Family
                                    </div>
                                    <div class="col-md-7 col-xs-7">
                                        <a href="../../family/<?= $result['family_no']; ?>">Show All Family Members</a>
                                    </div>
                                </div>
                            </div>                         
                        </div>
                    </div>
            </div>
            
        </div>
<?php } ?>
    </div>
</section>
