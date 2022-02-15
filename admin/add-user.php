<?php

session_start();
error_reporting(E_ALL ^ E_NOTICE);

require '../functions/db_connect.php';  ## require db connection

if(isset($_POST['add_user']))
{
   //get & sanitize form inputs
	$fname = ($_POST['firstname']);
	$lname = ($_POST['lastname']);
	$address = ($_POST['address']);
	$mobile = ($_POST['mobile']);
	$email = ($_POST['emailid']);
    
    ## generate random loginid and default password
    $random_fname = (substr($_POST['firstname'], 0, 3));   // get first three characters of firstname
    $random_lname = (substr($_POST['lastname'], 0, 3));   // get first three characters of lastname
    ## concatenate random substring to get loginid
    $loginid = "@"."{$random_fname}"."{$random_lname}";
    
    ## set deafault password
    $random_password = 'sip12345';  

    ## generate random registraton numnbers
    $new_reg_no = mt_rand(10000, 99999);

    
    ## prepare input variables for db
    ## hash input password
    $pass_hash = password_hash($random_password, PASSWORD_DEFAULT); //hash password
    ## change input format before saving into db
    $save_firstname = ucwords($fname);
    $save_lastname = ucwords($lname);
    $save_address = ucwords($address);

    ## prepare imgage file
    $image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
	$image_name= addslashes($_FILES['image']['name']);
	$image_size= getimagesize($_FILES['image']['tmp_name']);
		
	move_uploaded_file($_FILES["image"]["tmp_name"],"../uploads/" . $_FILES["image"]["name"]);			
    $img_location="../uploads/" . $_FILES["image"]["name"];
                    
    ## prepare sql statement to prevent sql injection
    if ($stmt = $myconn->prepare('SELECT * FROM `admin` WHERE `reg_no`= ? OR `username`= ? OR `firstname`= ? OR `lastname`= ?')) 
    {
        // Bind parameters (s = string, i = int, b = blob, etc), 
        $stmt->bind_param('ssss', $new_reg_no, $loginid, $save_firstname, $save_lastname);
        $stmt->execute();
        $stmt->store_result(); 	//store the result, and check it availability.
        if ($stmt->num_rows > 0) { // check if record exists
        $stmt->bind_result($db_reg_number, $db_loginid, $db_firstname, $db_lastname);   //bind ressults
        $stmt->fetch(); 	//record exists, fetch results 
            // $error = "Record exists with following details..\\nRegistration #: $db_reg_number\\nName: $db_firstname .' '. $db_lastname\\nLogin ID: $db_loginid";
            $error = "Record exists with following details..";
            echo "<script>alert('".$error."'); document.location.href='users-accounts.php'</script>";
        }
        else
        {
            if ($stmt_insert = $myconn->prepare('INSERT INTO `admin` (`reg_no`, `firstname`, `lastname`, `phoneno`, `address`, `email`, `username`, `password`, `avatar`,`date_created`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, "CURRENT_TIMESTAMP")')) 
            {
                // Bind parameters (s = string, i = int, b = blob, etc), 
                $stmt_insert->bind_param('sssssssss', $new_reg_no, $save_firstname, $save_lastname, $mobile, $save_address, $email, $loginid, $pass_hash, $img_location);
                $stmt_insert->execute();
                echo "<div class='alert alert-success' style='top: 10px; transition: transform .3s ease, -webkit-transform .3s ease, -moz-transform .3s ease, -o-transform .3s ease'>"
                . "<a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>"
                . "<strong>&nbsp;&nbsp;Record saved successfully!</strong>."
                . "</div>";
            }   // end insert query
            
        }
    }   // end select query

}



if(isset($_POST['test']))
{
    $insert_query = mysqli_query($myconn, "INSERT INTO `admin` (`reg_no`, `firstname`, `lastname`, `phoneno`, `address`, `email`, `loginid`, `password`, `avatar`,`date_created`)
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