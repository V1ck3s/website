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
			<form name="creeringre" id="creeringre" method="POST" >
			<h1>Création ingrédient</h1>
			<p>
			<label for="nom">Nom</label>
			<input type="text" class="form-control" id="nom" name="nom" required />
			
			<label for="fin">Mesure</label>
				</br>
					<select name="mesure" id="mesure">
						<option value="cl">cl</option>
						<option value="g">g</option>
						<option value="Unité">Unité</option>
						<option value="Pincée">Pincée</option>
						<option value="Cuillère à soupe">Cuillère à soupe</option>
						<option value="Cuillère à café">Cuillère à café</option>
					</select>
			</br>
			
			<label for="qte">Quantité par défaut</label>
			<input type="text" class="form-control" id="qte" name="qte" required />
			
			<label for="cal">Quantité calories</label>
			<input type="text" class="form-control" id="cal" name="cal" required />
			
			<label for="prote">Quantité protéines</label>
			<input type="text" class="form-control" id="prote" name="prote" required />
			
			<label for="glu">Quantité glucides</label>
			<input type="text" class="form-control" id="glu" name="glu" required />
			
			<label for="lip">Quantité lipides</label>
			<input type="text" class="form-control" id="lip" name="lip" required />
			
			<label for="proti">Quantité protides</label>
			<input type="text" class="form-control" id="proti" name="proti" required />
		
			<p>
				<input type="submit" class="btn btn-default" value="Créer" id="envoyer" />
			</p>
	
			<p>
			<a href="../admin.php" title="">Page d'accueil administration</a>
			</form>
		</div>
</body>