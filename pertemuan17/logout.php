<?php
    session_start();
    require('functions.php');

    session_unset();

    session_destroy();
    setcookie('id', '', time()-1);
    setcookie('username', '', time()-1);
    header("Location: login.php");

?>