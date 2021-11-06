<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<title>Login || Auto Club</title>

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

    <div class="b-submit">
     <div class="container">
       <div class="row">
         <div class="col-lg-3 col-md-4 col-sm-5 col-xs-6">
           <aside class="b-submit__aside">
             <div class="b-submit__aside-step m-active wow zoomInUp" data-wow-delay="0.5s">
               <h3></h3>
               <div class="b-submit__aside-step-inner m-active clearfix">
                 <div class="b-submit__aside-step-inner-icon">
                   <span class="fa fa-user"></span>
                 </div>
                 <div class="b-submit__aside-step-inner-info">
                   <h4>Login</h4>
                   <p>Login here</p>
                   <div class="b-submit__aside-step-inner-info-triangle"></div>
                 </div>
               </div>
             </div>
           </aside>
         </div>
         <div class="col-lg-9 col-md-8 col-sm-7 col-xs-6">
           <div class="b-submit__main">
             <header class="s-headerSubmit s-lineDownLeft wow zoomInUp" data-wow-delay="0.5s">
               <h2 class="">Login</h2>
             </header>
             <form action="<?php echo base_url('account/login'); ?>" method="POST" enctype="multipart/form-data" class="s-submit clearfix">
               <div class="row">
                   <div class="b-submit__main-element wow zoomInUp" data-wow-delay="0.5s">
                     <label>Enter Email Address <span>*</span></label>
                     <input placeholder="Enter Email Address" type="email" name="email" />
                     <span class="text-danger"><?php echo form_error('email'); ?></span>
                   </div>
                 </div>
                 <div class="col-md-6 col-xs-12">
                   <div class="b-submit__main-element wow zoomInUp" data-wow-delay="0.5s">
                     <label>Enter Password <span>*</span></label>
                     <input placeholder="Enter Password" type="password" name="password" />
                     <span class="text-danger"><?php echo form_error('password'); ?></span>
                   </div>
                 </div>
               </div>
               <button type="submit" name="login" class="btn m-btn pull-right wow zoomInUp" data-wow-delay="0.5s">Login to your Account<span class="fa fa-angle-right"></span></button>
             </form>

						 <?php

						 if($this->form_validation->run() == TRUE){
							 echo $this->session->flashdata('msgError');
						 }

						 ?>

           </div>
         </div>
       </div>
     </div>
   </div><!--b-submit-->

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
