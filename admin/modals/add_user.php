<!-- ADD ADMIN MODAL FORM -->
<div class="col-lg-12 grid-margin stretch-card">
    <div class="modal fade in" id="add_user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" > -->
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                   <h4 class="card-title text-white text-center font-weight-bold" id="title">Add New User</h4>
                    <button type="button" class="close text-white font-weight-bold" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                    
                <div class="modal-body">
                    <form class="forms-sample" id="form_add_user" role="form" action="new-user.php" method="POST" enctype="multipart/form-data">
                    
                    <div id="msg" class="form-group"></div>

                        <div class="form-group row">
                        <label for="exampleInputFirstname" class="col-sm-3 col-form-label text-dark">Firstname</label>
                        <div class="col-sm-9">
                            <input type="text" name="firstname" class="form-control text-primary border-info" id="inputfirstname" placeholder="Firstname" required>
                        </div>
                        <span id="err-fname"></span>
                        </div>
                        
                        <div class="form-group row">
                        <label for="exampleInputLastname" class="col-sm-3 col-form-label text-dark">Lastname</label>
                        <div class="col-sm-9">
                            <input type="text" name="lastname" class="form-control text-primary border-info" id="inputlastname" placeholder="Lastname" required>
                        </div>
                        </div>
                        
                        <div class="form-group row">
                        <label for="exampleInputMobile" class="col-sm-3 col-form-label text-dark">Mobile</label>
                        <div class="col-sm-9">
                            <input type="tel" name="mobile" pattern="[0][0-9]{9}" max="10" class="form-control text-primary border-info" id="inputmobile" placeholder="Mobile number" required>
                        </div>
                        </div>
                        <div class="form-group row">
                        <label for="exampleInputEmail" class="col-sm-3 col-form-label text-dark">Email</label>
                        <div class="col-sm-9">
                            <input type="email" name="emailid" class="form-control text-primary border-info" id="inputemail" placeholder="Email ID" required>
                        </div>
                        </div>
                        
                        <div class="form-group row">
                        <label for="exampleInputAddress" class="col-sm-3 col-form-label text-dark">Address</label>
                        <div class="col-sm-9">
                            <input type="text" name="address" class="form-control text-primary border-info" id="inputaddress" placeholder="Address" required>
                        </div>
                        </div>      
                        
                        <div class="form-group row">
                            <label for="exampleInputImage" class="col-sm-3 col-form-label text-dark">Profile Image</label>
                            <div class="col-sm-9 ">
                                <!-- <input type="file" name="image" class="form-control text-primary" id="inputimage" required> -->
                                <input type="file" class="text-primary" name="image" required> 
                            </div>
                        </div>

                        <!-- button group --> 
                        <div class="d-flex align-items-center justify-content-center">
                            <button type="submit" class="col-md-6 btn btn-primary btn-rounded mr-2" name="add_user" id="add_user">Submit</button>
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
