<?php include 'header.php' ?>
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Thêm mới sản phẩm
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-body">
          <?php 
          $image = '';
          if (!empty($_FILES['image']['name'])) {
            $file = $_FILES['image'];
            $image = $file['name'];
            $tmp_name = $file['tmp_name'];
            move_uploaded_file($tmp_name, '../public/uploads/'.$image);
          }
          if (!empty($_FILES['image_list']['name'])) {
            $fs = $_FILES['image_list'];
            // echo '<pre>';
            // print_r($_FILES['image_list']['name']);
            // echo '</pre>';
            
            $image_list = '';
            for ($i=0; $i < count($fs['name']); $i++) { 
              $images = $fs['name'][$i];
              $tmp_names = $fs['tmp_name'][$i];
              move_uploaded_file($tmp_names, '../public/uploads/'.$images);
              $image_list = json_encode($fs['name']);
            }
            echo $image_list;

          }
          if (!empty($_POST['name'])) {
            $name = $_POST['name'];
            $price = $_POST['price'];
            $sale_price = $_POST['sale_price'];
            $category_id = $_POST['category_id'];
            $content = $_POST['content'];
            $status = $_POST['status'];

            $sql = "INSERT INTO product(name,price,sale_price,status,image,category_id,content,image_list) VALUES('$name','$price','$sale_price','$status','$image','$category_id','$content','$image_list')";

            if (mysqli_query($conn,$sql)) { // true, false
              // chuyển hường, thống báo thành công...
              header('location: product.php'); // về trang danh sách
            }else{
              echo mysqli_error($conn);
            }
          }
          ?>
          <form method="POST" action="" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-9">
                <div class="form-group">
                  <label for="">Tên sản phẩm</label>
                  <input name="name" class="form-control" placeholder="Tên banner">
                </div>
                <div class="form-group">
                  <label for="">Ảnh khác</label>
                  <input type="file" name="image_list[]" class="form-control" multiple>
                </div> 
                <div class="form-group">
                  <label for="">Nội dung</label>
                  <textarea name="content" id="content"  class="form-control" rows="3"></textarea>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <?php 
                    $sql_1 = "SELECT * FROM category Order By id DESC";
                    $cats = mysqli_query($conn,$sql_1);
                  ?>
                  <label for="">Danh mục sản phẩm</label>
                  <select name="category_id" class="form-control" required>
                    <option value="">Chọn danh mục</option>
                  <?php foreach($cats as $key => $cat) : ?>
                    <option value="<?php echo $cat['id'] ?>"><?php echo $cat['name'] ?></option>
                  <?php endforeach; ?>
                  </select>
                </div>
                
                <div class="form-group">
                  <label for="">Giá sản phẩm</label>
                  <input name="price" class="form-control" placeholder="Giá">
                </div>
                <div class="form-group">
                  <label for="">Giá khuyến mãi</label>
                  <input name="sale_price" class="form-control" placeholder="Giá">
                </div>
                <div class="form-group">
                  <label for="">Trạng thái</label>
                 <div class="radio">
                   <label for="show">
                     <input type="radio" id="show" name="status" value="1"> Hiện
                   </label>
                    <label for="hide">
                     <input type="radio" id="hide" name="status" value="0"> Ẩn
                   </label>
                 </div>
                </div>
                <div class="form-group">
                  <label for="">Ảnh đại diện</label>
                  <input type="file" name="image" class="form-control" >
                </div>
                <div class="form-group">
                  <button type="" class="btn btn-primary"><i class="fa fa-save"></i> Lưu lại</button>
                </div>
              </div>

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