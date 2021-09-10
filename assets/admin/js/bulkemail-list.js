'use strict';

$(document).ready(function () {
    calllist();   
});


function calllist(){
    var table = $('#myTable').DataTable({
        destroy:true,
        dom: 'lBfrtip',
        buttons: [
            'copy', 'csv',  'print'
        ],
        'ajax': {
            "type": "GET",
            "url": base_url + 'Api/bulkemail',
        },
        'columns': [
            {'data': 'type'},
            {'data': 'subject'},
            // {'data': 'emails'},
            {'data': 'message'},
            {'data': 'added_on'}
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


