<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
    <?php foreach($detail as $row){} ?>
		<title><?php echo str_replace('-',' ', $row->title); ?> || Your Engine Parts || No 1 Nigeria Industrial Spare Parts</title>

		<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('images/favicon.png'); ?>" />

    <link href="<?php echo base_url('css/all_sheets.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('css/style.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('css/media.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('css/flexslider.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('css/jquery.fancybox.css'); ?>" rel="stylesheet">

		<!-- SWITCHER -->
		<!--[if lt IE 9]>
		<script src="//oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="//oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->

	</head>
	<body class="m-index" data-scrolling-animations="true" data-equal-height=".b-auto__main-item">

		<!-- Loader -->
		<div id="page-preloader"><span class="spinner"></span></div>
		<!-- Loader end -->

    <header class="b-topBar wow slideInDown" data-wow-delay="0.7s">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-xs-6">
					</div>
					<div class="col-md-2 col-xs-6">
						<div class="b-topBar__tel">
							<span class="fa fa-phone"></span>
							1-800- 624-5462
						</div>
					</div>
					<div class="col-md-4 col-xs-6">
						<nav class="b-topBar__nav">
							<ul>
								<?php if ($this->session->userdata('login')){ ?>
								<li>Hello <?php echo $this->session->userdata('uname'); ?></li>
								<li><a href="<?php echo site_url('user'); ?>">Profile</a></li>
								<?php if($this->session->userdata('user_level') == 1){ ?>
								<li><a href="<?php echo base_url('admin'); ?>">Admin</a></li>
								<?php } ?>
								<?php } else { ?>
								<li><a href="<?php echo base_url('account/takeToLogin'); ?>">Login</a></li>
								<li><a href="<?php echo base_url('account/takeToRegister'); ?>">Register</a></li>
								<?php } ?>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</header><!--b-topBar-->

    <nav class="b-nav">
			<div class="container">
				<div class="row">
					<div class="col-sm-3 col-xs-4">
						<div class="b-nav__logo wow slideInLeft" data-wow-delay="0.3s">
							<h3><a href="<?php echo site_url('home'); ?>">Auto<span>Club</span></a></h3>
							<h2><a href="<?php echo site_url('home'); ?>">AUTO DEALER TEMPLATE</a></h2>
						</div>
					</div>
					<div class="col-sm-9 col-xs-8">
						<div class="b-nav__list wow slideInRight" data-wow-delay="0.3s">
							<div class="navbar-header">
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div>
							<div class="collapse navbar-collapse navbar-main-slide" id="nav">
								<ul class="navbar-nav-menu">
									<?php foreach($type as $trow){ ?>
										<li><a href="<?php echo site_url('product/type/'.$trow->type); ?>"><?php echo $trow->type; ?></a></li>
									<?php } ?>
									<li><a href="<?php echo site_url('cart'); ?>">Cart <span>(<?php echo $this->cart->total_items(); ?>)</span></a></li>
									<li><a href="<?php echo site_url('contact'); ?>">Contact</a></li>
									<?php if ($this->session->userdata('login')){ ?>
									<li><a href="<?php echo base_url('home/logout'); ?>">Log Out</a></li>
									<?php } ?>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</nav><!--b-nav-->

    <div class="b-breadCumbs s-shadow wow zoomInUp" data-wow-delay="0.5s">
			<div class="container">
        <?php foreach($pd as $rowd){} ?>
				<a href="<?php echo site_url('home'); ?>" class="b-breadCumbs__page">Home</a><span class="fa fa-angle-right"></span>
				<a href="<?php echo site_url('product/type/'.$rowd->type); ?>" class="b-breadCumbs__page"><?php echo $rowd->type; ?></a><span class="fa fa-angle-right"></span>
				<a href="<?php echo site_url('product/detail/'.$rowd->type.'/'.$rowd->title); ?>" class="b-breadCumbs__page m-active"><?php echo str_replace('-', ' ', $rowd->title); ?></a>
			</div>
		</div><!--b-breadCumbs-->

		<div class="b-infoBar">
			<div class="container">
				<div class="row wow zoomInUp" data-wow-delay="0.5s">
					<div class="col-xs-3">
						<div class="b-infoBar__premium"><?php echo $row->status; ?></div>
					</div>
					<div class="col-xs-9">
						<div class="b-infoBar__btns">
							<!--<a href="#" class="btn m-btn m-infoBtn">SHARE THIS VEHICLE<span class="fa fa-angle-right"></span></a>-->
							<a href="javascript:window.print()" class="btn m-btn m-infoBtn">PRINT THIS PAGE<span class="fa fa-angle-right"></span></a>
						</div>
					</div>
				</div>
			</div>
		</div><!--b-infoBar-->

    <section class="b-detail s-shadow">
		  <div class="container">
		    <header class="b-detail__head s-lineDownLeft wow zoomInUp" data-wow-delay="0.5s">
		      <div class="row">
		        <div class="col-sm-9 col-xs-12">
		          <div class="b-detail__head-title">
								<h1><input type="hidden" value="<?php echo $row->id; ?>"></h1>
								<h1><input type="hidden" value="<?php echo $row->code; ?>"></h1>
								<h1><input type="hidden" value="<?php echo $row->count_review; ?>"</h1>
		            <h1><?php echo str_replace('-', ' ', $row->title); ?></h1>
		            <h3><?php echo $rowd->type; ?></h3>
		          </div>
		        </div>
		        <div class="col-sm-3 col-xs-12">
		          <div class="b-detail__head-price">
		            <div class="b-detail__head-price-num" style="width: 300px; margin-right: 20px;">&#8358; <?php echo number_format($row->price); ?></div>
		          </div>
		        </div>
		      </div>
		    </header>
		    <div class="cont maincont">

		<!-- Product - start -->
		<div class="prod">

      <?php foreach($detail as $row){}
				$check = array_slice(explode(',', $row->image), 0, 1);

				foreach($check as $image) {
						$image;
				 }
			?>

      <!-- Product Slider - start -->
  		<div class="prod-slider-wrap">
  		  <div class="flexslider prod-slider" id="prod-slider">
  		    <ul class="slides">
						<?php foreach($detail as $row){}
							$check = explode(',', $row->image);

							foreach($check as $image) {
								 $image;

						?>
						<li>
  		        <!-- <a> & <img> Without Spaces -->
  		        <a data-fancybox-group="prod" class="fancy-img" href="<?php echo base_url('uploads/product/'.$image); ?>">
								<input type="hidden" name="image">
								<img src="<?php echo base_url('uploads/product/'.$image); ?>" alt="<?php echo $row->title; ?>">
							</a>
  		      </li>
					<?php } ?>
  		    </ul>
  		  </div>
  		  <div class="flexslider prod-thumbs" id="prod-thumbs">
  		    <ul class="slides">
						<?php foreach($detail as $row){}

							$check = explode(',', $row->image);

							foreach($check as $image) {
								 $image;

						?>
  		      <li>
  		        <img src="<?php echo base_url('uploads/product/'.$image); ?>" alt="<?php echo $row->title; ?>">
  		      </li>
					<?php } ?>
  		    </ul>
  		  </div>
  		</div>
  		<!-- Product Slider - end -->

		<!-- Product Content - start-->
		<div class="prod-cont">
		  <div class="prod-desc" data-wow-delay="0.5s">
		    <p class="prod-desc-ttl"><span>Description</span></p>
		    <p><input type="hidden" name="description"><?php echo character_limiter($rowd->description, 100); ?>
		      <a id="prod-showdesc" href="#">read more</a></p>
		  </div>
		  <div class="prod-info">
		    <div class="prod-price-wrap">
		      <p>Price</p>
		      <p class="prod-price">&#8358; <?php echo number_format($row->price); ?></p>
		    </div>
		    <!--<div class="prod-qnt-wrap">
		      <p>Quantity</p>
		      <p class="qnt-wrap prod-qnt">
		        <a href="#" class="qnt-minus prod-minus">-</a>
		        <input type="text" value="1">
		        <a href="#" class="qnt-plus prod-plus">+</a>
		      </p>
		    </div>
		    <div class="prod-total-wrap">
		      <p>Total</p>
		      <p class="prod-total">$3900</p>
		    </div>-->
		    <div class="prod-shipping-wrap">
		      <p>Shipping</p>
		      <p class="prod-shipping">Free</p>
		    </div>
				<?php if($row->sold > 50){?>
				<div class="prod-shipping-wrap">
		      <p>Sold</p>
		      <p class="prod-shipping"><?php echo $row->sold; ?> Items</p>
		    </div>
			<?php } ?>
			<div class="prod-shipping-wrap">
				<p>Part Number</p>
				<p class="prod-shipping"><?php echo $row->part_no; ?></p>
			</div>
		  </div>
		  <div class="prod-actions">
		    <div class="prod-rating-wrap">
		      <!--p class="prod-rating">
		        <i class="fa fa-star-o" title="5"></i><i class="fa fa-star-o" title="4"></i><i class="fa fa-star-o" title="3"></i><i class="fa fa-star-o" title="2"></i><i class="fa fa-star-o" title="1"></i>
		      </p-->
		      <!--p><span class="prod-rating-count">89</span> reviews</p-->
		    </div>
		    <p class="prod-add">
					<?php
						echo form_open('cart/add');
						echo form_hidden('id', $row->id);
						echo form_hidden('code', $row->code);
						echo form_hidden('count_review', $row->count_review);
						echo form_hidden('title', $rowd->title);
						echo form_hidden('type', $rowd->type);
						echo form_hidden('price', $row->price);
						echo form_hidden('image', $row->image);
						echo form_submit('action', 'Add To Cart');
						echo form_close();
					?>
				</p>

		  </div>
		</div>
		<!-- Product Content - end -->
	</div>
	<!-- Product - end -->

	<!-- Product Tabs - start -->
	<div class="prod-tabs-wrap">
		<ul class="prod-tabs">
			<li data-prodtab-num="1" id="prod-desc" class="active">
				<a data-prodtab="#prod-tab-1" href="#">Description</a>
			</li>
			<li data-prodtab-num="3" id="prod-reviews">
				<a data-prodtab="#prod-tab-3" href="#">Reviews <span><?php echo $row->count_review; ?></span></a>
			</li>
			<li class="prod-tabs-addreview">Add a review</li>
		</ul>
		<div class="prod-tab-cont">
			<p data-prodtab-num="1" class="prod-tab-mob active" data-prodtab="#prod-tab-1">Description</p>
			<div class="prod-tab prod-tab-desc" id="prod-tab-1">
				<p><?php echo $rowd->description; ?></p>
			</div>
			<p data-prodtab-num="3" class="prod-tab-mob" data-prodtab="#prod-tab-3">Reviews</p>

			<div class="prod-tab prod-reviews" id="prod-tab-3">
				<form action="<?php echo base_url('product/detail/'.$rowd->type.'/'.$row->title); ?>" method="POST" class="prod-addreview-form" id="prod-addreview-form">
					<p class="prod-tab-addreview">Add Your Review</p>
					<!--p class="prod-rating">
						<i class="fa fa-star-o" name="rating" title="5"></i>
						<i class="fa fa-star-o" name="rating" title="4"></i>
						<i class="fa fa-star-o" name="rating" title="3"></i>
						<i class="fa fa-star-o" name="rating" title="2"></i>
						<i class="fa fa-star-o" name="rating" title="1"></i>
					</p-->
					<input type="text" name="fullname" placeholder="Full Name" value="<?php echo set_value('fullname'); ?>">
          <span class="text-danger"><?php echo form_error('fullname'); ?></span>
					<input type="text" name="email" placeholder="Email" value="<?php echo set_value('email'); ?>">
          <span class="text-danger"><?php echo form_error('email'); ?></span>
					<textarea name="message" placeholder="Message"></textarea>
          <span class="text-danger"><?php echo form_error('message'); ?></span>
					<input type="submit" name="submit" value="Add Review">
				</form>

        <?php foreach($review as $ror){ ?>
				<div class="prod-review">
					<h3><?php echo $ror->fullname; ?></h3>
					<!--<p class="prod-review-rating">
						<i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-o"></i>
					</p>-->
					<p><?php echo $ror->message; ?></p>
				</div>
			<?php } ?>
			</div>
			<p class="prod-tabs-addreview prod-tabs-addreview-mob">Add a review</p>
		</div>
	</div>
	<!-- Product Tabs - end -->
	<?php
		if($this->form_validation->run() == TRUE){
			echo $this->session->flashdata('msg');
			echo $this->session->flashdata('msgError');
		}
	?>

