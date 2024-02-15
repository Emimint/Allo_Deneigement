<?php
include_once(DOSSIER_BASE_INCLUDE . "controllers/controleur.abstract.class.php");
include_once(DOSSIER_BASE_INCLUDE . "models/DAO/utilisateurDAO.class.php");

class SeDeconnecter extends  Controleur
{
	public function __construct()
	{
		parent::__construct();
	}
	public function executerAction()
	{
		$_SESSION['FLASH_MESSAGES'] = null;
		if ($this->acteur == "visiteur") {
			array_push($this->messagesErreur, "Vous êtes déjà déconnécté.");
			flash('Deconnexion', 'Vous êtes déjà déconnécté.', FLASH_SUCCESS);
			return "landing-page";
		} else {
			$this->acteur = "visiteur";
			unset($_SESSION['utilisateurConnecte']);
			return "landing-page";
		}
	}
}
