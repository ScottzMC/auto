<?php

function convertToAgoFormat($timestamp){
    $diffBtwCurrentTimeAndTimeStamp = (time() - $timestamp);
    $periodsString = ["sec", "min","hr","day","week","month","year","decade"];
    $periodNumbers = ["60" , "60" , "24" , "7" , "4.35" , "12" , "10"];
    for(@@$iterator = 0; $diffBtwCurrentTimeAndTimeStamp >= $periodNumbers[$iterator]; $iterator++)
        @@$diffBtwCurrentTimeAndTimeStamp /= $periodNumbers[$iterator];
        $diffBtwCurrentTimeAndTimeStamp = round($diffBtwCurrentTimeAndTimeStamp);

    if($diffBtwCurrentTimeAndTimeStamp != 1)  $periodsString[$iterator].="s";
        $output = "$diffBtwCurrentTimeAndTimeStamp $periodsString[$iterator]";
        echo "Posted " .$output. " ago";
}

function convertToRegisterFormat($timestamp){
    $diffBtwCurrentTimeAndTimeStamp = (time() - $timestamp);
    $periodsString = ["sec", "min","hr","day","week","month","year","decade"];
    $periodNumbers = ["60" , "60" , "24" , "7" , "4.35" , "12" , "10"];
    for(@@$iterator = 0; $diffBtwCurrentTimeAndTimeStamp >= $periodNumbers[$iterator]; $iterator++)
        @@$diffBtwCurrentTimeAndTimeStamp /= $periodNumbers[$iterator];
        $diffBtwCurrentTimeAndTimeStamp = round($diffBtwCurrentTimeAndTimeStamp);

    if($diffBtwCurrentTimeAndTimeStamp != 1)  $periodsString[$iterator].="s";
        $output = "$diffBtwCurrentTimeAndTimeStamp $periodsString[$iterator]";
        echo "Registered " .$output. " ago";
}

