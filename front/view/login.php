<?php

if (!empty($_POST) && !empty($_POST['username']) && !empty($_POST['password'])) {
    require_once '../config/db.php';
    require_once 'includes/functions.php';

    $req = $pdo->prepare('SELECT * FROM client WHERE username = :username OR email = :username');
    $req->execute(['username' => $_POST['username']]);
    $user = $req->fetch();

    if (password_verify($_POST['password'], $user->password) && $user->type == "user" ) {
        session_start();
        $_SESSION['auth'] = $user;
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['id'] = $user->id_client;
        $_SESSION['flash']['success'] = "vous étes connecter ";
        header('Location: acceuil.php');
        exit();
    } else if (password_verify($_POST['password'], $user->password) && $user->type == "admin") {
        session_start();
        $_SESSION['auth'] = $user;
        header('Location: ../../back/view/index.php');
        exit();
    } else {
        
        $_SESSION['flash']['danger'] = "identifiant ou mot de passe incorrect ";
        header('Location: login.php');
    }
}
?>
<?php require_once 'header.php'; ?>
<div class="text-center">
    <?php if (isset($_SESSION['flash'])) : ?>
        <?php foreach ($_SESSION['flash'] as $type => $message) : ?>
            <div class="alert alert-<?= $type; ?> alert-dismissible fade show" role="alert">
                <?= $message; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endforeach ?>
        <?php unset($_SESSION['flash']); ?>
    <?php endif ?>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/style1.css">

<!-- 
    <form class="form-signin" action="" method="POST">
        <img class="mb-4" width="72" height="72" src="img/logo1.png" alt="">

        <h1 class="h3 mb-3 font-weight-normal">Se connecter</h1>
        <label for="inputEmail" class="sr-only"></label>
        <br>
        <input type="text" name="username" class="form-control" placeholder="Email ou nom d'utilisateur " required autofocus>
        <br>
        <label for="inputPassword" class="sr-only"></label>
        <input type="password" name="password" class="form-control" placeholder="Mot de passe" required>
        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> Se souvenir de moi
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Connexion</button>
        
    </form>
    <p class="text-center"><a href="inscription.php">Créer un compte</a></p>
</div> -->




<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="img/logo1.png" id="icon" alt=""  />
    </div>

    <!-- Login Form -->
    <form action="" method="POST">
      <input type="text" id="login" class="fadeIn second" name="username" placeholder="login">
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="password">
      <input type="submit" class="fadeIn fourth" value="Log In">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>
    </div>

  </div>
</div>


    <?php require_once 'footer.php'; ?>
    