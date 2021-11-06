<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>All Products || Admin Your Engine Parts || No 1 Nigeria Industrial Spare Parts</title>

	<!-- Favicon -->
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="icon" href="favicon.ico" type="image/x-icon">

	<!-- Morris Charts CSS -->
    <link href="<?php echo base_url('vendors/bower_components/morris.js/morris.css'); ?>" rel="stylesheet" type="text/css"/>

	<!-- Chartist CSS -->
	<link href="<?php echo base_url('vendors/bower_components/chartist/dist/chartist.min.css'); ?>" rel="stylesheet" type="text/css"/>

	<!-- Chartist CSS -->
	<link href="<?php echo base_url('vendors/bower_components/chartist/dist/chartist.min.css'); ?>" rel="stylesheet" type="text/css"/>

    <!-- vector map CSS -->
	<link href="<?php echo base_url('vendors/vectormap/jquery-jvectormap-2.0.2.css'); ?>" rel="stylesheet" type="text/css"/>

	<!-- Custom Fonts -->
    <link href="<?php echo base_url('dist/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css">

	<!-- Calendar CSS -->
	<link href="<?php echo base_url('vendors/bower_components/fullcalendar/dist/fullcalendar.css'); ?>" rel="stylesheet" type="text/css"/>

	<!-- Custom CSS -->
	<link href="<?php echo base_url('dist/css/style.css'); ?>" rel="stylesheet" type="text/css">

</head>

