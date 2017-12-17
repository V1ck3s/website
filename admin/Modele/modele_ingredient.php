<?php
	class Ingredient{
		//attribut privé qui recevra une instance de la connexion
		private $cx;
		
		public function __construct(){
			require_once("../connexion.php");
			$this->cx = Connexion::getInstance();
		}
		
		//Retourne un curseur contenant toutes les recettes
		public function readAll(){
			$req = "SELECT *
					FROM ingredient
					ORDER BY nom ASC";
			$curseur=$this->cx->query($req);
			return $curseur;
		}
		
		public function createIngredient(){
			//Booléen permettant de vérifier l'éxécution de la requête
			$valid=false;
		  
			//récupération des valeurs des champs:
			$nom=$_POST['nom'];
			$mesure=$_POST['mesure'];
			$qte=intval($_POST['qte']);
			$cal=intval($_POST['cal']);
			$prote=intval($_POST['prote']);
			$glu=intval($_POST['glu']);
			$lip=intval($_POST['lip']);
			$proti=intval($_POST['proti']);
			//création de la requête SQL:
			$sql="INSERT INTO ingredient(nom, mesure, qteParDefaut, qteCalories,
				qteProteines, qteGlucides, qteLipides, qteProtides)
				VALUES (:nom, :mesure, :qte, :cal, :prote, :glu, :lip, :proti)";
				
			$requete = $this->cx->prepare($sql);
				
			//J'associe les valeurs
			$requete->bindValue(":nom",$nom,PDO::PARAM_STR);
			$requete->bindValue(":mesure",$mesure,PDO::PARAM_STR);
			$requete->bindValue(":qte",$qte,PDO::PARAM_INT);
			$requete->bindValue(":cal",$cal,PDO::PARAM_INT);
			$requete->bindValue(":prote",$prote,PDO::PARAM_INT);	
			$requete->bindValue(":glu",$glu,PDO::PARAM_INT);	
			$requete->bindValue(":lip",$lip,PDO::PARAM_INT);	
			$requete->bindValue(":proti",$proti,PDO::PARAM_INT);			
			
			//exécution de la requête SQL:
			$requete->execute();
			
			if($requete){
				$valid=true;
			}
			return $valid;
		}
		
		public function deleteIngredient($id){
			//Booléen permettant de vérifier l'éxécution de la requête
			$valid=false;
			
			//création de la requête SQL:
			$sql="DELETE FROM contient WHERE idIngre=:id";
			
			$requete = $this->cx->prepare($sql);
				
			//J'associe les valeurs
			$requete->bindValue(":id",$id,PDO::PARAM_INT);
			
			//exécution de la requête SQL:
			$requete->execute();
			
			$sql2="DELETE FROM possede WHERE idIngre=:id";			
			$requete2 = $this->cx->prepare($sql2);				
			$requete2->bindValue(":id",$id,PDO::PARAM_INT);			
			$requete2->execute();
			
			$sql3="DELETE FROM interdit WHERE idIngre=:id";			
			$requete3 = $this->cx->prepare($sql3);				
			$requete3->bindValue(":id",$id,PDO::PARAM_INT);			
			$requete3->execute();
			
			$sql4="DELETE FROM contenu WHERE idIngre=:id";			
			$requete4 = $this->cx->prepare($sql4);				
			$requete4->bindValue(":id",$id,PDO::PARAM_INT);			
			$requete4->execute();
			
			$sql5="DELETE FROM peut_remplacer WHERE idIngre=:id OR idIngre_INGREDIENT=:id";			
			$requete5 = $this->cx->prepare($sql5);				
			$requete5->bindValue(":id",$id,PDO::PARAM_INT);			
			$requete5->execute();
			
			$sql6="DELETE FROM ingredient WHERE idIngre=:id";			
			$requete6 = $this->cx->prepare($sql6);				
			$requete6->bindValue(":id",$id,PDO::PARAM_INT);			
			$requete6->execute();
			
			if($requete && $requete2 && $requete3 && $requete4 && $requete5 && $requete6){
				$valid=true;
			}
			return $valid;
		}
		
		public function updateNom($id){
			//Booléen permettant de vérifier l'éxécution de la requête
			$valid=false;
			
			$nom=$_POST['nom_modif'];
			$sql="UPDATE ingredient SET nom=:nom WHERE idIngre=:id";
			$requete = $this->cx->prepare($sql);				
			$requete->bindValue(":nom",$nom,PDO::PARAM_STR);
			$requete->bindValue(":id",$id,PDO::PARAM_INT);
			$requete->execute();
			
			if($requete){
				$valid=true;
			}
			return $valid;
		}
	}
?>