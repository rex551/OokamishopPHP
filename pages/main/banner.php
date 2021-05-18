<?php
	$sql_banner = "SELECT * FROM tbl_banner ORDER BY thutu ASC LIMIT 3";
	$query_banner = mysqli_query($mysqli,$sql_banner);

?>
<div class="container-fluid mt-5 banner">
	<div class="row banner fontchuquicksand">
        <?php while($row_banner = mysqli_fetch_array($query_banner)){ ?>
            <div class="col-md-4 banner hover01 column">
                <span><img src="admincp/modules/quanlybanner/uploads/<?php echo $row_banner['banner'] ?>" width= 100% height="100%"></span>
                    <div class="bottom-left">
                        <div class="mb-3">
                            <p style="color: white"><?php echo $row_banner['title'] ?></p>
                            <h4 style="color: white"><?php echo $row_banner['content'] ?></h4>
                            </div>
                    <button class="btn btnbanner  justify-content-center">CLICK TO SEE MORE</button>
                </div>
            </div>
        <?php } ?>
    </div>	
</div>