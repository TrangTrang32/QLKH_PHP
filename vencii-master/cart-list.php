<?php include 'header.php' ?>
<?php 

$carts = !empty($_SESSION['cart']) ? $_SESSION['cart'] : [];
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
            <h3>(<?php echo count($carts) ?> Sản phẩm)</h3>
            <div class="featured-box featured-box-cart">
              <div class="box-content">
              <?php if(count($carts) > 0) : ?>
                <form method="GET" action="shop-cart.php">
                  <table cellspacing="0" class="shop_table" width="100%">
                    <thead>
                      <tr>
                        <th class="product-thumbnail">
                          Sản phẩm
                        </th>
                        <th class="product-name">
                          Tên
                        </th>
                        <th class="product-price">
                          Giá
                        </th>
                        <th class="product-quantity">
                          Số lượng
                        </th>
                        <th class="product-subtotal">
                          Tổng giá sản phẩm
                        </th>
                        <th class="product-remove">
                          &nbsp;
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach($carts as $cart) { 
                      $tt = $cart['price'] * $cart['quantity'];
                    ?>
                      <tr class="cart_table_item">
                        
                        <td class="product-thumbnail">
                          <a href="shop-product-sidebar.html">
                            <img alt="" width="80" src="public/uploads/<?php echo $cart['image'] ?>">
                          </a>
                        </td>
                        <td class="product-name">
                          <a href="product-detail.php?id=<?php echo $cart['id'] ?>"><?php echo $cart['name'] ?></a>
                        </td>
                        <td class="product-price">
                          <span class="amount">$<?php echo $cart['price'] ?></span>
                        </td>
                        <td class="product-quantity">
                            <input type="hidden" name="ids[]" value="<?php echo $cart['id'] ?>" min="1" step="1">
                            <div class="quantity">
                              <input type="button" class="minus" value="-">
                              <input type="text" class="input-text qty text" name="qtt[]" value="<?php echo $cart['quantity'] ?>"  min="1" step="1">
                              <input type="button" class="plus" value="+">
                            </div>
                          
                        </td>
                        <td class="product-subtotal">
                          <span class="amount">$<?php echo number_format($tt); ?></span>
                        </td>
                        <td class="product-remove">
                          <a title="Remove this item" class="remove" href="shop-cart.php?id=<?php echo $cart['id'] ?>&action=delete">
                            <i class="fa fa-times-circle"></i>
                          </a>
                        </td>
                      </tr>
                      
                    <?php } ?>
                    </tbody>
                  </table>
                  <hr>
                  <input type="hidden" name="action" value="update">
                  <button type="submit" class="btn btn-primary pull-right btn-sm">Cập nhật giỏ hàng</button>
                  <a href="shop-cart.php?action=clear" type="submit" class="btn btn-danger pull-right btn-sm" onclick="return confirm('Bạn có chắc không?')">Xóa hết</a>
              </form>
              <?php else: ?>
              <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                Bạn chưa có sản phẩm trong giỏ hàng ...<a href="index.php" title="">Tiếp tục mua</a>
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
                <h4>Tổng tiền</h4>
                <table cellspacing="0" class="cart-totals" width="100%">
                  <tbody>
                    <tr class="total">
                      <th>
                        Tổng
                      </th>
                      <td>
                        <span class="amount">$ <?php echo number_format(totalPrice()) ?></span>
                      </td>
                    </tr>
                  </tbody>
                </table>
                <p>
                  <a href="checkout.php" class="btn btn-primary btn-block btn-sm">Tiếp tục</a>
                </p>
               
              </div>
            </div>
          </div>
        </div>

      </div>
      
    </div>
    <!-- End Main -->
<?php include 'footer.php' ?>

<script type="text/javascript">

  $('.plus').click(function(event) {
    var _qtt = $(this).parent().find('input.qty').val();
    var _newqtt  = parseInt(_qtt) +1;
    $(this).parent().find('input.qty').val(_newqtt);
    console.log(_qtt);
  });

   $('.minus').click(function(event) {
    var _qtt = $(this).parent().find('input.qty').val();
    var _newqtt  = _newqtt > 1 ? parseInt(_qtt) - 1 : 1;
    $(this).parent().find('input.qty').val(_newqtt);
    console.log(_qtt);
  });

</script>