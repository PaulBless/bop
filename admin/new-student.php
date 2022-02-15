<?php

session_start();
error_reporting(E_ALL ^ E_NOTICE);

require '../functions/db_connect.php';  ## require db connection
require '../functions/dbController.php';  ## require db connection
require '../functions/Students.php';  ## require db connection

//instance of db controller class
$db_handle = new dbController();

if(isset($_POST['add_student']))
{
   //get & sanitize form inputs
	$fname = trim(htmlspecialchars($_POST['firstname']));
	$lname = trim(htmlspecialchars($_POST['lastname']));
	$mname = trim(htmlspecialchars($_POST['middlename']));
	$gender = trim(htmlspecialchars($_POST['gender']));
	$address = trim(htmlspecialchars($_POST['address']));
	$mobile = trim(htmlspecialchars($_POST['mobile']));
	$email = trim(htmlspecialchars($_POST['emailid']));
	$facultyid = trim(htmlspecialchars($_POST['facultyid']));
	$programid = trim(htmlspecialchars($_POST['programmeid']));
	$classid = trim(htmlspecialchars($_POST['classid']));
	$contactname = trim(htmlspecialchars($_POST['contact_name']));
	$contactnumber = trim(htmlspecialchars($_POST['contact_number']));
    
    ## generate random loginid and default password
    $random_fname = (substr($_POST['firstname'], 0, 3));   // get first three characters of firstname
    $random_lname = (substr($_POST['lastname'], 0, 3));   // get first three characters of lastname
    ## concatenate random substring to get loginid
    $loginid = "@"."{$random_fname}"."{$random_lname}";
    
    ## set deafault password
    $random_password = 'sip12345';  

    ## generate random registraton numnbers
    $random_number = mt_rand(10000, 99999);
    $new_reg_no = $random_number . "/" . date('y');
    
    ## prepare input variables for db
    ## hash input password
    $pass_hash = password_hash($random_password, PASSWORD_DEFAULT); //hash password
    
    ## concatenate name to check from db
    $concat_name = "{$fname}" ." ". "{$mname}" ." ". "{$lname}";

    ## prepare image file
    $image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
	$image_name= addslashes($_FILES['image']['name']);
	$image_size= getimagesize($_FILES['image']['tmp_name']);
		
	move_uploaded_file($_FILES["image"]["tmp_name"],"../uploads/" . $_FILES["image"]["name"]);			
    $img_location="../uploads/" . $_FILES["image"]["name"];
                    
    ## prepare sql statement to prevent sql injection
    if ($stmt = $myconn->prepare("SELECT student_no, concat(firstname,' ',middlename,' ',lastname) AS fullname, loginid FROM `students` WHERE `student_no`= ?  OR `fullname`= ? OR `loginid`= ?")) 
    {
        // Bind parameters (s = string, i = int, b = blob, etc), 
        $stmt->bind_param('sss', $new_reg_no, $concat_name, $loginid);
        $stmt->execute();
        $stmt->store_result(); 	//store the result, and check it availability.
        if ($stmt->num_rows > 0) 
        { // check if record exists
        $stmt->bind_result($db_reg_number, $db_fullname, $db_loginid);   //bind ressults
        $stmt->fetch(); 	//record exists, fetch results 
            $error = "Record exists with following details..\\nStudent #: $db_reg_number\\nFullname: $db_fullname \\nLogin ID: $db_loginid";
            echo "<script>alert('".$error."'); document.location.href='students.php'</script>";
        }else {

            // $query = 'INSERT INTO `students` (`student_no`, `firstname`, `middlename`, `lastname`, `gender`, `phoneno`, `email`, `address`, `contact_name`, `contact_number`, `programme_id`, `faculty_id`, `class_id`, `loginid`, `password`, `avatar`, `date_created`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP)';
            
            $new_student = new Students(); //instantiate object 
            $insert_data = $new_student->addStudent($new_reg_no, $fname, $mname, $lname, $gender, $mobile, $email, $address, $contactname, $contactnumber, $programid, $facultyid, $classid, $loginid, $pass_hash, $img_location);
            if(!empty($insert_data)){
              echo "<script>alert('Record saved successfully'); document.location.href='students.php'</script>";   
            }
            
        }
    }   // end select query

}



if(isset($_POST['test']))
{
    $insert_query = mysqli_query($myconn, "INSERT INTO `students` (`reg_no`, `firstname`, `lastname`, `phoneno`, `address`, `email`, `loginid`, `password`, `avatar`,`date_created`)
             VALUES ('$new_reg_no', '$save_firstname', '$save_lastname', '$mobile', '$save_address': '$email', '$loginid':, '$pass_hash', '$img_location','CURRENT_TIMESTAMP')");
            if($insert_query == true)
            {
                ## show success notification
                // echo "<div class='alert alert-success'>Record saved.</div>";
                echo "<script>alert('Record added with following login details..\\nLogin ID: $loginid \\nPassword: $random_password')</script>";
                header('location: users-accounts.php');
            } else{
                echo "<script>alert('Record not inserted')</script>";
            } 
}

?>