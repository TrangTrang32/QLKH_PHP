<?php 
session_start();

include 'config/connect.php';

$id = !empty($_GET['id']) ? $_GET['id'] : 0;
$action = !empty($_GET['action']) ? $_GET['action'] : 'add';
$quantity = !empty($_GET['quantity']) ? $_GET['quantity'] : 1;
// triu vấn dữ lieek 
$query = mysqli_query($conn,"SELECT * FROM product WHERE id = $id");

$pro = mysqli_fetch_assoc($query);
$carts = !empty($_SESSION['cart']) ? $_SESSION['cart'] : [];
// theem vaof
if ($action == 'add' && $pro) {
	if (isset($carts[$id])) {
		$carts[$id]['quantity'] +=$quantity;
	}else{
		$cart = [
			'id' => $pro['id'],
			'name' => $pro['name'],
			'image' => $pro['image'],
			'price' => ($pro['sale_price'] > 0) ? $pro['sale_price'] : $pro['price'],
			'quantity' => $quantity
		];
		$carts[$id] = $cart;
	}
	
	
	echo '<pre>';
	

	$_SESSION['cart']=$carts;
}
// Xóa 
if ($action == 'delete'){
	if (isset($_SESSION['cart'][$id])) {
		unset($_SESSION['cart'][$id]);
	}
	
}
// cập nhật số lượng
if ($action == 'update'){

	$ids  = $_GET['ids'];
	$qtt  = $_GET['qtt'];
	# sư liệu sẽ gửi lên là một mảng...
	for ($i=0; $i < count($ids); $i++) { 
		$id = $ids[$i];
		$quantity = $qtt[$i] > 0 ? $qtt[$i] : 1;
		$quantity = ceil($quantity); // làm tròn lên
		// echo $id;
		$_SESSION['cart'][$id]['quantity'] = $quantity;
	}
	
}

if ($action == 'clear') {
	unset($_SESSION['cart']);
}

print_r($_SESSION['cart']);
// Xóa hết

// Chuyển hướng về danh sách giỏ hàng
header('location: cart-list.php'); //. giao diênh
?>