<?php
include "../classe/produit.php";
include "../core/produitC.php";

if (isset($_GET['referance'])){
	$produitC=new produitC();
  $result=$produitC->RecupererProduit($_GET['referance']);
	foreach($result as $row){
		$referance=$row['referance'];
		$nom=$row['nom'];
		$prix=$row['prix'];
    $quantite=$row['quantite'];
    $img=$row['img'];
    $description=$row['description'];
    $idCategorie=$row['id_categorie'];

			}
}

if (isset($_POST['modifier']))
{
   $newimg;
  if(isset($_POST['myimage'])){
      $newimg=$_POST['myimage'];
  }else{
      $newimg=$_Post['predimg'];
  }
  $produit=new produit($_POST['Referance'],$_POST['Nom'],$_POST['Prix'],$_POST['Quantite'],$newimg,$_POST['description'],$_POST['id_categorie']);
  $produitC->modifierProduit($produit,$_POST['referance_ini']);
header('Location: afficherProduit.php');
}
include('includes/header.php');
include('includes/navbar.php');


 ?>
 <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajout donnée produit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form  method="POST">

        <div class="modal-body">
        <div class="form-group">
            <label>Referance</label>
            <input class="form-control" readonly value="<?PHP echo $_GET['referance'];?>" name="Referance" type="text"  title="veuillez préciser le nom du produit ." required>
          </div>
          <div class="form-group">
            <label>Nom du Produit</label>
            <input class="form-control" name="Nom" type="text" value="<?PHP echo $nom?>"  title="veuillez préciser le nom du produit ." required>
          </div>
          <div class="form-group">
            <label> Categorie </label>
            <input class="form-control" name="id_categorie"  type="text" value="<?PHP echo $idCategorie?>"  title="Veuillez preciser la categorie du produit ." required>
          </div>
          <div class="form-group">
            <label>Quantite</label>
            <input class="form-control" name="Quantite" value="<?PHP echo $quantite?>" type="number" min=1 max=100 title="la quantite doit etre entre 1 et 100 ." required>
          </div>
          <div class="form-group">
            <label> Prix </label>
            <input class="form-control" name="Prix" type="text" value="<?PHP echo $prix?>"   title="Definir le prix du produit ." required>
          </div>
          <div class="form-group">
            <label>Description du produit </label>
            <input class="form-control" rows="5" value="<?PHP echo $description?>" name="description" id="description" required>
          </div>
          <div class="form-group">
            <label>image du produit </label>
            <input class="form-control" type="file" value="<?PHP echo $img?>" name="myimage">
            <input type="text" hidden value="<?PHP echo $img?>" name="predimg" >
          </div>


        </div>
        <div class="modal-footer">


        
              <input type="hidden" name="referance_ini" value="<?PHP echo $_GET['referance'];?>"></td>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="modifier" value="modifier" class="btn btn-primary" >Save</button>
        </div>
      </form>

    </div>
  </div>
</div>

  