<style type="text/css">
    .contact-details .contact-place > li{color: #676767!important}
    .map-responsive{
    overflow:hidden;
    padding-left:25%;
    padding-bottom:20.25%;
    position:relative;
    height:250;
}
.map-responsive iframe{
    left:0;
    top:0;
   /* width:50%; */
    position:absolute;
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
<?php $this->load->view('web/includes/breadcrumb');?>

<!-- Inner Pages Main Section -->
<section class="ulockd-contact-page">
    <div class="container">
        <div class="row" >
            <div class="col-lg-8 col-lg-offset-2 text-center">
                <div class="ulockd-cp-title">
                    <h2 class="text-uppercase">CONTACT DETAILS</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
               <!-- <div class="contact-info"> -->
                    <div class="contact-details one" style="margin-bottom:30px;">
                        <ul >
                            <li>
                                <i class="fa fa-map-marker" title="Victoria 8007 Australia Envato HQ 121 King Street, Melbourne"><small>&nbsp;&nbsp;C-202, Butterfly Building, 493, Bhavani &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Shankar Road, Dadar(West), Mumbai – &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;400028.</small></i>
                                <i class="fa fa-envelope" title="shreedepa1@gmail.com"><small><a href="mailto:shreedepa1@gmail.com">shreedepa1@gmail.com</a></small></i><small>
                                <i class="fa fa-user" title="Shree Dhiraj Mavji Chheda">&nbsp;&nbsp;&nbsp;&nbsp;Shree Dhiraj Mavji Chheda</i> <br/> <i class="fa fa-phone" title="9821045961">&nbsp;&nbsp;&nbsp;&nbsp;9821045961</i><br/>
                                <i class="fa fa-user" title="Shree Navin (Jitu) Manilal Savla">&nbsp;&nbsp;&nbsp; Navin (Jitu) Manilal Savla</i><br/><i class="fa fa-phone" title="9322656566">&nbsp;&nbsp;&nbsp;&nbsp;9322656566</i>
                            </small></li>
                            <!-- <li><span class="flaticon-checkbox-pen-outline" title="Written Your Message"> <small>Left Some Word </small></span></li> -->
                        </ul>
                    </div>
              <!--   </div> -->
            </div>
            <div class="col-md-8">
                <div class="ulockd-contact-form">
                    <form id="contact_form" class="contact-form" method="post">
                        <div class="messages"></div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <input id="name" name="name" class="form-control ulockd-form-fg required" placeholder="Your name" type="text">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <input id="email" name="email" class="form-control ulockd-form-fg required email" placeholder="Your email" type="email">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <input id="phone" name="phone" class="form-control ulockd-form-fg required" placeholder="Phone" type="text">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <input id="subject" name="subject" class="form-control ulockd-form-fg required" placeholder="Subject" type="text">
                                    <input id="client" name="client" type="hidden" value="web">
                                    <input id="ip" name="ip" type="hidden" value="<?= $this->input->ip_address()?>">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea id="message" name="message" class="form-control ulockd-form-tb required" rows="12" placeholder="Your massage"></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group ulockd-contact-btn">
                                    <button type="submit" class="btn btn-default ulockd-btn-thm2" data-toggle="modal" data-target=".bs-example-modal-default" id="contact" data-form="contact_form">Submit<i class="fa fa-save" style="display: none"></i></button>
                                </div>
                            </div> 
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid ulockd-padz">
        <div class="row">
            
            <div class="col-md-12">
                <div class="ulockd-google-map">
                    <div class="h300 map-responsive" id="">
                       <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15088.216355216337!2d72.8389121!3d19.0173381!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x23e7897b2642897d!2sButterfly%20C.H.S.!5e0!3m2!1sen!2sin!4v1596876263564!5m2!1sen!2sin"  width="100%" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

                        <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m26!1m12!1m3!1d30173.73939707337!2d72.82572897661099!3d19.032169425223163!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m11!3e6!4m3!3m2!1d19.046983!2d72.83973139999999!4m5!1s0x3be7ceddded80ee7%3A0xf71861e5a0dc9d0b!2sBombay%20Depa%20Mahajan!3m2!1d19.0177573!2d72.8481102!5e0!3m2!1sen!2sin!4v1596609204444!5m2!1sen!2sin" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe> -->
                    </div>
                </div
                
            </div>
        </div>
    </div>
</section>