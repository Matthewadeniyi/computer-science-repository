<?php
    session_start();
           
    unset($_SESSION['fullname']);
    unset($_SESSION['matricno']);
    unset($_SESSION['userid']);
    unset($_SESSION['email']);
    session_destroy();

    header("Location: login.php");
    exit;
?>