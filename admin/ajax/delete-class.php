<?php

require_once '../../functions/db_connect.php';

## get specific classId
$classId = "";
if(isset($_GET['classid']))
	$classId = $_GET['classid'];

## nprepare query statement
$delete_query = mysqli_query($myconn, "DELETE FROM `classes` WHERE classid='$classId'");
if($delete_query == true){
echo "<script>alert('Success!\\nClass has been permanently deleted!')</script>";
echo"<script>window.location.href='classes.php'</script>";
}

?>