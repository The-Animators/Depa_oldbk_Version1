'use strict';

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
        url     : base_url+"Api/donors/donors/"+id,
        dataType: 'json',
        success : function(resData){
            var {status,message} = resData;
            if(status === true){
                // $.toaster(message, 'Success', 'success');
                calllist();
                blankform();
                $("#Modal #id").val(0);
                $("#Modal").modal('hide');
                swal("Donor Successfully Deleted! ", {
                    icon: "success",
                    timer: 2000,
                });
            }else if(status == false){
                // $.toaster(message, 'Error', 'danger');
                swal("Eroror On Deleteing Donor! ", {
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
            "url": base_url + 'Api/donors',
        },
        'columns': [
            {'data': 'donor_title'},
            {'data': 'donor_image',
                'render': function(data, type, row, meta) {
                    var donor_image = '<img src="'+base_url+'uploads/donors/'+row.donor_image+'" style="height:50px">'
                    return donor_image;
                }
            },
            {'data': 'category'},
            {
                'data': 'deleted',
                'render': function(data, type, row, meta) {
                    let action = '';
                        action = `
                            <a data-id='${row.id}' href="${base_url}admin/donor/new/${row.id}" class="editdonor"> <i class="zmdi zmdi-edit" title="Edit"></i> </a>
                            <a data-id='${row.id}' href="javascript:void(0)" class="delete"><i class="zmdi zmdi-delete pad-left-5" title="Delete"></i> </a>
                        `;
                    return action;
                }
            }
        ]
    });
}

$(document).on("click", ".getdetail" , function(e) {
    $('#defaultModalLabel').html("Edit "+modaltitle);
    $('#save').text("EDIT "+modaltitle);
    var id = $(this).data('id');
    e.preventDefault();
    $("#toaster").remove();
    $.ajax({
        type    : "GET",
        url     : base_url+"Api/bloodgroup/list/"+id,
        dataType: 'json',
        success : function(resData){
            // console.log(resData);
            var {status,message,data} = resData;
            if(status === true){
                // $.toaster(message, 'Success', 'success');
                $("#Modal #id").val(data[0].id);
                $("#Modal #bloodgroup").val(data[0].bloodgroup);
                $("#Modal").modal('show');
            }else if(status == false){
                $.toaster(message, 'Error', 'danger');
                return false;
            }
        },error: function(){}
   });
   return false;  //stop the actual form post !important!
});


