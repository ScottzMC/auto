<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<title>Edit My Website || Admin Your Engine Parts || No 1 Nigeria Industrial Spare Parts</title>

		<!-- Favicon -->
		<link rel="shortcut icon" href="favicon.ico">
		<link rel="icon" href="favicon.ico" type="image/x-icon">

		<!-- Custom CSS -->
    <link href="<?php echo base_url('dist/css/style.css'); ?>" rel="stylesheet" type="text/css">
    <!-- bootstrap-tagsinput CSS -->
    <link href="<?php echo base_url('vendors/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.css'); ?>" rel="stylesheet" type="text/css"/>
	</head>

  <?php foreach($total as $totrow){} ?>
	<?php foreach($total_contact_count as $tot_con_count){} ?>
	<?php foreach($total_order_count as $tot_ord_count){} ?>

  <body>
  	<!--Preloader-->
  	<div class="preloader-it">
  		<div class="la-anim-1"></div>
  	</div>
  	<!--/Preloader-->
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
              <a class="active" href="<?php echo site_url('admin/my_website'); ?>">
                <i class="icon-picture mr-10"></i>Edit My Website
              </a>
            </li>
            <li>
              <a href="javascript:void(0);" data-toggle="collapse" data-target="#ecom_dr">
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
  					  <h5 class="txt-light">Dasboard Upload Products in Spare Parts</h5>
  					</div>
  					<!-- Breadcrumb -->
  					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
  					  <ol class="breadcrumb">
                <li><a href="<?php echo site_url('admin'); ?>">Dashboard</a></li>
  							<li><a href="#"><span>Shop</span></a></li>
  							<li class="active"><span>Edit My Website</span></li>
  					  </ol>
  					</div>
  					<!-- /Breadcrumb -->
  				</div>
  				<!-- /Title -->

					<!-- Row -->
					<div class="row">
            <div class="col-md-4">
							<div class="panel panel-default card-view">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark">Add Menu in Website</h6>
									</div>
									<div class="clearfix"></div>
								</div>

                <!--<form action="<?php echo base_url('admin/add_menu'); ?>" method="post" role="form">
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<p class="text-muted">Add <code>Menu Options in the website from here.</code> eg - Caterpillar.</p>
										<div class="tags-default mt-40">
											<input type="text" name="menu_tag[]" value="" data-role="tagsinput" placeholder="add tags"/>
                      <span><?php echo form_error('menu_tag'); ?></span>
										</div>
									</div>

                  <div class="form-actions">
                    <button type="submit" name="add_menu" class="btn btn-danger btn-icon left-icon mr-10">
                      <i class="fa fa-check"></i>
                      <span>Add</span>
                    </button>
                  </div>
								</div>
              </form>-->

              <br>

              <?php
                if($this->form_validation->run() == TRUE){
                  echo $this->session->flashdata('msg');
                  echo $this->session->flashdata('msgError');
                }
              ?>
							</div>
						</div>

						<script>
		          function delete_menu(menu_options){
		            var del_id = menu_options;
		            if(confirm("Are you sure you want to delete this menu")){
		            $.post('<?php echo base_url('admin/delete_menu'); ?>', {"del_id": del_id}, function(data){
		              location.reload();
		              $('#cte').html(data)
		              });
		            }
		          }
		        </script>
		        <p id='cte'></p>

            <div class="col-md-4">
							<div class="panel panel-default card-view">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark">Delete Menu Options in Website</h6>
									</div>
									<div class="clearfix"></div>
								</div>

                <!--<form action="<?php echo base_url('admin/my_website'); ?>" method="post" role="form">
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<p class="text-muted">Delete <code>Menu Options on the website from here.</code> eg - Caterpillar.</p>
										<div class="tags-default mt-40">
                      <?php
                        foreach($load_menu as $men){}

                        $check = explode(',', $men->menu_options);

                        foreach($check as $menu){
                      ?>
                      <button type="submit" name="delete_menu" class="btn btn-danger btn-icon left-icon mr-10">
                        <i class="fa fa-trash"></i>
                      </button>
											  <p><?php echo $menu; ?></p>
                      <?php } ?>
                    </div>
									</div>
								</div>
              </form>-->

              <br>

              <?php
                if($this->form_validation->run() == TRUE){
                  echo $this->session->flashdata('msg');
                  echo $this->session->flashdata('msgError');
                }
              ?>
							</div>
						</div>
          </div>
					<!-- /Row -->

					<!-- Row
					<div class="row">
            <div class="col-md-4">
							<div class="panel panel-default card-view">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark">Add Menu in Website</h6>
									</div>
									<div class="clearfix"></div>
								</div>

                <form action="<?php echo base_url('admin/add_menu'); ?>" method="post" role="form">
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<p class="text-muted">Add <code>Menu Options in the website from here.</code> eg - Caterpillar.</p>
										<div class="tags-default mt-40">
											<input type="text" name="menu_tag[]" value="" data-role="tagsinput" placeholder="add tags"/>
                      <span><?php echo form_error('menu_tag'); ?></span>
										</div>
									</div>

                  <div class="form-actions">
                    <button type="submit" name="add_menu" class="btn btn-danger btn-icon left-icon mr-10">
                      <i class="fa fa-check"></i>
                      <span>Add</span>
                    </button>
                  </div>
								</div>
              </form>

              <br>

              <?php
                if($this->form_validation->run() == TRUE){
                  echo $this->session->flashdata('msg');
                  echo $this->session->flashdata('msgError');
                }
              ?>
							</div>
						</div>
          </div>
					<!-- /Row -->

					<script type='text/javascript'>
            // baseURL variable

        </script>

				</div>

			</div>
			<!-- /Main Content -->
		</div>
		<!-- /#wrapper -->

		<!-- JavaScript -->

    <!-- jQuery -->
		<script src="<?php echo base_url('vendors/bower_components/jquery/dist/jquery.js'); ?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url('vendors/bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>

  <!-- Slimscroll JavaScript -->
  <script src="<?php echo base_url('dist/js/jquery.slimscroll.js'); ?>"></script>

  <!-- Fancy Dropdown JS -->
  <script src="<?php echo base_url('dist/js/dropdown-bootstrap-extended.js'); ?>"></script>

  <!-- Init JavaScript -->
  <script src="<?php echo base_url('dist/js/init.js'); ?>"></script>
  <!-- Bootstrap Tagsinput JavaScript -->
		<script src="<?php echo base_url('vendors/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js'); ?>"></script>

    <script src="<?php echo base_url('dist/js/dynamic-product-form.js'); ?>"></script>

    <script src="<?php echo base_url('dist/js/check-length.js'); ?>"></script>

	</body>
</html>
