<?php    
     $connect = mysqli_connect("localhost","root","","web_mysqli");
     if(isset($_POST["username"]))
     {
      $username = mysqli_real_escape_string($connect, $_POST["username"]);
      $query = "SELECT email FROM tbl_dangky WHERE email = '".$username."' LIMIT 1";
      $result = mysqli_query($connect, $query);
      echo mysqli_num_rows($result);
     }
?>