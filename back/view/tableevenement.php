<?php
include('includes/header.php'); 
include('includes/navbar.php'); 

include "../core/eventC.php";
if ((isset($_POST['valueToSearch'])) && (isset($_POST['categorie_recherche']))){
	$events = eventsController::allwithSearch($_POST['categorie_recherche'],$_POST['valueToSearch']);
}else{
	$events = eventsController::all();
}

if (isset($_POST['id_event'])){
	$eventC = new eventsController();
	$eventC -> remove($_POST['id_event']);
	$eventC -> index();
}
?>

<script>
var x;
function myFunction(browser) {
  x = browser;
}
function showHint(str) {
	var radioValue = x; 
    if (str.length == 0) {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else if (radioValue == "nom"){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "AjaxNom.php?q=" + str, true);
        xmlhttp.send();
    }
}
</script>

<div class="card">

		<div class="card-header">
			<span class="table-add float-right">
				<a href="#!" class="btn btn-icon"><i class="fa fa-plus fa-1x" aria-hidden="true"></i></a>
			</span>
			<h4>Tableau des events</h4>
			<hr>
			<form method="POST" action="tableevenement.php">
				<div class="card-body">
					<div>
						<label for="Nom_event">
							<input id="Nom_event" type="radio" name="categorie_recherche" value="nom" onclick="myFunction(this.value)"> Nom_event
						</label>
						<label for="Code_event">
							<input id="Code_event" type="radio" name="categorie_recherche" value="code" onclick="myFunction(this.value)"> Code_event
						</label>
						<label for="Date_event">
							<input id="Date_event" type="radio" name="categorie_recherche" value="date_event" onclick="myFunction(this.value)"> Date_event
						</label>
						<label for="Lieu_event">
							<input id="Lieu_event" type="radio" name="categorie_recherche" value="lieu" onclick="myFunction(this.value)"> Lieu_event
						</label>
					</div>
					<div class="input-group">
						<input class="form-control btl-2 bbl-2" type="text" name="valueToSearch" placeholder="rechercher ... " onkeyup="showHint(this.value)">
						<div class="input-group-append">
							<input type="submit" name="search" value="Rechercher" class="btn btn-primary btr-2 bbr-2">
						</div>
						
					</div>
					<div class="input-group">
						<p>Suggestions: <span id="txtHint"></span></p>
					</div>
				</div>
			</form>
			<a  href="ajouterevenement.php"><input  type="button" value="Ajouter évenement" ></a>
		</div>
		<div class="card-body">
			<div id="table" class="table-responsive table-editable">
				<table class="table table-bordered table-responsive-md table-striped text-center mb-0 text-nowrap">
					<thead>
						<tr>
						<th class="text-center">Id_event</th>
						<th class="text-center">Nom_event</th>
						<th class="text-center">Code_event</th>
						<th class="text-center">Date_event</th>
						<th class="text-center">Lieu_event</th>
						<th colspan="2">Actions</th>
						
						
					</tr>
					</thead>

					<tbody>
						<?php foreach ($events as $event) { ?>
						<tr>
							<td align=center><?php echo $event->getid_event(); ?></td>
							<td align=center><?php echo $event->getnom(); ?></td>
							<td align=center><?php echo $event->getcode(); ?></td>
							<td align=center><?php echo $event->getdate_event(); ?></td>
							<td align=center><?php echo $event->getlieu(); ?></td>
							<td>
								<form action="ajouterevenement.php" method="post">
								<input type="hidden" name="id_event" value="<?php echo $event->getid_event(); ?>">
								<button type="submit" name="delete_btn" class="btn btn-danger"> UPDATE</button>
								</form>
							</td>
							<td>
								<form action="" method="post">
								<input type="hidden" name="id_event" value="<?php echo $event->getid_event(); ?>">
								<button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
								</form>
							</td>
							
						</tr>
						<?php }?>
						
					</tbody>
				</table>
			</div>
		</div>
</div>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>