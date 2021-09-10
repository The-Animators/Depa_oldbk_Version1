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

<style>
.size50 {
  font-size: 50px;
  cursor: pointer;
  user-select: none;
}


</style>
<link rel="stylesheet" type="text/css" href="https://w.likebtn.com/css/w/widget.css?v=38">
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
<input type="hidden" id="slug" value="<?= $slug;?>">
<!-- Inner Pages Main Section -->
<section class="ulockd-fservice">
    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row"  id="blogdata">
                    </div>
                    <div class="row mt-20" id="slide_div">
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
                    <!--<div class="row ulockd-mrgn1260">-->
                    <!--    <span class="likebtn-wrapper lb-loaded lb-style-white lb-popup-position-top lb-popup-style-light" data-identifier="item_1"><span class="likebtn-button lb-like     lb-voted-now " id="lb-like-0"><span onclick="LikeBtn.vote(1, 0, event);" class="lb-a" data-lb_index="0"><i class="lb-tt lb-share-tt" style="display: none !important; left: -2px;"><i class="lb-tt-lt"></i><i class="lb-tt-rt"></i><i class="lb-tt-m2"></i><i class="lb-tt-m" style="display: block !important">-->
                    <!--            <div class="lb-popup-label lb-popup-label-share">Would you like to share?</div><span class="addthis_toolbox addthis_default_style addthis_20x20_style" addthis:url="http://localhost/personal/projects/animator/deepa_village/blog/detail/dasdasd" style="width: 168px;"><a class="addthis_button_facebook at300b" title="Facebook" href="#"><span class="at-icon-wrapper" style="background-color: rgb(59, 89, 152); line-height: 20px; height: 20px; width: 20px;"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" version="1.1" role="img" aria-labelledby="at-svg-facebook-1" title="Facebook" alt="Facebook" class="at-icon at-icon-facebook" style="width: 20px; height: 20px;">-->
                    <!--                            <title id="at-svg-facebook-1">Facebook</title>-->
                    <!--                            <g>-->
                    <!--                                <path d="M22 5.16c-.406-.054-1.806-.16-3.43-.16-3.4 0-5.733 1.825-5.733 5.17v2.882H9v3.913h3.837V27h4.604V16.965h3.823l.587-3.913h-4.41v-2.5c0-1.123.347-1.903 2.198-1.903H22V5.16z" fill-rule="evenodd"></path>-->
                    <!--                            </g>-->
                    <!--                        </svg></span></a><a class="addthis_button_twitter at300b" title="Twitter" href="#"><span class="at-icon-wrapper" style="background-color: rgb(29, 161, 242); line-height: 20px; height: 20px; width: 20px;"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" version="1.1" role="img" aria-labelledby="at-svg-twitter-2" title="Twitter" alt="Twitter" class="at-icon at-icon-twitter" style="width: 20px; height: 20px;">-->
                    <!--                            <title id="at-svg-twitter-2">Twitter</title>-->
                    <!--                            <g>-->
                    <!--                                <path d="M27.996 10.116c-.81.36-1.68.602-2.592.71a4.526 4.526 0 0 0 1.984-2.496 9.037 9.037 0 0 1-2.866 1.095 4.513 4.513 0 0 0-7.69 4.116 12.81 12.81 0 0 1-9.3-4.715 4.49 4.49 0 0 0-.612 2.27 4.51 4.51 0 0 0 2.008 3.755 4.495 4.495 0 0 1-2.044-.564v.057a4.515 4.515 0 0 0 3.62 4.425 4.52 4.52 0 0 1-2.04.077 4.517 4.517 0 0 0 4.217 3.134 9.055 9.055 0 0 1-5.604 1.93A9.18 9.18 0 0 1 6 23.85a12.773 12.773 0 0 0 6.918 2.027c8.3 0 12.84-6.876 12.84-12.84 0-.195-.005-.39-.014-.583a9.172 9.172 0 0 0 2.252-2.336" fill-rule="evenodd"></path>-->
                    <!--                            </g>-->
                    <!--                        </svg></span></a><a class="addthis_button_print addthis_button_preferred_1 at300b" title="Print" href="#"><span class="at-icon-wrapper" style="background-color: rgb(115, 138, 141); line-height: 20px; height: 20px; width: 20px;"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" version="1.1" role="img" aria-labelledby="at-svg-print-4" title="Print" alt="Print" class="at-icon at-icon-print" style="width: 20px; height: 20px;">-->
                    <!--                            <title id="at-svg-print-4">Print</title>-->
                    <!--                            <g>-->
                    <!--                                <path d="M24.67 10.62h-2.86V7.49H10.82v3.12H7.95c-.5 0-.9.4-.9.9v7.66h3.77v1.31L15 24.66h6.81v-5.44h3.77v-7.7c-.01-.5-.41-.9-.91-.9zM11.88 8.56h8.86v2.06h-8.86V8.56zm10.98 9.18h-1.05v-2.1h-1.06v7.96H16.4c-1.58 0-.82-3.74-.82-3.74s-3.65.89-3.69-.78v-3.43h-1.06v2.06H9.77v-3.58h13.09v3.61zm.75-4.91c-.4 0-.72-.32-.72-.72s.32-.72.72-.72c.4 0 .72.32.72.72s-.32.72-.72.72zm-4.12 2.96h-6.1v1.06h6.1v-1.06zm-6.11 3.15h6.1v-1.06h-6.1v1.06z"></path>-->
                    <!--                            </g>-->
                    <!--                        </svg></span></a><a class="addthis_button_email addthis_button_preferred_2 at300b" target="_blank" title="Email" href="#"><span class="at-icon-wrapper" style="background-color: rgb(132, 132, 132); line-height: 20px; height: 20px; width: 20px;"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" version="1.1" role="img" aria-labelledby="at-svg-email-5" title="Email" alt="Email" class="at-icon at-icon-email" style="width: 20px; height: 20px;">-->
                    <!--                            <title id="at-svg-email-5">Email</title>-->
                    <!--                            <g>-->
                    <!--                                <g fill-rule="evenodd"></g>-->
                    <!--                                <path d="M27 22.757c0 1.24-.988 2.243-2.19 2.243H7.19C5.98 25 5 23.994 5 22.757V13.67c0-.556.39-.773.855-.496l8.78 5.238c.782.467 1.95.467 2.73 0l8.78-5.238c.472-.28.855-.063.855.495v9.087z"></path>-->
                    <!--                                <path d="M27 9.243C27 8.006 26.02 7 24.81 7H7.19C5.988 7 5 8.004 5 9.243v.465c0 .554.385 1.232.857 1.514l9.61 5.733c.267.16.8.16 1.067 0l9.61-5.733c.473-.283.856-.96.856-1.514v-.465z"></path>-->
                    <!--                            </g>-->
                    <!--                        </svg></span></a><a class="addthis_button_pinterest_share addthis_button_preferred_3 at300b" target="_blank" title="Pinterest" href="#"><span class="at-icon-wrapper" style="background-color: rgb(203, 32, 39); line-height: 20px; height: 20px; width: 20px;"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" version="1.1" role="img" aria-labelledby="at-svg-pinterest_share-6" title="Pinterest" alt="Pinterest" class="at-icon at-icon-pinterest_share" style="width: 20px; height: 20px;">-->
                    <!--                            <title id="at-svg-pinterest_share-6">Pinterest</title>-->
                    <!--                            <g>-->
                    <!--                                <path d="M7 13.252c0 1.81.772 4.45 2.895 5.045.074.014.178.04.252.04.49 0 .772-1.27.772-1.63 0-.428-1.174-1.34-1.174-3.123 0-3.705 3.028-6.33 6.947-6.33 3.37 0 5.863 1.782 5.863 5.058 0 2.446-1.054 7.035-4.468 7.035-1.232 0-2.286-.83-2.286-2.018 0-1.742 1.307-3.43 1.307-5.225 0-1.092-.67-1.977-1.916-1.977-1.692 0-2.732 1.77-2.732 3.165 0 .774.104 1.63.476 2.336-.683 2.736-2.08 6.814-2.08 9.633 0 .87.135 1.728.224 2.6l.134.137.207-.07c2.494-3.178 2.405-3.8 3.533-7.96.61 1.077 2.182 1.658 3.43 1.658 5.254 0 7.614-4.77 7.614-9.067C26 7.987 21.755 5 17.094 5 12.017 5 7 8.15 7 13.252z" fill-rule="evenodd"></path>-->
                    <!--                            </g>-->
                    <!--                        </svg></span></a><a class="addthis_button_gmail addthis_button_preferred_4 at300b" target="_blank" title="Gmail" href="#"><span class="at-icon-wrapper" style="background-color: rgb(219, 68, 55); line-height: 20px; height: 20px; width: 20px;"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" version="1.1" role="img" aria-labelledby="at-svg-gmail-7" title="Gmail" alt="Gmail" class="at-icon at-icon-gmail" style="width: 20px; height: 20px;">-->
                    <!--                            <title id="at-svg-gmail-7">Gmail</title>-->
                    <!--                            <g>-->
                    <!--                                <g fill-rule="evenodd"></g>-->
                    <!--                                <path opacity=".3" d="M7.03 8h17.94v17H7.03z"></path>-->
                    <!--                                <path d="M7.225 8h-.41C5.815 8 5 8.84 5 9.876v13.248C5 24.16 5.812 25 6.815 25h.962V12.714L16 19.26l8.223-6.546V25h.962C26.188 25 27 24.16 27 23.124V9.876C27 8.84 26.186 8 25.185 8h-.41L16 15.506 7.225 8z"></path>-->
                    <!--                            </g>-->
                    <!--                        </svg></span></a><a class="addthis_button_linkedin addthis_button_preferred_5 at300b" target="_blank" title="LinkedIn" href="#"><span class="at-icon-wrapper" style="background-color: rgb(0, 119, 181); line-height: 20px; height: 20px; width: 20px;"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" version="1.1" role="img" aria-labelledby="at-svg-linkedin-8" title="LinkedIn" alt="LinkedIn" class="at-icon at-icon-linkedin" style="width: 20px; height: 20px;">-->
                    <!--                            <title id="at-svg-linkedin-8">LinkedIn</title>-->
                    <!--                            <g>-->
                    <!--                                <path d="M26 25.963h-4.185v-6.55c0-1.56-.027-3.57-2.175-3.57-2.18 0-2.51 1.7-2.51 3.46v6.66h-4.182V12.495h4.012v1.84h.058c.558-1.058 1.924-2.174 3.96-2.174 4.24 0 5.022 2.79 5.022 6.417v7.386zM8.23 10.655a2.426 2.426 0 0 1 0-4.855 2.427 2.427 0 0 1 0 4.855zm-2.098 1.84h4.19v13.468h-4.19V12.495z" fill-rule="evenodd"></path>-->
                    <!--                            </g>-->
                    <!--                        </svg></span></a><a class="addthis_button_compact at300m" href="#"><span class="at-icon-wrapper" style="background-color: rgb(255, 101, 80); line-height: 20px; height: 20px; width: 20px;"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" version="1.1" role="img" aria-labelledby="at-svg-addthis-3" title="More" alt="More" class="at-icon at-icon-addthis" style="width: 20px; height: 20px;">-->
                    <!--                            <title id="at-svg-addthis-3">AddThis</title>-->
                    <!--                            <g>-->
                    <!--                                <path d="M18 14V8h-4v6H8v4h6v6h4v-6h6v-4h-6z" fill-rule="evenodd"></path>-->
                    <!--                            </g>-->
                    <!--                        </svg></span></a>-->
                    <!--                <div class="atclear"></div>-->
                    <!--            </span><i class="lb-share-tt-ft" style="min-width: 168px;"><a class="lb-share-tt-tm" href="//likebtn.com" target="_blank" style="display: inline !important; color: rgb(120, 120, 105) !important; padding: 0px !important; margin: 0px !important; text-indent: 0px !important; left: 1px !important; top: 1px !important; border: 0px !important; font-size: 9px !important;">© LikeBtn.com</a><i class="lb-share-tt-cl" onclick="LikeBtn.popupHide(event, 0); return false;">Close X</i></i>-->
                    <!--        </i><i class="lb-tt-lb"></i><i class="lb-tt-rb"></i><i class="lb-tt-a"></i></i><i class="lb-tt lb-tooltip-tt"><i class="lb-tt-lt"></i><i class="lb-tt-rt"></i><i class="lb-tt-m">I like this</i><i class="lb-tt-mu">Unlike</i><i class="lb-tt-m2"></i><i class="lb-tt-lb"></i><i class="lb-tt-rb"></i><i class="lb-tt-a"></i></i><span class="likebtn-icon lb-like-icon">&nbsp;</span><span class="likebtn-label lb-like-label">Like</span></span><span class="lb-count" data-count="2035" style="display: inline-block;">2035</span></span><span class="likebtn-button lb-dislike    lb-voted lb-voted-now" id="lb-dislike-0"><span onclick="LikeBtn.vote(-1, 0, event);" class="lb-a" data-lb_index="0"><i class="lb-tt lb-tooltip-tt"><i class="lb-tt-lt"></i><i class="lb-tt-rt"></i><i class="lb-tt-m">I dislike this</i><i class="lb-tt-mu">Undislike</i><i class="lb-tt-m2"></i><i class="lb-tt-lb"></i><i class="lb-tt-rb"></i><i class="lb-tt-a"></i></i><span class="likebtn-icon lb-dislike-icon">&nbsp;</span></span><span class="lb-count" data-count="539" style="display: inline-block;">539</span></span></span>-->
                    <!--</div>                    -->
                </div>
            </div>
        </div>
    </div>
</section>
