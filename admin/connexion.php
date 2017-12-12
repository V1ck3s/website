<?php
	$serveur='mysql:host=localhost';
	$bdd='dbname=cuisine';
	$user='root';
	$mdp='';

	// test de connexion à mysql	@ devant la commande
	// évite que le message mysql ne s'affiche
	try
	{
	$mycnx = new PDO($serveur.';'.$bdd, $user,$mdp);
	}
	catch (PDOException $e)
	{
		throw new Exception("Erreur à la connexion \n" . $e->getMessage()); 
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
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
					$serveur='mysql:host=localhost';
					$bdd='dbname=cuisine';
					$user='root';
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