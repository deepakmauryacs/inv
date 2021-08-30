<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">
   <div class="page-content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-sm-12">
               <div class="page-title-box">
                  <h4> Return Items </h4>
                  <ol class="breadcrumb m-0">
                     <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                     <li class="breadcrumb-item active"> Return Items </li>
                  </ol>
               </div>
            </div>
         </div>
         <!-- end page title -->
         <!-- end row -->
         <div class="row d-flex justify-content-center">
            <div class="col-xl-10">
               <div class="card">
                  <div class="card-body">
                     <div class="head d-flex justify-content-between align-items-center mb-4">
                        <h4 class="card-title"> Return Items </h4>
                        <a  href="<?php  echo base_url('Admin/Returnto_company/all') ?>" style="border-radius: 0px;" class="btn btn-primary waves-effect waves-light">Go Back</a>
                     </div>
                     <hr>
                     <form id="forms" class="custom-validation"  method="POST">
                        <?php // print_r($edit_items); ?>
                        <div class="row">
                           <div class="col-md-6 mb-3">
                              <label class="form-label">Select Product</label>
                              <select class="form-control select2"  name="product_name" required>
                                 <option value="" selected>  Select Product </option>
                                 <?php
                                    foreach ($product as  $row) 
                                    { 
                                    ?>
                                 <option  <?php if(!empty($edit_items) && $row->id == $edit_items->product_name){ echo 'selected="selected"'; } ?>    value="<?php echo $row->id; ?>"><?php echo $row->product_name; ?></option>
                                 <?php
                                    }
                                 ?>
                              </select>
                           </div>
                           <div class="col-md-6 mb-3">
                              <label class="form-label"> Return  Date </label>
                              <input type="date" name="return_date"  value="<?php if(!empty($edit_items)) echo($edit_items->return_date) ?>" class="form-control"   required>
                           </div>
                           <div class="mb-0">
                              <div>
                                 <button type="submit" class="btn btn-primary waves-effect">
                                 Submit
                                 </button>
                              </div>
                           </div>
                        </div>
                     </form>
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
             for ( instance in CKEDITOR.instances )
              {
              CKEDITOR.instances[instance].updateElement();
              }
           $.ajax({
                   type: "POST", 
                   url: '<?php echo base_url('Admin/Returnto_company/add');?>',
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
                       setTimeout(function(){ window.location = "<?php echo base_url('Admin/Returnto_company/all');?>"; }, 1000);
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