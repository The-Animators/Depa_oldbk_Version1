'use strict';

$(document).ready(function () {
    getevent();
});

function getevent() {
    $.ajax({
        type    : "GET",
        url     : base_url+"Api/event/geteventbyid/"+$("#eventid").val(),
        dataType: 'json',
        success : function(resData){
            // console.log(resData);
            var {status, data,message} = resData;
            if(status === true){
               if(data.length > 0){
                   // alert(moment(data[0].event_date).format("DD/MMM/YYYY"));
                   //$('#eventtitle, #breadtitle').html(data[0].title);
                   $('#eve_img').attr('src',`${base_url}uploads/news/${data[0].image}`);
                   $('#title').html(data[0].title);
                   $('#eve_description').html('').html(data[0].description);
                   $('#links').html('');
                   if(data[0].link !=''){
                    var link = data[0].link;
                    if(link.search('http') == -1){
                      link = "https://"+link;
                    }
                      link ='Link : <a target="_blank" href="'+link+'">'+data[0].link+'</a>'; 
                      $('#links').html(link);
                   }
                   $('#evedate').html(`(${moment(data[0].event_date).format("DD/MMM/YYYY")})`);
                }else{
                  $('#eventtitle,#breadtitle').html('');
                  $('#eve_img').remove();
                  $('#eve_description').html('').html('<p> No Detail Availble</p>');
                }
            }else if(status == false){
                $.toaster(message, 'Error', 'danger');
                return false;
            }
        },error: function(){}
   });
}