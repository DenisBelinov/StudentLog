<?php
require_once '../handlers/UserHandler.php';
if (isset($_POST) && isset($_POST['loginButton'])) {
    $username = $_POST['loginUsername'];
    $password = $_POST['loginPassword'];

    $userHandler = new UserHandler();

    if (!$userHandler->isUserRegistered($username)) {
        session_start();
        $_SESSION['loginError'] = "Грешно потребителско име";
        header('Location: ../../login.php');
    }
    else if (!$userHandler->verifyUser($username, $password)) {
        session_start();
        $_SESSION['loginError'] = "Грешна парола";
        header('Location: ../../login.php');
    }
    else {
        header('Location: ../../index.php');
    }
}

?>