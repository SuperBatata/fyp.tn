<?php
include('includes/header.php');
include('includes/navbar.php');



?>
<div class="modal fade" id="ajoutproduit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajout donnée produit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="ajouterProduit1.php" method="POST">

        <div class="modal-body">
        <div class="form-group">
            <label>Referance</label>
            <input class="form-control" name="Referance" type="text"  title="veuillez préciser le nom du produit ." required>
          </div>
          <div class="form-group">
            <label>Nom du Produit</label>
            <input class="form-control" name="Nom" type="text"  title="veuillez préciser le nom du produit ." required>
          </div>
          <div class="form-group">
            <label> Categorie </label>
            <input class="form-control" name="id_categorie" type="text"   title="Veuillez preciser la categorie du produit ." required>
          </div>
          <div class="form-group">
            <label>Quantite</label>
            <input class="form-control" name="Quantite" type="number" min=1 max=100 title="la quantite doit etre entre 1 et 100 ." required>
          </div>
          <div class="form-group">
            <label> Prix </label>
            <input class="form-control" name="Prix" type="text"   title="Definir le prix du produit ." required>
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
          <button type="submit" name="ajouter" class="btn btn-primary" href="includes/ajouterProduit.php">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="card">
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
				<thead>
					<tr>
											<th class="text-center">reference</th>
                  <th class="text-center">nom</th>
                  <th class="text-center">prix</th>
				  <th class="text-center">quantite</th>
     
         <th class="text-center"> description </th>
         <th class="text-center">categorie</th>
         <th class="text-center">image</th>
				  <th class="text-center">Modification</th>
                  <th class="text-center">Suppression</th>


					</tr>
				</thead>

				<tbody>
				<?php
             include "../classe/produit.php";
			 require '../core/produitC.php';




			$prod=new ProduitC();
			$liste1=$prod->afficherUnProduit();
              foreach ($liste1 as $row) {

              ?>
						<tr>
							<td><?php echo $row['referance']; ?></td>
							<td><?PHP echo $row['nom']; ?></td>
							<td><?PHP echo $row['prix']; ?></td>
							<td><?PHP echo $row['quantite']; ?></td>
							<td><?PHP echo $row['description']; ?></td>
							<td><?PHP echo $row['id_categorie']; ?></td>
							<td><img width="35%" src="../images/<?PHP echo $row['img']; ?>"/></td>

					
							<td><a href="modifierProduit1.php?referance=<?PHP echo $row['referance']; ?>">Modifier</a></td>
	  <td><a href="supprimerProduit.php?referance=<?PHP echo $row['referance']; ?>">Supprimer</a></td>

						</tr>
						<?php
              }
              ?>

				</tbody>
			</table>
		</div>
	</div>
	<form method="POST" action="tableclient.php">
		<div class="card-body">
			<div class="input-group">
				<input class="form-control btl-2 bbl-2" type="text" name="valueToSearch" placeholder="rechercher ... ">
				<div class="input-group-append">

					<input type="submit" name="search" value="Rechercher" class="btn btn-primary btr-2 bbr-2">
					<br><br>
				</div>
			</div>
		</div>
	</form>

		<?php
		include('includes/scripts.php');
		include('includes/footer.php');
		?>