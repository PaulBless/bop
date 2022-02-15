<?php 
require_once ("dbController.php");

class Students {
    private $db_handle;
    
    //constructor of the database controller class
    function __construct() {
        $this->db_handle = new dbController();
    }
    
    //this function to add new student record
    function addStudent($student_no, $firstname, $middlename, $lastname, $gender, $phone, $email, $address, $contact_name, $contact_no, $programid, $facultyid, $classid, $loginid, $passcode, $avatar) {
        $query = "INSERT INTO `students` (student_no, firstname, middlename, lastname, gender, phoneno, email, `address`, contact_name, contact_number, programme_id, faculty_id, class_id, loginid, `password`, avatar, date_created) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'CURRENT_TIMESTAMP')";
        $paramType = "ssssssssssiiissss";
        $paramValue = array(
            $student_no,
            ucwords($firstname),
            ucwords($middlename),
            ucwords($lastname),
            $gender,
            $phone,
            $email,
            ucwords($address),
            ucwords($contact_name),
            $contact_no,
            $programid,
            $facultyid,
            $classid,
            $loginid,
            $passcode,
            $avatar
         );
        
        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
        return $insertId;
    }
    
    //this function triggers to edit student record
    function editStudent($firstname, $middlename, $lastname, $gender, $phone, $email, $address, $contact_name, $contact_no, $student_id) {
        $query = "UPDATE `students` SET firstname = ?, middlename = ?, lastname = ?, gender = ?, phoneno = ?, email = ?, `address` = ?, contact_name = ?, contact_number = ?, WHERE `studentid` = ?";
        $paramType = "sssssssssi";
        $paramValue = array(
            ucfirst($firstname),
            ucfirst($middlename),
            ucfirst($lastname),
            $gender,
            $phone,
            $email,
            ucwords($address),
            $contact_name,
            $contact_no,
            // $programid,
            // $facultyid,
            // $classid,
            // $loginid,
            // $passcode,
            $student_id
        );
        
        $this->db_handle->update($query, $paramType, $paramValue);
    }
 
	
    //function delete student by id{primary key}
    function deleteStudent($student_id) {
        $query = "DELETE FROM `students` WHERE `studentid` = ?";
        $paramType = "i";
        $paramValue = array(
            $student_id
        );
        $this->db_handle->update($query, $paramType, $paramValue);
    }
    
        
    //get student by id:primary_key
    function getStudentByID($student_id) {    
        $query = "SELECT * FROM `students` WHERE studentid = ?";
        $paramType = "i";
        $paramValue = array(
            $student_id
        );
        
        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
      
		return $result;
    }
    
    //get student by registration number
    function getStudentByReg_Number($student_number) {    
        $query = "SELECT * FROM `students` WHERE `student_no` = ?";
        $paramType = "s";
        $paramValue = array(
            $student_number
        );
        
        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
      
		return $result;
    }
    

    //get all students, 
    function getstudentList() {
        $sql = "SELECT * FROM `students` ORDER BY `firstname` ASC";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }
    
    
}
?>