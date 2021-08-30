<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">
<div class="page-content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-12">
            <div class="page-title-box">
               <h4> Product </h4>
               <ol class="breadcrumb m-0">
                  <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                  <li class="breadcrumb-item active"> Product </li>
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
                     <h4 class="card-title">Add Product</h4>
                     <a  href="<?php  echo base_url('Admin/Product/all') ?>" style="border-radius: 0px;" class="btn btn-primary waves-effect waves-light">Go Back</a>
                  </div>
                  <hr>
                  
                  <form id="forms" class="custom-validation row"  method="POST"> 
                   <div class="col-12">
                       <label class="form-label">Company</label>
                        <select class="form-control select2" name="company_name">
                           <option value=""> --- Select Company ---</option>
                           <?php
                              if(!empty($company)){
                              foreach ($company as  $row) 
                              { 
                              ?>
                           <option  <?php if(!empty($edit_product) && $row->company_name == $edit_product->company_name){ echo 'selected="selected"'; } ?>    value="<?php echo $row->company_name; ?>"><?php echo $row->company_name;  ?></option>
                           <?php
                              }
                              }
                              ?>
                           
                        </select>
                        <input type="hidden" name="edit_id" value="<?php if(!empty($edit_product)) echo($edit_product->id) ?>" class="form-control" >
                       </div>
                    <div class="col-12">
                    <div class="row after-add-more"> 

                     <div class="col-md-6 mb-3">
                        <label class="form-label">Product Type</label>
                        <select class="form-control"  name="product_type<?php if(empty($edit_product)) echo '[]' ?>">
                           <option  value=""> --- Select Company ---</option>
                           <option  <?php if(!empty($edit_product) && $edit_product->product_type == 'New'){ echo 'selected="selected"'; } ?>  value="New">New</option>
                           <option <?php if(!empty($edit_product) && $edit_product->product_type == 'Used'){ echo 'selected="selected"'; } ?>  value="Used">Used</option>
                           <option <?php if(!empty($edit_product) && $edit_product->product_type == 'Defected'){ echo 'selected="selected"'; } ?> value="Defected">Defected</option>
                        </select>
                     </div>


                     <div class="col-md-6 mb-3">
                        <label class="form-label">Product Name</label>
                        <input type="text" name="product_name<?php if(empty($edit_product)) echo '[]' ?>" value="<?php if(!empty($edit_product)) echo($edit_product->product_name) ?>" class="form-control"  placeholder="Company Name" required>
                        
                     </div>
                    
                     <div class="col-md-6 mb-3">
                        <label class="form-label">Quantity</label>
                        <input type="number" name="quantity<?php if(empty($edit_product)) echo '[]' ?>" value="<?php if(!empty($edit_product)) echo($edit_product->quantity) ?>" class="form-control"  placeholder="Quantity" required>
                     </div>

                     <div class="col-md-6 mb-3">
                        <label class="form-label">Base Price</label>
                        <input type="number" name="base_price<?php if(empty($edit_product)) echo '[]' ?>" id="base_price" value="<?php if(!empty($edit_product)) echo($edit_product->base_price) ?>" 
                        class="form-control"  placeholder="Base Price">
                     </div>


                    <!--<div class="mb-3" style="display: flex;">
                     <div class="mb-3 form-check  s1">
                       <input class="form-check-input sgst " type="checkbox"  id="autoSizingCheck2">
                       <label class="form-check-label" for="autoSizingCheck2" style="margin-right: 20px;"> SGST </label>
                     </div>

                     <div class="mb-3 form-check c1">
                       <input class="form-check-input cgst"  type="checkbox"  id="autoSizingCheck3">
                       <label class="form-check-label" for="autoSizingCheck3" style="margin-right: 20px;"> CGST </label>
                     </div>

                     <div class="mb-3 form-check i1">
                       <input class="form-check-input igst" type="checkbox"  id="autoSizingCheck4">
                       <label class="form-check-label" for="autoSizingCheck4"> IGST </label>
                     </div>
                  </div>-->

                     <div class="col-md-4 mb-3 sgstss" id="sgst" style="display: block;">
                        <label class="form-label">SGST</label>
                        <input type="number" class="form-control sgstsssss"  name="sgst<?php if(empty($edit_product)) echo '[]' ?>" id="sgsts" value="<?php if(!empty($edit_product)) echo($edit_product->sgst) ?>"  onkeyup="subAmount()" class="form-control"  placeholder="GST">
                     </div>

                     <div class="col-md-4 mb-3 cgstss" id="cgst" style="display: block;">
                        <label class="form-label">CGST</label>
                        <input type="number" name="cgst<?php if(empty($edit_product)) echo '[]' ?>" id="cgsts" value="<?php if(!empty($edit_product)) echo($edit_product->cgst) ?>"  onkeyup="subAmount()" class="form-control"  placeholder="GST">
                     </div>

                      <div class="col-md-4 mb-3 igstss" id="igst" style="display: block;">
                        <label class="form-label">IGST</label>
                        <input type="number" name="igst<?php if(empty($edit_product)) echo '[]' ?>" id="igsts" value="<?php if(!empty($edit_product)) echo($edit_product->igst) ?>"  onkeyup="subAmount()" class="form-control"  placeholder="GST">
                     </div>

                     <div class="mb-3" style="display: none;">
                        <label class="form-label">Price</label>
                        <input type="email" name="price<?php if(empty($edit_product)) echo '[]' ?>" id="total_amount" value="<?php if(!empty($edit_product)) echo($edit_product->price) ?>" class="form-control"  readonly>
                     </div>
                    <?php if(empty($edit_product)){ ?>
                     <div class="mb-0">
                        <div class="text-end change">
                           <button type="button" class="btn btn-info waves-effect add-more">
                           Add More
                           </button>
                        </div>
                     </div>
                    <?php } ?>
                  
                </div>
                   </div>
                    <div class="row">
                        <div class="mb-0">
                            <div class="text-end mt-3">
                               <button type="submit" class="btn btn-primary waves-effect">
                               Submit
                               </button>
                            </div>
                         </div>
                    </div>
               </form>
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
$(document).ready(function() {
    //start 
     $("body").on("click",".add-more",function(){ 
        var html = $(".after-add-more").first().clone();
       
        $(html).find(".change").html("<a class='btn btn-danger remove mt-4'>- Remove</a>");
        $(".after-add-more").last().after(html);
        //caltotalarea();
     });

     $("body").on("click",".remove",function(){ 
        $(this).parents(".after-add-more").remove();
        //caltotalarea();
     });
    //end 

 });
   $("#forms").submit(function(event) {
           event.preventDefault();
             for ( instance in CKEDITOR.instances )
              {
              CKEDITOR.instances[instance].updateElement();
              }
           $.ajax({
                   type: "POST", 
                   url: '<?php echo base_url('Admin/Product/add');?>',
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
                       setTimeout(function(){ window.location = "<?php echo base_url('Admin/Product/all');?>"; }, 1000);
                      
                       
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
   

    function valueChangedsgst()
    {
        if($('.sgst').is(":checked"))   
            $(".sgstss").show(),
            $(".i1").hide();
        else
            $(".sgstss").hide();
    }

    function valueChangedcgst()
    {
        if($('.cgst').is(":checked"))   
            $(".cgstss").show(),
            $(".i1").hide();
        else
            $(".cgstss").hide();
    }

    function valueChangedigst()
    {
        if($('.igst').is(":checked"))   
            $(".igstss").show(),
            $(".s1").hide(),
            $(".c1").hide();
        else
           $(".igstss").hide(),
           $(".s1").show(),
           $(".c1").show();
      
    }

   function subAmount(){
      
      var base_price= parseInt($("#base_price").val());
      var sgsts = parseInt($("#sgsts").val());
      var cgsts= parseInt($("#cgsts").val());
      var igsts= parseInt($("#igsts").val());
     
      if($('.sgst').is(":checked") && $('.cgst').is(":checked")) {

          var total= base_price+sgsts+cgsts; 
      }

      if($('.sgst').is(":checked") && (!$('.cgst').is(":checked"))){
         var total= base_price+sgsts;
      }

      if($('.cgst').is(":checked") && (!$('.sgst').is(":checked"))){
         var total= base_price+cgsts;
      }

      if($('.igst').is(":checked") && (!$('.sgst').is(":checked")) && (!$('.cgst').is(":checked"))){
         var total= base_price+igsts;
      }

      $("#total_amount").val(total);
   }

 
   



</script>

