<?php
	session_start();
 
	if(isset($_SESSION['login']))
	{	
		if($_POST != null)
    	{		
    	    require ("../Modele/modele_recette.php");
    	    
	        $a= new Recette();
	        
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
    	
    	include("../Vue/vue_ajout_recette.php");
	}
	else
	{
		// et redirection vers la page d'accueil
		print ("<script language = \"JavaScript\">");
		print ("location.href = '../index.php';");
		print ("</script>");
	}

?>