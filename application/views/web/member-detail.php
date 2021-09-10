
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
                    <h2 class="text-uppercase">Member Detail</span></h2>
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
                
                <?php //print_r($result);?>
                
                    <div class="row">

                        <div class="col-md-2">
                        <?php 
                            $image = $result['image'];
                            if($image != ''){
                                $fileName = FCPATH."uploads/members/".$image;
                                if (file_exists($fileName)) {
                                    $img = base_url().'uploads/members/'.$image;
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
                        <div class="col-md-10">
                            <div class="col-md-6 col-xs-12">
                                <div class="row">
                                    <div class="col-md-5 col-xs-5 lbl bold">
                                        First name
                                    </div>
                                    <div class="col-md-7 col-xs-7">
                                        <?= $result['first_name'];?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="row">
                                    <div class="col-md-5 col-xs-5 lbl bold">
                                        Second name
                                    </div>
                                    <div class="col-md-7 col-xs-7">
                                        <?= $result['second_name'];?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="row">
                                    <div class="col-md-5 col-xs-5 lbl bold">
                                        Third name
                                    </div>
                                    <div class="col-md-7 col-xs-7">
                                        <?= $result['third_name'];?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="row">
                                    <div class="col-md-5 col-xs-5 lbl bold">
                                        Surname
                                    </div>
                                    <div class="col-md-7 col-xs-7">
                                        <?= $result['surname']; ?> 
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="row">
                                    <div class="col-md-5 col-xs-5 lbl bold">
                                        Gender
                                    </div>
                                    <div class="col-md-7 col-xs-7">
                                        <?= $result['sex'];?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="row">
                                    <div class="col-md-5 col-xs-5 lbl bold">
                                        Blood Group
                                    </div>
                                    <div class="col-md-7 col-xs-7">
                                        <?= $result['bloodgroup'];?> 
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6 col-xs-12">
                                <div class="row">
                                    <div class="col-md-5 col-xs-5 lbl bold">
                                        Relation
                                    </div>
                                    <div class="col-md-7 col-xs-7">
                                        <?= $result['relation'];?> 
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="row">
                                    <div class="col-md-5 col-xs-5 lbl bold">
                                        Marrital Status
                                    </div>
                                    <div class="col-md-7 col-xs-7">
                                        <?= $result['maritalstatus'];?> 
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-xs-12">
                                <div class="row">
                                    <div class="col-md-5 col-xs-5 lbl bold">
                                        Education
                                    </div>
                                    <div class="col-md-7 col-xs-7">
                                        <?= $result['education'];?> 
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6 col-xs-12">
                                <div class="row">
                                    <div class="col-md-5 col-xs-5 lbl bold">
                                        Occupation
                                    </div>
                                    <div class="col-md-7 col-xs-7">
                                        <?= $result['occupation'];?> 
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6 col-xs-12">
                                <div class="row">
                                    <div class="col-md-5 col-xs-5 lbl bold">
                                        DoB
                                    </div>
                                    <div class="col-md-7 col-xs-7">
                                        <?= $result['dob'];?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-xs-12">
                                <div class="row">
                                    <div class="col-md-5 col-xs-5 lbl bold">
                                        DoM
                                    </div>
                                    <div class="col-md-7 col-xs-7">
                                        <?= $result['dom'];?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-xs-12">
                                <div class="row">
                                    <div class="col-md-5 col-xs-5 lbl bold">
                                        Contact
                                    </div>
                                    <div class="col-md-7 col-xs-7">
                                        <?= $result['contact'];?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-xs-12">
                                <div class="row">
                                    <div class="col-md-5 col-xs-5 lbl bold">
                                        Email
                                    </div>
                                    <div class="col-md-7 col-xs-7">
                                        <?= $result['email'];?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-xs-12">
                                <div class="row">
                                    <div class="col-md-5 col-xs-5 lbl bold">
                                        Member Type
                                    </div>
                                    <div class="col-md-7 col-xs-7">
                                        <?= $result['member_type'];?>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6 col-xs-12"></div>
                            
                        </div>
                        
                        <div class="col-md-offset-2 col-md-10">
                            <?php if($result['maritalstatus']="Married" && $result['sex']="F"){ ?>
                            <hr>
                            <p align="center">Female Marriage Detail</p>
                                <div class="col-md-6 col-xs-12">
                                    <div class="row">
                                        <div class="col-md-5 col-xs-5 lbl bold">
                                            Father / Husband Name
                                        </div>
                                        <div class="col-md-7 col-xs-7">
                                            <?= $result['m_second_name']." ".$result['m_third_name']." ".$result['m_surname'];?> 
                                        </div>
                                    </div>
                                </div>
                            
                                <div class="col-md-6 col-xs-12">
                                    <div class="row">
                                        <div class="col-md-5 col-xs-5 lbl bold">
                                            Village
                                        </div>
                                        <div class="col-md-7 col-xs-7">
                                            <?= $result['m_village'];?> 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <div class="row">
                                        <div class="col-md-5 col-xs-5 lbl bold">
                                            Contact
                                        </div>
                                        <div class="col-md-7 col-xs-7">
                                            <?= $result['m_contact'];?> 
                                        </div>
                                    </div>
                                </div>
                            
                           <?php }?>

                        </div>

                    </div>
            </div>
            
        </div>
<?php } ?>
    </div>
</section>
