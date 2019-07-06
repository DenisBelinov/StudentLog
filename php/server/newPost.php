<?php
require_once '../handlers/PostHandler.php';

if (isset($_POST) && isset($_POST['newPostButton'])) {
    $title = $_POST['title'];
    $subject = $_POST['subject'];
    $type = $_POST['type'];
    $comment = '';

    $postHandler = new PostHandler();

    if (isset($_POST['comment'])){
        $comment = $_POST['comment'];
        $postHandler->addPostWithComment($title, $subject, $type, $comment);
        header('Location: ../../afterpost.php');
    }
    else{
        $postHandler->addPostWithoutComment($title, $subject, $type, $comment);
        header('Location: ../../afterpost.php');
    }
}

?>