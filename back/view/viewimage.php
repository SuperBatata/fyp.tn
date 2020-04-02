<?php
include('includes/header.php'); 
include('includes/navbar.php'); 

include "../core/imageC.php";


    
   
if ((isset($_POST['valueToSearch'])) && (isset($_POST['categorie_recherche']))){
	$images = imageController::allwithSearch($_POST['categorie_recherche'],$_POST['valueToSearch']);
}else{
	$images = imageController::all();
}

if (isset($_POST['id_image'])){
	$imageC = new imageController();
	$imageC -> remove($_POST['id_image']);
	$imageC -> index();
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
			<h4>Images</h4>
			<hr>
			<form method="POST" action="viewimage.php">
				<div class="card-body">
					<div>
						<label for="Nom_image">
							<input id="Nom_image" type="radio" name="categorie_recherche" value="nom" onclick="myFunction(this.value)"> Nom_image
						</label>
						<label for="size_image">
							<input id="size_image" type="radio" name="categorie_recherche" value="size" onclick="myFunction(this.value)"> size
						</label>
						<label for="width">
							<input id="width" type="radio" name="categorie_recherche" value="width" onclick="myFunction(this.value)"> width
						</label>
						<label for="height">
							<input id="height" type="radio" name="categorie_recherche" value="height" onclick="myFunction(this.value)"> height
						</label>
                        <label for="type">
							<input id="type" type="radio" name="categorie_recherche" value="type" onclick="myFunction(this.value)"> type
						</label>
                        <label for="lien">
							<input id="lien" type="radio" name="categorie_recherche" value="lien" onclick="myFunction(this.value)"> lien
						</label>
                        <label for="id_event">
							<input id="id_event" type="radio" name="categorie_recherche" value="id_event" onclick="myFunction(this.value)"> id_event
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
            <form action="ajouterevenement.php" method="POST">
            <input class="btn btn-primary" type="submit" value="ajouter image">
</form>     </form>
</form>
		</div>
		<div class="card-body">
			<div id="table" class="table-responsive table-editable">
				<table class="table table-bordered table-responsive-md table-striped text-center mb-0 text-nowrap">
					<thead>
						<tr>
						<th class="text-center">Id_image</th>
						<th class="text-center">Nom_image</th>
						<th class="text-center">Size</th>
						<th class="text-center">Width</th>
						<th class="text-center">Height</th>
                        <th class="text-center">Type</th>
                        <th class="text-center">Lien</th>
                        <th class="text-center">Id_event</th>
						<th colspan="2">Actions</th>
						
						
					</tr>
					</thead>

					<tbody>
						<?php foreach ($images as $image) { ?>
						<tr>
							<td align=center><?php echo $image->getid_image(); ?></td>
							<td align=center><?php echo $image->getnom(); ?></td>
							<td align=center><?php echo $image->getsize(); ?></td>
							<td align=center><?php echo $image->getwidth(); ?></td>
							<td align=center><?php echo $image->getheight(); ?></td>
                            <td align=center><?php echo $image->gettype(); ?></td>
                            <td align=center><img width="50" height="50" src="<?php echo $image->getlien(); ?>"/></td>
                            <td align=center><?php echo $image->getid_event(); ?></td>
							<td>
								<form action="ajouterimage.php" method="post">
								<input type="hidden" name="id_image" value="<?php echo $image->getid_image(); ?>">
								<button type="submit" name="delete_btn" class="btn btn-danger"> UPDATE</button>
								</form>
							</td>
							<td>
								<form action="viewimage.php" method="post">
								<input type="hidden" name="id_image" value="<?php echo $image->getid_image(); ?>">
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