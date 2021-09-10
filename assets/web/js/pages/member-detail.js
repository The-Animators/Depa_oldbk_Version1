"use strict";

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#photo_name').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }else{
        // console.log('photo_url:'+photo_url);
        $('#photo_name').attr('src', photo_url);
    }
}

$(document).on('click',"#reset_img",function (event) { 

    var $el = $('#photo_file');
    $el.wrap('<form>').closest('form').get(0).reset();
    $el.unwrap();
    $('#photo_name').attr('src', img);

// $("#reset_img").click(function(){

});

$("#photo_file").change(function(){
    readURL(this);
});

