    <!-- include admin log session -->
    <?php // include('./include/log_session.php'); ?>
   <!-- end session include -->


  <body onload="loading()">
    <div class="container-scroller ">
         
        <!-- Pre-loader start : for page loading effect -->
         <div class="theme-loader"></div>
         <!-- Pre-loader end -->

		<!-- partial:partials/_horizontal-navbar.html -->
        <div class="horizontal-menu">

        <!-- include header from template -->
        <?php include('../template/header.php'); ?>
        <!-- include top navbar -->
        <?php include('../template/top-nav.php'); ?>
        <!-- include menu bar from template -->
        <?php include('../template/menu.php'); ?>
        <!-- end page templating -->

      
        </div>
    
    <!-- partial -->
		<div class="container-fluid page-body-wrapper">
			<div class="main-panel">
				<div class="content-wrapper">
                	<!-- record list -->
                    <div class="row">
						<div class="col-lg-2 grid-margin stretch-card">
							<div class="card">
								<div class="card-body pb-0">
									<div class="d-flex align-items-center justify-content-between">
										<h2 class="text-success font-weight-bold">18390</h2>
										<i class="mdi mdi-account-multiple mdi-18px text-dark"></i>
									</div>
								</div>
								<canvas id="newClient"></canvas>
								<div class="line-chart-row-title">Total Collectors</div>
							</div>
						</div>
						<div class="col-lg-2 grid-margin stretch-card">
							<div class="card">
								<div class="card-body pb-0">
									<div class="d-flex align-items-center justify-content-between">
										<h2 class="text-danger font-weight-bold">839</h2>
										<i class="mdi mdi-account-outline mdi-18px text-dark"></i>
									</div>
								</div>
								<canvas id="allProducts"></canvas>
								<div class="line-chart-row-title">Total Stores</div>
							</div>
						</div>
						<div class="col-lg-2 grid-margin stretch-card">
							<div class="card">
								<div class="card-body pb-0">
									<div class="d-flex align-items-center justify-content-between">
										<h2 class="text-info font-weight-bold">244</h2>
										<i class="mdi mdi-human-male-female mdi-18px text-dark"></i>
									</div>
								</div>
								<canvas id="invoices"></canvas>
								<div class="line-chart-row-title">Total Users</div>
							</div>
						</div>
						<div class="col-lg-2 grid-margin stretch-card">
							<div class="card">
								<div class="card-body pb-0">
									<div class="d-flex align-items-center justify-content-between">
										<h2 class="text-warning font-weight-bold">3259</h2>
										<i class="mdi mdi-folder-outline mdi-18px text-dark"></i>
									</div>
								</div>
								<canvas id="projects"></canvas>
								<div class="line-chart-row-title">Containers</div>
							</div>
						</div>
						<div class="col-lg-2 grid-margin stretch-card">
							<div class="card">
								<div class="card-body pb-0">
									<div class="d-flex align-items-center justify-content-between">
										<h2 class="text-secondary font-weight-bold">586</h2>
										<i class="mdi mdi-folder-outline mdi-18px text-dark"></i>
									</div>
								</div>
								<canvas id="orderRecieved"></canvas>
								<div class="line-chart-row-title">Food Joints</div>
							</div>
						</div>
						<div class="col-lg-2 grid-margin stretch-card">
							<div class="card">
								<div class="card-body pb-0">
									<div class="d-flex align-items-center justify-content-between">
										<h2 class="text-dark font-weight-bold">7826</h2>
										<i class="mdi mdi-cube text-dark mdi-18px"></i>
									</div>
								</div>
								<canvas id="transactions"></canvas>
								<div class="line-chart-row-title">Facilities</div>
							</div>
						</div>
					</div>
                    <!-- end record lists -->
                   
					<!-- statistics & analysis  -->
                    <div class="row">
						<div class="col-sm-12 flex-column d-flex stretch-card">
							<div class="row">
								<div class="col-lg-3 d-flex grid-margin stretch-card">
									<div class="card sale-diffrence-border">
										<div class="card-body">
											<h2 class="text-dark mb-2 font-weight-bold">$6475</h2>
											<h4 class="card-title mb-2">Collection Statistics</h4>
											<small class="text-muted">APRIL 2022</small>
										</div>
									</div>
                                </div>
								
								<div class="col-lg-3 d-flex grid-margin stretch-card">
									<div class="card sale-diffrence-border">
										<div class="card-body">
											<h2 class="text-dark mb-2 font-weight-bold">$6475</h2>
											<h4 class="card-title mb-2">Collection Statistics</h4>
											<small class="text-muted">APRIL 2022</small>
										</div>
									</div>
                                </div>
                                
								<div class="col-lg-3 d-flex grid-margin stretch-card">
									<div class="card sale-visit-statistics-border">
										<div class="card-body">
											<h2 class="text-dark mb-2 font-weight-bold">$3479</h2>
											<h4 class="card-title mb-2">Payment Statistics</h4>
											<small class="text-muted">APRIL 2022</small>
										</div>
									</div>
                                </div>

                                <div class="col-lg-3 d-flex grid-margin stretch-card">
									<div class="card sale-visit-statistics-border">
										<div class="card-body">
											<h2 class="text-dark mb-2 font-weight-bold">$3479</h2>
											<h4 class="card-title mb-2">Visit Statistics</h4>
											<small class="text-muted">APRIL 2019</small>
										</div>
									</div>
								</div>
                            </div>
						</div>
					</div>

					<!-- summary chart  -->
                    <div class="row">
								<div class="col-sm-12 grid-margin d-flex stretch-card">
									<div class="card">
										<div class="card-body">
											<div class="d-flex align-items-center justify-content-between">
												<h4 class="card-title mb-2">Collection & Payments Statistics </h4>
												<div class="dropdown">
													<a href="#" class="text-success btn btn-link  px-1"><i class="mdi mdi-refresh"></i></a>
													<a href="#" class="text-success btn btn-link px-1 dropdown-toggle dropdown-arrow-none" data-toggle="dropdown" id="settingsDropdownsales">
														<i class="mdi mdi-dots-horizontal"></i></a>
														<div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="settingsDropdownsales">
															<a class="dropdown-item">
																<i class="mdi mdi-grease-pencil text-primary"></i>
																Edit
															</a>
															<a class="dropdown-item">
																<i class="mdi mdi-delete text-primary"></i>
																Delete
															</a>
														</div>
												</div>
											</div>
											<div>
												<ul class="nav nav-tabs tab-no-active-fill" role="tablist">
													<li class="nav-item">
														<a class="nav-link active pl-2 pr-2" id="revenue-for-last-month-tab" data-toggle="tab" href="#revenue-for-last-month" role="tab" aria-controls="revenue-for-last-month" aria-selected="true">Revenue for last month</a>
													</li>
													<li class="nav-item">
														<a class="nav-link pl-2 pr-2" id="server-loading-tab" data-toggle="tab" href="#server-loading" role="tab" aria-controls="server-loading" aria-selected="false">Server loading</a>
													</li>
													<li class="nav-item">
														<a class="nav-link pl-2 pr-2" id="data-managed-tab" data-toggle="tab" href="#data-managed" role="tab" aria-controls="data-managed" aria-selected="false">Data managed</a>
													</li>
													<li class="nav-item">
														<a class="nav-link pl-2 pr-2" id="sales-by-traffic-tab" data-toggle="tab" href="#sales-by-traffic" role="tab" aria-controls="sales-by-traffic" aria-selected="false">Sales by traffic</a>
													</li>
												</ul>
												<div class="tab-content tab-no-active-fill-tab-content">
													<div class="tab-pane fade show active" id="revenue-for-last-month" role="tabpanel" aria-labelledby="revenue-for-last-month-tab">
														<div class="d-lg-flex justify-content-between">
															<p class="mb-4">+5.2% vs last 7 days</p>
															<div id="revenuechart-legend" class="revenuechart-legend">f</div>
														</div>
														<canvas id="revenue-for-last-month-chart"></canvas>
													</div>
													<div class="tab-pane fade" id="server-loading" role="tabpanel" aria-labelledby="server-loading-tab">
														<div class="d-flex justify-content-between">
															<p class="mb-4">+5.2% vs last 7 days</p>
															<div id="serveLoading-legend" class="revenuechart-legend">f</div>
														</div>
														<canvas id="serveLoading"></canvas>
													</div>
													<div class="tab-pane fade" id="data-managed" role="tabpanel" aria-labelledby="data-managed-tab">
														<div class="d-flex justify-content-between">
															<p class="mb-4">+5.2% vs last 7 days</p>
															<div id="dataManaged-legend" class="revenuechart-legend">f</div>
														</div>
														<canvas id="dataManaged"></canvas>
													</div>
													<div class="tab-pane fade" id="sales-by-traffic" role="tabpanel" aria-labelledby="sales-by-traffic-tab">
														<div class="d-flex justify-content-between">
															<p class="mb-4">+5.2% vs last 7 days</p>
															<div id="salesTrafic-legend" class="revenuechart-legend">f</div>
														</div>
														<canvas id="salesTrafic"></canvas>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

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

  </body>
</html>