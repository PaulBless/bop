<?php 
session_start();
error_reporting(E_ALL ^ E_NOTICE);

if(ISSET($_POST['btnupdate'])){
    require ('../functions/db_connect.php');
    
    $bool = true;
    $program_name= ucwords(trim(htmlspecialchars($_POST['name'])));
    $description= ucwords(trim(htmlspecialchars($_POST['description'])));
    $program_id= trim(htmlspecialchars($_POST['program_id']));

    // prepare query to update record
    $query = "UPDATE `programmes` SET `name` = '$program_name', `description` = '$description' WHERE pid = '$program_id'";
    $execute_update = mysqli_query($myconn, $query);
    if($execute_update == true)
    {
        echo "<script>alert('Faculty record updated!'); document.location.href='programmes.php'</script>";
    }
}


?>