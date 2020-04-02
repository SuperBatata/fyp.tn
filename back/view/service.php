<?php
include('includes/header.php'); 
include('includes/navbar.php'); 



if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM service1 WHERE CONCAT(id_service,type_service, prix,features,nom_offre) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM service1";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "fyp");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>


<!--Modal ajout produit  -->
<div class="modal fade" id="ajoutproduit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajout donnée service</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label> Referance </label>
                <input class="form-control" name="Referance" type="text" aria-describedby="nameHelp" pattern="[0-9]{5}" title="Ce champ doit avoir 8 chiffres ." required>
            </div>
            <div class="form-group">
                <label>Nom service</label>
                <input class="form-control" name="Nom"  type="text" aria-describedby="nameHelp" pattern="[A-Za-z]{4,}" title="Ce champ doit avoir au moins 4 Characthéres ." required>
            </div>
            <div class="form-group">
                <label>Type du service</label>
                <input class="form-control" name="type" type="text" pattern="[A-Za-z]{4,}" title="Ce champ doit avoir au moins 4 Characthéres ."  required >
            </div>
            <div class="form-group">
                <label>Prix du service</label>
                <input class="form-control" name="prix" type="number" min=1 max=9000 title="la quantite doit etre entre 1 et 9000 ." required>
            </div>
            <div class="form-group">
                <label>features du service </label>
                <input class="form-control" type="text" name="features"  required>
            </div>
            
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="ajouter" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Gestion article boutique : 
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ajoutproduit">
              Ajouter un produit
            </button>
    </h6>
</div>



<?PHP

    include "../classe/service.php";
    include "../core/serviceC.php";
    echo "vérifier les champs";
    if ( isset($_POST['ajouter']))
    {        
        // $upload_image=$_FILES["myimage"]["name"];
        // $folder="../images/";
        // $folder.=$upload_image;
        $service1=new service($_POST['Referance'],$_POST['Nom'],$_POST['type'],$_POST['features'],$_POST['prix']);

$service2=new serviceC();
            $service2->ajouterservice($service1);
    }
   
?>

<form method="POST" action="service.php">
														<div class="card-body">
										<div class="input-group">
											<input class="form-control btl-2 bbl-2" type="text" name="valueToSearch" placeholder="rechercher ... ">
											<div class="input-group-append">
												
												<input type="submit" name="search" value="Rechercher" class="btn btn-primary btr-2 bbr-2">
												<br><br>
											</div>
								</div>
                            </div>
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Service  </h6>
  </div>

  <div class="card-body">

    <div class="table-responsive">

    <table class="table table-bordered table-responsive-md table-striped text-center mb-0 text-nowrap">
												<thead>
													<tr>
													<th class="text-center">Id</th>
													<th class="text-center">Nom service</th>
													<th class="text-center">prix</th>
													<th class="text-center">features</th>
													<th class="text-center">type du servic</th>
													<th class="text-center">DELETE </th><th></th>
                                                    
                                                    
													
													
												</tr>
                                                </thead>

												<tbody>
													<?PHP while($row = mysqli_fetch_array($search_result)):

								
											    ?>
													<tr>
														<td><?PHP echo $row['id_service']; ?></td>
														<td><?PHP echo $row['nom_offre']; ?></td>
														<td><?PHP echo $row['prix']; ?></td>
														<td><?PHP echo $row['features']; ?></td>
														<td><?PHP echo $row['type_service']; ?></td>
														
														<td>
                                                            <form action="" method="post">
                                                            <input type="hidden" name="delete_id" value="">
                                                            <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
                                                            </form>
                                                        </td>
														
													</tr>
													<?php endwhile; 
                                                        ?>
													
												</tbody>
											</table>
                      

    </div>
  </div>
</div>

</div>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>