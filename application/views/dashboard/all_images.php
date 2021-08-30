<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">
<div class="page-content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-12">
            <div class="page-title-box">
               <h4>Images</h4>
               <ol class="breadcrumb m-0">
                  <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                  <li class="breadcrumb-item active">All Images</li>
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
                     <h4 class="card-title">All Images List</h4>
                     <a  href="<?php  echo base_url('Admin/Images') ?>" style="border-radius: 0px;" class="btn btn-primary waves-effect waves-light">Add Images</a>
                  </div>
                  <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                     <thead>
                        <tr>
                           <th>S.No</th>
                           <th>Image</th>
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
<!-- End Page-content -->

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
        url:"<?php echo base_url('Admin/Images/getImagesList');?>",
        type:"POST",
        data:{}
       }
      });
     }
   });
   
     $(document).on('click', '.delete', function(){  
              var images_id = $(this).attr("id");  
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
                        url:"<?php echo base_url(); ?>Admin/Images/delete_images",  
                        method:"POST",  
                        data:{images_id:images_id},
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
          });
</script>