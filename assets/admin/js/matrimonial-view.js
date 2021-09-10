'use strict';

$(document).on('click','.approve', function(){
    let id = $(this).data('id');

    swal({
        title: "Are you sure?",
        text: "You want to approve!",
        icon: "success",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            reject_approved(id, 'approved');
        }
    });

});


$(document).on('click','.reject', function(){
    let id = $(this).data('id');

    swal({
        title: "Are you sure?",
        text: "You want to reject!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            reject_approved(id, 'reject');
        }
    });

});

function reject_approved(id, type) {
    $.ajax({
        type    : "POST",
        url     : base_url+"Api/matrimonial/"+type,
        data    : {id:id},
        dataType: 'json',
        success : function(resData){
            var {status, validate, data} = resData;
            if(status === true){
                $.toaster(data, 'Success', 'success');
                setTimeout(function(){
                    window.location = base_url+'admin/matrimonial';
                }, 1500);
            }else if(status == false){
                $.toaster(data, 'Error', 'danger');
                return false;
            }
        },error: function(){
            $.toaster(data, 'Error', 'danger');
        }
   });
}

