<?php
session_start();

if(!$_SESSION['loggedUser']) {
    header('Location: ../../needtologin.html');
}
?>