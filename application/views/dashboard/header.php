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
      <link href="<?php echo base_url(); ?>assets/admin/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
      <!-- DataTables -->
      <link href="<?php echo base_url(); ?>assets/admin/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url(); ?>assets/admin/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
      <!-- Responsive datatable examples -->
      <link href="<?php echo base_url(); ?>assets/admin/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
      <!-- Bootstrap Css -->
      <link href="<?php echo base_url(); ?>assets/admin/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
      <!-- Icons Css -->
      <link href="<?php echo base_url(); ?>assets/admin/css/icons.min.css" rel="stylesheet" type="text/css" />
      <!-- App Css-->
      <link href="<?php echo base_url(); ?>assets/admin/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
      <script src="<?php echo base_url(); ?>assets/admin/libs/jquery/jquery.min.js"></script>
      <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <link rel="stylesheet" href="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.css" />
      <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
      <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
      <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
   </head>
   <body data-sidebar="dark">
      <!-- <body data-layout="horizontal" data-topbar="colored"> -->
      <!-- Begin page -->
      <div id="layout-wrapper">
      <header id="page-topbar">
         <div class="navbar-header">
            <div class="d-flex">
               <!-- LOGO -->
               <div class="navbar-brand-box">
                  <a href="<?php echo base_url(); ?>Admin/Dashboard" class="logo logo-dark">
                  <span class="logo-sm">
                  <img src="<?php echo base_url(); ?>assets/admin/images/side_logo.jpg" style="height: 50px;width: 135px;" alt="" >
                  </span>
                  <span class="logo-lg">
                  <img src="<?php echo base_url(); ?>assets/admin/images/side_logo.jpg" style="height: 50px;width: 135px;"  alt="" >
                  </span>
                  </a>
                  <a href="<?php echo base_url(); ?>Admin/Dashboard" class="logo logo-light">
                  <span class="logo-sm">
                  <img src="<?php echo base_url(); ?>assets/admin/images/side_logo.jpg" style="height: 50px;width: 135px;" alt="" >
                  </span>
                  <span class="logo-lg">
                  <img src="<?php echo base_url(); ?>assets/admin/images/side_logo.jpg" style="height: 50px;width: 135px;" alt="">
                  </span>
                  </a>
               </div>
               <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect vertical-menu-btn">
               <i class="mdi mdi-menu"></i>
               </button>
               
               <!-- App Search-->
                <form class="app-search d-none d-lg-block" method="post" action="<?php echo base_url();  ?>Admin/Product/all">
                    <div class="position-relative">
                        <input type="text" class="form-control" name="search_product" placeholder="Search Product..." >
                        <span class="bx bx-search-alt"></span>
                        <!--<input type="submit" class="btn btn-primary" >-->
                    </div>
                </form>
            </div>
            
            <div class="d-flex">
               <div class="dropdown d-inline-block d-lg-none ms-2">
                  <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                     data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="mdi mdi-magnify"></i>
                  </button>
                  <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                     aria-labelledby="page-header-search-dropdown">
                     <form class="p-3">
                        <div class="form-group m-0">
                           <div class="input-group">
                              <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                              <div class="input-group-append">
                                 <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                              </div>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
               
               <div class="dropdown d-none d-lg-inline-block">
                  <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                  <i class="mdi mdi-fullscreen font-size-24"></i>
                  </button>
               </div>
                
               <div class="dropdown d-inline-block">
                  <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                     data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <img class="rounded-circle header-profile-user" src="<?php echo base_url(); ?>assets/admin/images/users/user-4.jpg"
                     alt="Header Avatar">
                  </button>
                  <div class="dropdown-menu dropdown-menu-end">
                     <!-- item-->
                     <a class="dropdown-item" href="<?php echo base_url(); ?>Admin/Dashboard/profile"><i class="mdi mdi-account-circle font-size-17 text-muted align-middle me-1"></i> Profile</a>
                     <a class="dropdown-item d-block" href="<?php echo base_url(); ?>Admin/Dashboard/password"><span class="badge bg-success float-end">1</span><i class="mdi mdi-cog font-size-17 text-muted align-middle me-1"></i> Settings</a>
                     <div class="dropdown-divider"></div>
                     <a class="dropdown-item text-danger" href="<?php echo base_url();   ?>Login/logout"><i class="mdi mdi-power font-size-17 text-muted align-middle me-1 text-danger"></i> Logout</a>
                  </div>
               </div>
            </div>
         </div>
      </header>
      <!-- ========== Left Sidebar Start ========== -->
      <div class="vertical-menu">
         <div data-simplebar class="h-100">
            <!--- Sidemenu -->
            <div id="sidebar-menu">
               <!-- Left Menu Start -->
               <ul class="metismenu list-unstyled" id="side-menu">
                  <li class="menu-title">Main</li>
                  <li>
                     <a href="<?php echo base_url();  ?>Admin/Dashboard" class="waves-effect">
                     <i class="mdi mdi-view-dashboard"></i>
                     <span>Dashboard</span>
                     </a>
                  </li>
                  <li>
                     <a href="<?php echo base_url();  ?>Admin/Company/all" class="waves-effect">
                     <i class="mdi mdi-buffer"></i>
                     <span>Manage Company</span>
                     </a>
                  </li>
                  <li>
                     <a href="javascript: void(0);" class="has-arrow waves-effect">
                     <i class="mdi mdi-buffer"></i>
                     <span>Product</span>
                     </a>
                     <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?php echo base_url();  ?>Admin/Product">Add Product</a></li>
                        <li><a href="<?php echo base_url();  ?>Admin/Product/all">Manage Product</a></li>
                     </ul>
                  </li>
                  <li>
                     <a href="<?php echo base_url();  ?>Admin/Associate/all" class="waves-effect">
                     <i class="mdi mdi-buffer"></i>
                     <span>Manage Associate</span>
                     </a>
                  </li>
                  <li>
                     <a href="javascript: void(0);" class="has-arrow waves-effect">
                     <i class="mdi mdi-buffer"></i>
                     <span>Items</span>
                     </a>
                     <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?php echo base_url();  ?>Admin/Issue_items">
                           Issue Items</a>
                        </li>
                        <li><a href="<?php echo base_url();  ?>Admin/Issue_items/all">
                           Issue Items List</a>
                        </li>
                        <li><a href="<?php echo base_url();  ?>Admin/Return_items">
                           Return Items</a>
                        </li>
                        <li><a href="<?php echo base_url();  ?>Admin/Return_items/all">
                           Return Items List</a>
                        </li>
                     </ul>
                  </li>
                  <li>
                     <a href="javascript: void(0);" class="has-arrow waves-effect">
                     <i class="mdi mdi-buffer"></i>
                     <span>Return To Company</span>
                     </a>
                     <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?php echo base_url();  ?>Admin/Returnto_company">
                           Return To Company</a>
                        </li>
                        <li><a href="<?php echo base_url();  ?>Admin/Returnto_company/all">
                           Issue Items List</a>
                        </li>
                     </ul>
                  </li>

                  <li>
                     <a href="javascript: void(0);" class="has-arrow waves-effect">
                     <i class="mdi mdi-buffer"></i>
                     <span>Inventory</span>
                     </a>
                     <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?php echo base_url();  ?>Admin/Available_items">
                        Available Items</a>
                        </li>

                        <li><a href="<?php echo base_url();  ?>Admin/Associate_report">
                        Associate Report</a>
                        </li>

                        
                     </ul>
                  </li>

               </ul>
            </div>
            <!-- Sidebar -->
         </div>
      </div>
      <!-- Left Sidebar End -->
     <?php
      if(empty($this->session->userdata('AdminData'))){
         redirect(base_url() . 'Login');
      }
    ?>