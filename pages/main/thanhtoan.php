<title>Ookami Fashionista - Thanh toán đơn hàng</title>
<base href="http://localhost/web_mysqli/pages/main/">
	<link rel="stylesheet" type="text/css" href="../../css/style.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Big+Shoulders+Stencil+Text:wght@500&family=Chakra+Petch:wght@600&family=KoHo:wght@500&family=Quicksand:wght@700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<link rel="shortcut icon" type="image/png" href="../../images/preview2.png"/>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<?php
	session_start();
 	include('../../admincp/config/config.php');
	$thanhtien=0;
	$tongtien=0;
	$thanhtien1=0;
	$tongtien1=0;
		if(isset($_POST['thanhtoan'])) {
			$id_khachhang = $_SESSION['id_khachhang'];
			$code_order = rand(0,9999);
			$today = date("Y-m-d H:i:s");
			foreach($_SESSION["shopping_cart"] as  $keys1 => $values1){
					$thanhtien1 = $values1["product_quantity"] * $values1["product_price"];
					$tongtien1+=$thanhtien1;
			}
			$insert_cart = "INSERT INTO tbl_cart(id_khachhang,code_cart,cart_status,ngaydathang,total) VALUES('".$id_khachhang."','".$code_order."',1,'".$today."','".$tongtien1."')";
			$cart_query = mysqli_query($mysqli,$insert_cart);
			if($cart_query){
					//them gio hang chi tiet
			foreach($_SESSION['shopping_cart'] as $key => $value){
				$id_sanpham = $value['product_id'];
				$soluong = $value['product_quantity'];
				$tenkhachhang = $_POST['hovaten'];
				$email = $_POST['email'];
				$dienthoai = $_POST['dienthoai'];
				$diachi = $_POST['diachi'];
				$insert_order_details = "INSERT INTO tbl_cart_details(id_sanpham,code_cart,soluongmua,hovaten,email,sdt,diachi) VALUES('".$id_sanpham."','".$code_order."','".$soluong."','".$tenkhachhang."','".$email."','".$dienthoai."','".$diachi."')";
				mysqli_query($mysqli,$insert_order_details);
			}
		}
		unset($_SESSION['shopping_cart']);
		header('Location:../pages/payment');
	}
?>
<div class="container">
	<div class="row">
		<div class="col-md-5 mt-4">
			<?php
				if(isset($_SESSION["shopping_cart"])){
  	          	foreach($_SESSION["shopping_cart"] as  $keys => $values){
					$thanhtien = $values["product_quantity"] * $values["product_price"];
  		          	$tongtien+=$thanhtien;
        	?>
			<div class="mt-4 fontchuquicksand" style="position:relative;">
			<span class="product-quantity"> <?php echo $values["product_quantity"]; ?> </span>  
				<img class="thanhtoan-img pl-2 pr-2" src="../../<?php echo $values["product_image"]?>" height="64px">
				<span><b> <?php echo $values["product_name"]; ?></b></span>
				<span class="thanhtoan-product text-danger"><?php echo number_format($values["product_price"],0,',','.').'vnđ'; ?></span>
			</div>
      		<?php
			  }
    		} 
		?>
		<hr>
		<form class="form-inline fonchukoho" style="position: relative;" >
  			<input type="text" class="magiamgiainput form-control mt-2 mb-2" placeholder="Mã giảm giá" id="mgg" >
 			<button type="submit" class="magiamgiabtn btn btn-primary mt-2 mb-2">Áp dụng</button>
		</form>
		<hr>
			<div class="total-thanhtoan mb-2 fonchukoho" style="position: relative;">
				<span>TỔNG CỘNG: </span>
				<span class="total-price"><?php echo number_format($tongtien,0,',','.').'vnđ' ?></span>
			</div>
		</div>
		<div class="col-md-7 mt-4 thanhtoan-info fonchukoho" >
		<h4 class="mt-4">Nhóm 1 Fashionista</h4>
		<a href="../../cart" class="" style="text-decoration:none;">Giỏ hàng</a><span> > Thông tin giao hàng </span>
		<h5 class="mt-3 mb-4"> Thông tin giao hàng</h5>
			<form action="" method="POST" >
				<input
					required 
					type="text" 
					class="form-control mt-3" 
					name="hovaten" id="" 
					placeholder="Họ và tên"
					pattern="[A-Za-z]{1,30}"
					title="Họ và tên không được nhập chữ số. VD: Ookami" 
				>
					<div class="row mt-3 mb-3">
						<div class="col">
							<input required type="email" class="form-control" id="email" placeholder="Email" name="email">
						</div>
						<div class="col">
							<input 
								required 
								type="text" 
								class="form-control" 
								placeholder="Số điện thoại" 
								name="dienthoai"pattern="[0-9]{10}" 
								title="Số điện thoại không được nhập kí tự và phải có độ dài là 10 số. VD: 0906708888"
							>
						</div>
					</div>
				<input 
				required 
				type="text" 
				class="form-control" 
				placeholder="Địa chỉ" 
				name="diachi" 
				id="">
				<div class="asd mt-4" style="position: relative;">
				<a href="../../cart" style="text-decoration:none;" > < Giỏ hàng</a>
					<button type="submit" name="thanhtoan" class="btn btn-danger mt-3 thanhtoanbtn">Thanh toán đơn hàng</button>
				</div>
			</form>
		</div>
	</div>
	<hr>
	<div class="copyright text-center bg-light p-1">
        <p>Copyright © 2021 Ookami Fashionista.</p> 
    </div>
</div>
