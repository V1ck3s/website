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
        
        public function updateDesc($id){
			//Booléen permettant de vérifier l'éxécution de la requête
			$valid=false;
			
			$desc=$_POST['desc_modif'];
			$sql="UPDATE recette SET descriptif=:desc WHERE idRec=:id";
			$requete = $this->cx->prepare($sql);				
			$requete->bindValue(":desc",$desc,PDO::PARAM_STR);
			$requete->bindValue(":id",$id,PDO::PARAM_INT);
			$requete->execute();
			
			if($requete){
				$valid=true;
			}
			return $valid;
		}
		
		public function updateDif($id){
			//Booléen permettant de vérifier l'éxécution de la requête
			$valid=false;
			
			$dif=$_POST['dif_modif'];
			$sql="UPDATE recette SET difficulte=:dif WHERE idRec=:id";
			$requete = $this->cx->prepare($sql);				
			$requete->bindValue(":dif",$dif,PDO::PARAM_STR);
			$requete->bindValue(":id",$id,PDO::PARAM_INT);
			$requete->execute();
			
			if($requete){
				$valid=true;
			}
			return $valid;
		}
		
		public function updatePrix($id){
			//Booléen permettant de vérifier l'éxécution de la requête
			$valid=false;
			
			$prix=intval($_POST['prix_modif']);
			$sql="UPDATE recette SET prix=:prix WHERE idRec=:id";
			$requete = $this->cx->prepare($sql);				
			$requete->bindValue(":prix",$prix,PDO::PARAM_INT);
			$requete->bindValue(":id",$id,PDO::PARAM_INT);
			$requete->execute();
			
			if($requete){
				$valid=true;
			}
			return $valid;
		}
		
		public function updateNbPers($id){
			//Booléen permettant de vérifier l'éxécution de la requête
			$valid=false;
			
			$pers=intval($_POST['nb_modif']);
			$sql="UPDATE recette SET nbPersonnes=:pers WHERE idRec=:id";
			$requete = $this->cx->prepare($sql);				
			$requete->bindValue(":pers",$pers,PDO::PARAM_INT);
			$requete->bindValue(":id",$id,PDO::PARAM_INT);
			$requete->execute();
			
			if($requete){
				$valid=true;
			}
			return $valid;
		}
		
		public function updatePrep($id){
			//Booléen permettant de vérifier l'éxécution de la requête
			$valid=false;
			
			$totale="UPDATE recette SET dureeTotale=0 WHERE idRec=:id";
			$reqTotale = $this->cx->prepare($totale);
			$reqTotale->bindValue(":id",$id,PDO::PARAM_INT);	
			$reqTotale->execute();
			
			$prep=intval($_POST['prep_modif']);
			$sql="UPDATE recette SET dureePreparation=:prep WHERE idRec=:id";
			$requete = $this->cx->prepare($sql);				
			$requete->bindValue(":prep",$prep,PDO::PARAM_INT);
			$requete->bindValue(":id",$id,PDO::PARAM_INT);
			$requete->execute();
			
			$newTotale="UPDATE recette SET dureeTotale=dureePreparation+dureeCuisson WHERE idRec=:id";
			$reqNewTotale = $this->cx->prepare($newTotale);
			$reqNewTotale->bindValue(":id",$id,PDO::PARAM_INT);
			$reqNewTotale->execute();
			
			if($requete){
				$valid=true;
			}
			return $valid;
		}
		
		public function updateCuis($id){
			//Booléen permettant de vérifier l'éxécution de la requête
			$valid=false;
			
			$totale="UPDATE recette SET dureeTotale=0 WHERE idRec=:id";
			$reqTotale = $this->cx->prepare($totale);
			$reqTotale->bindValue(":id",$id,PDO::PARAM_INT);			
			$reqTotale->execute();
			
			$cuis=intval($_POST['cuis_modif']);
			$sql="UPDATE recette SET dureeCuisson=:cuis WHERE idRec=:id";
			$requete = $this->cx->prepare($sql);				
			$requete->bindValue(":cuis",$cuis,PDO::PARAM_INT);
			$requete->bindValue(":id",$id,PDO::PARAM_INT);
			$requete->execute();
			
			$newTotale="UPDATE recette SET dureeTotale=dureePreparation+dureeCuisson WHERE idRec=:id";
			$reqNewTotale = $this->cx->prepare($newTotale);
			$reqNewTotale->bindValue(":id",$id,PDO::PARAM_INT);			
			$reqNewTotale->execute();
			
			if($requete){
				$valid=true;
			}
			return $valid;
		}
	}
?>