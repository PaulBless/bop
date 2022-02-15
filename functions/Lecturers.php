<?php 
require_once ("dbController.php");

class Lecturers {

    private $db_handle;
    
    //constructor of the database controller class
    function __construct() {
        $this->db_handle = new dbController();
    }
    
    //this function to add new lecturer record
    function addlecturer($regno, $fname, $mname, $lname, $gender, $phone, $email, $address, $contactname, $contactnumber, $facultyid, $username, $password, $picture, $createdon) {
        $query = "INSERT INTO `lecturers` (reg_no,`firstname`, middlename, lastname,gender,phoneno,email, `address`,contact_name,contact_number, faculty_id,loginid,`password`,avatar, createdby) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $paramType = "ssssss";
        $paramValue = array(
            $regno,
            ucwords($fname),
            ucwords($mname),
            ucwords($lname),
            $gender,
            $phone,
            $email,
            ucwords($address),
            ucwords($contactname),
            $contactnumber,
            $facultyid,
            $username,
            $password,
			$picture,
            $createdon
         );
        
        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
        return $insertId;
    }
    
    //this function triggers to edit lecturer record
    function editlecturer($fname, $mname, $lname, $gender, $phone, $email, $address, $contactname, $contactnumber, $lecturer_id) {
        $query = "UPDATE `lecturers` SET firstname = ?, middlename = ?, lastname = ?, gender = ?,phoneno = ?, email = ?, `address` = ?, contact_name = ?, contact_number = ? WHERE lecturerid = ?";
        $paramType = "sssssi";
        $paramValue = array(
            ucwords($fname),
            ucwords($mname),
            ucwords($lname),
            $gender,
            $phone,
            $email,
            $address,
            ucwords($contactname),
			$contactnumber,
            $lecturer_id
        );
        
        $this->db_handle->update($query, $paramType, $paramValue);
    }
    
    //function delete canidate by id{primary key}
    function deletelecturer($lecturer_id) {
        $query = "DELETE FROM `lecturers` WHERE lecturerid = ?";
        $paramType = "i";
        $paramValue = array(
            $lecturer_id
        );
        $this->db_handle->update($query, $paramType, $paramValue);
    }
    
        
    //get lecturer by id:primary_key
    function getlecturerByID($lecturer_id) {    
        $query = "SELECT * FROM `lecturers` WHERE lecturerid = ?";
        $paramType = "i";
        $paramValue = array(
            $lecturer_id
        );
        
        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
      
		return $result;
    }
    
    //fetch all lecturers records
    function getLecturersList() {
        $sql = "SELECT * FROM `lecturers` ORDER BY `firstname` ASC";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }
    
    //check lecturer exists
    function checklecturer($fname, $mname, $lname){
        $sql = "SELECT `firstname`, `middlename`, `lastname` FROM `lecturers` WHERE `firstname` = ? AND `middlename` = ? AND `lastname` = ?";
        $paramType = "s";
        $paramValue = array($fname, $mname, $lname);
        $result = $this->db_handle->runQuery($sql, $paramType, $paramValue);

        return $result;
    }
    
}
?>