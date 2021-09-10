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
        type    : "POST",
        url     : base_url+"Api/matrimonial/updatedelete",
        data    : {id, id},
        dataType: 'json',
        success : function(resData){
            var {status, validate, message} = resData;
            if (validate === true) {
                if(status === true){
                    $.toaster(message, 'Success', 'success');
                    calllist();
                	blankform();
                    // setTimeout(function(){
                    //     location.reload();
                    // }, 1500);
                }else if(status == false){
                    $.toaster(message, 'Error', 'danger');
                    return false;
                }
                
            } else{
                $.toaster("Failed to delete", 'Error', 'danger');
            }
        },error: function(){
            
        }
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
                "url": base_url + 'Api/matrimonial/list',
            },

            "order": [
                [ 1, "desc" ]
            ],

            'columns': [
                {'data': 'member_no'},
                {'data': 'fullname'},
                {'data': 'email'},
                {'data': 'created_on'},
                {
                    'data': 'status',
                    'render': function(data, type, row, meta) {
                        let action0 = '';
                        if(row.status==0){
                            action0 = '<span class="badge badge-warning">Pending</span>'
                        }else if(row.status== 1){
                            action0 = '<span class="badge badge-success">Approved</span>'
                        }else if(row.status== 2){
                            action0 = '<span class="badge badge-danger">Canceled</span>'
                        }
                            
                        return action0;
                    }
                },
                {
	                'data': 'deleted',
	                'render': function(data, type, row, meta) {
	                    let action = '';
	                        action = `
	                            <a data-id='${row.matrimonial_id}' href="${base_url}admin/matrimonial_view/${row.member_no}" class="editdonor"> <i class="zmdi zmdi-eye" title="View"></i> </a>
	                            <a data-id='${row.matrimonial_id}' href="javascript:void(0)" class="delete"><i class="zmdi zmdi-delete pad-left-5" title="Delete"></i> </a>
	                        `;
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
        url     : base_url+"Api/matrimonial/"+type,
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

