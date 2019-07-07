<?php
require_once '../utils/loginCheck.php';
require_once '../handlers/PostHandler.php';

$user = $_SESSION['loggedUser'];
if (isset($_POST) && isset($_POST['newPostButton'])) {
    $title = $_POST['title'];
    $subject = $_POST['subject'];
    $type = $_POST['type'];
    $comment = '';

    $postHandler = new PostHandler();

    if (isset($_POST['comment'])){
        $comment = $_POST['comment'];
        $postHandler->addPostWithComment($title, $subject, $type, $comment, $user);
        header('Location: ../../afterpost.php');
    }
    else{
        $postHandler->addPostWithoutComment($title, $subject, $type, $comment, $user);
        header('Location: ../../afterpost.php');
    }
}

?>