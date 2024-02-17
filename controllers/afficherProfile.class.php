<?php

include_once(DOSSIER_BASE_INCLUDE . "controllers/controleur.abstract.class.php");
include_once(DOSSIER_BASE_INCLUDE . "views/templates/commons/flash.php");

class AfficherProfile extends  Controleur
{
    private $liste_adresses;

    public function __construct()
    {
        parent::__construct();
        $this->liste_adresses = array();
    }

    public function getListeAdresses()
    {
        return $this->liste_adresses;
    }

    public function executerAction()
    {
        if ($this->acteur == "visiteur") {
            array_push($this->messagesErreur, "Vous devez vous connecté.");
            flash('Info', 'Vous devez vous connecté.', FLASH_INFO);
            return "landing-page";
        }

        // Récuperer toutes les adresses de l'utilisateur courant :
        $this->liste_adresses = PersonneDAO::chercherAdresses($this->acteur, $_SESSION['infoUtilisateur']->getEmail());

        if (($_SERVER['REQUEST_METHOD'] === 'POST')) {
            if (isset($_POST['submitProfil'])) {
                flash('Mise à jour de votre profil', 'Modification effectuée avec succès.', FLASH_SUCCESS);
            } else if (isset($_POST['submitMesAdresses'])) {
                flash('Mise à jour de vos adresses', 'Modification effectuée avec succès.', FLASH_SUCCESS);
            } else if (isset($_POST['nouvelleAdresse'])) {
                flash('Ajout adresse', 'Nouvelle adresse ajoutée avec succès.', FLASH_SUCCESS);
            }
            return "profilePage";
        } else {
            return "profilePage";
        }
    }
}
