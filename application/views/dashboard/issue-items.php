<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">
<div class="page-content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-12">
            <div class="page-title-box">
               <h4> Issue Items </h4>
               <ol class="breadcrumb m-0">
                  <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                  <li class="breadcrumb-item active"> Issue Items </li>
               </ol>
            </div>
         </div>
      </div>
      <!-- end page title -->

   


      <!-- end row -->
      <div class="row d-flex justify-content-center">
         <div class="col-xl-12">
            <div class="card">
               <div class="card-body">
                  <div class="head d-flex justify-content-between align-items-center mb-4">
                     <h4 class="card-title">Issue Items</h4>
                     <a  href="<?php  echo base_url('Admin/Issue_items/all') ?>" style="border-radius: 0px;" class="btn btn-primary waves-effect waves-light">Go Back</a>
                  </div>
                  <hr>
                  
                  <form id="forms" class="custom-validation"  method="POST"> 
                     <?php // print_r($edit_items); ?>
                   <div class="row"> 
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Select Associate</label>
                        <input type="hidden" name="edit_id" value="<?php if(!empty($edit_items)) echo($edit_items->id) ?>" class="form-control">
                        <select class="form-control select2"  name="asscociate_name" required>
                           <option value=""> Select Associate </option>
                           <?php
                              foreach ($associate as  $row) 
                              { 
                              ?>
                           <option  <?php if( !empty($edit_items) && $row->id == $edit_items->asscociate_name){ echo 'selected="selected"'; } ?>    value="<?php echo $row->id; ?>"><?php echo $row->asscociate_name;  ?></option>
                           <?php
                              }
                             ?>
                        </select>
                     </div>

                     <div class="col-md-6 mb-3">
                        <label class="form-label">Product Type</label>
                        <select class="form-control"  name="product_type"  onchange="get_product(this.value)"  required>
                           <option  value="">  Select Product Type </option>
                           <option  <?php if (!empty($edit_items) &&  $edit_items->product_type =='New') {echo 'selected="selected"'; } ?> value="New">New</option>
                           <option  <?php if (!empty($edit_items) &&  $edit_items->product_type =='Used') {echo 'selected="selected"'; } ?> value="Used">Used</option>
                           <option <?php if (!empty($edit_items) &&  $edit_items->product_type =='Defected') {echo 'selected="selected"'; } ?>  value="Defected">Defected</option>
                        </select>
                     </div>

                     
                     <div class="col-md-6 mb-3">
                     <label class="form-label">Select Product</label>
                        <select class="form-control select2"  name="product_name" id="productlist" onchange="get_qty(this.value,`<?php if(!empty($edit_items)) echo($edit_items->quantity); else echo "0" ?>`);" required>
                           <option value="">  Select Product </option>
                           <?php
                             foreach ($product as  $row) 
                              { 
                              ?>
                           <option  <?php if( !empty($edit_items) && $row->id == $edit_items->product_name){ echo 'selected="selected"'; } ?>    value="<?php echo $row->id; ?>"><?php echo $row->product_name; ?></option>
                           <?php
                              }
                             ?>
                        </select>
                     </div>

                     <div class="col-md-6 mb-3">
                     <label class="form-label">Available Quantity</label>
                        <select class="form-control"  name="available_quantity"  id="get_qtys">
                           <option value="0" disabled  selected="selected"> Select Product Know Available Quantity </option>
                        </select>
                     </div>


                    
                    
                    
                     <div class="col-md-6 mb-3">
                        <label class="form-label">Quantity</label>
                        <input type="number" name="quantity" value="<?php if(!empty($edit_items)) echo($edit_items->quantity) ?>" class="form-control"  placeholder="Quantity" required>
                     </div>

                     <div class="col-md-6 mb-3">
                        <label class="form-label"> Issue Date </label>
                        <input type="date" name="issue_date"  value="<?php if(!empty($edit_items)) echo($edit_items->issue_date) ?>" class="form-control"   required>
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
                   url: '<?php echo base_url('Admin/Issue_items/add');?>',
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
                       setTimeout(function(){ window.location = "<?php echo base_url('Admin/Issue_items/all');?>"; }, 1000);
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


<script type="text/javascript">
   function get_qty(product_id,issue_qty)
   {
      $.ajax({
                type: "POST",
                url: '<?php echo base_url();?>Admin/Issue_items/get_productqty',
                data: {product_id:product_id,issue_qty:issue_qty}, // serializes the form's elements.
                beforeSend:function()
                {},
               success:function(responce)
                {
                 $('#get_qtys').html(responce);
                },
               error:function()
               {
                 alert('Error'); 
               },
               complete:function()
               {}
             }); 
   }
</script>


<script type="text/javascript">
   function get_product(product_type)
   {
      $.ajax({
                type: "POST",
                url: '<?php echo base_url();?>Admin/Issue_items/get_product',
                data: {product_type:product_type}, // serializes the form's elements.
                beforeSend:function()
                {},
                success:function(responce)
                {
                 $('#productlist').html(responce);
                },
                error:function()
                {
                 alert('Error'); 
                },
                complete:function()
                {}
             }); 
   }
</script>

