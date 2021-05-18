<?php 
$sql_sale = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.giamgia > 0 AND tinhtrang=1 AND tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc ORDER BY tbl_sanpham.giasp DESC LIMIT 8 ";
$query_sale = mysqli_query($mysqli,$sql_sale);
?>
<div class="container mt-5">
	<div class="row">
		<div class="col-md-12 text-center saleproduct">
			<h3>
				<a class="testnhapnhay" href="collections/flash-sale" style="text-decoration: none;">FLASH SALE</a>
			</h3>
		</div>
	</div>
</div>

<div class="container fontchuquicksand mt-5">
	<div class="row">
	<?php 
		while($row_pro= mysqli_fetch_array($query_sale)){
	?>
			<div class="col-sm-3 mb-5 hover02 column ">
				<span>
					<div class="card-deck">
						<a style="text-decoration:none;" href="products/<?php echo $row_pro['id_sanpham'] ?>">
							<div class="card border-secondary shadow">
								<nav class="productshow">
									<img  src="admincp/modules/quanlysp/uploads/<?php echo $row_pro['hinhanh'] ?>" alt="" class="card-img-top">
								<?php if($row_pro['giamgia'] > 0){ ?>
									<span class="salesonimages"><b><?php echo $row_pro['giamgia'] ?>%</b></span>
								<?php }if($row_pro['soluong'] <=0){ ?>
									<span class="outproducts"><b>HẾT HÀNG</b></span>
								<?php } ?>
								</nav>
								<div class="card-body">
									<h6 style="font-size:15.2pt" class="text-center namepro "><?php echo $row_pro['tensanpham'] ?></h6>
									<?php if($row_pro['giamgia'] > 0){ ?>
									<h6 class="card-title  text-center" style="text-decoration-line:line-through; color:grey; font-size:16pt ">
										<?php echo number_format($row_pro['giasp'],0,',','.').'<small class="priceunit">đ</small>' ?>
									</h6>			
									<?php $row_pro['giasp']-=$row_pro['giasp']*($row_pro['giamgia']/100) ?>
									<h6 style="font-size:15.2pt" class="text-center"> 
										<span class="card-title text-danger">
										<?php echo number_format($row_pro['giasp'],0,',','.').'<small class="priceunit"><b>đ</b></small> ' ?></span>
										<span class="text-danger">|</span>
										<span class="text-danger">Sale: <?php echo $row_pro['giamgia'] ?>%</span>
									</h6>
									<?php }else{ ?>
									<h6 style="font-size:16pt" class="card-title text-center pricepro">
										<?php echo number_format($row_pro['giasp'],0,',','.').'<small class="priceunit">đ</small>' ?>
									</h6>
									<h6 class="text-center"  style="color:grey; font-size: 15.2pt"> Danh Mục: <?php echo $row_pro['tendanhmuc'] ?></h6>
									<?php } ?>
									<div class="mt-3">
										<a href="products/<?php echo $row_pro['id_sanpham'] ?>" class="btn btn-block btnchitiet">Xem Chi Tiết</a>
									</div>
								</div>
							</div>
						</a>
					</div>
				</span>
			</div>
		<?php } ?>
	</div>
	<div class="d-flex justify-content-center mt-5 fontchuquicksand">
		<button type="button" class="btn btnxemthem justify-content-center"><a class="non" href="collections/flash-sale"><b>Xem Thêm</b></a></button>
		</div>
</div>