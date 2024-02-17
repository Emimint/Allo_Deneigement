<?php

include_once(DOSSIER_BASE_INCLUDE . "controllers/controleur.abstract.class.php");
include_once(DOSSIER_BASE_INCLUDE . "views/templates/commons/flash.php");
include_once(DOSSIER_BASE_INCLUDE . "models/DAO/AdresseDAO.class.php");

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
                try {
                    PersonneDAO::modifier($_SESSION['infoUtilisateur']);
                } catch (Exception $e) {
                    flash('Erreur', 'Impossible de mettre à jour vos informations. Veuillez vérifier vos saisies.', FLASH_ERROR);
                    return "profilePage";
                }
                flash('Mise à jour de votre profil', 'Modification effectuée avec succès.', FLASH_SUCCESS);
                return "profilePage";
            } else if (isset($_POST['submitMesAdresses'])) {
                if ($this->liste_adresses != null && count($this->liste_adresses) > 0) {
                    foreach ($this->liste_adresses as $address) {
                        foreach ($_POST as $key => $value) {
                            if (strpos($key, 'address' . $address->getIdAdresse()) !== false) {
                                $address->setNomRue($value);
                            }
                            if (strpos($key, 'city' . $address->getIdAdresse()) !== false) {
                                $address->setVille($value);
                            }
                            if (strpos($key, 'country' . $address->getIdAdresse()) !== false) {
                                $address->setPays($value);
                            }
                            if (strpos($key, 'zip-code' . $address->getIdAdresse()) !== false) {
                                $address->setCodePostal($value);
                            }
                            AdresseDAO::modifier($address);
                        }
                    }
                    flash('Mise à jour de vos adresses', 'Modification effectuée avec succès.', FLASH_SUCCESS);
                }
            } else if (isset($_POST['nouvelleAdresse'])) {
                $nouvelleAdresse = new Adresse("", $_POST['newPostalCode'], $_POST['newNumero'], $_POST['newRue'], $_POST['newVille'], $_POST['newPays'], $_POST['newProvince'], "");
                try {
                    PersonneDAO::insererAdresse($_SESSION['utilisateurConnecte'], $nouvelleAdresse, $_SESSION['infoUtilisateur']->getEmail());
                } catch (Exception $e) {
                    flash('Erreur', 'Impossible d\' ajouter cette adresse. Veuillez vérifier vos saisies.', FLASH_ERROR);
                    return "profilePage";
                }
                flash('Ajout adresse', 'Nouvelle adresse ajoutée avec succès.', FLASH_SUCCESS);
                return "profilePage";
            }
            return "profilePage";
        } else {
            return "profilePage";
        }
    }
}
