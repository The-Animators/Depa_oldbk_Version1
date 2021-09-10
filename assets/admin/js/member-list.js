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
        type    : "POST",
        url     : base_url+"Api/member/delete/",
        data    : {member_id : id,reason : 'Admin Delete'},   
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

    $('#myTable thead th').each(function() {
       var title = $(this).text();
       $(this).html(title+' <input type="text" class="col-search-input" placeholder="Search '+ title +'"/>');
    });
    var table = $('#myTable').DataTable({
        destroy:true,
        "processing": true,
        "language": {
            "processing": `<img src="${base_url}/assets/admin/images/loading.gif">`
        },
        aaSorting: [],
        dom: 'lBfrtip',
        buttons: [
            'copy', 'csv',  'print', 'colvis'
        ],
        'ajax': {
            "type": "GET",
            "url": base_url + 'Api/member/getlist',
        },
        'columns': [
            { 'data': 'member_no' },
            { 'data': 'fullname' },
            { 'data': 'contact' },
            { 'data': 'email' },
            { 'data': 'dob' },
            { 'data': 'sex' },
            { 'data': 'relation' },
            { 'data': 'maritalstatus' },
            { 'data': 'education' },
            { 'data': 'occupation' },
            { 'data': 'dharmikknowledge' },
            { 'data': 'live_type' },
            { 'data': 'fm_status',
                'render': function(data, type, row, meta) {
                    if (row.fm_status == 0) {
                        let action = `<a onclick="approve_member(${row.id});" href="javascript:;"> <span class="badge badge-warning">Pending</span> </a>`;
                        return action;
                    }else if (row.fm_status == 1){
                        let action = `<span class="badge badge-success">Approved</span>`;
                        return action;
                    }else{
                        let action = `<span class="badge badge-danger">Rejected</span>`;
                        return action;
                    }
                    
                }
            }
            /*{ 'data': 'email',
                'render': function(data, type, row, meta) {
                    let action = `
                    <a href="${base_url}admin/family/edit-member/${row.id}"> <i class="zmdi zmdi-edit" title="Edit"></i> </a>
                    <a data-id='${row.id}' href="javascript:void(0)" class="delete"><i class="zmdi zmdi-delete pad-left-5" title="Delete"></i></a>
                    `;
                    return '';
                }
            }*/

        ]
    });
    
    table.column().every(function () {
        var table = this;
        $('input', this.header()).on('keyup change', function() {
            if (table.search() !== this.value){
                table.search(this.value).draw();
            }
        });
    });
    
}

function approve_member(id) {
    //alert(argument);
    $.ajax({
        type    : "POST",
        url     : base_url+"Api/member/approve",
        data    : {id : id},
        dataType: 'json',
        success : function(resData){
            var {status,message,data} = resData;
            if(status === true){
                $.toaster(message, 'Approved Success', 'success');
            }else if(status == false){
                $.toaster(message, 'Error', 'danger');
                return false;
            }
        },error: function(){
            $.toaster(message, 'Error', 'danger');
        }
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