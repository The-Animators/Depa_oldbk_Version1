"use strict";
var modaltitle = 'Gallery';
var image;
var mainid = $("#mainid").val();
$(function() {
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

    /*// var drEvent = $('#dropify-event').dropify();
    drEvent.on('dropify.beforeClear', function(event, element) {
        return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
    });

    drEvent.on('dropify.afterClear', function(event, element) {
        alert('File deleted');
    });
    */
    
});

$(document).on('click','#delete_all', function(){
    if($(this).prop("checked") == true){
         swal({
            title: "Are you sure you want delete All Images?",
            text: "Deleted Message",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            html: true
          })
          .then((willDelete) => {
            // alert(`willDelete ${willDelete}`);
            if (willDelete) {
              deleteall();
            } else {
              swal("No Changes! ",{
                  timer : 2000
              });
            }
        });
    }
})


function deleteall(){
    // alert(base_url+"Api/gallery/deleteall/"+mainid);
    $.ajax({
        type    : "DELETE",
        url     : base_url+"Api/gallery/deleteall/"+mainid,
        dataType: 'json',
        success : function(resData){
            var {status, message} = resData;
            if(status === true){
                // $.toaster(message, 'Success', 'success');
                $("#Modal #id").val(0);
                $("#Modal").modal('hide');
                swal(modaltitle+" Successfully Deleted! ", {
                    icon: "success",
                    timer: 2000,
                });
                $("#mydiv").load(location.href + " #mydiv");
            }else if(status == false){
                // $.toaster(message, 'Error', 'danger');
                swal(message, {
                    icon: "danger",
                    timer: 2000,
                });
                return false;
            }
        },error: function(){}
   });
}

$(document).on('click','.delete-image', function(){
    var imageId = $(this).data('id');
    image       = $(this).data('image');
    showConfirmMessage(imageId,image);
});

function confirmdelete(id){
    // alert(base_url+"Api/gallery/imggallery/"+id+"/"+image);
    $.ajax({
        type    : "POST",
        url     : base_url+"Api/gallery/deletegallery/"+id+"/"+image,
        data    : {id,image},
        dataType: 'json',
        success : function(resData){
            var {status, message} = resData;
            if(status === true){
                // $.toaster(message, 'Success', 'success');
                $("#Modal #id").val(0);
                $("#Modal").modal('hide');
                swal(modaltitle+" Successfully Deleted! ", {
                    icon: "success",
                    timer: 2000,
                });
                $("#mydiv").load(location.href + " #mydiv");
            }else if(status == false){
                // $.toaster(message, 'Error', 'danger');
                swal(message, {
                    icon: "danger",
                    timer: 2000,
                });
                return false;
            }
        },error: function(){}
   });
}


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
    $.ajax({
        type    : "POST",
        url     : base_url+"Api/gallery/save",
        data    : formdata,
        processData:false,
        contentType:false,
        dataType: 'json',
        beforeSend: function(){
		    $("#processingDiv").show();
		},
		complete: function(){
		    $("#processingDiv").fadeOut(1000);
		},
        success : function(resData){
            $("#processingDiv").fadeOut(1000);
            var {status,validate,message} = resData;
            if (validate === true) {
                if(status === true){
                    $.toaster(message, 'Success', 'success');
                    if(id == 0){
                        $('#donor_title').val('');
                        $('.dropify-clear').click();
                        $("#id").val(0);
                        $("#"+formId).trigger("reset");
                    }else{
                        setTimeout(function(){ window.location = base_url+'admin/gallery/list' }, 1000);
                    }
                }else if(status == false){
                    $.toaster(message, 'Error', 'danger');
                    return false;
                }
                $("#save").prop('disabled',false);
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
            $("#save").prop('disabled',false);
        }
   });
   return false;  //stop the actual form post !important!
});