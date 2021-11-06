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
		<title><?php echo $this->session->userdata('uname'); ?> Profile || Auto Club</title>

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
                            <div class="col-md-12">
                                <div class="p-0 text-center">
                                    <div class="member-card">
                                        <div class="thumb-xl member-thumb m-b-10 center-block">
                                          <?php if(!empty($userdp)){ ?>
                                            <img style="height: 120px; width: 200px;" src="<?php echo base_url('uploads/profile/'.$usrow->image); ?>" alt="<?php echo $usrow->firstname; ?>" class="img-circle img-thumbnail" alt="profile-image">
                                          <?php }else{ echo ''; } ?>
                                            <i class="mdi mdi-star-circle member-star text-success" title="verified user"></i>
                                        </div>

                                        <?php if(!empty($userdp)){ ?>
                                        <div class="">
                                            <h4 class="m-b-5"><?php echo $usrow->firstname; ?> <?php echo $usrow->surname; ?></h4>
                                        </div>
                                      <?php }else{ echo ''; } ?>

                                    </div>

                                </div> <!-- end card-box -->

                            </div> <!-- end col -->
                        </div> <!-- end row -->

                        <div class="m-t-30">
                            <ul class="nav nav-tabs tabs-bordered">
                                <li class="active">
                                    <a href="#home-b1" data-toggle="tab" aria-expanded="true">
                                        Profile
                                    </a>
                                </li>
                                <li class="">
                                    <a href="#profile-b1" data-toggle="tab" aria-expanded="false">
                                        Profile Settings
                                    </a>
                                </li>
                                <li class="">
                                    <a href="#shipping-b1" data-toggle="tab" aria-expanded="true">
                                        Shipping Settings
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="home-b1">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <!-- Personal-Information -->
                                            <div class="panel panel-default panel-fill">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Personal Information</h3>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="m-b-20">
                                                        <strong>Full Name</strong>
                                                        <br>
                                                        <?php if(!empty($userdp)){ ?>
                                                        <p class="text-muted"><?php echo $usrow->firstname; ?> <?php echo $usrow->surname; ?></p>
                                                      <?php }else{ echo ''; } ?>
                                                    </div>
                                                    <div class="m-b-20">
                                                        <strong>Email</strong>
                                                        <br>
                                                        <?php if(!empty($userdp)){ ?>
                                                        <p class="text-muted"><?php echo $usrow->email; ?></p>
                                                      <?php }else{ echo ''; } ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Personal-Information -->

                                        </div>


                                        <div class="col-md-8">
                                            <!-- Personal-Information -->
                                            <div class="panel panel-default panel-fill">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Shipping Address</h3>
                                                </div>
                                            </div>
                                            <!-- Personal-Information -->

                                            <?php if(!empty($shipdp)){ foreach($shipdp as $shiprow){} ?>

                                            <!-- Personal-Information -->
                                            <div class="panel panel-default panel-fill">
                                                <div class="panel-body">
                                                  <div class="m-b-20">
                                                     <strong>Business Name</strong>
                                                     <br>
                                                     <p class="text-muted"><?php echo $shiprow->businessname; ?></p>
                                                 </div>
                                                  <div class="m-b-20">
                                                     <strong>Telephone Number</strong>
                                                     <br>
                                                     <p class="text-muted"><?php echo $shiprow->telephone; ?></p>
                                                 </div>
                                                    <div class="m-b-20">
                                                        <strong>Address 1</strong>
                                                        <br>
                                                        <p class="text-muted"><?php echo $shiprow->address1; ?></p>
                                                    </div>
                                                    <div class="m-b-20">
                                                        <strong>Address 2</strong>
                                                        <br>
                                                        <p class="text-muted"><?php echo $shiprow->address2; ?></p>
                                                    </div>
                                                    <div class="m-b-20">
                                                        <strong>Province</strong>
                                                        <br>
                                                        <p class="text-muted"><?php echo $shiprow->province; ?></p>
                                                    </div>
                                                    <div class="m-b-20">
                                                        <strong>PostCode</strong>
                                                        <br>
                                                        <p class="text-muted"><?php echo $shiprow->postcode; ?></p>
                                                    </div>
                                                     <div class="m-b-20">
                                                        <strong>State</strong>
                                                        <br>
                                                        <p class="text-muted"><?php echo $shiprow->state; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                          <?php }else{ echo ''; } ?>
                                            <!-- Personal-Information -->
                                        </div>

                                    </div>
                                </div>
                                <div class="tab-pane" id="profile-b1">
                                    <!-- Personal-Information -->
                                    <div class="panel panel-default panel-fill">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Edit Profile</h3>
                                        </div>
                                        <div class="panel-body">
                                            <form action="<?php echo base_url('user/update_profile'); ?>" method="POST" enctype="multipart/form-data" role="form">
                                                <div class="form-group">
                                                    <label for="FullName">First Name</label>
                                                    <?php if(!empty($userdp)){ ?>
                                                    <input type="text" name="firstname" value="<?php echo $usrow->firstname; ?>" class="form-control">
                                                  <?php }else{ echo '';} ?>
                                                    <span class="text-danger"><?php echo form_error('firstname'); ?></span>
                                                </div>
                                                <div class="form-group">
                                                    <label for="FullName">Last Name</label>
                                                    <?php if(!empty($userdp)){ ?>
                                                    <input type="text" name="surname" value="<?php echo $usrow->surname; ?>" class="form-control">
                                                  <?php }else{ echo ''; } ?>
                                                    <span class="text-danger"><?php echo form_error('surname'); ?></span>
                                                </div>
                                          <br>

                                                <button class="btn btn-primary waves-effect waves-light w-md" type="submit" name="updateProfile">Save</button>
                                                <?php echo $this->session->flashdata('msgError'); ?>
                                            </form>

                                        </div>

                                        <div class="panel-heading">
                                            <h3 class="panel-title">Choose Display Picture</h3>
                                        </div>
                                        <div class="panel-body">
                                            <form action="<?php echo base_url('user/do_upload'); ?>" method="POST" enctype="multipart/form-data" role="form">
                                                <div class="row">
                                              <div class="col-md-6">
                                                 <div class="form-group m-b-0">
                                                  <label class="control-label">Choose Display Picture</label>
                                                  <input type="file" name="fileToUpload" class="filestyle" data-buttonname="btn-primary">
                                              </div>
                                            </div>
                                          </div>

                                          <?php echo $this->session->flashdata('msg'); ?>
                                          <?php echo $this->session->flashdata('msgError'); ?>

                                          <br>

                                                <button class="btn btn-primary waves-effect waves-light w-md" type="submit" name="userSubmit">Save</button>
                                            </form>

                                        </div>
                                    </div>
                                    <!-- Personal-Information -->
                                </div>

                                <div class="tab-pane" id="shipping-b1">
                                    <!-- Personal-Information -->
                                    <div class="panel panel-default panel-fill">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Edit Shipping Address</h3>
                                        </div>
                                        <div class="panel-body">
                                            <form action="<?php echo base_url('user/update_shipping'); ?>" method="POST" role="form">
                                              <div class="form-group">
                                                  <label for="Business Name">Business Name</label>
                                                  <?php if(!empty($shipdp)){ ?>
                                                  <input type="text" name="businessname" value="<?php echo $shiprow->businessname; ?>" class="form-control">
                                                <?php }else{ echo ''; } ?>
                                                  <span class="text-danger"><?php echo form_error('businessname'); ?></span>
                                              </div>
                                              <div class="form-group">
                                                  <label for="Telephone">Telephone</label>
                                                  <?php if(!empty($shipdp)){ ?>
                                                  <input type="text" name="telephone" value="<?php echo $shiprow->telephone; ?>" class="form-control">
                                                <?php }else{ echo ''; } ?>
                                                  <span class="text-danger"><?php echo form_error('telephone'); ?></span>
                                              </div>
                                                <div class="form-group">
                                                    <label for="Address 1">Address 1</label>
                                                    <?php if(!empty($shipdp)){ ?>
                                                    <input type="text" name="address1" value="<?php echo $shiprow->address1; ?>" class="form-control">
                                                  <?php }else{ echo ''; } ?>
                                                    <span class="text-danger"><?php echo form_error('address1'); ?></span>
                                                </div>
                                                <div class="form-group">
                                                    <label for="Address 2">Address 2</label>
                                                    <?php if(!empty($shipdp)){ ?>
                                                    <input type="text" name="address2" value="<?php echo $shiprow->address2; ?>" class="form-control">
                                                  <?php }else{ echo ''; } ?>
                                                    <span class="text-danger"><?php echo form_error('address2'); ?></span>
                                                </div>

                                                <div class="form-group">
                                                    <label for="Province">Province</label>
                                                    <?php if(!empty($shipdp)){ ?>
                                                    <input type="text" name="province" value="<?php echo $shiprow->province; ?>" class="form-control">
                                                  <?php }else{ echo ''; } ?>
                                                    <span class="text-danger"><?php echo form_error('province'); ?></span>
                                                </div>

                                                <div class="form-group">
                                                    <label for="PostCode">PostCode</label>
                                                    <?php if(!empty($shipdp)){ ?>
                                                    <input type="text" name="postcode" value="<?php echo $shiprow->postcode; ?>" class="form-control">
                                                  <?php }else{ echo ''; } ?>
                                                    <span class="text-danger"><?php echo form_error('postcode'); ?></span>
                                                </div>

                                                <div class="form-group">
                                                    <label for="State">State</label>
                                                    <select name="state" class="form-control select2">
                                                      <option>Select</option>
                                                      <option value="Aba">Aba</option>
                                                      <option value="Abuja">Abuja</option>
                                                      <option value="Delta">Delta</option>
                                                      <option value="Enugu">Enugu</option>
                                                      <option value="Kaduna">Kaduna</option>
                                                      <option value="Kano">Kano</option>
                                                      <option value="Lagos">Lagos</option>
                                                      <option value="Port Harcout">Port Harcout</option>
                                                      <option value="Sokoto">Sokoto</option>
                                                    </select>
                                                    <span class="text-danger"><?php echo form_error('state'); ?></span>
                                                </div>

                                                <button class="btn btn-primary waves-effect waves-light w-md" type="submit">Save</button>
                                            </form>
                                            <?php echo $this->session->flashdata('fail'); ?>
                                        </div>
                                    </div>
                                    <!-- Personal-Information -->
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

                <script src="<?php echo base_url('assets/js/check-length.js'); ?>"></script>
                <script src="<?php echo base_url('assets/js/dynamic-product-form.js'); ?>"></script>

              </body>
            </html>
