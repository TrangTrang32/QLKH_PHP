<?php include 'header.php'; 
$id = $_GET ['id'];
$sql1 = "SELECT * FROM product WHERE id = $id";
$query = mysqli_query($conn, $sql1 );
$value = mysqli_fetch_assoc($query);
?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit product
      </h1>
    </section>;

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-body">
          <?php 
          echo '<pre>';
          // print_r($query);
          // print_r($_POST);
          echo '</pre>';
          $image = $value['image'];
          if (!empty($_FILES['image']['name'])) {
            $file = $_FILES['image'];
            $image = $file['name'];
            $tmp_name = $file['tmp_name'];
            move_uploaded_file($tmp_name, '../public/uploads/'.$image);
          }

          if (!empty($_POST['name'])) {
            $name = $_POST['name'];
            $price = $_POST['price'];
            $category_id = $_POST['category_id'];

            $sql = "UPDATE product SET name = '$name', image = '$image', price = '$price' where id = $id";

            if (mysqli_query($conn,$sql)) { // true, false
              // chuyển hường, thống báo thành công...
              header('location: product.php'); // về trang danh sách
            }else{
              echo mysqli_error($conn);
            }
          }
          ?>
          <form method="POST" action="" enctype="multipart/form-data">
            <div class="form-group">
              <label for="">Product name</label>
              <input name="name" class="form-control" placeholder="Tên sản phẩm" value="<?php echo $value['name']; ?>">
            </div>
            <div class="form-group">
        <label for="">Product Price</label>
        <input type="text" class="form-control" name="price" placeholder="Input Product name" value="<?php echo $value['price'];?>">
      </div>
            </div>            
            <div class="form-group">
              <label for=""> Image Product</label>
              <input type="file" name="image" class="form-control" >
              <img src="../public/uploads/<?php echo $value['image']; ?>" width="120px">
            </div>
             <div class="form-group">
              <button type="" class="btn btn-primary"><i class="fa fa-save"></i> Lưu lại</button>
            </div>
          </form>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include 'footer.php'; ?>
Kết thúc cuộc trò chuyện
Nhập tin nhắn...

