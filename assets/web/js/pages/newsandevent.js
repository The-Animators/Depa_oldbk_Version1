'use strict';

$(document).ready(function () {
    getevent();
});

function getevent() {
    $.ajax({
        type    : "GET",
        url     : base_url+"Api/event/getevent",
        dataType: 'json',
        success : function(resData){
            // console.log(resData);
            var {status, data} = resData;
            if(status === true){
               if(data.pastevent.length > 0){
                   $('#Past,#Upcoming').html('');
                   var upcominghtml = '';
                   var html = '';
                       html += '<div class="row ulockd-mrgn1240">';
                       $.each(data.pastevent,function(i){
                           html += `
                               <div class="col-sm-6 col-md-2">
                                <figure class="upcoming-event list">
                                    <div class="caption">
                                        <img class="img-responsive img-whp" src="${base_url}uploads/news/${data.pastevent[i]['image']}" alt="${data.pastevent[i]['title']}">
                                        
                                    </div>
                                </figure>
                              </div>

                              <div class="col-sm-6 col-md-4">
                                <figure class="upcoming-event list">
                                    <div class="caption">
                                        <div class="event-details ulockd-pad120">
                                            <h3 class="event-title">${data.pastevent[i]['title']}</h3>
                                            ${data.pastevent[i]['description']}
                                        </div>
                                        <div class="event-footer">
                                            <ul class="list-inline">
                                                <li><a href="${base_url}newsevents/detail/${data.pastevent[i]['id']}" class="btn btn-default ulockd-btn-thm2" title="${data.pastevent[i]['title']}">Read More</a></li>
                                                <li class="align-right">${data.pastevent[i]['event_date']}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </figure>
                            </div>
                              `
                       });
                   html += '</div>';
                   
                   $('#Past').html(html);
                  }else{
                    $('#Past').html(`<div class="row ulockd-mrgn1240"><div class="col-lg-12"><p>No Past Event </p></div></div>`);
                  }
                  if(data.upcomingevent.length > 0){
                   var upcominghtml = '';
                   upcominghtml += '<div class="row ulockd-mrgn1240">';
                   $.each(data.upcomingevent,function(i){
                       upcominghtml += `
                           <div class="col-sm-6 col-md-4">
                            <figure class="upcoming-event list">
                                <div class="caption">
                                    <img class="img-responsive img-whp" src="${base_url}uploads/news/${data.upcomingevent[i]['image']}" alt="${data.upcomingevent[i]['title']}">
                                    
                                </div>
                            </figure>
                          </div>

                          <div class="col-sm-6 col-md-8">
                            <figure class="upcoming-event list">
                                <div class="caption">
                                    <div class="event-details ulockd-pad120">
                                        <h3 class="event-title">${data.upcomingevent[i]['title']}</h3>
                                        ${data.upcomingevent[i]['description']}
                                    </div>
                                    <div class="event-footer">
                                        <ul class="list-inline">
                                            <li><a href="${base_url}newsevents/detail/${data.upcomingevent[i]['id']}" class="btn btn-default ulockd-btn-thm2" title="${data.upcomingevent[i]['title']}">Read More</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </figure>
                        </div>`;
                   });
                  upcominghtml += '</div>';
                  $('#Upcoming').html(upcominghtml);
               }else{
                 $('#Upcoming').html(`<div class="row ulockd-mrgn1240"><div class="col-lg-12"><p>No Upcoming Event </p></div></div>`);
               }
            }else if(status == false){
                $.toaster(message, 'Error', 'danger');
                return false;
            }
           
        },error: function(){}
   });
}

