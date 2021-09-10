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
                    <h2 class="text-uppercase">Maran Member Detail</span></h2>
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
                <?php 

                //print_r($result);

                $array = explode(",",$result['contact']);
                $size = sizeof($array);
                //echo $array[0];

                ?>
                    <div class="row">

                        <div class="col-md-3">
                        <?php 
                            $image = $result['image'];
                            if($image != ''){
                                $fileName = FCPATH."uploads/marannondh/".$image;
                                if (file_exists($fileName)) {
                                    $img = base_url().'uploads/marannondh/'.$image;
                                }else{
                                    $img = base_url().'assets/img/noimage.jpg';
                                } 
                            }else{
                                $img = base_url().'assets/img/noimage.jpg';
                            }
                            echo '<img src="'.$img.'" class="img-responsive" id="photo_name">';
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
                                        View Family:
                                    </div>
                                    <div class="col-md-7 col-xs-7">
                                        <a href="../../family/<?= $result['family_no']; ?>">Show All Family Members</a>
                                    </div>
                                </div>
                            </div>
                            
                            
                                
                            <?php for ($i=0; $i < $size; $i++) { ?>
                            <div class="col-md-6 col-xs-12">
                                <div class="row">
                                    <div class="col-md-5 col-xs-5 lbl bold">
                                        Contact <?php echo $i+1; ?>:
                                    </div>
                                    <div class="col-md-7 col-xs-7">
                                        <?php 
                                            
                                        	echo $array[$i];
                                        	
                                        	if (strpos($array[$i], ' - ') !== false) {
                                        	    
                                        	    $phone = explode(" - ", $array[$i]);

                                        ?> &nbsp;&nbsp;</br>
                                        
                                        <a style="color:blue;" href="tel:+91<?= $phone[1]; ?>"><i class="fa fa-phone"></i> &nbsp; Call</a> &nbsp;&nbsp;
                                        <a style="color:green;" href="https://api.whatsapp.com/send?phone=<?= $phone[1]; ?>"> <i class="fa fa-whatsapp"></i>&nbsp; WhatsApp</a>
                                        
                                        <?php }else{ echo "&nbsp;&nbsp; (No Conatct Available)"; } ?>
                                        
                                    </div>
                                </div>
                            </div>
                        	<?php } ?>
                            
                            <div class="col-md-12 col-xs-12 mt-2">
                                <div class="row">
                                    <div class="col-md-10 col-xs-12">
                                        
                                    <div class="lbl bold">
                                        Description:
                                    </div>
                                    <!--<div class="col-md-10 col-xs-10">-->
                                       <?= $result['description']; ?>
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
