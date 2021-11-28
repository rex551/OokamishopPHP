
<?php
	$sql_lietke_dh = "SELECT * FROM tbl_cart,tbl_dangky WHERE tbl_cart.id_khachhang=tbl_dangky.id_dangky ORDER BY tbl_cart.id_cart DESC";
	$query_lietke_dh = mysqli_query($mysqli,$sql_lietke_dh);


  
?>
<div class="container">
<h3 class="text-center mb-3"><b> Thống Kê Đơn Hàng</b></h3>
  <div class="row">
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead class="table-dark">
            <tr>
              <th>ID</th>
              <th>Mã đơn hàng</th>
              <th>Tên khách hàng</th>
              <th>Email</th>
              <th>Số điện thoại</th>
              <th>Ngày đặt hàng</th>
              <th>Tổng tiền</th>
              <th>Tình trạng</th>
              <th>Quản lý</th>
            </tr>
        </thead>
        <tbody>
        <?php
  $i = 0;
  while($row = mysqli_fetch_array($query_lietke_dh)){
  	$i++;
  ?>
  <tr>
  	<td><?php echo $i ?></td>
    <td><?php echo $row['code_cart'] ?></td>
    <td><?php echo $row['tenkhachhang'] ?></td>
    <td><?php echo $row['email'] ?></td>
    <td><?php echo $row['dienthoai'] ?></td>
    <td><?php echo $row['ngaydathang'] ?></td>
    <td><?php echo number_format($row['total'],0,',','.').'vnđ'; ?></td>
    <td>
    	<?php if($row['cart_status']==1){
    		echo '<a style="text-decoration: none;" href="modules/quanlydonhang/xuly.php?code='.$row['code_cart'].'">Đơn hàng mới</a>';
    	}else{
    		echo 'Đã xem';
      }
    	?>
    </td>
   	<td>
   		<a href="?action=donhang&query=xemdonhang&code=<?php echo $row['code_cart'] ?>"><i class="far fa-eye"></i></a> 
   	</td>
   
  </tr>
  <?php
  }
  unset($_SESSION['idsanpham']);
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
    </div>
  </div>

