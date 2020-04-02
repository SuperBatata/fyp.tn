<?PHP
include "../core/produitC.php";
$produitC=new ProduitC();
if (isset($_POST["reference"])){
	$produitC->supprimerProduit($_POST["reference"]);
	header('Location: ../Gboutique.php');
}

?>