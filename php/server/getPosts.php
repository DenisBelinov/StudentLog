<?php
include_once "../utils/loginCheck.php";
include_once "../handlers/PostHandler.php";

$postHandler = new PostHandler();

$user = $_SESSION['loggedUser'];

$posts = $postHandler->getAllPostsFromUser($user);

http_response_code(200);
echo json_encode($posts);
?>