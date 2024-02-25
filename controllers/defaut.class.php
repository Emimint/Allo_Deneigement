<?php

include_once(DOSSIER_BASE_INCLUDE . "controllers/controleur.abstract.class.php");

class Defaut extends  Controleur
{
    private $liste_fournisseurs;
    private $ReviewsAssocies;

    public function __construct()
    {
        parent::__construct();
        $this->liste_fournisseurs = array();
    }

    public function getReviews()
    {
        return $this->ReviewsAssocies;
    }

    public function getListeFournisseurs()
    {
        return $this->liste_fournisseurs;
    }

    public function executerAction()
    {
        $this->liste_fournisseurs = FournisseurDAO::chercherTous();
        $_SESSION["liste_fournisseurs"] = $this->liste_fournisseurs;

        // mettre a jour le score global avant de l'afficher sur la page : 
        foreach ($this->liste_fournisseurs as $fournisseur) {
            FournisseurDAO::calculerScoreGlobal($fournisseur);
        }
        return "landing-page";
    }
}
