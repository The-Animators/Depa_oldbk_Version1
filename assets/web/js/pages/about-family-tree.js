  (function($) {
    'use strict';
    $("#english").hide();
    
    $("#btnguj").click(function () {
        $("#english").hide();
        $("#gujarati").show();
    });
    $("#btneng").click(function () {
        $("#gujarati").hide();
        $("#english").show();
    });
    
    $('#collapseOne, #collapseTwo, #collapseThree').on({
      'show.bs.collapse': function() {
        $('a[href="#' + this.id + '"] span.glyphicon-chevron-down')
          .removeClass('glyphicon-chevron-down')
          .addClass('glyphicon-chevron-up');
      },
      'hide.bs.collapse': function() {
        $('a[href="#' + this.id + '"] span.glyphicon-chevron-up')
          .removeClass('glyphicon-chevron-up')
          .addClass('glyphicon-chevron-down');
      }
    });
    
  })(jQuery);