<?php

include_once(DOSSIER_BASE_INCLUDE . "controllers/controleur.abstract.class.php");
include_once(DOSSIER_BASE_INCLUDE . "views/templates/commons/flash.php");

class AfficherContactPage extends  Controleur
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
		}elseif{
            flash('info', 'Vous etes sur la page de contacte.', FLASH_SUCCES);
            return "ContactPage";
        }else{
            
        }

       
    }
}
