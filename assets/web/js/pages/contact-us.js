
$(document).on("click", "#contact" , function(e) {
    e.preventDefault();
    var btnid = 'contact';
    $("#toaster").remove();
    var FormId    = $(this).data('form');
    var formdata  = $("#"+FormId+" :input").serialize();
    // alert(FormId);
    $.ajax({
        type    : "POST",
        url     : base_url+"Api/contact",
        data    : formdata,
        dataType: 'json',
        beforeSend: function() {
            $("#"+btnid).startLoading();
        },
        success : function(resData){
            var {status,validate,message} = resData;
            if (validate === true) {
                if(status === true){
                    $.toaster(message, 'Success', 'success');
                    $("#"+FormId).trigger("reset");
                }else if(status == false){
                    $.toaster(message, 'Error', 'danger');
                    return false;
                }
            } else{
                $.each(message, function(key, value) {
                    if(value!=''){
                        $.toaster(value, 'Error', 'danger');
                        $("#"+FormId+" input[name="+key+"], #"+FormId+" textarea[name="+key+"]").focus();
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
   
});