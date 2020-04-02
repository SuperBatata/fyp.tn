<?php
include "../entities/Produit.php";
include "../core/ProduitC.php";
if (isset($_GET['referance']))
{
	
	$valeur=$_GET['referance'];

$pe = new ProduitC();
$pe->supprimerProduit($valeur);
	header('Location: afficherProduit.php');
}
?>