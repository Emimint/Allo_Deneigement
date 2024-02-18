<?php

include_once(DOSSIER_BASE_INCLUDE . "controllers/defaut.class.php");
include_once(DOSSIER_BASE_INCLUDE . "controllers/seConnecter.class.php");
include_once(DOSSIER_BASE_INCLUDE . "controllers/afficherDemandeDeServices.class.php");
include_once(DOSSIER_BASE_INCLUDE . "controllers/afficherDemandeDeServicesFournisseur.class.php");
include_once(DOSSIER_BASE_INCLUDE . "controllers/seDeconnecter.class.php");

class ManufactureControleur
{
    public static function creerControleur($action)
    {
        $controleur = null;
        if ($action == "seConnecter") {
            $controleur = new SeConnecter();
        } elseif ($action == "afficherDemandeDeServices") {
            $controleur = new AfficherDemandeDeServices();
        } elseif($action == "afficherDemandeDeServicesFournisseur")
        {$controleur = new AfficherDemandeDeServicesFournisseur();}
        elseif ($action == "seDeconnecter") {
            $controleur = new SeDeconnecter();
        } elseif ($action == "voirPageAccueil") {
            $controleur = new Defaut();
        } else {
            $controleur = new Defaut();
        }
        return $controleur;
    }
}
