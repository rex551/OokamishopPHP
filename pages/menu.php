<?php
	$sql_danhmuc = "SELECT * FROM tbl_danhmuc order by thutu";
	$query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);
	$array = [];

	while ($row = mysqli_fetch_assoc($query_danhmuc)){
		$array[] = $row;
	}
?>
<?php
	if(isset($_GET['dangxuat'])&&$_GET['dangxuat']==1){
		unset($_SESSION['dangky']);
		unset($_SESSION['id_khachhang']);
		unset($_SESSION['email']);
	} 
?>
<div class="container-fluid fullmenu fonchukoho">
	<div class="row">
		<div class="col-lg-10">
			<nav class="navbar navbar-expand-lg navbar-light ">
				<a class="navbar-brand" href="trangchu"><img src="images/preview2.png" alt="" class="rounded-circle"></a>
				<button class="navbar-toggler navbar-nav ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
					<span class="navbar-toggler-icon "></span>
				</button>
			<div class="collapse navbar-collapse " id="navbarSupportedContent">
				<ul class="navbar-nav ml-auto mainmenu">
					<li class="nav-item"><a class="nav-link" href="trangchu" title="Trang chủ">Trang chủ</a></li>
							<?php foreach($array as $value1=>$item1){ ?>
									<li class="nav-item "><a class="nav-link " href="collections/<?php echo $item1['id_danhmuc']; ?>" title="<?php echo $item1['tendanhmuc']; ?>"><?php echo $item1['tendanhmuc']; ?> <i class="fa fa-angle-down" aria-hidden="true"></i></a>
										<ul class = "cap1 shadow-lg">
										<?php
											$query = "SELECT * FROM tbl_danhmuccon WHERE id_danhmuc = {$item1['id_danhmuc']} ORDER BY thutucon";
											$result = mysqli_query($mysqli,$query);
											$con = [];
											while ($row = mysqli_fetch_array($result)){
												$con[] = $row;
											}
										?>
										<?php foreach($con as $value2=>$item2){ ?>
											<?php ob_start();   ob_flush(); ?>
											<?php if($item2['id_danhmuc'] > 0){ ?>
											<li><a href="subcollections/<?php echo $item2['id_danhmuccon'];?>" title="<?php echo $item2['tendanhmuccon']; ?>"><?php echo $item2['tendanhmuccon']; ?></a></li>
												<?php } ?>
										<?php } ?>
										</ul>
									</li>
							<?php } ?>
							<li class="nav-item"><a class="nav-link" href="pages/contact" title="Liên hệ">Liên hệ</a></li>			
				</div>
			</nav>
		</div>
		<div class="d-flex justify-content-center col-lg-2 mainicons" id="icon">
			<div class="row iconsrow mb-3">
				<div class="col">
					<?php		
					if(isset($_SESSION['dangky'])){
						$id = $_SESSION['id_khachhang'];
						$sql_taikhoan = "SELECT * FROM tbl_dangky WHERE id_dangky=$id";
						$query_taikhoan = mysqli_query($mysqli,$sql_taikhoan);
						$row_taikhoan = mysqli_fetch_array($query_taikhoan);
					?>
					<a class="card-link" data-toggle="collapse" href="#iconOne">
						<i class="fas fa-user-circle"></i>
					</a>
					<div style="position:absolute; left:-150px" id="iconOne" class="collapse mt-3" data-parent="#icon">
						<div class="card" style="background-color:white; z-index:1000000000000000">
							<div class="card-header text-center">THÔNG TIN TÀI KHOẢN</div>
							<div class="card-body">
								<span class="dropdown-item"><i class="fas fa-user mr-3"></i><?php echo $row_taikhoan['email'] ?></span>
								<?php if($row_taikhoan['phanloai'] == 'admin'){ ?>
								<a class="dropdown-item" href="../web_mysqli/admincp/TrangChu"><i class="fas fa-sign-in-alt mr-3"></i>Truy cập trang Admin</a>		
								<?php } ?>
								<a class="dropdown-item" href="account/password"><i class="fas fa-key mr-3"></i>Thay đổi mật khẩu</a>
								<a class="dropdown-item" href="account/logout"><i class="fas fa-sign-out-alt mr-3"></i>Đăng xuất</a>	
							</div>
						</div>	
					</div>
					<?php }else{ ?>	
					<a class="card-link" href="account/login" title="Tài khoản"><i class="fas fa-user-circle"></i></a>
					<?php } ?>
				</div>
				<div class="col">
					<a class="card-link" data-toggle="collapse" href="#iconTwo">
						<img class="cart-img" src="images/shopping-bag-icon.png" height="23px" style="margin-left:2px; margin-top:-6px">
						<span class="badge"></span></i>
					</a>
					<div style="position:absolute;" id="iconTwo" class="collapse mt-3 cart-infomation" data-parent="#icon">
						<div class="card" style="background-color:white; z-index:100000000000000; width:450px;">
							<div class="cart-infor" >
								<div class="card-header text-center">GIỎ HÀNG</div>
								<div class="card-body">
									<span class="shopping-cart"></span>
									<span id="cart_details"></span>
									<?php if(isset($_SESSION['dangky'])){ ?>
									<a href="cart" class="check btn btnxemgiohang" id="check_out_cart"><span class="shopping-cart"></span> XEM GIỎ HÀNG</a>
									<?php }else{ ?>
									<a class="check btn btnxemgiohang" id="check_out_cart_notlogin"><span class="shopping-cart"></span>XEM GIỎ HÀNG</a>
									<?php } ?>
									<a  class="clear btn btnxoahet" id="clear_cart"><span class="trash"></span>XÓA HẾT</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col">
					<a class="card-link" data-toggle="collapse" href="#iconThree">
						<i class="fas fa-search"></i>
					</a>
					<div style="position:absolute;" id="iconThree" class="collapse mt-3 search-infomation" data-parent="#icon">
						<div class="card" style="background-color:white; z-index:100000000000000; width:364px;">
							<div class="card-header text-center">TÌM KIẾM</div>
							<div class="card-body">
								<form class="form-inline my-2 my-lg-0" action="search" method="POST">
											<input class="form-control mr-sm-2"  type="search" placeholder="Tìm kiếm sản phẩm..." name="tukhoa">
											<button class="btn my-2 my-sm-0 btnsearch" type="submit" name="timkiem"><b>Search</b></button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
