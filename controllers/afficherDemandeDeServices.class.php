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
        if ($this->acteur == "utilisateur" || $this->acteur == "fournisseur") {

            try {
                $user_id = $_SESSION['infoUtilisateur']->getIdUtilisateur();
                $this->listeDemandesUtilisateurs = DemandeDeServiceDAO::chercherAvecFiltre("WHERE id_" . strtolower($_SESSION['utilisateurConnecte']) . "=" . $user_id);

                foreach ($this->listeDemandesUtilisateurs as $demande) {
                    $fournisseur = FournisseurDAO::chercher($demande->getIdFournisseur());
                    $nomFournisseur = $fournisseur->getNomDeLaCompagnie();
                    array_push($this->listeFournisseursAssocies, $nomFournisseur);

                    $service = OffreDeServiceDAO::chercher($demande->getIdOffre());
                    $nomService = $service->getDescription();
                    array_push($this->listeServicesAssocies, $nomService);
                }
            } catch (Exception $e) {
                // echo $e->getMessage();
                flash('Erreur', 'Une erreur s\'est produite. Veuillez réessayer plus tard.', FLASH_ERROR);
                return "registration";
            }
            return "historique-utilisateur";
        } else {
            array_push($this->messagesErreur, "Vous êtes déjà connécté.");
            flash('Info', 'Vous devez vous connecter pour accéder à cette page.', FLASH_INFO);
            return "login";
        }
    }
}
