'use strict';

$(document).ready(function () {
    getgallery();
});

function getgallery() {
    $.ajax({
        type    : "GET",
        url     : base_url+"Api/gallery",
        dataType: 'json',
        success : function(resData){
            // console.log(JSON.stringify(resData));
            var {status, data} = resData;
            if(status === true){
               if(data.length > 0){
                   $('#gallerywrapper').html('');
                   var html = '';
                   $.each(data,function(i){
                       html += `
                            <a href='${base_url}gallery/detail/${data[i]['slug']}'
                              <div class="col-xs-12 col-sm-6 col-md-4 ulockd-ext-spc">
                                <div class="ulockd-bp-details style2">
                                    <div class="ulockd-bp-details">
                                      <img class="img-responsive img-whp" src="${base_url}uploads/gallery/${data[i]['thumbnail']}" alt="${data[i]['title']}">
                                        <h3 class="ulockd-bp-title">${data[i]['title']}</h3>
                                    </div>
                                </div>
                              </div>
                            </a>
                           `
                   });
                   $('#gallerywrapper').html(html);
               }else{
                   $('#gallerywrapper').html(resData.message);
               }
            }else if(status == false){
                $.toaster(message, 'Error', 'danger');
                return false;
            }
        },error: function(){}
   });
}