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
        echo "Ordered " .$output. " ago";
}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<title><?php echo $this->session->userdata('uname'); ?> Dashboard || Auto Club</title>

		<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('images/favicon.png'); ?>" />

    <link href="<?php echo base_url('css/master.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('css/main.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/icons.css'); ?>" rel="stylesheet">

		<!-- SWITCHER -->
		<link rel="stylesheet" id="switcher-css" type="text/css" href="<?php echo base_url('assets/switcher/css/switcher.css'); ?>" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="<?php echo base_url('assets/switcher/css/color3.css'); ?>" title="color3" media="all" />

		<!--[if lt IE 9]>
		<script src="//oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="//oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->

	</head>
	<body class="m-index" data-scrolling-animations="true" data-equal-height=".b-auto__main-item">

		<!-- Loader
		<div id="page-preloader"><span class="spinner"></span></div>
		<!-- Loader end -->

    <?php if(!empty($userdp)){ foreach($userdp as $usrow){} }else{ echo ''; } ?>
    <?php foreach($total_product_count as $tot_prod_count){} ?>
    <?php foreach($total_order_count as $tot_ord_count){} ?>

    <div id="page-wrapper">

    <!-- Top Bar Start -->
            <div class="topbar">

                <!-- Top navbar -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">

                            <!-- Mobile menu button -->
                            <div class="pull-left">
                                <button type="button" class="button-menu-mobile visible-xs visible-sm">
                                    <i class="fa fa-bars"></i>
                                </button>
                                <span class="clearfix"></span>
                            </div>

                            <!-- Top nav Right menu -->
                            <ul class="nav navbar-nav navbar-right top-navbar-items-right pull-right">
                                <li class="dropdown top-menu-item-xs">
                                    <a href="#" class="dropdown-toggle menu-right-item profile" data-toggle="dropdown" aria-expanded="true">
                                      <?php if(!empty($userdp)){ ?>
                                      <img src="<?php echo base_url('uploads/profile/'.$usrow->image); ?>" alt="<?php echo $usrow->firstname; ?>" class="img-circle"> </a>
                                    <?php }else{ echo ''; } ?>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo site_url('user'); ?>"><i class="ti-user m-r-10"></i> Profile</a></li>
                                        <li class="divider"></li>
                                        <li><a href="<?php echo base_url('home/logout'); ?>"><i class="ti-power-off m-r-10"></i> Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div> <!-- end container -->
                </div> <!-- end navbar -->
            </div>
            <!-- Top Bar End -->

            <!-- Page content start -->
            <div class="page-contentbar">

                <!--left navigation start-->
                <aside class="sidebar-navigation">
                    <div class="scrollbar-wrapper">
                        <div>
                            <button type="button" class="button-menu-mobile btn-mobile-view visible-xs visible-sm">
                                <i class="mdi mdi-close"></i>
                            </button>
                            <!-- User Detail box -->
                            <div class="user-details">
                                <div class="pull-left">
                                  <?php if(!empty($userdp)){ ?>
                                    <img src="<?php echo base_url('uploads/profile/'.$usrow->image); ?>" alt="<?php echo $usrow->firstname; ?>" class="thumb-md img-circle">
                                  <?php }else{ echo ''; } ?>
                                </div>
                                <?php if(!empty($userdp)){ ?>
                                <div class="user-info">
                                    <a href="#"><?php echo $usrow->firstname; ?> <?php echo $usrow->surname; ?></a>
                                    <p class="text-muted m-0"><?php echo $usrow->user_status; ?></p>
                                </div>
                              <?php }else{ echo ''; } ?>
                            </div>
                            <!--- End User Detail box -->

                            <!-- Left Menu Start -->
                            <ul class="metisMenu nav" id="side-menu">
                                <li><a href="<?php echo site_url('home'); ?>"><i class="ti-home"></i> Back to Shop</a></li>
                                <li><a href="<?php echo site_url('user'); ?>"><i class="ti-home"></i> Dashboard </a></li>

                                <li>
                                    <a href="javascript: void(0);" aria-expanded="true"><i class="ti-files"></i> Account <span class="fa arrow"></span></a>
                                    <ul class="nav-second-level nav" aria-expanded="true">
                                        <li><a href="<?php echo site_url('user/profile'); ?>">Profile</a></li>
                                        <li><a href="<?php echo site_url('user/forgot_password'); ?>">Forgot My Password</a></li>
                                        <li><a href="<?php echo base_url('home/logout'); ?>">Logout</a></li>
                                    </ul>
                                </li>

                                <li>
                                    <a href="javascript: void(0);" aria-expanded="true"><i class="ti-widget"></i> Product<span class="fa arrow"></span></a>
                                    <ul class="nav-second-level nav" aria-expanded="true">
                                        <li><a href="<?php echo site_url('user/invoice'); ?>">Invoice
                                          <?php if(!empty($total_order_count)){ ?>
                                          <span class="label label-custom pull-right"><?php echo $tot_ord_count->order_count; ?></span>
                                        <?php }else{ echo ''; } ?>
                                        </a></li>
                                        <li><a href="#">FAQs</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div><!--Scrollbar wrapper-->
                </aside>
                <!--left navigation end-->
                <!-- START PAGE CONTENT -->
                <div id="page-right-content">

                    <div class="container">
                        <div class="row">
							<div class="col-sm-12">
								<div class="card-box widget-inline">
									<div class="row">
										<div class="col-lg-3 col-sm-6">
											<div class="widget-inline-box text-center">
												<h3 class="m-t-10"><i class="text-custom mdi mdi-airplay"></i>
                          <?php if(!empty($total_product_count)){ ?>
                          <b data-plugin="counterup"><?php echo $tot_prod_count->product_count; ?></b>
                        <?php }else{ echo '0'; } ?>
                        </h3>
												<p class="text-muted">My Total Products</p>
											</div>
										</div>

										<div class="col-lg-3 col-sm-6">
											<div class="widget-inline-box text-center">
												<h3 class="m-t-10"><i class="text-info mdi mdi-black-mesa"></i>
                          <?php if(!empty($total_order_count)){ ?>
                          <b data-plugin="counterup"><?php echo $tot_ord_count->order_count; ?></b>
                        <?php }else{ echo '0'; } ?>
                        </h3>
												<p class="text-muted">My Products Ordered</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
                        <!--end row -->

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <h4 class="m-t-0">Products</h4>
                                    <div class="table-responsive">
                                        <table class="table table-hover mails m-0 table table-actions-bar">
                                            <thead>
                                                <tr>
                                                    <th style="min-width: 95px;"></th>
                                                    <th>Order ID</th>
                                                    <th>Name</th>
                                                    <th>Quantity</th>
                                                    <th>Price</th>
                                                    <th>Total Price</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                              <?php if(!empty($orderdp)){ foreach($orderdp as $odrow){
                                                $check = array_slice(explode(',', $odrow->image), 0, 1);

                                                foreach($check as $image) {
                                                    $image;
                                                 }
                                              ?>
                                                <tr>
                                                    <td><img src="<?php echo base_url('uploads/product/'.$image); ?>" alt="<?php echo $odrow->title; ?>" title="contact-img" class="img-circle thumb-sm" /></td>
                                                    <td><?php echo $odrow->orderid; ?></td>
                                                    <td><?php echo str_replace('-', ' ', $odrow->title); ?></td>
                                                    <td><b><?php echo $odrow->quantity; ?></b></td>
                                                    <td><b>&#8358; <?php echo number_format($odrow->price); ?></b>
                                                    <td><b>&#8358; <?php echo number_format($odrow->quantity * $odrow->price); ?></b>
                                                    <td><?php echo convertToAgoFormat($odrow->created_time); ?></td>
                                                </tr>
                                              <?php } }else{ echo ''; } ?>
                                            </tbody>
                                        </table>
                                    </div>

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
                            </div>
                        </div>
                    </div>
                    <!-- end container -->

                    <div class="footer">
                        <div class="pull-right hidden-xs">
                            Project Completed <strong class="text-custom">39%</strong>.
                        </div>
                        <div>
                            <strong>Simple Admin</strong> - Copyright &copy; 2017
                        </div>
                    </div> <!-- end footer -->

                </div>
                <!-- End #page-right-content -->
        </div>
        <!-- end .page-contentbar -->
    </div>
    <!-- End #page-wrapper -->

		<!--Main-->
    <script src="<?php echo base_url('assets/js/jquery-2.1.4.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/metisMenu.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.slimscroll.min.js'); ?>"></script>

    <!--Morris Chart-->
		<script src="<?php echo base_url('assets/plugins/morris/morris.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/plugins/raphael/raphael-min.js'); ?>"></script>

    <!-- Dashboard init -->
		<script src="<?php echo base_url('assets/pages/jquery.dashboard.js'); ?>"></script>

    <!-- App Js -->
    <script src="<?php echo base_url('assets/js/jquery.app.js'); ?>"></script>
    <script src="<?php echo base_url('js/wow.min.js'); ?>"></script>
		<script src="<?php echo base_url('js/theme.js'); ?>"></script>

	</body>
</html>
