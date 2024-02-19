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


    public function getNomOffreAssocies()
    {
        return $this->offreAssocies;
    }
    
    public function executerAction()
    {
        if ($this->acteur == "utilisateur" || $this->acteur == "fournisseur") {
            if (isset($_GET['id'])) {
                $demandeId = $_GET['id'];
                
                // Load the specific demand based on the ID
                $demande = DemandeDeServiceDAO::chercher($demandeId);
             
    
               {
                    // Process the demand and related information
                    $fournisseur = FournisseurDAO::chercher($demande->getIdFournisseur());
                    $this->FournisseursAssocies = $fournisseur->getNomDeLaCompagnie();


                    ////////////////////
                    $service = OffreDeServiceDAO::chercher($demande->getIdOffre());
                    $nomService = $service->getDescription();
                    $this->offreAssocies =  $nomService;
                    ///////////////////////////////
    
                    $addresses = PersonneDAO::chercherAdresses($this->acteur, $_SESSION['infoUtilisateur']->getEmail());
                    $this->listeAddresseUtilisateur= $addresses;
    
                    ////////
                    $commentaire = $demande->getCommentaire();
                    $this->commentaire = $commentaire;


                    //////////

                    $utilisateur = UtilisateurDAO::chercher($demande-> getIdUtilisateur());
                    $this->utilisateurAssocies =  $utilisateur;

                    return "detail-offre";
              
            } 
        } else {
            array_push($this->messagesErreur, "Vous êtes déjà connecté.");
            flash('Info', 'Vous devez vous connecter pour accéder à cette page.', FLASH_INFO);
            return "login";
        }
    }
    
    
}

}
