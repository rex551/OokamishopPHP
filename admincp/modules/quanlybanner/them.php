<h3 class="text-center mb-3"><b> Quản Lý Banner </b></h3>
<div class="table-reponsive mb-5">
	<table class="table table-bordered"  width="50%">
		<form method="POST" action="modules/quanlybanner/xuly.php" enctype="multipart/form-data" >
			<tr>
				<td>Tên hình ảnh</td>
				<td><input type="text" class="form-control" name="tenhinhanh" placeholder="Nhập tên hình ảnh..." required ></td>
			</tr>
			<tr>
				<td>Hình ảnh</td>
				<td><input required type="file" class="form-control-file border" name="hinhanh"></td>
			</tr>
			<tr>
				<td>Thứ tự</td>
				<td><input type="text" class="form-control" name="thutu" placeholder="Nhập thự tự hiển thị..." required ></td>
			</tr>
			<tr>
				<td>Tiêu đề</td>
				<td><input type="text" class="form-control" placeholder="Nhập tiêu đề..." name="title" require></td>
			</tr>
			<tr>
				<td>Nội dung</td>
				<td><input type="text" class="form-control" placeholder="Nhập nội dung..." name="content"></td>
			</tr>
			<tr>
				<td colspan="2" align="right"><input class="btn btn-danger" type="submit" name="themhinhanh" value="Thêm hình ảnh vào banner"></td>
			</tr>
		</form>
	</table>
</div>