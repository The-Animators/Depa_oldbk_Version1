// $("#course_id").val(1);
// $("#cuisine_id").val(1);
$(document).on('click',"#importBtn",function () {

  // $("#importBtn").prop('disabled',true);
    $("#msgbox").hide();
    $("#msgbox1").show();

    var url = base_url+'import/importcsv';
//    var formdata = $("#searchform").serializeToJSON();
//   var formdata = $("#searchform").serializeToJSON();
    var form = $('#importForm')[0];
    var formdata = new FormData(form);
    // console.log("Form:"+formdata);
    // console.log("cuisine_id:"+formdata.cuisine_id);
    // console.log("cuisine_id1:"+formdata["cuisine_id"]);
   // return false;
    $.ajax({
        type    : 'post',
        url     : url,
        data    : formdata,
        mimeType  : "multipart/form-data",
        processData: false,  // Important!
        contentType: false,
        cache   : false,
        success : function(resData){
            // console.log(resData);
            var response = jQuery.parseJSON(resData);
            // console.log(response['Query']);
            if(response['Response-Status'] == true){
                $(".message").html(response['Response-Message']);
                $("#msgbox").addClass('alert-success').removeClass('alert-danger');
                $("#msgbox").show();
                $("#msgbox1").hide();
                $("#importBtn").prop('disabled',false);
                //$('input[type=text]').val('');
                //setTimeout(function(){window.location = base_url+"recipe"; }, 1000);
            }else if(response['Response-Status'] == false){
                $(".message").html(response['Response-Message']);
                $("#msgbox").addClass('alert-danger').removeClass('alert-success');
                $("#msgbox").show();
                $("#msgbox1").hide();
                $("#importBtn").prop('disabled',false);
                return false;
            }
         },
        error : function(error){}
    });
    return false; 

});

