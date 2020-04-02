<?php
include('includes/header.php');
include('includes/navbar.php');
?>


<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h4>Produit</h4>
        </div>
        <div class="card-body">
            <?PHP
            include "../classe/produit.php";
            include "../core/produitC.php";
            if (isset($_GET['reference'])) {
                $produitC = new ProduitC();
                $result = $produitC->recupererProduit($_GET['reference']);
                foreach ($result as $row) {
                    $nom = $row->nom;
                    $reference = $row->reference;
                    $description = $row->description;
                    $categorie = $row->categorie;
                    $quantite = $row->quantite;
                    $prix = $row->prix;
                    $img = $row->img;

                    ?>
                    <form class="form-horizontal" method="POST">
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">nom </label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" onblur="verifnom(this);" name="nom" value="<?PHP echo $nom ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">reference </label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" onblur="verifref(this);" name="reference" value="<?PHP echo $_GET['reference'] ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label> Categorie </label>
                            <input class="form-control" name="categorie" type="text" value="<?PHP echo $categorie ?>">
                        </div>

                        <div class="form-group row mb-0">
                            <label class="col-md-3 col-form-label">quantite </label>
                            <div class="col-md-9">
                                <input class="form-control" type="number" name="quantite" value="<?PHP echo $quantite ?>">
                            </div>
                        </div><br>

                        <div class="form-group row mb-0">
                            <label class="col-md-3 col-form-label">prix</label>
                            <div class="col-md-9">
                                <input class="form-control" type="number" name="prix" value="<?PHP echo $prix ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Description du produit </label>
                            <textarea class="form-control" rows="5" name="description" value="<?PHP echo $description ?>"></textarea>
                        </div>

                        <div class="form-group row mb-0">
                            <label class="col-md-3 col-form-label">image</label>
                            <div class="col-md-9">
                                <input class="form-control" value="<?PHP echo $img ?>" type="file" name="img">
                                <label for="file"><?PHP echo $img ?></label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary mt-1 mb-0" value="modifier" name="modifier">Modifier</button>
                        <input type="hidden" name="reference_ini" value="<?PHP echo $_GET['reference']; ?>">

                    </form>
            <?PHP
                }
            }
            if (isset($_POST['modifier'])) {
                $produit = new produit($_POST['nom'], $_POST['reference'], $_POST['description'], $_POST['categorie'], $_POST['quantite'], $_POST['prix'], $_POST['img']);
                $produitC->modifierProduit($produit, $_POST['reference_ini']);
            }
            ?>


        </div>
    </div>
</div>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>