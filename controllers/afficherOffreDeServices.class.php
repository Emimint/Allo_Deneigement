<?php
include_once(DOSSIER_BASE_INCLUDE . "controllers/controleur.abstract.class.php");
include_once(DOSSIER_BASE_INCLUDE . "models/DAO/DemandeDeServiceDAO.class.php");
include_once(DOSSIER_BASE_INCLUDE . "models/DAO/FournisseurDAO.class.php");
include_once(DOSSIER_BASE_INCLUDE . "models/DAO/OffreDeServiceDAO.class.php");
include_once(DOSSIER_BASE_INCLUDE . "models/DAO/ReviewDAO.class.php");
include_once(DOSSIER_BASE_INCLUDE . "views/templates/commons/flash.php");

class AfficherOffreDeServices extends Controleur
{
   
    private $FournisseurAssocie;
    private $OffreAssocies;
    private $ReviewsAssocies;
   

    public function __construct()
    {

        parent::__construct();
        $this->ReviewsAssocies=array();
    
   
    }

    public function getReviews(){
       return $this->ReviewsAssocies;
    }

    public function getUserName($userId){
        $user_name = UtilisateurDAO::chercher($userId);
        return  $user_name->getPrenom();
     }

    public function getOffre(){
        return $this->OffreAssocies;
     }

    public function getFournisseur(){
        return $this->FournisseurAssocie;
    }
 
    public function executerAction()
    {
      

        if (isset($_GET['id'])) {
         
            //chercher fournisseur
            $fournisseurId = $_GET['id'];
            $fournisseur = FournisseurDAO::chercher($fournisseurId);
            $this->FournisseurAssocie = $fournisseur;
            
            //chercher offre
            
            $offres = OffreDeServiceDAO::chercherAvecFiltre("WHERE id_fournisseur=" . $fournisseurId);

            $this->OffreAssocies = $offres;
            
            //reviews
           foreach($offres as $offre){
            $review = ReviewDAO::chercherAvecFiltre("WHERE id_service=".$offre->getIdOffre());
            foreach($review as $row) {
                array_push($this->ReviewsAssocies, $row);
            }
           
           }

           
          
          
           
           
            return "fournisseur";
            
            }
}
}