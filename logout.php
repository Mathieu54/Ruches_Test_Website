<?php
    session_start();
    $_SESSION['user_session'] = ""; //Reset Session
    if(empty($_SESSION['user_session'])) header("location: index.php"); //And redirect user to login page
?>