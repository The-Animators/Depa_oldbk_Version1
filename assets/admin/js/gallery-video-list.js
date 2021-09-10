'use strict';
var modaltitle = 'Gallery';

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
        url     : base_url+"Api/galleryvideo/gallery/"+id,
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
    var table = $('#myTable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'print'
        ],
       "responsive": true,
       "destroy": true,
        "ajax": ({
            "type": "GET",
            "url": base_url+'Api/galleryvideo',
        }),
        columns: [
            { data: "title"},
            { data: "link"},
            {
                'data': 'deleted',
                'render': function(data, type, row, meta) {
                    let action = '';
                        action = `
                            <a data-id='${row.id}' href="${base_url}admin/gallery_video/new/${row.id}" class="editdonor"> <i class="zmdi zmdi-edit" title="Edit"></i> </a>
                            <a data-id='${row.id}' href="javascript:void(0)" class="delete"><i class="zmdi zmdi-delete pad-left-5" title="Delete"></i> </a>
                        `;
                    return action;
                }
            }
        ],
    });
}
