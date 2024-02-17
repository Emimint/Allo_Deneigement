<?php
include_once(DOSSIER_BASE_INCLUDE . "controllers/controleur.abstract.class.php");
include_once(DOSSIER_BASE_INCLUDE . "models/DAO/utilisateurDAO.class.php");

class SeDeconnecter extends Controleur
{
	public function __construct()
	{
		parent::__construct();
	}
	public function executerAction()
	{
		if ($this->acteur == "visiteur") {
			array_push($this->messagesErreur, "Vous êtes déjà déconnécté.");
			flash('Deconnexion', 'Vous êtes déjà déconnécté.', FLASH_ERROR);
			return "landing-page";
		} else {
			$this->acteur = "visiteur";
			unset($_SESSION['utilisateurConnecte']);
			flash('Deconnexion', 'A bientot!', FLASH_SUCCESS);
			session_destroy();
			return "landing-page";
		}
	}
}
