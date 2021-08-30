<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
          <div class="row">
             <div class="col-sm-12">
                 <div class="page-title-box">
                     <h4> Profile </h4>
                         <ol class="breadcrumb m-0">
                             <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                             <li class="breadcrumb-item active"> Profile </li>
                         </ol>
                 </div>
             </div>
         </div>
      <div class="row justify-content-md-center" >
         <div class="col-lg-8">
            <div class="card">
               <div class="card-body">
                  <h4 class="header-title" style="font-size: 20px;color: red;font-family: 'Poppins';">Profile</h4>
                  <hr>
                  <form action="<?php echo base_url('Admin/Dashboard/update_profile');?>" method="post"  class="custom-validation" enctype="multipart/form-data">
                     <div class="row">
                        <div class="mb-3 col-md-12">
                           <img src="<?php  echo base_url() ?>uploads/<?php  echo $data->image1 ?>" alt="" class="avatar-sm rounded-circle img-thumbnail">
                        </div>
                        <div class="input-group mb-3 col-md-12">
                           <input type="hidden" name="oldImage1" class="custom-file-input" class="form-control" value="<?php  echo $data->image1 ?>">
                           <input type="file" name="image1"  class="form-control" id="formrow-email-input">
                           <input type="hidden" name="id" value="<?php  echo $data->id ?>"  class="form-control" id="formrow-email-input">
                        </div>
                        <div class="form-group mb-3 col-md-6">
                           <label>Name</label>
                           <input type="text" class="form-control" required
                              value="<?php echo $data->username ; ?>" name="username" />
                          
                        </div>
                        <div class="form-group mb-3 col-md-6">
                           <label>Email</label>
                           <input type="text" class="form-control" required
                              value="<?php echo $data->email ; ?>" name="email" />
                        </div>
                        <div class="form-group mb-3 col-md-6">
                           <label>Contact</label>
                           <input type="text" class="form-control" required
                              value="<?php echo $data->contact ; ?>" name="contact" />
                        </div>
                        <div class="form-group mb-3 col-md-6">
                           <label>Adress</label>
                           <textarea class="form-control" name="address"><?php echo $data->address ; ?></textarea>
                        </div>
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
            </div>
         </div>
      </div>
   </div>
</div>
</div>