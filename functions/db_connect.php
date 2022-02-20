<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "bop_database";

$myconnection = new mysqli('localhost','root','','bop_database')or die("Could not connect to MySQL Server\\n".mysqli_error($myconnection));

?>