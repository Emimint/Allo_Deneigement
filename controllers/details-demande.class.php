<?php

include_once(DOSSIER_BASE_INCLUDE . "controllers/controleur.abstract.class.php");
include_once(DOSSIER_BASE_INCLUDE . "models/DAO/DemandeDeServiceDAO.class.php");
include_once(DOSSIER_BASE_INCLUDE . "models/DAO/FournisseurDAO.class.php");
include_once(DOSSIER_BASE_INCLUDE . "models/DAO/OffreDeServiceDAO.class.php");
include_once(DOSSIER_BASE_INCLUDE . "models/DAO/UtilisateurDAO.class.php");
include_once(DOSSIER_BASE_INCLUDE . "models/DAO/PersonneDAO.class.php");
include_once(DOSSIER_BASE_INCLUDE . "views/templates/commons/flash.php");



class DetailDemande extends Controleur {
    private $listeAddresseUtilisateur;
    private $FournisseursAssocies;
    private $commentaire;
    private $offreAssocies;
    private $utilisateurAssocies;
    private $status;
    private $demande;

    public function __construct()
    {
        parent::__construct();
        $this->listeAddresseUtilisateur= array();
       $this->listeAddresseUtilisateur = array();
      
    }

    public function getUtilisateurAssocie()
    {
        return $this->utilisateurAssocies;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getDemande()
    {
        return $this->demande;
    }
    public function getlisteAddresseUtilisateur()
    {
        return $this->listeAddresseUtilisateur;
    }
    public function getFournisseursAssocies()
    {
        return $this->FournisseursAssocies;
    }

    public function getCommentaire()
    {
        return $this->commentaire;
    }

   

    public function getOffreAssocies()
    {
        return $this->offreAssocies;
    }
    
    public function executerAction()
    {
        if ($this->acteur != "utilisateur" && $this->acteur != "fournisseur") {
            array_push($this->messagesErreur, "Vous êtes déjà connecté.");
            flash('Info', 'Vous devez vous connecter pour accéder à cette page.', FLASH_INFO);
            return "login";
        }
    
        if (!isset($_GET['id'])) {
            // Handle case when 'id' is not set in $_GET
            return "id non trouvee";
        }
    
        $demandeId = $_GET['id'];
        $demande = DemandeDeServiceDAO::chercher($demandeId);
        $this->demande=$demande;
    
        // Check if the demand is not found
        if (!$demande) {
            return "demande non trouvee";
        }else{
        // Load the specific demand based on the ID
        $this->status = $demande->getStatus();
    
        // Process the demand and related information
        $fournisseur = FournisseurDAO::chercher($demande->getIdFournisseur());
        $this->FournisseursAssocies = $fournisseur->getNomDeLaCompagnie();
    
        $service = OffreDeServiceDAO::chercher($demande->getIdOffre());
        $this->offreAssocies = $service;
    
        $addresses = PersonneDAO::chercherAdresses($this->acteur, $_SESSION['infoUtilisateur']->getEmail());
        $this->listeAddresseUtilisateur = $addresses;
    
        $commentaire = $demande->getCommentaire();
        $this->commentaire = $commentaire;
    
        $utilisateur = UtilisateurDAO::chercher($demande->getIdUtilisateur());
        $this->utilisateurAssocies = $utilisateur;
   
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["updateComment"])) {
          
            $newCommentaire = isset($_POST['commentaire']) ? $_POST['commentaire'] : '';
            $this->demande->setCommentaire($newCommentaire);
           
        
          
            return "detail-offre";
        }
        return "detail-offre";}
    


    }
    
    
    
}


