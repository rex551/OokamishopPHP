<h3 class="text-center mb-3"><b>Quản Lý Silder </b></h3>
<div class="table-reponsive mb-5">
<table class="table table-bordered"  width="50%" >
 <form method="POST" action="modules/quanlyslider/xuly.php" enctype="multipart/form-data" >
	  <tr>
	  	<td>Tên hình ảnh</td>
	  	<td><input required class="form-control" type="text" name="tenhinhanh" placeholder="Nhập tên hình ảnh..." required ></td>
	  </tr>
      <tr>
          <td>Hình ảnh</td>
          <td><input required type="file" class="form-control-file border"  name="hinhanh"></td>
      </tr>
	  <tr>
	    <td>Thứ tự</td>
	    <td><input required type="text" class="form-control" name="thutu" placeholder="Nhập thứ tự hình ảnh...." required ></td>
	  </tr>
	   <tr>
	    <td colspan="2" align="right";><input type="submit" class="btn btn-danger" name="themhinhanh" value="Thêm hình ảnh vào slider"></td>
	  </tr>
 </form>
</table>
</div>