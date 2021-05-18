<?php
	$sql_sua_taikhoan = "SELECT * FROM tbl_dangky WHERE id_dangky='$_GET[iddangky]' LIMIT 1";
	$query_sua_taikhoan= mysqli_query($mysqli,$sql_sua_taikhoan);
?>
<h3 class="text-center">Chỉnh Sửa Danh Mục Sản Phẩm</p>
<div class="table-reponsive">
<table class="table table-bordered"  width="50%" >
 <form method="POST" action="modules/quanlytaikhoan/xuly.php?iddangky=<?php echo $_GET['iddangky'] ?>">
 	<?php
 	while($dong = mysqli_fetch_array($query_sua_taikhoan)) {
 	?>
	  <tr>
	  	<td><h6>Họ và tên</h6></td>
	  	<td><input type="text" class="form-control" value="<?php echo $dong['tenkhachhang'] ?>" name="tenkhachhang" required></td>
	  </tr>
	  <tr>
	    <td><h6>Số điện thoại</h6></td>
	    <td><input type="text" class="form-control" value="<?php echo $dong['dienthoai'] ?>" name="sdt" required ></td>
	  </tr>
	  <tr>
	    <td><h6>Địa chỉ</h6></td>
	    <td><input type="text" class="form-control" value="<?php echo $dong['diachi'] ?>" name="diachi" required ></td>
	  </tr>
	  <tr>
			<td>Phân loại</td>
			<td>
				<select class="form-control" required name="phanloai">
					<?php
					if($dong['phanloai']=='admin'){ 
					?>
					<option value="admin" selected>Admin</option>
					<option value="khachhang">Khách hàng</option>
					<?php
					}else{ 
					?>
					<option value="admin">Admin</option>
					<option value="khachhang" selected>Khách hàng</option>
					<?php
					} 
					?>

				</select>
			</td>
		</tr>
	  <tr>
			<td>Trạng thái</td>
			<td>
				<select class="form-control" required name="trangthai">
					<?php
					if($dong['trangthai']==1){ 
					?>
					<option value="1" selected>Mở khóa tài khoản</option>
					<option value="0">Khóa</option>
					<?php
					}else{ 
					?>
					<option value="1">Mở khóa tài khoản</option>
					<option value="0" selected>Khóa tài khoản</option>
					<?php
					} 
					?>

				</select>
			</td>
		</tr>
		<tr>
		<input type="hidden" class="form-control" value="1" name="matkhaureset" required >
	    <td colspan="2" align="right"><input type="submit" class="btn btn-danger" name="resetmatkhau" value="Đặt lại mật khẩu"></td>
	  </tr>
	   <tr>
	    <td colspan="2" align="right"><input type="submit" class="btn btn-danger" name="suataikhoan" value="Thay đổi thông tin tài khoản"></td>
	  </tr>
	  <?php
	  } 
	  ?>

 </form>
</table>
</div>