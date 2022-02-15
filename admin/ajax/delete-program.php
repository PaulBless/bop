<?php

require_once '../../functions/db_connect.php';

## get specific ayId
$programID = "";
if(isset($_GET['pid']))
	$programID = $_GET['pid'];

## nprepare query statement
$delete_query = mysqli_query($myconn, "DELETE FROM `programmes` WHERE pid='$programID'");
if($delete_query == true){
echo "<script>alert('Success!\\nProgramme has been successfully deleted!')</script>";
echo"<script>window.location.href='programmes.php'</script>";
}

?>