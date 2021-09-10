'use strict';

function validate(){
    var count = 0;
    $.each($("input[name='member_id[]']:checked"), function() {
        count = count + 1;
    });
    if(count == 0){
        $.toaster('Please Select Member', 'Error', 'danger');   
        return false;
    }
    return true;
}

// $('#death-form').submit(function(e){

$(document).on('click',"#submitmerge",function (e) {
    if(validate()){

        $("#merge_members_info").val("");

        var id = '';
        var merge_members_info = '';
        $("#count input:checkbox:checked").map(function(){
            id += $(this).val();
            merge_members_info += 'MID: '+$(this).parent().next('td').text() +'<br>Name: '+$(this).parent().next().next('td').text()+'<br><br>';
        });

        var new_merge_members_info = merge_members_info.substring(0, merge_members_info.length - 8);
        $("#merge_members_info").val(new_merge_members_info);

        var family_id = $("#family_id").val();
        var formElem = $("#split-form");
        var formdata = new FormData(formElem[0]);

        $.ajax({
            url:base_url+'Api/member/mergefamily',
            type:"post",
            data:formdata,
            dataType:'json',
            processData:false,
            contentType:false,
            cache:false,
            async:false,
            beforeSend: function() {
                $("#submitmerge").startLoading();
                // return false;
            },
            success: function(response){
                var {status,validate,message} = response;
                if (validate === true) {
                    if(status === true){
                        $.toaster(message, 'Success', 'success');
                        setTimeout(function(){
                            window.location = base_url + 'family/'+family_id;
                        }, 1000);

                    }else if(status === false){
                        $.toaster(message, 'Error', 'danger');
                        return false;
                    }
                } else{
                    $.each(message, function(key, value) {
                        if(value!=''){
                            $.toaster(value, 'Error', 'danger');
                            $("#death-form input[name="+key+"], #death-form textarea[name="+key+"]").focus();
                            return false;
                        }
                    });
                }
            }, error: function(){
                $("#submitmerge").stopLoading();
            }, complete:function(data){
                $("#submitmerge").stopLoading();
            }
        });
    }
});


$(document).on('click',"#cancel",function (event) {
    var family_id = $("#family_id").val();
     window.location = base_url + 'family/'+family_id;
});