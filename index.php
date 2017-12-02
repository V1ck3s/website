<!doctype html>
<html lang="fr">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        
        <title>Site de recettes</title>
        <?php include('navbar.php'); ?>
        <link href="css/carousel.css" rel="stylesheet">
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
            <img class="first-slide" src="http://www.dulcesol.com/bd/archivos/archivo464.jpg" alt="First slide">
            <div class="container">
              <div class="carousel-caption text-left">
                <h1>Premier exemple.</h1>
                <p>Inscrivez-vous dès maintenant pour accéder à plus de 10000 recettes en ligne et tout cela gratuitement !</p>
                <p><a class="btn btn-lg btn-primary" href="#" role="button">S'inscrire maintenant</a></p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img class="second-slide" src="http://www.dulcesol.com/bd/archivos/archivo467.jpg" alt="Second slide">
            <div class="container">
              <div class="carousel-caption">
                <h1>Deuxième exemple.</h1>
                <p>Nos recettes sont élaborés par nos plus grands chefs ! Venez voir une vidéo de leur réalisation.</p>
                <p><a class="btn btn-lg btn-primary" href="#" role="button">Voir la vidéo</a></p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img class="third-slide" src="http://www.dulcesol.com/bd/archivos/archivo472.jpg" alt="Third slide">
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

        <!-- Entre le caroussel et les recettes  -->

      <div class="container marketing">

        <!-- Les trois recettes sous le caroussel (je sais plus comment on l'écrit) -->
        <div class="row">
          <div class="col-lg-4">
            <img class="rounded-circle" src="https://i.pinimg.com/originals/9e/84/19/9e8419a67a0bc9214c235f7634533dfb.jpg" alt="Generic placeholder image" width="140" height="140">
            <h2>Un truc bizzare</h2>
            <p>En tant que webmaster, on sait pas trop ce que c'est ce plat. Ca à l'air bon mais on sait absolument pas ce que c'est. Apparement c'est italien. A vous de gouter !</p>
            <p><a class="btn btn-secondary" href="#" role="button">Voir les détails &raquo;</a></p>
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <img class="rounded-circle" src="http://cache.marieclaire.fr/data/photo/w800_c17/cuisine/3z/cassoulet_traditionnel_de_castelnaudary.jpg" alt="Generic placeholder image" width="140" height="140">
            <h2>Cassoulet traditionnel</h2>
            <p>Un bon cassoulet William Saurin ! Oh oui ! Avec des saucisses légèrement fumées. Oh oui ! Et cette sauce cuisinée à la tomate. Oh oui !!! Le cassoulet est une spécialité régionale du Languedoc, à base de haricots secs, généralement blancs, et de viande. 
            </p>
            <p><a class="btn btn-secondary" href="#" role="button">Voir les détails &raquo;</a></p>
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <img class="rounded-circle" src="http://cache.marieclaire.fr/data/photo/w800_c17/cuisine/40/vrai_couscous.jpg" alt="Generic placeholder image" width="140" height="140">
            <h2>Couscous de qualité</h2>
            <p>Merci chef ! Ce couscous de qualité est succulent ! Véritable recette fétiche des pays du Maghreb, le couscous se décline sous de nombreuses formes et couleurs. Un plat que nous aimons pour sa convivialité et sa générosité !
            </p>
            <p><a class="btn btn-secondary" href="#" role="button">Voir les détails &raquo;</a></p>
          </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->


        <!-- Commencement des textes -->

        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7">
            <h2 class="featurette-heading">Notre chef. <span class="text-muted">El Risitas.</span></h2>
            <p class="lead">Comme il le dit si bien : Ve por la paellera, ¡venga! Que a las dos de la tarde ¡ya están aquí! Mira, en bañador, con las chanclas, todo despeinado porque no me dio tiempo… na ponerme las chanclas… ¡y el bañador!
            </p>
          </div>
          <div class="col-md-5">
            <img class="featurette-image img-fluid mx-auto" src="https://risibank.fr/cache/stickers/d87/8709-full.png" alt="Generic placeholder image">
          </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7 order-md-2">
            <h2 class="featurette-heading">Ah oui ! c'est bon !<span class="text-muted">Voyez par vous-même...</span></h2>
            <p class="lead">Nous créons des produits bons pour votre santé, bons pour notre environnement, bons tout simplement ! La passion pour le produit nous anime à chaque instant. Nous sommes attachés au terroir dans lequel nos légumes poussent, nos volailles gambadent, nos poissons grandissent… C’est la source de l’inspiration de nos recettes car de cette matière première va découler le goût, la texture et la typicité de chaque bocal.
            </p>
          </div>
          <div class="col-md-5 order-md-1">
            <img class="featurette-image img-fluid mx-auto" src="http://www.lustucru.fr/app/uploads/sites/2/Lustucru_Produit_Pate_Lasagnes-250g.png" alt="Generic placeholder image">
          </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7">
            <h2 class="featurette-heading">Bordel de cul. <span class="text-muted">C'est incroyablement bon.</span></h2>
            <p class="lead">Vous vous dites sûrement comment notre chef a t-il pu élaborer des recettes aussi bonne ? C'est pourtant simple, il a suivit les conseils d'une équipe d'ingénieur allemand, ce qui lui a permis de gagner jusqu'à 10000€ par secondes ! Oui vous lisez bien ! 10000€ par seconde seulement en épluchant les pommes de terre ! Inscrivez vous pour savoir comment il a fait !</p>
          </div>
          <div class="col-md-5">
            <img class="featurette-image img-fluid mx-auto" src="http://www.ouah.fr/img/cash-cadeaux/gagner-1000-euros-tickets-a-gratter_g.gif" alt="Generic placeholder image">
          </div>
        </div>

        <hr class="featurette-divider">

        

      </div><!-- le div container -->


      <!-- FOOTER -->
      <footer class="container">
        <p class="float-right"><a href="#">Remonter la page</a></p>
        <p>&copy; 2017 Website, Victor et Samy.</p>
      </footer>

    </main>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../../../assets/js/vendor/popper.min.js"></script>
    <script src="../../../../dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../../../../assets/js/vendor/holder.min.js"></script>
        
        
    </body>
</html>
