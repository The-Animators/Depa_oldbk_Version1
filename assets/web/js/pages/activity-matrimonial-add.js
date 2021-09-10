var validation = true;
$('#matri-form').submit(function(e){
    var btnid = 'submit_matri';
    var family_id = $("#family_no").val();
    e.preventDefault();

    if(validation==true){

        $.ajax({
            url:base_url+'Api/matrimonial/save',
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
                            window.location = base_url + 'matrimonial/'+family_id;
                        }, 1500);

                    }else if(status === false){
                        $.toaster(message, 'Error', 'danger');
                        return false;
                    }
                } else{
                    $.each(message, function(key, value) {
                        if(value!=''){
                            $.toaster(value, 'Error', 'danger');
                            $("#matri-form input[name="+key+"], #matri-form textarea[name="+key+"]").focus();
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

$("#member_no").change(function(){
    
    //console.log(this.value);
    var id = this.value;

    $.ajax({
            url:base_url+'Api/member/getmatrimony',
            type:"post",
            data:{id:id},
            dataType:'json',
            success: function(response){
                var {data, status, validate, message} = response;
                if (validate === true) {
                    if(status === true){
                        $.toaster(message, 'Success', 'success');

                        var  education = data[0]['membername'];
                        var  occupation = data[0]['occupation'];

                        if (education!="") {
                            $("#education").val(data[0]['education']);
                        }else{
                            $("#education").val("");
                        }

                        if (occupation!="") {
                            $("#occupation").val(data[0]['occupation']);
                        }else{
                            $("#occupation").val("");
                        }

                    }else if(status === false){
                        $("#education").val("");
                        $("#occupation").val("");
                        $.toaster(message, 'Error', 'danger');
                        return false;
                    }
                } else{
                    $("#education").val("");
                    $("#occupation").val("");
                    $.toaster("Something Went Wrong...", 'Error', 'danger');
                }
            }, error: function(){
                $("#education").val("");
                $("#occupation").val("");
            }, complete:function(data){}
        });
    
});