<?php include 'header.php' ?>
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Chỉnh sửa danh mục
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-body">
          <?php 
          $id = $_GET['id'];
          $query = mysqli_query($conn,"SELECT * FROM category WHERE id = $id");
          $cat = mysqli_fetch_assoc($query); // Duyệt một dòng

          if (!empty($_POST['name'])) {
            $name = $_POST['name'];
            $status = $_POST['status'];

            $sql = "UPDATE category SET name = '$name', status = $status WHERE id  = $id";

            if (mysqli_query($conn,$sql)) { // true, false
              // chuyển hường, thống báo thành công...
              header('location: category.php'); // về trang danh sách
            }else{
              echo mysqli_error($conn);
            }
          }
          ?>
          <div class="row">
            <div class="col-md-3">
              <form method="POST" action="" enctype="multipart/form-data">
            <div class="form-group">
              <label for="">Tên danh mục</label>
              <input name="name" class="form-control" placeholder="Tên banner" value="<?php echo $cat['name'];?>">
            </div>
           
            <div class="form-group">
              <label for="">Trạng thái</label>
             <div class="radio">
               <label for="show">
                 <input type="radio" id="show" name="status" value="1" <?php echo $cat['status'] == 1 ? 'checked': ''; ?>> Hiện
               </label>
                <label for="hide">
                 <input type="radio" id="hide" name="status" value="0" <?php echo $cat['status'] == 0 ? 'checked': ''; ?>> Ẩn
               </label>
             </div>
            </div>
            
             <div class="form-group">
              <button type="" class="btn btn-primary"><i class="fa fa-save"></i> Lưu lại</button>
            </div>
          </form>
            </div>
            <div class="col-md-9">
              <?php include 'category-table.php'; ?>
            </div>
          </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include 'footer.php'; ?>