'use strict';
$(document).on('change',"#amount", function(){
    panwrapper();
});

$(document).on('keyup',"#amount", function(){
    panwrapper();
});

function panwrapper(){
  var amount = $('#amount').val();
   if(parseInt(amount) < 100){
       $('#amount').focus();
      $.toaster('Minimum Amount Must Be 100', 'Error', 'danger');
   }else if(parseInt(amount) >= 50000){
      $('#pan_wrapper').show();
   }else{
      $('#pan_wrapper').hide();
   }
}

$(document).on("click", "#donate" , function(e) {
    $('#donate').prop('disabled',true);
    e.preventDefault();
    $("#toaster").remove();
    var formid   = $(this).data('form');
    var formdata = $("#"+formid+" :input").serialize();
    $.ajax({
        type    : "POST",
        url     : base_url+"Api/donation/save",
        data    : formdata,
        dataType: 'json',
        success : function(resData){
            var {status, validate, message} = resData;
            if (validate === true) {
                if(status === true){
                    $.toaster(message, 'Success', 'success');
                    $("#"+formid).trigger("reset");
                    $('#donate').prop('disabled',false);
                    $('#pan_wrapper').hide();
                }else if(status == false){
                    $.toaster(message, 'Error', 'danger');
                    $('#donate').prop('disabled',false);
                    return false;
                }
                
            } else{
                $.each(message, function(key, value) {
                    if(value != ''){
                        $.toaster(value, 'Error', 'danger');
                        $("#"+formid+" input[name="+key+"]").focus();
                        $('#donate').prop('disabled',false);
                        return false;
                    }
                });
            }
        },error: function(){
            $('#donate').prop('disabled',false);
        }
   });
   return false;  //stop the actual form post !important!
});

$(document).on('change', '#rnumber', function(){
  var val = $(this).val();
  if(val){
    $('#donate').prop('disabled', false)
  }else{
    $('#donate').prop('disabled', true)
  }
})

$(document).on('change', '.catamount', function(){
  calculateSumassured()
})

function calculateSumassured(){
  var total=0
  $('.catamount').each(function(){
        let gst = $(this).val();
        if(gst =='' || isNaN(gst)){
          gst = 0;
          $(this).val(0);
        }
        total = total + parseFloat(gst);

    })
  $('#amount').val(total);
      panwrapper();
}