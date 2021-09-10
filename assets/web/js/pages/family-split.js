'use strict';

function validate(){
    var count = 0;
    $.each($("input[name='member_id[]']:checked"), function() {
        count = count + 1;
    });
    if(count == 0){
        $.toaster('Please Select Member', 'Error', 'danger');   
        return false;
    }
    return true;
}

$(document).on('click',"#cancel",function (event) {
    var family_id = $("#family_id").val();
     window.location = base_url + 'family/'+family_id;
});