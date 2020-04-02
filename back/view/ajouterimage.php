<?php
include('includes/header.php'); 
include('includes/navbar.php'); 

include "../core/imageC.php";

if (isset($_POST['nom_image'])){
	$imageC = new imageController();
	$image = new image();
	$image -> setnom($_POST['nom_image']);	
	$image -> setsize($_POST['size_image']);
	$image -> setwidth($_POST['width_image']);
  $image -> setheight($_POST['height_image']);
  $image -> settype($_POST['type_image']);
  $image -> setlien($_POST['lien_image']);
  $image -> setid_event($_POST['id_event']);
	if (isset($_POST['id_image'])){
		$image -> setid_image($_POST['id_image']);
		$imageC -> update($image);
		
	}else{
		
		$imageC -> create($image);
	}
	$imageC -> index();
}else{
	if (isset($_POST['id_image'])) {
		$imageU = imageController::findbyid($_POST['id_image']);
	}
}


?>

<script>
function test(str) {
	var x = document.getElementById("Submit");
    if (str.length == 0) {
        document.getElementById("Error").innerHTML = "";
		x.style.display = "block";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("Error").innerHTML = this.responseText;
				if (this.responseText == "" ){
					x.style.display = "block";
				}else{
					x.style.display = "none";
				}
            }
        };
        xmlhttp.open("GET", "AjaxFormCode.php?q=" + str, true);
        xmlhttp.send();
    }
	
}

</script>


<html>
<?php if (!isset($imageU)){ ?>
<h1><?php echo "Ajouter votre image"; ?></h1>
<div>
<table style="width:100%">
<form method="POST" action="">
<tr>
  <td>Nom:</td>
  <td><input type="text" name="nom_image" required></td>
</tr>
<tr>
  <td>size:</td>
  <td><input type="text" name="size_image" id="size_image" required></td>
</tr> 
<tr> 
 <td> width:</th>
  <td><input type="width" name="width_image" required></td>
  </tr>
  <tr>
  <td>height:</td>
 <td> <input type="text" name="height_image" required></td>
  </tr>
  <tr>
  <td>type:</td>
 <td> <input type="text" name="type_image" required></td>
  </tr>
  <tr>
  <td>lien:</td>
 <td> <input type="text" name="lien_image" required></td>
  </tr>
  <tr>
  <td>id_event:</td>
 <td> <input type="text" name="id_event" required></td>
  </tr>
 <tr>
	<td></td>
	<td>
		<div class="input-group-append">
			<input id="Submit" type="submit" name="Submit" value="Submit" class="btn btn-primary btr-2 bbr-2" >
		</div>
	</td>
</tr>
<?php } else { ?>
<h1><?php echo "Modifier votre image"; ?></h1>
<div>
<table style="width:100%">
<form method="POST" action="">
<tr>
  <td>Nom:</td>
  <td><input type="text" name="nom_image" value="<?php echo $imageU->getnom(); ?>" required></td>
</tr>
<tr>
  <td>size:</td>
  <td><input type="number" name="size_image" value="<?php echo $imageU->getsize(); ?>" required ></td>
</tr> 
<tr> 
 <td> width:</th>
  <td><input type="number" name="width_image" value="<?php echo $imageU->getwidth(); ?>" required></td>
  </tr>
  <tr>
  <td>height:</td>
 <td> <input type="number" name="height_image" value="<?php echo $imageU->getheight(); ?>" required></td>
  </tr>
  <tr>
  <td>type:</td>
 <td> <input type="text" name="type_image" value="<?php echo $imageU->gettype(); ?>" required></td>
  </tr>
  <tr>
  <td>lien:</td>
 <td> <input type="text" name="lien_image" value="<?php echo $imageU->getlien(); ?>" required></td>
  </tr>
  <tr>
  <td>id_event:</td>
 <td> <input type="number" name="id_event" value="<?php echo $imageU->getid_event(); ?>" required></td>
  </tr>
  <tr>
	<td> <input type="hidden" name="id_image" value="<?php echo $imageU->getid_image(); ?>"> 
	</td>
	<td>
		<div class="input-group-append">
			<input type="submit" name="Submit" value="Submit" class="btn btn-primary btr-2 bbr-2">
		</div>
	</td>
</tr>
<?php } ?>



</form>
</table>
</div>
<p><span id="Error"></span></p>

<style type="text/css">

div{
	
	text-align:center;
}

input[type=date] {
  border: 2px solid grey;
  border-radius: 2px;
  width:200px;
}
input[type=text] {
  border: 2px solid grey;
  border-radius: 2px;
  width:200px;
}
input[type=text]:focus {
  background-color: lightblue;
} 
th{
	font-family: "Times New Roman";
	color:black;
}
div.form
{
    display: block;
    text-align: left;
}
form
{
    display: inline-block;
    margin-left: auto;
    margin-right: auto;
    text-align: left;
}
</style>

</html>