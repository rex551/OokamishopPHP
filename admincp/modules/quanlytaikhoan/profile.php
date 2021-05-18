<?php
$id = $_SESSION['id_khachhang'];
$sql = "SELECT * FROM tbl_dangky WHERE id_dangky=$id ";
$query = mysqli_query($mysqli,$sql);
$row = mysqli_fetch_array($query);
?>
<div class="container ml-3">
    <div class="row profile">
        <div class="col-md-3 userimg" >
            <img  width="300px" src="../images/Sample_User_Icon.png" alt="ss">
            <p class="profilename"><b><?php echo $row['tenkhachhang'] ?></b></p>      
            <p class="profilechucnang"><b><?php echo $row['phanloai'] ?></b></p>        
        </div>
        <div class="col-md-5">
            <h3 style="color:#09572E;"><b>Thông Tin Người Dùng</b></h3>
            <hr>
            <form class="form " action="">
                <div class="row">
                    <div class="col"> 
                        <h5><b>Tài Khoản</b> </h5>
                        <p><?php echo $row['email'] ?></p>
                    </div>
                    <div class="col">  
                        <h5><b>Số Điện Thoại</b> </h5>
                        <p><?php echo $row['dienthoai'] ?></p>
                    </div>
                </div>
            <div class="row">
                <div class="col">
                    <h5><b>Địa Chỉ</b></h5>
                    <p><?php echo $row['diachi'] ?></p>
                </div>
            </div>
            </form>

        </div>    
    </div>
</div>