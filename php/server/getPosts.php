<?php
include_once "../utils/loginCheck.php";
include_once "../handlers/PostHandler.php";

$postHandler = new PostHandler();

if (isset($_GET['all'])) {
    $posts = $postHandler->getPublicPosts();
    http_response_code(200);
    echo json_encode($posts);
}

else if(isset($_GET['postCounts'])) {
    $filterType = '';
    if(isset($_GET['filterType'])){
        $filterType = $_GET['filterType'];
    }

    $filterSubject = '';
    if(isset($_GET['filterSubject'])){
        $filterSubject = $_GET['filterSubject'];
    }

    if($filterType && $filterSubject){
        $posts = $postHandler->getPostCountsByTypeAndSubject($filterType, $filterSubject);
    }
    else if ($filterType) {
        $posts = $postHandler->getPostCountsByType($filterType);
    }
    else if ($filterSubject) {
        $posts = $postHandler->getPostCountsBySubject($filterSubject);
    }
    else {
        $posts = $postHandler->getPostCounts();
    }
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