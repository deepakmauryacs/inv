       <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        © <script>document.write(new Date().getFullYear())</script> Inventory Management System <span class="d-none d-sm-inline-block"> - Devloped  <i class="mdi mdi-heart text-danger"></i> by SSAK.</span>
                    </div>
                </div>
            </div>
        </footer>
        </div>

    <div id="deleteModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bg-danger">
              <h5 class="modal-title" id="myModalLabel">Confirm Delete</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
          </div>
          <div class="modal-body">
            <p>are you sure you want to delete this?</p>
            <lable>Please Enter Password to delete</lable>
            <input type="number" id="passwrd_conf" class="form-control" placeholder="Please Enter Password">
            <div class="text-end mt-2">
                <button type="button" class="btn btn-info" id="pass_conf_btn" onclick="validate()">Validate</button>
            </div>
            <input type="hidden" id="delete_id">
            <input type="hidden" id="delete_url">
          </div>
          <div class="modal-footer modal-delete-footer" id="modal-delete-footer" style="display:none">
            <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary waves-effect waves-light"onclick="confirm_delete();">OK</button>
          </div>
        </div>
          <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
      
    <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>
        <!-- JAVASCRIPT -->
        <script src="<?php echo base_url(); ?>assets/admin/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/libs/metismenu/metisMenu.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/libs/simplebar/simplebar.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/libs/node-waves/waves.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/libs/jquery-sparkline/jquery.sparkline.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/libs/select2/js/select2.min.js"></script>
        <!-- Required datatable js -->
        <script src="<?php echo base_url(); ?>assets/admin/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="<?php echo base_url(); ?>assets/admin/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/libs/jszip/jszip.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/libs/pdfmake/build/pdfmake.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/libs/pdfmake/build/vfs_fonts.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
        <!-- Responsive examples -->
        <script src="<?php echo base_url(); ?>assets/admin/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/js/pages/form-advanced.init.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/libs/parsleyjs/parsley.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/js/pages/form-validation.init.js"></script>
     

        <script src="<?php echo base_url(); ?>assets/admin/js/app.js"></script>
        <script type="text/javascript">
        $(document).ready(function () {
            $('#datatable').DataTable();
        });
      </script>
      <script type="text/javascript">
      function confirm_delete()
      {
        let delete_id=$('#delete_id').val();
        let delete_url=$('#delete_url').val();
        $.ajax({
          type: "POST", 
          url: delete_url,
          dataType:'json',
          data: {'delete_id':delete_id}, 
          beforeSend:function()
          {},
          success:function(responce)
          {
            if(responce.status==0)
            {
                Command: toastr["error"](responce.message);
            }else if(responce.status==1)
            {
              $('#deleteModal').modal('hide');
              Command: toastr["success"](responce.message);
              location.reload();
              fill_datatable();
            }  
          },
          error:function()
          {
            $.notify("BOOM....!", "error");
          },
          complete:function()
          {
          }
        });

      }
      
      function validate(){
        let passwrd_conf=$('#passwrd_conf').val();
        $.ajax({
          type: "POST", 
          url: '<?php echo base_url('Admin/dashboard/delete_pass_conf');?>',
          dataType:'json',
          data: {'password':passwrd_conf}, 
          beforeSend:function(){},
          success:function(responce)
          {
            if(responce.status==0) {
                Command: toastr["error"](responce.message);
                $("#pass_conf_btn").show();
                $("#modal-delete-footer").hide();
            }else if(responce.status==1) {
                Command: toastr["success"](responce.message);
                $("#pass_conf_btn").hide();
                $("#modal-delete-footer").show();
            }
          },
          error:function() {
            $.notify("BOOM....!", "error");
          },
          complete:function() { }
        });
      }
        toastr.options = {
          "closeButton": false,
          "debug": false,
          "newestOnTop": false,
          "progressBar": false,
          "positionClass": "toast-top-right",
          "preventDuplicates": false,
          "onclick": null,
          "showDuration": "300",
          "hideDuration": "1000",
          "timeOut": "5000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
       }
   //  Command: toastr["success"]('hello');
   
    <?php if($this->session->flashdata('success')){ ?>
       Command: toastr["success"]('<?php echo $this->session->flashdata('success'); ?>');
    <?php } ?>

    <?php if($this->session->flashdata('update')){ ?>
       Command: toastr["success"]('<?php echo $this->session->flashdata('update'); ?>');
    <?php } ?>

    <?php if($this->session->flashdata('error')){ ?>
       Command: toastr["error"]('<?php echo $this->session->flashdata('error'); ?>');
    <?php } ?>

    <?php if($this->session->flashdata('info')){ ?>
       Command: toastr["info"]('<?php echo $this->session->flashdata('info'); ?>');
    <?php } ?>

    $(function () {
     $('[data-toggle="tooltip"]').tooltip()
    })
   
   </script>
    </body>
</html>