function convertToOrderFormat($timestamp){
    $diffBtwCurrentTimeAndTimeStamp = (time() - $timestamp);
    $periodsString = ["sec", "min","hr","day","week","month","year","decade"];
    $periodNumbers = ["60" , "60" , "24" , "7" , "4.35" , "12" , "10"];
    for(@@$iterator = 0; $diffBtwCurrentTimeAndTimeStamp >= $periodNumbers[$iterator]; $iterator++)
        @@$diffBtwCurrentTimeAndTimeStamp /= $periodNumbers[$iterator];
        $diffBtwCurrentTimeAndTimeStamp = round($diffBtwCurrentTimeAndTimeStamp);

    if($diffBtwCurrentTimeAndTimeStamp != 1)  $periodsString[$iterator].="s";
        $output = "$diffBtwCurrentTimeAndTimeStamp $periodsString[$iterator]";
        echo "Ordered " .$output. " ago";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>Admin Dashboard || Your Engine Parts || No 1 Nigeria Industrial Spare Parts</title>

	<!-- Favicon -->
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="icon" href="<?php echo base_url('favicon.ico'); ?>" type="image/x-icon">

	<!-- vector map CSS -->
	<link href="<?php echo base_url('vendors/vectormap/jquery-jvectormap-2.0.2.css'); ?>" rel="stylesheet" type="text/css"/>

	<!-- Data table CSS -->
	<link href="<?php echo base_url('vendors/bower_components/datatables/media/css/jquery.dataTables.min.css'); ?>" rel="stylesheet" type="text/css"/>

	<!-- Custom CSS -->
	<link href="<?php echo base_url('dist/css/style.css'); ?>" rel="stylesheet" type="text/css">
</head>

<?php if(!empty($total)){ foreach($total as $totrow){} }else{ echo ''; } ?>
<?php if(!empty($total_user_count)){ foreach($total_user_count as $tot_use_count){} }else{ echo ''; } ?>
<?php if(!empty($total_product_count)){ foreach($total_product_count as $tot_prod_count){} }else{ echo ''; } ?>
<?php if(!empty($total_contact_count)){ foreach($total_contact_count as $tot_con_count){} }else{ echo ''; } ?>
<?php if(!empty($total_order_count)){ foreach($total_order_count as $tot_ord_count){}  }else{ echo ''; } ?>

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
              <span class="top-nav-icon-badge"><?php if(!empty($total_contact_count)){ echo $tot_con_count->contact_count; }else{ echo ''; } ?></span>
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
            <a class="active" href="<?php echo site_url('admin'); ?>">
              <i class="icon-picture mr-10"></i>Dashboard
            </a>
          </li>
          <li>
            <a href="<?php echo site_url('admin/my_website'); ?>">
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
                <span class="label label-info mr-10"><?php if(!empty($total_contact_count)){ echo $tot_con_count->contact_count; }else{ echo ''; } ?></span>
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
                <span class="label label-danger mr-10"><?php if(!empty($total_order_count)){ echo $tot_ord_count->order_count; }else{ echo ''; } ?></span>
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
				<div class="row heading-bg  bg-blue">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
						<h5 class="txt-light">Spare Parts Admin Dashboard</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
						<ol class="breadcrumb">
							<li><a href="<?php echo site_url('admin'); ?>">Admin Dashboard</a></li>
							<li class="active"><span>Dashboard</span></li>
						</ol>
					</div>
					<!-- /Breadcrumb -->
				</div>

				<!-- /Title -->
				<!-- Row -->
				<div class="row">
					<div class="col-lg-3 col-md-4 col-sm-5 col-xs-12">
						<div class="panel panel-default card-view pa-0">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
									<div class="sm-data-box bg-red">
										<div class="row ma-0">
											<div class="col-xs-5 text-center pa-0 icon-wrap-left">
												<i class="icon-briefcase txt-light"></i>
											</div>
											<div class="col-xs-7 text-center data-wrap-right">
												<h6 class="txt-light">Total Products</h6>
												<span class="txt-light counter counter-anim"><?php if(!empty($total_product_count)){ echo $tot_prod_count->product_count; }else{ echo ''; } ?></span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="panel panel-default card-view">
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="sm-progress-box">
											<i class="icon-emotsmile mb-15 block"></i>
											<span class="font-12 head-font txt-dark">Order Rate
                        <?php $order_rate = $tot_ord_count->order_count * 30/100; ?>
                        <span class="pull-right"><?php echo $order_rate; ?>%
                          <span class="pl-5"><i class="fa fa-arrow-up txt-success font-12"></i></span>
                        </span>
                      </span>
											<div class="progress mt-10">
												<div class="progress-bar progress-bar-success" aria-valuenow="<?php echo $order_rate; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $order_rate; ?>%" role="progressbar">
                          <span class="sr-only"><?php echo $order_rate; ?>% Complete (success)</span> </div>
											</div>
										</div>
									</div>
								</div>
							</div>
					</div>

					<!-- /Bordered Table -->
          <div class="col-lg-4 col-md-6 col-sm-12">
						<div class="panel panel-success card-view">
							<div class="panel-heading mb-20">
								<div class="pull-left">
									<h6 class="panel-title txt-light pull-left">User Register Status</h6>
								</div>
								<div class="pull-right">
									<a class="txt-light" href="javascript:void(0);"><i class="ti-plus"></i></a>
								</div>
								<div class="clearfix"></div>
							</div>

              <?php if(!empty($user_status)){ foreach($user_status as $usrow){ ?>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<ul class="chat-list-wrap">
										<li class="chat-list">
											<div class="chat-body">
												<a class="" href="#">
													<div class="chat-data">
														<img class="user-img img-circle" src="<?php echo base_url('uploads/profile/'.$usrow->image); ?>"  alt="<?php echo $usrow->firstname; ?> <?php echo $usrow->surname; ?>"/>
														<div class="user-data">
															<span class="name block capitalize-font"><?php echo $usrow->firstname; ?> <?php echo $usrow->surname; ?></span>
															<span class="time block txt-grey"><?php echo date('j M Y', strtotime($usrow->created_day)); ?></span>
														</div>
														<div class="status online"></div>
														<div class="clearfix"></div>
													</div>
												</a>
											</div>
										</li>
									</ul>
								</div>
							</div>
            <?php } }else{ echo '<div class="alert alert-danger">No User has Registered</div>'; } ?>
						</div>
					</div>

          <div class="col-lg-4 col-md-6 col-sm-12">
						<div class="panel panel-success card-view">
							<div class="panel-heading mb-20">
								<div class="pull-left">
									<h6 class="panel-title txt-light pull-left">User Product Status</h6>
								</div>
								<div class="pull-right">
									<a class="txt-light" href="javascript:void(0);"><i class="ti-plus"></i></a>
								</div>
								<div class="clearfix"></div>
							</div>
              <?php if(!empty($user_product)){ foreach($user_product as $prow){ ?>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<ul class="chat-list-wrap">
                    <li class="chat-list">
											<div class="chat-body">
												<a class="" href="#">
													<div class="chat-data">
                            <img class="user-img img-circle" src="<?php echo base_url('uploads/profile/'.$prow->image); ?>"  alt="<?php echo $prow->firstname; ?> <?php echo $prow->surname; ?>"/>
														<div class="user-data">
                              <span class="name block capitalize-font"><?php echo $prow->firstname; ?> <?php echo $prow->surname; ?></span>
                              <span class="time block txt-grey">Uploaded <?php echo str_replace('-', ' ', $prow->title); ?></span>
                              <span class="time block txt-grey"><?php echo date('j M Y', strtotime($prow->created_day)); ?></span>
														</div>
														<div class="status online"></div>
														<div class="clearfix"></div>
													</div>
												</a>
											</div>
										</li>
									</ul>
								</div>
							</div>
            <?php } }else{ echo '<div class="alert alert-danger">No Product Uploaded</div>'; } ?>
						</div>
					</div>
				</div>

				<!-- Row -->
					<div class="row">
						<div class="col-sm-12">
							<div class="panel panel-default card-view">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark">Status - Per Month Info</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body pb-0">
										<!--<div class="row">
                      <?php if(!empty($total_user_count)){ ?>
											<div class="col-sm-3 col-xs-6 mb-15">
												<span id="pie_chart_1" class="easypiechart skill-circle" data-percent="<?php echo $totrow->user_count * 30/100; ?>">
													<span class="percent head-font"><?php echo $tot_use_count->user_count * 30/100; ?></span>
												</span>
												<span class="skill-head mt-20">Users</span>
											</div>
                    <?php }else{ echo ''; } ?>

                    <?php if(!empty($total_product_count)){ ?>
											<div class="col-sm-3 col-xs-6 mb-15">
												<span id="pie_chart_2" class="easypiechart skill-circle" data-percent="<?php echo $totrow->product_count * 30/100; ?>">
													<span class="percent head-font"><?php echo $tot_prod_count->product_count * 30/100; ?></span>
												</span>
												<span class="skill-head mt-20">Products</span>
											</div>
                    <?php }else{ echo ''; } ?>

                    <?php if(!empty($total_order_count)){ ?>
											<div class="col-sm-3 col-xs-6 mb-15">
												<span id="pie_chart_3" class="easypiechart skill-circle" data-percent="<?php echo $totrow->order_count * 30/100; ?>">
													<span class="percent head-font"><?php echo $tot_ord_count->order_count * 30/100; ?></span>
												</span>
												<span class="skill-head mt-20">Order Rate</span>
											</div>
                    <?php }else{ echo ''; } ?>

                    <?php if(!empty($total_contact_count)){ ?>
											<div class="col-sm-3 col-xs-6 mb-15">
												<span id="pie_chart_4" class="easypiechart skill-circle" data-percent="<?php echo $totrow->contact_count * 30/100; ?>">
													<span class="percent head-font"><?php echo $tot_con_count->contact_count * 30/100; ?></span>
												</span>
												<span class="skill-head mt-20">Mail</span>
											</div>
                    <?php }else{ echo ''; } ?>

                  </div>-->
									</div>
								</div>
							</div>

						</div>
					</div>
					<!-- /Row -->

    <script>
      function deliverorder(id){
        var order_id = id;
        if(confirm("Are you sure you this order has been delivered")){
        $.post('<?php echo base_url('admin/deliver_order'); ?>', {"order_id": order_id}, function(data){
          location.reload();
          $('#cte').html(data)
          });
        }
      }

      function cancelorder(id){
        var order_id = id;
        if(confirm("Are you sure you want to cancel your order")){
        $.post('<?php echo base_url('admin/cancel_order'); ?>', {"order_id": order_id}, function(data){
          location.reload();
          $('#cti').html(data)
          });
        }
      }

    </script>

    <p id='cte'></p>
    <p id='cti'></p>

				<!-- Row -->
				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">Total Orders</h6>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="table-wrap">
										<div class="table-responsive">
											<table class="table display product-overview mb-30" id="support_table">
												<thead>
													<tr>
														<th>OID</th>
														<th>FullName</th>
														<th>Product Name</th>
														<th>Price</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
														<th>Order Status</th>
                            <th>Time</th>
                            <th>Date</th>
                            <th>Deliver</th>
                            <th>Cancel</th>
													</tr>
												</thead>
												<tbody>
                          <?php if(!empty($order)){ foreach($order as $odrow){ ?>
													<tr>
														<td>#<?php echo $odrow->orderid; ?></td>
														<td><?php echo $odrow->firstname; ?> <?php echo $odrow->surname; ?></td>
														<td><?php echo str_replace('-', ' ', $odrow->title); ?></td>
                            <td>&#8358; <?php echo number_format($odrow->price); ?></td>
                            <td style="text-align: center;"><?php echo $odrow->quantity; ?></td>
                            <td>&#8358; <?php echo number_format($odrow->quantity * $odrow->price); ?></td>
														<td>
                              <?php if($odrow->status == "Delivering"){ ?>
                              <span class="label label-warning">
                                <?php echo $odrow->status; ?>
                              </span>
                            <?php }else if($odrow->status == "Delivered"){ ?>
                              <span class="label label-success">
                                <?php echo $odrow->status; ?>
                              </span>
                            <?php }else if($odrow->status == "Cancelled"){ ?>
                              <span class="label label-danger">
                                <?php echo $odrow->status; ?>
                              </span>
                            <?php } ?>
														</td>
                            <td><?php echo convertToOrderFormat($odrow->created_time); ?></td>
                            <td><?php echo date("j M Y", strtotime($odrow->created_day)); ?></td>
                            <td>
													   <button class="btn btn-success btn-icon-anim btn-square" onclick="deliverorder(<?php echo $odrow->id; ?>)" title="Delivered Order">
                               <i class="icon-check"></i>
                             </button>
                            </td>
                            <td>
													   <button class="btn btn-danger btn-icon-anim btn-square" onclick="cancelorder(<?php echo $odrow->id; ?>)" title="Cancel Order">
                               <i class="icon-trash"></i>
                             </button>
                            </td>
													</tr>
                        <?php } }else{ echo ''; } ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /Row -->

			</div>
			<!-- Footer -->
			<footer class="footer container-fluid pl-30 pr-30">
				<div class="row">
					<div class="col-sm-5">
						<a href="<?php echo site_url('home'); ?>" class="brand mr-30"><img src="<?php echo base_url('dist/img/logo-sm.png'); ?>" alt="logo"/></a>
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

	<!-- Counter Animation JavaScript -->
	<script src="<?php echo base_url('vendors/bower_components/waypoints/lib/jquery.waypoints.min.js'); ?>"></script>
	<script src="<?php echo base_url('vendors/bower_components/Counter-Up/jquery.counterup.min.js'); ?>"></script>

	<!-- Data table JavaScript -->
	<script src="<?php echo base_url('vendors/bower_components/datatables/media/js/jquery.dataTables.min.js'); ?>"></script>
	<script src="<?php echo base_url('dist/js/productorders-data.js'); ?>"></script>

	<!-- Slimscroll JavaScript -->
	<script src="<?php echo base_url('dist/js/jquery.slimscroll.js'); ?>"></script>

	<!-- Fancy Dropdown JS -->
	<script src="<?php echo base_url('dist/js/dropdown-bootstrap-extended.js'); ?>"></script>

	<script src="<?php echo base_url('vendors/bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js'); ?>"></script>
	<script src="<?php echo base_url('dist/js/skills-counter-data.js'); ?>"></script>

	<!-- ChartJS JavaScript -->
	<script src="<?php echo base_url('vendors/chart.js/Chart.min.js'); ?>"></script>

	<script src="<?php echo base_url('vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.js'); ?>"></script>

	<!-- Init JavaScript -->
	<script src="<?php echo base_url('dist/js/init.js'); ?>"></script>
	<script src="<?php echo base_url('dist/js/dashboard3-data.js'); ?>"></script>
</body>
</html>
