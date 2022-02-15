<?php

session_start();    // start session
include ('../functions/db_connect.php');    // include database connection

if(!isset($_SESSION['admin']) || trim($_SESSION['admin']) == ''){
    header('location: index.php');
}

$sql = "SELECT * FROM `admin` WHERE `userid` = '".$_SESSION['admin']."'";
$query = $myconn->query($sql); // run query to db
$user = $query->fetch_assoc();  //fetch results

?>