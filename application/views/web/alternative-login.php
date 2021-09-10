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

                    <!-- Check Member -->
                    <div class="row" id="check_member">
                        <form id="alt_login_form" class="booking_form_area" name="alt_login_form" method="post" novalidate="novalidate">
                            <div class="col-sm-12">
                                <h4>Search Your details</h4>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input id="first_name" name="first_name" class="form-control form_control required" placeholder="Enter Your First Name" required="required" data-error="First Name is required." type="text">
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
                                <input type="hidden" name="member_id" id="member_id">
                                <input name="form_botcheck" class="form-control" type="hidden" value="">
                                <button type="submit" class="btn btn-lg btn-block ulockd-btn-thm2" id="create_username" data-form='create_login_form'>Create UserName</button>
                            </div>
                        </form>
                    </div>


                    <div class="row" id="yes_password" style="display: none;">
                        <form id="yes_password" class="yes_password_form_area" name="yes_password_form">
                            <div class="col-sm-12">
                                <h4><u>Member Found With Username & Password</u></h4>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <h5>Hello Dear User, Your Username & Password Is Already Exist.<br>So please use that username & password to login.</h5>
                                    <h5>If you are facing any issue regarding login please contact admin via contact page or click below button.</h5>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-lg btn-block ulockd-btn-thm2" id="contact_admin">Please Contact Admin</button>
                            </div>
                        </form>
                    </div>


                    <div class="row" id="no_password_form" style="display: none;">
                        
                        <div class="col-sm-12">
                            <h4><u>Generate & Verify 4 Digit PIN</u></h4>
                            <h5>You need to generate & verify PIN to create <i><b>Username & Password</b></i> <br>after this you can loggin into your account.</h5>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <h5>Your 4 Digit PIN will be send to,</h5>
                                <h5>Email ID: <b><span id="yes_password_email">depa*****@gmail.com</span></b></h5>
                                <h5>Phone: <b><span id="yes_password_phone">96*****123</span></b></h5>
                            </div>
                        </div>

                        <div class="col-sm-12" id="yes_no_pin">
                            <div class="form-group">
                                <label for="generate_pin_yes">
                                    <input type="radio" name="generate_pin" id="generate_pin_yes" value="generate_pin_yes"> &nbsp;&nbsp;Yes, I want to Generate PIN &nbsp;&nbsp;&nbsp;&nbsp;
                                </label>
                                <label for="generate_pin_no" class="ml-2">
                                    <input type="radio" name="generate_pin" id="generate_pin_no" value="generate_pin_no" checked=""> &nbsp;&nbsp;No, The above Emaild ID & Phone is no longer available to me.
                                </label>
                            </div>
                        </div>

                        <div class="form-group" id="no_password_contact_button">
                            <button class="btn btn-lg btn-block ulockd-btn-thm2" id="admin_no_password_form">Please Contact Admin</button>
                        </div>

                        <div class="form-group" id="no_password_generate_button" style="display: none;">
                            <input type="hidden" name="yes_password_member" id="yes_password_member">
                            <button class="btn btn-lg btn-block ulockd-btn-thm2" id="no_password_generate_pin">Generate PIN</button>
                        </div>

                        <div id="generate_verify_div" style="display: none;">
                            
                            <form id="no_password_form" class="no_password_form_area" name="no_password_form">

                                <div class="col-sm-12">
                                    <h4>Please enter your PIN sent to above Email ID & Phone Number</h4>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <input id="pin" name="pin" class="form-control form_control required" placeholder="Enter 4 Digit PIN" required="required" data-error="PIN is required." type="text" minlength="4" maxlength="4">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-lg btn-block ulockd-btn-thm2" id="no_password_verify_pin" data-form='no_password_form'>Verify PIN</button>
                                </div>
                            
                            </form>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</section>