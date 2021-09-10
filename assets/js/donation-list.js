'use strict';
var modaltitle = 'Member';
$(document).ready(function () {
    calllist();   
});

$(document).on("click", ".delete" , function(e) { 
    var id  = $(this).data('id');
    showConfirmMessage(id)
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
    var table = $('#myTable').DataTable({
        destroy:true,
        dom: 'lBfrtip',
        buttons: [
            'copy', 'csv',  'print'
        ],
        'ajax': {
            "type": "GET",
            "url": base_url + 'Api/donation/list/',
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
                            <a data-id='${row.id}' href="javascript:void(0)" class="approve"><i style="color:green!important" class="zmdi zmdi-hc-fw zmdi-check-circle pad-left-5" title="Approve"></i> </a>
                            <a data-id='${row.id}' href="javascript:void(0)" class="reject"><i style="color:red!important" class="zmdi zmdi-hc-fw zmdi-close-circle" title="Reject"></i> </a>
                        `;
                    }else if(row.status== 1){
                        action = '<span class="badge badge-success">Approved</span>'
                    }else if(row.status== 2){
                        action = '<span class="badge badge-danger">Rejected</span>'
                    }
                        
                    return action;
                }
            }
        ]
    });
}

$(document).on('click','.approve', function(){
    let id = $(this).data('id')
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
})

$(document).on('click','.reject', function(){
    let id = $(this).data('id')
    openModal('reject',id,'reject_donation_reason')
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