<?php include 'header.php' ?>
<?php 

 ?>
    <!-- Begin Login -->
    
    <!-- End Login -->
    
    
    <!-- Begin Main -->
    <div role="main" class="main">
    
      <!-- Begin page top -->
      <section class="page-top">
        <div class="container">
          <div class="page-top-in">
            <h2><span>Shopping Bag</span></h2>
          </div>
        </div>
      </section>
      <!-- End page top -->

      <div class="container">

        <div class="row featured-boxes">
          <div class="col-md-12">            
            <div class="featured-box featured-box-cart">
              <div class="box-content">
              <?php if(!empty($_SESSION['cus_login']) && !empty($_GET['id'])) :
              $od_id = $_GET['id'];
                $cus = $_SESSION['cus_login'];
                $c_id = $cus['id'];
                $sql = "
                SELECT 
                  dt.price,
                  dt.pro_id,
                  dt.quantity,
                  SUM(dt.price*dt.quantity) as 'sub_total', 
                  p.name,p.image
                  FROM order_detail dt 
                  JOIN product p ON p.id = dt.pro_id
                  WHERE dt.order_id = $od_id
                  GROUP BY dt.price,dt.quantity,p.name,p.image
                ";

                  $orders = mysqli_query($conn,$sql);
                ?>
                  <table cellspacing="0" class="shop_table" width="100%">
                    <thead>
                      <tr>
                        <th class="product-thumbnail">
                          STT
                        </th>
                        <th class="product-name">
                         Ảnh
                        </th>
                        <th class="product-name">
                         Tên sp
                        </th>
                        <th class="product-price">
                          Giá iền
                        </th>
                        <th class="product-price">
                          Số luọng
                        </th>
                        <th class="product-quantity">
                          Thành tiền
                        </th>
                    
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    $tong = 0;
                     foreach($orders as $k => $od) { 
                      $tong += $od['sub_total'];
                     ?>
                      <tr class="cart_table_item">
                        
                        <td class="product-thumbnail">
                         <?php echo $k+1; ?>
                        </td>
             
                          <td class="product-price">
                          <span class="amount"><img src="public/uploads/<?php echo $od['image'] ?>" alt="" width="60"></span>
                        </td>
                         <td class="product-price">
                          <a href="product-detail.php?id=<?php echo $od['pro_id'] ?>"><?php echo $od['name'] ?></a>
                        </td>
                        <td class="product-price">
                          <span class="amount">$<?php echo number_format($od['price']) ?></span>
                        </td>
                        <td class="product-quantity">
                           <span class="amount"><?php echo number_format($od['quantity']) ?></span>
                        </td>
                        <td class="product-quantity">
                           <span class="amount">$<?php echo number_format($od['sub_total']) ?></span>
                        </td>
                      
                      </tr>
                      
                    <?php } ?>
                    </tbody>
                  </table>
                  <hr>
                  <h2 class="text-right">
                    Tổng tiền: <?php echo number_format($tong); ?>
                  </h2>
              <?php else: ?>
              <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                Bạn chưa có sản phẩm trong giỏ hàng  <a href="checkout.php" title="">Đăng nhập</a> tại đây !
              </div>
              <?php endif; ?>
            </div>
            </div>
          </div>
        </div>
  <hr>
        

      </div>
      
    </div>
    <!-- End Main -->
<?php include 'footer.php' ?>
