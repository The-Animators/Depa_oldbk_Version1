
$(document).on("click", "#login" , function(e) {
    var btnid = 'login';
    e.preventDefault();
    $("#toaster").remove();
    var formdata = $(".auth_form :input").serialize();
    // alert(base_url+"Api/login/signin");
    $.ajax({
        type    : "POST",
        url     : base_url+"Api/login/signin",
        data    : formdata,
        dataType: 'json',
        beforeSend: function() {
            $("#"+btnid).startLoading();
        },
        success : function(resData){
            // alert(JSON.stringify(resData));
            var {status,validate,message} = resData;
            if (validate === true) {
                if(status === true){
                    $.toaster(message, 'Success', 'success');
                    $('input[type=text],select').val('');
                    window.setTimeout(function() {
                        window.location.href = base_url+'admin';
                    }, 1500);
                }else if(status == false){
                    $.toaster(message, 'Error', 'danger');
                    return false;
                }
            }
            else{
                $.each(message, function(key, value) {
                    if(value!=''){
                        $.toaster(value, 'Error', 'danger');
                        $("input[name="+key+"]").focus();
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
