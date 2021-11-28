
<div class="main">

	<?php

				if(isset($_GET['action']) && $_GET['query']){
					$tam = $_GET['action'];
					$query = $_GET['query'];
				}else{
					$tam = '';
					$query = '';
				}
				if($tam=='quanlydanhmucsanpham' && $query=='them'){
					include("modules/quanlydanhmucsp/them.php");
					include("modules/quanlydanhmucsp/lietke.php");
				}
				elseif ($tam=='quanlydanhmucsanpham' && $query=='sua'){
					include("modules/quanlydanhmucsp/sua.php");
				}
				elseif($tam=='quanlydanhmucspcon' && $query=='them'){
					include("modules/danhmucspcon/them.php");
					include("modules/danhmucspcon/lietke.php");
				}
				elseif($tam=='danhmucspcon' && $query=='sua'){
					include("modules/danhmucspcon/sua.php");
				}elseif ($tam=='quanlysp' && $query=='them') {
					include("modules/quanlysp/them.php");
					include("modules/quanlysp/lietke.php");
				}elseif($tam=='quanlysp' && $query=='sua'){
					include("modules/quanlysp/sua.php");
				}elseif($tam=='quanlydonhang' && $query=='lietke'){
					include("modules/quanlydonhang/lietke.php");
				}elseif($tam=='donhang' && $query=='xemdonhang'){
					include("modules/quanlydonhang/xemdonhang.php");
				}elseif($tam=='quanlyslider' && $query=='them'){
					include("modules/quanlyslider/them.php");
					include("modules/quanlyslider/lietke.php");
				}elseif($tam=='quanlyslider' && $query=='sua'){
					include("modules/quanlyslider/sua.php");
				}elseif($tam=='quanlybanner' && $query=='them'){
					include("modules/quanlybanner/them.php");
					include("modules/quanlybanner/lietke.php");
				}elseif($tam=='quanlybanner' && $query=='sua'){
					include("modules/quanlybanner/sua.php");
				}
				elseif($tam=='quanlytaikhoan' && $query=='profile'){
					include("modules/quanlytaikhoan/profile.php");
				}
				elseif($tam=='quanlytaikhoan' && $query=='them'){
					include("modules/quanlytaikhoan/them.php");
					include("modules/quanlytaikhoan/lietke.php");
				}elseif($tam=='quanlytaikhoan' && $query=='sua'){
					include("modules/quanlytaikhoan/sua.php");
				}
				elseif($tam=='thongke' && $query=='lietke'){
					include("modules/thongke/thongke.php");
				}

				else{
					include("modules/dashboard.php");
				}
	?> 
	
</div>