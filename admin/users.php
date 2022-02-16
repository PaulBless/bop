
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
                                    <h2 class="text-dark font-weight-bold mb-2 ">Users</h2>
								</div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 mb-4 mb-xl-0" >
                            <div class="d-lg-flex">
                                <a href="" target="_self" data-toggle="modal" data-target="#add_user" class="new_user btn btn-primary font-weight-bold mb-3" style="float: right; "><i class="mdi mdi-account-plus"> </i> Add User</a>
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
                <!-- <a href="" target="_self" data-toggle="modal" data-target="#add_user" class="new_user btn btn-primary btn-rounded font-weight-bold mb-2" style="float: right; "><i class="mdi mdi-account-plus"> </i> Add Candidate</a> -->
                  <!-- <h4 class="card-title text-center">List of Lecturers</h4> -->
                  <div class="table-responsive">
                                <table class="table table-hover table-bordered" width="100%">
                                <thead class="bg-dark text-white">
                                    <tr>
                                    <th class="hidden"> No.</th>
                                    <th style="display: none;;"> ID</th>
                                    <th> User ID</th>
                                    <th> Full Name</th>
                                    <th> Phone Number</th>
                                    <th> House Address </th>
                                    <th> Email ID</th>
                                    <th> Login ID</th>
                                    <th style="display: none;;"> Password</th>
                                    <th> Avatar</th>
                                    <th> Date Created</th>
                                    <th> Operation</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    ## require db connection
                                    require '../functions/db_connect.php';

                                    $bool = false;  // set flag
                                    $query1=mysqli_query($myconn, "SELECT * FROM `admin` ORDER BY `firstname` ASC");
                                    $cnt=1;
                                
                                    //fetch[0]['name'];
                                    while($records=mysqli_fetch_array($query1)){
                                    //get user id
                                    $user_id = $records['userid'];
                                    ?>

                                    <tr>
                                    <td><?php echo $cnt; ?></td>
                                    <td class="" style="display: none;;"><?php echo $records['userid']; ?></td>
                                    <td> <?php echo $records['reg_no']; ?></td>
                                    <td> <?php echo $records['lastname'] .", ". $records['firstname']; ?></td>
                                    <td> <?php echo $records['phoneno']; ?></td>
                                    <td> <?php echo $records['address']; ?></td>
                                    <td> <?php echo $records['email']; ?> </td>
                                    <td> <?php echo $records['username']; ?>  </td>
                                    <td style="display: none;;"> <?php echo $records['password']; ?>  </td>
                                    <td class="py-1"> <img src="../uploads/<?php echo $records['avatar']; ?>" alt="image"/> </td>
                                    <td> <?php echo date('d M, Y', strtotime($records['create_on'])); ?></td>
                                    <td class="datatable-ct">
                  
                                    <!--update link-->
                                    <a title="Click to update" id="<?php echo $records['userid'] ?>" href="#edit_user<?php echo $records['userid'] ?>"  data-toggle="modal" class="btn btn-info btn-sm update_user"> <i class="mdi mdi-pencil"></i> </a>
                                    <?php include('modals/edit_user.php'); ?>

                                    <!-- delete link -->
                                     <a title="Click to delete" class="btn btn-danger btn-sm" href="ajax/delete-user.php?userid=<?php echo htmlentities($records['userid']);?>" onclick="return confirm('Do you really want to delete this user, with Registration #: <?php echo htmlentities($records['reg_no']) ?> from the system?')"><i class="mdi mdi-delete"></i> </a>
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
                
                <!-- footer -->
                <?php include('../template/footer.php') ?>
	    <!-- partial -->
		</div>
	<!-- main-panel ends -->
		</div>
		<!-- page-body-wrapper ends -->
    </div>
		<!-- container-scroller -->
                                
        <!-- add modal dialogs -->
        <?php include('modals/add_user.php'); ?>

        <!-- script files -->
        <?php include('../template/scripts.php'); ?>
        <!-- end script files -->

        <script>
            $(document).ready(function(){

            //trigger add new button click
            $('.new_user').click(function(){
                start_load();
                setTimeout(function(){
                    end_load();
                }, 300);
            });
  
            //trigger update button click
            $('.update_user').click(function(){
                start_load();
                setTimeout(function(){
                    end_load();
                }, 300);
            });

           
            // trigger form submit function
		    $('#form_add_user').submit(function(e){
            //   e.preventDefault();
            //   start_load()
            //   $('#msg').html('')
            //   $.ajax({
            //      url:'./ajax/new-user.php',
            //      method:'POST',
            //     data:$(this).serialize(),
            //       success:function(resp){
            //           if(resp == 1){
            //            $('#msg').html('<div class="alert alert-success"> <i class="mdi mdi-bell mx-0"></i> Data successfully saved.</div>')
            //             setTimeout(function(){
            //                location.reload()	
            //               }, 1000)
            //             }else if(resp == 2){
            //              $('#msg').html('<div class="alert alert-danger"><i class="mdi mdi-account-off"></i> Record with same details already exist.</div>')
            //              end_load()
            //             }
            //         }
			// })
        })
        
	})
        </script>
  </body>
</html>