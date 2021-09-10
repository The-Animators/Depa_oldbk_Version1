"use strict";
var validation = true;
var image;
$(function () {
    //CKEditor
    CKEDITOR.replace('content1');
    CKEDITOR.config.height = 150;
  
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
    e.preventDefault();
    $("#toaster").remove();
    validation = true;    
    var $fileUpload = $("input[name='images[]']");
    // console.log('file Count:'+$fileUpload.get(0).files.length);
    if (parseInt($fileUpload.get(0).files.length) > 3){
        // console.log('file Count inside 3:'+$fileUpload.get(0).files.length);
        var value = 'Max 3 Images can be Uploaded';
        $.toaster(value, 'Error', 'danger');
        // $.toaster('Max 3 Images can be Uploaded', 'Error', 'danger');
        validation = false;
        $("input[name='images[]']").val('');
        return false;
    }

    var editor1 = CKEDITOR.instances['content1'];
    $("#description").val(editor1.getData());


    var id       = $("#id").val();
    var myForm   = document.getElementById('system-form');
    var formdata = new FormData(myForm); //$("#system-form").serialize();
    var formId   = $(this).data('form');
    var btnid    = 'save';
    
    $('#form_loader').hide();
    $('#loading_loader').show();
    

    if(validation==true){
        $.ajax({
            type    : "POST",
            url     : base_url+"Api/blog",
            data    : formdata,
            processData:false,
            contentType:false,
            dataType: 'json',
            beforeSend: function() {
                $("#"+btnid).startLoading();
            },
            success : function(resData){
                
                $('#form_loader').show();
                $('#loading_loader').hide();
                
                var {status,validate,message} = resData;
                if (validate === true) {
                    if(status === true){
                        $.toaster(message, 'Success', 'success');
                        
                        if(id == 0){ 
                            $("#system-form").trigger('reset'); 
                            $("#description").val(''); 

                            CKEDITOR.instances['content1'].setData('');
                        }
                        
                        setTimeout(function(){
                            window.location.href = base_url+'admin/blog/list';
                        }, 1500);
                        
                    }else if(status == false){
                        $.toaster(message, 'Error', 'danger');
                        return false;
                    }
                } else{
                    $.each(message, function(key, value) {
                        if(value!=''){
                            $.toaster(value, 'Error', 'danger');
                            $("#"+formId+" input[name="+key+"]").focus();
                            return false;
                        }
                    });
                }
            }, error: function(){
                
                $('#form_loader').show();
                $('#loading_loader').hide();
                
                $("#"+btnid).stopLoading();
            }, complete:function(data){
                
                $('#form_loader').show();
                $('#loading_loader').hide();
                
                $("#"+btnid).stopLoading();
            }
        });
    }
   return false;  //stop the actual form post !important!
});


function CKupdate(){
    for ( instance in CKEDITOR.instances ){
        CKEDITOR.instances[instance].updateElement();
    }
    CKEDITOR.instances[instance].setData('');
}   