// "use strict";

$(function () {
    $("#dod").datepicker({
      dateFormat:'yy-mm-dd',
      changeMonth: true,
      changeYear: true,
      defaultDate : new Date(dod)
    });
});

$(document).on('change',"#hof",function (event) {
    //if($(this).val() != 0){
    var member_id = $(this).val();
    $('#expense_table tbody').empty();
    if(member_id != 0){
        ShowMembers(member_id); 

    }
});


function ShowMembers(member_id){
    var srno = 0;
    $.each(members, function( index, value ) {
        // console.log("Div ID : "+value['id']+'--'+value['member_no']);
        if(member_id != value['id']){
            srno = srno + 1;
            $newRow = "<tr> \
                        <td>"+srno+"</td> \
                        <td>"+value['member_no']+"</td> \
                        <td>"+value['fullname']+"</td> \
                        <td><select id='relation_id_"+srno+"' name='relation_id' data-id='"+value['id']+"' class='form-control relation'></select></td> \
                    </tr>"
            $('#expense_table tbody').append($newRow);
            me = $("#relation_id_"+srno);
            me.empty();
            $.each(relation, function( index, value ) {
                if(value['id'] != 22){
                    var opt = '<option value="'+value['id']+'">'+value['relation']+'</option>';
                    me.append(opt);
                }
            });

        }

    });

}

$(document).on('click',"#submitspilt",function (event) {
    var member_id = $("#hof").val();
    if(member_id == 0){
         $.toaster('Please select New Head of Family ', 'Error', 'danger');
        return false;
    }
    // return false;
    var family_id = $("#family_id").val();
    var data = [];
    var postdata = {};
    var inner = {};
    inner.id = member_id;
    inner.relation_id = 22;
    data.push(inner);
    $('.relation').each(function (index) {
        var inner = {};
        inner.id = $(this).attr('data-id');
        inner.relation_id = $(this).val();
        data.push(inner);
    });
    // console.log('Data : '+JSON.stringify(data));
    postdata['relation']    = data;
    postdata['member_id']   = $("#member_id").val();
    postdata['family_id']   = $("#family_id").val();
    postdata['address_1']   = $("#address_1").val();
    postdata['landline']    = $("#landline").val();
    postdata['area_id']     = $("#area_id").val();
    postdata['pincode']     = $("#pincode").val();
    console.log('Post Data : '+JSON.stringify(postdata));
    // return false;
    $.ajax({
        url:base_url+'Api/member/splitfamily',
        type:"post",
        data:postdata,
        dataType:'json',
        // processData:false,
        // contentType:false,
        // cache:false,
        async:false,
        beforeSend: function() {
            $('#submitspilt').startLoading();
            // return false;
        },
        success: function(response){
            var {status,validate,message} = response;
            if (validate === true) {
                if(status === true){
                    $.toaster(message, 'Success', 'success');
                    setTimeout(function(){
                        window.location = base_url + 'family/'+family_id;
                    }, 1000);

                }else if(status === false){
                    $.toaster(message, 'Error', 'danger');
                    return false;
                }
            } else{
                $.each(message, function(key, value) {
                    if(value!=''){
                        $.toaster(value, 'Error', 'danger');
                        $("#member-form input[name="+key+"], #member-form textarea[name="+key+"]").focus();
                        return false;
                    }
                });
            }
        }, error: function(){
            $("#submitspilt").stopLoading();
        }, complete:function(data){
            $("#submitspilt").stopLoading();
        }
    });
});

$(document).on('click',"#cancel",function (event) {
    var family_id = $("#family_id").val();
     window.location = base_url + 'family/'+family_id;
});