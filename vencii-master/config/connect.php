<?php 
$conn = mysqli_connect('localhost','root','','vencii');
// set tiếng việt
mysqli_set_charset($conn,'utf8');

function totalQtt(){
	$carts = !empty($_SESSION['cart']) ? $_SESSION['cart'] : [];
	$tong = 0;
	foreach ($carts as $key => $cart) {
		$tong = $tong + $cart['quantity'];
	}

	return $tong;
}

function totalPrice(){
	$carts = !empty($_SESSION['cart']) ? $_SESSION['cart'] : [];
	$tong = 0;
	foreach ($carts as $key => $cart) {
		$tong = $tong + ($cart['quantity']*$cart['price']);
	}

	return $tong;
}

?>

