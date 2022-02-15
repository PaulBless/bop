<?php

require_once '../../functions/dbController.php';
require_once '../../functions/Lecturers.php';
$db_handle = new dbController();  //new instance of db controller class


## get specific lecturerId
$lecturerId = "";
if(isset($_GET['lecturerid']))
	$lecturerId = $_GET['lecturerid'];

## new object of lecturers class
$lecturer = new Lecturers();
$lecturer->deletelecturer($lecturerId);
if(!empty($lecturer)){
echo "<script>alert('Success!\\nThis lecturer has been permanently deleted!')</script>";
echo"<script>window.location.href='lecturers.php'</script>";
}

?>