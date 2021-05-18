<?php
	//get ten danh muc
	$sql_cate = "SELECT * FROM tbl_danhmuc WHERE tbl_danhmuc.id_danhmuc='$_GET[id]' LIMIT 1";
	$query_cate = mysqli_query($mysqli,$sql_cate);
	$row_title = mysqli_fetch_array($query_cate);
	//get hinh anh
	$sql_image = "SELECT * FROM slider ORDER BY RAND() LIMIT 1";
	$query_image = mysqli_query($mysqli,$sql_image);
	$row_image = mysqli_fetch_array($query_image);

?>
<div class="menu">
	<div class = "titlemenu">
		<div class="fontchuquicksand">
			<a href="trangchu">Trang Chủ / </a>
			<span style="color:white; cursor: pointer;">Danh Mục / </span>
			<a href="collections/<?php echo $row_title['id_danhmuc']?>"><?php echo $row_title['tendanhmuc']?></a>
		</div>
	</div>	
	<div class="bannerdanhmuc">
		<img src="admincp/modules/quanlyslider/uploads/<?php echo $row_image['image_path']?>" width="100%" height ="400">
	</div>
</div>
<script src="./js/danhmuccha.js"></script>
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-3">
		<?php include('pages/sidebar/sidebar.php') ?>
		</div>
		<div class="col-lg-9">
				<div class="d-flex justify-content-between mb-3">
					<span class="fontchucharka"  id="textChange"><?php echo $row_title['tendanhmuc'] ?></span>
				</div>
				<hr>
			<div id="phantrang" class="fontchuquicksand">
			<input type="hidden" id="getid" value="<?php echo  $_GET['id']  ?>">  
				
			</div>
		</div>
	</div>
</div>
