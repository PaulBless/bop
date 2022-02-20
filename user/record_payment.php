
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../jumper/images/logo2.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>BOP | Profile</title>

  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <meta content="" name=""/>

  <!--  Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  
  <!-- CSS Files -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <!-- CSS demo for scrollbar effect -->
  <link href="assets/demo/demo.css" rel="stylesheet" />

</head>

<body class="">
  <div class="wrapper ">
    
      <!-- sidebar  -->
    <div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        <a href="dashboard" class="simple-text logo-mini">
          <!-- <div class="logo-image-small">
            <img src="../jumper/images/logo2.png">
          </div> -->
          <!-- <p>BOP</p> -->
        </a>
        <a href="dashboard" class="simple-text logo-normal">
          <div class="logo-image-big">
            <img src="../jumper/images/uwada-logo.jpg" height="" width="50%">
          </div>
        </a>
        <small class="text-center text-uppercase text-success font-weight-bold" style="font-size:11.5px; ">Upper West Akim District Assembly </small> 
      </div>

      <div class="sidebar-wrapper">
        <ul class="nav">
          <li >
            <a href="dashboard">
              <i class="nc-icon nc-bank"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="active">
            <a href="record_payment">
              <i class="nc-icon nc-money-coins"></i>
              <p>Record Payment</p>
            </a>
          </li>
          <li>
            <a href="check_payments">
              <i class="nc-icon nc-single-copy-04"></i>
              <p>Check Payment</p>
            </a>
          </li>
          <li >
            <a href="profile">
              <i class="nc-icon nc-single-02"></i>
              <p>My Profile</p>
            </a>
          </li>
          <li>
            <a href="logout">
              <i class="nc-icon nc-lock-circle-open"></i>
              <p>Logout</p>
            </a>
          </li>
          
        </ul>
      </div>
    </div>
    <!-- end sidebar  -->

    <div class="main-panel">
      
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand text-uppercase text-success" href="javascript:void(0);">Business Operating Permit Application </a>
          </div>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
             
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <p>
                    <span class="d-lg-nonee d-md-block"> John Doe</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="profile">My Profile</a>
                  <a class="dropdown-item" href="logout">Logout</a>
                </div>
              </li>
              
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->

      <div class="content">
        
      <div class="row">
          <div class="col-md-8">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Record Payment</h5>
              </div>
              <div class="card-body">
                <form id="record_payment_form" method="POST">
                  <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Enter Receipt Number:</label>
                                <input name="receipt_number" id="receiptNumber" class="form-control" required/>
                            </div>
                        </div>
                  </div>

                  <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>Enter Business Unique ID</label>
                        <input type="text" class="form-control" name="business" placeholder="UWADA/201/BT/123" id="businessId" required>
                        <input type="hidden" class="form-control" id="businessId" >
                      </div>
                    </div>
                    <div class="col-md-5 px-1">
                      <div class="form-group">
                        <label>Business Name</label>
                        <input type="text" class="form-control" disabled="" placeholder="">
                      </div>
                    </div>
                    <div class="col-md-3 pl-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Location </label>
                        <input type="text" class="form-control"disabled=""  placeholder="">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Payment Amount <span class="text-danger">GHC</span> </label>
                        <input type="text" class="form-control" placeholder="250" id="paymentAmount" onkeypress="return checkNumbers(event);" maxLength="8" name="payment_amount" required>
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Payment Date</label>
                        <input type="date" class="form-control" name="payment_date" required>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Revenue Collector Name</label>
                        <select name="revenue_collector" id="revenueCollector" class="form-control" required>
                            <option disable hidden selected value="">Choose an Option</option>
                            <option>Gideon Agyare</option>
                            <option>Aaron Kwakye</option>
                            <option>Eugene Amponsah</option>
                        </select>
                      </div>
                    </div>
                  </div>


                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Transaction Description</label>
                        <textarea name="description" class="form-control textarea" placeholder="Part payment of BOP bill for the year 2022."></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <button type="submit" class="btn btn-success btn-round mr-3">Save Payment Transaction</button>
                      <button type="button" onclick="window.location.href ='dashboard'" class="btn btn-danger btn-round">Cancel </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          
        </div>
        
       
      </div>
      
        <!-- footer start -->
      <footer class="footer footer-black  footer-white ">
        <div class="container-fluid">
          <div class="row">
            <nav class="footer-nav">
              <ul>
                <li><a href="javascript:void(0)" >UWADA</a></li>
                <li><a href="javascript:void(0)" >Business Operating Permit Application</a></li>
              </ul>
            </nav>
            <div class="credits ml-auto">
              <span class="copyright">
                © <script>
                  document.write(new Date().getFullYear())
                </script>, Powered by Jecmas
              </span>
            </div>
          </div>
        </div>
      </footer>
      <!-- footer end  -->      
    </div>
  </div>


<!-- Core JavaScripts Files-->
  <script src="assets/js/core/jquery.min.js"></script>
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  
  <!-- Chart JS -->
  <script src="assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script>
  <!-- DEMO methods, for scroll bars -->
  <script src="assets/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
      demo.initChartsPages();
    });
  </script>

</body>

</html>
