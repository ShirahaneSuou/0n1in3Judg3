<?php
    session_start();
    unset($_SESSION['user_id']);
    session_destroy();

    //retrans
    header("Location: ../index.php");
?>