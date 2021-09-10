"use strict";

var validation = true;
$('#member-form').submit(function(e){
    var btnid = 'submitb2b';
    var member_id = $("#member_id").val();
    e.preventDefault(); 
    if(validation==true){
        $.ajax({
            url:base_url+'Api/member/business',
            type:"post",
            data:new FormData(this),
            dataType:'json',
            processData:false,
            contentType:false,
            cache:false,
            async:false,
            beforeSend: function() {
                $("#"+btnid).startLoading();
                // return false;
            },
            success: function(response){
                var {status,validate,message} = response;
                if (validate === true) {
                    if(status === true){
                        $.toaster(message, 'Success', 'success');
                        setTimeout(function(){
                            window.location = base_url + 'business/'+member_id;
                        }, 1000);

                        //$("#member-form").trigger("reset");
                    }else if(status === false){
                        $.toaster(message, 'Error', 'danger');
                        return false;
                    }
                } else{
                    $.each(message, function(key, value) {
                        if(value!=''){
                            $.toaster(value, 'Error', 'danger');
                            $("#member-form input[name="+key+"], #member-form textarea[name="+key+"]").focus();
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
    }
});

$(document).on('click',"#cancel",function (event) {
    var member_id = $("#member_id").val();
     window.location = base_url + 'business/'+member_id;
});