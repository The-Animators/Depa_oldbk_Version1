"use strict";
var modaltitle = 'Video Gallery';
var image;
var mainid = $("#mainid").val();

$(document).on("click", "#save" , function(e) {
    $(this).prop('disabled',true);
    var id = $("#id").val();
    e.preventDefault();
    $("#toaster").remove();
    var myForm   = document.getElementById('system-form');
    var formdata = new FormData(myForm);
    var formId   = $(this).data('form');
    $.ajax({
        type    : "POST",
        url     : base_url+"Api/galleryvideo/save",
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
                        $("#id").val(0);
                        $("#"+formId).trigger("reset");
                        setTimeout(function(){ window.location = base_url+'admin/gallery_video/list' }, 1000);
                    }else{
                        setTimeout(function(){ window.location = base_url+'admin/gallery_video/list' }, 1000);
                    }
                }else if(status == false){
                    $.toaster(message, 'Error', 'danger');
                    return false;
                }
                $("#save").prop('disabled',false);
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
            $("#save").prop('disabled',false);
        }
   });
   return false;  //stop the actual form post !important!
});