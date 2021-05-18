<script src="./js/jquery.exzoom.js"></script>
<script>
	$(function(){
	$("#exzoom").exzoom({
		// thumbnail nav options
		"navWidth": 60,
		"navHeight": 60,
		"navItemNum": 3,
		"navItemMargin": 3,
		"navBorder": 3,
		// autoplay
		"autoPlay":true,
		// autoplay interval in milliseconds
		"autoPlayTimeout": 2000
	});
	});
	$(document).on('keyup','.quantitysanpham',function(){
		if($('.quantitysanpham').val() < 1 || $('.quantitysanpham').val() == null ){
			$('.quantitysanpham').val(1); 
		}
		if(parseInt($('.quantitysanpham').val()) > parseInt($('.soluongsanpham').val()) ){
			$('.quantitysanpham').val($('.soluongsanpham').val());
			
		} 
	})
</script>
<?php
	$sql_chitiet = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc AND tbl_sanpham.id_sanpham='$_GET[id]' LIMIT 1";
	$query_chitiet = mysqli_query($mysqli,$sql_chitiet);
	$price = 0;
	while($row_chitiet = mysqli_fetch_array($query_chitiet)){
?>
<div class="menu">
	<div class = "titlemenu fontchuquicksand">
		<a href="trangchu">Trang Chủ / </a>
		<span style="color:white;cursor:pointer ">Danh Mục / </span>
		<span style="color:white; cursor:pointer"><?php echo $row_chitiet['tensanpham']?></span>
	</div>	
</div>
<div class="container mt-4 mb-5">
	<div class="row">
		<div class="col-lg-4 mr-3 exzoom" id="exzoom" >
			<div class="exzoom_img_box" >
				<ul class='exzoom_img_ul'>
					<li><img  width="100%" id="image<?php echo $row_chitiet['id_sanpham']?>" src="admincp/modules/quanlysp/uploads/<?php echo $row_chitiet['hinhanh'] ?>" ></li>
					<li><img  width="100%" id="image<?php echo $row_chitiet['id_sanpham']?>" src="admincp/modules/quanlysp/uploads/<?php echo $row_chitiet['hinhanh'] ?>" ></li>
					<li><img  width="100%" id="image<?php echo $row_chitiet['id_sanpham']?>" src="admincp/modules/quanlysp/uploads/<?php echo $row_chitiet['hinhanh'] ?>" ></li>
				</ul>
			</div>
			<div class="exzoom_nav"></div>
		</div>
		<div class="col-lg-7" >
			<form method="POST" action="pages/main/themgiohang.php?idsanpham=<?php echo $row_chitiet['id_sanpham'] ?>">
				<div >
				<div  class="">
					<h5  class="fontchuquicksand"><b><?php echo $row_chitiet['tensanpham'] ?></b> </h3>
					</div>
					<hr>
					<?php if($row_chitiet['giamgia'] >0){ 
						$price = number_format($row_chitiet['giasp'],0,',','.').'<small class="priceunit">đ</small>';
					?>
						<span class="salesprice fontchuquicksand"><?php echo $row_chitiet['giamgia']?>%</span>
						<?php $row_chitiet['giasp']-=$row_chitiet['giasp']*($row_chitiet['giamgia']/100) ?>
						<span class="ml-1 mr-1 text-danger fontchuquicksand"><b><?php echo number_format($row_chitiet['giasp'],0,',','.').'<small class="priceunit">đ</small>' ?></b></span>			
						<span class="fontchuquicksand" style="text-decoration-line:line-through; color:grey; font-size:11pt ">
						<?php echo $price ?></span>			
					<?php }else{ ?>
						<p class="text-danger fontchuquicksand"><b><?php echo number_format($row_chitiet['giasp'],0,',','.').'<small class="priceunit">đ</small>' ?></span></b></p>
					<?php } ?>

					<div class="fonchukoho">
						<hr>
						<input class="soluongsanpham" type="hidden" name="soluong" id="soluong<?php echo $row_chitiet['id_sanpham']?>" value="<?php echo $row_chitiet["soluong"]?>" />
						<input type="hidden" name="hidden_name" id="name<?php echo $row_chitiet['id_sanpham']?>" value="<?php echo $row_chitiet["tensanpham"]?>" />
						<input type="hidden" name="hidden_price" id="price<?php echo $row_chitiet['id_sanpham']?>" value="<?php echo $row_chitiet["giasp"]?>" />
						<?php if($row_chitiet['soluong'] <=0){ ?>
						<div class="col-lg-4">
							<input type="button"  class="btn btn-danger form-control" value="HẾT HÀNG" />
						</div>
						<?php }else{  ?>
						Còn <b><?php echo $row_chitiet['soluong'] ?></b> sản phẩm </p> 
						<div class="form-inline">
							<input type="text" name="quantity"  id="quantity<?php echo $row_chitiet['id_sanpham']?>" class="form-control quantitysanpham"  value="1" />					
							<input type="button" name="add_to_cart" id=<?php echo $row_chitiet['id_sanpham'] ?>   class=" ml-3 btn inputthemsanpham add_to_cart" value="Thêm giỏ hàng" />
						</div>
						<?php } ?>
					</div>
				</div>
			</form>
						<hr>
						<div class="panel panel-info fonchukoho" id="accordion" >
							<div class="panel-heading collapsed" data-toggle="collapse" data-target="#collapseOne" style="cursor:pointer;">
								<b>MÔ TẢ SẢN PHẨM</b>
    							<i style="float:right;" class="fa fa-fw fa-chevron-down"></i>
    							<i style="float:right;" class="fa fa-fw fa-chevron-right"></i>
							</div>
  							<div class="panel-body">

								<div class="collapse show mt-4" id="collapseOne" data-parent="#accordion" >
									<pre class="fonchukoho"><?php echo $row_chitiet['tomtat'] ?></pre>
								</div>
  							</div>
							<hr>
	  						<div class="panel-heading collapsed" data-toggle="collapse" data-target="#collapseTwo" style="cursor:pointer;">
							  <b>CHÍNH SÁCH ĐỔI TRẢ</b>
								<i style="float:right;" class="fa fa-fw fa-chevron-down"></i>
								<i style="float:right;" class="fa fa-fw fa-chevron-right"></i>
							</div>
							<div class="panel-body">
								<div class="collapse mt-3" id="collapseTwo" data-parent="#accordion">
									<p>
										Ookami chấp nhận đổi/trả hàng trong thời gian 03 ngày làm việc, áp dụng không đồng đều đối với từng mặt hàng và sản phẩm khác nhau.
									</p>
								</div>
							</div>
							<hr>
							<div class="panel-heading collapsed" data-toggle="collapse" data-target="#collapseThree" style="cursor:pointer;">
							<b>CHÍNH SÁCH GIAO HÀNG</b>
								<i style="float:right;" class="fa fa-fw fa-chevron-down"></i>
								<i style="float:right;" class="fa fa-fw fa-chevron-right"></i>
							</div>
							<div class="panel-body">
								<div class="collapse mt-3" id="collapseThree" data-parent="#accordion">
									<p>
										Đơn hàng sẽ được giao cho Quý khách trong vòng 05 - 07 ngày làm việc kể từ ngày đặt đơn. Quý khách có thể liên hệ với Ookami qua Email, Điện thoại, Facebook để được biết về lộ trình đơn hàng của mình 
									</p>
								</div>
							</div>
							<hr>
							<div class="panel-heading collapsed" data-toggle="collapse" data-target="#collapseFour" style="cursor:pointer;">
							<b>CHÍNH SÁCH THANH TOÁN</b>
								<i style="float:right;" class="fa fa-fw fa-chevron-down"></i>
								<i style="float:right;" class="fa fa-fw fa-chevron-right"></i>
							</div>
							<div class="panel-body">
								<div class="collapse mt-3" id="collapseFour" data-parent="#accordion">
									<p>
										Ookami cung cấp 4 hình thức thanh toán cho quý khách: Thanh toán khi nhận hàng (COD), Chuyển khoản, Thanh toán qua thẻ tín dụng, Thanh toán qua thẻ ATM.
									</p>
								</div>
							</div>
						</div>
		</div>
	</div>
	<?php } ?>
	<div class="col-md-12 mt-5">
		<h3 class="linewithtext text-center"><span><b>Có thể bạn sẽ thích</b></span></h3>
		<?php 
			$sql_suggest = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc ORDER BY RAND () LIMIT 4";
			$query_suggest = mysqli_query($mysqli,$sql_suggest);
		?>
		<div class="row mb-5 mt-5 fontchuquicksand">
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
</div>