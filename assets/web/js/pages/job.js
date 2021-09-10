'use strict';

$(document).ready(function () {
    getjoblist();
});

function getjoblist() {
    $.ajax({
        type    : "GET",
        url     : base_url+"Api/job/confirm",
        dataType: 'json',
        success : function(resData){
            console.log(JSON.stringify(resData));
            var {status, data} = resData;
            if(status === true){
               if(data.length > 0){
                   $('#Jobwrapper').html('');
                   var html = '';
                   $.each(data,function(i){
                       html += `<div class="col-md-4 col-sm-6 col-xs-12">
                                  <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">${data[i]['firm_name']}</h3>
                                    </div>
                                    <div class="panel-body">
                                      <div class="col-md-12">
                                      <div class="table-responsive mt-10">
                                        <table class="table table-bordered table-striped">
                                           <tr>
                                             <th>Designtation</th>
                                             <td><b>${data[i]['designation']}</b></td>
                                          </tr>
                                          <tr>
                                             <th>No of Post</th>
                                             <td>${data[i]['openings']}</td>
                                           </tr>
                                           <tr>
                                             <th>Experince Needed</th>
                                             <td>${data[i]['experience']}</td>
                                           </tr>
                                           <tr>
                                             <th>Salary Range</th>
                                             <td>${data[i]['salary_range_start']} - ${data[i]['salary_range_end']}</td>
                                           </tr>
                                          </table>
                                          <div class="ulockd-bpost">
                                              <a class="btn btn-info btn-sm" href="${base_url}job/detail/${data[i]['id']}">Read More</a>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>`
                   });
                   $('#Jobwrapper').html(html);
               }else{
                   $('#Jobwrapper').html('');
               }
            }else if(status == false){
                $.toaster(message, 'Error', 'danger');
                return false;
            }
        },error: function(){}
   });
}