<?php 
	$sql_slider = "SELECT * FROM slider ORDER BY thutu";
	$query_slider = mysqli_query($mysqli,$sql_slider);
?>
<div class="table-reponsive mt-5">
  <table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead class="table-dark">
      <tr>
        <th>ID</th>
        <th>Tên hình</th>
        <th>Hình ảnh</th>
        <th>Thứ tự</th>
        <th>Quản lý</th>
      </tr>
    </thead>
    <tbody>
    <?php
      $i = 0;
      while($row = mysqli_fetch_array($query_slider)){
        $i++;
      ?>
      <tr>
          <td><?php echo $i ?></td>
          <td><?php echo $row['tenhinh'] ?></td>
          <td><img src="modules/quanlyslider/uploads/<?php echo $row['image_path'] ?>" width="150px"></td>
          <td><?php echo $row['thutu'] ?></td>
          <td>
            <a onclick="return confirm('Bạn có chắc chắn xóa không ?')" href="modules/quanlyslider/xuly.php?idhinhanh=<?php echo $row['id'] ?>"><i class="fas fa-trash-alt"></i></a>
          </td>
        </tr>
        <?php
        } 
        ?>
        </tbody>
  </table>
  <script>
  $(document).ready(function() {
      $('#example').DataTable();
  } );
  </script>
  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
</div>