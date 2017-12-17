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
			<form name="modifingre" id="modifingre" method="POST" >
			<h1>Modification ingrédient</h1>
			<p>
			<label for="rec">Nom de l'ingrédient</label>
			<?php
				echo '<select id="ingre" name="ingre">';
				while($unIngre=$lesIngredients->fetch(PDO::FETCH_OBJ))
				{
					$id=$unIngre->idIngre;
					$nom=$unIngre->nom;
					echo'<option value="'.$id.'">'.$nom.'</option>';
				}
				echo "</select>";
				echo '<label for="nom_modif">Nom</label>
					<input type="text" class="form-control" id="nom_modif" name="nom_modif"/>
					
					<label for="cal_modif">Quantité calories</label>
					<input type="text" class="form-control" id="cal_modif" name="cal_modif"/>
					
					<label for="prote_modif">Quantité protéines</label>
					<input type="text" class="form-control" id="prote_modif" name="prote_modif"/>
					
					<label for="glu_modif">Quantité glucides</label>
					<input type="text" class="form-control" id="glu_modif" name="glu_modif"/>
					
					<label for="lip_modif">Quantité lipides</label>
					<input type="text" class="form-control" id="lip_modif" name="lip_modif"/>
					
					<label for="proti_modif">Quantité protides</label>
					<input type="text" class="form-control" id="proti_modif" name="proti_modif"/>';
			?>
			<p>
				<input type="submit" class="btn btn-default" value="Modifier" id="envoyer" />
			</p>
	
			<p>
			<a href="../admin.php" title="">Page d'accueil administration</a>
			</form>
		</div>
</body>