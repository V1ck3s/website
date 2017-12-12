<?php session_start(); ?>
<head>
<?php include("redir.php")?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Administration du projet-recettes.tk</title>
</head>

<body>
<?php   
 
 include("connexion.php");
 
//mise en place des variables
$login = $_POST['loginadmin'];
$mdp = md5($_POST['mdp']);
if ($login == NULL)
{
//Message d'erreurs
echo '<DIV id=message style ="position: absolute; top:12em; left:20em; font-size:18pt; color: black"> Veuillez entrer un identifiant</DIV>';
redirige("2;URL='../admin.htm'");

}
elseif ($mdp == NULL)
{
echo '<DIV id=message style ="position: absolute; top:12em; left:20em; font-size:18pt; color: black"> Veuillez entrer un mot de passe</DIV>';
redirige("2;URL='../admin.htm'");

exit;
}
else
{
//connexion à la base
$requete =("SELECT mdp FROM administration WHERE login='$login'" );
$result= $mycnx->query($requete);
while ($ligne = $result->fetch(PDO::FETCH_OBJ))
{		
		$vraiemdp=$ligne->mdp;
if ($vraiemdp== $mdp)
{
//$conexion = 1;
//Mise en place de la session admin
$_SESSION['loginadmin'] = $_POST['loginadmin'];
redirige("0;URL='admin.php'");
exit;
$result->closeCursor();
}
}
echo'<DIV id=message style ="position: absolute; top:12em; left:20em; font-size:18pt; color: black">Identifiants incorrects</DIV>';
redirige("2;URL='../admin.htm'"); 
}
?> 
</body>
</html>