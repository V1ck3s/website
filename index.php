<?php session_start(); ?>
<!doctype html>
<html lang="fr">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        
        <title>Site de recettes</title>
        <?php include 'navbar.php';?>
        <link href="/css/carousel.css" rel="stylesheet">
    </head>
    <body>



    <main role="main">

      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="first-slide" src="/img/archivo464.jpg" alt="First slide">
            <div class="container">
              <div class="carousel-caption text-left">
                <h1>Premier exemple.</h1>
                <p>Inscrivez-vous dès maintenant pour accéder à plus de 10000 recettes en ligne et tout cela gratuitement !</p>
                <p><a class="btn btn-lg btn-primary" href="../Controleur/ctrl_inscription.php" role="button">S'inscrire maintenant</a></p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img class="second-slide" src="/img/archivo467.jpg" alt="Second slide">
            <div class="container">
              <div class="carousel-caption">
                <h1>Deuxième exemple.</h1>
                <p>Nos recettes sont élaborés par nos plus grands chefs ! Venez voir une vidéo de leur réalisation.</p>
                <p><a class="btn btn-lg btn-primary" href="#" role="button">Voir la vidéo</a></p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img class="third-slide" src="/img/archivo472.jpg" alt="Third slide">
            <div class="container">
              <div class="carousel-caption text-right">
                <h1>Troisième exemple.</h1>
                <p>Les webmasters de ce site sont plutôt fort, vous ne trouvez pas ? Personnellement je trouve que si :D !</p>
                <p><a class="btn btn-lg btn-primary" href="#" role="button">J'approuve !</a></p>
              </div>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Précédent</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Suivant</span>
        </a>
      </div>

        <!-- Entre le carousel et les recettes  -->

      <div class="container marketing">

        <!-- Les trois recettes sous le carousel -->
        <div class="row">
          <div class="col-lg-4">
            <img class="rounded-circle" src="/img/9e8419a67a0bc9214c235f7634533dfb.jpg" alt="Generic placeholder image" width="140" height="140">
            <h2>Posse quod colebat</h2>
            <p>De elogio ob quoque elogio neminem factitarunt exitiale quod iussisse haec cohorte propositum propositum aliis et poenae similia neminem numquam obstinatum addictum non poenae elogio in obstinatum aliquando factitarunt oblato !</p>
            <p><a class="btn btn-secondary" href="#" role="button">Voir les détails &raquo;</a></p>
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <img class="rounded-circle" src="/img/cassoulet_traditionnel_de_castelnaudary.jpg" alt="Generic placeholder image" width="140" height="140">
            <h2>Publico isdem acciderat</h2>
            <p>Et publicam neque nos oporteat locati et rem Scaevola si Scaevola longe Etenim rei ut nec curriculoque Etenim sanciatur locati Scaevola nos in neque in quis nos eo nos enim. 
            </p>
            <p><a class="btn btn-secondary" href="#" role="button">Voir les détails &raquo;</a></p>
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <img class="rounded-circle" src="/img/vrai_couscous.jpg" alt="Generic placeholder image" width="140" height="140">
            <h2>Ordinis uno vilitatem </h2>
            <p>Id aliquotiens id velut sedisset fas specie specie sed velut quod implacabilitati legum Caesaris Caesaris urgebatur ut saevi: quaerebatur implacabilitati impleri sed tenus sedisset perpensum quaerebatur ulla praescriptis legum impleri !
            </p>
            <p><a class="btn btn-secondary" href="#" role="button">Voir les détails &raquo;</a></p>
          </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->


        <!-- Commencement des textes -->

        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7">
            <h2 class="featurette-heading">Vile inanes <span class="text-muted">flatus .</span></h2>
            <p class="lead">Superasset ardenter carentibus haec quam statuam quod aereis primo sensu quod inter honeste Acilio quasi posse multos ad est commendari mussitare Acilio armisque consiliis delatum quidam ambigere gravius non ut !
            </p>
          </div>
          <div class="col-md-5">
            <img class="featurette-image img-fluid mx-auto" src="/img/ob_8505e1_poulet-dg00.jpg" alt="Generic placeholder image">
          </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7 order-md-2">
            <h2 class="featurette-heading">Et et administrante aeternam ! <span class="text-muted">vulgus et administrante...</span></h2>
            <p class="lead">Prope promiscuae magna spatio multitudo Euphrate Indi sollemnitate flumine initium nundinas consueta consueta municipium commercanda plurima Septembris Macedonum mensis vehi ad disparatur mercatoribus prope sollemnitate municipium municipium mittunt Septembris Anthemusia.
            </p>
          </div>
          <div class="col-md-5 order-md-1">
            <img class="featurette-image img-fluid mx-auto" src="/img/20141210_125044b-700x400.jpg" alt="Generic placeholder image">
          </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7">
            <h2 class="featurette-heading">Sed ultra dignitatis <span class="text-muted">oppido usibus et sed.</span></h2>
            <p class="lead">Sed ultra dignitatis ad oppido usibus et sed et ob asperos motus crebros insolenter seditiones institutus ob avidis potestate intentum prudens sunt ob efferens usibus et institutus vini: concitatae sed !</p>
          </div>
          <div class="col-md-5">
            <img class="featurette-image img-fluid mx-auto" src="/img/soupe.jpg" alt="Generic placeholder image">
          </div>
        </div>

        <hr class="featurette-divider">

        

      </div><!-- le div container -->


      <!-- FOOTER -->
      <footer class="container">
        <p class="float-right"><a href="#">Remonter la page</a></p>
          <p><a href="/admin.htm">Administration</a></p>
        <p>&copy; 2017 Website, Victor et Samy.</p>
      </footer>

    </main>


    
        
        
    </body>
</html>
