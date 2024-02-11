<?php

if (defined("DOSSIER_BASE_INCLUDE") == false) {
	define("DOSSIER_BASE_INCLUDE", $_SERVER['DOCUMENT_ROOT'] . "Allo_Deneigement/");
}

include_once(DOSSIER_BASE_INCLUDE . 'models/DAO/configs/configBD.interface.php');


class ConnexionBD
{
	private static $instance = null;

	private function __construct()
	{
	}
	public static function getInstance()
	{
		if (self::$instance == null) {
			$configuration = "mysql:host=" . ConfigBD::BD_HOTE . ";dbname=" . ConfigBD::BD_NOM;
			$utilisateur = ConfigBD::BD_UTILISATEUR;
			$motPasse = ConfigBD::BD_MOT_PASSE;
			self::$instance = new PDO($configuration, $utilisateur, $motPasse);

			self::$instance->exec("SET character_set_results = 'utf8'");
			self::$instance->exec("SET character_set_client = 'utf8'");
			self::$instance->exec("SET character_set_connection = 'utf8'");
		}
		return self::$instance;
	}
	public static function close()
	{
		self::$instance = null;
	}
}
