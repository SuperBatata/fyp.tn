<?php
require_once 'includes/functions.php';

session_start();

if (!empty($_POST)) {
    require_once '../config/db.php';
    $errors = array();

    if (empty($_POST['username']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['username'])) {
        $errors['username'] = "votre nom d'utilisateur n'est pas valide ";
    } else {
        $req = $pdo->prepare('SELECT id_client FROM client WHERE username=?');
        $req->execute([$_POST['username']]);
        $user = $req->fetch();

        if ($user) {
            $errors['username'] = "Ce nom d'utilisateur est deja pris ";
        }
    }

    if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "votre email n'est pas valide ";
    } else {
        $req = $pdo->prepare('SELECT id_client FROM client WHERE email=?');
        $req->execute([$_POST['email']]);
        $email = $req->fetch();

        if ($email) {
            $errors['email'] = "Cette email est deja pris ";
        }
    }


    if (empty($_POST['password']) || $_POST['password'] != $_POST['comfirm_password']) {
        $errors['password'] = "vous devenez entrer un mot de passe valide ";
    }
    if (empty($_POST['adresse'])) {
        $errors['adresse'] = "votre adresse n'est pas valide ";
    }
    if (empty($_POST['nom'])) {
        $errors['nom'] = "votre nom n'est pas valide ";
    }
    if (empty($_POST['prenom'])) {
        $errors['prenom'] = "votre prenom n'est pas valide ";
    }
    if (empty($_POST['codepostal'])) {
        $errors['codepostal'] = "le code postal n'est pas valide ";
    }
    if (empty($_POST['telephone'])) {
        $errors['telephone'] = "votre numero de telephone n'est pas valide ";
    }
    if (empty($errors)) {

        $req = $pdo->prepare("INSERT INTO client SET username=? ,nom=? ,prenom=? ,password=? ,email=? ,adresse=? ,codepostal=? ,telephone=? ,confirmation_token=? ,type=?");
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $token = str_random(60);

        $req->execute([$_POST['username'], $_POST['nom'], $_POST['prenom'], $password, $_POST['email'], $_POST['adresse'], $_POST["codepostal"], $_POST['telephone'], $token, "user"]);
        // envoi  du mail de confirmation de compte 

        $destinataire = $_POST['email'];
        $sujet = "Comfirmation du compte";
        $header = "MIME-Version: 1.0\r\n";
        $header .= 'From:"FYP.com"<findyourpicture.fyp@gmail.com>' . "\n";
        $header .= 'Content-Type:text/html; charset="uft-8"' . "\n";
        $header .= 'Content-Transfer-Encoding: 8bit';
        $user_id = $pdo->lastInsertId();
        $message = '

                Pour valider votre compte, veuillez cliquer sur le lien ci dessous
                ou copier/coller dans votre navigateur internet.
                  
                http://localhost/fyp_vf/front/view/confirm.php?id=' . urlencode($user_id) . '&token=' . $token . '
                  
                  
                ---------------
                Ceci est un mail automatique, Merci de ne pas y répondre. 

                ';


        ini_set("SMTP", "ssl://smtp.gmail.com");
        ini_set("smtp_port", "587");
        mail($destinataire, $sujet, $message, $header); // envoi du mail 
        $_SESSION['flash']['success'] = "un email de comfirmation vous a été envoyé pour valider votre compte ";

        header('Location: login.php');
        exit();
    }
}

?>
<?php
require 'header.php';
?>
<div class="container">
    <?php if (!empty($errors)) : ?>
        <div class="alert alert-danger">
            <p>vous n'avez pas rempli le formulaire correctement :</p>
            <ul>
                <?php foreach ($errors as $error) : ?>
                    <li><?= $error; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h4>Inscription</h4></div>
                <div class="card-body">
                <p class="hint-text">Créez votre compte. C'est gratuit et ne prend que quelque minute.</p>
                    <form name="my-form" onsubmit="return validform()" action="" method="POST">
                        <div class="form-group row">
                            <label for="full_name" class="col-md-4 col-form-label text-md-right">Nom</label>
                            <div class="col-md-6">
                                <input type="text" name="nom" placeholder="Nom  ..." class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="full_name" class="col-md-4 col-form-label text-md-right">Prenom</label>
                            <div class="col-md-6">
                                <input type="text" name="prenom" placeholder="prenom  ..." class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email_address" class="col-md-4 col-form-label text-md-right">Adresse E-Mail </label>
                            <div class="col-md-6">
                                <input type="email" name="email" placeholder="Email ..." class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="user_name" class="col-md-4 col-form-label text-md-right">Nom d'utilisateur</label>
                            <div class="col-md-6">
                                <input type="text" name="username" placeholder="Nom d'utilisateur ..." class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone_number" class="col-md-4 col-form-label text-md-right">Mot de passe</label>
                            <div class="col-md-6">
                                <input type="password" name="password" placeholder=" Nouveau mot de passe  ..." class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="present_address" class="col-md-4 col-form-label text-md-right">Confirmer mot de passe</label>
                            <div class="col-md-6">
                                <input type="password" name="comfirm_password" placeholder=" Confirmer mot de passe  ..." class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="permanent_address" class="col-md-4 col-form-label text-md-right">Adresse domicile</label>
                            <div class="col-md-6">
                                <input type="text" name="adresse" placeholder="Adresse domicile ..." class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="codepostal" class="col-md-4 col-form-label text-md-right"> Code postal</label>
                            <div class="col-md-6">
                                <input type="text" name="codepostal" placeholder="Code postal ..." class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="telephone" class="col-md-4 col-form-label text-md-right">Numero telephone</label>
                            <div class="col-md-6">
                                <input type="tel" name="telephone" placeholder="Numero telephone ..." class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-warning">
                                S'inscrire
                            </button>
                        </div>
                </div>
                </form>
                <div class="text-center">Vous avez déja un compte ? <a href="login.php">se connecter</a></div>
            </div>
        </div>
    </div>
</div>
</div>


    <?php
    require 'footer.php';
    ?>