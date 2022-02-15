<?php 
session_start();
error_reporting(E_ALL ^ E_NOTICE);

if(ISSET($_POST['btnupdate'])){
    require ('../functions/db_connect.php');
    
    $bool = true;
    $course_name= ucwords(trim(htmlspecialchars($_POST['name'])));
    $description= ucwords(trim(htmlspecialchars($_POST['description'])));
    $course_id= trim(htmlspecialchars($_POST['course_id']));

    // prepare query to update record
    $query = "UPDATE `courses` SET `name` = '$course_name', `description` = '$description' WHERE courseid = '$course_id'";
    $execute_update = mysqli_query($myconn, $query);
    if($execute_update == true)
    {
        echo "<script>alert('Course record updated!'); document.location.href='courses.php'</script>";
    }
}


?>