<?php

include_once(DOSSIER_BASE_INCLUDE . "controllers/controleur.abstract.class.php");

class Defaut extends  Controleur
{
    public function __construct()
    {
        parent::__construct();
    }

    public function executerAction()
    {
        return "landing-page";
    }
}