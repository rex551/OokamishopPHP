<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<base href="http://localhost/web_mysqli/admincp/">
	<title>ADMIN - Nhóm 1 Fashionista</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/styleadmincp.css">
	<link rel="shortcut icon" type="image/png" href="../images/preview2.png"/>
	<!-- Custom fonts for this template-->
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<!-- Custom styles for this template-->
	<link rel="stylesheet" type="text/css" href="css/sb-admin-2.css" >
	  <!-- Bootstrap core JavaScript-->
	  <script src="vendor/jquery/jquery.min.js"></script>
  	<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>
</head>
<?php
	include('config/config.php');
 	session_start();
 	$id = $_SESSION['id_khachhang'];
 	$sql_taikhoan = "SELECT * FROM tbl_dangky WHERE id_dangky=$id";
	$query_taikhoan = mysqli_query($mysqli,$sql_taikhoan);
	$row_taikhoan = mysqli_fetch_array($query_taikhoan);
 	if(isset($_SESSION['dangky']) && $row_taikhoan['phanloai'] == 'admin'){
 	
	}
 	else{
		header("Location:../trangchu");
	 } 
?>
<body>
	<div class="wrapper">
	<?php include("config/config.php"); ?>
		<div class="row">
 			<div class="col-2" style="z-index:100000000000000000000000000000">
				<?php include("modules/sidebar.php"); ?>
			</div>
			<div class="col-10">
				<?php 
					include("modules/header.php");
					include("modules/menu.php");
					include("modules/main.php");
					include("modules/footer.php");
				?>
			</div>
		</div>
	</div>
	<script src="../admincp/js/js.js"></script>
</body>
</html>