<?php

include_once(DOSSIER_BASE_INCLUDE . "controllers/defaut.class.php");
include_once(DOSSIER_BASE_INCLUDE . "controllers/seConnecter.class.php");
include_once(DOSSIER_BASE_INCLUDE . "controllers/seDeconnecter.class.php");

class ManufactureControleur
{
    public static function creerControleur($action)
    {
        $controleur = null;
        if ($action == "seConnecter") {
            $controleur = new SeConnecter();
        } elseif ($action == "seDeconnecter") {
            $controleur = new SeDeconnecter();
        } elseif ($action == "voirPageAccueil") {
            $controleur = new Defaut();
        } else {
            $controleur = new Defaut();
        }
        return $controleur;
    }
}
