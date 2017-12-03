<?php
		require ("Modele/modele_recette.php");
		
		$r= new Recette();
		
		$lesRecettes=$r->readAll();

		include("Vue/vue_liste_recettes.php");
?>	