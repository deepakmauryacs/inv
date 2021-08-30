<!doctype html>
<html lang="en">
<head>

        <meta charset="utf-8" />
        <title> Inventory Managment System | Dashboard </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/admin/images/favicon.ico"> 
        
        <!-- Bootstrap Css -->
        <link href="<?php echo base_url(); ?>assets/admin/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="<?php echo base_url(); ?>assets/admin/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="<?php echo base_url(); ?>assets/admin/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    </head>

    <body>
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                      <?php if ($this->session->flashdata('error')): ?>
                           <div class="alert alert-danger alert-dismissible fade show" role="alert">
                              <i class="mdi mdi-block-helper me-2"></i>
                              <?php echo $this->session->flashdata('error'); ?>  
                              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>        
                        <?php endif; ?>
                        <div class="card overflow-hidden">
                            <div class="card-body pt-0">
                                 
                                <h3 class="text-center mt-5 mb-4">
                                    <a href="<?php  echo base_url(); ?>Login" class="d-block auth-logo">
                                        <img src="<?php echo base_url() ?>assets/admin/images/inv.jpeg" alt="" style="height: 100px;"  class="auth-logo-dark">
                                        <img src="<?php echo base_url() ?>assets/admin/images/inv.jpeg" alt=""  class="auth-logo-light">
                                    </a>
                                </h3>

                                <div class="p-3">
                                    <h4 class="text-muted font-size-18 mb-1 text-center">Welcome Back !</h4>
                                    <p class="text-muted text-center">Sign in to continue to inventory management system.</p>
                                    <form class="form-horizontal mt-4" action="<?php echo base_url();  ?>Login/adminlogin" method="POST">
                                        <div class="mb-3">
                                            <label for="Contact">Contact Number</label>
                                            <input type="number" class="form-control" name="contact" id="contact" placeholder="Enter Contact Number" autocomplete="off" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="userpassword">Password</label>
                                            <input type="password" class="form-control" name="password" id="password" autocomplete="new-password" placeholder="Enter password" required>
                                        </div>
                                        <div class="mb-3 row mt-4">
                                            <div class="col-6">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="customControlInline">
                                                    <label class="form-check-label" for="customControlInline">Remember me
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-6 text-end">
                                                <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log In</button>
                                            </div>
                                        </div>
                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>

        <!-- JAVASCRIPT -->
        <script src="<?php echo base_url(); ?>assets/admin/libs/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/libs/metismenu/metisMenu.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/libs/simplebar/simplebar.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/libs/node-waves/waves.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/libs/jquery-sparkline/jquery.sparkline.min.js"></script>
        <!-- App js -->
        <script src="<?php echo base_url(); ?>assets/admin/js/app.js"></script>
            <script type="text/javascript">
                toastr.options = {
                              "closeButton": false,
                              "debug": false,
                              "newestOnTop": false,
                              "progressBar": false,
                              "positionClass": "toast-top-right",
                              "preventDuplicates": false,
                              "onclick": null,
                              "showDuration": "300",
                              "hideDuration": "1000",
                              "timeOut": "5000",
                              "extendedTimeOut": "1000",
                              "showEasing": "swing",
                              "hideEasing": "linear",
                              "showMethod": "fadeIn",
                              "hideMethod": "fadeOut"
                          }
           //  Command: toastr["success"]('hello');
           
            <?php if($this->session->flashdata('success')){ ?>
               Command: toastr["success"]('<?php echo $this->session->flashdata('success'); ?>');
            <?php } ?>

            <?php if($this->session->flashdata('error')){ ?>
               Command: toastr["error"]('<?php echo $this->session->flashdata('error'); ?>');
            <?php } ?>

            <?php if($this->session->flashdata('info')){ ?>
               Command: toastr["info"]('<?php echo $this->session->flashdata('info'); ?>');
            <?php } ?>

           
           </script>
    </body>
</html>