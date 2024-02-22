<?php

include_once(DOSSIER_BASE_INCLUDE . "controllers/defaut.class.php");
include_once(DOSSIER_BASE_INCLUDE . "controllers/seConnecter.class.php");
include_once(DOSSIER_BASE_INCLUDE . "controllers/afficherDemandeDeServices.class.php");
include_once(DOSSIER_BASE_INCLUDE . "controllers/seDeconnecter.class.php");
include_once(DOSSIER_BASE_INCLUDE . "controllers/afficherProfile.class.php");
include_once(DOSSIER_BASE_INCLUDE . "controllers/afficherOffreDeServices.class.php");
include_once(DOSSIER_BASE_INCLUDE . "controllers/emailController.class.php");

class ManufactureControleur
{
    public static function creerControleur($action)
    {
        $controleur = null;
        if ($action == "seConnecter") {
            $controleur = new SeConnecter();
        } elseif ($action == "afficherDemandeDeServices") {
            $controleur = new AfficherDemandeDeServices();
        } elseif ($action == "afficherProfile") {
            $controleur = new afficherProfile();
        } elseif ($action == "seDeconnecter") {
            $controleur = new SeDeconnecter();
        } elseif ($action == "voirPageAccueil") {
            $controleur = new Defaut();
        }elseif ($action == "afficherOffreDeServices") {
            $controleur = new AfficherOffreDeServices();
        } 
        elseif ($action == "emailController") { 
            $controleur = new EmailController(); 
        }else {
            $controleur = new Defaut();
        }
        return $controleur;
    }
}
