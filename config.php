<?php

// Get Site Address Dynamically
$site_addr = (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] !== "off" ? "https" : "http") . "://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["SCRIPT_NAME"]);

//Must end with /
$site_addr = rtrim($site_addr, "/\\") . "/";

// Session Timeout for 10mins
// $inactive = 600; 
// $session_life = time() - $_SESSION['timeout'];

// if($session_life > $inactive) {
//    session_destroy();
//    $redirect = "";
//    header('location: "'.$redirect.'"');
// }

// $_SESSION['timeout']=time();


?>