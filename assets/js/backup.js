$("#resetButton").on("click", function(e) {
    e.preventDefault();
    $("#toaster").remove();
    $.ajax({
        url:base_url+'backup/resetdb',
        type: 'post',
        dataType:'json',    
        success : function(resData){
            // alert(resData);
            var {status,filename,message} = resData;
            if(status === true){
                $.toaster(message, 'Success', 'success');
                ShowHideButton(false);
            }else if(status == false){
                $.toaster(message, 'Error', 'danger');
                ShowHideButton(false);
                return false;
            }

        },
        error: function (xhr, ajaxOptions, thrownError) {
            ShowHideButton(false);
            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }        
    });
});

$("#backupButton").on("click", function(event) {
    ShowHideButton(true);
    // $('#backupButton').prop('disabled',true);
    event.preventDefault();
    $("#toaster").remove();
    $.ajax({
        url:base_url+'backup/backup',
        type: 'get',
        // data: formData,
        cache: false,
        processData: false,
        contentType: false,
        dataType:'json',    
        beforeSend: function () {
            // console.log('b4');
            $('button#backupButton').html('Backing Up Database....');
        },
        success : function(resData){
            // alert(resData);
            var {status,filename,message} = resData;
            if(status === true){
                $.toaster(message, 'Success', 'success');
                window.location = filename;
                $('button#backupButton').html('Backup Database');
                ShowHideButton(false);
                // $('#backupButton').prop('disabled',false);
            }else if(status == false){
                $.toaster(message, 'Error', 'danger');
                $('button#backupButton').html('Backup Database');
                ShowHideButton(false);
                // $('#backupButton').prop('disabled',false);
                return false;
            }

        },
        error: function (xhr, ajaxOptions, thrownError) {
            $('button#backupButton').html('Backup Database');
            ShowHideButton(false);
            // $('#backupButton').prop('disabled',false);
            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }        
    });
});

$("#restoreButton").on("click", function(event) {
    ShowHideButton(true);
    // $('#restoreButton').prop('disabled',true);
    event.preventDefault();
    $("#toaster").remove();
    let myForm = document.getElementById('restore');
    let formData = new FormData(myForm);
    /*var formData = new FormData();
    formData.append('cmp_name', $("#cmp_name").val());
    formData.append('contact_person', $("#contact_person").val());
    formData.append('phone', $("#phone").val());
    formData.append('email', $("#email").val());
    formData.append('country_id', $("#country_id").val());
    formData.append('state_id', $("#state_id").val());
    formData.append('city_id', $("#city_id").val());
    formData.append('zipcode', $("#zipcode").val());
    formData.append('address', $("#address").val());
    formData.append('cmp_logo', jQuery('form#general').find('#cmp_logo')[0].files[0]);*/
    $.ajax({
        url:base_url+'backup/restore',
        type: 'post',
        data: formData,
        cache: false,
        processData: false,
        contentType: false,
        dataType:'json',    
        beforeSend: function () {
            // console.log('b4');
            $('button#restoreButton').html('Restoring Database....');
        },
        success : function(resData){
            // alert(resData);
            var {status,message} = resData;
            if(status === true){
                $.toaster(message, 'Success', 'success');
                $('button#restoreButton').html('Restore Database');
                ShowHideButton(false);
                // $('#restoreButton').prop('disabled',false);
            }else if(status == false){
                $.toaster(message, 'Error', 'danger');
                $('button#restoreButton').html('Restore Database');
                ShowHideButton(false);
                // $('#restoreButton').prop('disabled',false);
                return false;
            }

        },
        error: function (xhr, ajaxOptions, thrownError) {
            $('button#restoreButton').html('Restore Database');
            ShowHideButton(false);
            // $('#restoreButton').prop('disabled',false);
            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }        
    });
});

function ShowHideButton(flag){
    $('#backupButton').prop('disabled',flag);
    $('#restoreButton').prop('disabled',flag);
}