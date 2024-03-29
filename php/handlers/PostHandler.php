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

    // Adding posts
    public function addPostWithComment($title, $subject, $type, $comment, $user){
        // Expects subject and type to already exist in the database
        // I do not plan to add error handling if they do not exists as of now

        $subjectId = $this->getSubjectId($subject);
        $typeId = $this->getTypeId($type);
        $userId = $this->getUserId($user);

        $date = date("Y-m-d H:i:s");

        if ($subjectId && $typeId){
            $stmt = $this->conn->prepare("INSERT INTO posts (title, subjectId, typeId, comment, date, userId) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->execute([$title, $subjectId, $typeId, $comment, $date, $userId]);
        }
    }

    public function addPostWithoutComment($title, $subject, $type, $user){
        $comment = '';
        $this->addPostWithComment($title, $subject, $type, $comment, $user);
    }

    // Getting Posts
    public function getAllPostsFromUser($user){
        $stmt = $this->conn->prepare("SELECT title, posttypes.name as postType, subjects.name as subjectType, comment FROM posts
        INNER JOIN users
        ON posts.userId = users.id
        INNER JOIN posttypes
        ON posts.typeId = posttypes.id
        INNER JOIN subjects
        ON posts.subjectId = subjects.id
        WHERE users.username='$user'");

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPublicPosts(){
        $stmt = $this->conn->prepare("SELECT title, posttypes.name as postType, subjects.name as subjectType, comment FROM posts
        INNER JOIN users
        ON posts.userId = users.id
        INNER JOIN posttypes
        ON posts.typeId = posttypes.id
        INNER JOIN subjects
        ON posts.subjectId = subjects.id");

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPostCountsByTypeAndSubject($filterType, $filterSubject){        
        $stmt = $this->conn->prepare("SELECT users.firstName, users.lastName, COUNT(*) as count FROM posts
        INNER JOIN users
        ON posts.userId = users.id
        INNER JOIN posttypes
        ON posts.typeId = posttypes.id
        INNER JOIN subjects
        ON posts.subjectId = subjects.id
        WHERE posttypes.name = '$filterType' AND subjects.name = '$filterSubject'
        GROUP BY users.id");

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPostCountsByType($filterType){
        $stmt = $this->conn->prepare("SELECT users.firstName, users.lastName, COUNT(*) as count FROM posts
        INNER JOIN users
        ON posts.userId = users.id
        INNER JOIN posttypes
        ON posts.typeId = posttypes.id
        INNER JOIN subjects
        ON posts.subjectId = subjects.id
        WHERE posttypes.name = '$filterType'
        GROUP BY users.id");

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPostCountsBySubject($filterSubject){
        $stmt = $this->conn->prepare("SELECT users.firstName, users.lastName, COUNT(*) as count FROM posts
        INNER JOIN users
        ON posts.userId = users.id
        INNER JOIN posttypes
        ON posts.typeId = posttypes.id
        INNER JOIN subjects
        ON posts.subjectId = subjects.id
        WHERE subjects.name = '$filterSubject'
        GROUP BY users.id");

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPostCounts(){
        // returns user => postCount kind of output 
        // will return the firstName and lastName of the user
        $stmt = $this->conn->prepare("SELECT users.id as id, users.firstName as firstName, users.lastName as lastName, COUNT(*) as count FROM posts
        INNER JOIN users
        ON posts.userId = users.id
        GROUP BY id");

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

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

    private function getUserId($name){
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE username='$name'");
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
                return $row['id'];
        }
        return false;
    }

}
?>