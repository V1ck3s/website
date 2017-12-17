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
				
			if($_POST['desc_modif'] != "")
			{
				$upd2=$r->updateDesc($_POST['rec']);
			}
			
			if($_POST['dif_modif'] != "")
			{
				$upd3=$r->updateDif($_POST['rec']);
			}
			
			if($_POST['prix_modif'] != "")
			{
				$upd4=$r->updatePrix($_POST['rec']);
			}
			
			if($_POST['nb_modif'] != "")
			{
				$upd5=$r->updateNbPers($_POST['rec']);
			}
			
			if($_POST['prep_modif'] != "")
			{
				$upd6=$r->updatePrep($_POST['rec']);
			}
			
			if($_POST['cuis_modif'] != "")
			{
				$upd7=$r->updateCuis($_POST['rec']);
			}
				
			if($upd || $upd2 || $upd3 || $upd4 || $upd5 || $upd6 || $upd7)
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