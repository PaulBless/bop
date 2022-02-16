<?php

require_once '../../functions/db_connect.php';

## get specific ayId
$academicID = "";
if(isset($_GET['ayid']))
	$academicID = $_GET['ayid'];

## prepare query statement
$delete_query = mysqli_query($myconn, "DELETE FROM `academic_year` WHERE ayid='$academicID'");
if($delete_query == true){
echo "<script>alert('Success!\\nAcademic year has been successfully deleted!')</script>";
echo"<script>window.location.href='academic-year.php'</script>";
}

?>