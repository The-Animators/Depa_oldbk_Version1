$("#submitButton").on("click", function(event) {
    $('#submitButton').prop('disabled',true);
    event.preventDefault();
    $("#toaster").remove();
    $.ajax({
        url:base_url+'Api/changepassword/changepwd',
        type: 'post',
        data: $("#general").serialize(),
        dataType:'json',    
        success : function(resData){
            // alert(resData);
            var {status,validate,message} = resData;
            if (validate === true) {
                if(status === true){
                    $.toaster(message, 'Success', 'success');
                    $('#submitButton').prop('disabled',false);
                }else if(status == false){
                    $('#submitButton').prop('disabled',false);
                    $.toaster(message, 'Error', 'danger');
                    return false;
                }
            } else{
                $.each(message, function(key, value) {
                    if(value!=''){                       
                        $.toaster(value, 'Error', 'danger');
                        $("input[name="+key+"]").focus();
                        $('#submitButton').prop('disabled',false);
                        return false;
                    }
                });
            }
        },
        error: function (xhr, ajaxOptions, thrownError) {
            $('#submitButton').prop('disabled',false);
            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }        
    });
});