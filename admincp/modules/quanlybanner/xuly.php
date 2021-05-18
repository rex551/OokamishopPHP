<?php
include('../../config/config.php');
$tenhinhanh = $_POST['tenhinhanh'];
$hinhanh = $_FILES['hinhanh']['name'];
$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
$thutu = $_POST['thutu'];
$title = $_POST['title'];
$content = $_POST['content'];
?>
<?php 
if(isset($_POST['themhinhanh'])){
	//them
	$sql_them = "INSERT INTO tbl_banner (tenbanner,banner,thutu,title,content) VALUE('".$tenhinhanh."','".$hinhanh."','".$thutu."','".$title."','".$content."')";
	mysqli_query($mysqli,$sql_them);
	move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
	header('Location:../../Add/Banners');
}elseif(isset($_POST['suahinhanh'])){
	//sua
	if($hinhanh!=''){
		move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
		$sql_update = "UPDATE tbl_banner SET tenbanner='".$tenhinhanh."',banner='".$hinhanh."',thutu='".$thutu."',title='".$title."',content='".$content."' WHERE id_banner='$_GET[idhinhanh]'";
		//xoa hinh anh cu
		$sql = "SELECT * FROM tbl_banner WHERE id_banner = '$_GET[idhinhanh]' LIMIT 1";
		$query = mysqli_query($mysqli,$sql);
		while($row = mysqli_fetch_array($query)){
			unlink('uploads/'.$row['banner']);
		}

	}else{
		$sql_update = "UPDATE tbl_banner SET tenbanner='".$tenhinhanh."',thutu='".$thutu."',title='".$title."',content='".$content."' WHERE id_banner='$_GET[idhinhanh]'";
	}
	mysqli_query($mysqli,$sql_update);
	header('Location:../../Add/Banners');
}else{
	$id=$_GET['idhinhanh'];
	$sql = "SELECT * FROM tbl_banner WHERE id_banner = '$id' LIMIT 1";
	$query = mysqli_query($mysqli,$sql);
	while($row = mysqli_fetch_array($query)){
		unlink('uploads/'.$row['banner']);
	}
	$sql_xoa = "DELETE FROM tbl_banner WHERE id_banner='".$id."'";
	mysqli_query($mysqli,$sql_xoa);
	header('Location:../../Add/Banners');
}
?>