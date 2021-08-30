<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">
<div class="page-content">
   <div class="container-fluid">
      <!-- start page title -->
      <div class="row">
         <div class="col-sm-12">
            <div class="page-title-box">
               <h4>Dashboard</h4>
               <ol class="breadcrumb m-0">
                  <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                  <li class="breadcrumb-item active">Dashboard</li>
               </ol>
            </div>
         </div>
      </div>
      <!-- end page title -->
      <div class="row">
         <div class="col-xl-3 col-sm-6">
            <div class="card mini-stat bg-primary">
               <div class="card-body mini-stat-img">
                  <div class="mini-stat-icon">
                     <i class="mdi mdi-cube-outline float-end"></i>
                  </div>
                  <div class="text-white">
                     <h6 class="text-uppercase mb-3 font-size-12 text-white">Total <br> Company</h6>
                     <h2 class="mb-4 text-white"><?php echo $this->db->count_all('tbl_services'); ?></h2>
                     
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xl-3 col-sm-6">
            <div class="card mini-stat bg-primary">
               <div class="card-body mini-stat-img">
                  <div class="mini-stat-icon">
                     <i class="mdi mdi-cube-outline float-end"></i>
                  </div>
                  <div class="text-white">
                     <h6 class="text-uppercase mb-3 font-size-12 text-white">Total <br> 
                        Available Items</h6>
                     <h2 class="mb-4 text-white">
                     <?php 
                     echo $this->db->select_sum('quantity')->get('tbl_product')->row()->quantity;  
                     ?>
                    
                  
                  </h2>
                    
                  </div>
               </div>
            </div>
         </div>

         <div class="col-xl-3 col-sm-6">
            <div class="card mini-stat bg-primary">
               <div class="card-body mini-stat-img">
                  <div class="mini-stat-icon">
                     <i class="mdi mdi-cube-outline float-end"></i>
                  </div>
                  <div class="text-white">
                     <h6 class="text-uppercase mb-3 font-size-12 text-white">Total <br> 
                        Issue Items</h6>
                     <h2 class="mb-4 text-white">
                     <?php 
                         echo $this->db->select_sum('quantity')->get('tbl_issue_items')->row()->quantity;  
                       ?>
                     </h2>
                    
                  </div>
               </div>
            </div>
         </div>


         <div class="col-xl-3 col-sm-6">
            <div class="card mini-stat bg-primary">
               <div class="card-body mini-stat-img">
                  <div class="mini-stat-icon">
                    <i class="mdi mdi-cube-outline float-end"></i>
                  </div>
                  <div class="text-white">
                     <h6 class="text-uppercase mb-3 font-size-12 text-white">Total <br>  Associate </h6>
                     <h2 class="mb-4 text-white"><?php echo $this->db->count_all('tbl_articles'); ?></h2>
                  </div>
               </div>
            </div>
         </div>
        
      </div>
      <!-- end row -->
   </div>
   <!-- container-fluid -->
</div>
<!-- End Page-content -->
</div>