'use strict';

//contact_admin
$(document).on("click", "#contact_admin" , function(e) {
    window.location.replace(base_url+"contact-us");
});

$(document).on("click", "#admin_no_password_form" , function(e) {
    window.location.replace(base_url+"contact-us");
});

$('input[type=radio][name=generate_pin]').change(function() {
    if (this.value == 'generate_pin_yes') {
        $("#no_password_contact_button").hide();
        $("#no_password_generate_button").show();
        $("#generate_verify_div").hide();
    }else {
        $("#no_password_generate_button").hide();
        $("#no_password_contact_button").show();
        $("#generate_verify_div").hide();
    }
});


$(document).on("click", "#no_password_generate_pin" , function(e) {

    // $("#yes_no_pin").hide();
    // $("#no_password_generate_button").hide();
    // $("#no_password_contact_button").hide();
    // $("#generate_verify_div").show();

    var member_id = $("#yes_password_member").val();

    $("#no_password_generate_pin").prop('disabled', true);
    e.preventDefault();
    $("#toaster").remove();

    $.ajax({
        type    : "POST",
        url     : base_url+"Api/member/generatepin",
        data    : { member_id:member_id},
        dataType: 'json',
        success : function(resData){

            var {status, validate, message} = resData;

            if (validate === true) {

                if(status === true){
                    $.toaster('OTP Sent, Please Verify', 'Success', 'success');
                    $("#no_password_generate_pin").prop('disabled', false);
                    
                    $("#yes_no_pin").hide();
                    $("#no_password_generate_button").hide();
                    $("#no_password_contact_button").hide();
                    $("#generate_verify_div").show();

                    //console.log(message);

                }else if(status == false){
                    $.toaster('Failed to send OTP, Try Again', 'Error', 'danger');
                    $("#no_password_generate_pin").prop('disabled', false);
                    console.log(message);
                    return false;
                }
                
            } else{
                $.toaster("Something went wrong...", 'Error', 'danger');
                $("#no_password_generate_pin").prop('disabled', false);
            }
        },error: function(){
            $("#no_password_generate_pin").prop('disabled', false);
            $.toaster("Error", 'Error', 'danger');
        }
    });

});


$(document).on("click", "#no_password_verify_pin" , function(e) {

    $("#no_password_verify_pin").prop('disabled', true);
    e.preventDefault();
    $("#toaster").remove();
    var formid   = $(this).data('form');
    var formdata = $("#"+formid+" :input").serialize();

    $.ajax({
        type    : "POST",
        url     : base_url+"Api/member/verifypin",
        data    : formdata,
        dataType: 'json',
        success : function(resData){

            var {status, validate, message} = resData;

            if (validate === true) {

                if(status === true){
                    $.toaster(message, 'Success', 'success');
                    $("#no_password_verify_pin").prop('disabled', false);
                    $("#pin").val("");

                    var member_id = $("#yes_password_member").val();
                    $('#member_id').val(member_id);
                    $("#no_password_form").hide();
                    $('#create_user').show();

                }else if(status == false){
                    $.toaster(message, 'Failed', 'danger');
                    $("#no_password_verify_pin").prop('disabled', false);
                    return false;
                }
                
            } else{
                $.each(message, function(key, value) {
                    if(value != ''){
                        $.toaster(value, 'Error', 'danger');
                        $("#"+formid+" input[name="+key+"]").focus();
                        $("#no_password_verify_pin").prop('disabled', false);
                        return false;
                    }
                });
            }
        },error: function(){
            $("#no_password_verify_pin").prop('disabled', false);
            $.toaster("Error", 'Error', 'danger');
        }
   });
   return false;  //stop the actual form post !important!
});


$(document).on("click", "#alt_login" , function(e) {
    //$("#alt_login").prop('disabled',true);
    e.preventDefault();
    $("#toaster").remove();
    var formid   = $(this).data('form');
    var formdata = $("#"+formid+" :input").serialize();
    $.ajax({
        type    : "POST",
        url     : base_url+"Api/member/getaltlogin",
        data    : formdata,
        dataType: 'json',
        success : function(resData){
            var {status, validate, message, data} = resData;
            if (validate === true) {
                if(status === true){

                    var phone  = data['contact'];
                    var email  = data['email'];
                    var id     = data['id'];
                    var status = data['status'];

                    console.log(status);

                    if (!status) {

                        $.toaster('Generate & Verify PIN', 'Success', 'success');
                        $("#"+formid).trigger("reset");

                        $("#check_member").hide();
                        $("#no_password_form").show();
                        $("#yes_password_email").text(email);
                        $("#yes_password_phone").text(phone);
                        $("#yes_password_member").val(id);

                    }else{

                        $.toaster('Username & Password Already Exist', 'Success', 'success');

                        $("#check_member").hide();
                        $("#yes_password").show();

                    }

                    //$('#member_id').val(member_id);
                    //$('#create_user').show();

                }else if(status == false){
                    //$("#alt_login").prop('disabled',false);
                    $.toaster(message, 'Error', 'danger');
                    return false;
                }
                
            } else{
                $.each(message, function(key, value) {
                    if(value != ''){
                        $.toaster(value, 'Error', 'danger');
                        $("#"+formid+" input[name="+key+"]").focus();
                        //$("#alt_login").prop('disabled',false);
                        return false;
                    }
                });
            }
        },error: function(){
            //$("#alt_login").prop('disabled',false);
        }
   });
   return false;  //stop the actual form post !important!
});

$(document).on("click", "#create_username" , function(e) {
    $("#create_username").prop('disabled',true);
    e.preventDefault();
    $("#toaster").remove();
    var formid   = $(this).data('form');
    var formdata = $("#"+formid+" :input").serialize();
    $.ajax({
        type    : "POST",
        url     : base_url+"Api/member/create_username",
        data    : formdata,
        dataType: 'json',
        success : function(resData){
          console.log(resData);
            var {status, validate, message} = resData;
            if (validate === true) {
                if(status === true){
                    $.toaster(message, 'Success', 'success');
                    $("#"+formid).trigger("reset");
                    $("#create_username").prop('disabled',false);
                    $('#check_member').show();
                    $('#member_id').val('');
                    $('#create_user').hide();
                }else if(status == false){
                    $("#create_username").prop('disabled',false);
                    $.toaster(message, 'Error', 'danger');
                    return false;
                }
            } else{
                $.each(message, function(key, value) {
                    if(value != ''){
                        $("#create_username").prop('disabled',false);
                        $.toaster(value, 'Error', 'danger');
                        $("#"+formid+" input[name="+key+"]").focus();
                        return false;
                    }
                });
            }
        },error: function(){
            $("#create_username").prop('disabled',false);
        }
   });
   return false;  //stop the actual form post !important!
});