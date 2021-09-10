"use strict";

$(".select2").select2({
    allowClear: true
});
/*$(function () {
    $("#date").datepicker({
      dateFormat:'yy-mm-dd',
      changeMonth: true,
      changeYear: true,
      yearRange: "-100:+0",
      defaultDate : new Date()
    });  
});*/


$('#mdate').bootstrapMaterialDatePicker({
   format: 'YYYY-MM-DD',
    lang: 'fr',
    weekStart: 1,
    switchOnClick : true,
    time: false
});


function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#photo_name').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }else{
        // console.log('photo_url:'+photo_url);
        $('#photo_name').attr('src', photo_url);
    }
}

$(document).on('click',"#reset_img",function (event) { 
    var $el = $('#photo_file');
    $el.wrap('<form>').closest('form').get(0).reset();
    $el.unwrap();
    $('#photo_name').attr('src', '');

// $("#reset_img").click(function(){

});

$("#photo_file").change(function(){
    readURL(this);
});



$(document).on("click", "#save" , function(e) {
   
    var id = $("#id").val();
    e.preventDefault();
    $("#toaster").remove();
    var myForm = document.getElementById('maran_nondh_form');
    var formdata = new FormData(myForm); //$("#system-form").serialize();
    var formId   = $(this).data('form');
    // var formdata = $("#system-form").serialize();
    // alert(base_url+"Api/login/signin");
    $.ajax({
        type    : "POST",
        url     : base_url+"Api/marannondh/save",
        data    : formdata,
        processData:false,
        contentType:false,
        dataType: 'json',
        success : function(resData){
            var {status,validate,message} = resData;
            if (validate === true) {
                if(status === true){
                    $.toaster(message, 'Success', 'success');
                    // if(id == 0){
                    //     $('#donor_title').val('');
                    //     $('.dropify-clear').click();
                    //     $("#id").val(0);
                    //     $("#"+formId).trigger("reset");
                    // }else{
                    //     setTimeout(function(){ window.location = base_url+'admin/marannondh/list' }, 1000);
                    // }
                    setTimeout(function(){ window.location = base_url+'admin/marannondh/list' }, 1000);
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


$(document).on('change', '#family_id', function(){
    var id = $(this).val();
    console.log('family_id'+id);
    FillPerson(id);
});


$(document).on('change', '#family_person', function(){
    // var id = $(this).text();
    // console.log('family_person::::::'+id);
    var val = $('#family_person').find(":selected").html();
    var fno = $("#family_person").find(":selected").attr('data-fno');
    var array = val.split("undefine");
    $('#person_name').val(array[0]);
    $('#family_no').val(fno);
    //alert(fno);
});


function FillPerson(id){
     $('#person_name').val("");
     $('#family_person').empty();
     $("#family_person").val("");
     $("#death_contact").val("");
     $("#death_contact option[value]").remove();
    $.ajax({
        type    : "GET",
        url     : base_url+"Api/family/getPerson/"+id,
        dataType: 'json',
        success : function(resData){
            console.log(resData);
            var {status, data, message} = resData;
            console.log('data:'+data)
            if(status === true){
                var len = data.length;

                $('#family_person').append("<option value=''>Select Person</option>");
                for( var i = 0; i<len; i++){
                    var name = data[i]['id'];
                    var fno = data[i]['family_no'];
                    var value = data[i]['first_name']+' '+data[i]['second_name']+' '+data[i]['third_name']+' '+data[i]['surname'];
                    var accnumber = data[i]['contact'];
                    $('#family_person').append("<option data-fno='"+fno+"' value='"+name+"'>"+value+" ("+accnumber+")</option>");
                }


                //$('#death_contact').append("<option value=''>Select contact(s)</option>");
                for( var i = 0; i<len; i++){
                    var name = data[i]['id'];
                    var value = data[i]['first_name'];
                    var accnumber = data[i]['contact'];
                    $('#death_contact').append("<option value='"+value+' - '+accnumber+"'>"+value+" ("+accnumber+")</option>");
                }
                //$('#apped_dc').append("</select><input type='hidden' name='dc' id='dc'>");


            }
        },error: function(){}
   });
}