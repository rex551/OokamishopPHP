<?php
	if(isset($_POST['dangnhap'])){
		$email = $_POST['email'];
		$matkhau = md5($_POST['password']);
		$sql = "SELECT * FROM tbl_dangky WHERE email='".$email."' AND matkhau='".$matkhau."' LIMIT 1";
		$row = mysqli_query($mysqli,$sql);
		$row_data = mysqli_fetch_array($row);
		$count = mysqli_num_rows($row);

		if($count>0){
			if($row_data['trangthai'] == 0){ ?>
				<div class="alert alert-warning alert-dismissible fade show">
    				<button type="button" class="close" data-dismiss="alert">&times;</button>
   					<strong>Thông báo !</strong> Tài khoản của bạn đã bị khóa.
  				</div>
			<?php 
			}else{
				$_SESSION['dangky'] = $row_data['tenkhachhang'];
				$_SESSION['id_khachhang'] = $row_data['id_dangky'];
				$_SESSION['email'] = $email;
				header("Location:index.php");
			}
		}
		else{ ?>
			<div class="alert alert-danger alert-dismissible fade show">
    			<button type="button" class="close" data-dismiss="alert">&times;</button>
    			<strong>Thông báo!</strong> Tài khoản hoặc mật khẩu sai, vui lòng nhập lại.
  			</div>
	<?php	}
	} 
	if(isset($_SESSION['dangky'])){
		header("Location:trangchu");

	}
?>
<div class="container-fluid fontchuquicksand">
	<div class="row">
		<div class="col-md-6 account">
			<div class="account">
				<h1 style="font-size:45pt" class="text-center">Đăng nhập</h1>
				<hr>
			</div>
		</div>

		<div class="col-md-6 p-5">
			<form action="" autocomplete="off" method="POST">
    			<div class="form-group">
      				<input required type="email" class="form-control" id="email" placeholder="Email" name="email">
    			</div>
				<br>
    			<div class="form-group">
      				<input required type="password" class="form-control" id="pwd" placeholder="Mật khẩu" name="password">
    			</div>
				<br>
    			<div class="form-group form-check">
      				<label class="form-check-label">
       	 			<input class="form-check-input" type="checkbox" name="remember"> Lưu tài khoản
      			</label>
    			</div>
				<div class="form-group">
    			<button type="submit" class="btn btndangnhap" name="dangnhap">ĐĂNG NHẬP</button>
				<span class="ml-3"><a href="account/register" style="text-decoration:none;">Đăng ký</a> hoặc <a style="text-decoration:none; cursor:pointer;" href>Quên mật khẩu?</a></span>
				</div>
  			</form>
		</div>
	</div>
</div>