'use strict';

const getPromiseAsync = async () => {
    // console.log(1);
    $('#append_data').html(`<img src="${base_url}assets/web/images/preloader.gif">`);
    const result = await promiseA();
    // console.log(JSON.stringify(result))
    var {status, data, message} = result;

    if(status === true){
       if(data.length > 0){
            $('#append_data').html('');
            var output         = '';
            var cur_short_name = '';  
            var cur_alpha      = '';  
            var loop = 1;
            $.each(data, async function(i){
                let id          = data[i]['id'];
                var imageExists = 'fail';
                cur_short_name  = data[i]['membername'];
                let lower_mem   = cur_short_name.toLowerCase();
                let alpha       = lower_mem.substr(0, 1);
                var img         = `<img src="${base_url}uploads/members/${data[i]['image']}" id="${data[i]['id']}" class="img-responsive">`;
                
                /*imageExists     = await ImageExist(`${base_url}uploads/members/${data[i]['image']}`);
                


                */
                /*const isValidUrl = await isUrlFound(`${base_url}uploads/members/${data[i]['image']}`);

                if(isValidUrl== true){
                    img = img;
                }else{
                    img = `<img src="${base_url}assets/img/noimage.jpeg" id="${data[i]['id']}" class="img-responsive">`;
                }
                console.log(`isValidUrl ${isValidUrl}`);*/ // true || false

                if(cur_alpha != alpha){
                    if(cur_alpha != ''){ 
                        output += '</div>';
                    }   
                    cur_alpha = alpha;
                    output +=  `<div class="col-sm-12 alphabat"><h4>${alpha.toUpperCase()}</h4></div>`;
                }
                if(loop==1 || loop==4){
                    output += `<div class="row datawrapper">`;
                }
                output   +=  `<div class="col-md-4">
                    <div class="row">
                        <div class="col-md-3">${img}</div>
                        <div class="col-md-9 memberdetail">
                            <p><span class="pull-left">Name</span> <span>${data[i]['membername']}</span></p>
                            <p><span class="pull-left">EMAIL</span> <span>${data[i]['email']}</span></p>
                            <p><span class="pull-left">Contact</span> <span>${data[i]['contact']}</span></p>
                        </div>
                    </div>
                </div>`;
                if(loop==3){
                    output += `</div>`;
                    loop = 0;
                }
                loop++
            });
            output += `</div>`;
            // alert(output)
            $('#append_data').html(output);
       }else{
           $('#append_data').html('');
       }
    }else if(status == false){
        $('#append_data').html(message);
    }
}


function promiseA (){
    return new Promise( ( resolve ,reject) => {

        var filterby = ($('.filter.active').data('char'));
        // console.log(base_url+"Api/member/directory/"+filterby);
        $.ajax({
            type    : "GET",
            url     : base_url+"Api/member/directory/"+filterby,
            dataType: 'json',
            success : function(resData){
                resolve(resData);
            },error: function(err){
                reject(err)
            }
       });
    });
}

async function ImageExist(url) {
    await $('<img src="'+ url +'">').load(function() {
        // console.log(1)
        return 'success';
    }).bind('error', function() {
        // console.log(0)
        return 'fail';
    });
}

async function isUrlFound(url) {
  try {
    const response = await fetch(url, {
      method: 'HEAD',
      cache: 'no-cache'
    });

    return response.status === 200;

  } catch(error) {
    // console.log(error);
    return false;
  }
}
const abc = getPromiseAsync();

$(document).on('click','.filter', function(){
    $('.filter').removeClass('active');
    $(this).addClass('active');
    setTimeout(function(){ getPromiseAsync() }, 500);
})