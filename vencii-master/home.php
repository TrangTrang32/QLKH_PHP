<?php

include 'header.php'; ?>
		
		<!-- Begin Login -->
		
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
								<a href="product.php" class="btn btn-white hidden-xs">Mua sắm</a>
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
						<a href="#"><img src="public/uploads/Jeans pant/1.png" class="img-responsive" alt="Ad"></a>
					</div>
					<div class="col-xs-4 animation">
						<a href="#"><img src="public/uploads/Jeans pant/2.png" class="img-responsive" alt="Ad"></a>
					</div>
					<div class="col-xs-4 animation">
						<a href="#"><img src="public/uploads/Jeans pant/3.png" class="img-responsive" alt="Ad"></a>
					</div>
				</div>
			</div>
		</section>		
		<!-- End Ads -->
		<?php 
			$topproduct = mysqli_query($conn,"SELECT * FROM  product WHERE status = 1 Order By id DESC LIMIT 10");
			
	 	?>
		<!-- Begin Top Selling -->
		<div class="arrivals">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title_container text-center">
						<div class="section_subtitle">HIPHOP NEVER DIE</div>
						<div class="section_title">Sản phẩm mới nhất trong tuần</div>
					</div>
				</div>
			</div>
			<?php 
						$topproduct = mysqli_query($conn,"SELECT * FROM  product WHERE status = 1 Order By id DESC LIMIT 12 ");
	 					?>
			<div class="row products_container">
			<?php foreach($topproduct as $top) : ?>
				<div class="col-lg-4 product_col">
					<div class="product">
						<div class="product_image">
							<img src="public/uploads/<?php echo $top['image'];?>" alt="">
						</div>						
						<div class="product_content clearfix">
							<div class="product_info">
								<div class="product_name"><a href="product-detail.php?id=<?php echo $top['id'] ?>"><?php echo $top['name'] ?></a></div>
								<div class="product_price"><?php echo number_format($top['price']) ?> VND</div>
							</div>
							<div class="product_options">
							<a href="product-detail.php?id=<?php echo $top['id'] ?>" ng-click="quick_view(<?php echo $top['id'] ?>)" class="view-product">
								<span><i class="fa fa-external-link"></i></span>
							</a>
							<a href="shop-cart.php?id=<?php echo $top['id'] ?>" class="add-to-cart-product">
												<span><i class="fa fa-shopping-cart"></i></span>
											</a>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>		
			</div>			
		</div>
	</div>

		<!-- End Top Selling -->
		
		<!-- Begin Lookbook Women -->
		
		<!-- End Lookbook Women -->
		
		<!-- Begin New Products -->
		<?php 
			$soonproduct = mysqli_query($conn,"SELECT * FROM  category WHERE ");
			
	 	?>
		
		<!-- End New Products -->
		
		<!-- Begin Parallax -->
		
		<!-- End Parallax -->
		
		<!-- Begin Latest Blogs -->
		
		<!-- End Latest Blogs -->
		
	</div>
		<!-- End Main -->
		
<?php include 'footer.php'; ?>