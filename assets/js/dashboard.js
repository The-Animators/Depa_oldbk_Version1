Webcam.set({
	width: 320,
	height: 240,
	image_format: 'jpeg',
	jpeg_quality: 90
});
try {
	Webcam.attach('#my_camera');
} catch (exp) {
	console.error(exp);
	$Error("Webcam access error! Try to use https:// protocol");
}

$("#sendtestemail").on("click", function(e) {
    $('#sendtestemail').prop('disabled',true);
    e.preventDefault();
    $("#toaster").remove();
    $.ajax({
        url:base_url+'Api/general/sendtestemail',
        type: 'post',
        data: $('#email-form').serialize(),
        dataType:'json',    
        success : function(resData){
            // alert(resData);
            var {status,validate,message,mailerror} = resData;
            if (validate === true) {
                if(status === true){
                    $.toaster(message, 'Success', 'success');
                    $('#sendtestemail').prop('disabled',false);
                    $("#testemailModal").modal('hide');
                    $("#testemailModal #sendto").val('');
                }else if(status == false){
                    let msg = mailerror.split("<br />");
                    $.toaster(msg[0], 'Error', 'danger');
                    // if(mailerror){
                    //     let msg = mailerror.split("<br />");
                    //     $('.emailerror').html(`<p class="error"> ${msg[0]}</p>`);
                    //     setTimeout(function(){ $('.emailerror').fadeOut('slow'); }, 3000);
                    // }
                    $('#sendtestemail').prop('disabled',false);
                    $('#testemailModal').modal('hide');
                    return false;
                }
            } else{
                $.each(message, function(key, value) {
                    if(value != ''){                       
                        $.toaster(value, 'Error', 'danger');
                        $("input[name="+key+"]").focus();
                        $('#sendtestemail').prop('disabled',false);
                        return false;
                    }
                });
            }
        },error: function (xhr, ajaxOptions, thrownError) {
            $('#sendtestemail').prop('disabled',false);
            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }        
    });
});

/*************Tables************/
function calllist(){
    // alert(base_url+'Api/donationcategory/list');
    var table = table = $('#jobsTable').DataTable({
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
            "url": base_url + 'Api/job/'+'all',
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
            { 'data': 'status' },
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