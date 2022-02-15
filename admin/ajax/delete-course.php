<?php

require_once '../../functions/db_connect.php';

## get specific courseId
$courseId = "";
if(isset($_GET['courseid']))
	$courseId = $_GET['courseid'];

## nprepare query statement
$delete_query = mysqli_query($myconn, "DELETE FROM `courses` WHERE courseid='$courseId'");
if($delete_query == true){
echo "<script>alert('Success!\\nCourse has been permanently deleted!')</script>";
echo"<script>window.location.href='courses.php'</script>";
}

?>