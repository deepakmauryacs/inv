<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<style>
    th, td {
      width: 50px;
    }
</style>
<div class="main-content">
<div class="page-content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-12">
            <div class="page-title-box">
               <h4>Issue Items</h4>
               <ol class="breadcrumb m-0">
                  <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                  <li class="breadcrumb-item active">Issue Items</li>
               </ol>
            </div>
         </div>
      </div>
      <!-- end page title -->
      <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-print-none">
                            <div class="float-end">
                                <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light me-1"><i class="fa fa-print"></i></a>
                                <a href="<?php  echo base_url('Admin/Issue_items/all') ?>" class="btn btn-primary w-md waves-effect waves-light">Back</a>
                            </div>
                        </div>
                        
                        <div class="py-2 mt-3 row">
                            <div class="col-6">
                                <h3 class="font-size-15 font-weight-bold" style="margin-left: 20px;">Issue Items Summary</h3>
                            </div>
                            <div class="col-6 text-end">
                                <h3 class="font-size-15 font-weight-bold" style="margin-right: 20px;">Date: <?php date_default_timezone_set("Asia/Kolkata"); echo date("d-m-Y H:i:s"); ?></h3>
                            </div>
                        </div>
                        <div class="margin-left: 15px;">
                            <table class="table dt-responsive table-nowrap" style="">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Product Name</th>
                                        <th>Product Type</th>
                                        <th>Quantity</th>
                                        <th>Issue Date</th>
                                        <!--<th class="text-end">Price</th>-->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($issue_item)){
                                        $i=1;
                                        foreach($issue_item as $key=>$value){
                                       
                                    ?>
                                    <tr>
                                        <td> <?php echo $i; ?></td>
                                        <td> <?php echo get_field_value('tbl_product', 'product_name', ['id' => $value['product_name']]); ?></td>
                                        <td> <?php echo $value['product_type']; ?></td>
                                        <td> <?php echo $value['quantity']; ?></td>
                                        <td> <?php echo $value['issue_date']; ?></td>
                                    </tr>
                                    <?php  $i++; 
                                        }
                                    }
                                    
                                    ?>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                   <!-- <tr>
                                        <td>02</td>
                                        <td>Skote - Landing Template</td>
                                        <td class="text-end">$399.00</td>
                                    </tr>

                                    <tr>
                                        <td>03</td>
                                        <td>Veltrix - Admin Dashboard Template</td>
                                        <td class="text-end">$499.00</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="text-end">Sub Total</td>
                                        <td class="text-end">$1397.00</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="border-0 text-end">
                                            <strong>Shipping</strong></td>
                                        <td class="border-0 text-end">$13.00</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="border-0 text-end">
                                            <strong>Total</strong></td>
                                        <td class="border-0 text-end"><h4 class="m-0">$1410.00</h4></td>
                                    </tr>-->
                                </tbody>
                            </table>
                            <br><br><br><br><br><br><br><br><br><br><br><br><br>
                            <div class="row mb-3 mt-3 ml-4">
                                <div class="col-6">
                                    <h4 style="margin-left: 15px;">Signing Authority</h4>
                                    <br>
                                    <hr style="width: 240px; margin-left: 15px;">
                                    <h4 style="margin-left: 15px;">Sign and Stamp above</h4>
                                    <br>
                                </div>  
                                <div class="col-6">
                                    <h4>Issued to: <?php echo $associates['asscociate_name']; ?></h4>
                                    <br>
                                    <hr style="width: 240px;">
                                    <h4>Sign above</h4>
                                    <br>
                                </div>   
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

    </div> <!-- container-fluid -->
</div>
<!-- End Page-content -->
   </div>
   <!-- container-fluid -->
</div>
</div>
</div>
<!-- End Page-content -->

<script type="text/javascript">
   
</script>