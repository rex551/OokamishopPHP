<?php 
	$sql_banner = "SELECT * FROM tbl_banner ORDER BY thutu";
	$query_banner = mysqli_query($mysqli,$sql_banner);
?>

<table id="example" class="table table-striped table-bordered" style="width:100%">
  <thead class="table-dark">
    <tr>
      <th>ID</th>
      <th>Tên hình</th>
      <th>Hình ảnh</th>
      <th>Thứ tự</th>
      <th>Tiêu đề</th>
      <th>Nội Dung</th>
      <th>Quản lý</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $i = 0;
    while($row = mysqli_fetch_array($query_banner)){
      $i++;
    ?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $row['tenbanner'] ?></td>
      <td><img src="modules/quanlybanner/uploads/<?php echo $row['banner'] ?>" width="150px"></td>
      <td><?php echo $row['thutu'] ?></td>
      <td><?php echo $row['title'] ?></td>
      <td><?php echo $row['content'] ?></td>
      <td>
        <a onclick="return confirm('Bạn có chắc chắn xóa không ?')" href="modules/quanlybanner/xuly.php?idhinhanh=<?php echo $row['id_banner'] ?>"><i class="fas fa-trash-alt"></i></a>| <a href="Edit/Banners/<?php echo $row['id_banner'] ?>"><i class="fas fa-edit"></i></a> 
      </td>
    </tr>
    <?php
    } 
    ?>
  </tbody>
</table>