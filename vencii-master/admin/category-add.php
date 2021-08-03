<?php include 'header.php' ?>
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Thêm mới danh mục
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-body">
          <?php          
          
          if (!empty($_POST['name'])) {
            $name = $_POST['name'];     
           
            
           

            $sql = "INSERT INTO category(name) VALUES('$name')";

            if (mysqli_query($conn,$sql)) { // true, false
              // chuyển hường, thống báo thành công...
              header('location: category.php'); // về trang danh sách
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
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <?php 
                    $sql_1 = "SELECT * FROM category Order By id DESC";
                    $cats = mysqli_query($conn,$sql_1);
                  ?>                  
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