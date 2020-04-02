<?php require "header.php"; ?>
<?php
  include "../core/produitC.php";
  include "../entities/produit.php";
  
  $produitc = new produitC();
  $produits = $produitc->afficherProduit();
  /*
  $listeProduit = $produitc->afficherProduit();
  */

  if(isset($_GET['categorie'])){
    $listeProduit = $produitc->afficherParCategorie($_GET['categorie']);
  }else {
    $listeProduit = $produitc->afficherProduit();
  }
?>

 <!-- Page Content -->
 <div class="container">

<div class="row">

  <div class="col-lg-3">

    <h4 class="my-4">Catégorie</h4>
    <div class="list-group">
      <a href="boutique.php" class="list-group-item">Tout</a>
        <?php foreach ( $produits as $produit): ?>
            <a href="boutique.php?categorie=<?= $produit['categorie'] ?>" class="list-group-item"><?= $produit['categorie'] ?></a>
        <?php endforeach; ?> 
    </div>

  </div>
  <!-- /.col-lg-3 -->

  <div class="col-lg-9">

    

    <div class="row">
        
        <?php foreach ( $listeProduit as $produit): ?>
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
            <a href="detail_produit.php?id=<?php echo $produit['referance']; ?>"><img class="card-img-top" src="<?= $produit['img'] ?>" alt=""></a>
            <div class="card-body">
                <h4 class="card-title">
                <a href="detail_produit.php?id=<?php echo $produit['referance'] ?>"><?= $produit['nom'] ?></a>
                </h4>
                <h7><a href="boutique.php?categorie=<?= $produit['categorie'] ?>"><?= $produit['categorie'] ?></a></h7><br>
                <h7>Disponibilité : <span><?php if ($produit['quantite']>0){ echo 'En stock';}else{echo 'Epuisé';} ?></span></h7><br>
                <h5><?=number_format( $produit['prix'],2,',',' ') ?> DT</h5>
                <p class="card-text"><?= $produit['description'] ?></p>
            </div>
            <div class="card-footer">
            <a href="cartAction.php?action=addToCart&id=<?php echo $produit['referance']; ?>" class="btn btn-info btn-lg addPanier">
                <span class="glyphicon glyphicon-shopping-cart"></span> Ajouter au panier
            </a>
            </div>
        </div>
      </div>
      <?php endforeach; ?> 

      

    </div>
    <!-- /.row -->

  </div>
  <!-- /.col-lg-9 -->

</div>
<!-- /.row -->

</div>
<!-- /.container -->

<?php require "footer.php"; ?>