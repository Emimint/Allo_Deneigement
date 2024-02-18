<?php

include_once(DOSSIER_BASE_INCLUDE . "controllers/controleur.abstract.class.php");

class Defaut extends  Controleur
{
    private $liste_fournisseurs;

    public function __construct()
    {
        parent::__construct();
        $this->liste_fournisseurs = array();
    }

    public function getListeFournisseurs()
    {
        return $this->liste_fournisseurs;
    }

    public function executerAction()
    {
        $this->liste_fournisseurs = FournisseurDAO::chercherTous();
        $_SESSION["liste_fournisseurs"] = $this->liste_fournisseurs;
        return "landing-page";
    }
}
