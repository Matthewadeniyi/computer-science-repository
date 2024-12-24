<?php
    session_start();
           
    unset($_SESSION['admin_name']);
    unset($_SESSION['admin_no']);
    session_destroy();

    header("Location: login.php");
    exit;
?>