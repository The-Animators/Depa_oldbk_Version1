'use strict';

$(document).ready(function () {
    getlist();
});

function getlist() {
    $.ajax({
        type    : "GET",
        url     : base_url+"Api/blog",
        dataType: 'json',
        success : function(resData){
            console.log(JSON.stringify(resData));
            var {status, data, message} = resData;
            if(status === true){
               if(data.length > 0){
                   $('#blogwraper').html('');
                   var html = '';
                   var classm = '';
                   $.each(data,function(i){
                     // console.log(i)
                     if(i>0){
                       classm= 'ulockd-mrgn1240'
                     }else{
                       classm= '';
                     }
                       html += `<div class="col-md-12">
                                  <div class="panel panel-default">
                                    <div class="panel-body">
                                      <div class="row">
                                        <div class="col-md-3">
                                          <img class="img-responsive img-whp" src="${base_url}uploads/blog/${data[i]['image']}" alt="1.jpg">
                                        </div>
                                        <div class="col-md-9">
                                          <div class="event-footer ulockd-pad120">
                                            <ul class="list-inline">
                                              <li><h3 class="event-title">${data[i]['title']}</h3></li>
                                            </ul>
                                          </div>
                                          <div>
                                              Uploaded on : ${moment(data[i]['added_on']).format('DD MMM YYYY')}
                                              <div class="ulockd-bpost">
                                                  <a class="btn btn-info btn-sm" href="${base_url}blog/detail/${data[i]['slug']}">Read More</a>
                                              </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>`
                   });
                   $('#blogwraper').html(html);
               }else{
                   $('#blogwraper').html('<h3>No Blog At a Time</h3>');
               }
            }else if(status == false){
                $('#blogwraper').html(`<h3>${message}</h3>`);
                return false;
            }
        },error: function(){}
   });
}