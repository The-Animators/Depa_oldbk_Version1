'use strict';

$(document).ready(function () {
    getlist();
});

function getlist() {
    $.ajax({
        type    : "GET",
        url     : base_url+"Api/blog/getbyid/"+$('#slug').val(),
        dataType: 'json',
        success : function(resData){
            console.log(JSON.stringify(resData,4,null));
            var {status, data} = resData;
            if(status === true){
                
               if(data[0]['blogdata'].length > 0){
                   $('#blogdata').html('');
                   var imgcar = '';
                   var html = '';
                   html +=`
                        <div class="col-md-12">
                          <h2 class="text-uppercase ">${data[0]['blogdata'][0]['title']}</h2>
                        </div>
                        <div class="col-md-4">
                          <a href="${base_url}uploads/blog/${data[0]['blogimg'][0]['image']}" target="_blank"><img class="img-responsive img-whp" src="${base_url}uploads/blog/${data[0]['blogimg'][0]['image']}" alt="${data[0]['blogdata'][0]['title']}"></a>
                        </div>
                        <div class="col-md-8">
                          <figure class="upcoming-event single">
                              <div class="caption">
                                  <div class="event-details">
                                      ${data[0]['blogdata'][0]['description']}
                                  </div>
                              </div>
                          </figure>
                      </div>`;
                    $('#blogdata').html(html);
                    if(data[0]['blogimg'].length > 0){
                      $.each(data[0]['blogimg'],function(i){
                        imgcar += `<div>
                                    <img data-u="image" src="${base_url}uploads/blog/${data[0]['blogimg'][i]['image']}" alt="${data[0]['blogdata'][0]['title']}">
                                    <img data-u="thumb" src="${base_url}uploads/blog/${data[0]['blogimg'][i]['image']}" />
                                  </div>`;
                        });
                        $('#slides').html(imgcar);
                        jssor_1_slider_init();
                      }else{
                          $('#slide_div').hide();
                      }
               }else{
                   $('#blogdata').html('');
               }
            }else if(status == false){
                $.toaster(message, 'Error', 'danger');
                return false;
            }
        },error: function(){}
   });
}