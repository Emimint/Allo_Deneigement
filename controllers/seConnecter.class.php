<?php
include_once(DOSSIER_BASE_INCLUDE . "controllers/controleur.abstract.class.php");
include_once(DOSSIER_BASE_INCLUDE . "models/DAO/PersonneDAO.class.php");
include_once(DOSSIER_BASE_INCLUDE . "models/DAO/UtilisateurDAO.class.php");
include_once(DOSSIER_BASE_INCLUDE . "models/DAO/AdministrateurDAO.class.php");
include_once(DOSSIER_BASE_INCLUDE . "models/DAO/FournisseurDAO.class.php");

class SeConnecter extends  Controleur
{

	// ******************* Constructeur vide
	public function __construct()
	{
		parent::__construct();
	}


	// ******************* Méthode exécuter action
	public function executerAction()
	{
		if (isset($_POST['email'])) echo $_POST['email'];
		// ----------------------------- VÉRIFIER LA VALIDITÉ DE LA SESSION  -----------
		if ($this->acteur != "visiteur") {
			array_push($this->messagesErreur, "Vous êtes déjà connécté.");
			echo "Vous êtes déjà connécté.";
			return "landing-page";
		}
		// ----------------------------- VÉRIFIER LA VALIDITÉ DES POSTS ---------------
		if (isset($_POST['email']) and isset($_POST['password'])) {
			$unUtilisateur = PersonneDAO::chercherEmail($_POST['email']);
			echo $unUtilisateur . "*********";
			echo "['password'] : " . $_POST['password'];
			echo "verifierMotPasse : " . $unUtilisateur->verifierMotPasse($_POST['password']);
			if ($unUtilisateur == null) {
				array_push($this->messagesErreur, "Cet utilisateur n'existe pas.");
				return "fail1";
			} elseif (!$unUtilisateur->verifierMotPasse($_POST['password'])) {
				array_push($this->messagesErreur, "Le mot de passe est incorrect.");
				return "fail2";
			} else {
				$this->acteur = get_class($unUtilisateur);
				$_SESSION['utilisateurConnecte'] = $_POST['email'];
				return "landing-page";
			}
			return "login";
		} else {
			return "login";
		}
	}
}
