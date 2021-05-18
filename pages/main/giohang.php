<?php
  	$i = 0;
  	$tongtien = 0;
?>
<?php
	if(isset($_SESSION["shopping_cart"])){
    foreach($_SESSION["shopping_cart"] as  $keys => $values){
      $i++;
    }
	}
?>
<div class="menu mb-3">
	<div class = "titlemenu">
		<a href="trangchu">Trang Chủ / </a>
		<a href="cart">Giỏ Hàng</a>
	</div>
</div>
<div class="container mb-5 fonchukoho" id="order_table">
  <div class="row">
    <div class="col-md-12 text-center">
      <h2 class="text-center">Giỏ Hàng Của Bạn</h2>
      <p>Có <?php echo $i ?> sản phẩm trong giỏ hàng của bạn</p>
      <hr>
    </div>
  </div>
  <div class="row"  >
      <div class="col-md-8">
          <?php
            if(isset($_SESSION["shopping_cart"])){
  	          foreach($_SESSION["shopping_cart"] as $keys => $values){
  		          $thanhtien = $values["product_quantity"] * $values["product_price"];
  		          $tongtien+=$thanhtien;
  		          $i++;
          ?>
            <div class="abvc ml-5">
            <span>Tên sản phẩm: <?php echo $values["product_name"]; ?></span>
            <br>
            <span>Giá tiền: <?php echo number_format($values["product_price"],0,',','.').'vnđ'; ?></span>
            <div class="abcd">
               <input class="quantity form-control" type="text" name="quantity[]" id="quantity<?php echo $values["product_id"] ?>" value="<?php echo $values["product_quantity"]; ?>" data-product_id="<?php echo $values["product_id"]; ?>" /></td>  
               <input class="soluong" type="hidden" name="soluong[]" id="soluong<?php echo $values["product_id"]; ?>" value="<?php echo $values["product_soluong"]; ?>" data-product_id="<?php echo $values["product_id"]; ?>" class="form-control soluong" /> 
               <p class="totalprice">Thành tiền: <?php echo number_format($thanhtien,0,',','.').'vnđ' ?></p>
            </div>
          </div>
            <a class="d-flex justify-content-end deletecart" name="delete" id="<?php echo $values["product_id"]; ?>"style="text-decoration:none;"><i class="fas fa-times"></i></a>
            <a href="products/<?php echo $values["product_id"] ?>">
              <img src="<?php echo $values["product_image"]?>" width="150px">
            </a>
            <hr>
            <?php } ?>
        <?php } ?>
        <?php if($i >0){ ?>
        <div class="row">
                <div class="col-md-5">
                <p><b>Ghi chú đơn hàng</b></p>
                <textarea class="form-control shadow" name="" id="" cols="30 " rows="5" placeholder="Ghi chú"></textarea>
                </div>
                <div class="col">
                <p><b>Chính sách mua hàng</b></p>
                <p><i class="fas fa-arrow-right"></i> Sản phẩm được đổi 1 lần duy nhất, không hỗ trợ trả.</p>
                <p><i class="fas fa-arrow-right"></i> Sản phẩm còn đủ tem mác, chưa qua sử dụng.</p>
                <p><i class="fas fa-arrow-right"></i> Sản phẩm nguyên giá được đổi trong 3 ngày trên toàn hệ thống</p>
                <p><i class="fas fa-arrow-right"></i> Sản phẩm sale chỉ hỗ trợ đổi size (nếu cửa hàng còn) trong 3 ngày trên toàn hệ thống.</p>
                </div>
        </div>
      </div>
      <div class="col-md-4 ">
        <div class="card shadow">
          <div class="card-header"><b> Thông Tin Đơn Hàng</b></div>
          <div class="card-body">
          <?php if($tongtien ==0){ ?>
            <span>Tổng tiền: </span> <span class="totalproduct"> 0vnđ </span>
            <?php }else{ ?>
           <span>Tổng tiền: </span> <span class="totalproduct"> <?php echo number_format($tongtien,0,',','.').'vnđ' ?> </span>
           <?php } ?>
          </div>
          <div class="card-footer">
            <p>Phí vận chuyển sẽ được tính ở trang thanh toán.</p>
            <p>Bạn cũng có thể nhập mã giảm giá ở trang thanh toán.</p>
            <?php if($i==0){ ?>
              <button class="form-control mb-3">THANH TOÁN</button>
            <?php }else{ ?>
            <a class="form-control mb-3 text-center btn btn-danger" href="pages/checkout" style="text-decoration:none;" >THANH TOÁN</a>
            <?php } ?>
            <p class="text-center"><a href="trangchu" style="text-decoration:none;"><i class="fas fa-arrow-left"></i> Tiếp tục mua hàng</a></p>
          </div>
        </div>
      </div>
  </div>
           <?php } ?>
</div>                     