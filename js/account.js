$(document).ready(function(){
    $("#email").keyup(function () {
        var username = $(this).val();
        $.ajax({
            url:"./pages/main/checkaccount.php",
			method:"POST",
            data:{
                username:username
            },
            dataType: "text",
            success:function(data){ 
				$('#availability').html(data);  
			} 
        })
     });
})