    <!-- include admin log session -->
    <?php 
    // include('./include/log_session.php'); 
    ?>
   <!-- end session include -->


  <body onload="loading()">
     <!-- page template -->
        <?php include('../template/header.php'); ?>
        <!-- end page templating --> 

        <div class="container-scroller ">
            <!-- Pre-loader start : for page loading effect -->
            <div class="theme-loader"></div>
            <!-- Pre-loader end -->

            <div class="container-fluid page-body-wrapper full-page-wrapper">
                <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
                    <div class="row flex-grow">
                    <div class="col-lg-6 d-flex align-items-center justify-content-center bg-darkk">
                        <div class="auth-form-transparent text-left p-2">
                        <div class="brand-logo">
                            <h3 class="text-info text-center font-weight-bold mb-2">Online Student Information Portal </h3>
                        <!-- </div> -->
                        <h4 class="text-info text-center font-weight-bold">Admin Login Center </h4>
                        <hr class="border-light">
                        </div>
                        <h6 class="text-black text-center font-weight-light">Welcome admin, please login to your dashboard!</h6>
                        <form class="pt-3">
                            <div class="form-group">
                            <label for="exampleInputEmail">Login ID</label>
                            <div class="input-group">
                                <div class="input-group-prepend bg-secondary">
                                <span class="input-group-text bg-light border-right-0">
                                    <i class="mdi mdi-account text-primary"></i>
                                </span>
                                </div>
                                <input type="text" name="loginid" value="" class="form-control form-control-lg text-white bg-dark border-light" id="exampleInputEmail" placeholder="Username">
                            </div>
                            </div>

                            <div class="form-group">
                            <label for="exampleInputPassword">Password</label>
                            <div class="input-group">
                                <div class="input-group-prepend bg-secondary">
                                <span class="input-group-text bg-transparent border-right-0">
                                    <i class="mdi mdi-lock text-primary"></i>
                                </span>
                                </div>
                                <input type="password" name="password" value="" class="form-control form-control-lg text-white bg-dark border-light" id="exampleInputPassword" placeholder="Password">                        
                            </div>
                            </div>
                            <div class="my-2 d-flex justify-content-between align-items-center">
                            <div class="form-check">
                                <label class="form-check-label text-muted">
                                <input type="checkbox" class="form-check-input">
                                Keep me signed in
                                </label>
                            </div>
                            <a href="#" class="auth-link pwd-forget text-black">Forgot password?</a>
                            </div>
                            <div class="my-3">
                            <a class="btn btn-block btn-primary btn-lg font-weight-bold auth-form-btn" href=""> <i class="mdi mdi-arrow-right"></i> L O G I N</a>
                            </div>
                            
                            <div class="text-center mt-4 font-weight-light">
                            Don't have an account? <a href="register-2.html" class="text-primary">Register</a>
                            </div>
                        </form>
                        </div>
                    </div>
                    <div class="col-lg-6 login-half-bg d-flex flex-row">
                        <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; 2021 - All rights reserved | Online Student Information Portal.</p>
                    </div>
                    </div>
                </div>
            </div>   <!-- content-fluid- ends -->

        </div>  <!-- container-scroller -->
    
        
        <!-- script files -->
        <?php include('../template/scripts.php'); ?>
        <!-- end script files -->

  </body>
</html>