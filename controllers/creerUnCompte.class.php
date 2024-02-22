<?php

include_once(DOSSIER_BASE_INCLUDE . "controllers/controleur.abstract.class.php");
include_once(DOSSIER_BASE_INCLUDE . "views/templates/commons/flash.php");
include_once(DOSSIER_BASE_INCLUDE . "models/DAO/AdresseDAO.class.php");

class CreerUnCompte extends  Controleur
{

    public function __construct()
    {
        parent::__construct();
    }

    public function executerAction()
    {
        // echo $this->acteur;
        if ($this->acteur != "visiteur") {
            array_push($this->messagesErreur, "Votre compte est deja cree.");
            flash('Info', 'Votre compte est deja cree.', FLASH_INFO);
            return "landing-page";
        }


        if (($_SERVER['REQUEST_METHOD'] === 'POST')) {

            if (PersonneDAO::chercherPersonne($_POST['email']) != null) {
                flash('Erreur', 'Cette adresse courriel est déjà utilisée.', FLASH_ERROR);
                return "registration";
            }

            try {
                if (isset($_POST['companyName']) && strlen($_POST['companyName']) > 0) {
                    $unUtilisateur = new Fournisseur("", $_POST['email'], $_POST['companyName'], $_POST['lastName'], $_POST['firstName'], "", "", strtolower(($_POST['lastName'])[0] . $_POST['firstName']), $_POST['password'], "", "");
                    FournisseurDAO::inserer($unUtilisateur);
                } else {
                    $unUtilisateur = new Utilisateur("", $_POST['email'], $_POST['lastName'], $_POST['firstName'], "", strtolower(($_POST['lastName'])[0] . $_POST['firstName']), $_POST['password'], "");
                    UtilisateurDAO::inserer($unUtilisateur);
                }
                $this->acteur = strtolower(get_class($unUtilisateur));
                $_SESSION['utilisateurConnecte'] = strtolower($this->acteur);
                // pour avoir les infos de l'utilisateur connecté au complet, incluant son id! :
                $_SESSION['infoUtilisateur'] = PersonneDAO::chercherPersonne($_POST['email']);
                flash('Profil crée', 'Votre profil a été crée avec succès.', FLASH_SUCCESS);
                return "landing-page";
            } catch (Exception $e) {
                // echo $e->getMessage();
                flash('Erreur', 'Une erreur s\'est produite côté serveur.', FLASH_ERROR);
                return "registration";
            }
        } else {
            return "registration";
        }
    }
}
