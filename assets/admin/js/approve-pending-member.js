"use strict";
$(".select2").select2({
    allowClear: true
});

$('#dob, #dom').bootstrapMaterialDatePicker({
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
    $('#photo_name').attr('src', img);
});

$("#photo_file").change(function(){
    readURL(this);
});

//cancel
$(document).on('click',"#cancel",function (event) { 
    
    var id = $('#member_id').val();

    $.ajax({
        url:base_url+'Api/member/rejectprofile',
        type:"post",
        data:{id:id},
        processData:false,
        contentType:false,
        cache:false,
        async:false,
        success: function(data){
            if (data == 'true') {
                $.toaster('Rejected Success', 'Success', 'success');
            }else{
                $.toaster('Something went wrong', 'Error', 'danger');
            }
        }, error: function(){
            
        }, complete:function(data){
            
        }
    });

});

var validation = true;
$('#member-form').submit(function(e){

    var formdata = new FormData(this);
    var btnid = 'submitb2b';
    e.preventDefault();
    
    if(validation==true){

        $.ajax({
            url:base_url+'Api/member/approveprofile',
            type:"post",
            data:formdata,
            dataType:'json',
            processData:false,
            contentType:false,
            cache:false,
            async:false,
            beforeSend: function() {
                $("#"+btnid).startLoading();
            },
            success: function(response){
                var {status,validate,message} = response;
                if (validate === true) {
                    if(status === true){
                        $.toaster(message, 'Success', 'success');
                         setTimeout(function(){
                            window.location = base_url + 'admin/';
                        }, 1500);
                    }else if(status === false){
                        $.toaster(message, 'Error', 'danger');
                        return false;
                    }
                } else{
                    $.each(message, function(key, value) {
                        if(value!=''){
                            $.toaster(value, 'Error', 'danger');
                            $("#member-form #"+key).focus();
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

$(document).on('change',"#relation, #marriage_type",function (event) {
    CheckMarriage(); 
});

function CheckMarriage(){
    var relation    = $("#relation").val();
    var m_type      = $('option:selected', "#relation").data('type');
    var m_status    = $("#marriage_type").val();
    // console.log(`m_status ${m_status}`);
    // console.log(`m_type ${m_type}`);
    $("#m_type").val(m_type);
    if(m_type != '' && (m_status > 2 && m_status < 6)){
        $("#marriage_details").show();
    }else{
        $("#marriage_details").hide();
    }
}


function CheckLifeInsurance(){
    var life    = $("input[name='life_insurance']:checked").val();
    // console.log('Life : '+life);
    if(life ==  1){
        $("#life_insurance_txt").show();
    }else{
        $("#life_insurance_txt").val('').hide();
    }
}

//When Medical Insurance Radio Button is clicked

function CheckMedicalInsurance(){
    var life = $("input[name='medical_insurance']:checked").val();
    // console.log('Life : '+life);
    if(life == 1){
        $("#medical_insurance_ask").show();
    }else{
        $("#medical_insurance_ask").hide();
        $("#medical_insurance_txt").hide().val('');
    }
}

//When Sanjeevni Radio Button is clicked under Medical Insurance

function CheckSanjeevni(){
    var life    = $("input[name='sanjeevni']:checked").val();
    // console.log('CheckSanjeevni : '+life);
    if(life == 0){
        $("#medical_insurance_txt").show();
    }else{

        $("#medical_insurance_txt").val('').hide();
    }
}

CheckMarriage();
CheckLifeInsurance();
CheckMedicalInsurance();
CheckSanjeevni();

function printDiv() 
{

    $(".br-header").hide();
    $("#leftsidebar").hide();
    $("#DivIdToPrint").show();
    $(".br-logo").hide();
    $(".block-header").hide();
    $(".fright").hide();
    $("section").css("margin", "0");
    window.print();
    location.reload();

}