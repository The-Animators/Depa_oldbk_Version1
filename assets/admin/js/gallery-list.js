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
        url     : base_url+"Api/gallery/gallery/"+id,
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
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'print'
        ],
       "responsive": true,
       "destroy": true,
        "ajax": ({
            "type": "GET",
            "url": base_url+'Api/gallery',
        }),
        columns: [
            { data: "title"},
            { data: "thumbnail"},
            { data: "id" },
        ],
        "fnRowCallback": function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
            let action = `
                    <a data-id='${aData['id']}' href="${base_url}admin/gallery/new/${aData['id']}" class="editdonor"> <i class="zmdi zmdi-edit" title="Edit"></i> </a>
                    <a data-id='${aData['id']}' href="javascript:void(0)" class="delete"><i class="zmdi zmdi-delete pad-left-5" title="Delete"></i> </a>
                    `;
            $('td:eq(0)', nRow).html(aData['title']);
            $('td:eq(1)', nRow).html('<img src="'+base_url+'uploads/gallery/'+aData['thumbnail']+'" style="height:50px;">');
            $('td:eq(2)', nRow).html(action);
        }
    });
}
