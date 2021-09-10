$(document).ready(function () {
    calllist();   
});

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
            "url": base_url + 'Api/job/pending',
        },

        'columns': [
            { 'data': 'firm_name' },
            { 'data': 'contact_person' },
            { 'data': 'status' },
            {
                'data': 'status',
                'render': function(data, type, row, meta) {
                    let action = `
                    <a href="${base_url}admin/job/edit/${row.id}"> <i class="zmdi zmdi-edit" title="Edit"></i> </a>`;
                    return action;
                }
            }
        ], // columns
    });

    var table = table = $('#b2bTable').DataTable({
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
            "url": base_url + 'Api/b2b/pending',
        },

        'columns': [
            { 'data': 'firm_name' },
            { 'data': 'contact_person' },
            { 'data': 'status' },            {
                'data': 'status',
                'render': function(data, type, row, meta) {
                    let action = `
                    <a href="${base_url}admin/b2b/edit/${row.id}"> <i class="zmdi zmdi-edit" title="Edit"></i> </a>
                    `;
                    return action;
                }
            }
        ], // columns
    });

    var table = table = $('#blogsTable').DataTable({
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
            "url": base_url + 'Api/blog/list/pending',
        },

        'columns': [
            { 'data': 'title' },
            { 'data': 'description' },
            { 'data': 'status' },
            {
                'data': 'status',
                'render': function(data, type, row, meta) {
                    let action = `
                    <a href="${base_url}admin/blog/new/${row.id}"> <i class="zmdi zmdi-edit" title="Edit"></i> </a>`;
                    return action;
                }
            }
        ], // columns
    });

    var table = $('#myTable').DataTable({
            destroy:true,
            dom: 'lBfrtip',
            buttons: [
                'copy', 'csv',  'print'
            ],
            'ajax': {
                "type": "GET",
                "url": base_url + 'Api/donation/list/pending',
            },
            'columns': [
                {'data': 'donor_name'},
                
                {'data': 'amount'},
                
                {'data': 'refernumber'},
                {
                    'data': 'deleted',
                    'render': function(data, type, row, meta) {
                        let action = '';
                        if(row.status==0){
                            action = `
                                <button data-id='${row.id}' type="button" href="javascript:void(0)" class="btn btn-sm btn-success approve">Approve</button>
                                <button data-id='${row.id}' type="button" href="javascript:void(0)" class="btn btn-sm btn-danger reject">Cancel</button>`;
                        }
                            
                        return action;
                    }
                }
            ]
        });


        $('#membersTable').DataTable({
            destroy:true,
            dom: 'lBfrtip',
            buttons: [
                'copy', 'csv',  'print'
            ],
            'ajax': {
                "type": "GET",
                "url": base_url + 'Api/member/getpendinglist',
            },
            'columns': [
                {'data': 'first_name'},
                
                {'data': 'family_no'},
                
                {'data': 'updated_on'},
                {
                    'data': 'deleted',
                    'render': function(data, type, row, meta) {
                        let action = '';
                        
                        action = `
                        <a type="button" class="btn btn-sm btn-success" href="admin/family/approve-member/${row.id}"> Go to Approval </a>
                        `;
                            
                        return action;
                    }
                }
            ]
        });

        $('#spmeMembersTable').DataTable({
            destroy:true,
            dom: 'lBfrtip',
            buttons: [
                'copy', 'csv',  'print'
            ],
            'ajax': {
                "type": "GET",
                "url": base_url + 'Api/member/getSplitMergeHold',
            },
            'columns': [
                {'data': 'family_id'},
                
                // {'data': 'email'},
                
                {'data': 'split_created'},
                {
                    'data': 'deleted',
                    'render': function(data, type, row, meta) {
                        let action = '';
                        
                        action = `
                        <a type="button" class="btn btn-sm btn-success" href="javascript:;" onclick="approveSplit(${row.id});"> Approval </a>
                        <a type="button" class="btn btn-sm btn-danger" href="javascript:;" onclick="rejectSplit(${row.id});"> Reject </a>
                        `;
                            
                        return action;
                    }
                }
            ]
        });
        
        $('#mergeMembersTable').DataTable({
            destroy:true,
            dom: 'lBfrtip',
            buttons: [
                'copy', 'csv',  'print'
            ],
            'ajax': {
                "type": "GET",
                "url": base_url + 'Api/member/getMergeHold',
            },
            'columns': [
                {'data': 'membername'},
                
                {   'data': 'merge_user_data',
                    'render': function(data, type, row, meta) {
                        let users_info = `${row.merge_user_data}`;
                        return users_info;
                    }
                },
                
                {
                    'data': 'deleted',
                    'render': function(data, type, row, meta) {
                        let action = '';
                        
                        action = `
                        <a type="button" class="btn btn-sm btn-success" href="javascript:;" onclick="approveMerge(${row.id});"> Approval </a>
                        <a type="button" class="btn btn-sm btn-danger" href="javascript:;" onclick="rejectMerge(${row.id});"> Reject </a>
                        `;
                            
                        return action;
                    }
                }
            ]
        });
        
        
        /******************** HELP & MATRI *************************/

        $('#helpusTable').DataTable({
            destroy:true,
            dom: 'lBfrtip',
            buttons: [
                'copy', 'csv',  'print'
            ],
            'ajax': {
                "type": "GET",
                "url": base_url + 'Api/helpus/getPendingList',
            },
            'columns': [
                {'data': 'family_no'},

                {'data': 'contact_person'},
                
                {'data': 'created_date'},
                
                {
                    'data': 'deleted',
                    'render': function(data, type, row, meta) {
                        let action = '';
                        
                        action = `
                        <a type="button" class="btn btn-sm btn-success" href="admin/helpus_view/${row.id}"> Go to Approval </a>
                        `;
                            
                        return action;
                    }
                }
            ]
        });

        $('#matrimonialTable').DataTable({
            destroy:true,
            dom: 'lBfrtip',
            buttons: [
                'copy', 'csv',  'print'
            ],
            'ajax': {
                "type": "GET",
                "url": base_url + 'Api/matrimonial/getPendingList',
            },
            'columns': [
                {'data': 'fullname'},
                
                {'data': 'family_id'},
                
                {'data': 'created_on'},
                {
                    'data': 'deleted',
                    'render': function(data, type, row, meta) {
                        let action = '';
                        
                        action = `
                        <a type="button" class="btn btn-sm btn-success" href="admin/matrimonial_view/${row.member_no}"> Go to Approval </a>
                        `;
                            
                        return action;
                    }
                }
            ]
        });

        /************************************************************/
        

}


