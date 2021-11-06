<?php

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
	<title>View All Orders || Your Engine Parts || No 1 Nigeria Industrial Spare Parts</title>

	<!-- Favicon -->
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="icon" href="favicon.ico" type="image/x-icon">

	<!-- vector map CSS -->
	<link href="<?php echo base_url('vendors/vectormap/jquery-jvectormap-2.0.2.css'); ?>" rel="stylesheet" type="text/css"/>

	<!-- Custom Fonts -->
    <link href="<?php echo base_url('dist/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css">

	<!-- Data table CSS -->
	<link href="<?php echo base_url('vendors/bower_components/datatables/media/css/jquery.dataTables.min.css'); ?>" rel="stylesheet" type="text/css"/>

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
                <a class="active" href="<?php echo site_url('admin/orders'); ?>">Orders</a>
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
				<div class="row heading-bg bg-pink">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-light">View All Orders in Spare Parts</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="<?php echo site_url('admin'); ?>">Dashboard</a></li>
						<li><a href="#"><span>Product Details</span></a></li>
						<li class="active"><span>Orders</span></li>
					  </ol>
					</div>
					<!-- /Breadcrumb -->
				</div>
				<!-- /Title -->

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
  </script>
      <script>
    function cancelorder(id){
    var del_id = id;
    if(confirm("Are you sure you want to cancel this order")){
    $.post('<?php echo base_url('admin/cancel_order'); ?>', {"del_id": del_id}, function(data){
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
									<h6 class="panel-title txt-dark">Product orders</h6>
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
                            <th>Telephone No</th>
                            <th>Address</th>
                            <th>Province</th>
                            <th>State</th>
                            <th>Country</th>
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
                          <?php if(!empty($orders)){ foreach($orders as $odow){ ?>
													<tr>
														<td>#<?php echo $odow->orderid; ?></td>
														<td><?php echo $odow->firstname; ?> <?php echo $odow->surname; ?></td>
                            <td><?php echo $odow->telephone; ?></td>
                            <td><?php echo $odow->address1; ?></td>
                            <td><?php echo $odow->province; ?></td>
                            <td><?php echo $odow->state; ?></td>
                            <td><?php echo $odow->country; ?></td>
														<td><?php echo str_replace('-', ' ', $odow->title); ?></td>
                            <td>&#8358; <?php echo number_format($odow->price); ?></td>
                            <td style="text-align: center;"><?php echo $odow->quantity; ?></td>
                            <td>&#8358; <?php echo number_format($odow->quantity * $odow->price); ?></td>
														<td>
                              <?php if($odow->status == "Delivering"){ ?>
                              <span class="label label-warning">
                                <?php echo $odow->status; ?>
                              </span>
                            <?php }else if($odow->status == "Delivered"){ ?>
                              <span class="label label-success">
                                <?php echo $odow->status; ?>
                              </span>
                            <?php }else if($odow->status == "Cancelled"){ ?>
                              <span class="label label-danger">
                                <?php echo $odow->status; ?>
                              </span>
                            <?php } ?>
														</td>
                            <td><?php echo convertToOrderFormat($odow->created_time); ?></td>
                            <td><?php echo date("j M Y", strtotime($odow->created_day)); ?></td>
                            <td>
													   <button class="btn btn-success btn-icon-anim btn-square" onclick="deliverorder(<?php echo $odow->id; ?>)" title="Delivered Order">
                               <i class="icon-check"></i>
                             </button>
                            </td>
                            <td>
													   <button class="btn btn-danger btn-icon-anim btn-square" onclick="cancelorder(<?php echo $odow->id; ?>)" title="Cancelled Order">
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

	<!-- Data table JavaScript -->
	<script src="<?php echo base_url('vendors/bower_components/datatables/media/js/jquery.dataTables.min.js'); ?>"></script>
	<script src="<?php echo base_url('dist/js/productorders-data.js'); ?>"></script>

	<!-- Slimscroll JavaScript -->
  <script src="<?php echo base_url('dist/js/jquery.slimscroll.js'); ?>"></script>

	<!-- Fancy Dropdown JS -->
  <script src="<?php echo base_url('dist/js/dropdown-bootstrap-extended.js'); ?>"></script>

	<!-- Init JavaScript -->
	<script src="<?php echo base_url('dist/js/init.js'); ?>"></script>

</body>

</html>
