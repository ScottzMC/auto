<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<title>What to know about || Your Engine Parts || No 1 Nigeria Industrial Spare Parts</title>

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

    <section class="b-pageHeader">
			<div class="container">
				<h1 class="wow zoomInLeft" data-wow-delay="0.7s">About Us</h1>
				<div class="b-pageHeader__search wow zoomInRight" data-wow-delay="0.7s">
					<h3>The Largest Auto Dealer Online</h3>
				</div>
			</div>
		</section><!--b-pageHeader-->

		<div class="b-breadCumbs s-shadow">
			<div class="container">
				<a href="<?php echo site_url('home'); ?>" class="b-breadCumbs__page">Home</a><span class="fa fa-angle-right"></span>
				<a href="<?php echo site_url('about'); ?>" class="b-breadCumbs__page m-active">About Us</a>
			</div>
		</div><!--b-breadCumbs-->

		<section class="b-best">
			<div class="container">
				<div class="row">
					<div class="col-sm-6 col-xs-12">
						<div class="b-best__info">
							<header class="s-lineDownLeft b-best__info-head">
								<h2 class="wow zoomInUp" data-wow-delay="0.5s">The Best &amp; the Largest Auto Dealer</h2>
							</header>
							<h6 class="wow zoomInUp" data-wow-delay="0.5s">Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod etg tempor incididunt ut labore dolore magna aliqua. </h6>
							<p class="wow zoomInUp" data-wow-delay="0.5s">Curabitur libero. Donec facilisis velit eu est. Phasellus cons quat. Aenean vitae quam mus etern nunc. Nunc conseq sem velde metus imperdiet lacinia. Aenean vulputate. Donec vene natis leo curabitur at neque ut sapien fusce cursus dapibus ligula Lorem ipsum dolor sitter amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Uit enim ad minim veniami quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commod consequat. Duis aute irure dolor in reprehenderit.</p>
							<a href="article.html" class="btn m-btn m-readMore wow zoomInUp" data-wow-delay="0.5s">view listings<span class="fa fa-angle-right"></span></a>
						</div>
					</div>
					<div class="col-sm-6 col-xs-12">
						<img class="img-responsive center-block wow zoomInUp" data-wow-delay="0.5s" alt="best" src="<?php echo base_url('media/about/best.jpg'); ?>" />
					</div>
				</div>
			</div>
		</section><!--b-best-->

		<section class="b-what s-shadow m-home">
			<div class="container">
				<h3 class="s-titleBg wow zoomInUp" data-wow-delay="0.5s">CUSTOMERS ARE IMPORTANT FOR US</h3><br />
				<h2 class="s-title wow zoomInUp" data-wow-delay="0.5s">WHAT WE OFFERS</h2>
				<div class="row">
					<div class="col-sm-4 col-xs-12">
						<div class="b-world__item wow zoomInLeft" data-wow-delay="0.5s">
							<img class="img-responsive" src="<?php echo base_url('media/370x200/wolks.jpg'); ?>" alt="wolks" />
							<div class="b-world__item-val">
								<span class="b-world__item-val-title">WE OFFER</span>
							</div>
							<h2>Low Prices, No Haggling</h2>
							<p>Curabitur libero. Donec facilisis velit eu est. Phasellus cons quat. Aenean vitae quam. Vivamus et nunc. Nunc consequ
								sem velde metus imperdiet lacinia.</p>
						</div>
					</div>
					<div class="col-sm-4 col-xs-12">
						<div class="b-world__item wow zoomInUp" data-wow-delay="0.5s">
							<img class="img-responsive"  src="<?php echo base_url('media/370x200/mazda.jpg'); ?>" alt="mazda" />
							<div class="b-world__item-val">
								<span class="b-world__item-val-title">WE ARE THE</span>
							</div>
							<h2>Largest Car Dealership</h2>
							<p>Curabitur libero. Donec facilisis velit eu est. Phasellus cons quat. Aenean vitae quam. Vivamus et nunc. Nunc consequ
								sem velde metus imp erdiet lacinia.</p>
						</div>
					</div>
					<div class="col-sm-4 col-xs-12">
						<div class="b-world__item wow zoomInRight" data-wow-delay="0.5s">
							<img class="img-responsive"  src="<?php echo base_url('media/370x200/chevrolet.jpg'); ?>" alt="chevrolet" />
							<div class="b-world__item-val">
								<span class="b-world__item-val-title">OUR CUSTOMERS GET</span>
							</div>
							<h2>Multipoint Safety Check</h2>
							<p>Curabitur libero. Donec facilisis velit eu est. Phasellus cons quat. Aenean vitae quam. Vivamus et nunc. Nunc consequ
								sem velde metus imp erdiet lacinia.</p>
						</div>
					</div>
				</div>
			</div>
		</section><!--b-what-->

		<section class="b-more">
			<div class="container">
				<div class="row">
					<div class="col-sm-6 col-xs-12">
						<div class="b-more__why wow zoomInLeft" data-wow-delay="0.5s">
							<h2 class="s-title">WHY CHOOSE US</h2>
							<p>Curabitur libero. Donec facilisis velit eu est. Phasellus cons quat. Aenean vitae quam. Vivamus etyd nunc. Nunc consequsem velde metus imperdiet lacinia. Lorem ipsum dolor sit amet sed consectetur adipisicing elit sed do eiusmod.</p>
							<ul class="s-list">
								<li><span class="fa fa-check"></span>Donec facilisis velit eu est phasellus consequat quis nostrud</li>
								<li><span class="fa fa-check"></span>Aenean vitae quam. Vivamus et nunc nunc conseq</li>
								<li><span class="fa fa-check"></span>Sem vel metus imperdiet lacinia enean </li>
								<li><span class="fa fa-check"></span>Dapibus aliquam augue fusce eleifend quisque tels</li>
								<li><span class="fa fa-check"></span>Lorem ipsum dolor sit amet, consectetur </li>
								<li><span class="fa fa-check"></span>Adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore Magna </li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6 col-xs-12">
						<div class="b-more__info wow zoomInRight" data-wow-delay="0.5s">
							<h2 class="s-title">MORE INFO</h2>
							<div class="b-more__info-block">
								<div class="b-more__info-block-title">Fair Price for Everyone<a class="j-more" href="#"><span class="fa fa-angle-left"></span></a></div>
								<div class="b-more__info-block-inside j-inside">
									<p>Curabitur libero. Donec facilisis velit est. Phasellus consquat. Aenean vitae quam. Vivam
										etl nunc. Nunc con sequsem velde metus imperdiet lacinia. Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor incididunt.</p>
								</div>
							</div>
							<div class="b-more__info-block">
								<div class="b-more__info-block-title">Large Number of Vehicles<a href="#" class="j-more"><span class="fa fa-angle-left"></span></a></div>
								<div class="b-more__info-block-inside j-inside">
									<p>Curabitur libero. Donec facilisis velit est. Phasellus consquat. Aenean vitae quam. Vivam
										etl nunc. Nunc con sequsem velde metus imperdiet lacinia. Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor incididunt.</p>
								</div>
							</div>
							<div class="b-more__info-block">
								<div class="b-more__info-block-title">Auto Loan Available<a href="#" class="j-more"><span class="fa fa-angle-left"></span></a></div>
								<div class="b-more__info-block-inside j-inside">
									<p>Curabitur libero. Donec facilisis velit est. Phasellus consquat. Aenean vitae quam. Vivam
										etl nunc. Nunc con sequsem velde metus imperdiet lacinia. Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor incididunt.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section><!--b-more-->

    <div class="b-features">
      <div class="container">
        <div class="row">
          <div class="col-md-9 col-md-offset-3 col-xs-6 col-xs-offset-6">
            <ul class="b-features__items">
              <li class="wow zoomInUp" data-wow-delay="0.3s" data-wow-offset="100">Low Prices, No Haggling</li>
              <li class="wow zoomInUp" data-wow-delay="0.3s" data-wow-offset="100">Meet Other Sellers</li>
              <li class="wow zoomInUp" data-wow-delay="0.3s" data-wow-offset="100">Easy and Quick</li>
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
							<a href="<?php echo site_url('about'); ?>" class="btn m-btn">Read More<span class="fa fa-angle-right"></span></a>
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
