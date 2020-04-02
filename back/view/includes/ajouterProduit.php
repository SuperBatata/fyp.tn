<?PHP
include "../../classe/produit.php";
include "../../core/produitC.php";

if (isset($_POST['nom']) and isset($_POST['reference']) and isset($_POST['description']) and isset($_POST['categorie'])and  isset($_POST['quantite'])and  isset($_POST['prix'])and  isset($_POST['img'])){
	
$produit1=new produit($_POST['nom'],$_POST['reference'],$_POST['description'],$_POST['categorie'],$_POST['quantite'],$_POST['prix'],$_POST['img']);
$produit1C=new ProduitC();
$produit1C-> ajouterProduit($produit1);
header('Location: ../Gboutique.php');
	
}
else{
	echo "vérifier ce que vous avez entrer ! ";
}
?>
