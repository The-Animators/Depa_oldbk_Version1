'use strict';

const promiseA = new Promise( ( resolve ) => {
    $.ajax({
        type    : "GET",
        url     : base_url+"Api/donors",
        dataType: 'json',
        success : function(resData){
          // console.log(resData)
          resolve(resData);
        },error: function(err){
          reject(err)
        }
   });
} );


const promiseB = new Promise( ( resolve ) => {
     $.ajax({
        type    : "GET",
        url     : base_url+"Api/member/getbirthday",
        dataType: 'json',
        success : function(resData){
          resolve(resData);
            // console.log(resData);
        },error: function(err){
          reject(err)
        }
   });
} );

const promiseC = new Promise( ( resolve ) => {
     $.ajax({
        type    : "GET",
        url     : base_url+"Api/member/getpuniyatithi",
        dataType: 'json',
        success : function(resData){
          resolve(resData);
            // console.log(resData);
        },error: function(err){
          reject(err)
        }
   });
} );

const promiseD = new Promise( ( resolve ) => {
      $.ajax({
        type    : "GET",
        url     : base_url+"Api/event",
        dataType: 'json',
        success : function(resData){
            // console.log(resData);
            resolve(resData);
           
        },error: function(err){
          reject(err);
        }
   });
} );


const promiseE = new Promise( ( resolve ) => {
      $.ajax({
        type    : "GET",
        url     : base_url+"Api/gallery/home",
        dataType: 'json',
        success : function(resData){
            // console.log(resData);
            resolve(resData);
           
        },error: function(err){
          reject(err);
        }
   });
} );


const promiseF = new Promise( ( resolve ) => {
      $.ajax({
        type    : "GET",
        url     : base_url+"Api/member/getmarriage",
        dataType: 'json',
        success : function(resData){
            // console.log(resData);
            resolve(resData);
           
        },error: function(err){
          reject(err);
        }
   });
} );

const promiseG = new Promise( ( resolve ) => {
      $.ajax({
        type    : "GET",
        url     : base_url+"Api/member/getmarannondh",
        dataType: 'json',
        success : function(resData){
            resolve(resData);
        },error: function(err){
          reject(err);
        }
   });
} );

const promiseH = new Promise( ( resolve ) => {
      $.ajax({
        type    : "GET",
        url     : base_url+"Api/banner",
        dataType: 'json',
        success : function(resData){
            resolve(resData);
        },error: function(err){
          reject(err);
        }
   });
} );

const promiseI = new Promise( ( resolve ) => {
      $.ajax({
        type    : "GET",
        url     : base_url+"Api/advertisement",
        dataType: 'json',
        success : function(resData){
            resolve(resData);
        },error: function(err){
          reject(err);
        }
   });
} );

const promiseJ = new Promise( ( resolve ) => {
    $.ajax({
      type    : "GET",
      url     : base_url+"Api/member/prarthana",
      dataType: 'json',
      success : function(resData){
          resolve(resData);
      },error: function(err){
        reject(err);
      }
 });
} );


// Promise: classical approach
/*const getPromiseClassical = () => {
    console.log('getPromiseClassical()');

    return promiseA.then( ( resultA ) => {
        console.log('promiseClassical: A');
    
        return promiseB.then( ( resultB ) => {
            console.log('promiseClassical: B');
            console.log( 'Classical: Promises resolved: ', resultA, resultB );
        } );
    } );
};
const promiseClassical = getPromiseClassical();*/

