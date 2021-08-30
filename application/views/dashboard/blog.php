            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">
                <div class="page-content">
                    <div class="container-fluid">
                         <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                    <h4> Blog </h4>
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                            <li class="breadcrumb-item active"> Blog </li>
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
                                        <h4 class="card-title">Blog</h4>
                                         <a  href="<?php  echo base_url('Admin/Blog/all') ?>" style="border-radius: 0px;" class="btn btn-primary waves-effect waves-light">Go Back</a>
                                    </div>
                                    <hr>


                                        <h4 class="card-title"> Blog </h4>
                                        <form id="forms" class="custom-validation"  method="POST">
                                             <div class="mb-3">
                                                <label class="form-label"> Iamge </label>
                                               <input type="file" name="image"  class="form-control" >
                                                <input type="hidden" name="old_image" value="<?php if(!empty($edit_blog)) echo($edit_blog->image) ?>"  class="form-control" >
                                                    <input type="hidden" name="edit_id" value="<?php if(!empty($edit_blog)) echo($edit_blog->id) ?>"  class="form-control" >

                                            </div>


                                             <div class="mb-3">
                                                <label class="form-label">Category</label>
                                                <select class="form-control select2"  name="category" required>
                                                        <option value=""> --- Select Category ---</option>
                                                        <?php
                                                         if(!empty($category) AND !empty($edit_blog)){
                                                         foreach ($category as  $row) 
                                                         { 
                                                         ?>
                                                        <option  <?php if($row->slug ==$edit_blog->category){ echo 'selected="selected"'; } ?>    value="<?php echo $row->slug; ?>"><?php echo $row->category;  ?></option>
                                                         <?php
                                                            }
                                                           }else{
                                                            foreach ($category as  $row) {
                                                            ?>
                                                           <option  value="<?php echo $row->slug; ?>"><?php echo $row->category;  ?></option>
                                                         <?php
                                                           }
                                                          }
                                                         ?>

                                                 </select>     
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Title</label>
                                               <input type="text" name="title" value="<?php if(!empty($edit_blog)) echo($edit_blog->title) ?>" class="form-control" required placeholder="Slug" required>
                                            </div>

                                            <div class="mb-3">
                                               <label class="form-label">Description</label>
                                                <textarea class="form-control ckeditor" id="description" name="description"><?php if(!empty($edit_blog)) echo($edit_blog->description) ?></textarea>
                                                <script>CKEDITOR.replace( 'description' );</script>
                                            </div>


                                            <div class="mb-3">
                                                <label class="form-label">Slug</label>
                                               <input type="text" name="slug" value="<?php if(!empty($edit_blog)) echo($edit_blog->slug) ?>" class="form-control" required placeholder="Slug" required>
                                            </div>

                                            <div class="mb-0">
                                                <div>
                                                    <button type="submit" class="btn btn-primary waves-effect">
                                                        Submit
                                                    </button>
                                                    <button type="reset" class="btn btn-secondary waves-effect">
                                                        Cancel
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div> <!-- end col -->      
                        </div> <!-- end row -->
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
<script>
$("#forms").submit(function(event) {
        event.preventDefault();
        for ( instance in CKEDITOR.instances )
        {
        CKEDITOR.instances[instance].updateElement();
        }
        $.ajax({
                type: "POST", 
                url: '<?php echo base_url('Admin/Blog/add');?>',
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
                    window.location.href= '<?php echo base_url('Admin/Blog/all');?>';
                    
                   
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


          