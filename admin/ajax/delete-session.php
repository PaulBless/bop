<?php

require_once '../../functions/db_connect.php';

## get specific sessioncID
$sessionID = "";
if(isset($_GET['sessionid']))
	$sessionID = $_GET['sessionid'];

## nprepare query statement
$delete_query = mysqli_query($myconn, "DELETE FROM `session` WHERE sessionid='$sessionID'");
if($delete_query == true){
echo "<script>alert('Success!\\nSession has been permanently deleted!')</script>";
echo"<script>window.location.href='sessions.php'</script>";
}

?>