<?php

    function is_session_started()
    {
        if ( php_sapi_name() !== 'cli' ) {
            if ( version_compare(phpversion(), '5.4.0', '>=') ) {
                return session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;
            } else {
                return session_id() === '' ? FALSE : TRUE;
            }
        }
        return FALSE;
    }

    function debug($variable){
        echo '<pre>'. print_r($variable,true) . '</pre>';
    }

    function str_random($length){
        $alpha = "0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN";
        return substr(str_shuffle(str_repeat($alpha,$length)),0,$length);
    }

    function client_only(){

        if ( is_session_started() === FALSE ) session_start();

        if(!isset($_SESSION['auth'])){
            $_SESSION['flash']['danger']="acces refuser veuillez vous connecter";
            header('Location: login.php');
            exit();
        }
    }