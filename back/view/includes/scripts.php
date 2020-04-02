  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>


  <?php


//$connection = mysqli_connect("localhost","root","","adminpanel");
$pdo = new PDO('mysql:dbname=fyp;host=localhost','root','');
$pdo ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$pdo ->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);


if(isset($_POST['registerbtn']))
{
    
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


    if(empty($_POST['password']) || $_POST['password'] != $_POST['comfirm_password']){
        $errors['password']="vous devenez entrer un mot de passe valide ";
    }

    if(empty($errors)){
       
        $req = $pdo->prepare("INSERT INTO admin SET username=? ,password=? ,email=? ");
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        

        $req->execute([$_POST['username'],$password,$_POST['email']]);
    }
    
}

?>