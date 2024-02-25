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

    public function calculerPrixDemandeService()
    {
        $prix_unitaire = $this->getOffreChoisie()->getPrixUnitaire();
        $prix_total = $prix_unitaire * $this->getOffreChoisie()->getNbPersonne();
        return $prix_total;
    }

    function getDurationInHours($duration)
    {
        switch ($duration) {
            case "Une demie-journée":
                return 12;
            case "Une journée":
                return 24;
            case "Deux journées":
                return 48;
            case "Forfait 10 journées":
                return 240;
            case "Forfait 6 mois":
                return 4380;
            default:
                return 1;
        }
    }

    public function executerAction()
    {
        if ($_SESSION['utilisateurConnecte'] != "utilisateur") {
            flash('Info', 'Vous devez vous connecter pour accéder à cette page.', FLASH_INFO);
            return "login";
        }

        if (($_SERVER['REQUEST_METHOD'] === 'GET')) {

            echo "id_fournisseur: " . $_GET['id_fournisseur'];
            echo "id_service: " .  $_GET['id_service'];

            $this->offreChoisie = OffreDeServiceDAO::chercher($_GET['id_service']);
            $this->fournisseur = FournisseurDAO::chercher($_GET['id_fournisseur']);
            $filtre = "WHERE id_fournisseur=" . $_GET['id_fournisseur'] . ";";
            $this->liste_offre_services = OffreDeServiceDAO::chercherAvecFiltre($filtre);
            $this->liste_adresses = PersonneDAO::chercherAdresses($_SESSION['utilisateurConnecte'], $_SESSION['infoUtilisateur']->getEmail());
        }

        if (($_SERVER['REQUEST_METHOD'] === 'POST')) {

            try {
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

                if (isset($_POST['submitNouvelleOffre'])) {
                    $duration = $_POST['selected-duration'];
                    $startDate = date('Y-m-d H:i:s');
                    $endDate = date('Y-m-d H:i:s', strtotime("+" . $this->getDurationInHours($duration) . " hours"));
                    echo "startDate: " . $startDate;
                    echo "endDate: " .  $endDate;

                    $nouvelleDemandeService = new DemandeDeService("", $startDate, $endDate, "En attente", $_POST['commentaires-demande'], $_SESSION['infoUtilisateur']->getIdUtilisateur(), $_GET['id_fournisseur'], null, $_GET['id_offre'], $_POST['selected-address-id']);
                    DemandeDeServiceDAO::inserer($nouvelleDemandeService);
                    echo $nouvelleDemandeService;
                    flash('Ajout demande', 'Votre demande de service a été créée avec succès.', FLASH_SUCCESS);
                    return "historique-utilisateur";
                }
            } catch (Exception $e) {
                // flash('Erreur', 'Impossible d\' ajouter votre demande. Veuillez vérifier vos information.', FLASH_ERROR);
                echo $e->getMessage();
                return "soumission-offre";
            }
            return "soumission-offre";
        }
        return "soumission-offre";
    }
}
