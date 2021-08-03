<?php include 'header.php' ?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-body">
          <?php 
            $id = $_GET['id'];
            $sql = "DELETE FROM product WHERE id = $id";

            if (mysqli_query($conn,$sql)) {
              header('location: product.php');
            }else{
              echo mysqli_error($conn);
            }
           ?>
        </div>
        <!-- /.box-body -->
       
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include 'footer.php'; ?>