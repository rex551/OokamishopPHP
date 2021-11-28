<?php 
  $sql_acc ="SELECT count(id_dangky) as totalacc,count(case phanloai when 'admin' then 1 else null end) as ad,count(case phanloai when 'khachhang' then 1 else null end) as guest FROM tbl_dangky";
  $query_acc = mysqli_query($mysqli,$sql_acc);
  $count_acc = mysqli_fetch_array($query_acc);

  $sql_danhmuc ="SELECT id_danhmuc FROM tbl_danhmuc";
  $query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);
  $count_danhmuc = mysqli_num_rows($query_danhmuc);

  $sql_subdanhmuc ="SELECT id_danhmuccon FROM tbl_danhmuccon";
  $query_subdanhmuc = mysqli_query($mysqli,$sql_subdanhmuc);
  $count_subdanhmuc = mysqli_num_rows($query_subdanhmuc);

  $sql_sanpham ="SELECT id_sanpham FROM tbl_sanpham";
  $query_sanpham = mysqli_query($mysqli,$sql_sanpham);
  $count_sanpham = mysqli_num_rows($query_sanpham);

  $month = date("m");
  $currentyear = date("Y");
  $sql_lietke_month = "SELECT sum(total) as tongtien FROM tbl_cart WHERE month(ngaydathang)=$month AND YEAR(ngaydathang)=$currentyear"  ;
  $query_lietke_month = mysqli_query($mysqli,$sql_lietke_month);
  $row_total = mysqli_fetch_array($query_lietke_month);

?>

<div class="container-fluid">
    <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Tổng số tài khoản</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $count_acc['totalacc'] ?> </div>
                      <p>(  <?php echo $count_acc['ad'] ?> Admin - <?php echo $count_acc['guest'] ?> Users )</p>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user-alt fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Tổng số danh mục</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $count_danhmuc + $count_subdanhmuc ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-bars fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tổng số sản phẩm</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $count_sanpham ?></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-tshirt fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Doanh Thu Tháng <?php echo date("n") ?></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo number_format($row_total['tongtien'],0,',','.').'đ' ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
    </div>
</div>