<?php require "header.php"; ?>
<?php
include "../core/eventC.php";
if (isset($_POST['valueToSearch']) ) {
    $events = eventsController::allwithSearch($_POST['valueToSearch']);
} else {
    $events = eventsController::all();
}


?>




<div class="container">
    <div class="row">
        

        <form method="POST" action="evenement.php">
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
    </div>
    <div class="row">
        <?php foreach ($events as $event) { ?>
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail">
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                    </svg>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $event->getnom(); ?></h5>
                        <h6>Lieux : <span><?php echo $event->getlieu(); ?></span></h6><br>

                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <form action="gallery.php" method="POST">
                                <input type="hidden" name="id_event" value="<?php echo $event->getid_event(); ?>" />
                                <input type="hidden" name="nom" value="<?php echo $event->getnom(); ?>" />
                                <input type="hidden" name="date" value="<?php echo $event->getdate_event(); ?>" />
                                <input class="btn btn-warning" type="submit" value="Voir plus" />
                            </form>

                            <small class="text-muted"><?php echo $event->getdate_event(); ?></small>
                        </div>
                    </div>
                </div>
            </div>

        <?php } ?>
    </div>
</div>

<?php require "footer.php"; ?>