<?php 
    $sql_suggest = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc AND tinhtrang=1 ORDER BY RAND () LIMIT 8";
    $query_suggest = mysqli_query($mysqli,$sql_suggest);
?>
<div class="container mt-5 suggest">
	<div class="row">
		<div class="col-md-12 text-center suggestpro">
			<h3 class="fontchubig"><b> GỢI Ý CHO BẠN</b></h3>
		</div>
	</div>
</div>

<div class="container mt-5">
	<div class="row">
	<?php 
		while($row_suggest= mysqli_fetch_array($query_suggest)){
	?>
			<div class="col-sm-3 mb-5 hover02 column ">
				<span>
					<div class="card-deck">
						<a style="text-decoration:none;" href="products/<?php echo $row_suggest['id_sanpham'] ?>">
							<div class="card border-secondary shadow">
								<nav class="productshow">
									<img  src="admincp/modules/quanlysp/uploads/<?php echo $row_suggest['hinhanh'] ?>" alt="" class="card-img-top">
								<?php if($row_suggest['giamgia'] > 0){ ?>
									<span class="salesonimages"><b><?php echo $row_suggest['giamgia'] ?>%</b></span>
								<?php }if($row_suggest['soluong'] <=0){ ?>
									<span class="outproducts"><b>HẾT HÀNG</b></span>
								<?php } ?>
								</nav>
								<div class="card-body">
									<h6 style="font-size:15.2pt" class="text-center namepro "><?php echo $row_suggest['tensanpham'] ?></h6>
									<?php if($row_suggest['giamgia'] > 0){ ?>
									<h6 class="card-title  text-center" style="text-decoration-line:line-through; color:grey; font-size:16pt ">
										<?php echo number_format($row_suggest['giasp'],0,',','.').'<small class="priceunit">đ</small>' ?>
									</h6>			
									<?php $row_suggest['giasp']-=$row_suggest['giasp']*($row_suggest['giamgia']/100) ?>
									<h6 style="font-size:15.2pt" class="text-center"> 
										<span class="card-title text-danger">
										<?php echo number_format($row_suggest['giasp'],0,',','.').'<small class="priceunit"><b>đ</b></small> ' ?></span>
										<span class="text-danger">|</span>
										<span class="text-danger">Sale: <?php echo $row_suggest['giamgia'] ?>%</span>
									</h6>
									<?php }else{ ?>
									<h6 style="font-size:16pt" class="card-title text-center pricepro">
										<?php echo number_format($row_suggest['giasp'],0,',','.').'<small class="priceunit">đ</small>' ?>
									</h6>
									<h6 class="text-center"  style="color:grey; font-size: 15.2pt"> Danh Mục: <?php echo $row_suggest['tendanhmuc'] ?></h6>
									<?php } ?>
									<div class="mt-3">
										<a href="products/<?php echo $row_suggest['id_sanpham'] ?>" class="btn btn-block btnchitiet">Xem Chi Tiết</a>
									</div>
								</div>
							</div>
						</a>
					</div>
				</span>
			</div>
	<?php } ?>
	</div>
</div>