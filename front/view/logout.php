<?php 
    session_start();

    unset($_SESSION['auth']);
    $_SESSION['flash']['success']="Vous étes maintenant déconnecté";
    session_unset();
    session_destroy();
    header('location: login.php');
