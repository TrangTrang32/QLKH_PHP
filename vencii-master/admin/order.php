<?php include 'header.php' ?>
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Danh sách đơn hàng
      </h1>
    </section>
<?php 
  $sql = "SELECT o.id,o.created_date,c.name,c.email,c.phone FROM orders o JOIN customer c ON o.customer_id = c.id  Order By o.id DESC";
  if (!empty($_GET['status']) && empty($_GET['filter_date'])) {
    $status = $_GET['status'];
     $sql = "SELECT o.id,o.created_date,c.name,c.email,c.phone FROM orders o JOIN customer c ON o.customer_id = c.id  WHERE o.status = $status Order By o.id DESC";
  }

  if (!empty($_GET['filter_date']) && empty($_GET['status'])) {
    $filter_date = $_GET['filter_date'];
    $data_array = explode(' - ', $filter_date);
    $date_from = $data_array[0];
    $date_to = $data_array[1];
    echo $date_from;
    $sql = "SELECT o.id,o.created_date,c.name,c.email,c.phone FROM orders o JOIN customer c ON o.customer_id = c.id  WHERE o.created_date BETWEEN '$date_from' AND '$date_to' Order By o.id DESC";
  }
  
  if (!empty($_GET['filter_date']) && !empty($_GET['status'])) {
    $sql = "SELECT o.id,o.created_date,c.name,c.email,c.phone FROM orders o JOIN customer c ON o.customer_id = c.id  WHERE o.status = $status AND o.created_date BETWEEN '$date_from' AND '$date_to' Order By o.id DESC";
  }
  $orders = mysqli_query($conn,$sql);

 ?>
    <!-- Main content -->
    <section class="content">
      <!-- /.box -->
      <div class="box">
        
        <div class="box-header">
          <form action="" method="GET" class="form-inline" role="form">
          
            <div class="form-group">
              <select name="status" class="form-control">
                <option value="">Vui lòng chọn</option>
                <option value="0">Chưa duyệt</option>
                <option value="1">Đã duyệt</option>
                <option value="2">Đã giao hàng</option>
              </select>
            </div>

            <div class="form-group">
                <label>Date range:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input name="filter_date" type="text" class="form-control pull-right" id="reservation">
                </div>
                <!-- /.input group -->
              </div>
          
          
            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
          </form>

        </div>
        <div class="box-body">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Id</th>
                <th>Ngày đặt</th>
                <th>Tên khách hàng</th>
                <th>Email</th>
                <th>Phone</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
            <?php foreach($orders as $od) : ?>
              <tr>
                <td><?php echo $od['id']; ?></td>
                <td><?php echo $od['created_date'] ?></td>
                <td><?php echo $od['name'] ?></td>
                <td><?php echo $od['email'] ?></td>
                <td><?php echo $od['phone'] ?></td>
                <td>
                  <a href="" class="btn btn-sm btn-primary">Chi tiết</a>
                </td>
              </tr>
            <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
        
        <!-- /.box-footer-->
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include 'footer.php'; ?>
<script type="text/javascript" src="public/js/moment.min.js"></script>
<script type="text/javascript" src="public/js/daterangepicker.js"></script>
<script type="text/javascript">
  $('#reservation').daterangepicker({
      locale: {
        format: 'YYYY-M-DD'
      }
  });
</script>