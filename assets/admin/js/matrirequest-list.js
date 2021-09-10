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
        url     : base_url+"Api/matrirequiests/updatedelete",
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
                "url": base_url + 'Api/matrirequiests/list',
            },

            "order": [
                [ 1, "desc" ]
            ],

            'columns': [
                {'data': 'member_no'},
                {'data': 'name'},
                {'data': 'email'},
                {'data': 'phone'},
                {
                    'data': 'status',
                    'render': function(data, type, row, meta) {
                        let action0 = '';
                        if(row.status==0){
                            action0 = '<span class="badge badge-warning">Pending</span>'
                        }else if(row.status== 1){
                            action0 = '<span class="badge badge-success">Sent</span>'
                        }else if(row.status== 2){
                            action0 = '<span class="badge badge-danger">Cancelled</span>'
                        }
                            
                        return action0;
                    }
                },
                {'data': 'created'},
                {
	                'data': 'deleted',
	                'render': function(data, type, row, meta) {
	                    let action = '';

	                    if(row.status==0){
                            action = `
	                        	<button data-id='${row.id}' type="button" href="javascript:void(0)" class="btn btn-success approve">Sent</button>
                                <button data-id='${row.id}' type="button" href="javascript:void(0)" class="btn btn-warning reject">Cancel</button>
                                <button data-id='${row.id}' type="button" href="javascript:void(0)" class="btn btn-danger delete">Delete</button>
	                        `;
                        }else if(row.status== 1){
                            action = `
                                <button data-id='${row.id}' type="button" href="javascript:void(0)" class="btn btn-danger delete">Delete</button>
	                        `;
                        }else if(row.status== 2){
                            action = `
                                <button data-id='${row.id}' type="button" href="javascript:void(0)" class="btn btn-danger delete">Delete</button>
	                        `;
                        }


	                        /*action = `
	                        	<button data-id='${row.id}' type="button" href="javascript:void(0)" class="btn btn-success approve">Sent</button>
                                <button data-id='${row.id}' type="button" href="javascript:void(0)" class="btn btn-warning reject">Cancel</button>
                                <button data-id='${row.id}' type="button" href="javascript:void(0)" class="btn btn-danger delete">Delete</button>
	                        `;*/

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
        url     : base_url+"Api/matrirequiests/"+type,
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

