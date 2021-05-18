<?php
	if(isset($_POST['doimatkhau'])){
		$matkhau_cu = md5($_POST['password_cu']);
		$matkhau_moi = md5($_POST['password_moi']);
		$sql = "SELECT * FROM tbl_dangky WHERE email='".$_SESSION['email']."' AND matkhau='".$matkhau_cu."' LIMIT 1";
		$row = mysqli_query($mysqli,$sql);
		$count = mysqli_num_rows($row);
		if($count>0){
			$sql_update = mysqli_query($mysqli,"UPDATE tbl_dangky SET matkhau='".$matkhau_moi."' WHERE email='".$_SESSION['email']."'");
		?>
			<div class="alert alert-success">
  				<strong>Thành công !</strong> Mật khẩu đã được thay đổi.
			</div>
		<?php }else{ ?>
			<div class="alert alert-danger">
    			<strong>Lỗi ! </strong> Mật khẩu không đúng, vui lòng nhập lại.
 			</div>	
		<?php }
	} 
?>
<div class="container-fluid fontchuquicksand">
	<div class="row">
		<div class="col-md-6 account">
			<div class="account">
				<h1 style="font-size:45pt" class="text-center">Đổi mật khẩu</h1>
				<hr>
			</div>
		</div>

		<div class="col-md-6 p-5">
			<form action="" autocomplete="off" method="POST">
    			<div class="form-group">
      				<input required type="email" class="form-control" id="email" placeholder="Email" name="email" value="<?php echo $_SESSION['email'] ?>"disabled>
    			</div>
				<br>
    			<div class="form-group">
      				<input required type="password" class="form-control" id="pwd" placeholder="Nhập mật khẩu cũ..." name="password_cu">
    			</div>
				<br>
				<div class="form-group">
      				<input required type="password" class="form-control" id="pwd" placeholder="Nhập mật khẩu mới..." name="password_moi">
    			</div>
				<br>
				<div class="form-group">
    			<button type="submit" class="btn btndangnhap" name="doimatkhau">Đổi mật khẩu</button>
				<span class="ml-3"><a style="text-decoration:none;" href>Quên mật khẩu?</a></span>
				</div>
  			</form>
		</div>
	</div>
</div>
