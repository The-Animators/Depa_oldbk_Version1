'use strict';

$(document).ready(function () {

    getdonorlist();
    geteventlist();
    getgallerylist();
    getbirthdaylist();
    getmarriagelist();
    getpuniyatithi();

});

function getdonorlist() {
    $.ajax({
        type    : "GET",
        url     : base_url+"Api/donors",
        dataType: 'json',
        success : function(resData){
            // console.log(resData);
            var {status, data} = resData;
            if(status === true){
               if(data.length > 0){
                   $('#donor-carousel').html('');
                   var html = '';
                       html += '<div class="media-left pull-left">';
                   $.each(data,function(i){
                       if(i > 0){
                           var imgclass = 'img_animat';
                       }else{
                           var imgclass = '';
                       }
                       html += `<img class="${imgclass} media-object thumbnail bx-wrapper" alt="${data[i]['donor_title']}" src="${base_url}uploads/donors/${data[i]['donor_image']}">`
                   });
                   html += '</div>';
                   
                   $('#donor-carousel').html(html);
                   setTimeout(function(){
                       $('#donor-carousel').bxSlider({
                            auto: true,
                            infiniteLoop: true,
                            mode: 'vertical',
                            nextSelector: '#slider-next',
                            prevSelector: '#slider-prev',
                            pager: false,
                            slideMargin: 5,
                            speed: 3000,
                            adaptiveHeight:false
                        });
                   }, 1000);
               }else{
                   $('.donor-carousel-wrapper').hide();
               }
            }else if(status == false){
                $.toaster(message, 'Error', 'danger');
                return false;
            }
           
        },error: function(){}
   });
}

function geteventlist() {
    $.ajax({
        type    : "GET",
        url     : base_url+"Api/event",
        dataType: 'json',
        success : function(resData){
            // console.log(resData);
            var {status, data} = resData;
            // alert(status);
            // alert(data.length);
            if(status === true){
               if(data.length > 0){
                   $('#eventCarosule').html('');
                   var indicator = '';
                   var html      = '';
                   $.each(data,function(i){
                      html += `<div class="item"><img src="${base_url}uploads/news/${data[i]['image']}" style="width:100%">
                                  <div class="carousel-caption" style="text-align:start">
                                    <h3>${data[i]['title']}</h3>
                                  </div>
                                </div>`;
                      indicator += `<li data-target="#myCarousel" data-slide-to="${i}">
                                      <img src="${base_url}uploads/news/${data[i]['image']}">
                                   </li>`;
                   });
                   // setTimeout(function(){
                        $('#eventCarosule').html(html);
                        $('#eventindicators').html(indicator);
                        $('#eventCarosule .item').first().addClass('active');
                        $('#eventCarosule .carousel-indicators > li').first().addClass('active');
                        $("#eventCarosule").carousel();
                   // }, 1000);
               }else{
                   $('.donor-carousel-wrapper').hide();
               }
            }else if(status == false){
                $.toaster(message, 'Error', 'danger');
                return false;
            }
           
        },error: function(){}
   });
}

function getgallerylist() {
    $.ajax({
        type    : "GET",
        url     : base_url+"Api/gallery/home",
        dataType: 'json',
        success : function(resData){
            // console.log(resData);
            var {status, data} = resData;
            // alert(status);
            // alert(data.length);
            if(status === true){
               if(data.length > 0){
                   $('#galleryCarosule').html('');
                   var indicator = '';
                   var html      = '';
                   $.each(data,function(i){
                      html += `<div class="item">
                                  <img src="${base_url}uploads/gallery/${data[i]['image']}" style="width:100%">
                                </div>`;
                      indicator += `<li data-target="#myCarousel1" data-slide-to="${i}">
                                      <img src="${base_url}uploads/gallery/${data[i]['image']}">
                                   </li>`;
                   });
                   // setTimeout(function(){
                        $('#galleryCarosule').html(html);
                        $('#galleryindicators').html(indicator);
                        $('#galleryCarosule .item').first().addClass('active');
                        $('#galleryCarosule .carousel-indicators > li').first().addClass('active');
                        $("#galleryCarosule").carousel();
                   // }, 1000);
               }else{
                   // $('.donor-carousel-wrapper').hide();
               }
            }else if(status == false){
                $.toaster(message, 'Error', 'danger');
                return false;
            }
           
        },error: function(){}
   });
}

