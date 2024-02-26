<?php

include_once(DOSSIER_BASE_INCLUDE . "controllers/controleur.abstract.class.php");
include_once(DOSSIER_BASE_INCLUDE . "views/templates/commons/flash.php");
include_once(DOSSIER_BASE_INCLUDE . "models/DAO/BilletDAO.class.php");

class AfficherContactPage extends  Controleur
{


    public function __construct()
    {
        parent::__construct();
    }

    public function executerAction()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $motif = $_POST['selectionMenu'] ?? '';
                $texte = $_POST['info'] ?? '';
                $email = $_POST['email'] ?? '';
                $dateBillet = date('Y-m-d H:i:s'); // Récupérer la date actuelle

                $nouveauBillet = new Billet('', $motif, $texte, $dateBillet, $email); // Utiliser la date récupérée
                BilletDAO::inserer($nouveauBillet);

                flash('succes', 'Votre message a été envoyé avec succès', FLASH_SUCCESS);
                return "landing-page";
            } catch (Exception $e) {
                flash('Erreur', 'Impossible d\'envoyer votre message. Veuillez vérifier vos informations.', FLASH_ERROR);
                return "contactPage";
            }
        } else {
            return "contactPage";
        }
    }
}
