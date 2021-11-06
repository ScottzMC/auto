<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<title>Your Engine Parts || No 1 Nigeria Industrial Spare Parts </title>

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

		<!-- Loader
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

    <section class="b-slider">
			<div id="carousel" class="slide carousel carousel-fade">
				<div class="carousel-inner">
					<div class="item active">
						<img src="<?php echo base_url('media/main-slider/banner1.jpg'); ?>" alt="sliderImg" />
						<div class="container">
							<div class="carousel-caption b-slider__info">
								<h3>Find your dream</h3>
								<h2>Lamborghini Aventador</h2>
								<p>Model 2015 <span>$184,900</span></p>
								<a class="btn m-btn" href="#">see details<span class="fa fa-angle-right"></span></a>
							</div>
						</div>
					</div>
					<div class="item">
						<img src="<?php echo base_url('media/main-slider/banner2.jpg'); ?>" alt="sliderImg" />
						<div class="container">
							<div class="carousel-caption b-slider__info">
								<h3>Find your dream</h3>
								<h2>Lamborghini Aventador</h2>
								<p>Model 2015 <span>$184,900</span></p>
								<a class="btn m-btn" href="#">see details<span class="fa fa-angle-right"></span></a>
							</div>
						</div>
					</div>
					<div class="item">
						<img src="<?php echo base_url('media/main-slider/banner3.jpg'); ?>"  alt="sliderImg"/>
						<div class="container">
							<div class="carousel-caption b-slider__info">
								<h3>Find your dream</h3>
								<h2>Lamborghini Aventador</h2>
								<p>Model 2015 <span>$184,900</span></p>
								<a class="btn m-btn" href="#">see details<span class="fa fa-angle-right"></span></a>
							</div>
						</div>
					</div>
				</div>
				<a class="carousel-control right" href="#carousel" data-slide="next">
					<span class="fa fa-angle-right m-control-right"></span>
				</a>
				<a class="carousel-control left" href="#carousel" data-slide="prev">
					<span class="fa fa-angle-left m-control-left"></span>
				</a>
			</div>
		</section><!--b-slider-->

    <section class="b-search">
			<div class="container">
				<form action="<?php echo base_url('product/search'); ?>" method="POST" class="b-search__main">
					<div class="b-search__main-title wow zoomInUp" data-wow-delay="0.3s">
						<h2>UNSURE WHICH SPARE PARTS YOU ARE LOOKING FOR? FIND IT HERE</h2>
					</div>
					<div class="b-search__main-form wow zoomInUp" data-wow-delay="0.3s">
						<div class="row">
							<div class="col-xs-12 col-md-8">
								<div class="m-firstSelects">
									<div class="col-xs-4">
										<input placeholder="Enter Product Name" type="text" name="search_query" />
										<p>PRODUCT NAME?</p>
									</div>
									<div class="col-xs-4">
										<select name="type">
											<option value="Any Type" selected="">Any Type</option>
											<option value="Caterpillar">Caterpillar</option>
											<option value="Komatsu">Komatsu</option>
											<option value="JCB">JCB</option>
											<option value="Volvo">Volvo</option>
											<option value="Perkins">Perkins</option>
										</select>
										<span class="fa fa-caret-down"></span>
										<p>PRODUCT TYPE?</p>
									</div>
									<div class="col-xs-4">
										<select name="status">
											<option value="Any Product Status" selected="">Any Product Status</option>
												<option value="New">New</option>
												<option value="Used">Used</option>
												<option value="Remand">Remand</option>
										</select>
										<span class="fa fa-caret-down"></span>
										<p>E.G: New, Used, Remand, RENT</p>
									</div>
								</div>
								<div class="m-secondSelects">
									<div class="col-xs-4">
										<input placeholder="Enter Part Number" type="text" name="part_number" />
										<p>PART NUMBER?</p>
									</div>
									<br>
									<div class="col-xs-4">
										<select name="minyear">
											<option value="Minimum Product Year" selected="">Minimum Year</option>
											<option value="1960">1960</option>
											<option value="1961">1961</option>
											<option value="1962">1962</option>
											<option value="1963">1963</option>
											<option value="1964">1964</option>
											<option value="1965">1965</option>
											<option value="1966">1966</option>
											<option value="1967">1967</option>
											<option value="1968">1968</option>
											<option value="1969">1969</option>
											<option value="1970">1970</option>
											<option value="1971">1971</option>
											<option value="1972">1972</option>
											<option value="1973">1973</option>
											<option value="1974">1974</option>
											<option value="1975">1975</option>
											<option value="1976">1976</option>
											<option value="1977">1977</option>
											<option value="1978">1978</option>
											<option value="1979">1979</option>
											<option value="1980">1980</option>
											<option value="1981">1981</option>
											<option value="1982">1982</option>
											<option value="1983">1983</option>
											<option value="1984">1984</option>
											<option value="1985">1985</option>
											<option value="1986">1986</option>
											<option value="1987">1987</option>
											<option value="1988">1988</option>
											<option value="1989">1989</option>
										</select>
										<span class="fa fa-caret-down"></span>
										<p>MINIMUM YEAR OF PRODUCT</p>
									</div>
									<div class="col-xs-4">
										<select name="maxyear">
											<option value="Maximum Product Year" selected="">Maximum Year</option>
											<option value="1990">1990</option>
											<option value="1991">1991</option>
											<option value="1992">1992</option>
											<option value="1993">1993</option>
											<option value="1994">1994</option>
											<option value="1995">1995</option>
											<option value="1996">1996</option>
											<option value="1997">1997</option>
											<option value="1998">1998</option>
											<option value="1999">1999</option>
											<option value="2000">2000</option>
											<option value="2001">2001</option>
											<option value="2002">2002</option>
											<option value="2003">2003</option>
											<option value="2004">2004</option>
											<option value="2005">2005</option>
											<option value="2005">2006</option>
											<option value="2005">2007</option>
											<option value="2005">2008</option>
											<option value="2005">2009</option>
											<option value="2010">2010</option>
											<option value="2011">2011</option>
											<option value="2012">2012</option>
											<option value="2013">2013</option>
											<option value="2014">2014</option>
											<option value="2015">2015</option>
											<option value="2016">2016</option>
											<option value="2017">2017</option>
										</select>
										<span class="fa fa-caret-down"></span>
										<p>MAXIMUM YEAR OF PRODUCT</p>
									</div>
								</div>
								<div class="col-xs-4">
									<select id="country" name="country">
										<option value="Any Location" selected="">Any Country Location</option>
										<?php if(!empty($country_location)){ foreach($country_location as $country){ ?>
										<option value="<?php echo $country->country; ?>"><?php echo $country->country; ?></option>
									<?php } }else{ echo ''; } ?>
									</select>
									<span class="fa fa-caret-down"></span>
									<p>E.G: Egypt, Algeria, Nigeria, South Africa</p>
								</div>
								<div class="col-xs-4">
									<select id="state" name="state">
										<option value="Any Location" selected="">Any State Location</option>
									</select>
									<span class="fa fa-caret-down"></span>
									<p>E.G: Abuja, Aba, Lagos, Warri</p>
								</div>
							</div>
							<div class="col-md-4 col-xs-12 text-left s-noPadding">
								<div class="b-search__main-form-range">
									<div class="col-xs-4">
										<input placeholder="Min Price" style="width: 110px;" type="text" name="minprice" />
										<p>MIN PRICE?</p>
									</div>
									<div class="col-xs-4">
										<input placeholder="Max Price" style="width: 150px;" type="text" name="maxprice" />
										<p>MAX PRICE?</p>
									</div>
								</div>
								<div class="b-search__main-form-submit">
									<button type="submit" class="btn m-btn">Search the Product<span class="fa fa-angle-right"></span></button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</section><!--b-search-->

    <section class="b-featured">
			<div class="container">
				<h2 class="s-title wow zoomInUp" data-wow-delay="0.3s">Featured Vehicles</h2>
				<div id="carousel-small" class="owl-carousel enable-owl-carousel" data-items="4" data-navigation="true" data-auto-play="true" data-stop-on-hover="true" data-items-desktop="4" data-items-desktop-small="4" data-items-tablet="3" data-items-tablet-small="2">
        <?php if(!empty($featured)){ foreach($featured as $frow){
					$check = array_slice(explode(',', $frow->image), 0, 1);

					foreach($check as $image) {
							$image;
					 }
				?>
          <div>
						<div class="b-featured__item wow rotateIn" data-wow-delay="0.3s" data-wow-offset="150">
							<a href="<?php echo site_url('product/detail/'.strtolower($frow->type).'/'.strtolower($frow->title)); ?>">
								<img class="img-responsive" style="height: 150px; width: 250px;" src="<?php echo base_url('uploads/product/'.$image); ?>" alt="<?php echo $frow->title; ?>" />
								<span class="m-premium"><?php echo $frow->status; ?></span>
							</a>
							<div class="b-featured__item-price">
								&#8358; <?php echo number_format($frow->price); ?>
							</div>
							<div class="clearfix"></div>
							<h5><a href="<?php echo site_url('product/detail/'.strtolower($frow->type).'/'.strtolower($frow->title)); ?>"><?php echo str_replace('-', ' ', $frow->title); ?></a></h5>
							<div class="b-featured__item-links">
								<a href="<?php echo site_url('product/type/'.strtolower($frow->type)); ?>"><?php echo $frow->type; ?></a>
							</div>
						</div>
					</div>
        <?php } }else{ echo ''; } ?>
				</div>
			</div>
		</section><!--b-featured-->

    <section class="b-welcome">
			<div class="container">
				<div class="row">
					<div class="col-md-5 col-md-offset-2 col-sm-6 col-xs-12">
						<div class="b-welcome__text wow fadeInLeft" data-wow-delay="0.3s" data-wow-offset="100">
							<h2>WORLD'S LEADING CAR DEALER</h2>
							<h3>WELCOME TO AUTOCLUB</h3>
							<p>Curabitur libero. Donec facilisis velit eudsl est. Phasellus consequat. Aenean vita quam. Vivamus et nunc. Nunc consequat sem velde metus imperdiet lacinia. Dui estter neque molestie necd dignissim ac hendrerit quis purus. Etiam sit amet vec convallis massa scelerisque mattis. Sed placerat leo nec.</p>
							<p>Ipsum midne ultrices magn eu tempor quam dolor eustrl sem. Donec quis dolel Donec pede quam placerat alterl tristique faucibus posuere lobortis.</p>
							<ul>
								<li><span class="fa fa-check"></span>Donec facilisis velit eu est phasellus consequat </li>
								<li><span class="fa fa-check"></span>Aenean vitae quam. Vivamus et nunc nunc consequat</li>
								<li><span class="fa fa-check"></span>Sem vel metus imperdiet lacinia enean </li>
								<li><span class="fa fa-check"></span>Dapibus aliquam augue fusce eleifend quisque tels</li>
							</ul>
						</div>
					</div>
					<div class="col-md-5 col-sm-6 col-xs-12">
						<div class="b-welcome__services wow fadeInRight" data-wow-delay="0.3s" data-wow-offset="100">
							<div class="row">
								<div class="col-xs-6 m-padding">
									<div class="b-welcome__services-auto">
										<div class="b-welcome__services-img m-auto">
											<span class="fa fa-cab"></span>
										</div>
										<h3>AUTO LOANS</h3>
									</div>
								</div>
								<div class="col-xs-6 m-padding">
									<div class="b-welcome__services-trade">
										<div class="b-welcome__services-img m-trade">
											<span class="fa fa-male"></span>
										</div>
										<h3>Trade-Ins</h3>
									</div>
								</div>
								<div class="col-xs-12 text-center">
									<span class="b-welcome__services-circle"></span>
								</div>
								<div class="col-xs-6 m-padding">
									<div class="b-welcome__services-buying">
										<div class="b-welcome__services-img m-buying">
											<span class="fa fa-book"></span>
										</div>
										<h3>Buying guide</h3>
									</div>
								</div>
								<div class="col-xs-6 m-padding">
									<div class="b-welcome__services-support">
										<div class="b-welcome__services-img m-support">
											<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
												width="45px" height="45px" viewBox="0 0 612 612" style="enable-background:new 0 0 612 612;" xml:space="preserve">
												<g>
													<path d="M257.938,336.072c0,17.355-14.068,31.424-31.423,31.424c-17.354,0-31.422-14.068-31.422-31.424
														c0-17.354,14.068-31.423,31.422-31.423C243.87,304.65,257.938,318.719,257.938,336.072z M385.485,304.65
														c-17.354,0-31.423,14.068-31.423,31.424c0,17.354,14.069,31.422,31.423,31.422c17.354,0,31.424-14.068,31.424-31.422
														C416.908,318.719,402.84,304.65,385.485,304.65z M612,318.557v59.719c0,29.982-24.305,54.287-54.288,54.287h-39.394
														C479.283,540.947,379.604,606.412,306,606.412s-173.283-65.465-212.318-173.85H54.288C24.305,432.562,0,408.258,0,378.275v-59.719
														c0-20.631,11.511-38.573,28.46-47.758c0.569-84.785,25.28-151.002,73.553-196.779C149.895,28.613,218.526,5.588,306,5.588
														c87.474,0,156.105,23.025,203.987,68.43c48.272,45.777,72.982,111.995,73.553,196.779C600.489,279.983,612,297.925,612,318.557z
														M497.099,336.271c0-13.969-0.715-27.094-1.771-39.812c-24.093-22.043-67.832-38.769-123.033-44.984
														c7.248,8.15,13.509,18.871,17.306,32.983c-33.812-26.637-100.181-20.297-150.382-79.905c-2.878-3.329-5.367-6.51-7.519-9.417
														c-0.025-0.035-0.053-0.062-0.078-0.096l0.006,0.002c-8.931-12.078-11.976-19.262-12.146-11.31
														c-1.473,68.513-50.034,121.925-103.958,129.46c-0.341,7.535-0.62,15.143-0.62,23.08c0,28.959,4.729,55.352,12.769,79.137
														c30.29,36.537,80.312,46.854,124.586,49.59c8.219-13.076,26.66-22.205,48.136-22.205c29.117,0,52.72,16.754,52.72,37.424
														c0,20.668-23.604,37.422-52.72,37.422c-22.397,0-41.483-9.93-49.122-23.912c-30.943-1.799-64.959-7.074-95.276-21.391
														C198.631,535.18,264.725,568.41,306,568.41C370.859,568.41,497.099,486.475,497.099,336.271z M550.855,264.269
														C547.4,116.318,462.951,38.162,306,38.162S64.601,116.318,61.145,264.269h20.887c7.637-49.867,23.778-90.878,48.285-122.412
														C169.37,91.609,228.478,66.13,306,66.13c77.522,0,136.63,25.479,175.685,75.727c24.505,31.533,40.647,72.545,48.284,122.412
														H550.855L550.855,264.269z"/>
												</g>
											</svg>

										</div>
										<h3>24/7 support</h3>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section><!--b-welcome-->

    <section class="b-auto">
			<div class="container">
				<h5 class="s-titleBg wow zoomInLeft" data-wow-delay="0.3s" data-wow-offset="100">GIVING OUR CUSTOMERS BEST DEALS</h5><br />
				<h2 class="s-title wow zoomInRight" data-wow-delay="0.3s" data-wow-offset="100">BEST OFFERS FROM AUTOCLUB</h2>
				<div class="row">
					<div class="col-xs-5 col-sm-4 col-md-3">
						<aside class="b-auto__main-nav wow zoomInLeft" data-wow-delay="0.3s" data-wow-offset="100">
							<ul>
								<li class="active"><a href="#">All Products</a><span class="fa fa-angle-right"></span></li>
                <?php foreach($type as $row){ ?>
									<li><a href="<?php echo site_url('product/type/'.strtolower($row->type)); ?>"><?php echo $row->type; ?></a></li>
								<?php } ?>
							</ul>
							<div class="owl-buttons">
								<div class="owl-prev j-tab" data-to='#first'></div>
							</div>
						</aside>
					</div>
					<div class="col-md-9 col-sm-8 col-xs-7">
						<div class="b-auto__main">
							<div class="col-md-11 col-md-offset-1 col-xs-12">
								<a href="#"  class="b-auto__main-toggle s-lineDownCenter m-active j-tab wow zoomInLeft" data-wow-delay="0.3s" data-wow-offset="100" data-to="#first">OUR POPULAR PRODUCTS</a>
							</div>
							<div class="clearfix"></div>
							<div class="row m-margin" id="first">
              <?php if(!empty($popular)){ foreach($popular as $prow){
								$check = array_slice(explode(',', $prow->image), 0, 1);

								foreach($check as $image) {
										$image;
								 }
							?>
								<div class="col-md-4 col-sm-6 col-xs-12">
									<div class="b-auto__main-item wow slideInUp" data-wow-delay="0.3s" data-wow-offset="100">
										<img class="img-responsive" style="height:130px; width:200px;" src="<?php echo base_url('uploads/product/'.$image); ?>" alt="<?php echo $prow->title; ?>" />
										<h2><a href="<?php echo site_url('product/detail/'.strtolower($prow->type).'/'.strtolower($prow->title)); ?>"><?php echo str_replace('-', ' ', $prow->title); ?></a></h2>
										<div class="b-auto__main-item-info">
											<span class="m-price">
												&#8358; <?php echo number_format($prow->price); ?>
											</span>
										</div>
										<div class="b-featured__item-links m-auto">
											<a href="<?php echo site_url('product/type/'.strtolower($prow->type)); ?>"><?php echo $prow->type; ?></a>
										</div>
									</div>
								</div>
              <?php } }else{ echo ''; } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section><!--b-auto-->

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

		<script type="text/javascript">
			$(document).ready(function(){
				$('#country').on('change', function(){
					var country = $(this).val();
					if(country == ''){
						$('#state').prop('disabled', true);
					}else{
						$('#state').prop('disabled', false);
						$.ajax({
							url: "<?php echo base_url('admin/get_region'); ?>",
							type: "post",
							data: {'country' : country},
							dataType: 'json',
							success: function(data){
								$('#state').html(data);
							},
							error: function(data){
								alert('Error Occurred');
							}
						});
					}
				});
			});
		</script>

	</body>
</html>
