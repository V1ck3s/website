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
					<input type="text" class="form-control" id="nom_modif" name="nom_modif"/>';
			?>
			<p>
				<input type="submit" class="btn btn-default" value="Modifier" id="envoyer" />
			</p>
	
			<p>
			<a href="../admin.php" title="">Page d'accueil administration</a>
			</form>
		</div>
</body>