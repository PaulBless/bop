<?php
session_start();
require '../functions/db_connect.php';  ## require db connection

///// START USER FUNCTIONS //////

## 1. add user function
function addUser()
{
    
   ## generate random loginid and default password
   $random_fname = (substr($_POST['firstname'], 0, 3)); // first three characters 
   $random_lname = (substr($_POST['lastname'], 0, 3));  // first three characters
   ## concatenate random substring to get loginid
   $loginid = "@"."{$random_fname}"."{$random_lname}";
    
   ## deafault password
   $random_password = 'bop@123';  

    ## generate random registration nunbers
    $new_reg_no = mt_rand(10000, 99999);

    //get & sanitize form inputs
	$fname = trim(htmlspecialchars($_POST['firstname']));
	$lname = trim(htmlspecialchars($_POST['lastname']));
	$address = trim(htmlspecialchars($_POST['address']));
	$mobile = trim(htmlspecialchars($_POST['mobile']));
	$email = trim(htmlspecialchars($_POST['emailid']));
    
    ## hash input password
    $pass_hash = password_hash($random_password, PASSWORD_DEFAULT); //hash password
    ## change input format before saving into db
    $save_firstname = ucwords($fname);
    $save_lastname = ucwords($lname);
    $save_address = ucwords($address);

    ## prepare image file
    $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
	$image_name = addslashes($_FILES['image']['name']);
	$image_size = getimagesize($_FILES['image']['tmp_name']);
		
	move_uploaded_file($_FILES["image"]["tmp_name"],"../uploads/" . $_FILES["image"]["name"]);			
    $image_location="../uploads/" . $_FILES["image"]["name"];

    require '../functions/db_connect.php';  ## require db connection
    // require '../template/scripts.php';

    ## prepare sql statement to select record from db
	$sql = "SELECT * FROM `admin` WHERE `reg_no`='$new_reg_no' OR `loginid`='$loginid' OR `firstname`='$save_firstname' OR `lastname`='$save_lastname'";   //sql statement
    ## bind query parameters
    $run_query = mysqli_query($myconn, $sql);
    if(mysqli_num_rows($run_query) == 0){ ## check if record exists in db
        ## record not found
        ## prepare sql statement to insert recorde
        $insert_stmt = "INSERT INTO `admin` (`reg_no`, `firstname`, `lastname`, `phoneno`, `address`, `email`, `loginid`, `password`, `avatar`,`date_created`) VALUES ('$new_reg_no', '$save_firstname', '$save_lastname', '$mobile', '$save_address': '$email', '$loginid':, '$pass_hash', '$image_location','CURRENT_TIMESTAMP')";
        $insert_query = mysqli_query($myconn, $insert_stmt);
        if($insert_query == true){
            ## show success notification
            echo "<div class='alert alert-success'>Record saved.</div>";
            // echo "<br><b style='color:#008080;font-size:14px;font-family:Arial;'>User is succesifully added</b>";
            // echo "<script>alert('Record added')</script>";
        }else{echo "<script>alert('Error in query')</script>";}
    }else{
        ## show errror notification
        ?>
        <script type="text/javascript">
            $('#form_add_user').prepend('<div class="alert alert-danger">Record with same details exists.</div>')
        </script>
        <?php
    }

}

## 2. delete user function
function deleteUser()
{

}

## 3. update user function
function updateUser()
{

}

?>