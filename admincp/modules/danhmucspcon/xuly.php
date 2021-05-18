<?php
include('../../config/config.php');
$tenloaisp = $_POST['tendanhmuccon'];
$thutu = $_POST['thutu'];
$iddanhmuccha = $_POST['danhmuc'];
if(isset($_POST['themdanhmuc'])){
	//them
	$sql_them = "INSERT INTO tbl_danhmuccon(tendanhmuccon,thutucon,id_danhmuc) VALUE('".$tenloaisp."','".$thutu."','".$iddanhmuccha."')";
	mysqli_query($mysqli,$sql_them);
	header('Location:../../Add/SubCollections');
}elseif(isset($_POST['suadanhmuc'])){
	//sua
	$sql_update = "UPDATE tbl_danhmuccon SET tendanhmuccon='".$tenloaisp."',thutucon='".$thutu."',id_danhmuc='".$iddanhmuccha."' WHERE id_danhmuccon='$_GET[iddanhmuc]'";
	mysqli_query($mysqli,$sql_update);
	header('Location:../../Add/SubCollections');
}else{

	$id=$_GET['iddanhmuc'];
	$sql_xoa = "DELETE FROM tbl_danhmuccon WHERE id_danhmuccon='".$id."'";
	mysqli_query($mysqli,$sql_xoa);
	header('Location:../../Add/SubCollections');
}

?>