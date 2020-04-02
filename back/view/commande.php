<?php
include('includes/header.php');
include('includes/navbar.php');
?>
<?php


include('../classe/panier.php');
include('../core/panierC.php');
include('../classe/trans.php');
include('../core/transC.php');

if(isset($_POST['delete'])){
    include_once "../config.php";
    
    $sql="DELETE FROM transaction where id_trans= :id_trans";
	$db = config::getConnexion();
    $req=$db->prepare($sql);
	$req->bindValue(':id_trans',$_POST['delete']);
	try{
        $req->execute();
    }
    catch (Exception $e){
        die('Erreur: '.$e->getMessage());
    }
}


if (isset($_POST['search'])) {
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM transaction WHERE CONCAT(id_trans,id_client,nom_client,dateT,total) LIKE '%" . $valueToSearch . "%'";
    $search_result = filterTable($query);
} else {
    $query = "SELECT * FROM transaction";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "fyp");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}



$panierC = new panierC();
$listepanier = $panierC->afficherprod();

$transC = new transC();
$listeTran = $transC->afficherT();
$aloha = $transC->stat();
$tot = 0;



?>


<div class="page-header">
    <h4 class="page-title">Gestion Panier</h4>
    <!--<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#" class="text-light-color">Forms</a></li>
								<li class="breadcrumb-item active" aria-current="page">Form Elements</li>
							</ol>-->
</div>

<!-- ======= tableau des coupon ========== -->


<div class="col-md-12">
    <div class="card export-database">
        <div class="card-header">
            <h4>Transactions</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-bordered border-t0 key-buttons text-nowrap w-100">
                    <thead>
                        <tr>
                            <th>ID Transaction</th>
                            <th>ID Client</th>
                            <th>id_trans</th>
                            <th>Total</th>
                            <th>Date</th>
                            <th>DELETE </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($search_result)) {
                            ?>

                            <tr>
                                <td><?php echo $row['id_trans']; ?></td>
                                <td><?php echo $row['id_client']; ?></td>
                                <td><?php echo $row['nom_client']; ?></td>
                                <td><?php echo $row['total']; ?></td>
                                <td><?php echo $row['dateT']; ?></td>
                                <td>
                                    <form action="commande.php" method="POST">
                                        <input type="hidden" name="delete" value="<?php echo $row['id_trans']; ?>">
                                        <button type="submit"  value="" class="btn btn-danger"> DELETE</button>
                                    </form>
                                </td>
                            </tr>

                        <?php

                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<form method="POST" action="commande.php">
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