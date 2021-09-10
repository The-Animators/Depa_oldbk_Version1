$(function() {
    "use strict";
    $('.datepicker').bootstrapMaterialDatePicker({
        format: 'DD MMMM YYYY',
        clearButton: true,
        weekStart: 1,
        time: false
    });
    var drEvent = $('.dropify').dropify({
        messages: {
            'default': 'Drag and drop a Donor Main Image here or click',
            'replace': 'Drag and drop or click to replace',
            'remove':  'Remove',
            'error':   'Ooops, something wrong happended.'
        },
        error: {
            'fileSize': 'The file size is too big ({{ value }} max).',
            'minWidth': 'The image width is too small ({{ value }}px min).',
            'maxWidth': 'The image width is too big ({{ value }}px max).',
            'minHeight': 'The image height is too small ({{ value }}px min).',
            'maxHeight': 'The image height is too big ({{ value }}px max).',
            'imageFormat': 'The image format is not allowed ({{ value }} only).'
        }
    });

});


$(document).on("click", "#save" , function(e) {
    $(this).prop('disabled',true);
    var id = $("#id").val();
    e.preventDefault();
    $("#toaster").remove();
    var myForm   = document.getElementById('system-form');
    var formdata = new FormData(myForm); //$("#system-form").serialize();
    var formId   = $(this).data('form');
    // var formdata = $("#system-form").serialize();
    // alert(base_url+"Api/login/signin");
    
    $('#form_loader').hide();
    $('#loading_loader').show();
    
    $.ajax({
        type    : "POST",
        url     : base_url+"Api/news/save",
        data    : formdata,
        processData:false,
        contentType:false,
        dataType: 'json',
        success : function(resData){
            
            $('#form_loader').show();
            $('#loading_loader').hide();
                
            var {status, validate, message} = resData;
            if (validate === true) {
                if(status === true){
                    $.toaster(message, 'Success', 'success');
                    if(id == 0){
                        $('.dropify-clear').click();
                        $("#id").val(0);
                        $("#"+formId).trigger("reset");
                    }else{
                        setTimeout(function(){ window.location = base_url+'admin/latest/list' }, 1000);
                    }
                    $("#save").prop('disabled',false);
                }else if(status == false){
                    $.toaster(message, 'Error', 'danger');
                    $("#save").prop('disabled',false);
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
            
            $('#form_loader').show();
                $('#loading_loader').hide();
                
            $("#save").prop('disabled',false);
        }
   });
   return false;  //stop the actual form post !important!
});