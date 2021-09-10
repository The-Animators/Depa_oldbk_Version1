<script src="<?= base_url();?>assets/web/js/jssor.slider-28.0.0.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="<?= base_url();?>assets/web/css/jssor.css">
     <style>
        th{
            border-left: 1px solid #cecece;
            border-right: 1px solid #cecece;
        }
        video {
          width: 100%;
          height: auto;
        }
    </style>
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
<?php $this->load->view('web/includes/breadcrumb1');?>
<input type="hidden" id="id" value="<?= $id;?>">

<!-- Inner Pages Main Section -->
<section class="ulockd-fservice">
    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="panel-title bold" id="firmname">Firm Name</h2>
                </div>
                <div class="panel-body">
                    <div class="row" id="images_videoa">
                    </div>
                    <div class="row">
                        <div class="col-md-12" id="details">
                        </div>
                    </div>
                    <div class="row" id="slide_div">
                        <div class="col-md-12">
                                <div id="jssor_1" class="jssordiv1">
                                <!-- Loading Screen -->
                                <div data-u="loading" class="jssorl-009-spin jssorloading">
                                    <img class="jssor_spin_ing" src="<?= base_url();?>assets/img/spin.svg" />
                                </div>
                                <div data-u="slides" class="jssor_slides" id="slides">
                                    
                                </div>
                                <!-- Thumbnail Navigator -->
                                <div data-u="thumbnavigator" class="jssort101 jssor_navigator"  data-autocenter="2" data-scale-left="0.75">
                                    <div data-u="slides">
                                        <div data-u="prototype" class="p" style="width:99px;height:66px;">
                                            <div data-u="thumbnailtemplate" class="t"></div>
                                            <svg viewbox="0 0 16000 16000" class="cv">
                                                <circle class="a" cx="8000" cy="8000" r="3238.1"></circle>
                                                <line class="a" x1="6190.5" y1="8000" x2="9809.5" y2="8000"></line>
                                                <line class="a" x1="8000" y1="9809.5" x2="8000" y2="6190.5"></line>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <!-- Arrow Navigator -->
                                <div data-u="arrowleft" class="jssora093 jssor_arrow_left" data-autocenter="2">
                                    <svg viewbox="0 0 16000 16000" class="jssor_arrow_svg">
                                        <circle class="c" cx="8000" cy="8000" r="5920"></circle>
                                        <polyline class="a" points="7777.8,6080 5857.8,8000 7777.8,9920 "></polyline>
                                        <line class="a" x1="10142.2" y1="8000" x2="5857.8" y2="8000"></line>
                                    </svg>
                                </div>
                                <div data-u="arrowright" class="jssora093 jssor_arrow_right" data-autocenter="2">
                                    <svg viewbox="0 0 16000 16000" class="jssor_arrow_svg">
                                        <circle class="c" cx="8000" cy="8000" r="5920"></circle>
                                        <polyline class="a" points="8222.2,6080 10142.2,8000 8222.2,9920 "></polyline>
                                        <line class="a" x1="5857.8" y1="8000" x2="10142.2" y2="8000"></line>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
