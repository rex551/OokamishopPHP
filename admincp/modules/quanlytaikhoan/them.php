<div class="table-reponsive mb-5">
	<h3 class="text-center mb-3"><b>Quản Lý Tài Khoản</b></h3>
	<table class="table table-bordered"  width="50%" >
		<form method="POST" action="modules/quanlytaikhoan/xuly.php">
			<tr>
				<td><h6>Email</h6></td>
				<td>
					<input id="email"  value="" type="email" class="form-control" placeholder="Nhập Email..." name="email" required>
					<span id="availability"></span>
				</td>
			</tr>
			<tr>
				<td><h6>Mật khẩu</h6></td>
				<td><input type="password" class="form-control" placeholder="Nhập mật khẩu..." name="matkhau" required></td>
			</tr>
			<tr>
				<td><h6>Họ và tên</h6></td>
				<td><input type="text" class="form-control" placeholder="Nhập họ và tên..." name="tenkhachhang" required></td>
			</tr>
			<tr>
				<td><h6>Số điện thoại</h6></td>
				<td><input type="text" class="form-control" placeholder="Nhập số điện thoại..." name="sdt" required ></td>
			</tr>
			<tr>
				<td><h6>Địa chỉ</h6></td>
				<td><input type="text" class="form-control" placeholder="Nhập địa chỉ...." name="diachi" required ></td>
			</tr>
			<tr>
				<td>Phân loại</td>
				<td>
					<select class="form-control" required name="phanloai">
						<option value="admin">Admin</option>
						<option value="khachhang"selected>Khách hàng</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Trạng thái</td>
				<td>
					<select class="form-control" required name="trangthai">
						<option value="1" selected>Mở khóa tài khoản</option>
						<option value="0">Khóa tài khoản</option>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="2" align="right">
					<input type="submit" class="btn btn-danger" id="register" name="themtaikhoan" disabled='true' value="Thêm tài khoản">
				</td>
			</tr>
		</form>
	</table>
</div>