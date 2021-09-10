"use strict";
var validation = true;
var image;
$(function () {
    //CKEditor
    CKEDITOR.replace('content1');
    CKEDITOR.config.height = 150;
  
});


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
    var myForm   = document.getElementById('blog-form');
    var formdata = new FormData(myForm); 
    var formId   = $(this).data('form');
    var btnid    = 'save';
    
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
                var {status,validate,message} = resData;
                if (validate === true) {
                    if(status === true){
                        $.toaster(message, 'Success', 'success');
                            $("#blog-form").trigger('reset'); 
                            $("#description").val(''); 
                            CKEDITOR.instances['content1'].setData('');
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
                $("#"+btnid).stopLoading();
            }, complete:function(data){
                $("#"+btnid).stopLoading();
            }
        });
    }
   return false;  //stop the actual form post !important!
});

