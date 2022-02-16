<?php
class dbController {

   //variables to hold server details
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $database = "bop";
    private $connection;
    
    //destructor
    function __construct() {
        $this->connection = $this->connectDB();
    }   
	
    
    //database connection function
    function connectDB() {
        $connection = mysqli_connect($this->host,$this->user,$this->password,$this->database);
        if($connection->connect_error){
            echo "<script>alert('Connection to MySQL Server Failed!!')</script>";
            die("ERROR: ".mysqli_connect_error());
        }
        return $connection;
    }
    
    // base query function
    function runBaseQuery($query) {
        $result = $this->connection->query($query);   
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $resultset[] = $row;
            }
        }
        //    return $resultset;
        return $result;
    }
    
    // query or search function
    function runQuery($query, $param_type, $param_value_array) {
        $sql = $this->connection->prepare($query);
        $this->bindQueryParams($sql, $param_type, $param_value_array);
        $sql->execute();
        $result = $sql->get_result();
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $resultset[] = $row;
            }
        }
        
        if(!empty($resultset)) {
            return $resultset;
        }
    }
    
    //bind parameters function
    function bindQueryParams($sql, $param_type, $param_value_array) {
        $param_value_reference[] = & $param_type;
        for($i=0; $i<count($param_value_array); $i++) {
            $param_value_reference[] = & $param_value_array[$i];
        }
        call_user_func_array(array(
            $sql,
            'bind_param'
        ), $param_value_reference);
    }
    
    // function to insert record
    function insert($query, $param_type, $param_value_array) {
        $sql = $this->connection->prepare($query);
        $this->bindQueryParams($sql, $param_type, $param_value_array);
        $sql->execute();
        $insertId = $sql->insert_id;
        return $insertId;
    }
    
    // function to update record
    function update($query, $param_type, $param_value_array) {
        $sql = $this->connection->prepare($query);
        $this->bindQueryParams($sql, $param_type, $param_value_array);
        $sql->execute();
    }
}
?>