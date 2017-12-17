<?php
		require ("../Modele/modele_ingredient.php");
		
		$i= new Ingredient();
		
		$lesIngredients=$i->readAll();
		
/* 		$upd="";
		$upd2="";
		$upd3="";
		$upd4="";
		$upd5="";
		$upd6=""; */
		
		if($_POST != null)
		{	
			if($_POST['nom_modif'] != "")
			{
				$upd=$i->updateNom($_POST['ingre']);
			}
			
			if($_POST['cal_modif'] != "")
			{
				$upd2=$i->updateCal($_POST['ingre']);
			}
			
			if($_POST['prote_modif'] != "")
			{
				$upd3=$i->updateProte($_POST['ingre']);
			}
			
			if($_POST['glu_modif'] != "")
			{
				$upd4=$i->updateGlu($_POST['ingre']);
			}
			
			if($_POST['lip_modif'] != "")
			{
				$upd5=$i->updateLip($_POST['ingre']);
			}
			
			if($_POST['proti_modif'] != "")
			{
				$upd6=$i->updateProti($_POST['ingre']);
			}
				
			if($upd || $upd2 || $upd3 || $upd4 || $upd5 || $upd6 )
			{
				echo"<script> alert ('Ingrédient modifié');</script>";
				// et redirection vers la page d'accueil
				print ("<script language = \"JavaScript\">");
				print ("location.href = 'ctrl_modif_ingredient.php';");
				print ("</script>");
			}
			else
			{
				echo"<script> alert('Echec de la modification');</script>";
				// et redirection vers la page d'inscription
				print ("<script language = \"JavaScript\">");
				print ("location.href = 'ctrl_modif_ingredient.php';");
				print ("</script>");				
			}
		}
	
		include("../Vue/vue_modif_ingredient.php");
?>	