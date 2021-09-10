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
<section class="ulockd-service-details" <?= $padding ?? '';?>>
    <div class="<?= $container ?? 'container'; ?>">
        <?php if($client == 'web'){ ?>
            <div class="row">
                <div class="col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 text-center">
                    <div class="ulockd-dtitle hvr-float-shadow">
                        <h2 class="text-uppercase">FAMILY TREE</span></h2>
                        <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem labore voluptates consequuntur velit necessitatibus maiores fugiat eaque.</p> -->
                    </div>
                </div>
            </div>
        <?php } ?>
        <div class="row"><h3>
            <div class="col-md-6 col-xs-6" align="center">
                 <button id="btnguj"> ગુજરાતી </button>
            </div><div class="col-md-6 col-xs-6" align="center">
                <button id="btneng"> English </button>
            </div></h3>
        </div>
        <br>
        <div id="gujarati">
  <div class="panel-group" id="accordion">
    <div class="panel panel-default chhadva">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapsechhadva">
            છાડવા
            <span class="glyphicon glyphicon-chevron-down pull-right"></span>
          </a>
        </h4>
      </div>
      <div id="collapsechhadva" class="panel-collapse collapse">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12 align-center" >
                    <img id="image1" src="<?= base_url(); ?>assets/web/images/family-tree/chhadva-family-tree.jpg" class="img-responsive">
                </div>
            </div>
        </div>
      </div>
    </div>
    <div class="panel panel-default chheda">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapsechheda">
            છેડા
            <span class="glyphicon glyphicon-chevron-down pull-right"></span>
          </a>
        </h4>
      </div>
      <div id="collapsechheda" class="panel-collapse collapse">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12 align-center" >
                    <img src="<?= base_url(); ?>assets/web/images/family-tree/chheda-family-tree.jpg" class="img-responsive">
                </div>
            </div>
        </div>
      </div>
    </div>
    <div class="panel panel-default furiya">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapsefuriya">
            ફુરિયા
            <span class="glyphicon glyphicon-chevron-down pull-right"></span>
          </a>
        </h4>
      </div>
      <div id="collapsefuriya" class="panel-collapse collapse">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12 align-center" >
                    <img src="<?= base_url(); ?>assets/web/images/family-tree/furiya-family-tree.jpg" class="img-responsive">
                </div>
            </div>
        </div>
      </div>
    </div>
    <div class="panel panel-default gala">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapsegala">
            ગાલા
            <span class="glyphicon glyphicon-chevron-down pull-right"></span>
          </a>
        </h4>
      </div>
      <div id="collapsegala" class="panel-collapse collapse">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12 align-center" >
                    <img src="<?= base_url(); ?>assets/web/images/family-tree/gala-family-tree.jpg" class="img-responsive">
                </div>
            </div>
        </div>
      </div>
    </div>
    <div class="panel panel-default maroo">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapsemaroo">
            મારુ
            <span class="glyphicon glyphicon-chevron-down pull-right"></span>
          </a>
        </h4>
      </div>
      <div id="collapsemaroo" class="panel-collapse collapse">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12 align-center" >
                    <img src="<?= base_url(); ?>assets/web/images/family-tree/maroo-family-tree-1.jpg" class="img-responsive">
                </div>
                <div class="col-md-12 align-center" >
                    <img src="<?= base_url(); ?>assets/web/images/family-tree/maroo-family-tree-2.jpg" class="img-responsive">
                </div>
                <div class="col-md-12 align-center" >
                    <img src="<?= base_url(); ?>assets/web/images/family-tree/maroo-family-tree-3.jpg" class="img-responsive">
                </div>
                <div class="col-md-12 align-center" >
                    <img src="<?= base_url(); ?>assets/web/images/family-tree/maroo-family-tree-4.jpg" class="img-responsive">
                </div>
            </div>
        </div>
      </div>
    </div>
    <div class="panel panel-default rambhia">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapserambhia">
            રાંભિયા
            <span class="glyphicon glyphicon-chevron-down pull-right"></span>
          </a>
        </h4>
      </div>
      <div id="collapserambhia" class="panel-collapse collapse">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12 align-center" >
                    <img src="<?= base_url(); ?>assets/web/images/family-tree/rambhiya-family-tree.jpg" class="img-responsive">
                </div>
            </div>
        </div>
      </div>
    </div>
    <div class="panel panel-default savla">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapsesavla">
            સાવલા
            <span class="glyphicon glyphicon-chevron-down pull-right"></span>
          </a>
        </h4>
      </div>
      <div id="collapsesavla" class="panel-collapse collapse">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12 align-center" >
                    <img src="<?= base_url(); ?>assets/web/images/family-tree/savla-family-tree-1.jpg" class="img-responsive">
                </div>
                <div class="col-md-12 align-center" >
                    <img src="<?= base_url(); ?>assets/web/images/family-tree/savla-family-tree-2.jpg" class="img-responsive">
                </div>
                <div class="col-md-12 align-center" >
                    <img src="<?= base_url(); ?>assets/web/images/family-tree/savla-family-tree-3.jpg" class="img-responsive">
                </div>
                <div class="col-md-12 align-center" >
                    <img src="<?= base_url(); ?>assets/web/images/family-tree/savla-family-tree-4.jpg" class="img-responsive">
                </div>
                <div class="col-md-12 align-center" >
                    <img src="<?= base_url(); ?>assets/web/images/family-tree/savla-family-tree-5.jpg" class="img-responsive">
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
        </div>
        <!-- </div> -->
        <div id="english">
  <div class="panel-group" id="accordion1">
    <div class="panel panel-default chhadva">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion1" href="#collapsechhadvaeng">
            Chhadva
            <span class="glyphicon glyphicon-chevron-down pull-right"></span>
          </a>
        </h4>
      </div>
      <div id="collapsechhadvaeng" class="panel-collapse collapse">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12 align-center" >
                    <img id="image1" src="<?= base_url(); ?>assets/web/images/family-tree/eng/chhadva-family-tree.jpg" class="img-responsive">
                </div>
            </div>
        </div>
      </div>
    </div>
    <div class="panel panel-default chheda">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion1" href="#collapsechhedaeng">
            Chheda
            <span class="glyphicon glyphicon-chevron-down pull-right"></span>
          </a>
        </h4>
      </div>
      <div id="collapsechhedaeng" class="panel-collapse collapse">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12 align-center" >
                    <img src="<?= base_url(); ?>assets/web/images/family-tree/eng/chheda-family-tree.jpg" class="img-responsive">
                </div>
            </div>
        </div>
      </div>
    </div>
    <div class="panel panel-default furiya">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion1" href="#collapsefuriyaeng">
            Furiya
            <span class="glyphicon glyphicon-chevron-down pull-right"></span>
          </a>
        </h4>
      </div>
      <div id="collapsefuriyaeng" class="panel-collapse collapse">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12 align-center" >
                    <img src="<?= base_url(); ?>assets/web/images/family-tree/eng/furiya-family-tree.jpg" class="img-responsive">
                </div>
            </div>
        </div>
      </div>
    </div>
    <div class="panel panel-default gala">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion1" href="#collapsegalaeng">
            Gala
            <span class="glyphicon glyphicon-chevron-down pull-right"></span>
          </a>
        </h4>
      </div>
      <div id="collapsegalaeng" class="panel-collapse collapse">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12 align-center" >
                    <img src="<?= base_url(); ?>assets/web/images/family-tree/eng/gala-family-tree.jpg" class="img-responsive">
                </div>
            </div>
        </div>
      </div>
    </div>
    <div class="panel panel-default maroo">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion1" href="#collapsemarooeng">
            Maru
            <span class="glyphicon glyphicon-chevron-down pull-right"></span>
          </a>
        </h4>
      </div>
      <div id="collapsemarooeng" class="panel-collapse collapse">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12 align-center" >
                    <img src="<?= base_url(); ?>assets/web/images/family-tree/eng/maroo-family-tree-1.jpg" class="img-responsive">
                </div>
                <div class="col-md-12 align-center" >
                    <img src="<?= base_url(); ?>assets/web/images/family-tree/eng/maroo-family-tree-2.jpg" class="img-responsive">
                </div>
                <div class="col-md-12 align-center" >
                    <img src="<?= base_url(); ?>assets/web/images/family-tree/eng/maroo-family-tree-3.jpg" class="img-responsive">
                </div>
                <div class="col-md-12 align-center" >
                    <img src="<?= base_url(); ?>assets/web/images/family-tree/eng/maroo-family-tree-4.jpg" class="img-responsive">
                </div>
            </div>
        </div>
      </div>
    </div>
    <div class="panel panel-default rambhia">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion1" href="#collapserambhiaeng">
            Rambhia
            <span class="glyphicon glyphicon-chevron-down pull-right"></span>
          </a>
        </h4>
      </div>
      <div id="collapserambhiaeng" class="panel-collapse collapse">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12 align-center" >
                    <img src="<?= base_url(); ?>assets/web/images/family-tree/eng/rambhiya-family-tree.jpg" class="img-responsive">
                </div>
            </div>
        </div>
      </div>
    </div>
    <div class="panel panel-default savla">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion1" href="#collapsesavlaeng">
            Savla
            <span class="glyphicon glyphicon-chevron-down pull-right"></span>
          </a>
        </h4>
      </div>
      <div id="collapsesavlaeng" class="panel-collapse collapse">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12 align-center" >
                    <img src="<?= base_url(); ?>assets/web/images/family-tree/eng/savla-family-tree-1.jpg" class="img-responsive">
                </div>
                <div class="col-md-12 align-center" >
                    <img src="<?= base_url(); ?>assets/web/images/family-tree/eng/savla-family-tree-2.jpg" class="img-responsive">
                </div>
                <div class="col-md-12 align-center" >
                    <img src="<?= base_url(); ?>assets/web/images/family-tree/eng/savla-family-tree-3.jpg" class="img-responsive">
                </div>
                <div class="col-md-12 align-center" >
                    <img src="<?= base_url(); ?>assets/web/images/family-tree/eng/savla-family-tree-4.jpg" class="img-responsive">
                </div>
                <div class="col-md-12 align-center" >
                    <img src="<?= base_url(); ?>assets/web/images/family-tree/eng/savla-family-tree-5.jpg" class="img-responsive">
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
        </div>
    </div>
</section>
<!-- Inner Pages Main Section -->
