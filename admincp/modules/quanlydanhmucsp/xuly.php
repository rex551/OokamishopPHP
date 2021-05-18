<?php
include('../../config/config.php');

$tenloaisp = $_POST['tendanhmuc'];
$thutu = $_POST['thutu'];
if(isset($_POST['themdanhmuc'])){
	//them
	$sql_them = "INSERT INTO tbl_danhmuc(tendanhmuc,thutu) VALUE('".$tenloaisp."','".$thutu."')";
	mysqli_query($mysqli,$sql_them);
	header('Location:../../Add/Collections');
}elseif(isset($_POST['suadanhmuc'])){
	//sua
	$sql_update = "UPDATE tbl_danhmuc SET tendanhmuc='".$tenloaisp."',thutu='".$thutu."' WHERE id_danhmuc='$_GET[iddanhmuc]'";
	mysqli_query($mysqli,$sql_update);
	header('Location:../../Add/Collections');
}else{

	$id=$_GET['iddanhmuc'];
	$sql_xoa = "DELETE FROM tbl_danhmuc WHERE id_danhmuc='".$id."'";
	mysqli_query($mysqli,$sql_xoa);
	header('Location:../../Add/Collections');
}

?>