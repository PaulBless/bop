
  <?php 
  require_once '../functions/db_connect.php';
  ?>

  <body onload="loading()">
    <div class="container-scroller ">
		 <!-- Pre-loader start -->
         <div class="theme-loader"></div>
    <!-- Pre-loader end -->
	
		<!-- partial:partials/_horizontal-navbar.html -->
        <div class="horizontal-menu">

        <?php include('../template/header.php'); ?>
        <?php include('../template/top-nav.php'); ?>
        <?php include('../template/menu.php'); ?>

      
        </div>
    
    <!-- partial -->
		<div class="container-fluid page-body-wrapper">
			<div class="main-panel">
				<div class="content-wrapper">
                   <!-- page title -->
                   <div class="row">
						<div class="col-lg-10 col-md-12 col-sm-12 col-xs-12 mb-4 mb-xl-0">
							<div class="d-lg-flex ">
								<div style="margin-left: 30px">
                                    <h2 class="text-dark font-weight-bold mb-2 ">Students</h2>
								</div>
							</div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 mb-4 mb-xl-0" >
                            <div class="d-lg-flex">
                                <a href="" data-toggle="modal" data-target="#add_student" class="new_student btn btn-primary font-weight-bold mb-3" style="float: right; "><i class="mdi mdi-account-plus"> </i> Add New Student</a>
                            </div>
                        </div>
                        <hr class="border-info">
                    </div>
                    <!-- end page title-->

                    <!-- lecturers list -->
                    <div class="row">
                    <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <!-- <h4 class="card-title text-center">List of Lecturers</h4> -->
                  <div class="table-responsive">
                    <table class="table table-hover table-bordered" width="100%">
                      <thead class="bg-dark text-white">
                        <tr>
                          <th>S/No.</th>
                          <th style="display: none;"> ID</th>
                          <th> Student No</th>
                          <th> Full Name</th>
                          <th> Phone Number</th>
                          <th> Email ID</th>
                          <th> House Address </th>
                          <th> Contact Name</th>
                          <th> Contact Telephone</th>
                          <th> Programme of Study</th>
                          <th> Current Class</th>
                          <th> Login ID</th>
                          <th style="display: none;"> Password</th>
                          <th> Picture</th>
                          <th> Date Created</th>
                          <th> Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                                    ## reauire db connection
                                    require '../functions/db_connect.php';

                                    $bool = false;  // set flag
                                    $query1=mysqli_query($myconn, "SELECT * FROM `students` ORDER BY `firstname` ASC");
                                    $cnt=1;
                                
                                    //fetch[0]['name'];
                                    while($records=mysqli_fetch_array($query1)){
                                    //get user id
                                    $student_id = $records['studentid'];
                                    ?>

                                    <tr>
                                    <td><?php echo $cnt; ?></td>
                                    <td class="" style="display: none;"><?php echo $records['studentid']; ?></td>
                                    <td> <?php echo $records['student_no']; ?></td>
                                    <td> <?php echo $records['lastname'] .", ". $records['firstname'] . $records['middlename'];  ?></td>
                                    <td> <?php echo $records['gender']; ?></td>
                                    <td> <?php echo $records['phoneno']; ?></td>
                                    <td> <?php echo $records['email']; ?></td>
                                    <td> <?php echo $records['address']; ?></td>
                                    <td> <?php echo $records['contact_name']; ?></td>
                                    <td> <?php echo $records['contact_number']; ?> </td>
                                    <td> <?php // get progrmme of study
                                    $sql = mysqli_query($myconn, "SELECT `name` FROM `programmes` WHERE `pid`='".$records['programme_id']."'"); 
                                    $get_data = mysqli_fetch_array($sql);
                                    echo $get_data['name'];  ?>
                                    </td> 
                                    <td> <?php // get classs type
                                    $sql1 = mysqli_query($myconn, "SELECT `name` FROM `classes` WHERE `classid`='".$records['class_id']."'"); 
                                    $get_data1 = mysqli_fetch_array($sql1);
                                    echo $get_data1['name'];  ?>
                                    </td>
                                    <td> <?php echo $records['loginid']; ?>  </td>
                                    <td style="display: none;;"> <?php echo $records['password']; ?>  </td>
                                    <td class="py-1"> <img src="../uploads/<?php echo $records['avatar']; ?>" alt="image"/> </td>
                                    <td> <?php echo date('d M, Y', strtotime($records['date_created'])); ?></td>
                                    <td class="datatable-ct">
                  
                                    <!--update link-->
                                    <a title="Click to update" id="<?php echo $records['studentid'] ?>" href="#edit_student<?php echo $records['studentid'] ?>"  data-toggle="modal" class="btn btn-info btn-sm update_student" href="<?php echo $records['studentid'] ?>"> <i class="mdi mdi-pencil"></i> </a>
                                    <?php //include('modals/edit_student.php'); ?>

                                    <!-- delete link -->
                                     <a title="Click to delete" class="btn btn-danger btn-sm" href="ajax/delete-student.php?studentid=<?php echo htmlentities($records['studentid']);?>" onclick="return confirm('Do you really want to delete this student, with Student #: <?php echo htmlentities($records['student_no']) ?> from the system? You cannot undo this action!')"><i class="mdi mdi-delete"></i> </a>
                                    </td>

                                    </tr>
                                    <?php
                                      $cnt=$cnt+1;        
                                }?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
					</div>
                    <!-- end record lists -->
                   
				</div>
				<!-- content-wrapper ends -->
                
                <!-- include modal dialogs --> 
                <?php include('modals/add_student.php'); ?>

                <!-- footer -->
                <?php include('../template/footer.php') ?>
	    <!-- partial -->
		</div>
	<!-- main-panel ends -->
		</div>
		<!-- page-body-wrapper ends -->
    </div>
		<!-- container-scroller -->
   

        <!-- script files -->
        <?php include('../template/scripts.php'); ?>
        <!-- end script files -->

        <script>
          $(document).ready(function(){
            //trigger add new button click
            $('.new_student').click(function(){
                start_load();
                setTimeout(function(){
                    end_load();
                }, 300);
            });
  
            //trigger update button click
            $('.update_student').click(function(){
                start_load();
                setTimeout(function(){
                    end_load();
                }, 300);
            });
          });

        </script>
  </body>
</html>