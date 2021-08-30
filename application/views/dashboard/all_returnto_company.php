<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">
<div class="page-content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-12">
            <div class="page-title-box">
               <h4>Return To Company</h4>
               <ol class="breadcrumb m-0">
                  <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                  <li class="breadcrumb-item active">Return To Company</li>
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
                     <h4 class="card-title">All Return to Company List</h4>
                     <a  href="<?php  echo base_url('Admin/Product') ?>" style="border-radius: 0px;" class="btn btn-primary waves-effect waves-light">
                        Add Return To Company</a>
                  </div>
                  <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                     <thead>
                        <tr>
                           <th>S.No</th>
                           <th>Company Name</th>
                           <th>Product Type</th>
                           <th>Product Name</th>
                           <th>Quantity</th>
                           <th>Base Price</th>
                           <th>SGST</th>
                           <th>CGST: </th>
                           <th>IGST:</th>
                           <th>Price: </th>
                           <th>Return Date: </th>
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
   
      var dataTable = $('#datatable').DataTable({
       "processing" : true,
       "serverSide" : true,
       "searching" : true,
       "order" : [],
       // "dom": 'Bfrtip',
       //  buttons: [
       //             'copy', 'csv', 'excel', 'pdf', 'print'
       //         ],
       "ajax" : {
        url:"<?php echo base_url('Admin/Returnto_company/getReturntocompanyList');?>",
        type:"POST",
        data:{}
       }
      });
     }
   });
        function delete_data(delete_id)
        {
            $("#pass_conf_btn").show();
            $("#modal-delete-footer").hide();
            $("#passwrd_conf").val('');
            $('#delete_id').val(delete_id);
            $('#delete_url').val("<?php echo base_url(); ?>Admin/Returnto_company/delete_item");
            $('#deleteModal').modal('show');
        }
     /*$(document).on('click', '.delete', function(){  
              var id = $(this).attr("id");  
               Swal.fire({   
               title: "Are you sure?",
               text: "You won't be able to revert this!",
               icon: "warning",
               showCancelButton: !0,
               confirmButtonText: "Yes, delete it!",
               cancelButtonText: "No, cancel!",
               confirmButtonClass: "btn btn-success mt-2",
               cancelButtonClass: "btn btn-danger ms-2 mt-2",
               buttonsStyling: !1
             }).then((result) => {
               if (result.value) {
                     $.ajax({
                        url:"<?php echo base_url(); ?>Admin/Returnto_company/delete",  
                        method:"POST",  
                        data:{id:id},
                        error: function() {
                           alert('Something is wrong');
                        },
                        success: function(data) {
                              //  window.location.reload();
                                Swal.fire("Deleted!", "Your imaginary file has been deleted.", "success");
                                window.location.reload();
                        }
                     });
                   } else {
                     Swal.fire("Cancelled", "Your imaginary file is safe :)", "error");
                   }
                 });
          });*/
</script>