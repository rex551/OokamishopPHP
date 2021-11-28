<?php
	$sql_lietke_sp = "SELECT * FROM tbl_sanpham,tbl_danhmuc,tbl_danhmuccon WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc AND tbl_sanpham.id_danhmuccon=tbl_danhmuccon.id_danhmuccon AND tbl_danhmuccon.id_danhmuc=tbl_danhmuc.id_danhmuc ORDER BY id_sanpham DESC";
	$query_lietke_sp = mysqli_query($mysqli,$sql_lietke_sp);
?>
<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead class="table-dark">
            <tr>
              <th>ID</th>
              <th>Tên sản phẩm</th>
              <th>Hình ảnh</th>
              <th>Giá sản phẩm</th>
              <th>Giảm giá (%)</th>
              <th>Số lượng</th>
              <th>Danh mục</th>
              <th>Danh mục con</th>
              <th>Mã sản phẩm</th>
              <th>Tóm tắt</th>
              <th>Trạng thái</th>
              <th>Quản lý</th>
            </tr>
        </thead>
        <tbody>
        <?php
  $i = 0;
  while($row = mysqli_fetch_array($query_lietke_sp)){
  	$i++;
  ?>
  <tr>
  	<td><?php echo $i ?></td>
    <td><?php echo $row['tensanpham'] ?></td>
    <td><img src="modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>" width="150px"></td>
    <td><?php echo $row['giasp'] ?></td>
    <td><?php echo $row['giamgia'] ?>%</td>
    <td><?php echo $row['soluong'] ?></td>
    <td><?php echo $row['tendanhmuc'] ?></td>
    <td><?php echo $row['tendanhmuccon'] ?></td>
    <td><?php echo $row['masp'] ?></td>
    <td><?php echo $row['tomtat'] ?></td>
    <td><?php if($row['tinhtrang']==1){
        echo 'Kích hoạt';
      }else{
        echo 'Ẩn';
      } 
      ?>
      
    </td>
   	<td>
   		<a onclick="return confirm('Bạn có chắc chắn xóa không ?')" href="modules/quanlysp/xuly.php?idsanpham=<?php echo $row['id_sanpham'] ?>"><i class="fas fa-trash-alt"></i></a> | <a href="Edit/Products/<?php echo $row['id_sanpham'] ?>"><i class="fas fa-edit"></i></a> 
   	</td>
   
  </tr>
  <?php
  } 
  ?>
        </tbody>
</table> 
<script>
  $(document).ready(function() {
      $('#example').DataTable();
  } );


  </script>
  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
