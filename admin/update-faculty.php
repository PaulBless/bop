<?php 
session_start();
error_reporting(E_ALL ^ E_NOTICE);

if(ISSET($_POST['btnupdate'])){
    require ('../functions/db_connect.php');
    
    $bool = true;
    $faculty_name= ucwords(trim(htmlspecialchars($_POST['name'])));
    $description= ucwords(trim(htmlspecialchars($_POST['description'])));
    $faculty_id= trim(htmlspecialchars($_POST['faculty_id']));

    // prepare query to update record
    $query = "UPDATE `faculty` SET `name` = '$faculty_name', `description` = '$description' WHERE facultyid = '$faculty_id'";
    $execute_update = mysqli_query($myconn, $query);
    if($execute_update == true)
    {
        echo "<script>alert('Faculty record updated!'); document.location.href='faculties.php'</script>";
    }
}


?>