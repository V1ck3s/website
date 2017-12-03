<?php
	class Ingredient{
		//attribut privé qui recevra une instance de la connexion
		private $cx;
		
		public function __construct(){
			require_once("Modele/modele_connexion_base.php");
			$this->cx = Connexion::getInstance();
		}
			
		//retourne un curseur contenant l'objet associer à l'identifiant passé en paramètre
		//on utilise ici la technique des requêtes préparées qui permettent d'éviter les injonctions SQL
		public function findIng($idRecette){
			//je reçois ma requête SQL
			$req = "SELECT ingredient.nom AS libIng, quantite AS qte
					FROM ingredient
					INNER JOIN contenu
					ON ingredient.idIngre = contenu.idIngre
					WHERE contenu.idRec = :id";
			
			//je prépare ma requête
			$prep = $this->cx->prepare($req);
			
			//j'associe les paramètres
			$prep->bindValue(':id', $idRecette, PDO::PARAM_STR);
			
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