<?php
    session_start();
    if(!isset($_SESSION["username"])) {
        header("Location: expert_login.php");
        exit();
    }
?>