function approveSplit(id){
    //alert(id);

    $.ajax({
        type    : "POST",
        url     : base_url+"Api/member/approvesplitfamily",
        data    : {id:id},
        success : function(resData){

            if (resData == 'true') {
                $.toaster('Split Family Successfully Done', 'Success', 'success');
                setTimeout(function() {
                    location.reload();
                }, 1500);
            }else{
                $.toaster('Split Family Failed', 'Error', 'danger');
                return false;
            }

        },error: function(){
            $.toaster('Error', 'Error', 'danger');
        }
   });

}


function rejectSplit(id){
    //alert(id);
    
    $.ajax({
        type    : "POST",
        url     : base_url+"Api/member/rejectsplitfamily",
        data    : {id:id},
        success : function(resData){

            if (resData == 'true') {
                $.toaster('Reject - Successfully Done', 'Success', 'success');
                setTimeout(function() {
                    location.reload();
                }, 1500);
            }else{
                $.toaster('Reject - Split Family Failed', 'Error', 'danger');
                return false;
            }

        },error: function(){
            $.toaster('Error', 'Error', 'danger');
        }
   });
   
}

function approveMerge(id){

    $.ajax({
        type    : "POST",
        url     : base_url+"Api/member/approvemergefamily",
        data    : {id:id},
        success : function(resData){

            if (resData == 'true') {
                $.toaster('Merge Family Successfully Done', 'Success', 'success');
                setTimeout(function() {
                    location.reload();
                }, 1500);
            }else{
                $.toaster('Merge Family Failed', 'Error', 'danger');
                return false;
            }

        },error: function(){
            $.toaster('Error', 'Error', 'danger');
        }
   });

}

function rejectMerge(id){

    $.ajax({
        type    : "POST",
        url     : base_url+"Api/member/rejectmergefamily",
        data    : {id:id},
        success : function(resData){

            if (resData == 'true') {
                $.toaster('Merge Family Successfully Rejected', 'Success', 'success');
                setTimeout(function() {
                    location.reload();
                }, 1500);
            }else{
                $.toaster('Merge Family Failed To Rejected', 'Error', 'danger');
                return false;
            }

        },error: function(){
            $.toaster('Error', 'Error', 'danger');
        }
   });

}

$(document).on('click','.approve', function(){
    let id = $(this).data('id');

    swal({
        title: "Are you sure?",
        text: "You want to approve!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {

            donation_approved(id);

        }/* else {
            swal("Your imaginary file is safe!", {
                icon: "success",
                button: true,
            });
        }*/
    });

    //donation_approved(id);

})

function donation_approved(id) {
    $.ajax({
        type    : "POST",
        url     : base_url+"Api/donation/approved",
        data    : {id:id},
        dataType: 'json',
        success : function(resData){
            var {status, validate, message} = resData;
            if (validate === true) {
                if(status === true){
                    $.toaster(message, 'Success', 'success');
                    //calllist();
                }else if(status == false){
                    $.toaster(message, 'Error', 'danger');
                    return false;
                }
            }
        },error: function(){
            $.toaster(message, 'Error', 'danger');
        }
   });
}

$(document).on('click','.reject', function(){
    let id = $(this).data('id')
    openModal('reject', id, 'donation_cancel_reason')
})

$(document).on('click','#updateData', function(){
    $.ajax({
        type    : "POST",
        url     : base_url+"Api/donation/reject",
        data    : $('#formData').serialize(),
        dataType: 'json',
        success : function(resData){
            var {status, validate, message} = resData;
            if (validate === true) {
                if(status === true){
                    $.toaster(message, 'Success', 'success');
                    calllist();
                    $('#myModal').modal('hide')
                }else if(status == false){
                    $.toaster(message, 'Error', 'danger');
                    return false;
                }
                
            }else{
                $.each(message, function(key, value) {
                    if(value!=''){
                        $.toaster(value, 'Error', 'danger');
                        $("#cancel_reason").focus();
                        return false;
                    }
                });
            }
        },error: function(){

        }
   });
})