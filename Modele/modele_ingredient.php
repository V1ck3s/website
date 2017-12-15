<?php
	class Ingredient{
		//attribut privé qui recevra une instance de la connexion
		private $cx;
		
		public function __construct(){
			require_once("modele_connexion_base.php");
			$this->cx = Connexion::getInstance();
		}
		
		public function readAll(){
			$req = "SELECT *
					FROM ingredient
					ORDER BY nom ASC";
			$curseur=$this->cx->query($req);
			return $curseur;
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
		
		public function addIngredient(){
			//Booléen permettant de vérifier l'éxécution de la requête
			$valid=false;
		  
			//récupération des valeurs des champs:
			$rec=$_POST['rec'];
			$ingre=$_POST['ingre'];
			$qte=intval($_POST['quantite']);

			//création de la requête SQL:
			$sql="INSERT INTO contenu(quantite, idRec, idIngre)
				VALUES (:qte, :rec, :ingre)";
				
			$requete = $this->cx->prepare($sql);
				
			//J'associe les valeurs
			$requete->bindValue(":qte",$qte,PDO::PARAM_INT);
			$requete->bindValue(":rec",$rec,PDO::PARAM_INT);
			$requete->bindValue(":ingre",$ingre,PDO::PARAM_INT);	
			
			//exécution de la requête SQL:
			$requete->execute();
			
			if($requete){
				$valid=true;
			}
			return $valid;
		}
	}
?>