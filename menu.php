<html>
    <link href="/css/bootstrap.css" rel="stylesheet"> 
    
        <!--
        <script src="js/jquery.js"></script>
        <script src="js/popper/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        -->
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    
    
<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark justify-content-between">
    <a class="navbar-brand" href="/index.php">
        
    <img src="https://recettes-et-mirettes.fr/wp-content/uploads/2017/09/09.png" width="30" height="30" alt="">
    </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    
    
  
  <div class="collapse navbar-collapse col" id="navbarNav">
      
    <a class="navbar-brand" href="/index.php">Site de Recettes</a>
      
      <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="/index.php">Accueil <span class="sr-only">(current)</span></a>
      </li>
        
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Recettes
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		  <a href="/Controleur/ctrl_liste_recettes.php" class="dropdown-item" href="#">Liste des recettes</a>
          <a href="/Controleur/ctrl_ajout_recette.php" class="dropdown-item" href="#">Ajouter une recette</a>
          <a href="/Controleur/ctrl_ajout_ingredient.php" class="dropdown-item" href="#">Ajout un ingrédient à une recette</a>
        </div>
      </li>
        
        <li class="nav-item">
        <a class="nav-link" href="#">Planning</a>
      </li>
    
    </ul>
    </div>
    
    
    <div class="container col">


        <a href="/Controleur/ctrl_deconnexion.php" class="btn btn-light" role="button">Se déconnecter</a>
        
        
    <div class="container col">
        </div>
    
    </div>
  
    </nav>
</html>