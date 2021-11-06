<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Forgot My Password</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="<?php echo base_url('assets/images/small.png'); ?>">

        <!-- Bootstrap core CSS -->
        <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
        <!-- MetisMenu CSS -->
        <link href="<?php echo base_url('assets/css/metisMenu.min.css'); ?>" rel="stylesheet">
        <!-- Icons CSS -->
        <link href="<?php echo base_url('assets/css/icons.css'); ?>" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet">

    </head>


    <body>

        <!-- HOME -->
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">

                        <div class="wrapper-page">

                            <div class="m-t-40 card-box">

                                <div class="account-content">
                                    <div class="text-center m-b-20">
                                        <img src="assets/images/warming.svg" title="invite.svg" height="100" class="m-t-10">
                                          <!--<h3 class="expired-title">
                                            <div class="alert alert-danger">
                                              Your session has expired due to inactivity
                                            </div>
                                          </h3>-->
                                    </div>

                                    <form class="form-horizontal" action="<?php echo base_url('user/login'); ?>" method="POST">

                                        <div class="form-group m-b-20">
                                            <div class="col-xs-12">
                                                <label for="emailaddress">Email address</label>
                                                <input class="form-control"name="email" type="email" id="emailaddress" placeholder="Enter your email">
                                                <span class="text-danger"><?php echo form_error('email'); ?></span>
                                            </div>
                                        </div>

                                        <div class="form-group account-btn text-center m-t-10">
                                            <div class="col-xs-12">
                                                <button class="btn btn-lg btn-primary btn-block" name="login" type="submit">Log In</button>
                                            </div>
                                        </div>

                                    </form>

                                    <div class="clearfix"></div>
                                    <?php echo $this->session->flashdata('error'); ?>
                                </div>
                            </div>
                            <!-- end card-box-->
                        </div>
                        <!-- end wrapper -->

                    </div>
                </div>
            </div>
        </section>
        <!-- END HOME -->



        <!-- js placed at the end of the document so the pages load faster -->
        <script src="<?php echo base_url('assets/js/jquery-2.1.4.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/metisMenu.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/jquery.slimscroll.min.js'); ?>"></script>

        <!-- App Js -->
        <script src="<?php echo base_url('assets/js/jquery.app.js'); ?>"></script>

    </body>
</html>
