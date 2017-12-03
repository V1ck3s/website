<?php
	require_once ("Modele/modele_recette.php");
	require_once ("Modele/modele_ingredient.php");
	
	$r=new Recette();
	$i=new Ingredient();
	
	//Je récupère tous les objets
	$uneRecette=$r->findById($_GET['idRecette']);
	$unIngredient=$i->findIng($_GET['idRecette']);
	
	if($uneRecette != null){
	    //je passe la main à la vue
	    include("Vue/vue_detail_recette.php");
	}
	else
	{
		?>		
		<script type="text/javascript">
			alert('La recette demandée n\'existe pas');
			window.history.back();
		</script>
		<?php
	}
?>