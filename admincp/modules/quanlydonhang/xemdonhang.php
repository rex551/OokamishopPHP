<?php
	$code = $_GET['code'];
  //get san pham
	$sql_lietke_dh = "SELECT * FROM tbl_cart_details,tbl_sanpham WHERE tbl_cart_details.id_sanpham=tbl_sanpham.id_sanpham AND tbl_cart_details.code_cart='".$code."' ORDER BY tbl_cart_details.id_cart_details DESC";
	$query_lietke_dh = mysqli_query($mysqli,$sql_lietke_dh);
  // get ten nguoi mua
  $sql_lietke_nm = "SELECT * FROM tbl_cart_details,tbl_sanpham WHERE tbl_cart_details.id_sanpham=tbl_sanpham.id_sanpham AND tbl_cart_details.code_cart='".$code."' ORDER BY tbl_cart_details.id_cart_details DESC";
	$query_lietke_nm = mysqli_query($mysqli,$sql_lietke_nm);
  $row_nm = mysqli_fetch_array($query_lietke_nm);
?>
<div class="container">
<h3 class="text-center">Chi Tiết Đơn Hàng</h3>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
    <p>Tên người mua: <?php echo $row_nm['hovaten'] ?></p>
    <p>Mã đơn hàng:  <?php echo $row_nm['code_cart'] ?></p>
    <p>Email:  <?php echo $row_nm['email'] ?></p>
    <p>Số điện thoại: <?php echo $row_nm['sdt'] ?> </p>
    <p>Địa chỉ: <?php echo $row_nm['diachi'] ?></p>
 </span>
      <thead class="table-dark">
            <tr>
              <th>ID</th>
              <th>Tên sản phẩm</th>
              <th>Hình sản phẩm</th>
              <th>Số lượng</th>
              <th>Đơn giá</th>
              <th>Thành tiền</th>
            </tr>
        </thead>
        <tbody>
      <?php
      $i = 0;
      $tongtien = 0;
      while($row = mysqli_fetch_array($query_lietke_dh)){
  	    $i++;
        if($row['giamgia']>0){
          $row['giasp']-=$row['giasp']*($row['giamgia']/100) ;
        }
  	    $thanhtien = $row['giasp']*$row['soluongmua'];
  	    $tongtien += $thanhtien ;
      ?>
      <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $row['tensanpham'] ?></td>
        <td><img width="75px" src="modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>" alt="" srcset=""></td>
        <td><?php echo $row['soluongmua'] ?></td>
        <td><?php echo number_format($row['giasp'],0,',','.').'đ' ?></td>
        <td><?php echo number_format($thanhtien,0,',','.').'đ' ?></td>
      </tr>
      <?php
        } 
      ?>
        <tr>
          <td colspan="6">
            <p class="text-right">Tổng tiền: <?php echo number_format($tongtien,0,',','.').'vnđ' ?></p>
          </td> 
        </tr>
      </tbody>
  </table>
</div>
