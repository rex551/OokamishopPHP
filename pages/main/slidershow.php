<?php
	$sql_slide = "SELECT * FROM slider ORDER BY Thutu";
	$query_slide = mysqli_query($mysqli,$sql_slide);
	while($row_slide = mysqli_fetch_array($query_slide)){
?>
<div class="slidershow">
	<div id="demo" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ul class="carousel-indicators">
    <?php 
	    $i = 0;
	    foreach($query_slide as $row_slide){
		      $actives = '';
		      if($i == 0){
			      $actives = 'active';
	        }
    ?>
      <li data-target="#demo" data-slide-to="<?= $i; ?>" class="<?= $actives;?>"></li>
	      <?php $i++; } ?>
  </ul> 
  <!-- The slideshow -->
  <div class="carousel-inner">
  <?php 
	$i=0;
	foreach($query_slide as $row_slide ){
		$actives = '';
		if( $i==0){
			$actives = 'active';
		}
  ?>
    <div class="carousel-item <?= $actives ?>">
      <img src="admincp/modules/quanlyslider/uploads/<?php echo $row_slide['image_path'] ?>" width="100%" height="100%">
  </div>
  <?php $i++; } ?>
  </div>
  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
	</div>
<?php
} 
?>
