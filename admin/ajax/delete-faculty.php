<?php

require_once '../../functions/db_connect.php';

## get specific facultyId
$facultyId = "";
if(isset($_GET['facultyid']))
	$facultyId = $_GET['facultyid'];

## nprepare query statement
$delete_query = mysqli_query($myconn, "DELETE FROM `faculty` WHERE facultyid='$facultyId'");
if($delete_query == true){
echo "<script>alert('Success!\\nThis faculty record has been permanently deleted!')</script>";
echo"<script>window.location.href='faculties.php'</script>";
}

?>