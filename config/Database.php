<?php 
class Database {

    //DB credentials
    private $servername  = "<your_db_url>";
    private $db_name = "<your_db_name>";
    private $username = "<your_username>";
    private $password = "<your_password>";
    public $conn;

    function get_conncetion(){
        $this->conn = new mysqli($this->servername, $this->username, $this->password,$this->db_name);
        if($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
        return  $this->conn;
    }
}

?>