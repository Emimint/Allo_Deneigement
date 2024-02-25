<?php

include_once(DOSSIER_BASE_INCLUDE . "controllers/controleur.abstract.class.php");
include_once(DOSSIER_BASE_INCLUDE . "models/DAO/DemandeDeServiceDAO.class.php");
include_once(DOSSIER_BASE_INCLUDE . "models/DAO/FournisseurDAO.class.php");
include_once(DOSSIER_BASE_INCLUDE . "models/DAO/OffreDeServiceDAO.class.php");
include_once(DOSSIER_BASE_INCLUDE . "models/DAO/BilletDAO.class.php");
include_once(DOSSIER_BASE_INCLUDE . "views/templates/commons/flash.php");


class AdminController extends Controleur
{
   
    private $listeDemandesUtilisateurs;
    private $listeUtilisateur;
    private $listeFournisseur;
    private $listeOffreDeservice;
    private $listreview;
    private $listeBillet;

    public function __construct()
    {
        parent::__construct();
        $this->listeDemandesUtilisateurs = array();
        $this->listeUtilisateur = array();
        $this->listeFournisseur = array();
        $this->listeOffreDeservice = array();
        $this->listreview = array(); // Added listreview initialization
    }

    // Getter methods
    public function getlisteDemandesUtilisateurs()
    {
        return $this->listeDemandesUtilisateurs;
    }
   
    public function getListeBillets() {
        return $this->listeBillet;
    }

    public function getlisteUtilisateur()
    {
        return $this->listeUtilisateur;
    }

    public function getlisteFournisseur()
    {
        return $this->listeFournisseur;
    }

    public function getlisteOffreDeservice()
    {
        return $this->listeOffreDeservice;
    }

    public function getListReview()
    {
        return $this->listreview;
    }

    

    public function executerAction()
    {

        
    $this->listeDemandesUtilisateurs = DemandeDeServiceDAO::chercherTous();
    $this->listeUtilisateur = UtilisateurDAO::chercherTous();
    $this->listeFournisseur = FournisseurDAO::chercherTous();
    $this->listeOffreDeservice = OffreDeServiceDAO::chercherTous();
    $this->listreview = ReviewDAO::chercherTous();
    $this->listeBillet = BilletDAO::chercherTous();


      return "dashboard_admin";

    }
}
