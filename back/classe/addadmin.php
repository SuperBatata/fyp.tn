<?php 
session_start();

    if(!empty($_POST)){
        require_once 'db.php';
        $errors=array();

        if(empty($_POST['username']) || !preg_match('/^[a-zA-Z0-9_]+$/',$_POST['username'])){
            $errors['username']="votre nom d'utilisateur n'est pas valide ";
        }else {
            $req = $pdo->prepare('SELECT id_admin FROM admin WHERE username=?');
            $req->execute([$_POST['username']]);
            $user = $req->fetch();
            
            if($user){
                $errors['username']="Ce nom d'utilisateur est deja pris ";
            }
        }

        if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $errors['email']="votre email n'est pas valide ";
        }else {
            $req = $pdo->prepare('SELECT id_admin FROM admin WHERE email=?');
            $req->execute([$_POST['email']]);
            $email = $req->fetch();
            
            if($email){
                $errors['email']="Cette email est deja pris ";
            }
        }


        if(empty($_POST['password']) || $_POST['password'] != $_POST['confirmpassword']){
            $errors['password']="vous devenez entrer un mot de passe valide ";
        }

        if(empty($errors)){
           
            $req = $pdo->prepare("INSERT INTO admin SET username=? ,password=? ,email=? ");
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            

            $req->execute([$_POST['username'],$password,$_POST['email']]);
        }

        header('Location: register.php');
        exit();
    }