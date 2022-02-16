
<?php require_once('../config.php'); ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <title>BOP | Admin </title>

    <!-- page meta tags --> 
	  <meta content="Online revenue collection portal for mmda's" name="description" />
    <meta content="Paul Eshun" name="author" />
    <!-- end meta data --> 

    <!-- base:css -->
    <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/vendors/base/vendor.bundle.base.css">
    <!-- endinject -->
    
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <link rel="stylesheet" href="../assets/vendors/select2/select2.min.css">
    <link rel="stylesheet" href="../assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">  
    <!-- inject:css -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- endinject -->    
    <!-- plugin for sweetalert --> 
    <link rel="stylesheet" href="../assets/css/sweetalert2.min.css">
    <!-- end sweetaalert --> 
    
    <!-- browser icon --> 
    <link rel="shortcut icon" href="../assets/images/app-icon.png" type="image/png"/>


    <style type="text/css">
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