<?php
	class Planning{
		//attribut privé qui recevra une instance de la connexion
		private $cx;
		
		public function __construct(){
			require_once("../Modele/modele_connexion_base.php");
			$this->cx = Connexion::getInstance();
		}
		
		//Retourne un curseur contenant toutes les recettes
		public function readAll(){
			$req = "SELECT planning.idPlan AS pidP, dateDebut, dateFin, est_servi.idPlan, est_servi.idMen, est_servi.dateServi, menu.idMen, 
					est_present.idMen, est_present.idRec, recette.idRec, recette.nom AS recNom, utilisateur.nom AS utilNom, utilisateur.prenom  AS utilPrenom
					FROM planning 
					INNER JOIN est_servi
					ON planning.idPlan = est_servi.idPlan
					INNER JOIN menu
					ON est_servi.idMen = menu.idMen
					INNER JOIN est_present
					ON menu.idMen = est_present.idMen
					INNER JOIN recette
					ON est_present.idRec = recette.idRec
					INNER JOIN utilisateur
					ON planning.idUtil = utilisateur.idUtil
					GROUP BY pidP";
			$curseur=$this->cx->query($req);
			return $curseur;
		}
		
		//retourne un curseur contenant l'objet associer à l'identifiant passé en paramètre
		//on utilise ici la technique des requêtes préparées qui permettent d'éviter les injonctions SQL
		public function findById($idPlanning){
			//je reçois ma requête SQL
			$req = "SELECT planning.idPlan AS pidP, dateDebut, dateFin, est_servi.idPlan, est_servi.idMen, est_servi.dateServi, menu.idMen AS menIdMen, 
					est_present.idMen, est_present.idRec, recette.idRec, recette.nom AS recNom, utilisateur.nom AS utilNom, utilisateur.prenom
					FROM planning 
					INNER JOIN est_servi
					ON planning.idPlan = est_servi.idPlan
					INNER JOIN menu
					ON est_servi.idMen = menu.idMen
					INNER JOIN est_present
					ON menu.idMen = est_present.idMen
					INNER JOIN recette
					ON est_present.idRec = recette.idRec
					INNER JOIN utilisateur
					ON planning.idUtil = utilisateur.idUtil
					WHERE planning.idPlan = :id";
			
			//je prépare ma requête
			$prep = $this->cx->prepare($req);
			
			//j'associe les paramètres
			$prep->bindValue(':id', $idPlanning, PDO::PARAM_STR);
			
			//j'exécute
			$prep->execute();
			
			//je remplis le curseur
			$curseur = $prep->fetchObject();
			return $curseur;
		}
		
		public function findRec($idPlanning){
			//je reçois ma requête SQL
			$req = "SELECT recette.nom AS recNom, utilisateur.nom AS utilNom, utilisateur.prenom AS utilPrenom, est_servi.dateServi
					FROM recette
					INNER JOIN utilisateur
					ON recette.idUtil = utilisateur.idUtil
					INNER JOIN est_present
					ON recette.idRec = est_present.idRec
					INNER JOIN menu
					ON est_present.idMen = menu.idMen
					INNER JOIN est_servi
					ON menu.idMen = est_servi.idMen
					WHERE est_servi.idPlan = :id
					ORDER BY dateServi ASC, recNom ASC";
			
			//je prépare ma requête
			$prep = $this->cx->prepare($req);
			
			//j'associe les paramètres
			$prep->bindValue(':id', $idPlanning, PDO::PARAM_STR);
			
			//j'exécute
			$prep->execute();
			
			//je remplis le curseur
			while ($result = $prep->fetch(PDO::FETCH_OBJ)) {
 				$resultat[] = $result;
			}
			$prep->closeCursor();
			return $resultat;
		}
	}
?>