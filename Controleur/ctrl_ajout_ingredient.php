<?php
    session_start();
	
	
	
	
	if(isset($_SESSION['login']))
	{	
		require ("../Modele/modele_recette.php");
		require ("../Modele/modele_ingredient.php");
		
		$r= new Recette();
		$i= new Ingredient();
				
		$lesRecettes=$r->readAll();
		$lesIngredients=$i->readAll();
		
		if(isset($_GET['ins']))
		{		
			if($_POST != null)
			{
				$reussi=$i->addIngredient();
				
				if($reussi)
				{
					echo"<script> alert ('L ingrédient a été ajouté à la recette');</script>";
					// et redirection vers la page d'accueil
					print ("<script language = \"JavaScript\">");
					print ("location.href = '../Controleur/ctrl_ajout_ingredient.php';");
					print ("</script>");
				}
				else
				{
					echo"<script> alert('L'ingrédient n'a pas été ajouté à la recette');</script>";
					// et redirection vers la page d'inscription
					print ("<script language = \"JavaScript\">");
					print ("location.href = '../Controleur/ctrl_ajout_ingredient.php';");
					print ("</script>");				
				}
			}
			else
			{
				?>		
				<script type="text/javascript">
					alert('Veuillez remplir les champs afin de mettre une recette');
					location.href = '../Controleur/ctrl_ajout_ingredient.php';
				</script>
				<?php
			}
		}
		else
		{
			include("../Vue/vue_ajout_ingredient.php");
		}
	}
	else
	{
		// et redirection vers la page d'accueil
		print ("<script language = \"JavaScript\">");
		print ("location.href = '../index.php';");
		print ("</script>");
	}
?>