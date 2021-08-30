<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">
<div class="page-content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-12">
            <div class="page-title-box">
               <h4>Service Category</h4>
               <ol class="breadcrumb m-0">
                  <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                  <li class="breadcrumb-item active">Service Category</li>
               </ol>
            </div>
         </div>
      </div>
      <!-- end page title -->
      <!-- end row -->
      <div class="row">
         <div class="col-xl-6">
            <div class="card">
               <div class="card-body">
                  <h4 class="card-title">Service Category</h4>
                  <form id="forms" class="custom-validation"  method="POST">
                     <div class="mb-3">
                        <label class="form-label">Category</label>
                        <input type="text" name="category"  value="<?php if(!empty($edit_category)) echo( $edit_category->category) ?>"  class="form-control" required placeholder="Category"/>
                        <input type="hidden" class="form-control" name="edit_id" required value="<?php if(!empty($edit_category)) echo( $edit_category->id) ?>">
                     </div>
                     <div class="mb-3">
                        <label class="form-label">Slug</label>
                        <input type="text" name="slug" value="<?php if(!empty($edit_category)) echo($edit_category->slug) ?>" class="form-control" required placeholder="Slug"/>
                     </div>
                     <div class="mb-0">
                        <div>
                           <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                           Submit
                           </button>
                           <button type="reset" class="btn btn-secondary waves-effect">
                           Cancel
                           </button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
         <!-- end col -->
         <div class="col-xl-6">
            <div class="card">
               <div class="card-body">
                  <h4 class="card-title">Service Category List</h4>
                  <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                     <thead>
                        <tr>
                           <th>S.No</th>
                           <th>Category</th>
                           <th>Slug</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                           if(!empty($service_category)){
                             $i=1;
                             foreach ($service_category as $row) {
                           
                           ?>
                        <tr>
                           <td><?php  echo $i++; ?></td>
                           <td><?php  echo $row->category; ?></td>
                           <td><?php  echo $row->slug; ?></td>
                           <td>
                              <a  href="<?php echo base_url('Admin/Service_category/index') ?>/<?php echo $row->id; ?>" style="border-radius: 0px;" class="btn btn-secondary" ><i class="fas fa-edit"></i></a>
                              <a name="delete"  href="<?php echo base_url('Admin/Service_category/delete_category') ?>/<?php echo $row->id; ?>" onclick="return confirm('Are you sure you want to delete?');"    class="btn btn-xs btn-danger delete" style="border-radius: 0px;"> 
                              <i class="fas fa-trash-alt"></i></a>
                           </td>
                        </tr>
                        <?php
                           }
                           }
                           ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
         <!-- end col -->
      </div>
      <!-- end row -->
   </div>
   <!-- container-fluid -->
</div>
<!-- End Page-content -->
</div>
<script>
   $("#forms").submit(function(event) {
           event.preventDefault();
           $.ajax({
                   type: "POST", 
                   url: '<?php echo base_url('Admin/Service_category/add');?>',
                   dataType:'json',
                   data: new FormData(this), 
                   contentType: false,
                   cache: false,
                   processData:false,
                   beforeSend:function()
                   {},
                   success:function(responce)
                   {
                     if(responce.status==0)
                     {
                    
                      toastr.error(responce.message);
                     }else if(responce.status==1)
                     {
   
                       toastr.success(responce.message);
                       window.location.href= '<?php echo base_url('Admin/Service_category');?>';
                       
                      
                     }  
                   },
                   error:function()
                   {
                     toastr.error('Something Went Wrong..');
                   },
                   complete:function()
                   {
                   }
               });
       })
</script>