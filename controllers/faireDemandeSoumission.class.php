<?php

include_once(DOSSIER_BASE_INCLUDE . "controllers/controleur.abstract.class.php");
include_once(DOSSIER_BASE_INCLUDE . "views/templates/commons/flash.php");

class FaireDemandeSoumission extends  Controleur
{
    // private $liste_fournisseurs;

    public function __construct()
    {
        parent::__construct();
        // $this->liste_fournisseurs = array();
    }

    // public function getListeFournisseurs()
    // {
    //     return $this->liste_fournisseurs;
    // }

    public function executerAction()
    {
        if ($_SESSION['utilisateurConnecte'] != "utilisateur") {
            flash('Info', 'Vous devez vous connecter pour accéder à cette page.', FLASH_INFO);
            return "login";
        } else {
            // get fournisseur with id_fournisseur
            $fournisseur = FournisseurDAO::chercher($_GET['id_fournisseur']);
            $filtre = "WHERE id_fournisseur =" . $_GET['id_fournisseur'];
            return "soumission-offre";
        }
        // $this->liste_fournisseurs = FournisseurDAO::chercherTous();
        // $_SESSION["liste_fournisseurs"] = $this->liste_fournisseurs;
        return "landing-page";
    }
}
