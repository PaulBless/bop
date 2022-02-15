<?php

require_once '../../functions/db_connect.php'; 

//query to fetch locations
$sql = "SELECT * FROM `classes` ORDER BY `name` ASC";
$rsclass =mysqli_query($myconn, $sql);

//query to fetch landuse types
$get = "SELECT * FROM `programmes` ORDER BY `name` ASC";
$rsprogram =mysqli_query($myconn, $get);

//query to fetch application categories
$select = "SELECT * FROM `faculty` ORDER BY `name` ASC";
$rsfaculty =mysqli_query($myconn, $select);


?>


<!-- ADD STUDENT MODAL FORM -->
<div class="col-lg-12 grid-margin stretch-card">
    <div class="modal fade in" id="add_student" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" > -->
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                   <h4 class="card-title text-white text-center font-weight-bold" id="title">Add New Student</h4>
                    <button type="button" class="close text-white font-weight-bold" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                    
                <div class="modal-body">
                    <form class="forms-sample" id="form_add_student" role="form" action="new-student.php" method="POST" enctype="multipart/form-data">
                    
                        <div id="msg" class="form-group"></div>

                        <div class="form-group row">
                            <label for="exampleInputFirstname" class="col-sm-4 col-form-label text-dark">Firstname</label>
                            <div class="col-sm-8">
                                <input type="text" name="firstname" class="form-control text-primary border-dark" id="inputfirstname" placeholder="Firstname" required>
                            </div>
                            <span id="err-fname"></span>
                        </div>
                        
                        <div class="form-group row">
                            <label for="exampleInputFirstname" class="col-sm-4 col-form-label text-dark">Middlename</label>
                            <div class="col-sm-8">
                                <input type="text" name="middlename" class="form-control text-primary border-dark" id="inputmiddlename" placeholder="Middlename (if any)" >
                            </div>
                            <span id="err-fname"></span>
                        </div>
                        
                        <div class="form-group row">
                            <label for="exampleInputLastname" class="col-sm-4 col-form-label text-dark">Lastname</label>
                            <div class="col-sm-8">
                                <input type="text" name="lastname" class="form-control text-primary border-dark" id="inputlastname" placeholder="Lastname" required>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="exampleInputGender" class="col-sm-4 col-form-label text-dark">Gender</label>
                                <div class="col-sm-8 align-items-center justify-content-between">
                                <label class="form-check-labe col-sm-4">
                                    <input type="radio" class="form-check-input" name="gender" id="membershipRadios1" value="Male" >
                                    Male
                                </label>
                                <label class="form-check-label col-sm-4">
                                    <input type="radio" class="form-check-input" name="gender" id="membershipRadios1" value="Female" >
                                    Female
                                </label>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="exampleInputMobile" class="col-sm-4 col-form-label text-dark">Mobile Number</label>
                            <div class="col-sm-8">
                                <input type="tel" name="mobile" pattern="[0][0-9]{9}" max="10" class="form-control text-primary border-dark" id="inputmobile" placeholder="Mobile number" required>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="exampleInputEmail" class="col-sm-4 col-form-label text-dark">Email</label>
                            <div class="col-sm-8">
                                <input type="email" name="emailid" class="form-control text-primary border-dark" id="inputemail" placeholder="Email ID" required>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="exampleInputAddress" class="col-sm-4 col-form-label text-dark">Address</label>
                            <div class="col-sm-8">
                                <input type="text" name="address" class="form-control text-primary border-dark" id="inputaddress" placeholder="Address" required>
                            </div>
                        </div>  
                        
                        <div class="form-group row">
                            <label for="exampleInputContact" class="col-sm-4 col-form-label text-dark">Contact Name</label>
                            <div class="col-sm-8">
                                <input type="text" name="contact_name" class="form-control text-primary border-dark" id="inputcontact" placeholder="Address" required>
                            </div>
                        </div>  
                        
                        <div class="form-group row">
                            <label for="exampleInputContactTel" class="col-sm-4 col-form-label text-dark">Contact Telephone</label>
                            <div class="col-sm-8">
                                <input type="tel" name="contact_number" pattern="[0=[0-90]{9}" max="10" class="form-control text-primary border-dark" id="inputcontactno" placeholder="Contact Mobile Number" required>
                            </div>
                        </div> 
                          
                        <div class="form-group row">
                            <label for="exampleInputFaculty" class="col-sm-4 col-form-label text-dark">Faculty or School</label>
                            <div class="col-sm-8">
                                <select name="facultyid" id="facultyid">
                                    <option value="">Select</option>
                                    <?php
                                while($rows = mysqli_fetch_array($rsfaculty))
                                {
                                 echo '<option value="'. $rows['facultyid'].'">' .$rows['name'].'</option>';      
                                }
                                ?>
                                </select>
                            </div>
                        </div>    
                        
                        <div class="form-group row">
                            <label for="exampleInputProgram" class="col-sm-4 col-form-label text-dark">Programme of Study</label>
                                <div class="col-sm-8">
                                    <select name="programmeid" id="programmeid" class="js-example-basic-single w-100">
                                        <option value="">Select</option>
                                        <?php
                                    while($rows = mysqli_fetch_array($rsprogram))
                                    {
                                    echo '<option value="'. $rows['pid'].'">' .$rows['name'].'</option>';      
                                    }
                                    ?>
                                    </select>
                                </div>
                        </div>  
                        
                        <div class="form-group row">
                            <label for="exampleInputClass" class="col-sm-4 col-form-label text-dark">Class or Level</label>
                            <div class="col-sm-8">
                                <select name="classid" id="classid" class="js-example-basic-single w-100">
                                    <option value="">Select</option>
                                <?php
                                    while($rows = mysqli_fetch_array($rsclass))
                                    {
                                    echo '<option value="'. $rows['classid'].'">' .$rows['name'].'</option>';      
                                    }
                                    ?>
                                </select>                        
                            </div>
                        </div>      
                        
                        <div class="form-group row">
                            <label for="exampleInputImage" class="col-sm-5 col-form-label text-dark">Profile Image</label>
                            <div class="col-sm-8 ">
                                <!-- <input type="file" name="image" class="form-control text-primary" id="inputimage" required> -->
                                <input type="file" class="text-primary" name="image" required> 
                            </div>
                        </div>

                        <!-- button group --> 
                        <div class="d-flex align-items-center justify-content-center">
                            <button type="submit" class="col-md-6 btn btn-success btn-rounded mr-2" name="add_user" id="add_user">Submit</button>
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
