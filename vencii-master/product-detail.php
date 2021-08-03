<?php include 'header.php'; ?>
		<!-- Begin Login -->
		
		<!-- End Login -->
		
		
		<!-- Begin Main -->
		<div role="main" class="main">
		
			<!-- Begin page top -->
			<section class="page-top">
				
			</section>
			<!-- End page top -->
			<?php 
				
				$id = $_GET['id'];

				$query = mysqli_query($conn,"SELECT * FROM product WHERE id = $id");

				$pro = mysqli_fetch_assoc($query);

				$image_list = json_decode($pro['image_list']);	
				$topproduct = mysqli_query($conn,"SELECT * FROM  product WHERE status = 1 Order By id ");
						


			 ?>
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
			<div class="product">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="current_page">
						<ul>
							<li><a href="">Category</a></li>
							<li><a href=""><?php echo $cat['name'] ?></a></li>
							<li><?php echo $pro['name'] ?></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="row product_row">

				<!-- Product Image -->
				<div class="col-lg-7">
					<div class="product_image">
						<div class="product_image_large"><img src="public/uploads/<?php echo $pro['image'];?>" alt=""></div>						
					</div>
				</div>

				<!-- Product Content -->
				<div class="col-lg-5">
					<div class="product_content">
						<div class="product_name"><?php echo $pro['name'];?></div>
						<div class="product_price"><?php echo number_format($pro['price']) ?> VND</div>
						<div class="rating rating_4" data-rating="4">
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
						</div>
						<!-- In Stock -->
						<div class="in_stock_container">
							<div class="in_stock in_stock_true"></div>
							<span>Còn hàng </span>
						</div>
						<div class="product_text">
							<p>Hàng secondhand nên chỉ có 1 size duy nhất</p>
						</div>
						<!-- Product Quantity -->						
						<!-- Product Size -->
						<div class="product_size_container">							
							<div class="button cart_button"><a href="shop-cart.php?id=<?php echo $pro['id'] ?>" ">add to cart</a></div>
						</div>
					</div>
				</div>
			</div>

			<!-- Reviews -->

			

			<!-- Leave a Review -->

			
		</div>		
	</div>
		<!-- End Main -->
		<?php include 'footer.php'; ?>

		<script type="text/javascript">
			$('#list_thumb').owlCarousel({
				items:3,
				margin:10,
				autoPlay:1000,
				stopOnHover: true
			});

			$('img.img_thumb').click(function(event) {
				var _img = $(this).attr('src');
				$('img#big_img').attr('src',_img);
			});
		</script>