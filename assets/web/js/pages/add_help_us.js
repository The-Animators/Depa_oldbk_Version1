var validation = true;
$('#help-form').submit(function(e){
    var btnid = 'submit_help';
    var family_id = $("#family_no").val();
    e.preventDefault();

    var $fileUpload = $("input[name='bimages[]']");
    if (parseInt($fileUpload.get(0).files.length) > 3){
        $.toaster('Max 3 Files Uploaded', 'Error', 'danger');
        validation = false;
        return false;
    }

    // console.log(family_id);
    // return false;

    if(validation==true){

        $.ajax({
            url:base_url+'Api/helpus/save',
            type:"post",
            data:new FormData(this),
            dataType:'json',
            processData:false,
            contentType:false,
            cache:false,
            async:true,
            beforeSend: function() {
                $("#"+btnid).startLoading();
            },
            success: function(response){
                var {status, validate, message} = response;
                if (validate === true) {
                    if(status === true){
                        $.toaster(message, 'Success', 'success');
                        setTimeout(function(){
                            window.location = base_url + 'help_us/'+family_id;
                        }, 1500);

                    }else if(status === false){
                        $.toaster(message, 'Error', 'danger');
                        return false;
                    }
                } else{
                    $.each(message, function(key, value) {
                        if(value!=''){
                            $.toaster(value, 'Error', 'danger');
                            $("#help-form input[name="+key+"], #help-form textarea[name="+key+"]").focus();
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