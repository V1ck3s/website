<?php
		require ("../Modele/modele_recette.php");
		
		$r= new Recette();
		
		$lesRecettes=$r->readAll();
		
		if($_POST != null)
			{		
				$delRec=$r->deleteRecette($_POST['rec']);
				
				if($delRec)
				{
					echo"<script> alert ('Recette supprimée');</script>";
					// et redirection vers la page d'accueil
					print ("<script language = \"JavaScript\">");
					print ("location.href = 'ctrl_sup_recette.php';");
					print ("</script>");
				}
				else
				{
					echo"<script> alert('Echec de la suppression');</script>";
					// et redirection vers la page d'inscription
					print ("<script language = \"JavaScript\">");
					print ("location.href = 'ctrl_sup_recette.php';");
					print ("</script>");				
				}
			}
	
		include("../Vue/vue_sup_recette.php");
?>	