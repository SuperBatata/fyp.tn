<?php require '_header.php'; ?>
<!DOCTYPE html>
<html lang="fr">

<head>
	<title>FYP - Find Your Picture</title>
	<meta charset="UTF-8">
	<meta name="description" content="Instyle Fashion HTML Template">
	<meta name="keywords" content="instyle, fashion, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Favicon -->
	<link href="img/favicon.ico" rel="shortcut icon" />

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,700i&display=swap" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/font-awesome.min.css" />
	<link rel="stylesheet" href="css/owl.carousel.min.css" />
	<link rel="stylesheet" href="css/slicknav.min.css" />

	<!-- Main Stylesheets -->
	<link rel="stylesheet" href="css/style.css" />


	<script src="js/jquery-3.3.1.js" type="text/javascript"></script>
	<script src="js/script.js" type="text/javascript"></script>



	<!-- MDB core JavaScript -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.4/js/mdb.min.js"></script>


	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>


	<![endif]-->


	<link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/carousel/">

<!-- Bootstrap core CSS -->
<link href="/docs/4.4/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<!-- Favicons -->

	<link rel="apple-touch-icon" href="/docs/4.4/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/4.4/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/4.4/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
<link rel="icon" href="/docs/4.4/assets/img/favicons/favicon.ico">
<meta name="msapplication-config" content="/docs/4.4/assets/img/favicons/browserconfig.xml">
<meta name="theme-color" content="#563d7c">


	
	

</head>

<body>

	<!-- Page Preloder 
	<div id="preloder">
		<div class="loader"></div>
	</div>
-->

	<!-- header section -->
	

	<div class="d-flex flex-column flex-md-row align-items-center p-2 px-md-4 mb-3 bg-white border-bottom shadow-sm">

		<a href="acceuil.php" class="my-0 mr-md-auto ">
			<img width="90px" height="45px" src="img/logo1.png" alt="">
		</a>
		<nav class="my-2 my-md-0 mr-md-3">
			<a class="p-2 text-dark" href="acceuil.php">Acceuil</a>
			<a class="p-2 text-dark" href="service.php">Services</a>
			<a class="p-2 text-dark" href="boutique.php">Boutique</a></a>
			<a class="p-2 text-dark" href="evenement.php">Evenement</a>
		</nav>
		<?php if (isset($_SESSION['auth'])) : ?>
				<a class="p-2 text-dark" href="compte.php">
					<img src="src/user.png" alt="user" width="40">
				</a>
			
				<a class="p-2 text-dark" href="viewCart.php">
					<img src="src/cart.png" alt="cart">
					<!--<span class="badge badge-light count"></span> -->
				</a>

			<a class="p-2 text-dark" href="logout.php"> Deconnexion</a>


		<?php else : ?>


				<a class="p-2 text-dark" href="login.php">Connexion</a>


				<a class="btn btn-outline-warning" href="inscription.php"> Inscription</a>


		<?php endif; ?>

	</div>

	<!-- header section end -->

	<div class="container">
		<div class="col align-self-center">
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
		</div>
	</div>