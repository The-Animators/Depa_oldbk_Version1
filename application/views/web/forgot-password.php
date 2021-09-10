<!-- Home Design Inner Pages -->
<div class="ulockd-inner-home">
    <div class="container text-center">
        <div class="row">
            <div class="ulockd-inner-conraimer-details">
                <div class="col-md-12">
                    <h1 class="text-uppercase"></h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Our About -->
<section class="ulockd-about">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6 col-md-offset-3">
                <div class="booking_form_style1 text-center">
                    <div class="col-sm-12">
                        <h3><?= $pagetitle; ?></h3>
                    </div>
                    <!-- Booking Form Sart-->
                    <div class="row" id="check_member">
                        <form id="alt_login_form" class="booking_form_area" name="alt_login_form" method="post" novalidate="novalidate">
                            <div class="col-sm-12">
                                <h4>Search Your details</h4>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input id="first_name" name="first_name" class="form-control form_control required" placeholder="Enter Your First Name" required="required" data-error="First Name is required." type="text" autofocus>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input id="second_name" name="second_name" class="form-control form_control required" placeholder="Enter Your Second Name" required="required" data-error="Second Name is required." type="text">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                      <?php 
                                       $js = 'id="surname_id" class="form-control form_control" data-error="Surname is required."  required="required"'; 
                                        echo form_dropdown('surname_id', $surname, '' ,$js);
                                    ?>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input type="date" placeholder="Date Of Birth" onfocus="(this.type='date')" id="dob" name="dob" class="form-control form_control" data-error="Date of Birth is required." required="required">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input name="form_botcheck" class="form-control" type="hidden" value="">
                                <button type="submit" class="btn btn-lg btn-block ulockd-btn-thm2" id="alt_login"  data-form='alt_login_form'>Check Member</button>
                            </div>
                        </form>
                    </div>
                    <div class="row" id="create_user" style="display: none;">
                        <form id="create_login_form" class="booking_form_area" name="create_login_form" method="post" novalidate="novalidate">
                            <div class="col-sm-12">
                                <h3>You have not created your Username</h3>
                                <h4>Set your Username and Password</h4>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input id="user_name" name="user_name" class="form-control form_control required" placeholder="Enter Your User Name" required="required" data-error="User Name is required." type="text">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                      <input type="password" id="newpassword" name="newpassword" class="form-control form_control" placeholder="Password" required="required" data-error="Password is required." type="text">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input type="password" id="repassword" name="repassword" class="form-control form_control" placeholder="Confirm Password" required="required" data-error="Confirm Password is required." type="text">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="member_id" id="member_id1" value="">
                                <input name="form_botcheck" class="form-control" type="hidden" value="">
                                <button type="submit" class="btn btn-lg btn-block ulockd-btn-thm2" id="create_username" data-form='create_login_form'>Create UserName</button>
                            </div>
                        </form>
                    </div>
                    <div class="row" id="otp" style="display: none;">
                        <form id="otp_form" class="booking_form_area" name="otp_form" method="post" novalidate="novalidate">
                            <div class="col-sm-12">
                                <h3>Enter OTP to reset your Password</h3>
                                <h5>(OTP Sent via SMS / Email)</h5>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input id="otp_code" name="otp_code" class="form-control form_control required" placeholder="Enter OTP" required="required" data-error="OTP is required." type="text">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input name="form_botcheck" class="form-control" type="hidden" value="">
                                <button type="submit" class="btn btn-lg btn-block ulockd-btn-thm2" id="checkotp" data-form='otp_form'>Continue</button>
                            </div>
                        </form>
                    </div>
                    <div class="row" id="nodetails" style="display: none;">
                        <form id="otp_form" class="booking_form_area" name="otp_form" method="post" novalidate="novalidate">
                            <div class="col-sm-12">
                                <h3>No Contact details registered</h3>
                                <h4>Your Username is <b><span id='username1'></span></b></h4>
                                <h5>Please contact Admin for assistance.</h5>
                            </div>
                            <div class="form-group">
                                <input name="form_botcheck" class="form-control" type="hidden" value="">
                                <button type="submit" class="btn btn-lg btn-block ulockd-btn-thm2" id="returnback" data-form='otp_form'>Continue</button>
                            </div>
                        </form>
                    </div>
                    <div class="row" id="reset_password" style="display: none;">
                        <form id="reset_password_form" class="booking_form_area" name="reset_password_form" method="post" novalidate="novalidate">
                            <div class="col-sm-12">
                                <h4>Reset your Password</h4>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                      <input type="password" id="reset_password" name="reset_password" class="form-control form_control" placeholder="Password" required="required" data-error="Password is required." type="text">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input type="password" id="reset_repassword" name="reset_repassword" class="form-control form_control" placeholder="Confirm Password" required="required" data-error="Confirm Password is required." type="text">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="member_id" id="member_id2" value="">
                                <input name="form_botcheck" class="form-control" type="hidden" value="">
                                <button type="submit" class="btn btn-lg btn-block ulockd-btn-thm2" id="resetpassword" data-form='reset_password_form'>Reset Password</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>