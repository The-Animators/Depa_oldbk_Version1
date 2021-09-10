/*jslint browser: true*/
/*global $, jQuery, alert*/

var base_url = $('meta[name=base_url]').attr("content");

// $('.datepicker').daterangepicker({singleDatePicker : true,showDropdowns: true});

$(document).ready(function(){
    function alignModal(){
        var modalDialog = $(this).find(".modal-dialog");
        /* Applying the top margin on modal dialog to align it vertically center */
        modalDialog.css("margin-top", Math.max(0, ($(window).height() - modalDialog.height()) / 2));
    }
    // Align modal when it is displayed
    $(".modal").on("shown.bs.modal", alignModal);

    // Align modal when user resize the window
    $(window).on("resize", function(){
        $(".modal:visible").each(alignModal);
    });
});

$('#back').click(function() {
    parent.history.back();
    return false;
});

function editmodal(param1 ,param2 ,param3,param4,param5){
    var exurl  = base_url+"modal/popup/"+param1+"/"+param2+"/"+param3+"/"+param4+"/"+param5;
    // console.log(exurl);
    var param2 = param2.replace(/_/g , ' ');
    //alert(param2);
    //alert(param4);
    $("#modal_body").load(exurl);
    $("#myModalLabel").html('<b>'+param2+'</b>');
    $('#myModal').modal('show');
}


function deletemodal(param1,param2,param3){
  var exurl = base_url+'modal/popup/'+param1+'/'+param2+'/'+param3;
    var param2 = param2.replace(/_/g , ' ');
    //alert(param2);
    //alert(param4);
    $("#modal_body").load(exurl);
    $("#myModalLabel").html('<b>'+param2+'</b>');
    $('#myModal').modal('show');
}


function openModal(param1, param2, param3){
    $('#myModal .modal-dialog').addClass('modal-lg');
    var title = param3.replace(/_/g , ' ');
    var exurl = base_url+"modal/openModal/"+param1+"/"+param2;
    console.log(encodeURI(exurl));
    $("#modalBody").load(encodeURI(exurl));
    $("#myModalLabel").html('<b>'+title+'</b>');
    $('#myModal').modal('show');
}

$(document).on("click", "#reset" , function(e) {
    blank(); 
});

function blank(){
    $(".blank").val('');
    $("#id").val(0);
}


$(document).on('click','.closemodal, #openmodal', function(){
    blankform();
});

function blankform(){
    $('#Modal input[type=text]').val('');
    $('#Modal textarea').val('');
    $('#status').val('');
    $('#Modal #id').val('0');
}

function showConfirmMessage(id) {
    swal({
        title: "Are you sure?",
        text: "Deleted Message",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        html: true
      })
      .then((willDelete) => {
        // alert(`willDelete ${willDelete}`);
        if (willDelete) {
          confirmdelete(id);
          /*swal("Success! "+msg, {
            icon: "success",
            timer: 2000,
          });*/
        } else {
          swal("No Changes! ",{
              timer : 2000
          });
        }
    });
}

$(".noonly").on("keypress", function(event) {
    $(this).val($(this).val().replace(/[^\d].+/, ""));
    if ((event.which < 48 || event.which > 57)) {
        $(this).val('');
        $("#toaster").remove();
        $.toaster("Please Enter Number Only", "Error", "danger");
        $(this).focus();
        event.preventDefault();
    }
});

(function( $ ) {
 
   $.fn.startLoading = function() {
        return this.each(function() {
            $(this).attr("disabled", true).addClass("disabled");
            $icon = $(this).find('i');
            $icon.show();
            $icon.data('loader-icons', $icon.attr('class'))
            $icon.removeAttr('class');
            $icon.addClass("fa").addClass("fa-spin").addClass("fa-spinner");
        });
    }
 
    $.fn.stopLoading = function() {
        return this.each(function() {
            $(this).removeAttr("disabled").removeClass("disabled");
            $icon = $(this).find('i');
            $icon.hide();
            $icon.removeAttr('class');
            $icon.attr('class', $icon.data('loader-icons'));
        });
    }
 
}( jQuery ));


$(document).on("click", "#userlogin" , function(e) {
    e.preventDefault();
    var btnid = 'userlogin';
    $("#toaster").remove();
    var FormId    = $(this).data('form');
    var formdata  = $("#"+FormId+" :input").serialize();
    // alert(FormId);
    $.ajax({
        type    : "POST",
        url     : base_url+"Api/login",
        data    : formdata,
        dataType: 'json',
        beforeSend: function() {
            $("#"+btnid).startLoading();
        },
        success : function(resData){
            // console.log(resData);return false;
            var {status,validate,message,user} = resData;
            if (validate === true) {
                if(status === true){
                    $.toaster(message, 'Success', 'success');
                    $("#"+FormId).trigger("reset");
                    window.location.href = base_url+'family/'+user.family_no
                    // location.reload();
                }else if(status == false){
                    $.toaster(message, 'Error', 'danger');
                    return false;
                }
            } else{
                $.each(message, function(key, value) {
                    if(value!=''){
                        $.toaster(value, 'Error', 'danger');
                        $("#"+FormId+" input[name="+key+"]").focus();
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
   
});




$(document).on("click", "#rcdSubmit" , function(e) {
    e.preventDefault();
    var btnid = 'rcdSubmit';
    $("#toaster").remove();
    var FormId    = $(this).data('form');
    var formdata  = $("#"+FormId+" :input").serialize();
    // alert(FormId);
    $.ajax({
        type    : "POST",
        url     : base_url+"Api/Matrirequiests/rcd",
        data    : formdata,
        dataType: 'json',
        beforeSend: function() {
            $("#"+btnid).startLoading();
        },
        success : function(resData){
            // console.log(resData);return false;
            var {status,validate,message,user} = resData;
            if (validate === true) {
                if(status === true){
                    $.toaster(message, 'Success', 'success');
                    $("#"+FormId).trigger("reset");
                    $('#rcdModal').modal('hide');
                    //setTimeout(function () { location.reload(true); }, 1500);
                }else if(status == false){
                    $.toaster(message, 'Error', 'danger');
                    return false;
                }
            } else{
                $.each(message, function(key, value) {
                    if(value!=''){
                        $.toaster(value, 'Error', 'danger');
                        $("#"+FormId+" input[name="+key+"]").focus();
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
   
});