<?php
include('includes/header.php'); 
include('includes/navbar.php'); 

require_once 'config.php';
//require_once '../inc/functions.php';
$pdo = config::getConnexion();
$req = $pdo->prepare('SELECT * FROM client');
$req->execute();

  if($req === false){
    die("erreur");
  }

?>

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Client  </h6>
  </div>

  <div class="card-body">

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> ID </th>
            <th> Username </th>
            <th>Email </th>
            
            <th>EDIT </th>
            <th>DELETE </th>
          </tr>
        </thead>
        <tbody>
        <?php while ($row = $req->fetch(PDO ::FETCH_ASSOC)): ?>
          <tr>
            <td> <?php  echo $row['id_client']; ?> </td>
            <td> <?php echo $row['username']; ?></td>
            <td> <?php echo $row['email']; ?></td>
            <td>
                <form action="" method="post">
                    <input type="hidden" name="edit_id" value="">
                    <button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                </form>
            </td>
            <td>
                <form action="" method="post">
                  <input type="hidden" name="delete_id" value="">
                  <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
                </form>
            </td>
          </tr>
        <?php endwhile; ?>
        </tbody>
      </table>

    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>