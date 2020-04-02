<?php
    require_once '../config/db.php';

    $user_id = htmlspecialchars(urldecode( $_GET['id']));
    $token = $_GET['token'];

    $req = $pdo->prepare('SELECT * FROM client WHERE id_client = ?');
    $req->execute([$user_id]);

    $user = $req->fetch();

    var_dump($req);
    var_dump($user_id );
    if($user && $user->confirmation_token == $token){

        session_start();
        try {
        
        $req = $pdo->prepare('UPDATE client SET confirmation_token = NULL, confirmed_at = NOW() WHERE id_client = :idc');
        $req->bindValue(':idc',$user_id);
        $req->execute();
        }catch (exception $error){
            echo($error);
        }
        $_SESSION['auth'] = $user;
        $_SESSION['flash']['success']="Votre compte a bien été validé  ";
        header('location: compte.php');
        
        
        
    }else {

        $_SESSION['flash']['danger']= "cette cle n'est plus valide ";

        header('location: login.php');
    }
