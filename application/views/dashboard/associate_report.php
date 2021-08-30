<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">
<div class="page-content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-12">
            <div class="page-title-box">
               <h4>Associate Report</h4>
               <ol class="breadcrumb m-0">
                  <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                  <li class="breadcrumb-item active">Associate Report</li>
               </ol>
            </div>
         </div>
      </div>
      <!-- end page title -->
      <div class="row">
      <div class="col-12">
         <div class="card">
            <div class="card-body">
                  <h4 class="header-title mb-4"  style="font-family: 'Poppins';">Report</h4>
            <div class="row"> 

               <div class="col-md-12 mb-3">
                  <label class="form-label"> By Associate </label>
                  <select class="form-control  filter" id="associate" name="associate">  
                     <option value="" selected>  All</option>
                     <?php
                     $data = $this->db->get_where('tbl_associate',['id >'=>0])->result();
                     foreach($data as $row){
                      ?>
                     <option value="1"><?php echo $row->asscociate_name ?></option>
                     <?php
                     }
                     ?>
                  </select>
               </div>
            </div>
            </div>
         </div>
      </div>
    </div>
   
      <!-- end row -->
      <div class="row">
         <div class="col-xl-12">
            <div class="card">
               <div class="card-body">
                
                  <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                     <thead>
                        <tr>
                           <th>S.No</th>
                           <th>Company Name</th>
                           <th>Product Name</th>
                           <th>Total Issue Items</th>
                           <th>Product Type</th>
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
      
      var associate=$('#associate').val();
      var dataTable = $('#datatable').DataTable({
       "processing" : true,
       "serverSide" : true,
       "searching" : true,
       "order" : [],
       "dom": 'Bfrtip',
        buttons: [
                   'copy', 'csv', 'excel', 'pdf', 'print'
               ],
       "ajax" : {
        url:"<?php echo base_url('Admin/Associate_report/getAssociatereportList');?>",
        type:"POST",
        data:{associate:associate}
       }
      });
     }
     $('.filter').on('change',function(){
     $('#datatable').DataTable().destroy();
        fill_datatable();
     });
   });
</script>