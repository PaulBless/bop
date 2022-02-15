<?php
	if(!$bool){
?>

<!-- ADD ADMIN MODAL FORM -->
<div class="col-lg-12 grid-margin stretch-card">
    <div class="modal fade in" id="edit_course<?php  echo $course_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" > -->
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                   <h4 class="card-title text-white text-center font-weight-bold" id="title">Edit Course</h4>
                    <button type="button" class="close text-white font-weight-bold" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                    
                <div class="modal-body">
                    <form class="forms-sample" id="form_edit_course" role="form" action="edit-course.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" class="form-control text-primary border-info" name="course_id" value="<?php echo $records['ayid'] ?>">
                    <div id="msg" class="form-group"></div>

                        <div class="form-group row">
                        <label for="exampleInputFirstname" class="col-sm-3 col-form-label text-dark">Course Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="name" value="<?php echo $records['name'] ?>"" class="form-control text-primary border-info" id="inputfirstname" placeholder="Firstname" required>
                        </div>
                        <span id="err-fname"></span>
                        </div>
                        
                        <div class="form-group row">
                        <label for="exampleInputLastname" class="col-sm-3 col-form-label text-dark">Description</label>
                        <div class="col-sm-9">
                            <input type="text" name="description" value="<?php echo $records['description'] ?>" class="form-control text-primary border-info" id="inputlastname" placeholder="Lastname" required>
                        </div>
                        </div>
                        
                        <!-- button group --> 
                        <div class="d-flex align-items-center justify-content-center">
                            <button type="submit" class="col-md-6 btn btn-primary btn-rounded mr-2" name="btnupdate" id="update">Update</button>
                            <button class="col-md-3 btn btn-dark btn-rounded" data-dismiss="modal">Cancel</button>
                        </div>

                    </form>
                </div>
                    <?php 
                        
                    ?>
				</div>
            </div>
    </div>
</div>  
<!--END -->

<?php
}
?>