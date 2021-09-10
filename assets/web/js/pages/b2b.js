'use strict';

$(document).ready(function () {
    getlist();
});

function getlist() {
    $.ajax({
        type    : "GET",
        url     : base_url+"Api/b2b",
        dataType: 'json',
        success : function(resData){
            var {status, data,message} = resData;
            if(status === true){
               if(data.length > 0){
                   $('#b2bwrapper').html('');
                   var html = '';
                   $.each(data, function(i){
                         // <div class="row">
                       html += `
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <div class="panel panel-default" id="birthdaypanel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">${data[i]['firm_name']}</h3>
                                </div>
                                <div class="panel-body">
                                  <div class="col-md-12">
                                    <div class="col-md-4 ulockd-ext-spc">
                                      <div class="ulockd-bp-thumb">
                                          <img class="img-responsive img-whp" src="${base_url}uploads/b2b/${data[i]['logo']}" alt="${data[i]['firm_name']}">
                                      </div>
                                    </div>
                                    <div class="col-md-8 ulockd-ext-spc">
                                      <div class="ulockd-bp-details style2" style="padding:0">
                                          <div class="ulockd-bp-details" style="padding-top:0">
                                              <ul class="list-inline">
                                                  <li><span>Contact Person: <a href="#" class="post-by"> ${data[i]['contact_person']} </a></span></li>
                                                  <li><span>Contact Number: <a href="#" class="post-by"> ${data[i]['contact_number']} </a></span></li>
                                                  <li><span>Email: <a href="#" class="post-by"> ${data[i]['email']} </a></span></li>
                                              </ul>
                                              <div class="ulockd-bpost">
                                                  <!--p>${data[i]['description']}</p-->
                                                  <a class="btn btn-info btn-sm" href="${base_url}b2b/detail/${data[i]['id']}">Read More</a>
                                              </div>
                                          </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>`
                   });
                   $('#b2bwrapper').html(html);
               }else{
                   $('#b2bwrapper').html('<h3>No Business Listing Found</h3>');
               }
            }else if(status == false){
                $('#b2bwrapper').html(`<h3>${message}</h3>`);
                return false;
            }
        },error: function(err){
          // alert(err)
        }
   });
}