<?php
	if(isset($_POST['timkiem'])){
		$tukhoa = $_POST['tukhoa'];
	}
	$sql_image = "SELECT * FROM slider ORDER BY RAND () LIMIT 1";
	$query_image = mysqli_query($mysqli,$sql_image);
	$row_image = mysqli_fetch_array($query_image);

?>
<script src="js/cart.js"></script>
<script src="./js/timkiem.js"></script>
<div class="menu">
<div class="titlemenu fontchuquicksand">
		<a href="trangchu">Trang Chủ / </a>
		<span style="color:white; cursor: pointer" >Tìm Kiếm / </span>
		<span style="color:white; cursor: pointer"><?php echo $tukhoa?></span>
	</div>
	<div class="bannerdanhmuc">
		<img src="admincp/modules/quanlyslider/uploads/<?php echo $row_image['image_path']?>" width="100%" height ="400">
	</div>
</div>
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-3">
		<?php include('pages/sidebar/sidebar.php') ?>
		</div>
		<div class="col-lg-9">
			<div class="d-flex justify-content-between mb-3">
				<span class="fontchucharka" id="textChange">Từ khoá tìm kiếm : <?php echo $tukhoa ?></span>
			</div>
			<hr>
			<input type="hidden" id="gettukhoa" value="<?php echo  $tukhoa  ?>">  
			<div id="phantrang" class="fontchuquicksand">

			</div>
		</div>
	</div>
</div> 	 	