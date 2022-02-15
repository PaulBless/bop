<?php 
session_start();
error_reporting(E_ALL ^ E_NOTICE);

if(ISSET($_POST['btnupdate'])){
    require ('../functions/db_connect.php');
    
    $bool = true;
    $session_name= ucwords(trim(htmlspecialchars($_POST['name'])));
    $description= ucwords(trim(htmlspecialchars($_POST['description'])));
    $session_id= trim(htmlspecialchars($_POST['session_id']));

    // prepare query to update record
    $query = "UPDATE `session` SET `name` = '$session_name', `description` = '$description' WHERE sessionid = '$session_id'";
    $execute_update = mysqli_query($myconn, $query);
    if($execute_update == true)
    {
        echo "<script>alert('Session record updated!'); document.location.href='sessions.php'</script>";
    }
}


?>