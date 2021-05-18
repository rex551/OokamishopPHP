<div class="table-reponsive">
<h3 class="text-center mb-3"><b> Quản Lý Danh Mục Sản Phẩm Con</b></h3>
<table class="table table-bordered" width="50%" >
 <form method="POST" action="modules/danhmucspcon/xuly.php">
	  <tr>
	  	<td>Tên danh mục con</td>
	  	<td><input type="text" class="form-control" name="tendanhmuccon" placeholder="Nhập tên danh mục...." required ></td>
	  </tr>
	  <tr>
	    <td>Thứ tự</td>
	    <td><input type="text" class="form-control" name="thutu" placeholder="Nhập thứ tự danh mục...." required ></td>
	  </tr>
	   <tr>
	    <td colspan="2" align="right"><input type="submit" class="btn btn-danger" name="themdanhmuc" value="Thêm danh mục sản phẩm"></td>
	  </tr>
	  <tr>
	    <td>Danh mục sản phẩm</td>
	    <td>
	    	<select class="form-control" required name="danhmuc">
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
 </form>
</table>
</div>

