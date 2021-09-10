'use strict';
if(msg == '1'){
    $.toaster('Family Number not found', 'Error', 'danger');
}

$(document).on('click',"#btn_death",function (event) {
    var member_id   = $(this).attr('data-id');
    var dod         = $(this).attr('data-dod');
    $("#member_id").val(member_id);
    $("#dod").val(dod);
	$("#DeathModal").modal('show');
});


$(document).on('click',"#btn_delete",function (event) {
    var member_id   = $(this).attr('data-id');
    var reason      = $(this).attr('data-reason');
    $("#memberid").val(member_id);
    $("#reason").val(reason);
    $("#DeleteModal").modal('show');
});

$('#DeleteModal').on('shown.bs.modal', function (e) {
    $("#reason").focus()
});

$(document).on('click',"#mergebtn",function (event) {
    $("#MergeModal").modal('show');
});

$('#MergeModal').on('shown.bs.modal', function (e) {
    $("#mfamily_no").focus()
});

$('#DeathModal').on('shown.bs.modal', function (e) {
    $("#dod").focus()
});

$('#DeathModal').on('show.bs.modal', function (e) {
    $("#dod").datepicker({
      dateFormat:'yy-mm-dd',
      changeMonth: true,
      changeYear: true,
      defaultDate : new Date()
    });
})

var validation = true;

// $('#death-form').submit(function(e){
$(document).on('click',"#updatedeath",function (e) {

	var family_id = $("#family_id").val();
	var formElem = $("#death-form");
	var formdata = new FormData(formElem[0]);
	console.log('family_id:'+family_id);
    if(validation==true){

        $.ajax({
            url:base_url+'Api/member/death',
            type:"post",
            data:formdata,
            dataType:'json',
            processData:false,
            contentType:false,
            cache:false,
            async:false,
            beforeSend: function() {
                $("#updatedeath").startLoading();
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
                $("#updatedeath").stopLoading();
            }, complete:function(data){
                $("#updatedeath").stopLoading();
            }
        });
    }
});

// $('#death-form').submit(function(e){
$(document).on('click',"#updatedelete",function (e) {
    var family_id = $("#family_id").val();
    var formElem = $("#delete-form");
    var formdata = new FormData(formElem[0]);
    console.log('family_id:'+family_id);
    if(validation==true){
        $.ajax({
            url:base_url+'Api/member/delete',
            type:"post",
            data:formdata,
            dataType:'json',
            processData:false,
            contentType:false,
            cache:false,
            async:false,
            beforeSend: function() {
                $("#updatedelete").startLoading();
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
                $("#updatedelete").stopLoading();
            }, complete:function(data){
                $("#updatedelete").stopLoading();
            }
        });
    }
});

// $('#death-form').submit(function(e){
$(document).on('click',"#updatemerge",function (e) {

    var mfamily_no = $("#mfamily_no").val();
    if(mfamily_no!=''){
        $("#merge-form").submit();   
    }else{
        $.toaster('Please Enter Family No to Merge', 'Error', 'danger');
    }
});
