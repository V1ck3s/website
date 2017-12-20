<?php
    session_start();
	
	require ("../Modele/modele_planning.php");
		
	$p= new Planning();
		
	$lesPlannings=$p->readAll();

	include("../Vue/vue_planning.php");
?>	