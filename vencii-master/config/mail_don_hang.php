<?php 
$table = '<h3>Chào bạn: '.$name.'</h3>';
$table = '<a href="http://localhost:81/Venciiphp/my-order-detail.php?id='.$order_id.'">ẤN VÀO ĐÂY ĐỂ XEM CHI TIẾT ĐƠN HÀNG</a>';

$table .= 'Dưới đây là chi tiết đơn hàng của bạn';

$table .= '<table border="1" cellpadding="10" cellspacing="0">
<tr>
	<th>STT</th>
	<th>Name</th>
	<th>Price</th>
	<th>Quantity</th>
</tr>';


foreach ($carts as $key => $cart) {
	$pro_id = $cart['id'];
	$pro_name = $cart['name'];
	$price = $cart['price'];
	$quantity = $cart['quantity'];

	$table .= '<tr>';
		$table .= '<td>'.($key+1).'</td>';
		$table .= '<td>'.$pro_name.'</td>';
		$table .= '<td>'.$price.'</td>';
		$table .= '<td>'.$quantity.'</td>';
	$table .= '</tr>';

}

$table .='</table>';



?>