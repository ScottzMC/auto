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
		<title>Invoice For <?php echo $this->session->userdata('uname'); ?> Profile || Auto Club</title>

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
                                    </a>
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
                            <?php }else{ echo '';} ?>
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

                  <script>
                   function cancelorder(id){
                     var user_id = id;
                     if(confirm("Are you sure you want to cancel the order")){
                     $.post('<?php echo base_url('user/cancel_order'); ?>', {"user_id": user_id}, function(data){
                       location.reload();
                       $('#ct').html(data)
                       });
                     }
                   }
                 </script>
                 <p id='ct'></p>

                    <div class="container">
                    <form action="#" method="POST">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel-body">
                                    <div class="clearfix">
                                        <div class="pull-left">
                                            <img src="assets/images/logo.png" alt="" height="40">
                                        </div>
                                        <div class="pull-right">
                                            <h3 class="m-0">Invoice</h3>
                                        </div>
                                    </div>

                                    <?php if(!empty($shipdp)){ foreach($shipdp as $shiprow){} ?>

                                    <div class="row">
                                        <div class="col-sm-6 col-xs-6">
                                            <div class="pull-left m-t-30">
                                                <p><b>Hello, <?php echo $shiprow->firstname; ?> <?php echo $shiprow->surname; ?></b></p>
                                                <p class="text-muted">Thanks a lot because you keep purchasing our products. Our company
                                                    promises to provide high quality products for you as well as outstanding
                                                    customer service for every transaction. </p>
                                            </div>

                                        </div><!-- end col --><!-- end col -->
                                    </div>
                                    <!-- end row -->

                                    <div class="row m-t-30">
                                        <div class="col-xs-6">
                                            <h5>Billing Address</h5>
                                            <address class="line-h-24">
                                                <?php echo $shiprow->firstname; ?> <?php echo $shiprow->surname; ?><br>
                                                <?php echo $shiprow->address1; ?><br>
                                                <?php echo $shiprow->address2; ?><br>
                                                <?php echo $shiprow->state; ?>, <?php echo $shiprow->province; ?>, <?php echo $shiprow->postcode; ?><br>
                                                <abbr title="Phone">Tel:</abbr> <?php echo $shiprow->telephone; ?>
                                            </address>

                                        </div>
                                    </div>
                                  <?php }else{ echo ''; } ?>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table m-t-30">
                                                    <thead>
                                                        <tr><th>#</th>
                                                        <th>Item</th>
                                                        <th>Quantity</th>
                                                        <th>Unit Cost</th>
                                                        <th class="text-right">Total</th>
                                                        <th class="text-center">Date</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr></thead>
                                                    <tbody>
                                                        <?php if(!empty($invodp)){ foreach($invodp as $invrow){ ?>
                                                          <tr>
                                                              <td><?php echo $invrow->orderid; ?></td>
                                                              <td><b><?php echo str_replace('-', ' ', $invrow->title); ?></b> <br/></td>
                                                              <td><?php echo $invrow->quantity; ?></td>
                                                              <td>&#8358; <?php echo number_format($invrow->price); ?></td>
                                                              <td class="text-right">&#8358; <?php echo number_format($invrow->quantity * $invrow->price); ?></td>
                                                              <td><?php echo date('j M Y', strtotime($invrow->created_day)); ?></td>
                                                              <td>
                                                                <?php if($invrow->status == 'Delivering'){ ?>
                                                                  <big><span class="label label-warning"><?php echo $invrow->status; ?></span></big>
                                                                <?php } else if($invrow->status == 'Cancelled'){ ?>
                                                                    <big><span class="label label-danger"><?php echo 'Cancelled'; ?></span></big>
                                                                <?php }else{ ?>
                                                                    <big><span class="label label-success"><?php echo 'Delivered'; ?></span></big>
                                                              <?php } ?>
                                                              </td>
                                                              <td><button type="button" onclick="cancelorder(<?php echo $invrow->id; ?>)" class="btn btn-danger waves-effect waves-light">Cancel Order</button></td>
                                                          </tr>
                                                  <?php } }else{ echo ''; } ?>
                                                      </tbody>
                                                  </table>
                                              </div>
                                          </div>
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
                                      <div class="row">
                                          <div class="col-md-6 col-sm-6 col-xs-6">
                                              <div class="clearfix p-t-50">
                                                  <h5 class="text-muted">Notes:</h5>

                                                  <small>
                                                      All accounts are to be paid within 7 days from receipt of
                                                      invoice. To be paid by cheque or credit card or direct payment
                                                      online. If account is not paid within 7 days the credits details
                                                      supplied as confirmation of work undertaken will be charged the
                                                      agreed quoted fee noted above.
                                                  </small>
                                              </div>

                                          </div>
                                      </div>

                                      <div class="hidden-print m-t-30 m-b-30">
                                          <div class="text-right">
                                              <a href="javascript:window.print()" class="btn btn-dark waves-effect waves-light"><i class="fa fa-print"></i></a>
                                          </div>
                                      </div>
                                  </div>

                              </div>

                          </div>
                          <!-- end row -->
                      </form>

                      <!--<!?php

                          if(isset($_POST['order_id'])){

                            $order_id = $_POST['order_id'];

                            $a = "SELECT id FROM order_items ";
                            $b = mysqli_query($link,$a);

                            while($right = mysqli_fetch_object($b)){
                              $id = $right -> id;
                            }

                            $new_status = "Cancelled";

                            $sql = "UPDATE order_items SET status = '$new_status' WHERE id = '".$order_id."' ";
                            $run = mysqli_query($link,$sql);

                            if($run){
                            echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                          </button>
                                          <strong>Cancelled My Favorite</strong>.
                                      </div>';
                        }else{
                               echo '<div class="alert alert-danger alert-dismissible fade in" role="alert">
                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                          </button>
                                          <strong>Try</strong> Again.
                                      </div>';
                            }
                          }

                        ?>-->

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
