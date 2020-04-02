<?php
require_once 'includes/header.php';
require_once 'includes/navbar.php';
?>

<?PHP

require_once "../classe/produit.php";
require_once "../core/produitC.php";

$produit1C=new produitC();
$listeProduits=$produit1C->afficherProduit();
var_dump($listeProduits);
/*
if (isset($_POST['ajouter'])) {
  if (isset($_POST['reference']) and isset($_POST['Nom']) and isset($_POST['Prix']) and isset($_POST['description']) and isset($_POST['Quantite'])) {

    $upload_image = $_FILES["myimage"]["name"];
    $folder = "../images/";
    $folder .= $upload_image;
    $produit1 = new produit($_POST['reference'], $_POST['Nom'], $_POST['Prix'], $_POST['description'], "produit", $_POST['Quantite'], $folder);


    move_uploaded_file($_FILES["myimage"]["tmp_name"], "$folder");
    $produit1C = new ProduitC();
    $produit1C->ajouterProduit($produit1);
  } else {
    echo "vérifier les champs";
  }
}
*/
?>


<!--Modal ajout produit  -->
<div class="modal fade" id="ajoutproduit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajout donnée produit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="ajouterProduit.php" method="POST">

        <div class="modal-body">
          <div class="form-group">
            <label>Nom du Produit</label>
            <input class="form-control" name="nom" type="text"  title="veuillez préciser le nom du produit ." required>
          </div>
          <div class="form-group">
            <label> Categorie </label>
            <input class="form-control" name="categorie" type="text"   title="Veuillez preciser la categorie du produit ." required>
          </div>
          <div class="form-group">
            <label>Quantite</label>
            <input class="form-control" name="quantite" type="number" min=1 max=100 title="la quantite doit etre entre 1 et 100 ." required>
          </div>
          <div class="form-group">
            <label> Prix </label>
            <input class="form-control" name="prix" type="text"   title="Definir le prix du produit ." required>
          </div>
          <div class="form-group">
            <label>Description du produit </label>
            <textarea class="form-control" rows="5" name="description" id="description" required></textarea>
          </div>
          <div class="form-group">
            <label>image du produit </label>
            <input class="form-control" type="file" name="myimage" required>
          </div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="ajouter" class="btn btn-primary" value="ajouter">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>
<div class="col-12">
  <div class="card shadow mb-4">
    <div class="card-header">
      <h6 class="m-0 font-weight-bold text-primary">Gestion Produits boutique :
        <span class="float-right">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ajoutproduit">
            Ajouter un produit
          </button>
        </span>
      </h6>
    </div>
    <div class="card-body">
      <div id="table" class="table-responsive table-editable">
        <table class="table table-bordered table-responsive-md table-striped text-center mb-0 text-nowrap">
          <tbody>
            <tr>
            <th>reference</th>
                  <th>nom</th>
                  <th>prix</th>
				  <th>quantite</th>
          <th>image</th>
         <th> description </th>
         <th>Suppression</th>
				  <th>Modification</th>
                  
            </tr>


            <?php
            foreach ($listeProduits as $row) {
              ?>

              <tr>

                <td class="pt-3-half" contenteditable="true"><?php echo $row->referance; ?></td>
                <td class="pt-3-half" contenteditable="true"><?php echo $row->nom; ?></td>
                <td class="pt-3-half" contenteditable="true"><?php echo $row->prix; ?></td>
                <td class="pt-3-half" contenteditable="true"><?PHP echo $row->quantite; ?></td>
                
                <td><img width="100" height="100" src="  <?PHP echo $row->img; ?>"> </td>
                <td class="pt-3-half" contenteditable="true"><?PHP echo $row->description; ?></td>

                <td>
                  <form method="POST" action="includes/supprimerProduit.php">
                  <span><input type="submit" class="btn btn-danger btn-rounded btn-sm my-0" name="Supprimer" value="Supprimer">
                  
                      <input type="hidden" value="<?php echo $row->referance; ?>" name="refe"></span>

                  </form>
                </td>

                <td><a href="modifierProduit.php?reference=<?php echo $row->referance; ?>">
                    <span><input type="submit" class="btn btn-warning btn-rounded btn-sm my-0" name="Modifier" value="Modifier">
                    </span></a>


                </td>


              </tr>
            <?php } ?>

          </tbody>
        </table>
      </div><br>
      <a href="pdfc.php" class="btn btn-warning btn-rounded btn-sm my-0">imprimer </a>
    </div>

  </div>

  </div>
</div>



  <?php
  include('includes/scripts.php');
  include('includes/footer.php');
  ?>