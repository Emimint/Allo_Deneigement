<?php
include_once(DOSSIER_BASE_INCLUDE . "controllers/controleur.abstract.class.php");
include_once(DOSSIER_BASE_INCLUDE . "models/DAO/PersonneDAO.class.php");
include_once(DOSSIER_BASE_INCLUDE . "models/DAO/UtilisateurDAO.class.php");
include_once(DOSSIER_BASE_INCLUDE . "models/DAO/AdministrateurDAO.class.php");
include_once(DOSSIER_BASE_INCLUDE . "models/DAO/FournisseurDAO.class.php");
include_once(DOSSIER_BASE_INCLUDE . "views/templates/commons/flash.php");

class SeConnecter extends Controleur
{

	public function __construct()
	{
		parent::__construct();
	}

	public function executerAction()
	{
		if ($this->acteur != "visiteur") {
			array_push($this->messagesErreur, "Vous êtes déjà connécté.");
			flash('Info', 'Vous êtes déjà connécté.', FLASH_WARNING);
			return "landing-page";
		}

		if (isset($_POST['email']) and isset($_POST['password'])) {
			$unUtilisateur = PersonneDAO::chercherPersonne($_POST['email']);
			if ($unUtilisateur == null) {
				flash('Erreur', 'Cet utilisateur n\'existe pas.', FLASH_WARNING);
				return "login";
			} elseif (!$unUtilisateur->verifierMotPasse($_POST['password'])) {
				array_push($this->messagesErreur, "Le mot de passe est incorrect.");
				flash('Erreur', 'Le mot de passe est incorrect.', FLASH_WARNING);
				return "login";
			} else {
				$this->acteur = strtolower(get_class($unUtilisateur));
				$_SESSION['utilisateurConnecte'] = $this->acteur;
				$_SESSION['infoUtilisateur'] = $unUtilisateur;
				flash('Bienvenue, ' . $this->acteur . "!", 'Connexion reussie', FLASH_SUCCESS);
				return "landing-page";
			}
			return "login";
		} else {
			return "login";
		}
	}
}
