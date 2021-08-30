<script type="text/javascript">
     $(document).ready(function(){
        // Check all
        $("#checkall").change(function(){

           var checked = $(this).is(':checked');
           if(checked){
              $(".checkbox").each(function(){
                  $(this).prop("checked",true);
              });
           }else{
              $(".checkbox").each(function(){
                  $(this).prop("checked",false);
              });
           }
        });

        // Changing state of CheckAll checkbox 
        $(".checkbox").click(function(){

           if($(".checkbox").length == $(".checkbox:checked").length) {
               $("#checkall").prop("checked", true);
           } else {
               $("#checkall").prop("checked",false);
           }

        });

        // Delete button clicked
        $('#delete').click(function(){

           // Confirm alert
           var deleteConfirm = confirm("Are you sure?");
           if (deleteConfirm == true) {

              // Get userid from checked checkboxes
              var users_arr = [];
              $(".checkbox:checked").each(function(){
                  var userid = $(this).val();

                  users_arr.push(userid);
              });

              // Array length
              var length = users_arr.length;

              if(length > 0){

                 // AJAX request
                 $.ajax({
                    url: '<?= base_url() ?>index.php/users/deleteUser',
                    type: 'post',
                    data: {user_ids: users_arr},
                    success: function(response){

                       // Remove <tr>
                       $(".checkbox:checked").each(function(){
                           var userid = $(this).val();

                           $('#tr_'+userid).remove();
                       });
                    }
                 });
              }
           } 

        });

      });
      </script>