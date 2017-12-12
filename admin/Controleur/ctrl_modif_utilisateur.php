<?php
		require ("../Modele/modele_utilisateur.php");
		
		$u= new Utilisateur();
		
		$lesUsers=$u->readAll();
		
		if($_POST != null)
		{	
			if($_POST['prenom_modif'] != "" && $_POST['nom_modif'] != "")
			{
				$upd=$u->updatePrenom($_POST['util']);
				$updNom=$u->updateNom($_POST['util']);
			}
			elseif($_POST['prenom_modif'] != "")
			{
				$upd=$u->updatePrenom($_POST['util']);
			}
			elseif($_POST['nom_modif'] != "")
			{
				$upd=$u->updateNom($_POST['util']);
			}
				
			if($upd || $updNom)
			{
				echo"<script> alert ('Utilisateur modifié');</script>";
				// et redirection vers la page d'accueil
				print ("<script language = \"JavaScript\">");
				print ("location.href = 'ctrl_modif_utilisateur.php';");
				print ("</script>");
			}
			else
			{
				echo"<script> alert('Echec de la modification');</script>";
				// et redirection vers la page d'inscription
				print ("<script language = \"JavaScript\">");
				print ("location.href = 'ctrl_modif_utilisateur.php';");
				print ("</script>");				
			}
		}
	
		include("../Vue/vue_modif_utilisateur.php");
?>	