<?php
		if($_POST != null)
		{		
			require ("../Modele/modele_ingredient.php");
			
			$i= new Ingredient();
			
			$creer=$i->createIngredient();
			
			if($creer)
			{
				echo"<script> alert ('Ingrédient crée');</script>";
				// et redirection vers la page d'accueil
				print ("<script language = \"JavaScript\">");
				print ("location.href = 'ctrl_creer_ingredient.php';");
				print ("</script>");
			}
			else
			{
				echo"<script> alert('Echec de la création');</script>";
				// et redirection vers la page d'inscription
				print ("<script language = \"JavaScript\">");
				print ("location.href = 'ctrl_creer_ingredient.php';");
				print ("</script>");				
			}
		}
	
		include("../Vue/vue_creer_ingredient.php");
?>	