<?php


/* Server DB Settings : 
	Should be Change on production
*/

$host = "localhost";
$user = "root";
$password = "";
$database = "bop_revenue";

$db_connect = mysqli_connect($host,$user,$password,$database);



/**
* 
*/
class database_operations
{  

	private $host;
	private $user;
	private $password;
	private $database;
	private $db_connect;

	
	function __construct()
	{
		$this->host = "localhost";
		$this->user = "root";
		$this->password = "";
		$this->database = "bop_revenue";

		$this->db_connect = new mysqli($this->host,$this->user,$this->password,$this->database);
		
	}


	function insert_data($full_name,$staff_id,$department,$password,$telephone){

		$get_all_users = "SELECT * FROM `user_details` WHERE `username` = '$staff_id' LIMIT 1";

		$execute_get_all = $this->db_connect->query($get_all_users);

		if($execute_get_all->num_rows >= 1){

			echo "<script>alert('Username Exists.. Choose Different ')</script>";
		}else{

			$statement = "INSERT INTO `user_details` (`id`, `full_name`, `username`, `telephone`, `department`, `password`, `user_status`, `registered_on`) VALUES (NULL, '$full_name', '$staff_id', '$telephone', '$department', '$password', 'pending', CURRENT_TIMESTAMP)";
			$insert = $this->db_connect->query($statement);
			if($insert){
				echo "<script>alert('Registration Successful')</script>";
				// header("Location:thank_you.php");
			}
		}
	}


	function remove_registered_person($user_id){

		$delete_statement = "DELETE FROM `user_details` WHERE `id` = '$user_id'";
		$delete_user = $this->db_connect->query($delete_statement);

	}

	function get_all_users(){

		$get_all_statement = "SELECT * FROM `user_details` ORDER BY ASC";
		$execute_get_all = $this->db_connect->query($get_all_statement);

		//if($)

	}

    function clean_input($clean_input){
        $cleaned_input = mysqli_escape_string($this->db_connect,$clean_input);
       return ($cleaned_input);
    }


    function password_harsh($to_be_harshed){

		$encrypted_password = password_hash($to_be_harshed,PASSWORD_DEFAULT);

		return $encrypted_password;
	}


	function create_sign_up($username,$user_password){

		$my_encrypted_password =  $this->password_harsh($user_password);

		$statement = "INSERT INTO `admininistrator_login` (`id`, `admin_username`, `admin_password`) VALUES (NULL, '$username', '$my_encrypted_password')";

		$save_signup = $this->db_connect->query($statement);
		if($save_signup){
			echo "<script>alert('Success')</script>";
		}
	}


	function login_in_controller($username,$password){

		$get_all_users = "SELECT * FROM `admininistrator_login` WHERE `admin_username` = '$username' LIMIT 1";
		$execute_get_all = $this->db_connect->query($get_all_users);

		if($execute_get_all->num_rows >= 1){

			while($user_data =  $execute_get_all->fetch_array()){

			$user_pass = $user_data["admin_password"];
		}

		}else{
			echo "<script>alert('User Not Found')</script>";
		}

		
		if(password_verify($password,$user_pass)){
			setcookie("i",'in', time() + (86400 * 30),"/");
			header("Location:admin_section/index.php");

		}


	}

	function check_username_availability($username) {
		if(!empty($username)) {
			$sql = "SELECT * FROM `users_details` WHERE username='".$username."' LIMIT 1";
			$run_query = $this->db_connect->query($sql);
			if($run_query->num_rows > 0) {
				echo "<script>alert('Username Unavailable!! Try Again.')</script>";
			}else{
				// echo "available";
			}
		}
	}
}



?>