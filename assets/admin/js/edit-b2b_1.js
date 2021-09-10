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
            success : function(resData){
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
    var formdata = $("#system-form").serialize();
    
    if(id == 0){
        var $fileUpload = $("input[name='bimages[]']");
        if (parseInt($fileUpload.get(0).files.length) > 5){
            $.toaster('Max 5 Files Uploaded', 'Error', 'error');
            validation = false;
            $("input[name='bimages[]']").val('');
            return false;
        }
    }

    var form = document.getElementById('b2b-form');
    var formData = new FormData(form);

    $.ajax({
        url:base_url+'Api/B2b/save',
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