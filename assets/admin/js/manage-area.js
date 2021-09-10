'use strict';
var modaltitle = 'Area';
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
        url     : base_url+"Api/area/area/"+id,
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

$(document).on("click", "#openmodal" , function(e) {
    $("#Modal").modal('show');
    $("#defaultModalLabel").html('New '+modaltitle);
    $("#save").text('SAVE '+modaltitle);
});

$(document).on("click", "#save" , function(e) {
    e.preventDefault();
    $("#toaster").remove();
    var formdata = $("#Modal :input").serialize();
    // alert(base_url+"Api/login/signin");
    $.ajax({
        type    : "POST",
        url     : base_url+"Api/area/save",
        data    : formdata,
        dataType: 'json',
        success : function(resData){
            var {status,validate,message} = resData;
            if (validate === true) {
                if(status === true){
                    $.toaster(message, 'Success', 'success');
                    calllist();
                    blankform();
                    $("#Modal #id").val(0);
                    $("#Modal").modal('hide');
                }else if(status == false){
                    $.toaster(message, 'Error', 'danger');
                    return false;
                }
            } else{
                $.each(message, function(key, value) {
                    if(value!=''){
                        $.toaster(value, 'Error', 'danger');
                        $("#Modal input[name="+key+"]").focus();
                        return false;
                    }
                });
            }
        },error: function(){}
   });
   return false;  //stop the actual form post !important!
});

function calllist(){
    // alert(base_url+'Api/area/list');
    var table = $('#myTable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv',  'print'
        ],
       "responsive": true,
       "destroy": true,
        "ajax": ({
            "type": "GET",
            "url": base_url+'Api/area/list',
        }),
        columns: [
            { data: "area" },
            { data: "area" },
        ],
        "fnRowCallback": function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
            let action = `
                    <a data-id='${aData['id']}' href="javascript:void(0)" class="getdetail"> <i class="zmdi zmdi-edit" title="Edit"></i> </a>
                    <a data-id='${aData['id']}' href="javascript:void(0)" class="delete"><i class="zmdi zmdi-delete pad-left-5" title="Delete"></i> </a>
                    `;
            $('td:eq(0)', nRow).html(aData['area']);
            $('td:eq(1)', nRow).html(action);
        },
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
        url     : base_url+"Api/area/list/"+id,
        dataType: 'json',
        success : function(resData){
            // console.log(resData);
            var {status,message,data} = resData;
            if(status === true){
                // $.toaster(message, 'Success', 'success');
                $("#Modal #id").val(data[0].id);
                $("#Modal #area").val(data[0].area);
                $("#Modal").modal('show');
            }else if(status == false){
                $.toaster(message, 'Error', 'danger');
                return false;
            }
        },error: function(){}
   });
   return false;  //stop the actual form post !important!
});


