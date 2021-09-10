'use strict';
var validation = true;
$('#b2b-form').submit(function(e){
    var btnid = 'submitb2b';
    e.preventDefault(); 

    var $fileUpload = $("input[name='bimages[]']");
    if (parseInt($fileUpload.get(0).files.length) > 5){
        $.toaster('Max 5 Files Uploaded', 'Error', 'error');
        validation = false;
        return false;
    }

    if(validation==true){

        $.ajax({
            url:base_url+'Api/B2b/save',
            type:"post",
            data:new FormData(this),
            dataType:'json',
            processData:false,
            contentType:false,
            cache:false,
            async:false,
            beforeSend: function() {
                $("#processingDiv").show();
                $("#"+btnid).startLoading();
                // return false;
            },
            success: function(response){
                var {status,validate,message} = response;
                if (validate === true) {
                    if(status === true){
                        $.toaster(message, 'Success', 'success');
                        $("#b2b-form").trigger("reset");
                    }else if(status === false){
                        $.toaster(message, 'Error', 'danger');
                        return false;
                    }
                } else{
                    $.each(message, function(key, value) {
                        if(value!=''){
                            $.toaster(value, 'Error', 'danger');
                            $("#b2b-form input[name="+key+"], #b2b-form textarea[name="+key+"]").focus();
                            return false;
                        }
                    });
                }
                $("#processingDiv").fadeOut(1000);
            }, error: function(){
                $("#processingDiv").fadeOut(1000);
                $("#"+btnid).stopLoading();
            }, complete:function(data){
                $("#processingDiv").fadeOut(1000);
                $("#"+btnid).stopLoading();
            }
        });
    }
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
            $.toaster('video duration Max 30Sec', 'Error', 'danger');
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
