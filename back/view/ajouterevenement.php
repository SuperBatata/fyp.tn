<?php
include('includes/header.php'); 
include('includes/navbar.php'); 

include "../core/eventC.php";

if (isset($_POST['nom_event'])){
	$eventC = new eventsController();
	$event = new Event();
	$event -> setnom($_POST['nom_event']);	
	$event -> setcode($_POST['code_event']);
	$event -> setdate_event($_POST['date_event']);
	$event -> setlieu($_POST['lieu']);
	if (isset($_POST['id_event'])){
		$event -> setid_event($_POST['id_event']);
		$eventC -> update($event);
		
	}else{
		
		$eventC -> create($event);
	}
	$eventC -> index();
}else{
	if (isset($_POST['id_event'])) {
		$eventU = eventsController::findbyid($_POST['id_event']);
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
<?php if (!isset($eventU)){ ?>
<h1><?php echo "Ajouter votre évenement"; ?></h1>
<div>
<table style="width:100%">
<form method="POST" action="">
<tr>
  <td>Nom:</td>
  <td><input type="text" name="nom_event" required></td>
</tr>
<tr>
  <td>Code:</td>
  <td><input type="text" name="code_event" id="code_event" required onkeyup="test(this.value)"></td>
</tr> 
<tr> 
 <td> Date:</th>
  <td><input type="date" name="date_event" required></td>
  </tr>
  <tr>
  <td>Lieu:</td>
 <td> <input type="text" name="lieu" required></td>
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
<h1><?php echo "Modifier votre évenement"; ?></h1>
<div>
<table style="width:100%">
<form method="POST" action="">
<tr>
  <td>Nom:</td>
  <td><input type="text" name="nom_event" value="<?php echo $eventU->getnom(); ?>" required></td>
</tr>
<tr>
  <td>Code:</td>
  <td><input type="text" name="code_event" value="<?php echo $eventU->getcode(); ?>" required onkeyup="test(this.value)"></td>
</tr> 
<tr> 
 <td> Date:</th>
  <td><input type="date" name="date_event" value="<?php echo $eventU->getdate_event(); ?>" required></td>
  </tr>
  <tr>
  <td>Lieu:</td>
 <td> <input type="text" name="lieu" value="<?php echo $eventU->getlieu(); ?>" required></td>
  </tr>
  <tr>
	<td> <input type="hidden" name="id_event" value="<?php echo $eventU->getid_event(); ?>"> 
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