// Promise: async/await
const getPromiseAsync = async () => {
        // console.log('getPromiseAsync()');

        const resultA = await promiseA;
        // console.log('promiseAsync: A');

        const resultB = await promiseB;
        // console.log('promiseAsync: B');

        const resultC = await promiseC;
        // console.log('promiseAsync: C');

        const resultD = await promiseD;
        // console.log('promiseAsync: D');

        const resultE = await promiseE;
        // console.log('promiseAsync: E');


        const resultF = await promiseF;
        // console.log('promiseAsync: F');

        const resultG = await promiseG;
        // console.log('promiseAsync: G' );

        const resultH = await promiseH;
        // console.log('promiseAsync: H' );

        const resultI = await promiseI;
        // console.log('promiseAsync: I' );
        
        const resultJ = await promiseJ;
        // console.log('promiseAsync: I' );
        // console.log(`resultA : ${JSON.stringify(resultA, null,3)}`);
        let {status, data, message} = resultA;
        if(status === true){
           if(data.length > 0){
                $('#donorwrapper').html('');
                var html = '';
                   // html += '<div class="media-left pull-left">';
                html += `<ul id="donor-carousel">`;
                $.each(data,function(i){
                   if(i > 0){
                       var imgclass = 'img_animat';
                   }else{
                       var imgclass = '';
                   }
                    html += `<li>
                          <div class="media" align="center">
                              <div class="">
                                  <a href="#">
                                      <img width="200" height="200" class="media-object thumbnail" src="${base_url}uploads/donors/${data[i]['donor_image']}" alt="${data[i]['donor_title']}">
                                  </a>
                              </div>
                              <div class="media-body">
                                 <h4 class="media-heading text-center">${data[i]['donor_title']}</h4>
                              </div>
                          </div>
                      </li>`;

                   // html += `<img class="${imgclass} media-object thumbnail bx-wrapper" alt="${data[i]['donor_title']}" src="${base_url}uploads/donors/${data[i]['donor_image']}"><h4 class="media-heading text-center" style="padding-top:10px">${data[i]['donor_title']}</h4>`
               });
               // html += '</div>';
               html += `</ul>`;
               
               $('#donorwrapper').html(html);
               // setTimeout(function(){
                   $('#donor-carousel').bxSlider({
                        auto: true,
                        infiniteLoop: true,
                        mode: 'horizontal',
                        nextSelector: '#slider-next',
                        prevSelector: '#slider-prev',
                        pager: false,
                        slideMargin: 5,
                        speed: 3000,
                        adaptiveHeight:false
                    });
               // }, 1000);
           }else{
               $('.donorwrapper').hide();
           }
        }else if(status == false){
            $.toaster(message, 'Error', 'danger');
        }

        /*Birthday*/
        // console.log('Birthday: '+resultB)
        var {status:statusB, data:dataB, message:messageB} = resultB;
        if(statusB === true){
           if(dataB.length > 0){
                $('#birthdaywrapper').html('');
                var resultBhtml = '';
                var b_url = '';
               // resultBhtml += `<h3>Happy Birthday</h3>`;
                resultBhtml += `<ul id="birthday-carousel">`;
                $.each(dataB,function(i){
                  if(logged_in){
                      b_url = `href="${base_url}member/view/${dataB[i]['member_no']}" target="member"`;
                  }else{
                      b_url = `href="javascript:void(0)" data-toggle="modal" data-target="#loginModal" id="login"`;
                  } 
                  resultBhtml += `<li>
                          <div class="media">
                              <div class="media-left pull-left">
                                  <a ${b_url}>
                                      <img class="media-object thumbnail" src="${base_url}uploads/members/${dataB[i]['image']}" alt="${dataB[i]['fullname']}" width="80">
                                  </a>
                              </div>
                              <div class="media-body">
                                  <h4 class="media-heading"><a ${b_url}>${dataB[i]['fullname']}</a></h4>
                              </div>
                          </div>
                      </li>`;
               });
               resultBhtml += `</ul>`;
                $('#birthdaywrapper').html(resultBhtml);
                // setTimeout(function(){
                   $('#birthday-carousel').bxSlider({
                        auto: true,
                        infiniteLoop: true,
                        mode: 'vertical',
                        nextSelector: '#slider-next',
                        prevSelector: '#slider-prev',
                        pager: false,
                        slideMargin: 5,
                        speed: 3000,
                        touchEnabled: false,
                        adaptiveHeight:false
                    });
               // }, 2000);
               // $('#birthdaypanel').show(500);
           }else{
               $('#birthdaypanel').hide();
           }
        }else if(statusB == false){
            $('#birthdaypanel').hide();
            // $('#birthdaywrapper').html(`<p>${messageB}</p>`);
        }
        /*Birthday*/

        /*Marriage*/
        // console.log('Marriage'+JSON.stringify(resultF));
          var {status : statusF, data:dataF, message:messageF} = resultF;
          if(statusF === true){
             if(dataF.length > 0){
                $('#marriagewrapper').html('');
                var html = '';
                var h_url = '';
                var w_url = '';
                var count = 0
                 // html += `<h3>Marriage Anniversary</h3>`;
                 html += `<ul id="marriage-carousel">`;
                 $.each(dataF,function(i){
                    if(logged_in){
                        h_url = `href="${base_url}member/view/${dataF[i]['h_member_no']}" target="member"`;
                        w_url = `href="${base_url}member/view/${dataF[i]['w_member_no']}" target="member"`;
                    }else{
                        h_url = `href="javascript:void(0)" data-toggle="modal" data-target="#loginModal" id="login"`;
                        w_url = `href="javascript:void(0)" data-toggle="modal" data-target="#loginModal" id="login"`;
                    } 
                    if(dataF[i]['w_name'] != null && dataF[i]['h_name'] != null){
                      html += `<li>
                              <div class="media">
                                  <div class="media-left pull-left">
                                      <a ${w_url}>
                                          <img class="media-object thumbnail" src="${base_url}uploads/members/${dataF[i]['w_image']}" alt="${dataF[i]['w_name']}" width="70">
                                      </a>
                                  </div>
                                  <div class="media-right pull-right">
                                      <a ${h_url}>
                                          <img class="media-object thumbnail" src="${base_url}uploads/members/${dataF[i]['h_image']}" alt="${dataF[i]['h_name']}" width="70">
                                      </a>
                                  </div>
                                  <div class="media-body align-center">
                                      <h4 class="media-heading"><a ${w_url}>${dataF[i]['w_first_name']}</a> <a ${h_url}>${dataF[i]['h_first_name']}</a> ${dataF[i]['surname']}</h4>
                                  </div>
                              </div>
                          </li>`;
                          count++;
                    }
                 });
                 if(count > 0){
                   html += `</ul>`;
                   // console.log(html);
                    $('#marriagewrapper').html(html);
                    // setTimeout(function(){
                       $('#marriage-carousel').bxSlider({
                            auto: true,
                            infiniteLoop: true,
                            mode: 'vertical',
                            nextSelector: '#slider-next',
                            prevSelector: '#slider-prev',
                            pager: false,
                            slideMargin: 5,
                            speed: 5000,
                            touchEnabled: false,
                            adaptiveHeight:false
                        });
                       // $('#marriagepanel').show(500);
                   // }, 1000);
                 }else{
                    $('#marriagepanel').hide();
                 }
             }else{
                $('#marriagepanel').hide();
                // $('#marriagewrapper').html('<p>No Marriage Anniversary Today</p>');
             }
          }else if(statusF == false){
             $('#marriagepanel').hide();
          }
        /*Marriage*/


        /*Puniyatihti*/
        var {status:statusC, data:dataC, message:messageC} = resultC;
        if(statusC === true){
          // alert('d')
           if(dataC.length > 0){

              $('#puniyatithiwrapper').html('');
              var resultChtml = '';
              var p_url = '';
                 // resultChtml += '<h3 class="puniyatithi-carousel-wrapper">Punyatithi</h3>';
              resultChtml += '<ul class="puncarousel">';
              $.each(dataC,function(i){
                if(logged_in){
                    p_url = `href="${base_url}member/view/${dataC[i]['member_no']}" target="member"`;
                }else{
                    p_url = `href="javascript:void(0)" data-toggle="modal" data-target="#loginModal" id="login"`;
                } 
                 resultChtml += `
                   <li>
                  <div class="media">
                      <div class="media-left pull-left">
                          <a ${p_url}>
                              <img class="media-object thumbnail bx-wrapper" alt="${dataC[i]['fullname']}" src="${base_url}uploads/members/${dataC[i]['image']}" width="80">
                          </a>
                      </div>
                      <div class="media-body">
                          <h4 class="media-heading"><a ${p_url}>${dataC[i]['fullname']}</a></h4>
                      </div>
                  </div>
              </li>`
              });
              resultChtml += '</ul>';
                 // console.log(resultChtml);
               $('#puniyatithiwrapper').html(resultChtml);
               // setTimeout(function(){
                   $('.puncarousel').bxSlider({
                       auto: true,
                        infiniteLoop: true,
                        mode: 'vertical',
                        nextSelector: '#slider-next',
                        prevSelector: '#slider-prev',
                        pager: false,
                        slideMargin: 5,
                        speed: 4000,
                        touchEnabled: false,
                        adaptiveHeight:false
                   });
               // }, 500);
           }else{
               $('#puniyatithipanel').hide();
               // $('#puniyatithiwrapper').html(`<h3>Marriage Anniversary</h3><p>${messageF}</p>`);
           }
        }else if(statusC == false){
            $('#puniyatithipanel').hide();
            // $('#puniyatithiwrapper').html(`<p>${messageC}</p>`);
            // $.toaster(message, 'Error', 'danger');
        }
        /*Puniyatihti*/
        
        /*Event*/
        var {status:statusD, data:dataD, message:messageD} = resultD;
  
          if(statusD === true){
             if(dataD.length > 0){
                 $('#eventCarosule').html('');
                 var indicator = '';
                 var html      = '';
                 $.each(dataD,function(i){
                    html += `<div class="item">
                                <a href="${base_url}newsevents/detail/${dataD[i]['id']}">
                                <div class="carousel-caption d-none d-md-block">
                                  <h3>${dataD[i]['title']}</h3>
                                </div>
                                <img src="${base_url}uploads/news/${dataD[i]['image']}" style="width:100%">
                                </a>
                              </div>`;
                    indicator += `<li data-target="#myCarouselevent" data-slide-to="${i}">
                                    <img src="${base_url}uploads/news/${dataD[i]['image']}">
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
          }else if(statusD == false){
              $.toaster(messageD, 'Error', 'danger');
          }
        /*Event*/
        
        /*Gallery*/
        // console.log(resultE);
        var {status:statusE, data:dataE, message:messageE,title:titleE,slug:slugE } = resultE;
        if(statusE === true){
             if(dataE.length > 0){
                 $('#galleryCarosule').html('');
                 var indicator = '';
                 var html      = '';
                 $.each(dataE,function(i){
                    html += `<div class="item">
                                <a href="${base_url}gallery/detail/${slugE}">
                                  <div class="carousel-caption d-none d-md-block">
                                    <h3>${titleE}</h3>
                                  </div>
									<img src="${base_url}uploads/gallery/${dataE[i]['image']}" style="width:100%">
                                </a>
                              </div>`;
                    indicator += `<li data-target="#myCarouselgallery" data-slide-to="${i}">
                                    <img src="${base_url}uploads/gallery/${dataE[i]['image']}">
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
        }else if(statusE == false){
            $.toaster(messageE, 'Error', 'danger');
        }
        /*Gallery*/
        


        /*Maran Nondh*/

        //console.log('Marannondh:'+JSON.stringify(resultG));
        var {status:statusG, data:dataG, message:messageG} = resultG;
        if(statusG === true){
           if(dataG.length > 0){
                $('#marannondhwrapper').html('');
                var resultGhtml = '';
                var g_url = '';
                var g_in_url = '';
               // resultBhtml += `<h3>Happy Birthday</h3>`;
                resultGhtml += `<ul id="marannondh-carousel">`;
                $.each(dataG,function(i){
                  if(logged_in){
                      g_url = `href="${base_url}family/${dataG[i]['family_no']}" target="member"`;
                      g_in_url = `maranmemberdetail/view/${dataG[i]['family_person']}"`;
                  }else{
                      g_url = `href="javascript:void(0)" data-toggle="modal" data-target="#loginModal" id="login"`;
                      g_in_url = g_url;
                  }
                  resultGhtml += `<li>
                          <div class="media">
                              <div class="media-left pull-left">
                                  <a ${g_url}>
                                      <img class="media-object thumbnail" src="${base_url}uploads/marannondh/${dataG[i]['image']}" alt="${dataG[i]['fullname']}" width="150">
                                  </a>
                              </div>
                              <div class="media-body">
                                  <h4 class="media-heading"><a ${g_url}>${dataG[i]['fullname']}</a></h4>
                                  <p>${dataG[i]['date']}</p>
                                  <a href="${g_in_url}">More Details</a>
                              </div>
                          </div>
                      </li>`;
               });
               resultGhtml += `</ul>`;
                $('#marannondhwrapper').html(resultGhtml);
                // setTimeout(function(){
                   $('#marannondh-carousel').bxSlider({
                        auto: true,
                        infiniteLoop: true,
                        mode: 'vertical',
                        nextSelector: '#slider-next',
                        prevSelector: '#slider-prev',
                        pager: false,
                        slideMargin: 5,
                        speed: 3000,
                        touchEnabled: false,
                        adaptiveHeight:false
                    });
               // }, 2000);
               // $('#birthdaypanel').show(500);
           }else{
               $('#marannondhpanel').hide();
           }
        }else if(statusG == false){
            $('#marannondhpanel').hide();
            // $('#birthdaywrapper').html(`<p>${messageB}</p>`);
        }
        
        /*Maran Nondh*/
        
        /*Saadri*/

        var {status:statusJ, data:dataJ, message:messageJ} = resultJ;
        if(statusJ === true){
           if(dataJ.length > 0){
                $('#saadriwrapper').html('');
                var resultJhtml = '';
                var j_url = '';
                var j_in_url = '';
               // resultBhtml += `<h3>Happy Birthday</h3>`;
               resultJhtml += `<ul id="saadri-carousel">`;
                $.each(dataJ,function(i){
                  if(logged_in){
                    j_url = `href="${base_url}family/${dataJ[i]['family_no']}" target="member"`;
                    j_in_url = `href="prarthanadetails/view/${dataJ[i]['family_person']}"`;
                  }else{
                    j_url = `href="javascript:void(0)" data-toggle="modal" data-target="#loginModal" id="login"`;
                    j_in_url = j_url;
                  }
                  resultJhtml += `<li>
                          <div class="media">
                              <div class="media-left pull-left">
                                  <a ${j_url}>
                                      <img class="media-object thumbnail" src="${base_url}uploads/saadri/${dataJ[i]['image']}" alt="${dataJ[i]['fullname']}" width="130" height="130">
                                  </a>
                              </div>
                              <div class="media-body">
                                  <h4 class="media-heading"><a ${j_url}>${dataJ[i]['fullname']}</a></h4>
                                  <p>${dataJ[i]['date']}</p>
                                  <a ${j_in_url}}">More Details</a>
                              </div>
                          </div>
                      </li>`;
               });
               resultJhtml += `</ul>`;
                $('#saadriwrapper').html(resultJhtml);
                
                   $('#saadri-carousel').bxSlider({
                        auto: true,
                        infiniteLoop: true,
                        mode: 'vertical',
                        nextSelector: '#slider-next',
                        prevSelector: '#slider-prev',
                        pager: false,
                        slideMargin: 5,
                        speed: 3000,
                        touchEnabled: false,
                        adaptiveHeight:false
                    });
               
           }else{
               $('#saadripanel').hide();
           }
        }else if(statusJ == false){
            $('#saadripanel').hide();
            
        }
        /*Saadri*/


        /*Banner*/
        // console.log('Banner:'+JSON.stringify(resultH));
        var {path, data:dataH,status:statusH} = resultH;
        if(statusH === true){
             if(dataH.length > 0){
                 $('#bannerCarosule').html('');
                 var indicator = '';
                 var html      = '';
                 $.each(dataH,function(i){
                    html += `<div class="item">
                                <img src="${base_url}${path}${dataH[i]['images']}" style="width:100%">
                              </div>`;
                 });
                 // setTimeout(function(){
                      $('#bannerCarosule').html(html);
                      // $('#galleryindicators').html(indicator);
                      $('#bannerCarosule .item').first().addClass('active');
                      $('#bannerCarosule .carousel-indicators > li').first().addClass('active');
                      $("#bannerCarosule").carousel();
                 // }, 1000);
             }else{
                 // $('.donor-carousel-wrapper').hide();
             }
        }else if(statusH == false){
            $.toaster(messageH, 'Error', 'danger');
        }
        /*Banner*/

        /*Advertisement*/
        // console.log('resultI:'+JSON.stringify(resultI));
        var {path, image, status:statusI} = resultI;
        if(statusI === true){
            var html = `<img src="${base_url}${path}${image}"  style="width:100%;">`;
            $('#advertisement').html(html);
            // console.log('Before');
            $("#myPopup").modal('show');
            // console.log('After');
        }
        /*Advertisement*/
        // console.log( 'Async: Promises resolved: ', resultA, resultB );
};
$('#myPopup').on('show.bs.modal', function (e) {
  resizePopup();
})

function resizePopup(){
    var w_w = $(window).width();   // returns width of browser viewport
    var w_h = $(window).height();   // returns heightof browser viewport
    // console.log('Window :'+w_w+ ' x '+ w_h);
    var r_h = parseInt(w_w / 9 * 13);
    var r_w = parseInt(w_h / 13 * 9);
    // console.log('Required :'+r_w+ ' x '+ r_h);
    if(r_h < w_h){
        r_h = r_h - 20;
        r_w = w_w - 20;
    }else{
        r_h = w_h - 20;
        r_w = r_w - 20;
    }
    // console.log('Final  :'+r_w+ ' x '+ r_h);
    $('#MyAdd').css('height',r_h+'px');
    $('#MyAdd').css('width',r_w+'px');
    $('#MyAdd').css('margin-top','10px');
}

$( window ).resize(function() {
  resizePopup();
});
const promiseAsync = getPromiseAsync();