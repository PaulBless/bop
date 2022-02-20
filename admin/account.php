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
                    <!-- profile form -->
                    <div class="row">
						<form method="post">

                        </form>
					</div>
                    <!-- end profile -->
   
                    
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