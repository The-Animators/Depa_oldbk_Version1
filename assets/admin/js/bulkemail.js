"use strict";

$('#specific_email').hide();

$(document).on('change', '#send_to', function(){
    var nature  = $('#send_to').find(":selected").val();
    if (nature=='specific') {
    	$('#specific_email').show();
    	$('#emails').attr('required','required');
    }else{
    	$('#specific_email').hide();
    	$('#emails').removeAttr('required');
    }
});


$(document).on("click", "#save" , function(e) {

    var id = $("#id").val();
    e.preventDefault();
    $("#toaster").remove();
    var myForm   = document.getElementById('system-form');
    var formdata = new FormData(myForm);
    var formId   = $(this).data('form');

    $.ajax({
        type    : "POST",
        url     : base_url+"Api/bulkemail/save",
        data    : formdata,
        processData:false,
        contentType:false,
        dataType: 'json',
        success : function(resData){
            var {status,validate,message} = resData;
            if (validate === true) {
                if(status === true){
                    $.toaster(message, 'Success', 'success');
                    if(id == 0){
                        $('#subject').val('');
                        $('#emails').val('');
                        $("#id").val(0);
                        $("#"+formId).trigger("reset");

                        $('#specific_email').hide();
    					$('#emails').removeAttr('required');

                    }else{
                    	$.toaster(message, 'Redirect', 'success');
                    	return false;
                        //setTimeout(function(){ window.location = base_url+'admin/gallery/list' }, 1000);
                    }
                }else if(status == false){
                    $.toaster(message, 'Error', 'danger');
                    return false;
                }
            } else{
                $.each(message, function(key, value) {
                    if(value!=''){
                        $.toaster(value, 'Error', 'danger');
                        $("#"+formId+" input[name="+key+"]").focus();
                        $("#save").prop('disabled',false);
                        return false;
                    }
                });
            }
        },error: function(){
            $.toaster(message, 'Error', 'danger');
            return false;
        }
   });
   return false;  //stop the actual form post !important!
});