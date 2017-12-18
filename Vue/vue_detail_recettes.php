<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Détails recette</title>

    
    <?php include('../navbar.php'); ?>
    <script src="/js/details.js"></script>
    <!-- Custom styles for this template -->
    <link href="/css/details.css" rel="stylesheet">
  </head>

  <body>


    <div class="container">
        
      <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-12 col-md-12">
          <?php 
            
            echo "<h1> ".$uneRecette->libRec." </h1> <br>";
            
            echo "<div class=\"row\">";
            
            echo "<div class=\"col-6 col-lg-6\">
            
             <img src=\"".$uneRecette->adresse."\" alt=\"Smiley face\">            
            </div>";
            
            
            echo "<div class=\"col-6 col-lg-6\">
                <h2>Informations :</h2>
                <br>
                Auteur : <b>".$uneRecette->utilNom." ".$uneRecette->prenom."</b>
                <br>
                Difficulté : <b>".$uneRecette->difficulte."</b>
                <br>
                Prix : <b>".$uneRecette->prix."</b>
                <br>
                Pour : <b>".$uneRecette->nbPersonnes." personne(s) </b>
            </div>";
            
            echo "<div class=\"col-6 col-lg-12\">
            <h2>Description</h2>
            
            
            ".$uneRecette->descriptif."
            
            
            </div>";
            
            echo "<div class=\"col-6 col-lg-6\">
                <h2>Ingrédients :</h2>";
            foreach($unIngredient as $donnees) {
                
                echo $donnees->qte." ".$donnees->libIng."<br>";
                
                		
            }
            echo "</div>";
            
            echo "<div class=\"col-6 col-lg-6\">
            <h2>Valeurs nutritionnelles :</h2>
              <br>
              ".$uneRecette->cal." calories
              <br>
              ".$uneRecette->prot." protéines
              <br>
              ".$uneRecette->glu." glucides
              <br>
              ".$uneRecette->lip." lipides
              <br>
            </div>";
            
            echo "</div> <!--Row-->";
            
            
          
        ?> 
            
        </div><!--/span-->

        

      <hr>

      <footer>
        <p>&copy; 2017 Website, Victor et Samy.</p>
      </footer>

    </div>


    
    
  </body>
</html>