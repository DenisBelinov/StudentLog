<?php
// Class that provides connection to the database
class Database {
    private $host = 'localhost';
    private $db_name = 'student_log';
    private $username = 'root';
    private $password = '';

    public $conn;

    public function __construct(){
        try {
            $this->conn = new PDO('mysql:host='. $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
        }catch(PDOException $exception){
            echo "Database connection error: " . $exception->getMessage();
        }
    }

    public function getConnection(){
        return $this->conn;
    }

    public function closeConnection(){
        $this->conn = null;
    }
    
    public function reestablishConnection(){
        /**
         * @return PDO object
         */

        $this->conn = null;

        try {
            $this->conn = new PDO('mysql:host='. $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
        }catch(PDOException $exception){
            echo "Database connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
?>