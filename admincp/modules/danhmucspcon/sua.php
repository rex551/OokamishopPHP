<?php
	$sql_sua_danhmucsp = "SELECT * FROM tbl_danhmuccon WHERE id_danhmuccon='$_GET[iddanhmuc]' LIMIT 1";
	$query_sua_danhmucsp = mysqli_query($mysqli,$sql_sua_danhmucsp);
?>

<div class="table-reponsive">
<h3 class="text-center">Chỉnh Sửa Danh Mục Sản Phẩm Con</p>
<table class="table table-bordered"  width="50%" >
 <form method="POST" action="modules/danhmucspcon/xuly.php?iddanhmuc=<?php echo $_GET['iddanhmuc'] ?>">
 	<?php
 	while($dong = mysqli_fetch_array($query_sua_danhmucsp)) {
 	?>
	  <tr>
	  	<td>Tên danh mục</td>
	  	<td><input type="text"  class="form-control" value="<?php echo $dong['tendanhmuccon'] ?>" name="tendanhmuccon" required></td>
	  </tr>
	  <tr>
	    <td>Thứ tự</td>
	    <td><input type="text"  class="form-control" value="<?php echo $dong['thutucon'] ?>" name="thutu" required></td>
	  </tr>
	  <tr>
	    <td>Danh mục sản phẩm</td>
	    <td>
	    	<select class="form-control" required name="danhmuc">
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
	  <?php
	  } 
	  ?>
	   <tr>
	    <td colspan="2" align="right" ><input class="btn btn-danger" type="submit" name="suadanhmuc" value="Sửa danh mục sản phẩm"></td>
	  </tr>

 </form>
</table>
</div>