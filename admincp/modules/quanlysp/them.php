<!-- <?php
function load_danhmuc(){
	$connect = mysqli_connect("localhost","root","","web_mysqli");
	$output= '';
	$sql = "SELECT * FROM tbl_danhmuc";
	$sqldanhmuc = mysqli_query($connect,$sql);
	while($rowdanhmuc = mysqli_fetch_array($sqldanhmuc)){
		$output .= '<option value = "'.$rowdanhmuc["id_danhmuc"].'">'.$rowdanhmuc["tendanhmuc"].'</option>';
	}
	return $output;
}
?> -->
	<h3 class="text-center mb-3"><b> Quản Lý Sản Phẩm</b></h3>
	<div class="table-reponsive">
		<table class="table table-bordered">
			<form method="POST" action="modules/quanlysp/xuly.php" enctype="multipart/form-data">
				<tr>
					<td>Tên sản phẩm</td>
					<td><input class="form-control" type="text" name="tensanpham" placeholder="Nhập tên sản phẩm..." required ></td>
				</tr>
				<tr>
					<td>Mã sản phẩm</td>
					<td><input class="form-control" type="text" name="masp" placeholder="Nhập mã sản phẩm..." required ></td>
					</tr>
				<tr>
				<tr>
					<td>Giá sản phẩm</td>
					<td><input class="form-control" type="text" name="giasp" placeholder="Nhập giá sản phẩm..." required></td>
				</tr>
				<tr>
					<td>Giảm giá (%)</td>
					<td><input class="form-control" type="text" name="giamgia" placeholder="Nhập % giảm...." required></td>
				</tr>
				<tr>
					<td>Số lượng</td>
					<td><input class="form-control" type="text" name="soluong" placeholder="Nhập số lượng sản phẩm..." required></td>
				</tr>
				<tr>
					<td>Hình ảnh</td>
					<td><input  type="file" name="hinhanh" class="form-control-file border" required></td>
				</tr>
				<tr>
					<td>Tóm tắt</td>
					<td><textarea rows="3" class="form-control"  name="tomtat" style="resize: none" placeholder="Nhập tóm tắt nội dung sản phẩm..." required ></textarea></td>
				</tr>
				<tr>
					<td>Danh mục sản phẩm</td>
					<td>
						<select class="form-control" required name="danhmuc" id="danhmuc">
						<option value="">Chọn danh mục</option>
						<?php
							$sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
							$query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);
							while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
							?>
							<option value="<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
							<?php
							} 
							?>
						</select>
					</td>
				</tr> 
				<tr>
					<td>Danh mục con cho sản phẩm</td>
					<td>
						<select class="form-control" required id="danhmuccon" name="danhmuccon">
							
						</select>	
					</td>
				</tr>
				<tr>
					<td>Tình trạng</td>
					<td>
						<select class="form-control" required name="tinhtrang">
							<option value="1">Kích hoạt</option>
							<option value="0">Ẩn</option>
						</select>
					</td>
				</tr>
				<tr>
					<td colspan="2" align="right"><input class="btn btn-danger" type="submit" name="themsanpham" value="Thêm sản phẩm"></td>
				</tr>
			</form>
		</table>
	</div>
