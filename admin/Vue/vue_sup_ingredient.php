<?php session_start(); ?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Administration du projet-recettes.tk</title>
<link rel="stylesheet" href="../css/sup.css">
</head>
<?php 
//Teste si c'est bien l'administrateur qui est enregistré 
		if ((isset($_SESSION['loginadmin'])) && (!empty($_SESSION['loginadmin']))){
	 
		}else{ header("Location:../admin.php");}
		
?>

<body>
		<div class="liste">
			<form name="supingre" id="supingre" method="POST">
			<h1>Suppression ingrédient</h1>
			<p>
			<label for="ingre">Nom de l'ingrédient</label>
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
			<p>
				<input type="submit" class="btn btn-default" value="Supprimer" id="envoyer" />
			</p>
	
			<p>
			<a href="../admin.php" title="">Page d'accueil administration</a>

			</form>
		</div>
</body>