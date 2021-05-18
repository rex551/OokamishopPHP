<?php
	$sql_lietke_danhmucsp = "SELECT * FROM tbl_danhmuc ORDER BY thutu ASC";
	$query_lietke_danhmucsp = mysqli_query($mysqli,$sql_lietke_danhmucsp);
?>
<table id="example" class="table table-striped table-bordered" style="width:100%">
<thead class="table-dark">

  <tr>
  	<th>ID</th>
    <th>Tên danh mục</th>
    <th>Thứ tự</th>
  	<th>Quản lý</th>
  
  </tr>
  </thead>
  <tbody>
   <?php
  while($row = mysqli_fetch_array($query_lietke_danhmucsp)){
  ?> 
  <tr>
  	<td><?php echo $row['id_danhmuc'] ?></td>
    <td><?php echo $row['tendanhmuc'] ?></td>
    <td><?php echo $row['thutu'] ?></td>
   	<td>
   		<a href="modules/quanlydanhmucsp/xuly.php?iddanhmuc=<?php echo $row['id_danhmuc'] ?>"><i class="fas fa-trash-alt"></i></a> | <a href="Edit/Collections/<?php echo $row['id_danhmuc'] ?>"><i class="fas fa-edit"></i></a> 
   	</td>

  </tr>
  <?php
  } 
  ?>
 </tbody>
</table>