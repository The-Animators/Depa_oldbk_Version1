<!-- Home Design Inner Pages -->
<?php 
    if($client == 'web'){
?>
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
<?php
        $this->load->view('web/includes/breadcrumb');
    }
?>

<!-- Inner Pages Main Section -->
<section class="ulockd-fservice" <?= $padding ?? '';?>>
    <div class="<?= $container ?? 'container'; ?>">
        <?php if($client == 'web'){ ?>
            <div class="row">
                <div class="col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 text-center">
                    <div class="ulockd-dtitle hvr-float-shadow">
                        <h2 class="text-uppercase">DEPA MAP</span></h2>
                        <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem labore voluptates consequuntur velit necessitatibus maiores fugiat eaque.</p> -->
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div id="grid" class="masonry-gallery grid-three-item clearfix">

            <?php } 
            // echo FCPATH ;exit;
            $directory = opendir(FCPATH."assets/web/images/map");
            while($file = readdir($directory)){
              if($file !== '.' && $file !== '..'){
                $url = base_url().'assets/web/images/map/'.$file;
                $image = '<img src="'.base_url().'assets/web/images/map/'.$file.'" class="img-responsive img-whp"/>';
               ?>
                <!-- <div class="row">
                    <div class="col-md-12 ulockd-mrgn1210">
                        <div class="ulockd-project-sm-thumb">
                            <?= $image;?>
                        </div>
                    </div>
                </div> -->
                <div class="isotope-item creative corporate">
                    <div class="gallery-thumb">
                        <img class="img-responsive img-whp full-img" src="<?= $url; ?>" alt="">
                        <div class="overlayer">
                          <div class="lbox-caption">
                              <div class="lbox-details">
                                  <ul class="list-inline">
                                      <li>
                                          <a class="popup-img" href="<?= $url; ?>" title=""><span class="flaticon-add-square-button"></span></a>
                                      </li>
                                  </ul>
                              </div>
                          </div>
                      </div>
                    </div>
                </div>

            <?php }  
			}?>

                    </div>
                </div>
            </div>


    </div>
</section>