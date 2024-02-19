<?php
include_once(DOSSIER_BASE_INCLUDE . "controllers/controleur.abstract.class.php");
include_once(DOSSIER_BASE_INCLUDE . "models/DAO/DemandeDeServiceDAO.class.php");
include_once(DOSSIER_BASE_INCLUDE . "models/DAO/FournisseurDAO.class.php");
include_once(DOSSIER_BASE_INCLUDE . "models/DAO/OffreDeServiceDAO.class.php");
include_once(DOSSIER_BASE_INCLUDE . "views/templates/commons/flash.php");

class AfficherOffreDeServices extends Controleur
{
   
    private $FournisseurAssocie;
    private $OffreAssocies;
   

    public function __construct()
    {
        parent::__construct();
    
    
   
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
            

           
            return "fournisseur";
            
            }
}
}