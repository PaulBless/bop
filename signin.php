    <?php 
    // include('./include/log_session.php'); 
    ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <title>BOP | SignIn </title>

    <!-- page meta tags --> 
	<meta content="Online revenue collection and payment, business operating permit processing application" name="description" />
    <meta content="Paul Eshun" name="author" />
    <!-- end meta data --> 

    <!-- browser icon --> 
    <link rel="shortcut icon" href="assets/images/logo2.png" type="image/png"/>

    <!-- base:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/base/vendor.bundle.base.css">
    <!-- end base css -->
    
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="assets/vendors/select2/select2.min.css">
    <link rel="stylesheet" href="assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">  
    <!-- End plugin css for this page -->
    
    <!-- inject:css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- sweet alert css --> 
    <link rel="stylesheet" href="assets/css/sweetalert2.min.css">
    <!-- toast css --> 
    <link rel="stylesheet" href="assets/css/toast.min.css">
    

    <style type="text/css"> 
        .auth .login-half-bg {
            /* background: url("assets/images/auth/featured-gallery-01.jpg"); */
            background-image: linear-gradient(0deg, rgba(255, 0, 150, 0.3), rgba(255, 0, 150, 0.3)), url(assets/images/auth/featured-gallery-01.jpg);
            background-size: cover;
            background-blend-mode: multiply;
        }
        .brand-logo img{
            align-content: center;
            text-align: center;
        }

      /* preloader style */
        #preloader{
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 9999;
            overflow: hidden;
            background: #ffffff82;
        }

        #preloader:before {
            content: "";
            position: fixed;
            top: calc(50% - 30px);
            left: calc(50% - 30px);
            border: 6px solid #1977cc;
            border-top-color: #d1e6f9;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            -webkit-animation: animate-preloader 1s linear infinite;
            animation: animate-preloader 1s linear infinite;
        } 

        @-webkit-keyframes animate-preloader {
        0% {
        transform: rotate(0deg);
        }
        100% {
        transform: rotate(360deg);
            }
        }

        @keyframes animate-preloader {
        0% {
        transform: rotate(0deg);
        }
        100% {
        transform: rotate(360deg);
            }
        }

        /* theme-loader style */
        .theme-loader{
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 9999;
        overflow: hidden;
        background: #f1f1f1;
            /* display: none; */
        }

        .theme-loader:before {
        content: "";
        position: fixed;
        top: calc(50% - 30px);
        left: calc(50% - 30px);
        border: 6px solid #464dee;
        border-top-color: #0ad7f7;
        border-radius: 50%;
        width: 60px;
        height: 60px;
        -webkit-animation: animate-preloader 1s linear infinite;
        animation: animate-preloader 1s linear infinite;
        } 

        @-webkit-keyframes animate-preloader {
            0% {
            transform: rotate(0deg);
            }
            100% {
            transform: rotate(360deg);
            }
        }

        @keyframes animate-preloader {
            0% {
            transform: rotate(0deg);
            }
            100% {
            transform: rotate(360deg);
            }
        }

    </style>
  </head>

  <body onload="loading()">
     
        <div class="container-scroller ">

            <!-- Pre-loader start : for page loading effect -->
            <div class="theme-loader"></div>
            <!-- Pre-loader end -->

            <div class="container-fluid page-body-wrapper full-page-wrapper">
                <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
                    <div class="row flex-grow">
                    <div class="col-lg-6 d-flex align-items-center justify-content-center bg-white">
                        <div class="auth-form-transparent text-left p-2">
                        <div class="brand-logo text-center">
                            <img src="assets/images/dashboard/uwada-logo.jpg" height="120" width="120" style="border-radius:50%;"> 
                            <h3 class="text-primary text-center font-weight-bold mb-2"> Business Operating Permit Application </h3>
                            <hr class="border-primary">
                        </div>

                        <h5 class="text-black text-center font-weight-light">Welcome back, please login to continue!</h5>
                        
                        <form class="pt-3" method="post" action="signin_logic.php" id="auth_form">
                        <!-- <form class="pt-3" method="post" id="auth_form"> -->
                            <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend bg-secondary">
                                <span class="input-group-text bg-light border-right-0">
                                    <i class="mdi mdi-account text-dark"></i>
                                </span>
                                </div>
                                <input type="text" name="loginid" class="form-control form-control-lg text-dark bg-white border-light" id="exampleInputEmail" placeholder="Enter Login ID" required>
                            </div>
                            </div>

                            <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend bg-secondary">
                                <span class="input-group-text bg-transparent border-right-0">
                                    <i class="mdi mdi-lock text-dark"></i>
                                </span>
                                </div>
                                <input type="password" name="password" class="form-control form-control-lg text-dark bg-white border-light" id="exampleInputPassword" placeholder="Enter Password" required>                        
                            </div>
                            </div>
                            <div class="my-2 d-flex justify-content-between align-items-center">
                            <div class="form-check">
                                <label class="form-check-label text-muted">
                                <input type="checkbox" class="form-check-input">
                                Keep me signed in
                                </label>
                            </div>
                            <a href="forgot" class="auth-link pwd-forget text-black">Forgotten password ?</a>
                            </div>
                            <div class="my-3">
                                <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-bold auth-form-btn" id="submit_btn"> <i class="mdi mdi-login mr-1"></i> LOG IN</button>
                            </div>
                            
                            <!-- <div class="text-center mt-4 font-weight-light">
                            Don't have an account? <a href="register-2.html" class="text-primary">Register</a>
                            </div> -->

                        </form>
                        </div>
                    </div>
                    <div class="col-lg-6 login-half-bg d-flex flex-row">
                        <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; 2022 - UWADA | Business Operating Permit Application. </p>
                    </div>
                    </div>
                </div>
            </div>   <!-- content-fluid- ends -->

        </div>  <!-- container-scroller -->
    
        
    <!-- script files -->
    <!-- base:js -->
    <script src="assets/vendors/base/vendor.bundle.base.js"></script>
    <!-- end inject -->
    
    <!-- inject:js -->
    <script src="assets/js/template.js"></script>
    <!-- end inject -->

    <!-- sweet alert plugin --> 
    <script src="assets/js/sweetalert.min.js"></script>
    <!-- toast alert plugin --> 
    <script src="assets/js/toast.min.js"></script>
    

    <script type="text/javascript">
      $(document).ready(function(e){
        $('#auth_form').submit(function(e){
            new Toast({
                message: 'Invalid Login Credentials!',
                type: 'danger'
            });
        });
       
      }); 
    </script>

    <script type="text/javascript">
      //start preloader on window function
        window.start_load = function(){
	      $('body').prepend('<div id="preloader"></div>')
        }
        
        //end preloader function
	     window.end_load = function(){
	      $('#preloader').fadeOut('slow', function() {
	        $(this).remove();
          })}
          
          // jquery window.unload method
        // window.onload = function(){
        //   $('.theme-loader').show();
        //   setTimeout(function(){
        //     $('.theme-loader').fadeToggle();
        //   }, 1500);
        // }

        //page loading function
        function loading(){
          $('.theme-loader').show();
          setTimeout(function(){
            $('.theme-loader').fadeToggle();
          }, 500);
        }
    </script>


    <!-- end script files -->

  </body>
</html>