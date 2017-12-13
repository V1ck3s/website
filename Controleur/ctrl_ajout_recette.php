<?php

	require ("../Modele/modele_ajout_recette.php");

	$a= new AjoutRecette();			
				
	$reussi=$a->create();
			
	if($_POST != null)
	{		
		if($reussi)
		{
			echo"<script> alert ('La recette a été ajoutée');</script>";
			// et redirection vers la page d'accueil
			print ("<script language = \"JavaScript\">");
			print ("location.href = '../Controleur/ctrl_ajout_recette.php';");
			print ("</script>");
		}
		else
		{
			echo"<script> alert('La recette n'a pas été ajoutée');</script>";
			// et redirection vers la page d'inscription
			print ("<script language = \"JavaScript\">");
			print ("location.href = '../Controleur/ctrl_ajout_recette.php';");
			print ("</script>");				
		}
	}
	
	include("../Vue/vue_ajout_recette.php");

 /*
	if(isset($_SESSION['login']))
	{	
		if(isset($_GET['ins']))
		{
			if($_POST != null)
			{
				require ("../Modele/modele_ajout_recette.php");
				
				$a= new AjoutRecette();			
				
				$reussi=$a->create();
				
				if($reussi)
				{
					echo"<script> alert ('La recette a été ajoutée');</script>";
					// et redirection vers la page d'accueil
					print ("<script language = \"JavaScript\">");
					print ("location.href = '../Controleur/ctrl_ajout_recette.php';");
					print ("</script>");
				}
				else
				{
					echo"<script> alert('La recette n'a pas été ajoutée');</script>";
					// et redirection vers la page d'inscription
					print ("<script language = \"JavaScript\">");
					print ("location.href = '../Controleur/ctrl_ajout_recette.php';");
					print ("</script>");				
				}
			}
			else
			{
				?>		
				<script type="text/javascript">
					alert('Veuillez remplir les champs afin de mettre une recette');
					location.href = '../Controleur/ctrl_ajout_recette.php';
				</script>
				<?php
			}
		}
		else
		{
			include("../Vue/vue_ajout_recette.php");
		}
	}
	else
	{
		// et redirection vers la page d'accueil
		print ("<script language = \"JavaScript\">");
		print ("location.href = '../index.php';");
		print ("</script>");
	}
*/
?>