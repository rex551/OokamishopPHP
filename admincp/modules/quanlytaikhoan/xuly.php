<?php
include('../../config/config.php');
$email = $_POST['email'];
$matkhaureset = md5($_POST['matkhaureset']);
$matkhau = md5($_POST['matkhau']);
$tenkhachhang = $_POST['tenkhachhang'];
$sdt = $_POST['sdt'];
$diachi = $_POST['diachi'];
$phanloai = $_POST['phanloai'];
$trangthai = $_POST['trangthai'];
if(isset($_POST['themtaikhoan'])){
	//them
		$sql_them = "INSERT INTO tbl_dangky(tenkhachhang,email,diachi,matkhau,dienthoai,phanloai,trangthai)
		VALUE('".$tenkhachhang."','".$email."','".$diachi."','".$matkhau."','".$sdt."','".$phanloai."','".$trangthai."')";
		mysqli_query($mysqli,$sql_them);
		header('Location:../../Add/Accounts');	
	
}elseif(isset($_POST['suataikhoan'])){
	//sua
	$sql_update = "UPDATE tbl_dangky SET tenkhachhang='".$tenkhachhang."',dienthoai='".$sdt."',diachi='".$diachi."',phanloai='".$phanloai."',trangthai='".$trangthai."' WHERE id_dangky='$_GET[iddangky]'";
	mysqli_query($mysqli,$sql_update);
	header('Location:../../Add/Accounts');
}
elseif(isset($_POST['resetmatkhau'])){

	$sql_reset = "UPDATE tbl_dangky SET matkhau='".$matkhaureset."' WHERE id_dangky='$_GET[iddangky]' ";
	mysqli_query($mysqli,$sql_reset);
	header('Location:../../Add/Accounts');
}
else{

	$id=$_GET['idtaikhoan'];
	$sql_xoa = "DELETE FROM tbl_dangky WHERE id_dangky='".$id."'";
	mysqli_query($mysqli,$sql_xoa);
	header('Location:../../Add/Accounts');
}

?>