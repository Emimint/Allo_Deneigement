<?php
if (defined("DOSSIER_BASE_INCLUDE") == false) {
	define("DOSSIER_BASE_INCLUDE", $_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/");
}

include_once(DOSSIER_BASE_INCLUDE . 'models/DAO/connexionBD.class.php');

interface DAO
{
	// Cette méthode doit retourner l'objet dont la clé primaire a été reçu en paramètre
	// Notes : 1) On retourne null si non-trouvé, 
	//         2) Si la clé primaire est composée, alors le paramètre est un tableau assiociatif
	static public function chercher($cles);
	// Cette méthode doit retourner une liste de tous les objets reliés à la table de la BD
	static public function chercherTous();
	// Comme la méthode chercherTous, mais en applicant le filtre (clause WHERE ...) reçue en param.
	static public function chercherAvecFiltre($filtre);
	// Cette méthode insère l'objet reçu en paramètre dans la table
	// Retourne true/false selon que l'opération a été un succès ou pas.
	static public function inserer($unObjet);
	// Cette méthode modifie tous les champs de l'objet reçu en paramètre dans la table
	static public function modifier($unObjet);
	// Cette méthode supprime l'objet reçu en paramètre de la table
	static public function supprimer($unObjet);
}
