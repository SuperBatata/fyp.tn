<?php require 'header.php'; ?>
<?php

	require_once 'includes/functions.php';
	require_once 'dbclass.php';
	client_only();
	$user = $_SESSION['auth'];
	$db = new DB();
/*
    include "../entities/reservation.php";
    include "../core/reservationC.php";
    */


if ( isset($_POST['submit']))
    {
    $reservation1=new reservation($_POST['id_reservation'],$_POST['userDate'],$_POST['userName'],$_POST['userEmail'],$_POST['userAdress'],$_POST['userType']);
	$reservation2=new reservationC();

	$reservation2->ajouterreservation($reservation1);

	$_SESSION['flash']['success'] = "Votre reservation a bien été effectuer ";

}


?>




	<link rel="stylesheet" href="css/style3.css">
	<link rel="stylesheet" href="css/reset.css"> 


<?php $service = $db->query('SELECT * FROM service1'); ?>




		<script src="js/modernizr.js"></script> <!-- Modernizr -->

	<?php foreach ( $service as $service): ?>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,600' rel='stylesheet' type='text/css'>
	<ul class="cd-pricing">
		<li>
			<header class="cd-pricing-header">
				<h2 style=" font-size: 30px;" ><?php echo "$service->nom_offre";?></h2>

				<div class="cd-price">
					<span><?php echo "$service->prix" ;?>dt</span>

				</div>

			</header> <!-- .cd-pricing-header -->

			<div class="cd-pricing-features">
				<ul>

					<li class="available"><em><?php echo "$service->features";?></em></li>

				</ul>
			</div> <!-- .cd-pricing-features -->

			<div	class="cd-pricing-footer">
				<a href="#0">Select</a>
			</div> <!-- .cd-pricing-footer -->
		</li>
		<?php endforeach; ?>


	</ul> <!-- .cd-pricing -->

	<div class="cd-form">

		<div class="cd-plan-info">
			<!-- content will be loaded using jQuery - according to the selected plan -->
		</div>

		<div class="cd-more-info">
			<h3>Need help?</h3>
			<h1 style="align:left;">findyourpicture@gmail.fr</h1>
		</div>

		<form action="service.php" method="POST">
			<fieldset>
				<legend>Account Info</legend>

				<div class="half-width">

					<label for="userName">Name</label>

					<input type="text" id="userName" name="userName" value="<?php echo $user->nom; ?>" >
				</div>

				<div class="half-width">
					<label for="userEmail">Email</label>
					<input type="email" id="userEmail" name="userEmail" value="<?php echo $user->email; ?>">
				</div>

				<div class="half-width">
					<label for="userAdress">Adress</label>
					<input type="text" id="userAdress" name="userAdress" >
				</div>
				<div class="half-width">
					<label for="userDate">Date de reservation</label>
					<br>
					<input type="date" id="userDate" name="userDate" placeholder="dd/mm/yy">
				</div>
				

			</fieldset>



			<fieldset>
				<div>
					<input type="submit" value="Get started" nom="submit">
				</div>
			</fieldset>
		</form>

		<a href="#0" class="cd-close"></a>
	</div> <!-- .cd-form -->

	<div class="cd-overlay"></div> <!-- shadow layer -->
<script src="js/jquery-2.1.4.js"></script>
<script src="js/velocity.min.js"></script>
<script src="js/main2.js"></script> <!-- Resource jQuery -->

<?php require "footer.php"; ?>