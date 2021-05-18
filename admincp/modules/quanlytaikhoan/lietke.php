<?php
	$sql_lietke_taikhoan = "SELECT * FROM tbl_dangky ORDER BY id_dangky DESC";
	$query_lietke_taikhoan = mysqli_query($mysqli,$sql_lietke_taikhoan);
?>
<table id="example" class="table table-striped table-bordered" style="width:100%">
<thead class="table-dark">

  <tr>
  	<th>ID</th>
    <th>Tài Khoản</th>
    <th>Họ và Tên</th>
    <th>Số điện thoại</th>
    <th>Địa chỉ</th>
    <th>Phân loại</th>
    <th>Trạng thái</th>
  	<th>Quản lý</th>
  </tr>
  </thead>
  <tbody>
   <?php
   $i=0;
  while($row = mysqli_fetch_array($query_lietke_taikhoan)){
    $i++;
  ?> 
  <tr>
  	<td><?php echo $i ?></td>
    <td><?php echo $row['email'] ?></td>
    <td><?php echo $row['tenkhachhang'] ?></td>
    <td><?php echo $row['dienthoai'] ?></td>
    <td><?php echo $row['diachi'] ?></td>
    <td><?php echo $row['phanloai'] ?></td>
    <td><?php if($row['trangthai']==1){
        echo 'Kích hoạt';
      }else{
        echo 'Khóa';
      } 
      ?>
      
    </td>
   	<td>
   		<a href="modules/quanlytaikhoan/xuly.php?idtaikhoan=<?php echo $row['id_dangky'] ?>"><i class="fas fa-trash-alt"></i></a> | <a href="Edit/Accounts/<?php echo $row['id_dangky'] ?>"><i class="fas fa-edit"></i></a> 
   	</td>

  </tr>
  <?php
  } 
  ?>
 </tbody>
 <script>
  $(document).ready(function() {
      $('#example').DataTable();
  } );
  </script>
  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
</table>