'use strict';
$(function () {
    $("#start_date").bootstrapMaterialDatePicker({
        format:'MM/DD/Y',
        time: false,
        onSelect: function (selected) {
            var dt = new Date(selected);
            dt.setDate(dt.getDate() + 1);
            $("#end_date").bootstrapMaterialDatePicker("option", "minDate", dt);
        }
    });
    $("#end_date").bootstrapMaterialDatePicker({
        format:'MM/DD/Y',
        time: false,
        onSelect: function (selected) {
            var dt = new Date(selected);
            dt.setDate(dt.getDate() - 1);
            $("#start_date").bootstrapMaterialDatePicker("option", "maxDate", dt);
        }
    });
});

$(document).on("click", "#save" , function(e) {
    e.preventDefault();
    $("#toaster").remove();
    var btnid      = 'save';
    var id         = $("#id").val();
    var myForm     = document.getElementById('system-form');
    var formdata   = new FormData(myForm); 
    var formId    = $(this).data('form');
    
    $.ajax({
        type    : "POST",
        url     : base_url+"Api/job",
        data    : formdata,
        processData:false,
        contentType:false,
        dataType: 'json',
        beforeSend: function() {
            $("#"+btnid).startLoading();
        },
        success : function(resData){
            var {status,validate,message} = resData;
            if (validate === true) {
                if(status === true){
                    $.toaster(message, 'Success', 'success');
                    if(id==0){
                        $('#'+formId).trigger('reset');
                    }
                }else if(status === false){
                    $.toaster(message, 'Error', 'danger');
                    return false;
                }
                
            } else{
                $.each(message, function(key, value) {
                    if(value !== ''){
                        $.toaster(value, 'Error', 'danger');
                        $("#"+formId+" input[name="+key+"]").focus();
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


$("#status").change(function(){
    var select = $(this).val();
    if(select == 2){
            openModal('reject', select, 'job_cancel_reason');
            var set = $("#job_cancel_reason").val();
            if(set){
                $('#cancel_reason').val(set);
            }
            
        }
});


$(document).on('click',"#updateData",function (event) { 
    var can_reason = $('#cancel_reason').val();
    var set = $("#job_cancel_reason").val(can_reason);

    if(set){
        $('.close').click();
    }
    
});