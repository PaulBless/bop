
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

      <style>
        .hk-button--primary {
            background-clip: border-box!important;
            background-origin: border-box!important;
            background: #79589f;
            color: #fff;
        }
      </style>
        </div>
    
    <!-- partial -->
		<div class="container-fluid page-body-wrapper">
			<div class="main-panel">
				<div class="content-wrapper">
        <div class="row">
						<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 mb-4 mb-xl-0">
							<div class="d-lg-flex ">
								<div style="margin-left: 30px">
                    <h2 class="text-dark font-weight-bold mb-2 ">Receipts</h2>
								</div>
							</div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 mb-4 mb-xl-0" >
                            <div class="d-lg-flex">
                                <a class="add_new btn btn-primary font-weight-bold mb-3" style="float: right; "><i class="mdi mdi-plus"> </i> Add New Receipt</a>
                            </div>
                        </div>
                        <hr class="border-dark">
                    </div>
                    <!-- end page title-->

                    <!-- lecturers list -->
                    <div class="row">
                    <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-hover table-bordered" width="100%">
                      <thead class="bg-dark text-white">
                        <tr>
                          <th> ID</th>
                          <th> Start No</th>
                          <th> End No</th>
                          <th> Given By</th>
                          <th> Entry By</th>
                          <th> Date Added</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td> 1</td>
                          <td> 400100</td>
                          <td> 400150</td>
                          <td> Account Officer </td>
                          <td> Budget Officer </td>
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

        <!-- Modal Dialog  -->
      <div class="modal fade in" id="add_form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" > 
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                   <h4 class="card-title text-white font-weight-bold">Add New Receipt </h4>
                    <button type="button" class="close text-white font-weight-bold" data-dismiss="modal" aria-hidden="true">X</button>
                </div>
                    
                <div class="modal-body">
                    <form class="forms-sample" method="POST">
                    
                        <div id="msg" class="form-group"></div>

                        <div class="form-group row">
                        <label for="exampleInputFName" class="col-sm-6 col-form-label text-dark">Receipt Start Number</label>
                        <input type="text" name="receipt-start" class="form-control col-sm-5 text-dark border-secondary" id="inputstart" placeholder="eg. 000100" required>
                        </div>
                        
                        <div class="form-group row">
                        <label for="exampleInputFName" class="col-sm-6 col-form-label text-dark">Receipt End Number</label>
                        <input type="text" name="receipt-end" class="form-control col-sm-5 text-dark border-secondary" id="inputend" placeholder="eg. 000150" required>
                        </div>
                        
                        <div class="form-group row">
                        <label for="issuer" class="col-sm-6 col-form-label text-dark">Receipt Given By</label>
                        <select name="issuer" id="" class="col-sm-5 form-control border-secondary">
                          <option value="">Select</option>
                          <option value="">First name</option>
                          <option value="">Second name</option>
                        </select>
                        </div>
                        
                        
                        <!-- button group --> 
                        <div class="d-flex align-items-center justify-content-center">
                            <button type="submit" class="col-md-6 btn btn-success btn-lg btn-rounded mr-2" id="add">Save Receipt</button>
                            <button class="col-md-3 btn btn-danger btn-lg btn-rounded" data-dismiss="modal">Cancel</button>
                        </div>

                    </form>
                </div>
                    
				</div>
            </div>
    </div>

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
      $('.add_new').click(function(e){
        $('#add_form').modal('show');
      });
    </script>
  </body>
</html>