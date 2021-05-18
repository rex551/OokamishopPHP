<?php
include('../../config/config.php');

$tensanpham = $_POST['tensanpham'];
$masp = $_POST['masp'];
$giasp = $_POST['giasp'];
$giam = $_POST['giamgia'];
$soluong = $_POST['soluong'];
//xuly hinh anh
$hinhanh = $_FILES['hinhanh']['name'];
$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
$tomtat = $_POST['tomtat'];
$tinhtrang = $_POST['tinhtrang'];
$danhmuc = $_POST['danhmuc'];
$danhmuccon = $_POST['danhmuccon'];
if(isset($_POST['themsanpham'])){
	//them
	$sql_them = "INSERT INTO tbl_sanpham(tensanpham,masp,giasp,giamgia,soluong,hinhanh,tomtat,tinhtrang,id_danhmuc,id_danhmuccon) 
	VALUE('".$tensanpham."','".$masp."','".$giasp."','".$giam."','".$soluong."','".$hinhanh."','".$tomtat."','".$tinhtrang."','".$danhmuc."','".$danhmuccon."')";
	mysqli_query($mysqli,$sql_them);
	move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
	header('Location:../../Add/Products');
}elseif(isset($_POST['suasanpham'])){
	//sua
	if($hinhanh!=''){
		move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
		
		$sql_update = "UPDATE tbl_sanpham SET tensanpham='".$tensanpham."',masp='".$masp."',giasp='".$giasp."',giamgia='".$giam."',soluong='".$soluong."',hinhanh='".$hinhanh."',tomtat='".$tomtat."',tinhtrang='".$tinhtrang."',id_danhmuc='".$danhmuc."',id_danhmuccon='".$danhmuccon."' WHERE id_sanpham='$_GET[idsanpham]'";
		//xoa hinh anh cu
		$sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '$_GET[idsanpham]' LIMIT 1";
		$query = mysqli_query($mysqli,$sql);
		while($row = mysqli_fetch_array($query)){
			unlink('uploads/'.$row['hinhanh']);
		}

	}else{
		$sql_update = "UPDATE tbl_sanpham SET tensanpham='".$tensanpham."',masp='".$masp."',giasp='".$giasp."',giamgia='".$giam."',soluong='".$soluong."',tomtat='".$tomtat."',tinhtrang='".$tinhtrang."',id_danhmuc='".$danhmuc."',id_danhmuccon='".$danhmuccon."' WHERE id_sanpham='$_GET[idsanpham]'";
	}
	mysqli_query($mysqli,$sql_update);
	header('Location:../../Add/Products');
}else{
	$id=$_GET['idsanpham'];
	$sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '$id' LIMIT 1";
	$query = mysqli_query($mysqli,$sql);
	while($row = mysqli_fetch_array($query)){
		unlink('uploads/'.$row['hinhanh']);
	}
	$sql_xoa = "DELETE FROM tbl_sanpham WHERE id_sanpham='".$id."'";
	mysqli_query($mysqli,$sql_xoa);
	header('Location:../../Add/Products');
}

?>