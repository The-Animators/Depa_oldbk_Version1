  (function($) {
    'use strict';
    $(document).on("click", ".togglebtn" , function(e) {
        var id = $(this).data('id')
        // alert(id);
        var top = $("#divpanel").offset().top;
        var header = $(".main-header-nav").height();
        // alert(header);
        top = top - header;
        $.when($('.collapsetab').fadeOut(500)).done(function() {
            $("#"+id).fadeIn(500);
            document.body.scrollTop = top;
            document.documentElement.scrollTop = top;
            // alert("Now all '.hotel_photo_select are hidden'");
        });
        // $(".collapsetab").fadeOut('slow');

    });

  })(jQuery);