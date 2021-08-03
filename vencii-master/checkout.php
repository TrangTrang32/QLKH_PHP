<?php include 'header.php' ?>
<?php $carts = !empty($_SESSION['cart']) ? $_SESSION['cart'] : []; ?>
<div class="container">
	<hr>
	<!-- nếu chưa đăng nhập -->
	<?php if(!isset($_SESSION['cus_login'])) : ?>
		<div class="row">
			<div class="col-md-6">
				<?php 
					if (isset($_POST['login_email'])) {
						$_email = $_POST['login_email'];
						$_password = $_POST['login_password'];

						$sqllogin =  "SELECT * FROM customer WHERE email = '$_email' AND password ='$_password'";
						$query = mysqli_query($conn,$sqllogin);

						if (mysqli_num_rows($query) == 1) {

							$cus = mysqli_fetch_assoc($query);
							$_SESSION['cus_login'] = $cus;

							header('location: checkout.php');

						}else{
							echo mysqli_error($conn);
						}
					}
				 ?>
				<form action="" method="POST" role="form">
					<legend>Đăng nhập</legend>
				
					<div class="form-group">
						<label for="">Email</label>
						<input type="text" class="form-control" name="login_email" placeholder="Input field">
					</div>
					<div class="form-group">
						<label for="">Password</label>
						<input type="password" class="form-control" name="login_password" placeholder="Input field">
					</div>
					
				
					<button type="submit" class="btn btn-primary">Đăng nhập</button>
				</form>
			</div>
			<div class="col-md-6">
				<?php 
					if (isset($_POST['name'])) {
						$name = $_POST['name'];
						$email = $_POST['email'];
						$phone = $_POST['phone'];
						$address = $_POST['address'];
						$password = $_POST['password'];

						$sql =  "INSERT INTO customer(name,email,phone,address,password) VALUES('$name','$email','$phone','$address','$password')";
						if (mysqli_query($conn,$sql)) {
							$cus_id = mysqli_insert_id($conn); // lấy về id vừa mới thêm
							$_SESSION['cus_login'] = $_POST;
							$_SESSION['cus_login']['id'] = $cus_id;
							header('location: checkout.php');
						}else{
							echo mysqli_error($conn);
						}
					}
				 ?>
				<form action="" method="POST" role="form">
					<legend>Đăng ký tài khoản mới</legend>
				
					<div class="form-group">
						<label for="">Họ tên</label>
						<input type="text" class="form-control" name="name" placeholder="Input field">
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input type="text" class="form-control" name="email" placeholder="Input field">
					</div>
					<div class="form-group">
						<label for="">Phone</label>
						<input type="number" class="form-control" name="phone" placeholder="Input field">
					</div>
					<div class="form-group">
						<label for="">Address</label>
						<input class="form-control" name="address" placeholder="Input field">
					</div>
					<div class="form-group">
						<label for="">Password</label>
						<input type="password" class="form-control" name="password" placeholder="Input field">
					</div>
				
					<button type="submit" class="btn btn-primary">Đăng ký</button>
				</form>
			</div>
		</div>
	<!-- Đã đăng nhập -->
	<?php else:
		$cus = $_SESSION['cus_login'];
		$customer_id = $cus['id'];
		$name = $cus['name'];
		$email = $cus['email'];
	 ?>
		<div class="row">
			<form action="" method="POST" role="form">
				<?php 
					if (isset($_POST['checkout'])) {
						# Nếu có thông tin người nhậ
						$name1 = isset($_POST['name1']) ? $_POST['name1'] : '';
						$email1 = isset($_POST['email1']) ? $_POST['email1'] : '';
						$phone1 = isset($_POST['phone1']) ? $_POST['phone1'] : '';
						$address1 = isset($_POST['address1']) ? $_POST['address1'] : '';
						# kTạo đơn hàng và trả về id

						$sql_od = "INSERT INTO orders(customer_id,name,email,phone,address) VALUES('$customer_id','$name1','$email1','$phone1','$address1')";
						if (mysqli_query($conn,$sql_od)) {
							$flag = true;
							$order_id  = mysqli_insert_id($conn);
						

							foreach ($carts as $key => $cart) {
								$pro_id = $cart['id'];
								$pro_name = $cart['name'];
								$price = $cart['price'];
								$quantity = $cart['quantity'];


								$sqL_dt = "INSERT INTO order_detail(order_id,pro_id,quantity,price) VALUES('$order_id','$pro_id','$quantity','$price')";
								if (!mysqli_query($conn,$sqL_dt)) {
									$flag =  false;
									break;
								}
							}

							
							if ($flag == true) {
								// gửi mail về cho kahch hàng
								include 'config/mail_don_hang.php';
								unset($_SESSION['cart']);
								header('location: checkout-ok.php');
							}else{
								$sql_delod = "DELETE FROM orders WHERE id = $order_id";
								$sql_delodt = "DELETE FROM order_detail WHERE order_id = $order_id";
								mysqli_query($conn,$sql_delodt); // hủy chi tiết đơn hàng vừ đặt
								mysqli_query($conn,$sql_delod); // hủy đơn hàng vừ đặt
							}
						}else{
							echo mysqli_error($conn);
						}

						
					}

				 ?>
				<div class="col-md-6">
					<legend>Thông tin tài khoản</legend>
					<div class="form-group">
						<label for="">Họ tên</label>
						<input type="text" class="form-control" name="name" placeholder="Input field" value="<?php echo $cus['name'];?>">
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input type="text" class="form-control" name="email" placeholder="Input field"  value="<?php echo $cus['email'];?>">
					</div>
					<div class="form-group">
						<label for="">Điện thoại</label>
						<input type="text" class="form-control" name="phone" placeholder="Input field"  value="<?php echo $cus['phone'];?>">
					</div>
					<div class="form-group">
						<label for="">Địa chỉ</label>
						<input type="text" class="form-control" name="address" placeholder="Input field"  value="<?php echo $cus['address'];?>">
					</div>
				</div>
				<div class="col-md-6">
					<legend>Bạn đặt cho người khác <input id="is_check" type="checkbox" name=""> ?</legend>
					<p>Vui lòng nhập tông tin của người nhận</p>

					<div id="nguoi-nhan">
						<div class="form-group">
						<label for="">Họ tên</label>
						<input type="text" class="form-control" name="name1" placeholder="Input field" >
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input type="text" class="form-control" name="email1" placeholder="Input field"  >
					</div>
					<div class="form-group">
						<label for="">Điện thoại</label>
						<input type="text" class="form-control" name="phone1" placeholder="Input field"  >
					</div>
					<div class="form-group">
						<label for="">Địa chỉ</label>
						<input type="text" class="form-control" name="address1" placeholder="Input field"  >
					</div>
					</div>
				</div>
				
			
				<button type="submit" name="checkout" class="btn btn-primary">Submit</button>
			</form>
			
		</div>
	<?php endif; ?>

</div>
<hr>
<?php include 'footer.php' ?>

<script type="text/javascript">
	$('#nguoi-nhan').hide();
	$('#is_check').click(function(event) {

		var is_check = $(this).is(':checked');
        if (is_check) {
        	$('#nguoi-nhan').slideDown(1000);
        }else{
        	$('#nguoi-nhan').hide();
        }
	});
</script>