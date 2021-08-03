<?php include 'header.php'; ?>
		
		<!-- Begin Login -->
		<div class="login-wrapper">
			<form id="form-login" role="form">
				<h4>Login</h4>
				<p>If you're a member, login here.</p>
				<div class="form-group">
					<label for="inputusername">Username</label>
					<input type="text" class="form-control input-lg" id="inputusername" placeholder="Username">
				</div>
				<div class="form-group">
					<label for="inputpassword">Password</label>
					<input type="password" class="form-control input-lg" id="inputpassword" placeholder="Password">
				</div>
				<ul class="list-inline">
					<li><a href="#">Create new account</a></li>
					<li><a href="#">Request new password</a></li>
				</ul>
				<button type="submit" class="btn btn-white">Log in</button>
			</form>
		</div>
		<!-- End Login -->
		
		<!-- Begin Main -->
	<?php 
	$banner = mysqli_query($conn,"SELECT * FROM  banner WHERE status = 1 Order By ordering ASC LIMIT 3");
	 ?>
	<div role="main" class="main">
		<!-- Begin Main Slide -->
		<section class="main-slide">
			<div id="owl-main-demo" class="owl-carousel main-demo">
				<?php foreach($banner as $bn) { ?>
				<div class="item" id="item1"><img src="public/uploads/<?php echo $bn['link_image'];?>" class="img-responsive" alt="Photo">
					<div class="item-caption">
						<div class="item-caption-inner">
							<div class="item-caption-wrap">
								<h2><?php echo $bn['name'];?></h2>
								<a href="<?php echo $bn['link_href'];?>" class="btn btn-white hidden-xs">Shop Now</a>
							</div>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>
		</section>
		<!-- End Main Slide -->
		
		<!-- Begin Ads -->
		<section class="ads">
			<div class="container">
				<div class="row">
					<div class="col-xs-4 animation">
						<a href="#"><img src="public/images/content/products/ad-1.png" class="img-responsive" alt="Ad"></a>
					</div>
					<div class="col-xs-4 animation">
						<a href="#"><img src="public/images/content/products/ad-2.png" class="img-responsive" alt="Ad"></a>
					</div>
					<div class="col-xs-4 animation">
						<a href="#"><img src="public/images/content/products/ad-3.png" class="img-responsive" alt="Ad"></a>
					</div>
				</div>
			</div>
		</section>
		<!-- End Ads -->
		<?php 
			$topproduct = mysqli_query($conn,"SELECT * FROM  product WHERE status = 1 Order By id DESC LIMIT 4");
	 ?>
		<!-- Begin Top Selling -->
		<section class="products-slide">
			<div class="container">
				<h2 class="title"><span>Top Selling</span></h2>
				<div class="row">
					<div id="owl-product-slide" class="owl-carousel product-slide">
					<?php foreach($topproduct as $top) : ?>						
						<div class="col-md-12 animation">
							<div class="item product">
								<a href="shop-product-detail1.html">
									<span class="bag bag-cool">Cool</span>
								</a>
								<div class="product-thumb-info">
									<div class="product-thumb-info-image">
										<span class="product-thumb-info-act">
											<a href="javascript:void(0);" data-toggle="modal" data-target=".quickview-wrapper" class="view-product">
												<span><i class="fa fa-external-link"></i></span>
											</a>
											<a href="cart.php" class="add-to-cart-product">
												<span><i class="fa fa-shopping-cart"></i></span>
											</a>
										</span>
										<img alt="" class="img-responsive" src="public/uploads/<?php echo $top['image'] ?>">
									</div>
									<div class="product-thumb-info-content">
										<span class="price pull-right"><?php echo $top['price'] ?> USD</span>
										<h4><a href="shop-product-detail2.html"><?php echo $top['name'] ?></a></h4>
									</div>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
					</div>
				</div>
			</div>
		</section>
		<!-- End Top Selling -->
		
		<!-- Begin Lookbook Women -->
		
		<!-- End Lookbook Women -->
		
		<!-- Begin New Products -->
		<section class="product-tab">
			<div class="container">
				<h2 class="title"><span>New Products</span></h2>
				<!-- Nav tabs -->
				<?php 
					$cats = mysqli_query($conn,"SELECT * FROM  category WHERE status = 1 Order By name ASC");
				?>
				<ul class="nav nav-tabs pro-tabs text-center animation" role="tablist">
					<?php foreach($cats as $k => $cat) : ?>
					<li class="<?php echo $k == 0 ? 'active' : '' ;?>"><a href="#tab<?php echo $cat['id'];?>" role="tab" data-toggle="tab"><?php echo  $cat['name'] ?></a></li>
				<?php endforeach; ?>
				</ul>

				<!-- Tab panes -->
				<div class="tab-content">
				<?php foreach($cats as $k1 => $cat1) : 
					$cat_id  =$cat1['id'];
					$proOfcat = mysqli_query($conn,"SELECT * FROM  product WHERE status = 1 AND category_id = $cat_id Order By id DESC LIMIT 4");
				?>
					<div class="tab-pane <?php echo $k1 == 0 ? 'active' : '' ;?>" id="tab<?php echo $cat1['id'];?>">
						<div class="row">
							<?php foreach($proOfcat as $pro) : ?>		
							<div class="col-xs-6 col-sm-3 animation">
								<div class="product">
									<div class="product-thumb-info">
										<div class="product-thumb-info-image">
											<span class="product-thumb-info-act">
												<a href="javascript:void(0);" data-toggle="modal" data-target=".quickview-wrapper" class="view-product">
													<span><i class="fa fa-external-link"></i></span>
												</a>
												<a href="shop-cart-full.html" class="add-to-cart-product">
													<span><i class="fa fa-shopping-cart"></i></span>
												</a>
											</span>
											<img alt="" class="img-responsive" src="public/uploads/<?php echo $pro['image'];?>">
										</div>
										<div class="product-thumb-info-content">
											<span class="price pull-right">39.99 USD</span>
											<h4><a href="shop-product-detail2.html"><?php echo $pro['name'];?></a></h4>
											<span class="item-cat"><small><a href="#">Jeans</a></small></span>
										</div>
									</div>
								</div>
							</div>
							
							<?php endforeach; ?>
						</div>
						
					</div>
					
					<?php endforeach; ?>
				</div>
				
			</div>
		</section>
		<!-- End New Products -->
		
		<!-- Begin Parallax -->
		
		<!-- End Parallax -->
		
		<!-- Begin Latest Blogs -->
		
		<!-- End Latest Blogs -->
		
	</div>
		<!-- End Main -->
		
<?php include 'footer.php'; ?>