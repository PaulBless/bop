
  <body onload="loading()">
    <div class="container-scroller ">
		<!-- Pre-loader start -->
        <div class="theme-loader"></div>
        <!-- Pre-loader end -->

		<!-- partial:partials/_horizontal-navbar.html -->
        <div class="horizontal-menu">

        <?php include('../template/header.php'); ?>
        <?php include('../template/custom-page-styles.php'); ?>
        <?php include('../template/top-nav.php'); ?>
        <?php include('../template/menu.php'); ?>

      
        </div>
    
    <!-- partial -->
		<div class="container-fluid page-body-wrapper">
			<div class="main-panel">
				<div class="content-wrapper">
                   <!-- page title -->
                        <div class="row">
                            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 mb-4 mb-xl-0">
                                <div class="d-lg-flex align-items-left justify-items-justify">
                                    <div style="margin-left: 30px">
                                        <h2 class="text-dark font-weight-bold mb-2 ">Users Accounts</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 mb-4 mb-xl-0">
                                <div class="d-lg-flex align-items-left justify-items-justify">
                                    <div style="margin-left: 30px"> 
                                        <a data-toggle="modal" data-target="#add_user" class="btn btn-block btn-info btn-rounded new_user"">
                                            <i class="mdi mdi-account-plus mb-2"></i>
                                            Add New User
                                        </a>
                                        <?php include('./modals/add_user.php'); ?>
                                </div>
                                </div>
                            </div>                            
                        </div> 
                        <hr class="border-info"> <!-- add horizontal line -->
                        <!-- end page title-->

                                
                
                        <div class="row">
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                            <!-- <h4 class="card-title text-center">List of Lecturers</h4> -->
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered" width="100%">
                                <thead class="bg-dark text-white">
                                    <tr>
                                    <th class="hidden"> S/No.</th>
                                    <th> ID</th>
                                    <th> Registration No</th>
                                    <th> Full Name</th>
                                    <th> Phone Number</th>
                                    <th> House Address </th>
                                    <th> Email ID</th>
                                    <th> Login ID</th>
                                    <th> Password</th>
                                    <th> Avatar</th>
                                    <th> Date Created</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    ## reauire db connection
                                    require '../functions/db_connect.php';

                                   // $bool = false;  // set flag
                                    $query1=mysqli_query($myconn, "SELECT * FROM `admin` ORDER BY `firstname` ASC");
                                    $cnt=1;
                                
                                //fetch[0]['name'];
                                    while($records=mysqli_fetch_array($query1)){
                                    //get lecturer id
                                    $admin_id = $records['userid'];
                                    ?>

                                    <tr>
                                    <td><?php echo $cnt; ?></td>
                                    <td><?php echo $records['userid']; ?></td>
                                    <td> <?php echo $records['reg_no']; ?></td>
                                    <td> <?php echo $records['lastname'] .", ". $records['firstname']; ?></td>
                                    <td> <?php echo $records['mobileno']; ?></td>
                                    <td> <?php echo $records['address']; ?></td>
                                    <td> <?php echo $records['email']; ?> </td>
                                    <td> <?php echo $records['loginid']; ?>  </td>
                                    <td> <?php echo $records['password']; ?>  </td>
                                    <td class="py-1"> <img src="../uploads/<?php echo $records['avatar']; ?>" alt="image"/> </td>
                                    <td> <?php echo date('d M, Y', strtotime($records['date_created'])); ?></td>
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
   
    <!-- script files -->
    <?php include('../template/scripts.php'); ?>
    <!-- end script files -->

    <!-- custom page script plugin --> 
    <?php include('../template/custom-page-script.php'); ?>

    <!-- validation script -->
    <?php include('../functions/form-validation.js'); ?>

    <script>
        $(document).ready(function(){
           
            //trigger add new cutton click
            $('.new_user').click(function(){
                start_load();
                setTimeout(function(){
                    end_load();
                }, 500);
            });

            //trigger form submit
            $('#form_add_new').submit(function(e){
                e.preventDefault();
                start_load();
                $('#msg').html('')
                $.ajax({
                    url: 'new-user.php',
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(response){
                        if(response == 1) // success
                        {
                        $('#msg').html('<div class="alert alert-success">User added successfullly.</div>')
                            setTimeout(function(){
                                location.reload()
                            }, 1000)
                        }else if(response == 2) // error
                        {
                        $('#msg').html('<div class="alert alert-danger"> User already exists.</div>')
						end_load();
                        }
                    }
                    
                })
            });
        });

    </script>

  </body>
</html>