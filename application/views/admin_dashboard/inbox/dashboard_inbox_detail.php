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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <?php foreach($inbox_detail as $inbdrow){} ?>
	<title><?php echo str_replace('-', ' ', $inbdrow->title); ?> || Admin Your Engine Parts || No 1 Nigeria Industrial Spare Parts</title>

	<!-- Favicon -->
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="icon" href="favicon.ico" type="image/x-icon">

	<!-- Bootstrap Wysihtml5 css -->
	<link rel="stylesheet" href="<?php echo base_url('vendors/bower_components/bootstrap3-wysihtml5-bower/dist/bootstrap3-wysihtml5.css'); ?>" />

	<!-- Custom CSS -->
	<link href="<?php echo base_url('dist/css/style.css'); ?>" rel="stylesheet" type="text/css">

</head>

<body>
	<!--Preloader
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
                <a href="<?php echo site_url('admin/orders'); ?>">Orders</a>
              </li>
            </ul>
          </li>

          <li>
            <a class="active" href="javascript:void(0);" data-toggle="collapse" data-target="#app_dr"><i class="icon-grid mr-10"></i>Mail
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
      					  <h5 class="txt-light">View <?php echo $inbdrow->title; ?> Inbox Detail</h5>
      					</div>
      					<!-- Breadcrumb -->
      					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
      					  <ol class="breadcrumb">
      						<li><a href="<?php echo site_url('admin'); ?>">Dashboard</a></li>
                  <li><a href="#">Mail</a></li>
      						<li><a href="<?php echo site_url('admin/inbox'); ?>"><span>Inbox</span></a></li>
      						<li class="active"><span><?php echo $inbdrow->title; ?></span></li>
      					  </ol>
      					</div>
      					<!-- /Breadcrumb -->
				</div>
				<!-- /Title -->

        <?php foreach($user_inbox as $usirow){} ?>

				<!-- Row -->
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default card-view">
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="mail-box">
										<div class="row">
											<aside class="col-md-3">
                        <div class="user-head text-center">
													<a class="inbox-avatar block" href="javascript:;">
													<img style="height:70px; width:90px;" src="<?php echo base_url('uploads/profile/'.$usirow->image); ?>" alt="<?php echo $usirow->firstname; ?> <?php echo $usirow->surname; ?>"/>
													</a>
													<div class="user-name">
														<h5><a href="#"><?php echo $usirow->firstname; ?> <?php echo $usirow->surname; ?></a></h5>
														<span><a href="#"><?php echo $usirow->email; ?></a></span>
													</div>
												</div>
												<div class="clearfix"></div>

                        <div class="mb-40">
													<a href="#myModal" data-toggle="modal" title="Compose" class="btn btn-success btn-block  mt-30">
													Reply
                        </a>
													<!-- Modal -->
													<div aria-hidden="true" role="dialog" tabindex="-1" id="myModal" class="modal fade" style="display: none;">
														<div class="modal-dialog">
															<div class="modal-content">
																<div class="modal-header">
																	<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
																	<h4 class="modal-title">Reply Mail</h4>
																</div>
																<div class="modal-body">
																	<form action="#" method="POST" role="form" class="form-horizontal">
																		<div class="form-group">
																			<label class="col-lg-2 control-label">To</label>
																			<div class="col-lg-10">
																				<input type="text" placeholder="" name="reply_email" value="<?php echo $inbdrow->email; ?>" id="inputEmail1" class="form-control">
																			</div>
																		</div>
																		<div class="form-group">
																			<label class="col-lg-2 control-label">Subject</label>
																			<div class="col-lg-10">
																				<input type="text" placeholder="" name="subject" id="inputPassword1" class="form-control">
																			</div>
																		</div>
																		<div class="form-group">
																			<label class="col-lg-2 control-label">Message</label>
																			<div class="col-lg-10">
																				<textarea class="textarea_editor form-control" rows="15" placeholder="Enter text ..." name="message"></textarea>
																			</div>
																		</div>
																		<div class="form-group">
																			<div class="col-lg-offset-2 col-lg-10">
																				<button class="btn btn-success" type="submit" name="reply">Reply</button>
																			</div>
																		</div>
																	</form>
																</div>
															</div>
															<!-- /.modal-content -->
														</div>
														<!-- /.modal-dialog -->
													</div>
													<!-- /.modal -->
												</div>
                        <ul class="inbox-nav mb-30">
													<li class="active">
														<a href="#"><i class="fa fa-inbox"></i> Inbox
                              <span class="label label-danger pull-right"><?php echo $tot_con_count->contact_count; ?></span>
                            </a>
													</li>
												</ul>
											</aside>
											<aside class="col-md-9">
												<div class="inbox-head  mb-30">
													<div class="row">
														<h3 class="col-sm-3">Inbox</h3>
														<!--<div class="col-sm-offset-4 col-sm-5">
															<form role="search">
																<div class="input-group mb-15">
																	<input type="text" id="example-input1-group21" name="example-input1-group21" class="form-control" placeholder="Search">
																	 <span class="input-group-btn">
																		<button type="button" class="btn  btn-success"><i class="fa fa-search"></i></button>
																	</span>
																</div>
															</form>
														</div>-->
													</div>
												</div>

                        <script>
                          function deleteinbox(id){
                            var del_id = id;
                            if(confirm("Are you sure you want to delete this message")){
                            $.post('<?php echo base_url('admin/delete_inbox'); ?>', {"del_id": del_id}, function(data){
                              window.location.href="<?php echo site_url('admin/inbox'); ?>";
                              $('#cte').html(data)
                              });
                            }
                          }
                        </script>
                        <p id='cte'></p>

                        <?php foreach($inbox_detail as $inbdrow){} ?>

												<div class="inbox-body">
													<div class="heading-inbox">
														<div class="row">
															<div class="col-md-8">
																<div class="compose-btn">
																	<button class="btn btn-sm mr-10" title="Print" type="button" onclick="javascript:window.print();">
                                    <i class="fa fa-print"></i>
                                  </button>
																	<button class="btn btn-sm" type="submit" onclick="deleteinbox(<?php echo $inbdrow->id; ?>)" name="delete" title="Delete">
                                    <i class="fa fa-trash-o"></i>
                                  </button>
																</div>
															</div>
															<div class="col-md-4 text-right">
																<span class="date"><?php echo convertToAgoFormat($inbdrow->created_time); ?></span>
															</div>
                              <br>
                              <div class="col-md-4 text-right">
																<span class="date"><?php echo date("j M Y", strtotime($inbdrow->created_day)); ?></span>
															</div>
														</div>
														<hr class="mt-25 mb-15"/>
														<div class="row">
															<div class="col-md-12 mb-30">
																<h5><?php echo $inbdrow->title; ?></h5>
															</div>
														</div>
													</div>
													<div class="sender-info">
														<div class="row">
															<div class="col-xs-12">
																<div class="sender-img-wrap pull-left mr-20">
																	<img class="sender-img" alt="user" src="<?php echo base_url('uploads/profile/original.jpg'); ?>">
																</div>
																<div class="sender-details pull-left">
																	<span class="capitalize-font pr-5 txt-dark block font-15  head-font"><strong><?php echo $inbdrow->fullname; ?></strong></span>
																	<span class="block">
																		<span>&lt;<?php echo $inbdrow->email; ?>&gt;</span>
																		to
																		<span>me</span>
																	</span>
																</div>
															</div>
														</div>
													</div>
													<div class="view-mail mt-40">
														<p><?php echo $inbdrow->message; ?></p>
													</div>
												</div>
											</aside>
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

	<!-- wysuhtml5 Plugin JavaScript -->
	<script src="<?php echo base_url('vendors/bower_components/wysihtml5x/dist/wysihtml5x.min.js'); ?>"></script>

	<script src="<?php echo base_url('vendors/bower_components/bootstrap3-wysihtml5-bower/dist/bootstrap3-wysihtml5.all.js'); ?>"></script>

	<!-- Bootstrap Wysuhtml5 Init JavaScript -->
	<script src="<?php echo base_url('dist/js/bootstrap-wysuhtml5-data.js'); ?>"></script>

	<!-- Slimscroll JavaScript -->
	<script src="<?php echo base_url('dist/js/jquery.slimscroll.js'); ?>"></script>

	<!-- Fancy Dropdown JS -->
	<script src="<?php echo base_url('dist/js/dropdown-bootstrap-extended.js'); ?>"></script>

	<!-- Init JavaScript -->
	<script src="<?php echo base_url('dist/js/init.js'); ?>"></script>

</body>

</html>
