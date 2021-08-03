<?php
ob_start();
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
include 'config/connect.php';
?>
<!DOCTYPE html>
<html lang="en" ng-app="app" ng-controller="AppCtrl">
<head>
<meta charset="utf-8">
<meta name="keywords" content="HTML5 Template" />
<meta name="description" content="Flatize - Shop HTML5 Responsive Template">
<meta name="author" content="pixelgeeklab.com">
<meta name="viewport" content="width=device-width, initial-scale=1">


<!-- Google Fonts -->
<link href='http://fonts.googleapis.com/css?family=Raleway:400,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,700,300' rel='stylesheet' type='text/css'>

<!-- Bootstrap -->
<link href="public/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Icon Fonts -->
<link href="public/css/fonts/font-awesome/css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

<!-- Owl Carousel Assets -->
<link href="public/vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
<link href="public/vendor/owl-carousel/owl.theme.css" rel="stylesheet">
<link href="public/vendor/owl-carousel/owl.transitions.css" rel="stylesheet">

<!-- bxslider -->
<link href="public/vendor/bxslider/jquery.bxslider.css" rel="stylesheet">
<!-- flexslider -->
<link rel="stylesheet" href="public/vendor/flexslider/flexslider.css" media="screen">

<!-- Theme -->
<link href="public/css/theme-animate.css" rel="stylesheet">
<link href="public/css/theme-elements.css" rel="stylesheet">
<link href="public/css/theme-blog.css" rel="stylesheet">
<link href="public/css/theme-shop.css" rel="stylesheet">
<link href="public/css/theme.css" rel="stylesheet">

<!-- Style Switcher-->
<link rel="stylesheet" href="public/style-switcher/css/style-switcher.css">
<link href="public/css/colors/cyan/style.html" rel="stylesheet" id="layoutstyle">

<!-- Theme Responsive-->
<link href="public/css/theme-responsive.css" rel="stylesheet">
<link rel="stylesheet" href="public/css/style.css">
<link rel="stylesheet" href="public/css/main_styles.css">
<link rel="stylesheet" href="public/css/responsive.css">
<link rel="stylesheet" href="public/css/style2.css">
<link rel="stylesheet" href="public/css/style3.css">
<link rel="stylesheet" href="public/css/style4.css">
<link rel="stylesheet" href="public/css/product.css">
<link rel="stylesheet" href="public/css/style5.css">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
<div>
        <div class="header-blue">
            <nav class="navbar navbar-default navigation-clean-search">
                <div class="container">  
					                  
                        <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                    </div>
                    <div class="collapse navbar-collapse" id="navcol-1">
						
                        <ul class="nav navbar-nav">					
                            
							<?php if(isset($_SESSION['cus_login'])) : 
								$cus = $_SESSION['cus_login'];
							?>
							<li class="dropdown pull-right"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#">Xin chào: <?php echo $cus['name'] ?> <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li role="presentation"><a href="my-order.php">Đơn hàng của tôi</a></li>
									<li role="presentation"><a href="#">Quản lý tài khoản</a></li>
									<li role="presentation"><a href="logout.php">Thoát</a></li>                                    
                                </ul>
							</li>							
							<?php else: ?>
							<li class="dropdown pull-right"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#">Tài khoản <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li role="presentation"><a href="checkout.php">Đăng nhập</a></li>
                                    <li role="presentation"><a href="checkout.php">Đăng ký</a></li>
                                    
                                </ul>
							</li>
							<?php endif; ?>	
							<?php 
								$cats = mysqli_query($conn,"SELECT * FROM category Order By name ASC");
		 					?>
							<li role="presentation"><a href="index.php" style="font-size:40px;font-family:forte;">Vencii</a></li>							
                            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#">Danh mục <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <<?php foreach($cats as $cat) : ?>
										<li><a href="category.php?id=<?php echo $cat['id'] ?>"><?php echo $cat['name'] ?></a></li>
									<?php endforeach; ?>
                                </ul>
							</li>						
                        </ul>
                        <form class="navbar-form navbar-left" target="_self">
                            <div class="form-group">
                                <label class="control-label" for="search-field"><i class="glyphicon glyphicon-search"></i></label>
                                <input class="form-control search-field" type="search" name="search" id="search-field">
                            </div>
						</form>  
						<p class="navbar-text navbar-right"><a href="cart-list.php"><i class="fa fa-shopping-cart"></a></i>
						<p class="navbar-text navbar-right"><a class="navbar-link login" href="product.php">Sản phẩm</a>                     
                    </div>
                </div>
            </nav>
            

	</header>
	