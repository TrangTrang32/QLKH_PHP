<?php 
header('Content-Type: application/json');

include '../config/connect.php';
$action = !empty($_GET['action']) ? $_GET['action'] : 'get';
if ($action ==  'get') {
	$sql = "SELECT id,name,status FROM category Order By name ASC";
	$results = [];
	$cats = mysqli_query($conn, $sql);

	while ($value = mysqli_fetch_assoc($cats)) {
		$results[] = $value;
	}

	echo json_encode($results);
}
if ($action ==  'add') {
	// echo json_encode($_POST);

	if (!empty($_POST['name'])) {
        $name = $_POST['name'];
        $status = $_POST['status'];

        $sql = "INSERT INTO category(name,status) VALUES('$name','$status')";

        if (mysqli_query($conn,$sql)) { // true, false

          echo json_encode(['succes'=>'Thêm mới thành công']);
        }else{
        	echo json_encode(['error'=> 'Thêm mới không thành công']);
        }
      }
}
if ($action ==  'update') {

	if (!empty($_POST['name'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $status = $_POST['status'];

        $sql = "UPDATE category SET name ='$name',status = '$status' WHERE id = $id";

        if (mysqli_query($conn,$sql)) { // true, false

          echo json_encode(['succes'=>'Thêm mới thành công']);
        }else{
        	echo json_encode(['error'=> 'Thêm mới không thành công']);
        }
      }
}

if ($action ==  'del') {
	$id = !empty($_GET['id']) ? $_GET['id'] : 0;
	$sql = "DELETE FROM category WHERE id = $id";

	if (mysqli_query($conn, $sql)) {
		echo json_encode(['succes'=>'Xóa thành công']);
	}else{
		echo json_encode(['error'=> 'Xóa không thành công']);
	}

}
?>