<?php

include_once(DOSSIER_BASE_INCLUDE . "controllers/controleur.abstract.class.php");
include_once(DOSSIER_BASE_INCLUDE . "views/templates/commons/flash.php");

class FaireDemandeSoumission extends  Controleur
{
    private $fournisseur;
    private $offreChoisie;
    private $liste_offre_services;
    private $liste_adresses;

    public function __construct()
    {
        parent::__construct();
    }

    public function getListeServices()
    {
        return $this->liste_offre_services;
    }

    public function getListeAdresses()
    {
        return $this->liste_adresses;
    }

    public function getFournisseur()
    {
        return $this->fournisseur;
    }

    public function getOffreChoisie()
    {
        return $this->offreChoisie;
    }


    public function setOffreChoisie($nouveauChoix)
    {
        $this->offreChoisie = $nouveauChoix;
    }

    public function executerAction()
    {

        $id_service = 2; // normally from the URL

        if (isset($_SESSION['utilisateurConnecte']) && $_SESSION['utilisateurConnecte'] != "utilisateur") {
            flash('Info', 'Vous devez vous connecter pour accéder à cette page.', FLASH_INFO);
            return "login";
        }

        // get fournisseur with id_fournisseur
        $this->offreChoisie = OffreDeServiceDAO::chercher($id_service);
        $this->fournisseur = FournisseurDAO::chercher($_GET['id_fournisseur']);
        $filtre = "WHERE id_fournisseur=" . $_GET['id_fournisseur'] . ";";
        $this->liste_offre_services = OffreDeServiceDAO::chercherAvecFiltre($filtre);
        $this->liste_adresses = PersonneDAO::chercherAdresses($this->acteur, $_SESSION['infoUtilisateur']->getEmail());

        if (($_SERVER['REQUEST_METHOD'] === 'POST')) {
            if (isset($_POST['nouvelleAdresse'])) {


                $stringifyAdress = $_POST['newPostalCode'] . ', ' . $_POST['newNumero'] . ', ' . $_POST['newRue'] . ', ' . $_POST['newVille'] . ', ' . $_POST['newPays'] . ', ' . $_POST['newProvince'];
                $coordinates = AdresseDAO::geocodeAddress($stringifyAdress);

                if ($coordinates == null) {
                    flash('Erreur', 'Impossible de trouver cette adresse. Veuillez vérifier vos saisies.', FLASH_ERROR);
                    return "profilePage";
                }

                $nouvelleAdresse = new Adresse("", $_POST['newPostalCode'], $_POST['newNumero'], $_POST['newRue'], $_POST['newVille'], $_POST['newPays'], $_POST['newProvince'], $coordinates[0], $coordinates[1]);

                try {
                    PersonneDAO::insererAdresse($_SESSION['utilisateurConnecte'], $nouvelleAdresse, $_SESSION['infoUtilisateur']->getEmail());
                } catch (Exception $e) {
                    flash('Erreur', 'Impossible d\' ajouter cette adresse. Veuillez vérifier vos saisies.', FLASH_ERROR);
                    return "profilePage";
                }
                echo '<script>
                            setTimeout(function(){
                                window.location.reload();
                            }, 1000); // 2000 milliseconds = 2 seconds
                          </script>';
                flash('Ajout adresse', 'Nouvelle adresse ajoutée avec succès.', FLASH_SUCCESS);
            }
        }
        return "soumission-offre";
    }
}
