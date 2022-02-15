<?php

require_once '../../functions/dbController.php';
require_once '../../functions/Students.php';
$db_handle = new dbController();  //new instance of db controller class


## get specific studentid
$studentId = "";
if(isset($_GET['studentid']))
	$studentId = $_GET['studentid'];

## new object of students class
$student = new Students();
$student->deleteStudent($studentId);
if(!empty($student)){
echo "<script>alert('Success!\\nThis student record has been permanently deleted!')</script>";
echo"<script>window.location.href='students.php'</script>";
}

?>