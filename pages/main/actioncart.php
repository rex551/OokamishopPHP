
<?php  
 //action.php  
 session_start();  
 if(isset($_POST["product_id"]))  
 {  	     $i = 0;
      $order_table = '';  
      $message = '';  
      if($_POST["action"] == "add")  
      {  
           if(isset($_SESSION["shopping_cart"]))  
           {  
                $is_available = 0;  
                foreach($_SESSION["shopping_cart"] as $keys => $values)  
                { 
                     
                     if($_SESSION["shopping_cart"][$keys]['product_id'] == $_POST["product_id"])  
                     {  
                          $is_available++;  
                          
                          $_SESSION["shopping_cart"][$keys]['product_quantity'] = $_SESSION["shopping_cart"][$keys]['product_quantity'] + $_POST["product_quantity"];  
                     }  
                }  
                if($is_available < 1)  
                {  
                     $item_array = array(  
                          'product_id'               =>     $_POST["product_id"],
                          'product_image'               =>     $_POST["product_image"],   
                          'product_name'               =>     $_POST["product_name"],
                          'product_soluong'          =>     $_POST["product_soluong"],
                          'product_price'               =>     $_POST["product_price"],  
                          'product_quantity'          =>     $_POST["product_quantity"]  
                     );  
                     $_SESSION["shopping_cart"][] = $item_array;  
                }  
           }  
           else  
           {  
                $item_array = array(  
                     'product_id'               =>     $_POST["product_id"],  
                     'product_name'               =>     $_POST["product_name"],
                     'product_image'               =>     $_POST["product_image"],
                     'product_soluong'          =>     $_POST["product_soluong"],
                     'product_price'               =>     $_POST["product_price"],  
                     'product_quantity'          =>     $_POST["product_quantity"]  
                );  
                $_SESSION["shopping_cart"][] = $item_array;  
           }  
      }
      
      if($_POST["action"] == "removecart")  
      {  
           foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
                $i++;
                if($values["product_id"] == $_POST["product_id"])  
                {  
                    $i--;
                     unset($_SESSION["shopping_cart"][$keys]);  
                     $message = '<label class="text-success">Product Removed</label>';  
                }  
           }  
      
           if($_POST["action"] == 'emptycart')
           {
                unset($_SESSION["shopping_cart"]);
           }      }  
      if($_POST["action"] == "quantity_change")  
      {  
           foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
               $i++;
                if($_SESSION["shopping_cart"][$keys]['product_id'] == $_POST["product_id"])  
                {  
                     $_SESSION["shopping_cart"][$keys]['product_quantity'] = $_POST["quantity"];  
                }  
           }  
      }  
      $order_table .= '
          <div class="row">
               <div class="col-md-12 text-center">
                    <h2 class="text-center">Giỏ Hàng Của Bạn</h2>
                    <p>Có '.$i.' sản phẩm trong giỏ hàng của bạn</p>
                    <hr>
               </div>
          </div>
          <div class="row"  >
               <div class="col-md-8">
           ';  
      if(!empty($_SESSION["shopping_cart"]))  
      {  
           $total = 0;  
           foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
                $order_table .= ' 
                <div class="abvc ml-5">
                    <span>Tên sản phẩm: '.$values["product_name"].'</span>
                    <br>
                    <span>Giá tiền: '.number_format($values["product_price"],0,',','.').'vnđ'.'</span>
                    <div class="abcd">
                         <input type="text"  onkeypress="isInputNumber(event)" class="quantity form-control" name="quantity[]" id="quantity'.$values["product_id"].'" value="'.$values["product_quantity"].'" class="form-control quantity" data-product_id="'.$values["product_id"].'" /> 
                         <input class="soluong" type="hidden" name="soluong[]" id="soluong'.$values["product_id"].'" value="'.$values["product_soluong"].'" class="form-control soluong" data-product_id="'.$values["product_id"].'" /> 
                         <p class="totalprice">Thành tiền: '.number_format($values["product_quantity"] * $values["product_price"],0,',','.').'vnđ'.'</p>
                    </div>
               </div>
                    <a name="delete" class="d-flex justify-content-end deletecart" style="text-decoration:none;" id="'. $values["product_id"].'"><i class="fas fa-times"></i></a>
                    <a href="products/'.$values["product_id"].'">
                         <img src="'.$values["product_image"].'" width="150px">
                    </a> 
                    <hr>
                ';  
                $total = $total + ($values["product_quantity"] * $values["product_price"]);  
           }  
           $order_table .= ' 
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
               <div class="col-md-4"> 
                    <div class="card shadow">
                         <div class="card-header"><b>Thông Tin Đơn Hàng</b></div>
                         <div class="card-body">
                              <span>Tổng tiền: </span> <span class="totalproduct"> '.number_format($total,0,',','.').'vnđ'.' </span>
                         </div>
                         <div class="card-footer">
                              <p>Phí vận chuyển sẽ được tính ở trang thanh toán.</p>
                              <p>Bạn cũng có thể nhập mã giảm giá ở trang thanh toán.</p>
                              <a class="text-center form-control mb-3 btn btn-danger" href="pages/checkout" style="text-decoration:none;">THANH TOÁN</a>
                              <p class="text-center"><a href="trangchu" style="text-decoration:none;"><i class="fas fa-arrow-left"></i> Tiếp tục mua hàng</a></p>
                         </div>
                    </div>
               </div>
           ';  
      }  
      $order_table .= '</div>';  
      $output = array(  
           'order_table'     =>     $order_table,  
           'cart_item'          =>     count($_SESSION["shopping_cart"])  
      );  
      echo json_encode($output);  
 }  
 ?>