function getbirthdaylist() {
    $.ajax({
        type    : "GET",
        url     : base_url+"Api/member/getbirthday",
        dataType: 'json',
        success : function(resData){
            // console.log(resData);
            var {status, data} = resData;
            // alert(status);
            // alert(data.length);
            if(status === true){
               if(data.length > 0){
                   $('#birthdaywrapper').html('');
                   var html = '';
                   html += `<h3>Happy Birthday</h3>`;
                   html += `<ul id="birthday-carousel">`;
                   $.each(data,function(i){
                      html += `<li>
                              <div class="media">
                                  <div class="media-left pull-left">
                                      <a href="#">
                                          <img class="media-object thumbnail" src="${base_url}uploads/members/${data[i]['image']}" alt="${data[i]['fullname']}" width="80">
                                      </a>
                                  </div>
                                  <div class="media-body">
                                      <h4 class="media-heading">${data[i]['fullname']}</h4>
                                  </div>
                              </div>
                          </li>`;
                   });
                   html += `</ul>`;
                    $('#birthdaywrapper').html(html);
                    setTimeout(function(){
                       $('#birthday-carousel').bxSlider({
                            auto: true,
                            infiniteLoop: true,
                            mode: 'vertical',
                            nextSelector: '#slider-next',
                            prevSelector: '#slider-prev',
                            pager: false,
                            slideMargin: 5,
                            speed: 3000,
                            adaptiveHeight:false
                        });
                   }, 3000);
               }else{
                   $('#marriagewrapper').html('');
               }
            }else if(status == false){
                // $.toaster(message, 'Error', 'danger');
                return false;
            }
           
        },error: function(){}
   });
}

function getmarriagelist() {
    $.ajax({
        type    : "GET",
        url     : base_url+"Api/member/getmarriage",
        dataType: 'json',
        success : function(resData){
            // console.log(resData);
            var {status, data} = resData;
            // alert(status);
            // alert(data.length);
            if(status === true){
               if(data.length > 0){
                   $('#marriagewrapper').html('');
                   var html = '';
                   html += `<h3>Marriage Anniversary</h3>`;
                   html += `<ul id="marriage-carousel">`;
                   $.each(data,function(i){
                      html += `<li>
                              <div class="media">
                                  <div class="media-left pull-left">
                                      <a href="#">
                                          <img class="media-object thumbnail" src="${base_url}uploads/members/${data[i]['image']}" alt="${data[i]['fullname']}" width="80">
                                      </a>
                                  </div>
                                  <div class="media-body">
                                      <h4 class="media-heading">${data[i]['fullname']}</h4>
                                  </div>
                              </div>
                          </li>`;
                   });
                   html += `</ul>`;
                    $('#marriagewrapper').html(html);
                    setTimeout(function(){
                       $('#marriage-carousel').bxSlider({
                            auto: true,
                            infiniteLoop: true,
                            mode: 'vertical',
                            nextSelector: '#slider-next',
                            prevSelector: '#slider-prev',
                            pager: false,
                            slideMargin: 5,
                            speed: 3000,
                            adaptiveHeight:false
                        });
                   }, 1000);
               }else{
                   $('#marriagewrapper').html('');
               }
            }else if(status == false){
                // $.toaster(message, 'Error', 'danger');
                return false;
            }
           
        },error: function(){}
   });
}


function getpuniyatithi() {
    $.ajax({
        type    : "GET",
        url     : base_url+"Api/member/getpuniyatithi",
        dataType: 'json',
        success : function(resData){
            // console.log(resData);
            var {status, data} = resData;
            if(status === true){
               if(data.length > 0){
                   $('#puniyatithi-carousel').html('');
                   var html = '';
                       html += '<div class="media-left pull-left">';
                   $.each(data,function(i){
                       if(i > 0){
                           var imgclass = 'img_animat';
                       }else{
                           var imgclass = '';
                       }
                       html += `<img class="${imgclass} media-object thumbnail bx-wrapper" alt="${data[i]['fullname']}" src="${base_url}uploads/members/${data[i]['image']}">`
                   });
                   html += '</div>';
                   
                   $('#puniyatithi-carousel').html(html);
                   setTimeout(function(){
                       $('#puniyatithi-carousel').bxSlider({
                            auto: true,
                            infiniteLoop: true,
                            mode: 'vertical',
                            nextSelector: '#slider-next',
                            prevSelector: '#slider-prev',
                            pager: false,
                            slideMargin: 5,
                            speed: 3000,
                            adaptiveHeight:false
                        });
                   }, 3000);
               }else{
                   $('.puniyatithi-carousel-wrapper').hide();
               }
            }else if(status == false){
                $.toaster(message, 'Error', 'danger');
                return false;
            }
           
        },error: function(){}
   });
}

const promiseA = new Promise( ( resolve ) => {
    console.log('ExecutorA: Begin!');
    resolve( 'A' );
    console.log('ExecutorA: End!');
} );

const promiseB = new Promise( ( resolve ) => {
    console.log('ExecutorB: Begin!');
    resolve( 'B' );
    console.log('ExecutorB: End!');
} );


// Promise: classical approach
const getPromiseClassical = () => {
    console.log('getPromiseClassical()');

    return promiseA.then( ( resultA ) => {
        console.log('promiseClassical: A');
    
        return promiseB.then( ( resultB ) => {
            console.log('promiseClassical: B');
            console.log( 'Classical: Promises resolved: ', resultA, resultB );
        } );
    } );
};
const promiseClassical = getPromiseClassical();

// Promise: async/await
const getPromiseAsync = async () => {
    console.log('getPromiseAsync()');

    const resultA = await promiseA;
        console.log('promiseAsync: A');

        const resultB = await promiseB;
            console.log('promiseAsync: B');
            console.log( 'Async: Promises resolved: ', resultA, resultB );
};
const promiseAsync = getPromiseAsync();