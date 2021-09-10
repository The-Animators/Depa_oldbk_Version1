<style type="text/css">
    .atozdiv {
        width: 100%;
        overflow: hidden;
        padding: 10px 5px;
        background-color: #11c0b4;
    }.atoz li {
        display: block;
        float: left;
        margin: 1px;
        text-transform: uppercase;
        color: #000;
    }.atoz li a {
        color: #000;
        display: inline-block;
        padding: 3px 9px;
        position: relative;
        text-decoration: none;
        background: #FFF;
        border: #d1ecf1 solid 1px;
    }
    .alphabat h4 {
        color: #0099cb;
        border-bottom: 1px dashed #a2a4a4;
        margin-top: 15px;text-align: left
    }
    .alphabat li{line-height: 30px;text-align: left}
    .alphabat li:hover{font-weight: bold}
    .memberdetail p{clear: both; text-align: left}
    .memberdetail p span+span{margin-left: 15px}
    .datawrapper{margin-top: 15px;margin-bottom: 15px}
    .filter.active{background: #000;color: #fff;border: #000}
/*     .datawrapper > .col-md-4:nth-child(2) {
      border-left: 1px dashed;
      border-right: 1px dashed;
    }*/
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
<?php $this->load->view('web/includes/breadcrumb');?>

<!-- Inner Pages Main Section -->
<section class="ulockd-contact-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center">
                <div class="ulockd-cp-title">
                    <h2 class="text-uppercase">DIRECTORY</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="atozdiv">
                    <ul class="list-unstyled list-inline atoz" width="100%">
                        <li><a href="javascript:void(0)" data-char='A' class="filter active">A</a></li>
                        <li><a href="javascript:void(0)" data-char='B' class="filter">B</a></li>
                        <li><a href="javascript:void(0)" data-char='C' class="filter">C</a></li>
                        <li><a href="javascript:void(0)" data-char='D' class="filter">D</a></li>
                        <li><a href="javascript:void(0)" data-char='E' class="filter">E</a></li>
                        <li><a href="javascript:void(0)" data-char='F' class="filter">F</a></li>
                        <li><a href="javascript:void(0)" data-char='G' class="filter">G</a></li>
                        <li><a href="javascript:void(0)" data-char='H' class="filter">H</a></li>
                        <li><a href="javascript:void(0)" data-char='I' class="filter">I</a></li>
                        <li><a href="javascript:void(0)" data-char='J' class="filter">J</a></li>
                        <li><a href="javascript:void(0)" data-char='K' class="filter">K</a></li>
                        <li><a href="javascript:void(0)" data-char='L' class="filter">L</a></li>
                        <li><a href="javascript:void(0)" data-char='M' class="filter">M</a></li>
                        <li><a href="javascript:void(0)" data-char='N' class="filter">N</a></li>
                        <li><a href="javascript:void(0)" data-char='O' class="filter">O</a></li>
                        <li><a href="javascript:void(0)" data-char='P' class="filter">P</a></li>
                        <li><a href="javascript:void(0)" data-char='Q' class="filter">Q</a></li>
                        <li><a href="javascript:void(0)" data-char='R' class="filter">R</a></li>
                        <li><a href="javascript:void(0)" data-char='S' class="filter">S</a></li>
                        <li><a href="javascript:void(0)" data-char='T' class="filter">T</a></li>
                        <li><a href="javascript:void(0)" data-char='U' class="filter">U</a></li>
                        <li><a href="javascript:void(0)" data-char='V' class="filter">V</a></li>
                        <li><a href="javascript:void(0)" data-char='W' class="filter">W</a></li>
                        <li><a href="javascript:void(0)" data-char='X' class="filter">X</a></li>
                        <li><a href="javascript:void(0)" data-char='Y' class="filter">Y</a></li>
                        <li><a href="javascript:void(0)" data-char='Z' class="filter">Z</a></li>
                        <li><a href="javascript:void(0)" data-char='All' class="filter">All</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container ulockd-padz text-center" id="append_data">
        <img src="<?= base_url();?>assets/web/images/preloader.gif">
    </div>

    <!-- <div class="container ulockd-padz " id="">
        <div class="row">
            <div class="col-md-4">
                <div class="row">
        
                    <div class="col-md-3"><img src="<?= base_url();?>uploads/members/DPM00001.jpg" class="img-responsive"></div>
                    <div class="col-md-9 memberdetail">
                        <p><span class="pull-left">Name</span> <span class="">SHEIKH MOHAMMED ARSHAD</span></p>
                        <p><span class="pull-left">EMAIL</span> <span class="">dsa</span></p>
                        <p><span class="pull-left">Contact</span> <span class="">dsa</span></p>
                    </div>
                </div>
            </div>

        </div>
    </div> -->
</section>