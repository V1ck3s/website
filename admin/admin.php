<?php session_start(); ?>
<head>
<?php include("redir.php")?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/admin.css">
<title>Administration du projet-recettes.tk</title>
</head>

<body>
<?php 
//Teste si c'est bien l'administrateur qui est enregistré 
		if ((isset($_SESSION['loginadmin'])) && (!empty($_SESSION['loginadmin']))){
	 
		}else{ header("Location:../admin.htm");}
		
?>

<div id="deco">
<a href="deco.php" title="">Déconnexion</a>
</div>
<!--Menu -->
<center>
<div id="wrapper">
 
    <ul class="menu">
        <li class="item1">Utilisateurs</li>
        <ul>
                <li class="subitem2"><a href="../admin/Controleur/ctrl_modif_utilisateur.php">Modification utilisateur </a></li>
                <li class="subitem3"><a href="../admin/Controleur/ctrl_sup_utilisateur.php">Suppression utilisateur </a></li>
        </ul>
        <li class="item2">Recettes</li>
        <ul>
                <li class="subitem2"><a href="../admin/Controleur/ctrl_modif_recette.php">Modification recette </a></li>
                <li class="subitem3"><a href="../admin/Controleur/ctrl_sup_recette.php">Suppression recette </a></li>
        </ul>
        <li class="item3">Ingrédients</li>
        <ul>
        		<li class="subitem1"><a href="../admin/Controleur/ctrl_creer_ingredient.php">Création ingrédient </a></li>
                <li class="subitem2"><a href="../admin/Controleur/ctrl_modif_ingredient.php">Modification ingrédient </a></li>
                <li class="subitem3"><a href="../admin/Controleur/ctrl_sup_ingredient.php">Suppression ingrédient </a></li>
        </ul>
    </ul>
 
</div>
<!--Fin du menu-->

</div>
</body>
</center>
</html>