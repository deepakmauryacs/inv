<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
             <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <h4> Password </h4>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item active"> Password </li>
                            </ol>
                    </div>
                </div>
            </div>
            <!-- end page title -->
      <div class="row justify-content-md-center" >
         <div class="col-lg-8">
            <div class="card">
               <div class="card-body">
                  <h4 class="header-title" style="font-size: 20px;color: red;font-family: 'Poppins';">Profile</h4>
                  <hr>
                  <form action="<?php echo base_url('Admin/Dashboard/update_password');?>" method="post"  class="custom-validation" enctype="multipart/form-data">

                       <div class="form-group mb-3">
                           <label>Password: </label>
                           <input type="text" class="form-control"  name="password" required>
                           <input type="hidden" class="form-control" 
                              value="<?php echo $data->id ; ?>" name="id" />
                        </div>
                        
                        <div class="form-group mb-3">
                           <label>New Password: </label>
                           <input type="text" class="form-control"  name="new_password" required>
                        </div>

                         <div class="form-group mb-3">
                           <label>Confirm Password: </label>
                           <input type="text" class="form-control"  name="con_password" required>
                        </div>

                     <div class="form-group mb-3">
                        <div>
                           <button type="submit" class="btn btn-primary mr-1 waves-effect waves-light">
                           Submit
                           </button>
                        </div>
                     </div>
                  </form>
               </div>
               <!-- end card-box -->
            </div>
            <!-- end col-->
         </div>
      </div>
      <!-- end row -->
   </div>
  </div>
</div>
<!-- content