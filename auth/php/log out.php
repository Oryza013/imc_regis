<?php
        session_start();
        session_destroy();
        unset($_SESSION['id']);
        unset($_SESSION['email']);
        unset($_SESSION['verified']);
        unset($_SESSION['teamUid']);
        header('location: ../login.php');
        exit();
?>