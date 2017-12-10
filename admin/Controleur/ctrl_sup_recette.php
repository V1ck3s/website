<?php
		require ("Modele/modele_sup_recette.php");
		
		$r= new Recette();
		
		$lesRecettes=$r->readAll();
		
		if($_POST != null)
			{		
				$delRec=$r->deleteRecette($_POST['util']);
				
				if($delRecette)
				{
					echo"<script> alert ('Recette supprimée');</script>";
					// et redirection vers la page d'accueil
					print ("<script language = \"JavaScript\">");
					print ("location.href = 'admin.php?do=sup_recette';");
					print ("</script>");
				}
				else
				{
					echo"<script> alert('Echec de la suppression');</script>";
					// et redirection vers la page d'inscription
					print ("<script language = \"JavaScript\">");
					print ("location.href = 'admin.php';");
					print ("</script>");				
				}
			}
	
		include("Vue/vue_sup_recette.php");
?>	