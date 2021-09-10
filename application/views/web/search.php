<style type="text/css">
.atozdiv {
        width: 100%;
        overflow: hidden;
        padding: 10px 5px;
        background-color: #11c0b4;
    }
.alphabat h4 {
        color: #0099cb;
        border-bottom: 1px dashed #a2a4a4;
        margin-top: 15px;text-align: left
    }
.thumb-info {
    display: block;
    position: relative;
    text-decoration: none;
    max-width: 100%;
    background-color: #FFF;
    border-radius: 4px;
    overflow: hidden;
    -webkit-backface-visibility: hidden;
    backface-visibility: hidden;
    transform: translate3d(0, 0, 0);
}.mb-4, .my-4 {
    margin-bottom: 1.5rem!important;
}.thumb-info .thumb-info-wrapper {
    -webkit-backface-visibility: hidden;
    backface-visibility: hidden;
    transform: translate3d(0, 0, 0);
    border-radius: 4px;
    margin: 0;
    overflow: hidden;
    display: block;
    position: relative;
}.thumb-info img {
    transition: all 0.3s ease;
    border-radius: 3px;
    position: relative;
    /*width: 100%;*/
    width: 248px !important;
    height: 248px !important;
}.thumb-info .thumb-info-title {
    transition: all 0.3s;
    background: rgba(33, 37, 41, 0.8);
    color: #FFF;
    font-weight: normal;
    left: 0;
    letter-spacing: -.05em;
    position: absolute;
    z-index: 2;
    max-width: 90%;
    font-size: 17px;
    padding: 7px 10px 7px;
    bottom: 13%;
}.thumb-info .thumb-info-inner {
    transition: all 0.3s;
    display: block;
}.thumb-info .thumb-info-type, .thumb-info .thumb-info-action-icon, .thumb-info-social-icons a, .thumbnail .zoom, .img-thumbnail .zoom, .thumb-info-ribbon {
    background-color: #0088CC;
}.thumb-info .thumb-info-type {
    background-color: #CCC;
    border-radius: 2px;
    display: inline-block;
    float: left;
    font-size: 0.6em;
    font-weight: 600;
    letter-spacing: 0;
    margin: 8px -2px -15px 0px;
    padding: 2px 12px;
    text-transform: uppercase;
    z-index: 2;
    line-height: 2.3;
}.thumb-info-caption {
    padding: 10px 0;
}.thumb-info-caption .thumb-info-caption-text, .thumb-info-caption p {
    font-size: 0.9em;
    margin: 0;
    padding: 15px 0;
    display: block;
}.thumb-info-social-icons {
    margin: 0;
    padding: 0;
    display: block;
}.thumb-info-social-icons a {
    background: #CCC;
    border-radius: 25px;
    display: inline-block;
    height: 30px;
    line-height: 30px;
    text-align: center;
    width: 30px;
}.thumb-info .thumb-info-type, .thumb-info .thumb-info-action-icon, .thumb-info-social-icons a, .thumbnail .zoom, .img-thumbnail .zoom, .thumb-info-ribbon {
    background-color: #0088CC;
}.thumb-info-social-icons a i {
    color: #FFF;
    font-size: 0.9em;
    font-weight: normal;
}.thumb-info-social-icons a span {
    display: none;
}

/*
*/

.team-desc {
    padding-bottom: 20px;
    padding-left: 10px;
    padding-right: 10px;
} .team-desc>h3 {
    font-size: 16px;
    line-height: 22px;
    margin-bottom: 0;
}.team-desc>span {
    font-size: 13px;
    color: #888;
    line-height: 18px;
}
/**/
.service-block-three {
    position: relative;
    margin-bottom: 30px;
}.service-block-three .inner-box {
    position: relative;
    padding: 6px 10px;
    /*padding-left: 110px;*/
    border: 1px solid #dddddd;
    -webkit-transition: all 300ms ease;
    -moz-transition: all 300ms ease;
    -ms-transition: all 300ms ease;
    -o-transition: all 300ms ease;
    transition: all 300ms ease;
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
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center">
                <div class="ulockd-cp-title">
                    <h2 class="text-uppercase">Search</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="atozdiv">
                    <!--<form action="<?= base_url();?>search" method="POST">-->
                        
                    <div class="col-md-3" >
                        <div class="keywords">
                            <select class="form-control" name="search_k1" id="search_k1" data-placeholder="Select Search Field">
                                <option value="">Select Search Field</option>
                                <option value="first_name">Name</option>
                                <option value="second_name">Father / Husband Name</option>
                                <option value="third_name">Grand Father Name</option>
                                <option value="surname">Surname</option>
                                <option value="area">Area</option>
                                <option value="sex">Gender</option>
                                <option value="relation">Relation</option>
                                <option value="maritalstatus">Marital Status</option>
                                <option value="occupation">Occupation</option>
                                <option value="education">Education</option>
                                <option value="bloodgroup">Blood Group</option>
                            </select>
                        </div>
                        <div class="keywords">
                            <input class="form-control" type="text" name="search_v1" id="search_v1" placeholder="Search Text">
                        </div>
                    </div>
                    <div class="col-md-3" >
                        <div class="keywords">
                            <select class="form-control" name="search_k2" id="search_k2" data-placeholder="Select Search Field">
                                <option value="">Select Search Field</option>
                                <option value="first_name">Name</option>
                                <option value="second_name">Father / Husband Name</option>
                                <option value="third_name">Grand Father Name</option>
                                <option value="surname">Surname</option>
                                <option value="area">Area</option>
                                <option value="sex">Gender</option>
                                <option value="relation">Relation</option>
                                <option value="maritalstatus">Marital Status</option>
                                <option value="occupation">Occupation</option>
                                <option value="education">Education</option>
                                <option value="bloodgroup">Blood Group</option>
                            </select>
                        </div>
                        <div class="keywords">
                            <input class="form-control" type="text" name="search_v2" id="search_v2" placeholder="Search Text" value="<?= $search_v2 ?? '';?>">
                        </div>
                    </div>
                    <div class="col-md-3" >
                        <div class="keywords">
                            <select class="form-control" name="search_k3" id="search_k3" data-placeholder="Select Search Field">
                                <option value="">Select Search Field</option>
                                <option value="first_name">Name</option>
                                <option value="second_name">Father / Husband Name</option>
                                <option value="third_name">Grand Father Name</option>
                                <option value="surname">Surname</option>
                                <option value="area">Area</option>
                                <option value="sex">Gender</option>
                                <option value="relation">Relation</option>
                                <option value="maritalstatus">Marital Status</option>
                                <option value="occupation">Occupation</option>
                                <option value="education">Education</option>
                                <option value="bloodgroup">Blood Group</option>
                            </select>
                        </div>
                        <div class="keywords">
                            <input class="form-control" type="text" name="search_v3" id="search_v3" placeholder="Search Text" value="<?= $search_v3 ?? '';?>">
                        </div>
                    </div>
                    <div class="col-md-3 pt-3" align="center">
                            <input type="text" name='limit' class="form-control hidden " placeholder="Count Of Records">
                            <input type="text" name='offsets' class="form-control hidden " placeholder="Starting from">
                        <button class="btn btn-dark" type="submit" id="member_search"><i class="fa fa-search"></i>Search Members</button>
                    </div>
                    <!--</form>-->
                    
                </div>
            </div>
        </div>
    </div>
    <div class="container ulockd-padz text-center">
        <div class="row team-list" id="append_data">
            <img src="<?= base_url();?>assets/web/images/preloader.gif">
        </div>
        
    </div>   
</section>