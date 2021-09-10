$(function () {
    $("#start_date").datepicker({
      format:'Y-m-d',
      changeMonth: true,
      changeYear: true,
        onSelect: function (selected) {
            var dt = new Date(selected);
            dt.setDate(dt.getDate() + 1);
            $("#end_date").datepicker("option", "minDate", dt);
        }
    });
    $("#end_date").datepicker({
          format:'Y-m-d',
          changeMonth: true,
          changeYear: true,
        onSelect: function (selected) {
            var dt = new Date(selected);
            dt.setDate(dt.getDate() - 1);
            $("#start_date").datepicker("option", "maxDate", dt);
        }
    });
});

$(document).on("click", "#submitb2b" , function(e) {
    e.preventDefault();
    var btnid = 'submitb2b';
    var id    = $('#id').val();
    $("#toaster").remove();
    var FormId    = $(this).data('form');
    var formdata  = $("#"+FormId+" :input").serialize();
    $.ajax({
        type    : "POST",
        url     : base_url+"Api/job",
        data    : formdata,
        dataType: 'json',
        beforeSend: function() {
            $("#"+btnid).startLoading();
        },
        success : function(resData){
            var {status,validate,message} = resData;
            if (validate === true) {
                if(status === true){
                    $.toaster(message, 'Success', 'success');
                    $("#"+FormId).trigger("reset");
                }else if(status == false){
                    $.toaster(message, 'Error', 'danger');
                    return false;
                }
            } else{
                $.each(message, function(key, value) {
                    if(value!=''){
                        $.toaster(value, 'Error', 'danger');
                        $("#"+FormId+" input[name="+key+"], #"+FormId+" textarea[name="+key+"]").focus();
                        return false;
                    }
                });
            }
        }, error: function(){
            $("#"+btnid).stopLoading();
        }, complete:function(data){
            $("#"+btnid).stopLoading();
        }
   });
   
});