<?php
	class Utilisateur{
		//attribut privé qui recevra une instance de la connexion
		private $cx;
		
		public function __construct(){
			require_once("../connexion.php");
			$this->cx = Connexion::getInstance();
		}
		
		//Retourne un curseur contenant toutes les recettes
		public function readAll(){
			$req = "SELECT *
					FROM utilisateur
					ORDER BY nom ASC";
			$curseur=$this->cx->query($req);
			return $curseur;
		}
		
		public function deleteUtilisateur($id){
			//Booléen permettant de vérifier l'éxécution de la requête
			$valid=false;
			
			//création de la requête SQL:
			$sql="UPDATE recette SET idUtil=15 WHERE idUtil=:id";
			
			$requete = $this->cx->prepare($sql);
				
			//J'associe les valeurs
			$requete->bindValue(":id",$id,PDO::PARAM_INT);
			
			//exécution de la requête SQL:
			$requete->execute();
			
			$sql2="UPDATE menu SET idUtil=15 WHERE idUtil=:id";			
			$requete2 = $this->cx->prepare($sql2);				
			$requete2->bindValue(":id",$id,PDO::PARAM_INT);			
			$requete2->execute();
			
			$sql3="UPDATE planning SET idUtil=15 WHERE idUtil=:id";			
			$requete3 = $this->cx->prepare($sql3);				
			$requete3->bindValue(":id",$id,PDO::PARAM_INT);			
			$requete3->execute();
			
			$sql4="UPDATE liste_achat SET idUtil=15 WHERE idUtil=:id";			
			$requete4 = $this->cx->prepare($sql4);				
			$requete4->bindValue(":id",$id,PDO::PARAM_INT);			
			$requete4->execute();

			$sql5="DELETE FROM utilisateur WHERE idUtil=:id";			
			$requete5 = $this->cx->prepare($sql5);				
			$requete5->bindValue(":id",$id,PDO::PARAM_INT);			
			$requete5->execute();
			
			if($requete && $requete2 && $requete3 && $requete4 && $requete5){
				$valid=true;
			}
			return $valid;
		}
		
		public function updatePrenom($id){
			//Booléen permettant de vérifier l'éxécution de la requête
			$valid=false;
			
			$prenom=$_POST['prenom_modif'];
			$sql="UPDATE utilisateur SET prenom=:prenom WHERE idUtil=:id";
			$requete = $this->cx->prepare($sql);				
			$requete->bindValue(":prenom",$prenom,PDO::PARAM_STR);
			$requete->bindValue(":id",$id,PDO::PARAM_INT);
			$requete->execute();
			
			if($requete){
				$valid=true;
			}
			return $valid;
		}
		
		public function updateNom($id){
			//Booléen permettant de vérifier l'éxécution de la requête
			$valid=false;
			
			$nom=$_POST['nom_modif'];
			$sql="UPDATE utilisateur SET nom=:nom WHERE idUtil=:id";
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