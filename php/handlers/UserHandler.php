<?php

require_once 'DataBase.php';

class UserHandler{
    /**
     * Handles register and login of a user
     */

    private $database;
    private $conn;
    private $table_name = "users";

    public function __construct(){
        $this->database = new DataBase();
        $this->conn = $this->database->getConnection();
    }

    public function __destruct(){
        $this->database->closeConnection();
    }

    public function registerUser($username, $firstname, $lastName, $email, $password, $fn, $speciality, $year){
        $stmt = $this->conn->prepare("INSERT INTO users (username, firstName, lastName, email, password, fn, speciality, year) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        
        $encryptedPassword = md5($password);
        $stmt->execute([$username, $firstname, $lastName, $email, $encryptedPassword, $fn, $speciality, $year]);
    }

    public function verifyUser($username, $password) {
        $stmt = $this->conn->prepare("SELECT username, password FROM users WHERE username='$username'");

        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($row['password'] == md5($password)){
                return true;
            }
        }
        return false;
    }

    public function isUserRegistered($username){
        $stmt = $this->conn->prepare("SELECT username FROM users WHERE username='$username'");

        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return true;
        }
        return false;
    }
}
?>