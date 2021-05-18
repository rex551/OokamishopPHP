<?php
	$sql_sua_banner = "SELECT * FROM tbl_banner WHERE id_banner='$_GET[idhinhanh]' LIMIT 1";
	$query_sua_banner = mysqli_query($mysqli,$sql_sua_banner);
?>
<h3 class="text-center">Chỉnh Sửa Banner</h3>
<div class="table-reponsive">
	<table class="table table-bordered"  width="50%" >
	<?php
		while($dong = mysqli_fetch_array($query_sua_banner)) {
		?>
	<form method="POST" action="modules/quanlybanner/xuly.php?idhinhanh=<?php echo $dong['id_banner'] ?>" enctype="multipart/form-data">
		<tr>
			<td>Tên hình ảnh</td>
			<td><input required type="text" class="form-control" value="<?php echo $dong['tenbanner'] ?>" name="tenhinhanh" required></td>
		</tr>
		<tr>
			<td>Hình ảnh</td>
			<td>
				<input class="form-control-file border"  type="file" name="hinhanh">
				<img src="modules/quanlybanner/uploads/<?php echo $dong['banner'] ?>" width="150px" >
			</td>
		</tr>
		<tr>
			<td>Thứ tự</td>
			<td><input required type="text" class="form-control" value="<?php echo $dong['thutu'] ?>" name="thutu" required ></td>
		</tr>
		<tr>
			<td>Tiêu đề</td>
			<td><input type="text" class="form-control" value="<?php echo $dong['title'] ?>" name="title" required ></td>
		</tr>
		<tr>
			<td>Nội dung</td>
			<td><input type="text" class="form-control" value="<?php echo $dong['content'] ?>" name="content" required ></td>
		</tr>
		<tr>
			<td colspan="2" align="right"><input type="submit" class="btn btn-danger" name="suahinhanh" value="Thay thế hình ảnh"></td>
		</tr>

	</form>
	<?php
		} 
		?>
	</table>
</div>
