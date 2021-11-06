<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<title>Checkout || Auto Club</title>

		<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('images/favicon.png'); ?>" />

		<link href="<?php echo base_url('css/all_sheets.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('css/main.css'); ?>" rel="stylesheet">

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
									<?php foreach($type as $row){ ?>
										<li><a href="<?php echo site_url('product/type/'.$row->type); ?>"><?php echo $row->type; ?></a></li>
									<?php } ?>
									<li><a href="<?php echo site_url('cart'); ?>">Cart <span>(<?php echo $this->cart->total_items(); ?>)</span></a></li>
									<li><a href="<?php echo site_url('blog'); ?>">Blog</a></li>
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

    <?php if ($this->session->userdata('login')){ ?>

    <div class="b-breadCumbs s-shadow">
      <div class="container wow zoomInUp" data-wow-delay="0.5s">
        <a href="<?php echo site_url('home'); ?>" class="b-breadCumbs__page">Home</a><span class="fa fa-angle-right"></span>
        <a href="<?php echo site_url('cart'); ?>" class="b-breadCumbs__page">Cart</a><span class="fa fa-angle-right"></span>
        <a href="#" class="b-breadCumbs__page m-active">Checkout</a>
      </div>
    </div><!--b-breadCumbs-->

    <div class="b-submit">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-4 col-sm-5 col-xs-6">
						<aside class="b-submit__aside">
							<div class="b-submit__aside-step m-active wow zoomInUp" data-wow-delay="0.5s">
								<h3>Checkout</h3>
								<div class="b-submit__aside-step-inner m-active clearfix">
									<div class="b-submit__aside-step-inner-icon">
										<span class="fa fa-truck"></span>
									</div>
									<div class="b-submit__aside-step-inner-info">
										<a href="#"><h4>Checkout</h4></a>
										<p>Checkout</p>
										<div class="b-submit__aside-step-inner-info-triangle"></div>
									</div>
								</div>
							</div>
						</aside>
					</div>

					<?php foreach($shipping as $shiprow){} ?>

					<div class="col-lg-9 col-md-8 col-sm-7 col-xs-6">
						<div class="b-submit__main">
							<header class="s-headerSubmit s-lineDownLeft wow zoomInUp" data-wow-delay="0.5s">
								<h2 class="">Add Your Shipping Details</h2>
							</header>
							<form class="s-submit clearfix" action="<?php echo base_url('checkout/save_order'); ?>" method="POST">
								<div class="row">
									<div class="col-md-6 col-xs-12">
										<div class="b-submit__main-element wow zoomInUp" data-wow-delay="0.5s">
											<label>Enter FirstName <span>*</span></label>
											<div class='s-relative'>
												<input placeholder="Enter FirstName" type="text" name="firstname" value="<?php echo $shiprow->firstname; ?>" />
											</div>
										</div>
										<div class="b-submit__main-element wow zoomInUp" data-wow-delay="0.5s">
											<label>Enter Company/Business Name <span>*</span></label>
											<div class='s-relative'>
												<input placeholder="Enter Company/Business Name" value="<?php echo $shiprow->businessname; ?>" type="text" name="business" />
											</div>
										</div>
										<div class="b-submit__main-element wow zoomInUp" data-wow-delay="0.5s">
											<label>Enter Telephone Number <span>*</span></label>
											<div class='s-relative'>
												<input placeholder="Enter Telephone Number" type="text" name="telephone" value="<?php echo $shiprow->telephone; ?>" />
											</div>
										</div>
										<div class="b-submit__main-element wow zoomInUp" data-wow-delay="0.5s">
											<label>Enter Street Address 1 <span>*</span></label>
											<div class='s-relative'>
												<input placeholder="Enter Street Address 1" type="text" value="<?php echo $shiprow->address1; ?>" name="address1" />
											</div>
										</div>
										<div class="b-submit__main-element wow zoomInUp" data-wow-delay="0.5s">
											<label>Select Province/Territory <span>*</span></label>
											<div class='s-relative'>
												<select class="m-select" name="province">
													<option value="select">Select</option>
													<option value="Lagos Mainland">Lagos Mainland</option>
													<option value="Lagos Island">Lagos Island</option>
												</select>
												<span class="fa fa-caret-down"></span>
											</div>
										</div>
									</div>
									<div class="col-md-6 col-xs-12">
										<div class="b-submit__main-element wow zoomInUp" data-wow-delay="0.5s">
											<label>Enter SurName <span>*</span></label>
											<div class='s-relative'>
												<input placeholder="Enter SurName" type="text" name="surname" value="<?php echo $shiprow->surname; ?>" />
											</div>
										</div>
										<div class="b-submit__main-element wow zoomInUp" data-wow-delay="0.5s">
											<label>Enter Email Address <span>*</span></label>
											<div class='s-relative'>
												<input placeholder="Enter Email Address" type="email" name="email" value="<?php echo $shiprow->email; ?>" />
											</div>
										</div>
										<div class="b-submit__main-element wow zoomInUp" data-wow-delay="0.5s">
											<label>Select PostCode <span>*</span></label>
											<div class='s-relative'>
												<select class="m-select" name="postcode">
													<option value="select">Select</option>
													<option value="100001">100001</option>
													<option value="100010">100010</option>
												</select>
												<span class="fa fa-caret-down"></span>
											</div>
										</div>
										<div class="b-submit__main-element wow zoomInUp" data-wow-delay="0.5s">
											<label>Enter Street Address 2 <span>*</span></label>
											<div class='s-relative'>
												<input placeholder="Enter Street Address 2" type="text" value="<?php echo $shiprow->address2; ?>" name="address2" />
											</div>
										</div>
										<div class="b-submit__main-element wow zoomInUp" data-wow-delay="0.5s">
											<label>Select State <span>*</span></label>
											<div class='s-relative'>
												<select class="m-select" name="state">
													<option value="select">Select</option>
													<option value="Aba">Aba</option>
													<option value="Abuja">Abuja</option>
													<option value="Enugu">Enugu</option>
													<option value="Kaduna">Kaduna</option>
													<option value="Kano">Kano</option>
													<option value="Lagos">Lagos</option>
													<option value="Port Harcout">Port Harcout</option>
													<option value="Sokoto">Sokoto</option>
													<option value="Warri">Warri</option>
												</select>
												<span class="fa fa-caret-down"></span>
											</div>
										</div>
									</div>
								</div>
								<button type="submit" name="submit" class="btn m-btn pull-right wow zoomInUp" data-wow-delay="0.5s">
                  Place Order
                  <span class="fa fa-angle-right"></span>
                </button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div><!--b-submit-->

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
							<a href="<?php echo site_url('about'); ?>" class="btn m-btn">Read More<span class="fa fa-angle-right"></span></a>
						</aside>
					</div>
				</div>
			</div>
		</div><!--b-info-->

  <?php }else{
    echo '<div class="alert alert-danger" role="alert">Please Login/Register to be able to Place an Order!!</div>';
  }?>

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
									<li><a href="<?php echo site_url('blog'); ?>">Blog</a></li>
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
