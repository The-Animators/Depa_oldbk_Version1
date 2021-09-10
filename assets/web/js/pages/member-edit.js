"use strict";
$(function () {
    $("#dob").datepicker({
      dateFormat:'yy-mm-dd',
      changeMonth: true,
      changeYear: true,
      yearRange: "-100:+0",
      defaultDate : new Date(dob)
    });
    $("#dom").datepicker({
      dateFormat:'yy-mm-dd',
      changeMonth: true,
      changeYear: true,
      defaultDate : new Date(dom)
    });    
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

// $("#reset_img").click(function(){

});

$("#photo_file").change(function(){
    readURL(this);
});

var validation = true;
$('#member-form').submit(function(e){
    var btnid = 'submitb2b';
    var family_id = $("#family_id").val();
    e.preventDefault(); 
    var education = $("#education_id :selected").map(function(i, el) {
        return $(el).val();
    }).get();

    var sports = $("#sports_id :selected").map(function(i, el) {
        return $(el).val();
    }).get();
    $("#education").val(education);
    $("#sports").val(sports);

    if(validation==true){

        $.ajax({
            url:base_url+'Api/member/profile',
            type:"post",
            data:new FormData(this),
            dataType:'json',
            processData:false,
            contentType:false,
            cache:false,
            async:true,
            beforeSend: function() {
                $("#"+btnid).startLoading();
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
                            $("#member-form input[name="+key+"], #member-form textarea[name="+key+"]").focus();
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

$(document).on('change',"#relation, #marriage_type, #gender",function (event) {
    CheckMarriage(); 

});

function CheckMarriage(){
    var relation    = $("#relation").val();
    var m_type      = $('option:selected', "#relation").data('type');
    var m_status    = $("#marriage_type").val();
    var gender      = $("#gender").val();
    $("#m_type").val(m_type);
    if(m_type != '' && (m_status > 2 && m_status < 6  && gender == 'F')){
        $("#marriage_details").show();
    }else{
        $("#marriage_details").hide();

    }
}


$(document).on('click',".life_insurance",function (event) {
    // console.log('Radio Clicked');
    CheckLifeInsurance(); 

});

function CheckLifeInsurance(){
    var life    = $("input[name='life_insurance']:checked").val();
    // console.log('Life : '+life);
    if(life ==  1){
        $("#life_insurance_txt").show();
    }else{
        $("#life_insurance_txt").hide();

    }
}


//When Medical Insurance Radio Button is clicked

$(document).on('click',".medical_insurance",function (event) {
    // console.log('Radio Clicked');
    CheckMedicalInsurance(); 

});

function CheckMedicalInsurance(){
    var life    = $("input[name='medical_insurance']:checked").val();
    console.log('Life : '+life);
    if(life ==  1){
        $("#medical_insurance_ask").show();
        CheckSanjeevni();
    }else{
        $("#medical_insurance_ask").hide();
        $("#medical_insurance_txt").hide();
    }
}

//When Sanjeevni Radio Button is clicked under Medical Insurance

$(document).on('click',".sanjeevni",function (event) {
    console.log('sanjeevni Clicked');
    CheckSanjeevni(); 

});

function CheckSanjeevni(){
    var life    = $("input[name='sanjeevni']:checked").val();
    console.log('Life : '+life);
    if(life ==  0){
        $("#medical_insurance_txt").show();
    }else{
        $("#medical_insurance_txt").hide();

    }
}


$(document).on('click',"#cancel",function (event) {
    var family_id = $("#family_id").val();
     window.location = base_url + 'family/'+family_id;
});

function EditSurname(){
    if($('#surname_input').val() != ''){
        var Attr = $("#surname_div");
        Attr.removeAttr("col-md-12").addClass("col-md-6");
        $("#surname-input-div").show();
    }else{
        $("#surname-input-div").hide();
        var Attr = $("#surname_div");
        Attr.removeClass("col-md-6").addClass("col-md-12");
    }
}
$("#surname").change(function (){
    var value_select = $("#surname").val();
    
    
    if (value_select == "115") {
        var Attr = $("#surname_div");
        Attr.removeAttr("col-md-12").addClass("col-md-6");
        $("#surname-input-div").show();
    }else{
        $("#surname-input-div").hide();
        var Attr = $("#surname_div");
        Attr.removeClass("col-md-6").addClass("col-md-12");
        
    }
});
$("#relation").change(function (){
    var value_select = $("#relation").val();
    
    if (value_select == "39") {
        var Attr = $("#relation_div");
        Attr.removeAttr("col-md-12").addClass("col-md-6");
        $("#relation-input-div").show();

    }else{
        $("#relation_input").val('');
        $("#relation-input-div").hide();
        var Attr = $("#relation_div");
        Attr.removeClass("col-md-6").addClass("col-md-12");
        
    }
});

function EditRelation() {
    if($('#relation_input').val() != ''){
        var Attr = $("#relation_div");
        Attr.removeAttr("col-md-12").addClass("col-md-6");
        $("#relation-input-div").show();
    }else{
        $("#relation-input-div").hide();
        var Attr = $("#relation_div");
        Attr.removeClass("col-md-6").addClass("col-md-12");
    }
}

function EditOccupation() {
    if($('#occupation-input').val() != ''){
        var Attr = $("#occupation_div");
        Attr.removeAttr("col-md-12").addClass("col-md-6");
        $("#occupation-input-div").show();
    }else{
        $("#occupation-input-div").hide();
        var Attr = $("#occupation_div");
        Attr.removeClass("col-md-6").addClass("col-md-12");
    }
}
function EditEducation() {
    if($('#education-input').val() != ''){
        var Attr = $("#education_div");
        Attr.removeAttr("col-md-12").addClass("col-md-6");
        $("#education-input-div").show();
    }else{
        $("#education-input-div").hide();
        var Attr = $("#education_div");
        Attr.removeClass("col-md-6").addClass("col-md-12");
    }
}
function EditSports() {
    if($('#sports-input').val() != ''){
        var Attr = $("#sports_div");
        Attr.removeAttr("col-md-12").addClass("col-md-6");
        $("#sports-input-div").show();
    }else{
        $("#sports-input-div").hide();
        var Attr = $("#sports_div");
        Attr.removeClass("col-md-6").addClass("col-md-12");
    }
}

$("#occupation").change(function(){
    var value_select = $("#occupation").val();
    if (value_select == "19") {
        var Attr = $("#occupation_div");
        Attr.removeAttr("col-md-12").addClass("col-md-6");
        $("#occupation-input-div").show();
    }else{
        $("#occupation-input-div").hide();
        $("#occupation-input").val('')
        var Attr = $("#occupation_div");
        Attr.removeClass("col-md-6").addClass("col-md-12");
        
    }
});

$("#education_id").change(function(){
    
    var options = document.getElementById('education_id').selectedOptions;
    var values = Array.from(options).map(({ value }) => value);
    for (var i = values.length - 1; i >= 0; i--) {
        if (values[i] == "2") {
            var Attr = $("#education_div");
            Attr.removeAttr("col-md-12").addClass("col-md-6");
            $("#education-input-div").show();
        }else{
            $("#education-input-div").hide();
            var Attr = $("#education_div");
            Attr.removeClass("col-md-6").addClass("col-md-12");
            
        }
    }
    if (values[0] == "1") {
        var Attr = $("#education_div");
            Attr.removeAttr("col-md-12").addClass("col-md-6");
            $("#education-input-div").show();
    }else{
        $("#education-input-div").hide();
        var Attr = $("#education_div");
            Attr.removeClass("col-md-6").addClass("col-md-12");
            
    }
    
});

$("#sports_id").change(function(){
    
    var options = document.getElementById('sports_id').selectedOptions;
    var values = Array.from(options).map(({ value }) => value);
    //console.log(values);
    for (var i = values.length - 1; i >= 0; i--) {
        if (values[i] == "0") {
            var Attr = $("#sports_div");
            Attr.removeAttr("col-md-12").addClass("col-md-6");
            $("#sports-input-div").show();
        }else{
            $("#sports-input-div").hide();
            var Attr = $("#sports_div");
            Attr.removeClass("col-md-6").addClass("col-md-12");
            
        }
    }
    if (values[0] == "0") {
            var Attr = $("#sports_div");
            Attr.removeAttr("col-md-12").addClass("col-md-6");
            $("#sports-input-div").show();
    }else{
        $("#sports-input-div").hide();
            var Attr = $("#sports_div");
            Attr.removeClass("col-md-6").addClass("col-md-12");
            
    }
    
});


function Editdataset(){
    EditRelation();
    EditOccupation();
    EditEducation();
    EditSports();
    EditSurname();
}

 $("#relation-input-div").hide();
 $("#occupation-input-div").hide();
 $("#education-input-div").hide();
 $("#sports-input-div").hide();

CheckMarriage();
CheckLifeInsurance();
CheckMedicalInsurance();
Editdataset();
// CheckSanjeevni();
