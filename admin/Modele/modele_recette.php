<?php
	class Recette{
		//attribut privé qui recevra une instance de la connexion
		private $cx;
		
		public function __construct(){
			require_once("../connexion.php");
			$this->cx = Connexion::getInstance();
		}
		
		//Retourne un curseur contenant toutes les recettes
		public function readAll(){
			$req = "SELECT *
					FROM recette
					ORDER BY nom ASC";
			$curseur=$this->cx->query($req);
			return $curseur;
		}
		
		public function deleteRecette($id){
			//Booléen permettant de vérifier l'éxécution de la requête
			$valid=false;
			
			//création de la requête SQL:
			$sql="DELETE FROM illustration WHERE idRec=:id";
			
			$requete = $this->cx->prepare($sql);
				
			//J'associe les valeurs
			$requete->bindValue(":id",$id,PDO::PARAM_INT);
			
			//exécution de la requête SQL:
			$requete->execute();
			
			$sql2="DELETE FROM peut_remplacer WHERE idRec=:id";			
			$requete2 = $this->cx->prepare($sql2);				
			$requete2->bindValue(":id",$id,PDO::PARAM_INT);			
			$requete2->execute();
			
			$sql3="DELETE FROM contenu WHERE idRec=:id";			
			$requete3 = $this->cx->prepare($sql3);				
			$requete3->bindValue(":id",$id,PDO::PARAM_INT);			
			$requete3->execute();
			
			$sql4="DELETE FROM conforme WHERE idRec=:id";			
			$requete4 = $this->cx->prepare($sql4);				
			$requete4->bindValue(":id",$id,PDO::PARAM_INT);			
			$requete4->execute();
			
			$sql5="DELETE FROM est_present WHERE idRec=:id";			
			$requete5 = $this->cx->prepare($sql5);				
			$requete5->bindValue(":id",$id,PDO::PARAM_INT);			
			$requete5->execute();
			
			$sql6="DELETE FROM recette WHERE idRec=:id";			
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
			$sql="UPDATE recette SET nom=:nom WHERE idRec=:id";
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