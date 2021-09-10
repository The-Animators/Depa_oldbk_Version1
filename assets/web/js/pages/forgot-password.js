'use strict';
var otp_code = '';

$(document).on("click", "#returnback" , function(e) {
    $('#check_member').show();
    $('#nodetails').hide();
    emptyform();

});

$(document).on("click", "#checkotp" , function(e) {
    $("#checkotp").prop('disabled',true);
    e.preventDefault();
    $("#toaster").remove();
    var code = $("#otp_code").val();
    if(code != ''){
        if(code == otp_code){
            $('#reset_password').show();
            $('#otp').hide();
            $("#checkotp").prop('disabled',false);
            $("#reset_password").focus();
        }else{
            $.toaster('OTP does not Match ['+code+']['+otp_code+']', 'Error', 'danger');
            $("#checkotp").prop('disabled',false);
        }
    }else{
        $.toaster('Please enter OTP', 'Error', 'danger');
        $("#checkotp").prop('disabled',false);
    }
});
$(document).on("click", "#alt_login" , function(e) {
    $("#alt_login").prop('disabled',true);
    e.preventDefault();
    $("#toaster").remove();
    var formid   = $(this).data('form');
    var formdata = $("#"+formid+" :input").serialize();
    $.ajax({
        type    : "POST",
        url     : base_url+"Api/member/getusername",
        data    : formdata,
        dataType: 'json',
        success : function(resData){
            console.log(resData);
            var {status, validate, message, member_id, code,username} = resData;
            if (validate === true) {
                if(status === true){
                    if(message == 'otp'){
                        $.toaster('Enter OTP', 'Success', 'success');
                        $('#otp').show();
                        $('#member_id2').val(member_id);
                        $('#username').html(username);
                        $("#otp_code").focus();
                        otp_code = code ;
                        console.log('otp_code:'+otp_code);
                    }else if(message =='new'){
                        $.toaster('Set your Username and Password', 'Success', 'success');
                        $('#member_id1').val(member_id);
                        $("user_name").focus();
                        $('#create_user').show();
                    }else if(message == 'nodetails'){
                        $('#nodetails').show();
                        $('#username1').html(username);
                    }
                    $("#"+formid).trigger("reset");
                    $("#alt_login").prop('disabled',false);
                    $('#check_member').hide();
                }else if(status == false){
                    $("#alt_login").prop('disabled',false);
                    $.toaster(message, 'Error', 'danger');
                    return false;
                }
                
            } else{
                $.each(message, function(key, value) {
                    if(value != ''){
                        $.toaster(value, 'Error', 'danger');
                        $("#"+formid+" input[name="+key+"]").focus();
                        $("#alt_login").prop('disabled',false);
                        return false;
                    }
                });
            }
        },error: function(){
            $("#alt_login").prop('disabled',false);
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
                    $('#create_user').hide();
                    emptyform();
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

$(document).on("click", "#resetpassword" , function(e) {
    $("#resetpassword").prop('disabled',true);
    e.preventDefault();
    $("#toaster").remove();
    var formid   = $(this).data('form');
    var formdata = $("#"+formid+" :input").serialize();
    $.ajax({
        type    : "POST",
        url     : base_url+"Api/member/resetpassword",
        data    : formdata,
        dataType: 'json',
        success : function(resData){
          console.log(resData);
            var {status, validate, message} = resData;
            if (validate === true) {
                if(status === true){
                    $.toaster(message, 'Success', 'success');
                    $("#"+formid).trigger("reset");
                    $("#resetpassword").prop('disabled',false);
                    $('#check_member').show();
                    $('#reset_password').hide();
                    emptyform();
                }else if(status == false){
                    $("#resetpassword").prop('disabled',false);
                    $.toaster(message, 'Error', 'danger');
                    return false;
                }
            } else{
                $.each(message, function(key, value) {
                    if(value != ''){
                        $("#resetpassword").prop('disabled',false);
                        $.toaster(value, 'Error', 'danger');
                        $("#"+formid+" input[name="+key+"]").focus();
                        return false;
                    }
                });
            }
        },error: function(){
            $("#resetpassword").prop('disabled',false);
        }
   });
   return false;  //stop the actual form post !important!
});

function emptyform(){
    $('#member_id1').val('');
    $('#member_id2').val('');
    $('#username').val('');
    $('#username1').val('');
    $("#first_name").focus();
}
$("#first_name").focus();

