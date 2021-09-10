'use strict';
$("#myMTable").find("th:eq(" + 1 + ")").remove();
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
        url     : base_url+"Api/marannondh/marannondh/"+id,
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
    //$('#myTable').DataTable({
    var table = $('#myMTable').DataTable({
        destroy: true,
        dom: 'lBfrtip',
        buttons: [
            'copy', 'csv',  'print'
        ],
        'ajax': {
            "type": "GET",
            "url": base_url + 'Api/marannondh',
        },
        'columns': [
            {'data': 'fullname'},
            {'data': 'image',
                'render': function(data, type, row, meta) {
                    var image = '<img src="'+base_url+'uploads/marannondh/'+row.image+'" style="height:50px">'
                    return image;

                }
            },
            {'data': 'contact'},
            {'data': 'date'},
            {
                'data': 'deleted',
                'render': function(data, type, row, meta) {
                    let action = '';
                        action = `
                            
                            <a data-id='${row.id}' href="javascript:void(0)" class="delete"><i class="zmdi zmdi-delete pad-left-5" title="Delete"></i> </a>
                        `;
                    return action;
                } 
                //  <a data-id='${row.id}' href="${base_url}admin/marannondh/new/${row.id}" class="editdonor"> <i class="zmdi zmdi-edit" title="Edit"></i> </a>
            }
        ]
    });

}
