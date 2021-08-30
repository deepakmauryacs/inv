<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">
<div class="page-content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-12">
            <div class="page-title-box">
               <h4>Return Items</h4>
               <ol class="breadcrumb m-0">
                  <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                  <li class="breadcrumb-item active">Return Items</li>
               </ol>
            </div>
         </div>
      </div>
      <!-- end page title -->
      <!-- end row -->
      <div class="row">
         <div class="col-xl-12">
            <div class="card">
               <div class="card-body">
                  <div class="head d-flex justify-content-between align-items-center mb-4">
                      <div class="col-4">
                          <h4 class="card-title">All Return Items List</h4>
                      </div>
                      <div class="col-4">
                            <div class="row">
                                <div class="col-6">
                                    <label for="staff_type">Enter You Query</label>
                                    <input type="text" class="form-control" id="search_text" value="" placeholder="Enter You Query"/>
                                </div>
                                <div class="col-6">
                                    <label for="staff_type">Select Search By</label>
                                    <select class="form-control filter" id="search_by" name="search_by">
                                        <option value="">All</option>
                                        <option value="associate_name">Associate Name</option>
                                        <option value="product_name">Product Name</option>
                                        <!--<option value="product_type">Product Type</option>-->
                                    </select>
                                </div>
                            </div>
                        
                      </div>
                      <div class="col-4 text-end">
                          <a  href="<?php  echo base_url('Admin/Return_items') ?>" style="border-radius: 0px;" class="btn btn-primary waves-effect waves-light">Return Items</a>
                      </div>
                  </div>
                  <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                     <thead>
                        <tr>
                           <th>S.No</th>
                           <th>Associate Name</th>
                           <th>Product Name</th>
                           <th>Product Type</th>
                           <th>Quantity</th>
                           <th>Return Date</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
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
</div>
</div>
<!-- End Page-content -->
<!--  Large modal example -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg modal-dialog-scrollable">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="myLargeModalLabel">Details</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body" id="detailsData">
         </div>
      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<script type="text/javascript">
   $(document).ready(function(){
     fill_datatable();
     function fill_datatable()
     {
        var search_query = $("#search_text").val();
        var search_by = $("#search_by").val();
      var dataTable = $('#datatable').DataTable({
       "processing" : true,
       "serverSide" : true,
       "searching" : false,
       "order" : [],
       // "dom": 'Bfrtip',
       //  buttons: [
       //             'copy', 'csv', 'excel', 'pdf', 'print'
       //         ],
       "ajax" : {
        url:"<?php echo base_url('Admin/Return_items/getReturnitemsList');?>",
        type:"POST",
        data:{search_query:search_query, search_by:search_by}
       }
      });
     }
     $('.filter').on('change',function(){
          $('#datatable').DataTable().destroy();
          fill_datatable();
       });
   });
        function delete_data(delete_id)
        {
            $("#pass_conf_btn").show();
            $("#modal-delete-footer").hide();
            $("#passwrd_conf").val('');
            $('#delete_id').val(delete_id);
            $('#delete_url').val("<?php echo base_url(); ?>Admin/Return_items/delete_item");
            $('#deleteModal').modal('show');
        }
</script>