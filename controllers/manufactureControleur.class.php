<?php

include_once(DOSSIER_BASE_INCLUDE . "controllers/defaut.class.php");
include_once(DOSSIER_BASE_INCLUDE . "controllers/seConnecter.class.php");
include_once(DOSSIER_BASE_INCLUDE . "controllers/afficherDemandeDeServices.class.php");
include_once(DOSSIER_BASE_INCLUDE . "controllers/seDeconnecter.class.php");
include_once(DOSSIER_BASE_INCLUDE . "controllers/afficherContactPage.class.php");
include_once(DOSSIER_BASE_INCLUDE . "controllers/details-demande.class.php");
include_once(DOSSIER_BASE_INCLUDE . "controllers/afficherProfile.class.php");
include_once(DOSSIER_BASE_INCLUDE . "controllers/faireDemandeSoumission.class.php");
include_once(DOSSIER_BASE_INCLUDE . "controllers/creerUnCompte.class.php");
include_once(DOSSIER_BASE_INCLUDE . "controllers/afficherOffreDeServices.class.php");

class ManufactureControleur
{
    public static function creerControleur($action)
    {
        $controleur = null;
        if ($action == "seConnecter") {
            $controleur = new SeConnecter();
        } elseif ($action == "afficherDemandeDeServices") {
            $controleur = new AfficherDemandeDeServices();
        } elseif ($action == "afficherContactPage") {
            $controleur = new AfficherContactPage();
        } elseif ($action == "afficherProfile") {
            $controleur = new AfficherProfile();
        } elseif ($action == "creerUnCompte") {
            $controleur = new CreerUnCompte();
        } elseif ($action == "seDeconnecter") {
            $controleur = new SeDeconnecter();
        } elseif ($action == "faireDemandeSoumission") {
            $controleur = new FaireDemandeSoumission();
        } elseif ($action == "voirPageAccueil") {
            $controleur = new Defaut();
        } elseif ($action == "details-demande") {
            $controleur = new DetailDemande();
        } elseif ($action == "afficherOffreDeServices") {
            $controleur = new AfficherOffreDeServices();
        } else {
            $controleur = new Defaut();
        }
        return $controleur;
    }
}
