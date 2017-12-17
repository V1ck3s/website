<?php session_start(); ?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Administration du projet-recettes.tk</title>
<link rel="stylesheet" href="../css/modif.css">
</head>

<?php 
//Teste si c'est bien l'administrateur qui est enregistré 
		if ((isset($_SESSION['loginadmin'])) && (!empty($_SESSION['loginadmin']))){
	 
		}else{ header("Location:../admin.php");}
		
?>

<body>
		<div class="liste">
			<form name="modifrec" id="modifrec" method="POST" >
			<h1>Modification recette</h1>
			<p>
			<label for="rec">Nom de la recette</label>
			<?php
				echo '<select id="rec" name="rec">';
				while($uneRecette=$lesRecettes->fetch(PDO::FETCH_OBJ))
				{
					$id=$uneRecette->idRec;
					$nom=$uneRecette->nom;
					echo'<option value="'.$id.'">'.$nom.'</option>';
				}
				echo "</select>";
				echo '<label for="nom_modif">Nom</label>
					<input type="text" class="form-control" id="nom_modif" name="nom_modif"/>
                    
                    <label for="desc_modif">Descriptif</label>
					<textarea rows="10" cols="39" name="desc_modif" id="desc_modif" placeholder="Description, étapes de préparation etc..."></textarea>
					
					<label for="dif_modif">Difficulté</label>
					</br>
						<select name="dif_modif" id="dif_modif">
							<option value="" selected></option>
							<option value="Très facile">Très facile</option>
							<option value="Facile">Facile</option>
							<option value="Moyen">Moyen</option>
							<option value="Difficile">Difficile</option>
						</select>
					</br>
					
					<label for="prix_modif">Prix</label>
					</br>
						<select name="prix_modif" id="prix_modif">
							<option value="" selected></option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
						</select>
					</br>
					
					<label for="nb_modif">Nombre de personnes</label>
					<input type="text" class="form-control" id="nb_modif" name="nb_modif"/>
					
					<label for="prep_modif">Temps de préparation</label>
					<input type="text" class="form-control" id="prep_modif" name="prep_modif"/>
					
					<label for="cuis_modif">Temps de cuisson</label>
					<input type="text" class="form-control" id="cuis_modif" name="cuis_modif"/>';
			?>
			<p>
				<input type="submit" class="btn btn-default" value="Modifier" id="envoyer" />
			</p>
	
			<p>
			<a href="../admin.php" title="">Page d'accueil administration</a>
			</form>
		</div>
</body>