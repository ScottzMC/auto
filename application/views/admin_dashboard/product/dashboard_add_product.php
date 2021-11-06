<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<title>Add Products || Admin Your Engine Parts || No 1 Nigeria Industrial Spare Parts</title>

		<!-- Favicon -->
		<link rel="shortcut icon" href="favicon.ico">
		<link rel="icon" href="favicon.ico" type="image/x-icon">

		<!-- Custom CSS -->
    <link href="<?php echo base_url('dist/css/style.css'); ?>" rel="stylesheet" type="text/css">
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
  					  <h5 class="txt-light">Dasboard Upload Products in Spare Parts</h5>
  					</div>
  					<!-- Breadcrumb -->
  					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
  					  <ol class="breadcrumb">
                <li><a href="<?php echo site_url('admin'); ?>">Dashboard</a></li>
  							<li><a href="#"><span>Product Details</span></a></li>
  							<li class="active"><span>Upload a Product</span></li>
  					  </ol>
  					</div>
  					<!-- /Breadcrumb -->
  				</div>
  				<!-- /Title -->

					<!-- Row -->
					<div class="row">
						<div class="col-sm-12">
							<div class="panel panel-default card-view">
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="form-wrap">
											<form action="<?php echo base_url('admin/add_products'); ?>" method="POST" enctype="multipart/form-data" name="formSubmit" onsubmit="return CheckLength()" role="form">
												<h6 class="txt-dark capitalize-font"><i class="icon-list mr-10"></i>about product</h6>
												<hr>
                        <div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Product Name</label>
															<input type="text" id="title" name="title" id="firstName" class="form-control" placeholder="Rounded Chair">
                              <span class="text-danger"><?php echo form_error('title'); ?></span>
                            </div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Product Part Number</label>
															<input type="text" id="title" name="part_number" id="firstName" class="form-control" placeholder="Rounded Chair">
                              <span class="text-danger"><?php echo form_error('part_number'); ?></span>
                            </div>
													</div>
													<!--/span-->
                          <div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Product Type</label>
															<select class="form-control" data-placeholder="Choose a Type" tabindex="1" id="type" name="type" onchange="changeProduct('type', 'category', 'subcategory', 'model', 'year')">
																<option>Select</option>
                                <option value="Caterpillar">Caterpillar</option>
																<option value="Komatsu">Komatsu</option>
                                <option value="JCB">JCB</option>
                                <option value="Volvo">Volvo</option>
                                <option value="Perkins">Perkins</option>
															</select>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Product Category</label>
                              <select id="category" name="category" class="form-control" data-placeholder="Choose a Category" tabindex="1">
																<option>Select</option>
															</select>
														</div>
													</div>
                          <div class="row">
  													<div class="col-md-6">
  														<div class="form-group">
  															<label class="control-label mb-10">Product SubCategory</label>
  															<select id="subcategory" name="subcategory" class="form-control" data-placeholder="Choose a Category" tabindex="1">
  																<option value="Select">Select</option>
  															</select>
  														</div>
  													</div>
													<!--/span-->
													<div class="col-md-6">
	                          <div class="form-group">
	                            <label class="control-label mb-10">Product Status</label>
	                            <select id="status" name="status" class="form-control" data-placeholder="Choose a Category" tabindex="1">
	                              <option value="New">New</option>
	                              <option value="Used">Used</option>
	                              <option value="Remand">Remand</option>
	                            </select>
	                          </div>
	                        </div>
												</div>
												<!-- Row -->

													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Product Model</label>
															<select id="model" name="model" class="form-control" data-placeholder="Choose a Category" tabindex="1">
																<option>Select</option>
															</select>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Price</label>
															<div class="input-group">
																<div class="input-group-addon"><i>&#8358;</i></div>
																<input type="text" name="price" class="form-control" id="exampleInputuname" placeholder="1000">
																<span class="text-danger"><?php echo form_error('price'); ?></span>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
                          <div class="row">
  													<div class="col-md-6">
  														<div class="form-group">
  															<label class="control-label mb-10">Quantity</label>
  															<div class="input-group">
  																<div class="input-group-addon"><i>Q</i></div>
  																<input type="text" name="quantity" class="form-control" id="exampleInputuname" placeholder="1">
                                  <span class="text-danger"><?php echo form_error('quantity'); ?></span>
  															</div>
  														</div>
  													</div>
													<!--/span-->

													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Product Year</label>
															<select id="year" name="year" class="form-control" data-placeholder="Choose a Category" tabindex="1">
																<option>Select</option>
															</select>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Product Country Location</label>
															<select id="country" name="country" class="form-control" data-placeholder="Choose a Category" tabindex="1">
															<option>Select</option>
															<?php foreach($country_location as $country){ ?>
															<option value="<?php echo $country->country; ?>"><?php echo $country->country; ?></option>
															<?php } ?>
															</select>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Product State Location</label>
															<select id="state" name="state" class="form-control" data-placeholder="Choose a Category" tabindex="1">
																<option>Select</option>
															</select>
														</div>
													</div>
												</div>
												<div class="seprator-block"></div>
												<h6 class="txt-dark capitalize-font"><i class="icon-speech mr-10"></i>Product Description</h6>
												<hr>
												<div class="row">
													<div class="col-md-12">
														<div class="form-group">
															<textarea name="description" id="description" required="" placeholder="Describe Your Product" class="form-control" rows="4" onKeyUp="textCounter(this,'count_display',30);"  onBlur="textCounter(this,'count_display',30);"></textarea>
															Number of Characters Left: <span id="count_display">30</span>
															<span id="Message" style="color: #ff0000"></span>
                              <span class="text-danger"><?php echo form_error('description'); ?></span>
														</div>
													</div>
												</div>
												<!--/row-->
													<!--/span-->
												</div>
												<div class="seprator-block"></div>
												<h6 class="txt-dark capitalize-font"><i class="icon-picture mr-10"></i>upload image</h6>
												<hr>
												<div class="row">
													<div class="col-lg-12">
                            <input type="file" name="userFiles[]" multiple="multiple" class="filestyle" data-buttonname="btn-primary">
														</div>
													</div>
												</div>
												<div class="seprator-block"></div>
												<hr>

												<div class="form-actions">
													<button type="submit" name="upload" class="btn btn-success btn-icon left-icon mr-10">
                            <i class="fa fa-check"></i>
                            <span>Upload</span>
                          </button>
												</div>
											</form>
                      <?php echo $this->session->flashdata('msgError'); ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Row -->

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

    <script src="<?php echo base_url('dist/js/dynamic-product-form.js'); ?>"></script>

    <script src="<?php echo base_url('dist/js/check-length.js'); ?>"></script>

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
