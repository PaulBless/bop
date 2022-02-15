
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
        <div class="row">
						<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 mb-4 mb-xl-0">
							<div class="d-lg-flex ">
								<div style="margin-left: 30px">
                    <h2 class="text-dark font-weight-bold mb-2 ">Lecturers</h2>
								</div>
							</div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 mb-4 mb-xl-0" >
                            <div class="d-lg-flex">
                                <a data-toggle="modal" data-target="#" class="new_lecturer btn btn-primary font-weight-bold mb-3" style="float: right; "><i class="mdi mdi-account-plus"> </i> Add New Lecturer</a>
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
                          <th class=""> ID</th>
                          <th> Reg No</th>
                          <th> Full Name</th>
                          <th> Phone Number</th>
                          <th> Email ID</th>
                          <th> House Address </th>
                          <th> Emergency Contact Name</th>
                          <th> Emergency Contact No</th>
                          <th> Faculty Name</th>
                          <th> Login ID</th>
                          <!-- <th> Password</th> -->
                          <th> Avatar</th>
                          <th> Date Created</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td> 25</td>
                          <td> 4589</td>
                          <td> Name of Lecturer</td>
                          <td> Name of Lecturer</td>
                          <td> Name of Lecturer</td>
                          <td> Name of Lecturer</td>
                          <td> 0123456789</td>
                          <td> lecturer@osip.com  </td>
                          <td> BT 45, Workers Lane </td>
                          <td class="py-1"> <img src="../assets/images/faces/face7.jpg" alt="image"/> </td>
                          <td> <?php echo date('M d, Y'); ?> </td>
                        </tr>
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
                
                <!-- footer -->
                <?php include('../template/footer.php') ?>

                <?php //include('modals/add_lecturer.php'); ?>
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

  </body>
</html>