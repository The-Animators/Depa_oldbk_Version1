'use strict';

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
                swal("Help Us Successfully Deleted! ", {
                    icon: "success",
                    timer: 1500,
                });
            }else if(status == false){
                // $.toaster(message, 'Error', 'danger');
                swal("Eroror On Deleteing "+modaltitle+"!", {
                    icon: "danger",
                    timer: 1500,
                });
                return false;
            }
        },error: function(){}
   });
}

function calllist(){

    $('#myTable').DataTable({
            destroy:true,
            dom: 'lBfrtip',
            buttons: [
                'copy', 'csv',  'print'
            ],
            'ajax': {
                "type": "GET",
                "url": base_url + 'Api/helpus/list',
            },

            "order": [
                [ 7, "desc" ]
            ],

            'columns': [
                /*{
                    'data': 'image',
                    'render': function(data, type, row, meta) {
                        let action ='<img src="'+base_url+'uploads/helpus/'+row.image+'" style="height:50px">';
                        return action;
                    }
                },*/
                {'data': 'contact_person'},
                {'data': 'help_for'},
                {'data': 'title'},
                {'data': 'details'},
                {'data': 'contact_number'},
                {'data': 'created_date'},
                {'data': 'created_date'},
                {
                    'data': 'deleted',
                    'render': function(data, type, row, meta) {
                        let action = '';
                        if(row.status==0){
                            
                            /*action = `
                                <button data-id='${row.id}' type="button" href="javascript:void(0)" class="btn btn-success approve">Approve</button>
                                <button data-id='${row.id}' type="button" href="javascript:void(0)" class="btn btn-danger reject">Cancel</button>
                            `;*/
                            
                            action = `
                               <a type="button" class="btn btn-sm btn-success" href="helpus_view/${row.id}"> Go to Approval </a>
                            `;
                            
                        }else if(row.status== 1){
                            action = `<span class="badge badge-success">Approved</span> <a type="button" class="badge badge-primary" href="helpus_view/${row.id}/view"> Show Details</a>`;
                        }else if(row.status== 2){
                            action = `<span class="badge badge-danger">Canceled</span> <a type="button" class="badge badge-primary" href="helpus_view/${row.id}/view"> Show Details </a>`;
                        }
                            
                        return action;
                    }
                }
            ]
        });
}

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
        url     : base_url+"Api/helpus/"+type,
        data    : {id:id},
        dataType: 'json',
        success : function(resData){
            var {status, validate, data} = resData;
            if(status === true){
                $.toaster(data, 'Success', 'success');
                calllist();
            }else if(status == false){
                $.toaster(data, 'Error', 'danger');
                return false;
            }
        },error: function(){
            $.toaster(data, 'Error', 'danger');
        }
   });
}

