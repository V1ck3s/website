<?php
	class Inscription{
		//attribut privé qui recevra une instance de la connexion
		private $cx;
		
		public function __construct(){
			require_once("Modele/modele_connexion_base.php");
			$this->cx = Connexion::getInstance();
		}
    
		//initialise l'instance d'inscription
		public function create(){
			//récupération des valeurs des champs:
			 $nom=$_POST['ins_nom'];
			 $prenom=$_POST['ins_prenom'];
			 $tel=$_POST['ins_login'];
             $email=$_POST['ins_mail'];
             $mdp=md5($_POST['mdp']);
			 
			 
			//requête permettant de vérifier la présence ou non d'un login d'utilisateur
		   $sql = "SELECT mail FROM utilisateur WHERE mail = '".$_POST["ins_email"]."' ";
		   $uneRequete = $this->cx->query($sql);
		   $uneRequete->execute();
		   //Renvoie le nombre de ligne présent (0 = aucune données présentes)
		   //Si le login de l'utilisateur n'est pas présent dans la base de données on l'insère
		   
		   $existe=false;
		   if($user=$uneRequete->fetch(PDO::FETCH_OBJ))
		   {
				$existe=true;
		   }
			
			if(!$existe){
				//création de la requête SQL:
				$sql2 = "INSERT  INTO utilisateur(nom,prenom,login,mail,mdp)
						VALUES (:nom, :prenom, :login, :mail, :mdp) " ;
				
				$requete2 = $this->cx->prepare($sql2);
				
				//J'associe les valeur
				$requete2->bindValue(":nom",$nom,PDO::PARAM_STR);
				$requete2->bindValue(":prenom",$prenom,PDO::PARAM_STR);
				$requete2->bindValue(":login",$login,PDO::PARAM_STR);	
				$requete2->bindValue(":mail",$mail,PDO::PARAM_STR);	
				$requete2->bindValue(":mdp",$mdp,PDO::PARAM_STR);
				//exécution de la requête SQL:
				$requete2->execute();
			}
			return(!$existe);
		}
	}
?>