$(document).ready(function(){
    $('#danhmuc').change(function(){
        var id_danhmuc =$(this).val();
        $.ajax({
            url:"../admincp/modules/quanlysp/save.php",
            method: "POST",
            data:{danhmucId:id_danhmuc},
            dataType: "text",
            success:function(data){
                $('#danhmuccon').html(data);
            }
        })
    })

    $('#email').keyup(function(){
        var username = $(this).val();
        $.ajax({
        url:"../admincp/modules/quanlytaikhoan/checkuser.php",
         method:"POST",
         data:{username:username},
         success:function(data)
         {
          if(data != '0')
          {
           $('#availability').html('<span class="text-danger"><b>Email đã tồn tại !</b></span>');
           $('#register').attr("disabled", true);
          }
          else
          {
            $('#availability').html('<span class="text-danger"></span>');
           $('#register').attr("disabled", false);
          }
         }
        })

     });
});




