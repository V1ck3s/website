<?php
			//j'indique que j'ai besoin du fichier modele_table_article
			//qui contient la classe table membre
			require ("admin/Modele/modele_connexion_admin.php");
			
			//J'instancie un objet Table membre
			$cm= new ConnexionAdmin();
			
			if(isset($_GET['mem']))
			{
				$existe=$cm->existe();
				$login= $_POST['login_admin'];//identifiant de connexion
				if($existe==1)
				{
					$uneLigne=$cm->connection();
				}
				else //si la requete ne renvoie pas de ligne
				{
					//si erreur=true(mot de passe ou login incorrect alors on affiche un message d'erreur)
					echo"<script> alert ('Login ou Mot De Passe Incorrect !');</script>";
					// et redirection vers la page d'accueil
					print ("<script language = \"JavaScript\">");
					print ("location.href = 'index.php?do=admin';");
					print ("</script>");
				}
			}
			else
			{
				include("admin/Vue/vue_connexion_admin.php");
			}
?>