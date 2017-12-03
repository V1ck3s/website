<?php
	/**
	* Classe d'accès aux données.
	*de type singleton
	*qui utilise les services de la classe PDO
	*/
	class Connexion{
		private static $monPdo;
		
		/**
		* Constructeur privé vide
		*/
		private  function __construct(){
			Connexion::$monPdo = null;
		}
		/** 
		*Méthode statique qui renvoie l'unique instance de Connexion
		**/
		public static function getInstance(){
			if( Connexion :: $monPdo == null){
				try{
					$serveur='mysql:host=';
					$bdd='dbname=';
					$user='';
					$mdp='';
					Connexion::$monPdo = new PDO($serveur.';'.$bdd, $user,$mdp);
					Connexion::$monPdo->query("SET CHARACTER SET utf8");
				}catch (PDOException $e){
					throw new Exception("Erreur à la connexion \n" . $e->getMessage()); 
				}
			}
		return Connexion::$monPdo;
		}
		
	}
?>