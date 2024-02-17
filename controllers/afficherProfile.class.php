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
                if (PersonneDAO::chercherPersonne($_POST['email']) != null && $_POST['email'] != $_SESSION['infoUtilisateur']->getEmail()) {
                    flash('Erreur', 'Cette adresse courriel est déjà utilisée.', FLASH_ERROR);
                    return "profilePage";
                }

                if ($_SESSION['utilisateurConnecte'] == "administrateur" || $_SESSION['utilisateurConnecte'] == "utilisateur") {
                    $_SESSION['infoUtilisateur']->setNom($_POST['nom']);
                    $_SESSION['infoUtilisateur']->setPrenom($_POST['prenom']);
                } else {
                    $_SESSION['infoUtilisateur']->setNomContact($_POST['nom']);
                    $_SESSION['infoUtilisateur']->setPrenomContact($_POST['prenom']);
                    $_SESSION['infoUtilisateur']->setNomDeLaCompagnie($_POST['nom-companie']);
                    $_SESSION['infoUtilisateur']->setDescription($_POST['description']);
                }
                $_SESSION['infoUtilisateur']->setTelephone($_POST['telephone']);
                PersonneDAO::modifier($_SESSION['infoUtilisateur']);
                flash('Mise à jour de votre profil', 'Modification effectuée avec succès.', FLASH_SUCCESS);
                return "profilePage";
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
