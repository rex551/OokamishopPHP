<?php
if(isset($_SESSION['dangky'])){
	header("Location:index.php");

}
	$sql_account = "SELECT email FROM tbl_dangky";
	$query_account = mysqli_query($mysqli,$sql_account);
	$row_phanloai = mysqli_fetch_array($query_account);
	if(isset($_POST['dangky'])) {
		$tenkhachhang = $_POST['hovaten'];
		$email = $_POST['email'];
		$dienthoai = $_POST['dienthoai'];
		$matkhau = md5($_POST['matkhau']);
		$diachi = $_POST['diachi'];
		$check = mysqli_query($mysqli,"SELECT * FROM tbl_dangky WHERE email ='".$email."'");
		if(mysqli_num_rows($check)>0){ ?>
			<div class="alert alert-danger alert-dismissible fade show">
    			<button type="button" class="close" data-dismiss="alert">&times;</button>
    			<strong>Thông báo!</strong> Email đã tồn tại.
  			</div>
		<?php }else{
			$sql_dangky = mysqli_query($mysqli,"INSERT INTO tbl_dangky(tenkhachhang,email,diachi,matkhau,dienthoai,phanloai,trangthai) VALUE('".$tenkhachhang."','".$email."','".$diachi."','".$matkhau."','".$dienthoai."','khachhang',1)");
				header("Location:trangchu");
				$_SESSION['dangky'] = $tenkhachhang;
				$_SESSION['email'] = $email;
				$_SESSION['id_khachhang'] = mysqli_insert_id($mysqli);
		}
	}
?>

<div class="container-fluid fontchuquicksand" >
	<div class="row">
		<div class="col-md-6 p-5 account">
			<div class="account">
				<h1 style="font-size:40pt" >Tạo tài khoản</h1>
				<hr width="fit-content">
			</div>
		</div>

		<div class="col-md-6 p-5">
			<form action="" method="POST">
				<div class="form-group">
						<input required type="email" class="form-control" id="email" placeholder="Email" name="email" value=''>
					 	<span id="availability" class="text-danger"></span>
					  	<script src="./js/account.js"></script>
    			</div>
				<br>
				<div class="form-group">
					<input 
						required 
						type="password"  
						class="form-control" 
						id="pwd" 
						placeholder="Mật khẩu" 
						name="matkhau"
						pattern="[A-Za-z0-9]{8,100}"
						title="Mật khẩu phải có ít nhất 8 kí tự trở lên và bao gồm ít nhất 1 chữ HOA 1 chữ thường và 1 chữ số."
					>
    			</div>
				<br>
				<div class="form-group">
				<input 
					required type="text" 
					class="form-control" 
					id="hovaten" 
					placeholder="Họ và tên" 
					name="hovaten"
					pattern="[A-Za-z]{1,30}"
					title="Họ và tên không được nhập chữ số. VD: Ookami" 
				>	
    			</div>
				<br>
    			<div class="form-group">
					<input 
						required type="text" 
						class="form-control" 
						id="dienthoai" 
						placeholder="Điện thoại" 
						name="dienthoai"
						pattern="[0-9]{10}" 
						title="Số điện thoại không được nhập kí tự và phải có độ dài là 10 số. VD: 0906708888"
					>
				</div>
				<br>
    			<div class="form-group">
					<input required type="text" class="form-control" id="diachi" placeholder="Địa chỉ" name="diachi">
    			</div>
				<br>
    			<button type="submit" class="btn btndangnhap mb-4" name="dangky">ĐĂNG KÝ</button>
				<div class="comeback">
					<a href="trangchu"><i class="fas fa-arrow-left mr-4"></i>Quay lại trang chủ</a>
				</div>
  			</form>
		</div>
	</div>
</div>