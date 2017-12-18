<?php
	require_once ("../Modele/modele_planning.php");
	
	$p=new Planning();
	$r=new Planning();
	
	//Je récupère tous les objets
	$unPlanning=$p->findById($_GET['idPlanning']);
	$uneRecette=$r->findRec($_GET['idPlanning']);
	
	if($unPlanning != null){
	    //je passe la main à la vue
	    include("../Vue/vue_detail_planning.php");
	}
	else
	{
		?>		
		<script type="text/javascript">
			alert('Le planning demandé n\'existe pas');
			window.history.back();
		</script>
		<?php
	}
?>