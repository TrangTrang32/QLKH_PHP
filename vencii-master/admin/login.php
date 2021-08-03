<?php 
session_start();
if (!empty($_SESSION['admin_login'])) {
  header('location: index.php');
}

include '../config/connect.php';

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="public/css/bootstrap.min.css">
  <link rel="stylesheet" href="public/css/font-awesome.min.css">
  <link rel="stylesheet" href="public/css/AdminLTE.css">
  <link rel="stylesheet" href="public/css/_all-skins.min.css">
  <link rel="stylesheet" href="public/css/jquery-ui.css">
  <link rel="stylesheet" href="public/css/style.css" />
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href=""><b>Admin</b>cPanel</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Đăng nhập để vào trang quản trị</p>
	<?php 
  $errors = [];

		if (isset($_POST['email'])) {
			$email = $_POST['email'];
			$password = $_POST['password'];

      if ($email == '') {
        $errors['Email'] = 'Email không được để trống';
      }

      if ($password == '') {
        $errors['Password'] = 'Mật khẩu không được để trống';
      }
      if(!$errors){
        $sql = "SELECT * FROM admin WHERE email = '$email'";

        $query = mysqli_query($conn,$sql);

        if (mysqli_num_rows($query) == 1) {

          $admin = mysqli_fetch_assoc($query);

          $old_pass = $admin['password'];

          if ($password == $old_pass) {

            $_SESSION['admin_login'] = $admin;
            header('location: index.php');

          }else{
            $errors['PassValid'] = 'Mật khẩu không đúng';
          }

        }else{
          $errors['EmailValid'] = 'Địa chỉ email không đúng';
        }
      }
		}
	 ?>
   <?php if(!empty($errors['EmailValid'])) { ?>
   <div class="alert alert-danger">
     <?php echo $errors['EmailValid']; ?>
   </div>
  <?php } ?>

  <?php if(!empty($errors['PassValid'])) { ?>
   <div class="alert alert-danger">
     <?php echo $errors['PassValid']; ?>
   </div>
  <?php } ?>

    <form action="" method="post">
      <div class="form-group has-feedback">
        <input type="email" name="email" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        <?php if(!empty($errors['Email'])) { ?>
        <div class="help-block text-danger" style="color: red">
          <?php echo $errors['Email']; ?>
        </div>
      <?php } ?>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <?php if(!empty($errors['Password'])) { ?>
        <div class="help-block text-danger"  style="color: red">
          <?php echo $errors['Password']; ?>
        </div>
      <?php } ?>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Đăng nhập</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <!-- <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div> -->
    <!-- /.social-auth-links -->

    <a href="#">I forgot my password</a><br>
    <a href="register.html" class="text-center">Register a new membership</a>

  </div>
  <!-- /.login-box-body -->
</div>

</body>
</html>
