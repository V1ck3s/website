<?php
		require ("../Modele/modele_ingredient.php");
		
		$i= new Ingredient();
		
		$lesIngredients=$i->readAll();
		
		if($_POST != null)
			{		
				$delIngre=$i->deleteIngredient($_POST['ingre']);
				
				if($delIngre)
				{
					echo"<script> alert ('Ingrédient supprimé');</script>";
					// et redirection vers la page d'accueil
					print ("<script language = \"JavaScript\">");
					print ("location.href = 'ctrl_sup_ingredient.php';");
					print ("</script>");
				}
				else
				{
					echo"<script> alert('Echec de la suppression');</script>";
					// et redirection vers la page d'inscription
					print ("<script language = \"JavaScript\">");
					print ("location.href = 'ctrl_sup_ingredient.php';");
					print ("</script>");				
				}
			}
	
		include("../Vue/vue_sup_ingredient.php");
?>	