<?php
	$sql_sua_sp = "SELECT * FROM tbl_sanpham WHERE id_sanpham='$_GET[idsanpham]' LIMIT 1";
	$query_sua_sp = mysqli_query($mysqli,$sql_sua_sp);
?>
<h3 class="text-center">Chỉnh Sửa Sản Phẩm</h3>
<div class="table-reponsive">
	<table class="table table-bordered" width="100%">
	<?php
	while($row = mysqli_fetch_array($query_sua_sp)) {
	?>
	<form method="POST" action="modules/quanlysp/xuly.php?idsanpham=<?php echo $row['id_sanpham'] ?>" enctype="multipart/form-data">
		<tr>
			<td>Tên sản phẩm</td>
			<td><input type="text" class="form-control" value="<?php echo $row['tensanpham'] ?>" name="tensanpham" required></td>
		</tr>
		<tr>
			<td>Mã sản phẩm</td>
			<td><input type="text" class="form-control" value="<?php echo $row['masp'] ?>" name="masp" required></td>
		</tr>
		<tr>
			<td>Giá sản phẩm</td>
			<td><input type="text" class="form-control" value="<?php echo $row['giasp'] ?>" name="giasp" required></td>
		</tr>
		<tr>
			<td>Giảm giá (%)</td>
			<td><input type="text" class="form-control" value="<?php echo $row['giamgia'] ?>" name="giamgia" required></td>
		</tr>
		<tr>
			<td>Số lượng</td>
			<td><input type="text" class="form-control" value="<?php echo $row['soluong'] ?>" name="soluong" required></td>
		</tr>
		<tr>
			<td>Hình ảnh</td>
			<td>
				<input  type="file" name="hinhanh" class="form-control-file border">
				<img src="modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>" width="150px" >
			</td>

		</tr>
		<tr>
			<td>Tóm tắt</td>
			<td><textarea rows="3" class="form-control"  name="tomtat" style="resize: none"><?php echo $row['tomtat'] ?></textarea></td>
		</tr>
		<tr>
			<td>Danh mục sản phẩm</td>
			<td>
				<select class="form-control" required name="danhmuc" id="danhmuc">
				<option value="">Chọn danh mục</option>
					<?php
					$sql_danhmuc = "SELECT * FROM tbl_danhmuc";
					$query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);
					while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
						if($row_danhmuc['id_danhmuc']==$row['id_danhmuc']){
					?>
					<option selected value="<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
					<?php
						}else{
					?>
					<option value="<?php echo $row_danhmuc['id_danhmuc'] ?>" required ><?php echo $row_danhmuc['tendanhmuc'] ?></option>
					<?php
						}
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
					<?php
					if($row['tinhtrang']==1){ 
					?>
					<option value="1" selected>Kích hoạt</option>
					<option value="0">Ẩn</option>
					<?php
					}else{ 
					?>
					<option value="1">Kích hoạt</option>
					<option value="0" selected>Ẩn</option>
					<?php
					} 
					?>

				</select>
			</td>
		</tr>
		<tr>
			<td colspan="2" align="right" ><input  class="btn btn-danger"type="submit" name="suasanpham" value="Sửa sản phẩm"></td>
		</tr>
	</form>
	<?php
	} 
	?>

	</table>
</div>