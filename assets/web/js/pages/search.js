'use strict';

/*const getPromiseAsync = async () => {
    // console.log(1);
    $('#append_data').html(`<img src="${base_url}assets/web/images/preloader.gif">`);
    const result = await promiseA();
    console.log(JSON.stringify(result))
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
                if(data[i]['image'] == '' || data[i]['image'] == null){
                    data[i]['image'] = 'nophoto.png';
                }
                var img1         = `<img src="${base_url}uploads/members/${data[i]['image']}" id="${data[i]['id']}" class="img-responsive dpic">`;
                if(cur_alpha != alpha){
                    if(cur_alpha != ''){ 
                        output += '</div>';
                    }   
                    cur_alpha = alpha;
                    output +=  `<div class="col-sm-12 alphabat"><h4>${alpha.toUpperCase()}</h4></div>`;
                    loop = 1;
                }
                if(loop==1 || loop==4){
                    output += `<div class="row datawrapper">`;
                }
                output   +=  `<div class="col-md-4">
                    <div class="row dbox">
                        <div class="col-md-3">${img1}</div>
                        <div class="col-md-9 memberdetail">
                            <p><span>${data[i]['membername']}</span></p>
                            <p><span><a href="mailto:${data[i]['email']}" target="_blank">${data[i]['email']}</a></span></p>
                            <p><span>${data[i]['contact']}</span></p>
                        </div>
                        <div class="col-md-12" style="margin-top:15px; text-align:right">
                            <a href='${base_url}family/${data[i]['family_no']}' class="btn btn-primary btn-sm">Family Detail</a>
                            <!-- a href='${base_url}${data[i]['member_no']}' class="btn btn-primary btn-sm"> Member Detail</a-->
                            <a href='${base_url}member/view/${data[i]['member_no']}' class="btn btn-primary btn-sm"> Member Detail</a>
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
            $("img").each( function () {
                var element = $(this);
                 
                $.ajax({
                    url:$(this).attr('src'),
                    type:'get',
                    async: true,
                    error:function(response){
                 
                        var replace_src = `${base_url}uploads/members/nophoto.png`;
                        // Again check the default image
                        $.ajax({
                            url: replace_src,
                            type:'get',
                            async: true,
                            success: function(){
                                $(element).attr('src', replace_src);
                            },
                            error:function(response){
                                $(element).hide();
                            }
                        });
                    }
                });
            });
       }else{
           $('#append_data').html('');
       }
    }else if(status == false){
        $('#append_data').html(message);
    }
}*/

$(document).on("click", "#member_search" , function(e) {
    
        var key1 = $('#search_k1').val();
        var val1 = $('#search_v1').val();
        var key2 = $('#search_k2').val();
        var val2 = $('#search_v2').val();
        var key3 = $('#search_k3').val();
        var val3 = $('#search_v3').val();
        alert(key1 + " <-> " + val1 + " <-2> " + key2 + " <-> " + val2 + " <-3> " + key3 + " <-> " + val3);
        // return false;
        $.ajax({
            type    : "POST",
            url     : base_url+"Api/member/search",
            dataType: 'json',
            data:{search_k1:key1,search_k2:key2,search_k3:key3,search_v1:val1,search_v2:val2,search_v3:val3,result:'json'},
            success : function(resData){
                // resolve(resData);
                console.log(resData);
                   console.log(JSON.stringify(resData))
                var {status, data, message} = resData;
            
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
                            if(data[i]['image'] == '' || data[i]['image'] == null){
                                data[i]['image'] = 'nophoto.png';
                            }
                            var img1         = `<img src="${base_url}uploads/members/${data[i]['image']}" id="${data[i]['id']}" class="img-responsive dpic">`;
                            if(cur_alpha != alpha){
                                if(cur_alpha != ''){ 
                                    output += '</div>';
                                }   
                                cur_alpha = alpha;
                                output +=  `<div class="col-sm-12 alphabat"><h4>${alpha.toUpperCase()}</h4></div>`;
                                loop = 1;
                            }
                            if(loop==1 || loop==4){
                                output += `<div class="row datawrapper">`;
                            }
                            output   +=  `<div class="col-md-4">
                                <div class="row dbox">
                                    <div class="col-md-3">${img1}</div>
                                    <div class="col-md-9 memberdetail">
                                        <p><span>${data[i]['membername']}</span></p>
                                        <p><span><a href="mailto:${data[i]['email']}" target="_blank">${data[i]['email']}</a></span></p>
                                        <p><span>${data[i]['contact']}</span></p>
                                    </div>
                                    <div class="col-md-12" style="margin-top:15px; text-align:right">
                                        <a target='_blank' href='${base_url}family/${data[i]['family_no']}' class="btn btn-primary btn-sm">Family Detail</a>
                                        <a target='_blank' href='${base_url}member/view/${data[i]['member_no']}' class="btn btn-primary btn-sm"> Member Detail</a>
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
                        $("img").each( function () {
                            var element = $(this);
                             
                            $.ajax({
                                url:$(this).attr('src'),
                                type:'get',
                                async: true,
                                error:function(response){
                             
                                    var replace_src = `${base_url}uploads/members/nophoto.png`;
                                    // Again check the default image
                                    $.ajax({
                                        url: replace_src,
                                        type:'get',
                                        async: true,
                                        success: function(){
                                            $(element).attr('src', replace_src);
                                        },
                                        error:function(response){
                                            $(element).hide();
                                        }
                                    });
                                }
                            });
                        });
                   }else{
                       $('#append_data').html('');
                   }
                }else if(status == false){
                    $('#append_data').html(message);
                }

            },error: function(err){
                Alert('Some Error Occured');
            }
       });
    
});

/*function promiseA (){
    return new Promise( ( resolve ,reject) => {

        var key1 = $('#search_k1').val();
        var val1 = $('#search_v1').val();
        var key2 = $('#search_k2').val();
        var val2 = $('#search_v2').val();
        var key3 = $('#search_k3').val();
        var val3 = $('#search_v3').val();

        $.ajax({
            type    : "POST",
            url     : base_url+"Api/member/search",
            dataType: 'json',
            data:{search_k1:key1,search_k2:key2,search_k3:key3,search_v1:val1,search_v2:val2,search_v3:val3,result:'json'},
            success : function(resData){
                resolve(resData);
            },error: function(err){
                reject(err)
            }
       });
    });
}*/

async function ImageExist(url) {
    console.log(url);
    await $('<img src="'+ url +'">').load(function() {
        console.log(url+'[Image found]');
        return true;
    }).bind('error', function() {
        console.log(url+'[Image Not found]');
        return false;
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

// const abc = getPromiseAsync();