<?php

include_once(DOSSIER_BASE_INCLUDE . "controllers/controleur.abstract.class.php");
include_once(DOSSIER_BASE_INCLUDE . "models/DAO/DemandeDeServiceDAO.class.php");
include_once(DOSSIER_BASE_INCLUDE . "models/DAO/ReviewDAO.class.php");
include_once(DOSSIER_BASE_INCLUDE . "models/DAO/OffreDeServiceDAO.class.php");
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

    public function handleStatusUpdate($demande, $newStatus, $messageSuccess) {
        try {
            // Modifier status
            $currentDemande = $demande;
            $currentDemande->setStatus($newStatus);
            DemandeDeServiceDAO::modifier($demande);
            header("Location: http://localhost/Allo_Deneigement/?action=afficherDemandeDeServices");
            flash("Mise a jour", $messageSuccess, FLASH_SUCCESS);
            exit;
        } catch (Exception $e) {
            flash("Error", "An error occurred while updating status: " . $e->getMessage(), FLASH_ERROR);
          
        }
    }  
    
    
    public function executerAction()
    {
        try {
            if ($this->acteur != "utilisateur" && $this->acteur != "fournisseur") {
                array_push($this->messagesErreur, "Vous êtes déjà connecté.");
                flash('Info', 'Vous devez vous connecter pour accéder à cette page.', FLASH_INFO);
                return "login";
            }
    
            if (!isset($_GET['id'])) {
                throw new Exception("ID non trouvé");
            }
    
            $demandeId = $_GET['id'];
            $demande = DemandeDeServiceDAO::chercher($demandeId);
            $this->demande = $demande;
    
            // Check if the demand is not found
            if (!$demande) {
                throw new Exception("Demande non trouvée");
            } else {
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
    
               //$review = DemandeDeServiceDAO::chercherAvecFiltre("WHERE id_review=".$this->demande->getIdReview());
                if (isset($_POST['updateComment']) ) {
                    // Set the new comment
                    $newComment = $_POST['commentaire'];
                    $demande->setCommentaire($newComment);
                    DemandeDeServiceDAO::modifier($demande);
                    $this->commentaire=$newComment;
                   
                    flash("Mise a jour", " Mise a jour effectue", FLASH_SUCCESS);
                }
    
                
               
                if (isset($_POST['AddReview'])  ) {
                 if($this->demande->getIdReview()==null){
                    $score = (isset($_POST['score'])) ? intval($_POST['score']) : 0;
                    $reviewComment = isset($_POST['review-comment']) ? $_POST['review-comment'] : "";
                  

                  //cette requete retourne id de lavis ajoutee
                 $review_id = ReviewDAO::insererNouvelAvis ($score, $reviewComment, $this->utilisateurAssocies->getIdUtilisateur(), $this->offreAssocies->getIdOffre(), date("Y-m-d"));
                 //mettre a jour id de la demande
                 DemandeDeServiceDAO::updateReview($this->demande->getIdDemande(),$review_id);
                   

                    flash("SUCCES", "Vous avez soumis votre avec succes" , FLASH_SUCCESS);
                
                 }else {
                    flash("error", "Vous avez deja soumis un avis" , FLASH_WARNING);
                 }
                   
                  
                }
                    

                 
               
    
                if (isset($_POST['deleteRequest'])) {
                    DemandeDeServiceDAO::supprimer($demande);
                    header("Location: http://localhost/Allo_Deneigement/?action=afficherDemandeDeServices");
                    flash("Suppression", " Votre demande a ete bien supprimee", FLASH_SUCCESS);
                    exit;
                }
    
                if (isset($_POST['cancelRequest'])) {
                    $this->handleStatusUpdate($demande, 'Refusée', 'La demande a été refusée avec succès.');
                }
    
                if (isset($_POST['completeRequest'])) {
                    $this->handleStatusUpdate($demande, 'Completée', 'La demande a été complétée avec succès.');
                }
    
                if (isset($_POST['acceptRequest'])) {
                    $this->handleStatusUpdate($demande, 'Acceptée', 'La demande a été acceptée avec succès.');
                }
    
                return "detail-offre";
            }
        } catch (Exception $e) {
            flash("Erreur", "Une erreur s'est produite: " . $e->getMessage(), FLASH_ERROR);
            return "detail-offre";
        }
    }
    
       
   
    


 
}

    
    