</div>
			</div>
		</section><!--b-detail-->

    <section class="b-related m-home">
			<div class="container">
				<h5 class="s-titleBg wow zoomInUp" data-wow-delay="0.5s">FIND OUT MORE</h5><br />
				<h2 class="s-title wow zoomInUp" data-wow-delay="0.5s">RELATED PRODUCTS</h2>
				<div class="row">
          <?php foreach($other as $crow){
						$check = array_slice(explode(',', $crow->image), 0, 1);

						foreach($check as $image) {
								$image;
						}

					?>
					<div class="col-md-3 col-xs-6">
						<div class="b-auto__main-item wow zoomInRight" data-wow-delay="0.5s">
							<img class="img-responsive center-block" style="height:120px; width:200px;" src="<?php echo base_url('uploads/product/'.$image); ?>" alt="<?php echo $crow->title; ?>" />
							<div class="b-world__item-val">
								<span class="b-world__item-val-title"><span style="font-size: 14px;"><?php echo $crow->type; ?></span></span>
							</div>
							<h2><a href="<?php echo site_url('product/detail/'.$crow->type.'/'.$crow->title); ?>"><?php echo str_replace('-', ' ', $crow->title); ?></a></h2>
							<div class="b-auto__main-item-info s-lineDownLeft">
								<span class="m-price">
									&#8358; <?php echo number_format($crow->price); ?><br>
								</span>
							</div>
              <br>
						</div>
					</div>
				<?php } ?>
				</div>
			</div>
		</section><!--"b-related-->

		<div class="b-features">
			<div class="container">
				<div class="row">
					<div class="col-md-9 col-md-offset-3 col-xs-6 col-xs-offset-6">
						<ul class="b-features__items">
							<li class="wow zoomInUp" data-wow-delay="0.3s" data-wow-offset="100">Low Prices, No Haggling</li>
							<li class="wow zoomInUp" data-wow-delay="0.3s" data-wow-offset="100">Largest Car Dealership</li>
							<li class="wow zoomInUp" data-wow-delay="0.3s" data-wow-offset="100">Multipoint Safety Check</li>
						</ul>
					</div>
				</div>
			</div>
		</div><!--b-features-->

    <div class="b-info">
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-xs-6">
						<aside class="b-info__aside wow zoomInLeft" data-wow-delay="0.3s">
							<article class="b-info__aside-article">
								<h3>OPENING HOURS</h3>
								<div class="b-info__aside-article-item">
									<p>Mon-Sat : 8:00am - 5:00pm<br />
										Sunday is closed</p>
								</div>
							</article>
							<article class="b-info__aside-article">
								<h3>About us</h3>
								<p>Vestibulum varius od lio eget conseq
									uat blandit, lorem auglue comm lodo
									nisl non ultricies lectus nibh mas lsa
									Duis scelerisque aliquet. Ante donec
									libero pede porttitor dacu msan esct
									venenatis quis.</p>
							</article>
							<a href="about.php" class="btn m-btn">Read More<span class="fa fa-angle-right"></span></a>
						</aside>
					</div>
				</div>
			</div>
		</div><!--b-info-->

		<footer class="b-footer">
			<a id="to-top" href="#this-is-top"><i class="fa fa-chevron-up"></i></a>
			<div class="container">
				<div class="row">
					<div class="col-xs-4">
						<div class="b-footer__company wow fadeInLeft" data-wow-delay="0.3s">
							<div class="b-nav__logo">
								<h3><a href="<?php echo site_url('home'); ?>">Auto<span>Club</span></a></h3>
							</div>
							<p>&copy; 2017 Developed by <a href="https://www.linkedin.com/in/scott-nnaghor-75128a11b/">Scott MC Nnaghor</a></p>
						</div>
					</div>
					<div class="col-xs-8">
						<div class="b-footer__content wow fadeInRight" data-wow-delay="0.3s">
							<div class="b-footer__content-social">
								<!--<a href="#"><span class="fa fa-facebook-square"></span></a>
								<a href="#"><span class="fa fa-twitter-square"></span></a>
								<a href="#"><span class="fa fa-google-plus-square"></span></a>
								<a href="#"><span class="fa fa-instagram"></span></a>
								<a href="#"><span class="fa fa-youtube-square"></span></a>
								<a href="#"><span class="fa fa-skype"></span></a>-->
							</div>
							<nav class="b-footer__content-nav">
								<ul>
									<li><a href="<?php echo site_url('home'); ?>">Home</a></li>
									<li><a href="<?php echo site_url('about'); ?>">About</a></li>
									<li><a href="<?php echo site_url('contact'); ?>">Contact</a></li>
								</ul>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</footer><!--b-footer-->

		<!--Main-->
		<script src="<?php echo base_url('js/jquery-1.11.3.min.js'); ?>"></script>
		<script src="<?php echo base_url('js/jquery-ui.min.js'); ?>"></script>
		<script src="<?php echo base_url('js/bootstrap.min.js'); ?>"></script>
		<script src="<?php echo base_url('js/modernizr.custom.js'); ?>"></script>

    <script src="<?php echo base_url('js/jquery.flexslider-min.js'); ?>"></script>
    <script src="<?php echo base_url('js/fancybox/fancybox.js'); ?>"></script>
    <script src="<?php echo base_url('js/fancybox/helpers/jquery.fancybox-thumbs.js'); ?>"></script>
    <script src="<?php echo base_url('js/main.js'); ?>"></script>

		<script src="<?php echo base_url('assets/rendro-easy-pie-chart/dist/jquery.easypiechart.min.js'); ?>"></script>
		<script src="<?php echo base_url('js/waypoints.min.js'); ?>"></script>
		<script src="<?php echo base_url('js/jquery.easypiechart.min.js'); ?>"></script>
		<script src="<?php echo base_url('js/classie.js'); ?>"></script>

		<!--Switcher-->
		<script src="<?php echo base_url('assets/switcher/js/switcher.js'); ?>"></script>
		<!--Owl Carousel-->
		<script src="<?php echo base_url('assets/owl-carousel/owl.carousel.min.js'); ?>"></script>
		<!--bxSlider-->
		<script src="<?php echo base_url('assets/bxslider/jquery.bxslider.js'); ?>"></script>
		<!-- jQuery UI Slider -->
		<script src="<?php echo base_url('assets/slider/jquery.ui-slider.js'); ?>"></script>

		<!--Theme-->
		<script src="<?php echo base_url('js/jquery.smooth-scroll.js'); ?>"></script>
		<script src="<?php echo base_url('js/wow.min.js'); ?>"></script>
		<script src="<?php echo base_url('js/jquery.placeholder.min.js'); ?>"></script>
		<script src="<?php echo base_url('js/theme.js'); ?>"></script>

	</body>
</html>
