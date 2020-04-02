<?php
include('includes/header.php');
include('includes/navbar.php');

include "../core/clientC.php";
include "../classe/client.php";
$client1C = new clientC();
$listeClients = $client1C->afficherClients();

?>

<?php



if (isset($_POST['search'])) {
	$valueToSearch = $_POST['valueToSearch'];
	// search in all table columns
	// using concat mysql function
	$query = "SELECT * FROM client WHERE CONCAT(id_client, username, nom, prenom,email, adresse, telephone, password) LIKE '%" . $valueToSearch . "%'";
	$search_result = filterTable($query);
} else {
	$query = "SELECT * FROM client";
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

<div class="card">
	<div class="card-header">
		<span class="table-add float-right">
			<a href="#!" class="btn btn-icon"><i class="fa fa-plus fa-1x" aria-hidden="true"></i></a>
		</span>
		<h4>Tableau des clients</h4>
	</div>
	<div class="card-body">
		<div id="table" class="table-responsive table-editable">
			<table class="table table-bordered table-responsive-md table-striped text-center mb-0 text-nowrap">
				<thead>
					<tr>
						<th class="text-center">Id</th>
						<th class="text-center">Username</th>
						<th class="text-center">nom</th>
						<th class="text-center">prenom</th>
						<th class="text-center">telephone</th>
						<th class="text-center">adresse</th>
						<th class="text-center">Email</th>
						<th>DELETE </th>


					</tr>
				</thead>

				<tbody>
					<?PHP while ($row = mysqli_fetch_array($search_result)) :


						?>
						<tr>
							<td><?PHP echo $row['id_client']; ?></td>
							<td><?PHP echo $row['username']; ?></td>
							<td><?PHP echo $row['nom']; ?></td>
							<td><?PHP echo $row['prenom']; ?></td>
							<td><?PHP echo $row['telephone']; ?></td>
							<td><?PHP echo $row['adresse']; ?></td>
							<td><?PHP echo $row['email']; ?></td>
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