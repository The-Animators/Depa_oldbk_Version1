
$(document).on("click", "#delete" , function(e) {

    e.preventDefault();
    var id = $(this).data('id');

    if(confirm("Are you sure you want to delete this?")){
    	$.ajax({
	        type    : "POST",
	        url     : base_url+"Api/helpus/updatedelete",
	        data    : {id, id},
	        dataType: 'json',
	        success : function(resData){
	            var {status, validate, message} = resData;
	            if (validate === true) {
	                if(status === true){
	                    $.toaster(message, 'Success', 'success');
	                    
	                    setTimeout(function(){
                            location.reload();
                        }, 1500);
	                }else if(status == false){
	                    $.toaster(message, 'Error', 'danger');
	                    return false;
	                }
	                
	            } else{
	                $.toaster("Failed to delete", 'Error', 'danger');
	            }
	        },error: function(){
	            
	        }
	   });
    }else{
    	return false
    }
    
   //return false;  //stop the actual form post !important!
});