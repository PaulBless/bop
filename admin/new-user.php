<?php

session_start();
error_reporting(E_ALL ^ E_NOTICE);

require '../functions/db_connect.php';  ## require db connection
require '../functions/dbController.php';  ## require db connection
require '../functions/Users.php';  ## require db connection

//instance of db controller class
$db_handle = new dbController();

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
        if ($stmt->num_rows > 0) 
        { // check if record exists
        $stmt->bind_result($db_reg_number, $db_loginid, $db_firstname, $db_lastname);   //bind ressults
        $stmt->fetch(); 	//record exists, fetch results 
            // $error = "Record exists with following details..\\nRegistration #: $db_reg_number\\nName: $db_firstname .' '. $db_lastname\\nLogin ID: $db_loginid";
            $error = "Record exists with following details..\\nRegistration #: $db_reg_number\\nUsername: $db_loginid";
            echo "<script>alert('".$error."'); document.location.href='users.php'</script>";
        }else {

            $query = 'INSERT INTO `admin` (`reg_no`, `firstname`, `lastname`, `phoneno`, `address`, `email`, `username`, `password`, `avatar`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)';
            $newuser = new Users(); //instantiate object 
            $insert_data = $newuser->addAdmin($new_reg_no, $save_firstname, $save_lastname, $mobile, $save_address, $email, $loginid, $pass_hash, $img_location);
            if(!empty($insert_data)){
              echo "<script>alert('Record saved successfully'); document.location.href='users.php'</script>";   
            }
            
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