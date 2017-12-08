<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Signin Template for Bootstrap</title>

    <?php include('../navbar.php'); ?>

    <!-- Custom styles for this template -->
    <link href="/website/css/signin.css" rel="stylesheet">
      
  </head>

  <body>

    <div class="container">

      <form class="form-signin" name="ajout" action="/website/Controleur/ctrl_ajout_recette.php?mem=true" method="POST">
        <h2 class="form-signin-heading">Ajouter une recette</h2>
        
          </br>
        <label for="fin">Nom</label>
        <input type="text" name="rec_nom" id="rec_nom" class="form-control" required>
        
        <label for="fin">Descriptif</label>
		<textarea rows="10" cols="39" name="rec_desc" id="rec_desc" placeholder="Description, étapes de préparation etc..." required></textarea>
        
        <label for="fin">Difficulté</label>
		</br>
		<select name="rec_dif" id="rec_dif">
			<option value="Très facile">Très facile</option>
			<option value="Facile">Facile</option>
			<option value="Moyen">Moyen</option>
			<option value="Difficile">Difficile</option>
		</select>
		</br>
		
		<label for="fin">Prix</label>
		</br>
		<select name="rec_prix" id="rec_prix">
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
		</select>
		</br>
		
		<label for="fin">Nombre de personnes</label>
        <input type="text" name="rec_pers" id="rec_pers" class="form-control" required>
        
        <label for="debut">Durée de préparation</label>
        <input type="text" name="rec_prep" id="rec_prep" class="form-control" required>
          
        <label for="fin">Durée de cuisson</label>
        <input type="text" name="rec_cuis" id="rec_cuis" class="form-control" required> 
          
          
        <label for="fin">URL de l'illustration</label>
        <input type="text" name="rec_illu" id="rec_illu" class="form-control" required> 
          
        <br>
          
          
        <button class="btn btn-lg btn-primary btn-block" type="submit" id="envoyer">Créer la recette</button>
		<button class="btn btn-lg btn-primary btn-block" type="reset" id="annuler">Annuler</button>
      </form>

    </div> <!-- /container -->
  </body>
</html>