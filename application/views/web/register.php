<div class="ulockd-inner-home">
    <div class="container text-center">
        <div class="row">
            <div class="ulockd-inner-conraimer-details">
                <div class="col-md-12">
                    <h1 class="text-uppercase">Registration Form</h1>
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
                    <!-- Booking Form Sart-->
                    <form id="jobapply_form" class="booking_form_area" name="jobapply_form" method="post" action="#" novalidate="novalidate">
                        <div class="messages"></div>
                        <div class="row">
                            <div class="col-sm-12">
                                <h3>Registration Form</h3>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input type="text" id="form_name" name="form_name" class="form-control form_control" placeholder="First Name" required="required" type="text">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input type="text" id="form_name" name="form_name" class="form-control form_control" placeholder="Last Name" required="required" type="text">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input type="text" id="form_name" name="form_name" class="form-control form_control" placeholder="Address1" required="required" data-error="Name is required." type="text">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input type="text" id="form_name" name="form_name" class="form-control form_control" placeholder="Address2" required="required" data-error="Name is required." type="text">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" id="inputCity" placeholder="City">
                                </div>
                                <div class="form-group col-md-4">
                                    <select id="inputState" class="form-control">
                                        <option selected>Choose State...</option>
                                        <option>Maharashtra</option>
                                        <option>Gujrat</option>
                                        <option>Madhya Pradesh</option>
                                        <option>GOA</option>
                                        <option>Kerala</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <input type="text" class="form-control" id="inputZip" placeholder="Zip">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input id="form_email" name="form_email" class="form-control form_control required email" placeholder="EmailID" required="required" type="email">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input type="password" id="form_name" name="form_name" class="form-control form_control" placeholder="password" required="required" type="text">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group radio-inline">
                                    <label class="radio-inline">
                                        <input type="radio" name="optradio">Male
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="optradio">Female
                                    </label>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input type="text" placeholder="DateOfBirth" onfocus="(this.type='date')" id="date" name="form_name" class="form-control form_control" required="required" type="text">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input class="form-control form_control" placeholder="MobileNumber" pattern="[0-9]{4}-[0-9]{2}-[0-9]{4}" required="required" type="tel">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <select id="blood_group" name="blood_group" class="form-control">
                                        <option value="-1">Select Blood Group</option>
                                        <option value="1">A+</option>
                                        <option value="2">B+</option>
                                        <option value="3">AB+</option>
                                        <option value="4">O+</option>
                                        <option value="5">A-</option>
                                        <option value="6">B-</option>
                                        <option value="7">AB-</option>
                                        <option value="8">O-</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <select id="education" name="education" class="form-control">
                                        <option value="-1">Select Education</option>
                                        <option value="1">SSC</option>
                                        <option value="2">HSC</option>
                                        <option value="3">Graduate</option>
                                        <option value="4">Post Graduate</option>
                                        <option value="5">MBA</option>
                                        <option value="6">Doctorate</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <select id="Occupation" name="Occupation" class="form-control">
                                        <option value="-1">Select Occupation</option>
                                        <option value="1">Service</option>
                                        <option value="2">Retired</option>
                                        <option value="3">Business</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <input name="form_botcheck" class="form-control" type="hidden" value="">
                                <button type="submit" class="btn btn-lg btn-block ulockd-btn-thm2">Register</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>