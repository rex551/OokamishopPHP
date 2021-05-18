<?php
	$sql_lietke_danhmucsp =  "SELECT * FROM tbl_danhmuccon,tbl_danhmuc WHERE tbl_danhmuccon.id_danhmuc=tbl_danhmuc.id_danhmuc";
	$query_lietke_danhmucsp = mysqli_query($mysqli,$sql_lietke_danhmucsp);
?>
<table id="example" class="table table-striped table-bordered" style="width:100%">
<thead class="table-dark">
  <tr>
  	<th>ID</th>
    <th>Tên danh mục con</th>
    <th>Danh mục</th>
    <th>Thứ tự</th>
  	<th>Quản lý</th>
  
  </tr>
  </thead>
  <tbody>
  <?php
  $i = 0;
  while($row = mysqli_fetch_array($query_lietke_danhmucsp)){
  	$i++;
  ?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $row['tendanhmuccon'] ?></td>
      <td><?php echo $row['tendanhmuc'] ?></td>
      <td><?php echo $row['thutucon'] ?></td>
       <td>
         <a onclick="return confirm('Bạn có chắc chắn xóa không ?')" href="modules/danhmucspcon/xuly.php?iddanhmuc=<?php echo $row['id_danhmuccon'] ?>"><i class="fas fa-trash-alt"></i></a> | <a href="Edit/SubCollections/<?php echo $row['id_danhmuccon'] ?>"><i class="fas fa-edit"></i></a> 
       </td> 
     
    </tr>
    <?php
  } 
  ?>
  </tbody>
</table>