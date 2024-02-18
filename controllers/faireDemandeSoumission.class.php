<?php

include_once(DOSSIER_BASE_INCLUDE . "controllers/controleur.abstract.class.php");
include_once(DOSSIER_BASE_INCLUDE . "views/templates/commons/flash.php");

class FaireDemandeSoumission extends  Controleur
{
    private $fournisseur;
    private $offreChoisie;
    private $liste_offre_services;
    private $liste_adresses;

    public function __construct()
    {
        parent::__construct();
    }

    public function getListeServices()
    {
        return $this->liste_offre_services;
    }

    public function getListeAdresses()
    {
        return $this->liste_adresses;
    }

    public function getFournisseur()
    {
        return $this->fournisseur;
    }

    public function getOffreChoisie()
    {
        return $this->offreChoisie;
    }

    public function executerAction()
    {

        $id_service = 1; // normally from the URL



        if ($_SESSION['utilisateurConnecte'] != "utilisateur") {
            flash('Info', 'Vous devez vous connecter pour accéder à cette page.', FLASH_INFO);
            return "login";
        }

        // get fournisseur with id_fournisseur
        $this->offreChoisie = OffreDeServiceDAO::chercher($id_service);
        $this->fournisseur = FournisseurDAO::chercher($_GET['id_fournisseur']);
        $filtre = "WHERE id_fournisseur=" . $_GET['id_fournisseur'] . ";";
        $this->liste_offre_services = OffreDeServiceDAO::chercherAvecFiltre($filtre);
        $this->liste_adresses = PersonneDAO::chercherAdresses($this->acteur, $_SESSION['infoUtilisateur']->getEmail());
        return "soumission-offre";

        if (isset($_POST['nouvelleAdresse'])) {
            flash('Info', 'Nouvelle adresse.', FLASH_INFO);
            // $this->liste_fournisseurs = FournisseurDAO::chercherTous();
            // $_SESSION["liste_fournisseurs"] = $this->liste_fournisseurs;
            return "soumission-offre";
        }
        return "landing-page";
    }
}
