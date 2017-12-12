<?php
		require ("../Modele/modele_recette.php");
		
		$r= new Recette();
		
		$lesRecettes=$r->readAll();
		
		if($_POST != null)
		{	
			if($_POST['nom_modif'] != "")
			{
				$upd=$r->updateNom($_POST['rec']);
			}
				
			if($upd)
			{
				echo"<script> alert ('Recette modifiée');</script>";
				// et redirection vers la page d'accueil
				print ("<script language = \"JavaScript\">");
				print ("location.href = 'ctrl_modif_recette.php';");
				print ("</script>");
			}
			else
			{
				echo"<script> alert('Echec de la modification');</script>";
				// et redirection vers la page d'inscription
				print ("<script language = \"JavaScript\">");
				print ("location.href = 'ctrl_modif_recette.php';");
				print ("</script>");				
			}
		}
	
		include("../Vue/vue_modif_recette.php");
?>	