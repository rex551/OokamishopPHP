<?php 
include('../../admincp/config/config.php');

    if(isset($_POST["username"]))
    {
        $query = "SELECT email FROM tbl_dangky WHERE email = '".$_POST["username"]."' LIMIT 1";
        $result = mysqli_query($mysqli, $query);
        if (mysqli_num_rows($result) >0){
            echo "Email đã tồn tại !";
        }else{
            echo "";
        }
    }
?>