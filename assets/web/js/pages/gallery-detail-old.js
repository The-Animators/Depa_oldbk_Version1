'use strict';

getgallery();

async function getgallery() {
    $.ajax({
        type    : "GET",
        url     : base_url+"Api/gallery/detail/"+$('#slug').val(),
        dataType: 'json',
        success : function(resData){
            // console.log(JSON.stringify(resData));
            var {status, data} = resData;
            if(status === true){
               if(data.length > 0){
                   var title = $('#gallerytitle').val();
                   $('#gallerywrapper').html('');
                   var html = '';
                   html += `
                         <div class="col-md-12">
                         <div id="grid" class="masonry-gallery grid-four-item clearfix">
                       `;
                   $.each(data,function(i){
                       html += `
                            <div class="isotope-item creative corporate">
                              <div class="gallery-thumb">
                                  <img class="img-responsive img-whp" src="${base_url}uploads/gallery/${data[i]['image']}" alt="${title}">
                                  <div class="overlayer">
                                      <div class="lbox-caption">
                                          <div class="lbox-details">
                                              <ul class="list-inline">
                                                  <li>
                                                      <a class="popup-img" href="${base_url}uploads/gallery/${data[i]['image']}" title="${title}"><span class="flaticon-add-square-button"></span></a>
                                                  </li>
                                              </ul>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                           `
                   });
                   html +=`</div></div>`
                   $('#gallerywrapper').html(html);
                   getmansonary();
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

async function getmansonary(){
  // $(window).load(function() {
      $('.masonry-gallery').fadeIn();
      var $container = $('.masonry-gallery').isotope({
          itemSelector: '.isotope-item',
          layoutMode: 'masonry',
          transitionDuration: '1s',
          filter: "*"
      });
      $('.masonry-grid').isotope({
          itemSelector: '.masonry-grid-item',
          layoutMode: 'masonry'
      });
      $('.masonry-grid-fitrows').isotope({
          itemSelector: '.masonry-grid-item',
          layoutMode: 'fitRows'
      });
      // filter items on button click
      $('.masonry-filter').on( 'click', 'li a', function() {
          var filterValue = $(this).attr('data-filter');
          $(".masonry-filter").find("a.active").removeClass("active");
          $(this).parent().addClass("active");
          $container.isotope({ filter: filterValue });
          return false;
      });

      await getpopupimg();
  // });      
}

function getpopupimg(){
  $(".popup-img").magnificPopup({
      type:"image",
      gallery: {
          enabled: true,
      }
  });
  $(".popup-img-single").magnificPopup({
      type:"image",
      gallery: {
          enabled: false,
      }
  });
  $('.popup-iframe').magnificPopup({
      disableOn: 700,
      type: 'iframe',
      preloader: false,
      fixedContentPos: false
  });
  $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
    disableOn: 700,
    type: 'iframe',
    mainClass: 'mfp-fade',
    removalDelay: 160,
    preloader: false,
    fixedContentPos: false
  });
}