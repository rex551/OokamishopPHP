<?php
include('../../config/config.php');
$tenhinhanh = $_POST['tenhinhanh'];
$hinhanh = $_FILES['hinhanh']['name'];
$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
$thutu = $_POST['thutu'];
?>
<?php 
if(isset($_POST['themhinhanh'])){
	//them
	$sql_them = "INSERT INTO slider (tenhinh,image_path,thutu) VALUE('".$tenhinhanh."','".$hinhanh."','".$thutu."')";
	mysqli_query($mysqli,$sql_them);
	move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
	header('Location:../../Add/Sliders');
}else{

	$id=$_GET['idhinhanh'];
	$sql_xoa = "DELETE FROM slider WHERE id='".$id."'";
	mysqli_query($mysqli,$sql_xoa);
	header('Location:../../Add/Sliders');
}
?>