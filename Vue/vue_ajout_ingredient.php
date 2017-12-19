<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Ajout d'ingrédient</title>

    <?php include('../navbar.php'); ?>

    <!-- Custom styles for this template -->
    <link href="/css/signin.css" rel="stylesheet">
      
  </head>

  <body>

    <div class="container">

      <form class="form-signin" name="ajout" method="POST">
        <h2 class="form-signin-heading">Ajouter un ingrédient à une recette</h2>
        
          </br>
        
        <label for="fin">Recette</label>
		</br>
		<?php
			echo '<select id="rec" name="rec">';
			while($uneRecette=$lesRecettes->fetch(PDO::FETCH_OBJ))
			{
				$id=$uneRecette->idRec;
				$nom=$uneRecette->lib;
				echo'<option value="'.$id.'">'.$nom.'</option>';
			}
			echo "</select>";
		?>
		</br>
		
		<label for="fin">Ingrédient</label>
		</br>
		<?php
			echo '<select id="ingre" name="ingre">';
			while($unIngre=$lesIngredients->fetch(PDO::FETCH_OBJ))
			{
				$id=$unIngre->idIngre;
				$nom=$unIngre->nom;
				echo'<option value="'.$id.'">'.$nom.'</option>';
			}
			echo "</select>";
		?>
		</br>
		
		<label for="fin">Quantité</label>
        <input type="text" name="quantite" id="quantite" class="form-control" required>
          
        <br>
          
        <button class="btn btn-lg btn-primary btn-block" type="submit" id="envoyer">Ajouter</button>
		<button class="btn btn-lg btn-primary btn-block" type="reset" id="annuler">Annuler</button>
		
		<br>
		
	    <p>En cas d'ingrédient manquant, contactez l'administrateur</p>
      </form>

    </div> <!-- /container -->
  </body>
</html>