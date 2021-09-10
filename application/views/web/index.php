<div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
    </svg>
</div>
<div class="ulockd-home-slider">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 ulockd-pmz">
                <div id="myCarouselbanner" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner" id="bannerCarosule">
                    </div>
                    <a class="left carousel-control" href="#myCarouselbanner" data-slide="prev">
                      <span class="glyphicon glyphicon-chevron-left"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarouselbanner" data-slide="next">
                      <span class="glyphicon glyphicon-chevron-right"></span>
                      <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="ulockd-team-one">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-8">
                <div class="panel panel-danger">
                  <div class="panel-heading"><a href="<?= base_url();?>news-and-event"><h3 class="panel-title">Events</h3></a></div>
                  <div class="panel-body">
                    <div class="team-thumb">
                        <div id="myCarouselevent" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner" id="eventCarosule">
                            </div>
                            <a class="left carousel-control" href="#myCarouselevent" data-slide="prev">
                              <span class="glyphicon glyphicon-chevron-left"></span>
                              <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#myCarouselevent" data-slide="next">
                              <span class="glyphicon glyphicon-chevron-right"></span>
                              <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>                        
                  </div>
                </div> 
                <div class="panel panel-success">
                  <div class="panel-heading"><a href="<?= base_url();?>gallery"><h3 class="panel-title">Gallery</h3></div></a>
                  <div class="panel-body">
                    <div class="team-thumb">
                        <div id="myCarouselgallery" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner" id="galleryCarosule">
                            </div>
                            <a class="left carousel-control" href="#myCarouselgallery" data-slide="prev">
                              <span class="glyphicon glyphicon-chevron-left"></span>
                              <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#myCarouselgallery" data-slide="next">
                              <span class="glyphicon glyphicon-chevron-right"></span>
                              <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>                        
                  </div>
                </div>                
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="panel panel-default" id="marannondhpanel" >
                    <div class="panel-heading">
                        <h3 class="panel-title">Maran Nondh</h3>
                    </div>
                    <div class="panel-body">
                        <div id="marannondhwrapper" style="z-index: 1100;"> </div>
                    </div>
                </div>
                <div class="panel panel-default" id="saadripanel" >
                    <div class="panel-heading">
                        <h3 class="panel-title">Prarthana</h3>
                    </div>
                    <div class="panel-body">
                        <div id="saadriwrapper" style="z-index: 1100;"> </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Our Donors</h3>
                    </div>
                    <div class="panel-body">
                        <div id="donorwrapper"> </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="panel panel-default" id="birthdaypanel" >
                    <div class="panel-heading">
                        <h3 class="panel-title">Happy Birthday</h3>
                    </div>
                    <div class="panel-body">
                        <div id="birthdaywrapper" style="z-index: 900;"> </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="panel panel-default" id="marriagepanel"  >
                    <div class="panel-heading">
                        <h3 class="panel-title">Marriage Anniversary</h3>
                    </div>
                    <div class="panel-body">
                        <div id="marriagewrapper" style="z-index: 1000;"> </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="panel panel-default" id="puniyatithipanel" >
                    <div class="panel-heading">
                        <h3 class="panel-title">Punyatithi</h3>
                    </div>
                    <div class="panel-body">
                        <div id="puniyatithiwrapper" style="z-index: 1100;"> </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</section>

<div id="myPopup" class="modal fade">
    <div class="modal-dialog modal-sm" id="MyAdd">
        <div class="modal-content">
            <div class="modal-body" id="advertisement">
            </div>
        </div>
    </div>
</div>

<script>
    <?php if( ($this->session->userdata('logintype') == 'normal') && ($this->session->userdata('logged_in'))){?>
    var logged_in = true;
    <?php }else{ ?>
    var logged_in = false;
    <?php } ?>
</script>