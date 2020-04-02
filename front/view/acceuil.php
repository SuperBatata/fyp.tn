<?php require "header.php"; ?>



<?php if (isset($_SESSION['auth'])) : ?>

    <link rel="stylesheet" href="css/style1.css" />
<main role="main">

  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" ><rect width="100%" height="100%" fill="#777"/></svg>
        <img src="img/gallery/7.png" >
        <div class="container">
          <div class="carousel-caption text-left">

            <h1>Consultez notre galerie d'événements.</h1>
            <p>Vous trouverez nos dernières photos d'événements se déroulant en tunisie.</p>
            <p><a class="btn btn-lg btn-warning" href="evenement.php" role="button">Galerie</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img"><rect width="100%" height="100%" fill="#777"/></svg>
        <img src="img/15062019-IMG_5198.JPG" >
        <div class="container">
          <div class="carousel-caption">
        
          <h1>Consultez notre galerie d'événements.</h1>
            <p>Vous trouverez nos dernières photos d'événements se déroulant en tunisie.</p>
            <p><a class="btn btn-lg btn-warning" href="evenement.php" role="button">Galerie</a></p>  
        
        </div> 
        </div>
      </div>
      <div class="carousel-item">
        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img"><rect width="100%" height="100%" fill="#777"/></svg>
        <img src="img/15062019-IMG_5375.JPG">
        <div class="container">
          <div class="carousel-caption text-right">
        
          <h1>Consultez notre galerie d'événements.</h1>
            <p>Vous trouverez nos dernières photos d'événements se déroulant en tunisie.</p>
            <p><a class="btn btn-lg btn-warning" href="evenement.php" role="button">Galerie</a></p>  
        </div> 
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

    <!-- START THE FEATURETTES -->

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading">First featurette heading. <span class="text-muted">It’ll blow your mind.</span></h2>
        <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
      </div>
      <div class="col-md-5">
        <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 500x500"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"/><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text></svg>
      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7 order-md-2">
        <h2 class="featurette-heading">Oh yeah, it’s that good. <span class="text-muted">See for yourself.</span></h2>
        <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
      </div>
      <div class="col-md-5 order-md-1">
        <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 500x500"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"/><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text></svg>
      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading">And lastly, this one. <span class="text-muted">Checkmate.</span></h2>
        <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
      </div>
      <div class="col-md-5">
        <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 500x500"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"/><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text></svg>
      </div>
    </div>

    <hr class="featurette-divider">

    <!-- /END THE FEATURETTES -->

  </div><!-- /.container -->


  <!-- FOOTER -->
  <footer class="container">
    <p class="float-right"><a href="#">Back to top</a></p>
    <p>&copy; 2017-2019 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
  </footer>
</main>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.4/assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="/docs/4.4/dist/js/bootstrap.bundle.min.js" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script></body>


		<?php else : ?>


<section class="container">
    <div class="row">

        <div class="col-sm-5 col-md-6">

                                            <style>

                                            body
                                                    {
                                                    background : url(img/bg.svg)no-repeat;
                                                    background-size: cover;
                                                    padding-bottom: 60%;
                                                    }



                                            </style>

                        <div class="titre">
                            <div class="g2ClMQ">
                                <h1 class="font-weight-bold" >Profiter des services offerts de FYP.</h1>
                            </div>
                            <br>
                            <h2 class="font-italic">Créez un compte maintenant, c’est gratuit.</h2>
                            </div>
                            <br>

                        <br>


                        </div>

    </div>

        <div class="row">
                <div class="col"></div>
                <div class="col">
                    <p style="color:black;"> Déjà inscrit ? <a class="_9COVcA" href="login.php" draggable="false" style="color:white;" > Se connecter</a></p>
                    <button class="btn btn-warning" title="inscription" aria-label="S’inscrire avec une adresse e-mail" type="button" >
                    <a  href="inscription.php"><span class="Lc562Q" >S’inscrire avec une adresse e-mail</span> </a>
                    </button>
                </div>
                <div class="col"></div>
        </div>



</section>


		<?php endif; ?>




<?php require "footer.php"; ?>