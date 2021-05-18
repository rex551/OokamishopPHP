<div id="main">
<script src="./js/cart.js"></script>
			<div class="maincontent">

				<?php
				if(isset($_GET['quanly'])){
					$tam = $_GET['quanly'];
				}else{
					$tam = '';
				}
				if($tam=='danhmucsanpham'){
					include("danhmuccha/danhmuc.php");
				}elseif($tam=='danhmucspcon'){
					include("danhmuccon/danhmuccon.php");
				}elseif($tam=='spmoi'){
					include("spmoi/spmoi.php");
				}elseif($tam=='flashsale'){
					include("flashsale/spsale.php");
				}elseif($tam=='giohang'){
					include("main/giohang.php");
				}elseif($tam=='tintuc'){
					include("main/tintuc.php");
				}elseif($tam=='lienhe'){
					include("main/lienhe.php");
				}elseif($tam=='sanpham'){
					include("main/sanpham.php");	
				}elseif($tam=='dangky'){
					include("main/dangky.php");
				}elseif($tam=='thanhtoan'){
					include("main/thanhtoan.php");
				}elseif($tam=='dangnhap'){
					include("main/dangnhap.php");
				}elseif($tam=='timkiem'){
					include("timkiem/timkiem.php");
				}elseif($tam=='camon'){
					include("main/camon.php");
				}elseif($tam=='thaydoimatkhau'){
					include("main/thaydoimatkhau.php");
				}else{
					include("main/index.php");
				}
				?>
			</div>
		</div>