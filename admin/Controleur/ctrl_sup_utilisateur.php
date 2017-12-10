<?php
		require ("Modele/modele_sup_utilisateur.php");
		
		$u= new Utilisateur();
		
		$lesUsers=$u->readAll();
		
		if($_POST != null)
			{		
				$delUser=$u->deleteUtilisateur($_POST['util']);
				
				if($delUser)
				{
					echo"<script> alert ('Utilisateur supprimé');</script>";
					// et redirection vers la page d'accueil
					print ("<script language = \"JavaScript\">");
					print ("location.href = 'admin.php?do=sup_utilisateur';");
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
	
		include("Vue/vue_sup_utilisateur.php");
?>	