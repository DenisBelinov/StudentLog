<?php
include_once "../utils/loginCheck.php";
include_once "../handlers/PostHandler.php";

$postHandler = new PostHandler();

if (isset($_GET['all'])) {
    $posts = $postHandler->getPublicPosts();
    http_response_code(200);
    echo json_encode($posts);
}
else if (isset($_SESSION['loggedUser'])) {
    $user = $_SESSION['loggedUser'];

    $posts = $postHandler->getAllPostsFromUser($user);
    
    http_response_code(200);
    echo json_encode($posts);
}
else {
    $posts = $postHandler->getPublicPosts();
    http_response_code(200);
    echo json_encode($posts);
}
?>