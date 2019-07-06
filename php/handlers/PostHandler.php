<?php

require_once 'DataBase.php';

class PostHandler{
    /**
     * Handles posting new content in the database
     */

    private $database;
    private $conn;
    private $table_name = "posts";

    public function __construct(){
        $this->database = new DataBase();
        $this->conn = $this->database->getConnection();
    }

    public function __destruct(){
        $this->database->closeConnection();
    }

    public function addPostWithComment($title, $subject, $type, $comment){
        // Expects subject and type to already exist in the database
        // I do not plan to add error handling if they do not exists as of now

        $subjectId = $this->getSubjectId($subject);
        $typeId = $this->getTypeId($type);
        $date = date("Y-m-d H:i:s");
        if ($subjectId && $typeId){
            $stmt = $this->conn->prepare("INSERT INTO posts (title, subjectId, typeId, comment, date) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$title, $subjectId, $typeId, $comment, $date]);
        }
    }

    public function addPostWithoutComment($title, $subject, $type){
        $comment = '';
        $this->addPostWithComment($title, $subject, $type, $comment);
    }

    //UTILS
    private function getSubjectId($name){
        $stmt = $this->conn->prepare("SELECT * FROM subjects WHERE name='$name'");
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
                return $row['id'];
        }
        return false;
    }

    private function getTypeId($name){
        $stmt = $this->conn->prepare("SELECT * FROM posttypes WHERE name='$name'");
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
                return $row['id'];
        }
        return false;
    }
}
?>