'use strict';
var modaltitle = 'Job';
var jobstatus = $('#jobstatus').val();
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
        url     : base_url+"Api/job/"+id,
        dataType: 'json',
        success : function(resData){
            var {status, message} = resData;
            if(status === true){
                // $.toaster(message, 'Success', 'success');
                calllist();
                $("#Modal #id").val(0);
                $("#Modal").modal('hide');
                swal(modaltitle+" Successfully Deleted! ", {
                    icon: "success",
                    timer: 2000,
                });
            }else if(status === false){
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

$(document).on("click", "#openmodal" , function(e) {
    $("#Modal").modal('show');
    $("#defaultModalLabel").html(`New ${modaltitle}`);
    $("#save").html(` SAVE ${modaltitle} <i class="zmdi zmdi-save"></i> `);
});


function calllist(){
    // alert(base_url+'Api/donationcategory/list');
    var table = table = $('#myTable').DataTable({
        destroy:true,
        "processing": true,
        "language": {
            "processing": `<img src="${base_url}/assets/admin/images/loading.gif">`
        },
        aaSorting: [],
        
        dom: 'lBfrtip',
        buttons: [
            'copy', 'csv',  'print'
        ],
        'ajax': {
            "type": "GET",
            //"url": base_url + 'Api/job/'+jobstatus,
            "url": base_url + 'Api/job/'+jobstatus,
        },

        'columns': [
            { 'data': 'firm_name' },
            { 'data': 'designation' },
            { 'data': 'contact_person' },
            { 'data': 'contact_number' },
            { 'data': 'contact_email' },
            { 'data': 'start_date' },
            { 'data': 'end_date' },
            {
                'data': 'salary_range_start',
                'render': function(data, type, row, meta) {
                    let salary = ` ${row.salary_range_start} - ${row.salary_range_end} `;
                    return salary;
                }
            },
            { 'data': 'experience' },
            { 'data': 'status',
            
                'render': function(data, type, row, meta) {
                    let action = `
                    '${row.status}'
                    <p>${row.can_reason}</p>
                    `;
                    return action;
                }
            },
            { 'data': 'uploaded_by' },
            {
                'data': 'status',
                'render': function(data, type, row, meta) {
                    let action = `
                    <a href="${base_url}admin/job/edit/${row.id}"> <i class="zmdi zmdi-edit" title="Edit"></i> </a>
                    <a data-id='${row.id}' href="javascript:void(0)" class="delete"><i class="zmdi zmdi-delete pad-left-5" title="Delete"></i> </a>
                    `;
                    return action;
                }
            }
        ], // columns
    });
}

$(document).on("click", ".getdetail" , function(e) {
    $('#defaultModalLabel').html("Edit "+modaltitle);
    $('#save').html(` Edit ${modaltitle} <i class="zmdi zmdi-save"></i> `);
    var id = $(this).data('id');
    e.preventDefault();
    $("#toaster").remove();
    $.ajax({
        type    : "GET",
        url     : base_url+"Api/village/"+id,
        dataType: 'json',
        success : function(resData){
            // console.log(resData);
            var {status,message,data} = resData;
            if(status === true){
                // $.toaster(message, 'Success', 'success');
                $("#Modal #id").val(data[0].id);
                $("#Modal #village").val(data[0].village);
                $("#Modal").modal('show');
            }else if(status == false){
                $.toaster(message, 'Error', 'danger');
                return false;
            }
        },error: function(){}
   });
   return false;  //stop the actual form post !important!
});
