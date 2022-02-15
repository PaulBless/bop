<!-- ADD ADMIN MODAL FORM -->
<div class="col-lg-12 grid-margin stretch-card">
    <div class="modal fade in" id="add_course" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" > -->
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                   <h4 class="card-title text-white text-center font-weight-bold" id="title">Add New Course</h4>
                    <button type="button" class="close text-white font-weight-bold" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                    
                <div class="modal-body">
                    <form class="forms-sample" id="form_add_course" role="form" action="new-course.php" method="POST" enctype="multipart/form-data">
                    
                    <div id="msg" class="form-group"></div>

                        <div class="form-group row">
                        <label for="exampleInputFName" class="col-sm-3 col-form-label text-dark">Course Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="course" class="form-control text-primary border-info" id="inputname" placeholder="Academic Year name" required>
                        </div>
                        <span id="err-name"></span>
                        </div>
                        
                        <div class="form-group row">
                        <label for="exampleInputDescription" class="col-sm-3 col-form-label text-dark">Description</label>
                        <div class="col-sm-9">
                            <input type="text" name="description" class="form-control text-primary border-info" id="inputdescription" placeholder="Lastname" required>
                        </div>
                        </div>
                        
                       

                        <!-- button group --> 
                        <div class="d-flex align-items-center justify-content-center">
                            <button type="submit" class="col-md-6 btn btn-success btn-rounded mr-2" name="btnsave" id="add_faculty">Save</button>
                            <button class="col-md-3 btn btn-dark btn-rounded" data-dismiss="modal">Cancel</button>
                        </div>

                    </form>
                </div>
                    <?php 

                        ## check if form data is not empty, and submit button is clicked
                        // if(isset($_POST['add_user']) && !empty($firstname) && !empty($lastname) && !empty($emailid) && !empty($mobile) && !empty($avatar))
                        // {
                            ## require admin classes function/class
                        //    require '../functions/admin_classes.php';
                            
                            ## invoke the add user method from the class
                           ?>
                            <!-- start_load();  -->
                             <?php 
                            // addUser();
                             ?> 
                            <!-- end_load();  -->
                            <?php
                        // }
                    ?>
				</div>
            </div>
    </div>
</div>  
<!--END -->
