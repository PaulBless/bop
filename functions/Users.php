<?php 
require_once ("dbController.php");

class Users
{
    private $db_handle;
    
    function __construct() {
        $this->db_handle = new dbController();
    }
    
        
    //add admin user account
    function addAdmin($regno, $fname, $lname, $phone, $address, $email, $username, $password, $avatar) {
        $query = "INSERT INTO `admin` (reg_no,firstname,lastname,phoneno,address,email, username,password,avatar) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $paramType = "sssssssss";
        $paramValue = array(
            $regno,
            ucwords($fname),
            ucwords($lname),
            $phone,
            $address,
            $email,
            $username,
            $password,
            $avatar
            // $date_created
        );   
        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
        return $insertId;
    }
    
        
    //update users account info
    function updateProfile($fname, $lname, $phone, $address, $email, $username, $adminid) {
        $query = "UPDATE `admin` SET firstname = ?, lastname = ?, phoneno = ?, address = ?, email = ?, username = ? WHERE userid = ?";
        $paramType = "sssssssi";
        $paramValue = array(
            ucwords($fname),
            ucwords($lname),
            $phone,
            ucwords($address),
            $email,
            $username,
            $adminid
        );
        
        $this->db_handle->update($query, $paramType, $paramValue);
    }
    
    //function to trigger admin account password change
    function changePassword($password, $adminid){
        $query = "UPDATE `admin` SET password = ? WHERE userid = ?";
        $paramType = "si";
        $paramValue = array(
            $password,
            $adminid
        );
        $this->db_handle->update($query, $paramType, $paramValue);
    }
    
    //delete accout
    function deleteAdmin($adminid) {
        $query = "DELETE FROM `admin` WHERE userid = ?";
        $paramType = "i";
        $paramValue = array(
            $adminid
        );
        $this->db_handle->update($query, $paramType, $paramValue);
    }
    
    //get admin by adminid
    function getAdminById($adminid) {
        $query = "SELECT * FROM admin WHERE adminid = ?";
        $paramType = "i";
        $paramValue = array(
            $adminid
        );
        
        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result;
    }
    
    //get admin login details
    function getLoginDetails($username){
        $query = "SELECT `adminid`,`password` FROM `admin` WHERE `username` = ?";
        $paramType = "s";
        $paramValue = array(
        $username);
        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result;
    }
    
    //fetch all admin account records
    function getAllAdmin() {
        $sql = "SELECT * FROM `admin` ORDER BY userid ASC";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }
}

?>