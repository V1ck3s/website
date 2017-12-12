<?php
		require ("../Modele/modele_ingredient.php");
		
		$i= new Ingredient();
		
		$lesIngredients=$i->readAll();
		
		if($_POST != null)
		{	
			if($_POST['nom_modif'] != "")
			{
				$upd=$i->updateNom($_POST['ingre']);
			}
				
			if($upd)
			{
				echo"<script> alert ('Ingrédient modifié');</script>";
				// et redirection vers la page d'accueil
				print ("<script language = \"JavaScript\">");
				print ("location.href = 'ctrl_modif_ingredient.php';");
				print ("</script>");
			}
			else
			{
				echo"<script> alert('Echec de la modification');</script>";
				// et redirection vers la page d'inscription
				print ("<script language = \"JavaScript\">");
				print ("location.href = 'ctrl_modif_ingredient.php';");
				print ("</script>");				
			}
		}
	
		include("../Vue/vue_modif_ingredient.php");
?>	