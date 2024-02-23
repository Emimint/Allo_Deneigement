<?php
include_once(DOSSIER_BASE_INCLUDE . "controllers/controleur.abstract.class.php");
include_once(DOSSIER_BASE_INCLUDE . "models/DAO/DemandeDeServiceDAO.class.php");
include_once(DOSSIER_BASE_INCLUDE . "models/DAO/FournisseurDAO.class.php");
include_once(DOSSIER_BASE_INCLUDE . "models/DAO/OffreDeServiceDAO.class.php");
include_once(DOSSIER_BASE_INCLUDE . "views/templates/commons/flash.php");

class AfficherDemandeDeServices extends Controleur
{
    private $listeDemandesUtilisateurs;
    private $listeFournisseursAssocies;
    private $listeServicesAssocies;

    public function __construct()
    {
        parent::__construct();
        $this->listeDemandesUtilisateurs = array();
        $this->listeFournisseursAssocies = array();
        $this->listeServicesAssocies = array();
    }

    public function getlisteDemandesUtilisateurs()
    {
        return $this->listeDemandesUtilisateurs;
    }

    public function getlisteFournisseursAssocies()
    {
        return $this->listeFournisseursAssocies;
    }

    public function getlisteServicesAssocies()
    {
        return $this->listeServicesAssocies;
    }

    public function executerAction()
    {
        // echo $this->acteur;
        if ($this->acteur == "utilisateur") {

            // echo $_SESSION['infoUtilisateur'];
            $user_id = $_SESSION['infoUtilisateur']->getIdUtilisateur();
            $this->listeDemandesUtilisateurs = DemandeDeServiceDAO::chercherAvecFiltre("WHERE id_" . $_SESSION['utilisateurConnecte'] . "=" . $user_id . ";");

            foreach ($this->listeDemandesUtilisateurs as $demande) {
                $fournisseur = FournisseurDAO::chercher($demande->getIdFournisseur());
                $nomFournisseur = $fournisseur->getNomDeLaCompagnie();
                array_push($this->listeFournisseursAssocies, $nomFournisseur);

                $service = OffreDeServiceDAO::chercher($demande->getIdOffre());
                $nomService = $service->getDescription();
                array_push($this->listeServicesAssocies, $nomService);
            }
            return "historique-utilisateur";
        } elseif($this->acteur == "administrateur"){
                //$controleur->getlisteDemandesUtilisateurs(), $controleur->getlisteFournisseursAssocies(), $controleur->getlisteServicesAssocies());
                echo 'hi';
        }
        
        else {
            array_push($this->messagesErreur, "Vous êtes déjà connécté.");
            flash('Info', 'Vous devez vous connecter pour accéder à cette page.', FLASH_INFO);
            return "login";
        }
    }
}
