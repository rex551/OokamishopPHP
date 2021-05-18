<?php
	//get hinh anh
	$sql_image = "SELECT * FROM slider ORDER BY RAND() LIMIT 1";
	$query_image = mysqli_query($mysqli,$sql_image);
	$row_image = mysqli_fetch_array($query_image);
?>
<div class="menu">
	<div class = "titlemenu fontchuquicksand">
		<a href="trangchu">Trang Chủ / </a>
		<span style="color:white; cursor: pointer; ">Danh Mục / </a>
		<a href="collections/san-pham-moi">Sản Phẩm Mới</a>
	</div>	
	<div class="bannerdanhmuc">
		<img src="admincp/modules/quanlyslider/uploads/<?php echo $row_image['image_path']?>" width="100%" height ="400">
	</div>
</div>
<script src="./js/spmoi.js"></script>
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-3">
		<?php include('pages/sidebar/sidebar.php') ?>
		</div>
		<div class="col-lg-9">
				<div class="d-flex justify-content-between mb-3">
					<span class="fontchucharka" id="textChange">Sản Phẩm Mới</span>
				</div>
				<hr>
			<div id="phantrang" class="fontchuquicksand">

			</div>
		</div>
	</div>
</div>