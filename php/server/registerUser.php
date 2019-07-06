<?php
require_once '../handlers/UserHandler.php';
if (isset($_POST) && isset($_POST['registerButton'])) {
    $username = $_POST['username'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $fn = $_POST['fn'];
    $speciality = $_POST['speciality'];
    $year = $_POST['year'];

    $userHandler = new UserHandler();

    if ($userHandler->isUserRegistered($username)) {
        session_start();
        $_SESSION['registerError'] = "Потребителското име вече е заето";
        header('Location: ../../register.php');
    }
    else {
        $userHandler->registerUser($username, $firstName, $lastName, $email, $password, $fn, $speciality, $year);
    }
}

?>