<?php
	class AjoutRecette{
		//attribut privé qui recevra une instance de la connexion
		private $cx;
		
		public function __construct(){
			require_once("Modele/modele_connexion_base.php");
			$this->cx = Connexion::getInstance();
		}
    
		//initialise l'instance d'inscription
		public function create(){
			//Booléen permettant de vérifier l'éxécution de la requête
			$valid=false;
		  
			//récupération des valeurs des champs:
			$nom=$_POST['nom'];
			$descriptif=$_POST['descriptif'];
			$difficulte=$_POST['difficulte'];
			$prix=intval($_POST['prix']);
			$personnes=intval($_POST['personnes']);
			$preparation=intval($_POST['preparation']);
			$cuisson=intval($_POST['cuisson']);
			$totale=$preparation+$cuisson;
			$idUtil=intval($_SESSION['idUtil']);
			//création de la requête SQL:
			$sql="INSERT INTO recette(nom, descriptif, difficulte, prix, nbPersonnes, dureePreparation,
				dureeCuisson, dureeTotale, qteCalories, qteProteines, qteGlucides, qteLipides, qteProtides, idUtil)
				VALUES (:nom, :descriptif, :difficulte, :prix, :personnes, :preparation, :cuisson, :totale, 0, 0, 0, 0, 0, :idUtil)";
				
			$requete = $this->cx->prepare($sql);
				
			//J'associe les valeurs
			$requete->bindValue(":nom",$nom,PDO::PARAM_STR);
			$requete->bindValue(":descriptif",$descriptif,PDO::PARAM_STR);
			$requete->bindValue(":difficulte",$difficulte,PDO::PARAM_STR);	
			$requete->bindValue(":prix",$prix,PDO::PARAM_INT);	
			$requete->bindValue(":personnes",$personnes,PDO::PARAM_INT);	
			$requete->bindValue(":totale",$totale,PDO::PARAM_INT);			
			$requete->bindValue(":cuisson",$cuisson,PDO::PARAM_INT);
			$requete->bindValue(":preparation",$preparation,PDO::PARAM_INT);			
			$requete->bindValue(":idUtil",$idUtil,PDO::PARAM_INT);	
			
			//exécution de la requête SQL:
			$requete->execute();
			
			//récupération de l'ID inséré			
			$new_recette = $this->cx->lastInsertId();
			
			//récupération des valeurs des champs:
			$adresse=$_POST['adresse'];
			
			//création de la requête SQL:
			$sql2="INSERT INTO illustration(adresse, idRec)
				VALUES (:adresse, :new_recette)";
			
			$requete2 = $this->cx->prepare($sql2);
				
			//J'associe les valeurs
			$requete2->bindValue(":adresse",$adresse,PDO::PARAM_STR);
			$requete2->bindValue(":new_recette",$new_recette,PDO::PARAM_INT);	

			//exécution de la requête SQL:
			$requete2->execute();
			
			if($requete && $requete2){
				$valid=true;
			}
			return $valid;
		}
	}
?>