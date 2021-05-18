<?php
    $connect = mysqli_connect("localhost","root","","web_mysqli");
    $output = '';
    $sql = "SELECT * FROM tbl_danhmuccon WHERE id_danhmuc = '".$_POST["danhmucId"]."' ORDER BY thutucon ";
    $output = '<option value="">Danh mục con</option>';
    $result = mysqli_query($connect,$sql);
    while($row = mysqli_fetch_array($result)){
        $output .= '<option value = "'.$row["id_danhmuccon"].'">'.$row["tendanhmuccon"].'</option>';
    }
    echo $output;
?>