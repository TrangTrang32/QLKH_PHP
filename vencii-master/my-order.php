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
            <h2><span>Giỏ hàng</span></h2>
          </div>
        </div>
      </section>
      <!-- End page top -->

      <div class="container">

        <div class="row featured-boxes">
          <div class="col-md-12">
           
            <div class="featured-box featured-box-cart">
              <div class="box-content">
              <?php if(!empty($_SESSION['cus_login'])) : 
                $cus = $_SESSION['cus_login'];
                $c_id = $cus['id'];
                  $orders = mysqli_query($conn,"SELECT 
  o.*,SUM(dt.price*dt.quantity) as 'total' 
FROM orders o
JOIN order_detail dt
ON o.id = dt.order_id
WHERE o.customer_id = $c_id
GROUP By o.id Order BY o.id DESC");
                ?>
                  <table cellspacing="0" class="shop_table" width="100%">
                    <thead>
                      <tr>
                        <th class="product-thumbnail">
                          STT
                        </th>
                        <th class="product-name">
                          Ngày đặt
                        </th>
                        <th class="product-price">
                          Tổng tiền
                        </th>
                        <th class="product-quantity">
                          Trạng thái
                        </th>
                        <th class="product-remove">
                          &nbsp;
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach($orders as $k => $od) {   ?>
                      <tr class="cart_table_item">
                        
                        <td class="product-thumbnail">
                         <?php echo $k+1; ?>
                        </td>
                        <td class="product-name">
                          <a href="product-detail.php?id=<?php echo $cart['id'] ?>"><?php echo $od['created_date'] ?></a>
                        </td>
                        <td class="product-price">
                          <span class="amount">$<?php echo number_format($od['total']) ?></span>
                        </td>
                        <td class="product-quantity">
                          <?php if($od['status'] == 0) : ?>
                            <span>Đang chờ duyệt</span>
                          <?php else: ?>
                            <span>Đã được chấp nhậ</span>
                          <?php endif; ?>
                        </td>
                        
                        <td class="product-remove">
                          <a title="Remove this item" class="remove" href="my-order-detail.php?id=<?php echo $od['id'] ?>">
                            <i class="fa fa-eye"> Chi tiết</i>
                          </a>
                        </td>
                      </tr>
                      
                    <?php } ?>
                    </tbody>
                  </table>
                  <hr>
              <?php else: ?>
              <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Note!</strong> Bạn chưa đăng nhập, vui lòng <a href="login.php" title="">Click vào đâyg</a> để dăng nhập
              </div>
              <?php endif; ?>
            </div>
            </div>
          </div>
        </div>
  <hr>
        <div class="row featured-boxes">
          
          
          <div class="col-xs-4 pull-right">
            <div class="featured-box featured-box-secondary">
              <div class="box-content">
                <h4>Shopping bag summary</h4>
                <table cellspacing="0" class="cart-totals" width="100%">
                  <tbody>
                    <tr class="total">
                      <th>
                        Total
                      </th>
                      <td>
                        <span class="amount">$ <?php echo number_format(totalPrice()) ?></span>
                      </td>
                    </tr>
                  </tbody>
                </table>
                <p>
                  <a href="checkout.php" class="btn btn-primary btn-block btn-sm">CHECKOUT</a>
                </p>
               
              </div>
            </div>
          </div>
        </div>

      </div>
      
    </div>
    <!-- End Main -->
<?php include 'footer.php' ?>
