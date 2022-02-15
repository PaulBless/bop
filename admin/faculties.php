
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
                  <h2 class="text-dark font-weight-bold mb-2 ">Faculties</h2>
								</div>
							</div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 mb-4 mb-xl-0" >
                <div class="d-lg-flex">
                  <a href="#add_faculty" data-toggle="modal" data-target="#" class="new_faculty btn btn-primary font-weight-bold mb-3" style="float: right; "><i class="mdi mdi-account-plus"> </i> Add New Faculty</a>
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
                          <th>No.</th>
                          <th style="display: none;"> ID</th>
                          <th> Faculty Name</th>
                          <th> Description</th>
                          <th> Date Added</th>
                          <th> Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                                    ## reauire db connection
                                    require '../functions/db_connect.php';

                                    $bool = false;  // set flag
                                    $query1=mysqli_query($myconn, "SELECT * FROM `faculty` ORDER BY `facultyid` ASC");
                                    $cnt=1;
                                
                                    //fetch[0]['name'];
                                    while($records=mysqli_fetch_array($query1)){
                                    //get user id
                                    $faculty_id = $records['facultyid'];
                                    ?>

                                    <tr>
                                    <td><?php echo $cnt; ?></td>
                                    <td class="" style="display: none;"><?php echo $records['facultyid']; ?></td>
                                    <td> <?php echo $records['name']; ?></td>
                                    <td> <?php echo $records['description']; ?></td>
                                    <td> <?php echo date('d M, Y', strtotime($records['add_date'])); ?></td>
                                    <td class="datatable-ct">
                  
                                    <!--update link-->
                                    <a title="Click to update" id="<?php echo $records['facultyid'] ?>" href="#edit_faculty<?php echo $records['facultyid'] ?>"  data-toggle="modal" class="btn btn-info btn-sm update_faculty" href=""> <i class="mdi mdi-pencil"></i> </a>

                                    <!-- delete link -->
                                     <a title="Click to delete" class="btn btn-danger btn-sm" href="ajax/delete-faculty.php?facultyid=<?php echo htmlentities($records['facultyid']);?>" onclick="return confirm('Do you really want to delete this faculty, with name: <?php echo htmlentities($records['name']) ?> from the system?')"><i class="mdi mdi-delete"></i> </a>
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
                <!-- add modal dialogs --> 
                <?php include('modals/add_faculty.php'); ?>
                <?php include('modals/edit_faculty.php'); ?>


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
            $('.new_faculty').click(function(){
                start_load();
                setTimeout(function(){
                    end_load();
                }, 300);
            });
  
            //trigger update button click
            $('.update_faculty').click(function(){
                start_load();
                setTimeout(function(){
                    end_load();
                }, 300);
            });
          });

        </script>
  </body>
</html>