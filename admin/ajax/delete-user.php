<?php

require_once '../../functions/dbController.php';
require_once '../../functions/Users.php';
$db_handle = new dbController();  //new instance of db controller class


## get specific userid
$userId = "";
if(isset($_GET['userid']))
	$userId = $_GET['userid'];

## new object of users class
$user = new Users();
$user->deleteAdmin($adminId);
if(!empty($user)){
echo "<script>alert('Success!\\nThis user record has been permanently deleted!')</script>";
echo"<script>window.location.href='users.php'</script>";
//echo"<script>window.location.href='users.php'</script>";
}

?>