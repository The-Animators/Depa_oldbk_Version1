'use strict';

$(document).ready(function () {
    getjoblist();
});

function getjoblist() {
    $.ajax({
        type    : "GET",
        url     : base_url+"Api/job/getjobbyid/"+$('#jobid').val(),
        dataType: 'json',
        success : function(resData){
            // console.log(JSON.stringify(resData));
            var {status, data} = resData;
            if(status === true){
                
               if(data.length > 0){
                  $('#jobTitle,#breadtitle').html(data[0]['designation']);
                  $('#jobdetail').html('');
                  var html = '';
                  var contact_email = data[0]['contact_email'];
                  if(contact_email && contact_email != ''){
                    contact_email = `<a href="mailto:${contact_email}"><i class="fa fa-envelope" aria-hidden="true"></i> ${contact_email}</a>`
                  }
                  html +=`<div class="col-md-12">
                            <div class="panel panel-default">
                              <div class="panel-heading">
                                  <h3 class="panel-title">${data[0]['firm_name']} - ${data[0]['designation']}</h3>
                              </div>
                              <div class="panel-body">
                                <div class="col-md-12">
                                <div class="table-responsive mt-10">
                                  <table class="table table-bordered table-striped">
                                      <tr>
                                        <th>Firm Name</th>
                                        <td><b>${data[0]['firm_name']}</b></td>
                                        <th>Designtation</th>
                                        <td><b>${data[0]['designation']}</b></td>
                                      </tr>
                                      <tr>
                                        <th>Contact Person</th>
                                        <td>${data[0]['contact_person']}</td>
                                        <th>Contact Number</th>
                                        <td>${data[0]['contact_number']}</td>
                                      </tr>
                                      <tr>
                                        <th>Email</th>
                                        <td>${contact_email}</td>
                                        <th>No Of Vaccancy</th>
                                        <td>${data[0]['openings']}</td>
                                      </tr>
                                      <tr>
                                        <th>Experience</th>
                                        <td>${data[0]['experience']}</td>
                                        <th>Salary Range</th>
                                        <td>${data[0]['salary_range_start']} - ${data[0]['salary_range_end']}</td>
                                      </tr>
                                      <tr>
                                        <th>Start Date</th>
                                        <td>${moment(data[0]['start_date']).format('DD MMM YYYY')}</td>
                                        <th>End Date</th>
                                        <td>${moment(data[0]['end_date']).format('DD MMM YYYY')}</td>
                                     </tr>
                                     <tr>
                                        <th>Description</th>
                                        <td colspan="3">${data[0]['description']}</td>
                                     </tr>
                                    </table>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>`
                   $('#jobdetail').html(html);
               }else{
                   $('#jobdetail').html('');
               }
            }else if(status == false){
                $.toaster(message, 'Error', 'danger');
                return false;
            }
        },error: function(){}
   });
}