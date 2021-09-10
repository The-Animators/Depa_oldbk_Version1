'use strict';

$(document).ready(function () {
    getlist();
});

function getlist() {
    $.ajax({
        type    : "GET",
        url     : base_url+"Api/b2b/getbyid/"+$('#id').val(),
        dataType: 'json',
        success : function(resData){
        //   console.log(JSON.stringify(resData));
          var {status, businessdata,busenessimg} = resData;
          if(status === true){
           if(businessdata.length > 0){
              $('#images_videoa').html('');
              $('#details').html('');
              $('#slides').html('');
              $('#firmname').html(businessdata[0]['firm_name']);
              var video='';
              var logo='';
              var visitingcard='';
              var imgcar = '';
              var whatsapp  = businessdata[0]['whatsapp_number'];
              var email     = businessdata[0]['email'];
              var website     = businessdata[0]['website'];
              var facebook     = businessdata[0]['facebook'];
              var instagram     = businessdata[0]['instagram'];
              var skype_id     = businessdata[0]['skype_id'];
              var twitter     = businessdata[0]['twitter'];

              if(whatsapp && whatsapp != ''){
                whatsapp = `<a href="https://web.whatsapp.com/send?phone=${whatsapp}" target="_blank"><i class="fa fa-whatsapp" aria-hidden="true"></i> ${whatsapp}</a>`
              }            
              if(email && email != ''){
                email = `<a href="mailto:${email}"><i class="fa fa-envelope" aria-hidden="true"></i> ${email}</a>`
              }
              if(website && website != ''){
                if(website.indexOf('http') < 0){
                  website = "https://"+website;
                }
                website = `<a href="${website}" target="_blank"><i class="fa fa-internet-explorer" aria-hidden="true"></i> ${website}</a>`
              }
              if(facebook && facebook != ''){
                var facebook_url = "https://www.facebook.com/"+facebook;
                facebook = `<a href="${facebook_url}" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i> ${facebook}</a>`
              }
              if(instagram && instagram != ''){
                var instagram_url = "https://www.instagram.com/"+instagram;
                instagram = `<a href="${instagram_url}" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i> ${instagram}</a>`
              }
              if(skype_id && skype_id != ''){
                var skype_id_url = "https://www.skype_id.com/"+skype_id;
                skype_id = `<a href="${skype_id_url}" target="_blank"><i class="fa fa-skype" aria-hidden="true"></i> ${skype_id}</a>`
              }
              if(twitter && twitter != ''){
                var twitter_url = "https://www.twitter.com/"+twitter;
                twitter = `<a href="${twitter_url}" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i> ${twitter}</a>`
              }

              video = businessdata[0]['video'];
              console.log('video:'+video);
              if(video && video != ''){
               video = `<video controls>
                           <source src="${base_url}uploads/b2b/${video}" type="video/mp4">
                            Your browser does not support the video tag.
                          </video>`
              }else{
                video = `<img src="${base_url}assets/img/novideo.jpg" calss="img-responsive">`
              }

              logo = businessdata[0]['logo'];
              if(logo && logo!=''){
                  logo = `<img src="${base_url}uploads/b2b/${logo}" calss="img-responsive">`
              }else{
                  logo = `<img src="${base_url}assets/img/noimage.jpg" calss="img-responsive">`
              }

              visitingcard = businessdata[0]['visitingcard'];
              if(visitingcard && visitingcard!=''){
                  visitingcard = `<img src="${base_url}uploads/b2b/${visitingcard}" calss="img-responsive">`
              }else{
                  visitingcard = `<img src="${base_url}assets/img/noimage.jpg" calss="img-responsive">`
              }
              var image_video = `<div class="col-md-12">
                                    <div class="col-md-3 col-xs-6">
                                        <h4>Business Logo</h4>
                                        ${logo}
                                    </div>
                                    <div class="col-md-3 col-xs-6">
                                        <h4>Visiting Card</h4>
                                        ${visitingcard}
                                    </div>
                                    <div class="col-md-6 col-xs-12">
                                        <h4>Business Video</h4>
                                        ${video}
                                    </div>
                                </div>`;
              var details = `<div class="table-responsive mt-10">
                              <table class="table table-bordered table-striped">
                                <tr>
                                   <th>Contact Person</th>
                                   <td>${businessdata[0]['contact_person']}</td>
                                   <th>Contact Number</th>
                                   <td>${businessdata[0]['contact_number']}</td>
                                   <th>Email</th>
                                   <td>${email}</td>
                                </tr>
                                <tr>
                                   <th>Whatsapp Number</th>
                                   <td>${whatsapp}</td>
                                   <th>Website</th>
                                   <td>${website}</td>
                                   <th>Facebook</th>
                                   <td>${facebook}</td>
                                </tr>
                                <tr>
                                   <th>Instagram</th>
                                   <td>${instagram}</td>
                                   <th>Twitter</th>
                                   <td>${twitter}</td>
                                   <th>Skype Id</th>
                                   <td>${skype_id}</td>
                                </tr>
                                <tr>
                                   <th>Address</th>
                                   <td colspan="2">${businessdata[0]['address']}</td>
                                   <th>Description</th>
                                   <td colspan="2">${businessdata[0]['description']}</td>
                                </tr>
                                <tr>
                                   <th>Brochure (PDF)</th>
                                   <td colspan="6"><a href="${base_url}uploads/b2b/${businessdata[0]['pdf']}" download>Download Brochure (PDF)</a></td>
                                </tr>
                           </table>
                          </div>`
              $('#images_videoa').html(image_video);
              $('#details').html(details);
                      
              if(busenessimg.length > 0){
                $.each(busenessimg,function(i){
                  imgcar += `<div>
                                <img data-u="image" src="${base_url}uploads/b2b/${busenessimg[i]['image']}" />
                                <img data-u="thumb" src="${base_url}uploads/b2b/${busenessimg[i]['image']}" />
                              </div>`;
                  });
                  $('#slides').html(imgcar);
                  jssor_1_slider_init();
              }else{
                  $('#slide_div').hide();
              }
            }else{
               window.location.href = base_url+'b2b';
            }
          }else if(status == false){
            $.toaster(message, 'Error', 'danger');
            return false;
          }
        },error: function(err){
          alert(JSON.stringify(err))
        }
   });
}