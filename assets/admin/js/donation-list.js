'use strict';
var status = $('#status').val()
var modaltitle = 'Member';
$(document).ready(function () {
    calllist();   
});

$(document).on("click", ".delete" , function(e) { 
    var id  = $(this).data('id');
    showConfirmMessage(id);
});

function confirmdelete(id){
    $.ajax({
        type    : "DELETE",
        url     : base_url+"Api/donation/"+id,
        dataType: 'json',

        success : function(resData){
            var {status, message} = resData;
            if(status === true){
                // $.toaster(message, 'Success', 'success');
                calllist();
                blankform();
                $("#Modal #id").val(0);
                $("#Modal").modal('hide');
                swal(modaltitle+" Successfully Deleted! ", {
                    icon: "success",
                    timer: 2000,
                });
            }else if(status == false){
                // $.toaster(message, 'Error', 'danger');
                swal("Eroror On Deleteing "+modaltitle+"!", {
                    icon: "danger",
                    timer: 2000,
                });
                return false;
            }
        },error: function(){}
   });
}

function calllist(){
    // alert(base_url+'Api/bloodgroup/list');
    if (status != 'approve') {
        var table = $('#myTable').DataTable({
            destroy:true,
            dom: 'lBfrtip',
            buttons: [
                'copy', 'csv',  'print'
            ],
            'ajax': {
                "type": "GET",
                "url": base_url + 'Api/donation/list/'+status,
            },
            "order": [[ 7, "desc" ]],
            'columns': [
                {'data': 'donor_name'},
                {'data': 'contact_number'},
                {'data': 'amount'},
                {'data': 'pan_number'},
                {
                    'data': 'deleted',
                    'render': function(data, type, row, meta) {
                        let camount =''
                        $.each(JSON.parse(row.category_amount), function(i, item) {
                            if(item !=0){
                                camount += `${i} : ${item} <br>`;
                            }
                        });
                        // let action = `${row.category_amount}`;
                        return camount;
                    }
                },
                {'data': 'refernumber',
                    'render': function(data, type, row, meta) {
                        let reason =''
                        reason = `<span class="badge badge-primary">Refrence No: '${row.refernumber}'</span> <br> <p>Reason: '${row.reason}'</p>`
                        return reason;
                    }
                },
                {'data': 'cancel_reason'},
                {'data': 'added_date'},
                {
                    'data': 'deleted',
                    'render': function(data, type, row, meta) {
                        let action = '';
                        if(row.status==0){
                            action = `
                                <button data-id='${row.id}' type="button" href="javascript:void(0)" class="btn btn-success approve">Approve</button>
                                <button data-id='${row.id}' type="button" href="javascript:void(0)" class="btn btn-danger reject">Cancel</button>
                            `;
                        }else if(row.status== 1){
                            //action = '<span class="badge badge-success">Approved</span>'
                            action = `<span class="badge badge-success">Approved</span> <br> <a download href='../uploads/receipts/${row.recept_number}' >Download Receipt</a>`
                        }else if(row.status== 2){
                            action = '<span class="badge badge-danger">Canceled</span>'
                        }
                            
                        return action;
                    }
                }
            ]
        });
    }else{
        var table = $('#myTable').DataTable({
            destroy:true,
            dom: 'lBfrtip',
            buttons: [
                'copy', 'csv',  'print'
            ],
            'ajax': {
                "type": "GET",
                "url": base_url + 'Api/donation/list/'+status,
            },
            'columns': [
                {'data': 'donor_name'},
                {'data': 'contact_number'},
                {'data': 'amount'},
                {'data': 'pan_number'},
                {
                    'data': 'deleted',
                    'render': function(data, type, row, meta) {
                        let camount =''
                        $.each(JSON.parse(row.category_amount), function(i, item) {
                            if(item !=0){
                                camount += `${i} : ${item} <br>`;
                            }
                        });
                        // let action = `${row.category_amount}`;
                        return camount;
                    }
                },
                {'data': 'refernumber'},
                {'data': 'added_date'},
                {
                    'data': 'deleted',
                    'render': function(data, type, row, meta) {
                        let action = '';
                        if(row.status==0){
                            action = `
                                <button data-id='${row.id}' type="button" href="javascript:void(0)" class="btn btn-success approve">Approve</button>
                                <button data-id='${row.id}' type="button" href="javascript:void(0)" class="btn btn-danger reject">Cancel</button>
                            `;
                        }else if(row.status== 1){
                            action = '<span class="badge badge-success">Approved</span>'
                        }else if(row.status== 2){
                            action = '<span class="badge badge-danger">Canceled</span>'
                        }
                            
                        return action;
                    }
                }
            ]
        });
    }
}

$(document).on('click','.approve', function(){
    let id = $(this).data('id');

    swal({
        title: "Are you sure?",
        text: "You want to approve!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {

            donation_approved(id);

        }/* else {
            swal("Your imaginary file is safe!", {
                icon: "success",
                button: true,
            });
        }*/
    });

    //donation_approved(id);

})

function donation_approved(id) {
    $.ajax({
        type    : "POST",
        url     : base_url+"Api/donation/approved",
        data    : {id:id},
        dataType: 'json',
        success : function(resData){
            var {status, validate, message} = resData;
            if (validate === true) {
                if(status === true){
                    $.toaster(message, 'Success', 'success');
                    calllist();
                }else if(status == false){
                    $.toaster(message, 'Error', 'danger');
                    return false;
                }
            }
        },error: function(){
        }
   });
}

$(document).on('click','.reject', function(){
    let id = $(this).data('id')
    openModal('reject', id, 'donation_cancel_reason')
})

$(document).on('click','#updateData', function(){
    $.ajax({
        type    : "POST",
        url     : base_url+"Api/donation/reject",
        data    : $('#formData').serialize(),
        dataType: 'json',
        success : function(resData){
            var {status, validate, message} = resData;
            if (validate === true) {
                if(status === true){
                    $.toaster(message, 'Success', 'success');
                    calllist();
                    closemodel();
                    $('#myModal').modal('hide')
                }else if(status == false){
                    $.toaster(message, 'Error', 'danger');
                    return false;
                }
                
                
            }else{
                $.each(message, function(key, value) {
                    if(value!=''){
                        $.toaster(value, 'Error', 'danger');
                        $("#cancel_reason").focus();
                        return false;
                    }
                });
            }
        },error: function(){

        }
   });
})

function closemodel(){
    $('.close').click();    
}