<body>
	<!--Preloader-->
	<div class="preloader-it">
		<div class="la-anim-1"></div>
	</div>
	<!--/Preloader-->
  <?php foreach($total as $totrow){} ?>
  <?php foreach($total_contact_count as $tot_con_count){} ?>
  <?php foreach($total_order_count as $tot_ord_count){} ?>

    <div class="wrapper">
			<!-- Top Menu Items -->
      <nav class="navbar navbar-inverse navbar-fixed-top">
				<a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block mr-20 pull-left" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
				<a href="<?php echo site_url('home'); ?>"><img class="brand-img pull-left" src="<?php echo base_url('dist/img/logo.png'); ?>" alt="brand"/></a>
				<ul class="nav navbar-right top-nav pull-right">
					<li class="dropdown">
						<a href="<?php echo site_url('admin/inbox'); ?>">
              <i class="fa fa-bell top-nav-icon"></i>
              <span class="top-nav-icon-badge"><?php echo $tot_con_count->contact_count; ?></span>
            </a>
					</li>
				</ul>
			</nav>
			<!-- /Top Menu Items -->

      <!-- Left Sidebar Menu -->
      <div class="fixed-sidebar-left">
        <ul class="nav navbar-nav side-nav nicescroll-bar">
          <li>
            <a href="<?php echo site_url('home'); ?>">
              <i class="icon-grid mr-10"></i>Back To Shop
            </a>
          </li>
          <li>
            <a href="<?php echo site_url('admin'); ?>">
              <i class="icon-picture mr-10"></i>Dashboard
            </a>
          </li>
          <li>
            <a href="<?php echo site_url('admin/my_website'); ?>">
              <i class="icon-picture mr-10"></i>Edit My Website
            </a>
          </li>
          <li>
            <a class="active" href="javascript:void(0);" data-toggle="collapse" data-target="#ecom_dr">
              <i class="icon-basket-loaded mr-10"></i>Product Details
              <span class="pull-right">
                <i class="fa fa-fw fa-angle-down"></i>
              </span>
            </a>
            <ul id="ecom_dr" class="collapse collapse-level-1">
              <li>
                <a href="<?php echo site_url('admin/view_products'); ?>">View Products</a>
              </li>
              <li>
                <a href="<?php echo site_url('admin/add_products'); ?>">Add Products</a>
              </li>
              <li>
                <a href="<?php echo site_url('admin/orders'); ?>">Orders</a>
              </li>
            </ul>
          </li>

          <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#app_dr"><i class="icon-grid mr-10"></i>Mail
               <span class="pull-right">
                <span class="label label-info mr-10"><?php echo $tot_con_count->contact_count; ?></span>
                <i class="fa fa-fw fa-angle-down"></i>
               </span>
             </a>
             <ul id="app_dr" class="collapse collapse-level-1">
              <li>
                <a href="<?php echo site_url('admin/inbox'); ?>">Inbox</a>
              </li>
            </ul>
          </li>

          <li>
            <a href="<?php echo site_url('admin/users'); ?>">
              <i class="icon-grid mr-10"></i>User Grid
            </a>
          </li>

          <li>
            <a href="<?php echo base_url('admin/invoice'); ?>">
              <i class="icon-layers mr-10"></i>Orders Invoice
              <span class="pull-right">
                <span class="label label-danger mr-10"><?php echo $tot_ord_count->order_count; ?></span>
              </span>
            </a>
          </li>

          <li>
            <a href="<?php echo base_url('home/logout'); ?>">
              <i class="icon-layers mr-10"></i>Logout
            </a>
          </li>
        </ul>
      </div>
    <!-- /Left Sidebar Menu -->

        <!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid">
				<!-- Title -->
				<div class="row heading-bg  bg-pink">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-light">Dasboard Products in Spare Parts</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="<?php echo site_url('admin'); ?>">Dashboard</a></li>
						<li class="active"><span>All Products</span></li>
					  </ol>
					</div>
					<!-- /Breadcrumb -->
				</div>
				<!-- /Title -->

        <script>
          function deleteorder(id){
            var del_id = id;
            if(confirm("Are you sure you want to delete this product")){
            $.post('<?php echo base_url('admin/delete_product'); ?>', {"del_id": del_id}, function(data){
              location.reload();
              $('#cte').html(data)
              });
            }
          }
        </script>
        <p id='cte'></p>

				<!-- Product Row One -->
				<div class="row">
          <?php if(!empty($product)){ foreach($product as $prow){ ?>
            <?php
            $check = array_slice(explode(',', $prow->image), 0, 1);

            foreach($check as $image) {
                $image;
             }
             ?>
					<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
						<div class="panel panel-default card-view pa-0">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
									<article class="col-item">
										<div class="photo">
											<div class="options">
												<button class="btn btn-info btn-icon-anim btn-circle" type="button" onclick="deleteorder(<?php echo $prow->id; ?>)" title="Delete"><i class="icon-trash"></i></button>
											</div>
											<a href="#"> <img style="height: 200px; width: 230px;" src="<?php echo base_url('uploads/product/'.$image); ?>" class="img-responsive" alt="<?php echo $prow->title; ?>" /> </a>
										</div>
										<div class="info text-center">
											<h6><?php echo str_replace('-', ' ', $prow->title); ?></h6>
											<span class="product-spec capitalize-font block mt-5 mb-5"><?php echo $prow->type; ?></span>
											<span class="head-font block text-warning">&#8358; <?php echo number_format($prow->price); ?></span>
										</div>
									</article>
								</div>
							</div>
						</div>
					</div>
        <?php } }else{ echo '<div class="alert alert-danger">No Uploaded Product</div>'; } ?>
				</div>
				<!-- /Product Row One -->
        <div class="row">
            <div class="col-sm-12">
                <ul class="pagination m-0">
                  <?php
                    echo $this->pagination->create_links();
                  ?>
                </ul>
            </div>
        </div>
			</div>
			<!-- Footer -->
			<footer class="footer container-fluid pl-30 pr-30">
				<div class="row">
					<div class="col-sm-5">
						<a href="<?php echo site_url('admin'); ?>" class="brand mr-30"><img src="<?php echo site_url('dist/img/logo-sm.png'); ?>" alt="logo"/></a>
						<!--<ul class="footer-link nav navbar-nav">
							<li class="logo-footer"><a href="#">help</a></li>
							<li class="logo-footer"><a href="#">terms</a></li>
							<li class="logo-footer"><a href="#">privacy</a></li>
						</ul>-->
					</div>
					<div class="col-sm-7 text-right">
						<p>2018 &copy; Your Engine Parts</p>
					</div>
				</div>
			</footer>
			<!-- /Footer -->
        </div>
        <!-- /Main Content -->

    </div>
    <!-- /#wrapper -->

	<!-- JavaScript -->

    <!-- jQuery -->
    <script src="<?php echo base_url('vendors/bower_components/jquery/dist/jquery.min.js'); ?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url('vendors/bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>

	<!-- Slimscroll JavaScript -->
	<script src="<?php echo base_url('dist/js/jquery.slimscroll.js'); ?>"></script>

	<!-- Fancy Dropdown JS -->
	<script src="<?php echo base_url('dist/js/dropdown-bootstrap-extended.js'); ?>"></script>

	<!-- Init JavaScript -->
	<script src="<?php echo base_url('dist/js/init.js'); ?>"></script>

</body>

</html>
