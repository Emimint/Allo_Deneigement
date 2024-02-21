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
        // echo $_POST['email'];
        // echo $this->acteur;
        if ($this->acteur != "visiteur") {
            array_push($this->messagesErreur, "Votre compte est deja cree.");
            flash('Info', 'Votre compte est deja cree.', FLASH_INFO);
            return "landing-page";
        }


        if (($_SERVER['REQUEST_METHOD'] === 'POST')) {
            echo $this->acteur;

            echo $_POST['email'];

            if (PersonneDAO::chercherPersonne($_POST['email']) != null) {
                flash('Erreur', 'Cette adresse courriel est déjà utilisée.', FLASH_ERROR);
                return "registration";
            }
            try {
                if (isset($_POST['companyName']))
                    FournisseurDAO::inserer(new Fournisseur("", $_POST['email'], $_POST['companyName'], $_POST['lastName'], $_POST['firstName'], "", "", (($_POST['lastName'])[0]) . strtolower($_POST['firstName']), $_POST['password'], "", ""));
                else
                    UtilisateurDAO::inserer(new Utilisateur("", $_POST['email'], $_POST['lastName'], $_POST['firstName'], "", (($_POST['lastName'])[0]) . strtolower($_POST['firstName']), $_POST['password'], ""));
            } catch (Exception $e) {
                flash('Erreur', 'Impossible de creer le profil. Veuillez vérifier vos saisies.', FLASH_ERROR);
                return "profilePage";
            }
            flash('Profil cree', 'Votre profil a ete cree avec succès.', FLASH_SUCCESS);
            return "profilePage";
        } else {
            return "registration";
        }
    }
}
