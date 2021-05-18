<div class="table-reponsive mb-5">
	<h3 class="text-center mb-3"><b>Quản Lý Danh Mục Sản Phẩm</b> </h3>
	<table class="table table-bordered"  width="50%" >
	<form method="POST" action="modules/quanlydanhmucsp/xuly.php">
		<tr>
			<td>Tên danh mục</td>
			<td><input type="text" class="form-control" name="tendanhmuc" placeholder="Nhập tên danh mục..." required ></td>
		</tr>
		<tr>
			<td>Thứ tự</td>
			<td><input type="text" class="form-control" name="thutu" placeholder="Nhập thứ tự danh mục..." required ></td>
		</tr>
		<tr>
			<td colspan="2" align="right"><input type="submit" class="btn btn-danger" name="themdanhmuc" value="Thêm danh mục sản phẩm"></td>
		</tr>
	</form>
	</table>
</div>