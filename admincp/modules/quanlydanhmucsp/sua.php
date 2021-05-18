<?php
	$sql_sua_danhmucsp = "SELECT * FROM tbl_danhmuc WHERE id_danhmuc='$_GET[iddanhmuc]' LIMIT 1";
	$query_sua_danhmucsp = mysqli_query($mysqli,$sql_sua_danhmucsp);
?>
<h3 class="text-center">Chỉnh Sửa Danh Mục Sản Phẩm</p>
<div class="table-reponsive">
<table class="table table-bordered"  width="50%" >
 <form method="POST" action="modules/quanlydanhmucsp/xuly.php?iddanhmuc=<?php echo $_GET['iddanhmuc'] ?>">
 	<?php
 	while($dong = mysqli_fetch_array($query_sua_danhmucsp)) {
 	?>
	  <tr>
	  	<td><h6>Tên danh mục</h6></td>
	  	<td><input type="text" class="form-control" value="<?php echo $dong['tendanhmuc'] ?>" name="tendanhmuc" required></td>
	  </tr>
	  <tr>
	    <td><h6>Thứ tự	</h6></td>
	    <td><input type="text" class="form-control" value="<?php echo $dong['thutu'] ?>" name="thutu" required ></td>
	  </tr>
	   <tr>
	    <td colspan="2" align="right"><input type="submit" class="btn btn-danger" name="suadanhmuc" value="Sửa danh mục sản phẩm"></td>
	  </tr>
	  <?php
	  } 
	  ?>

 </form>
</table>
</div>