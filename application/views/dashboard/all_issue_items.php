<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
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
      <!-- end row -->
      <div class="row">
         <div class="col-xl-12">
            <div class="card">
               <div class="card-body">
                  <div class="head d-flex justify-content-between align-items-center mb-4 row">
                      <div class="col-4">
                          <h4 class="card-title">All Issue Items List</h4>
                      </div>
                      <div class="col-4">
                        <label for="staff_type">Select Associate Name</label>
                        <select class="form-control filter" id="associates" name="associates">
                            <option value="0">Select Associate Name</option>
                            <?php
                                if(!empty($associates)){
                                foreach ($associates as $key => $value) {
                            ?>
                            <option value="<?php echo $value['id'] ?>"><?php echo $value['asscociate_name'] ?></option>
                            <?php } } ?>
                        </select>
                      </div>
                      <div class="col-4 text-end">
                          <a id="print_issue_item" href="#" style="border-radius: 0px;" class="btn btn-primary waves-effect waves-light ">Print</a>
                          <a  href="<?php  echo base_url('Admin/Issue_items') ?>" style="border-radius: 0px;" class="btn btn-primary waves-effect waves-light ">Issue Items</a>
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
                           <th>Issue Date</th>
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
   });
    function fill_datatable()
    {
        var associate = $("#associates").val();
        if(associate>0){
            $("#print_issue_item").show();
            $("#print_issue_item").attr("href", '<?php echo base_url(); ?>Admin/Issue_items/print_issue_item/'+associate);
        }else{
            $("#print_issue_item").hide();
            $("#print_issue_item").attr("href", "javascript:void(0)");
        }
        
        //console.log(associate);
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
            url:"<?php echo base_url('Admin/Issue_items/getIssueitemsList');?>",
            type:"POST",
            data:{associate:associate}
           }
       });
    }
   $('.filter').on('change',function(){
      $('#datatable').DataTable().destroy();
      fill_datatable();
   });
   function showDetails(id)
       {
         $.ajax({
                 type: "POST", 
                 url: '<?php echo base_url('Admin/Company/showDetails');?>',
                 dataType:'html',
                 data:{'id':id}, 
                 beforeSend:function()
                 {},
                 success:function(responce)
                 { 
                   $('#detailsData').html(responce);
                   $('.bs-example-modal-lg').modal('show');
                 },
                 error:function()
                 {
                   // $.notify("BOOM....!", "error");
                 },
                 complete:function()
                 {
                 }
             });
       }
       function delete_data(delete_id)
        {
            $("#pass_conf_btn").show();
            $("#modal-delete-footer").hide();
            $("#passwrd_conf").val('');
            $('#delete_id').val(delete_id);
            $('#delete_url').val("<?php echo base_url(); ?>Admin/Issue_items/delete_item");
            $('#deleteModal').modal('show');
        }
     
</script>