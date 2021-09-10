/*'use strict';
$(function () {
    $("#start_date").bootstrapMaterialDatePicker({
        format:'DD/MM/Y',
        time: false,
        onSelect: function (selected) {
            var dt = new Date(selected);
            dt.setDate(dt.getDate() + 1);
            $("#end_date").bootstrapMaterialDatePicker("option", "minDate", dt);
        }
    });
    $("#end_date").bootstrapMaterialDatePicker({
        format:'DD/MM/Y',
        time: false,
        onSelect: function (selected) {
            var dt = new Date(selected);
            dt.setDate(dt.getDate() - 1);
            $("#start_date").bootstrapMaterialDatePicker("option", "maxDate", dt);
        }
    });
});*/

$(document).on("change", "#status,#subscription" , function(e) {
    var status         = $('#status').val();
    var id             = $('#id').val();
    var subscription   = $('#subscription').val();
    if(status != '' && subscription != ''){
        $.ajax({
            type    : "POST",
            url     : base_url+"Api/b2b/getsubscription",
            data    : {status,id,subscription},
            dataType: 'json',
            beforeSend: function(){
			    $("#processingDiv").show();
			},
			complete: function(){
			    $("#processingDiv").fadeOut(1000);
			},
            success : function(resData){
                $("#processingDiv").fadeOut(1000);
                console.log(JSON.stringify(resData));
                var {status,validate,data} = resData;
                if (validate === true) {
                    if(status === true){
                        $('#expiry_date').val(data.expirydate);
                    }else if(status === false){
                        return false;
                    }
                } else{
                    $.each(data, function(key, value) {
                        if(value!=''){
                            $.toaster(value, 'Error', 'danger');
                            $("#save").prop('disabled',false);
                            return false;
                        }
                    });
                }
            },error: function(){}
        });
    }
});

$(document).on("click", "#save" , function(e) {
    var id = $("#id").val();
    e.preventDefault();
    $("#toaster").remove();
    var btnid    = 'save';
    var formId   = $(this).data('form');
    var formdata = $("#jobs").serialize();
   // var formData = new FormData(formdata);
    
    // if(id == 0){
    //     var $fileUpload = $("input[name='bimages[]']");
    //     if (parseInt($fileUpload.get(0).files.length) > 5){
    //         $.toaster('Max 5 Files Uploaded', 'Error', 'error');
    //         validation = false;
    //         $("input[name='bimages[]']").val('');
    //         return false;
    //     }
    // }
    
    

    //var form = document.getElementById('b2b-form');
    //var formData = new FormData(document.getElementById("'b2b-form"));
    //var formData = new FormData("#b2b-form");
    
    var form = document.getElementById('jobs');
    var formData = new FormData(form);
    
    console.log(formData);

    $.ajax({
        url:base_url+'Api/Job/update',
        type:"post",
        data:formData,
        dataType:'json',
        processData:false,
        contentType:false,
        cache:false,
        async:false,
        beforeSend: function() {
            $("#"+btnid).startLoading();
            // return false;
        },
        success : function(resData){
            var {status,validate,message} = resData;
            if (validate === true) {
                if(status === true){
                    $.toaster(message, 'Success', 'success');
                    $("#b2b-form").trigger("reset");
                    setTimeout(function(){
                        window.location.href = base_url+'admin/job/list/all';
                    }, 1500);
                }else if(status === false){
                    $.toaster(message, 'Error', 'danger');
                    return false;
                }
                
            } else{
                $.each(message, function(key, value) {
                    if(value != ''){
                        $.toaster(value, 'Error', 'danger');
                        $("#"+formId+" input[name="+key+"]").focus();
                        $("#save").prop('disabled',false);
                        return false;
                    }
                });
            }
        }, error: function(){
            $("#"+btnid).stopLoading();
        }, complete:function(data){
            $("#"+btnid).stopLoading();
        }
   });
   return false;  //stop the actual form post !important!
});


$("input[name=bvideo]").on("change", function(e) {
    var file = this.files[0]; // Get uploaded file
    validateFile(file) // Validate Duration
    // e.target.value = ''; // Clear value to allow new uploads
})

function validateFile(file) {
    var duration=0;
    var video = document.createElement('video');
    video.preload = 'metadata';

    video.onloadedmetadata = function() {

        window.URL.revokeObjectURL(video.src);
        duration = parseFloat(video.duration);

        duration = duration.toFixed(2);
        if (duration > 30) {
            $.toaster('video duration Max 30sec', 'Error', 'danger');
            validation = false;
            $('input[name=bvideo]').val('');
            return;
        }else{
            validation = true;
            return;
        }
    }
    video.src = URL.createObjectURL(file);
}

$("#status").change(function(){
    var select = $(this).val();
    if(select == 2){
            openModal('reject', select, 'B2B_cancel_reason');
            var set = $("#b2b_cancel_reason").val();
            if(set){
                $('#cancel_reason').val(set);
            }
            
        }
});

$(document).on('click',"#updateData",function (event) { 
    var can_reason = $('#cancel_reason').val();
    var set = $("#b2b_cancel_reason").val(can_reason);

    if(set){
        $('.close').click();
    }
    
});