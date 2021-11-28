<?php

//fetch_cart.php

session_start();

$total_price = 0;
$total_item = 0;

$output = '<div class="container">
	<table class="table">

';
if(!empty($_SESSION["shopping_cart"]))
{
	foreach($_SESSION["shopping_cart"] as $keys => $values)
	{
		$output .= '
		<tr>
			<span class="product_soluong">'.$values["product_soluong"].'</span>
			<td class="img">
			<a href="products/'.$values["product_id"].'">
				<img class="testtaicho mr-5" width="75" src="'.$values["product_image"].'"/>
			</a>
			</td>
			<td>
				<div class="cart-mini">
					<div>
						<span class="pro-title-view"><b>'.$values["product_name"].'</b></span>
					</div>
					<div class="mini-cart_quantity mt-3">
						<div class="pro-quantity-view">'.$values["product_quantity"].'</div>
						<div class="pro-price-view text-danger">'.number_format($values["product_price"],0,',','.').'vnđ'.'</div>
					</div>
					<div class="remove-cart">
						<a name="delete" class="delete text-danger" id="'. $values["product_id"].'">X</a>
					</div>	
				</div>	
			</td>	
		</tr>	
		';
		$total_price = $total_price + ($values["product_quantity"] * $values["product_price"]);
		$total_item = $total_item + 1;
	}
	$output .= '

		 
			<td>TỔNG TIỀN: </td>  
			<td class="total-cart">'.number_format($total_price,0,',','.').'vnđ'.'</td>   
		

	';
}

else
{
	$output .= '

		<td class="empty text-center">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<i class="fas fa-shopping-cart"></i>
				</div>
				<div class="col-md-12">
					Hiện chưa có sản phẩm
				</div>
			</div>
		</div>
		</td>
    ';
}
$output .= '</table></div>';
$data = array(
	'cart_details'		=>	$output,
	'total_item'		=>	$total_item
);	

echo json_encode($data);


?>