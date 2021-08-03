<?php 
header('Content-Type: application/json');

include '../config/connect.php';
$action = !empty($_GET['action']) ? $_GET['action'] : 'get';
if ($action ==  'get') {
  $cat_id = isset($_GET['cat_id']) ? $_GET['cat_id'] : 3;
	$sql = "SELECT id,name,status, image FROM product WHERE category_id = $cat_id Order By id DESC";
	$results = [];
	$cats = mysqli_query($conn, $sql);

	while ($value = mysqli_fetch_assoc($cats)) {
		$results[] = $value;
	}

	echo json_encode($results);
}

?>