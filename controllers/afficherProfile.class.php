<?php

include_once(DOSSIER_BASE_INCLUDE . "controllers/controleur.abstract.class.php");
include_once(DOSSIER_BASE_INCLUDE . "views/templates/commons/flash.php");
include_once(DOSSIER_BASE_INCLUDE . "models/DAO/AdresseDAO.class.php");

class AfficherProfile extends  Controleur
{
    private $liste_adresses;
    private $liste_categorie_services;

    public function __construct()
    {
        parent::__construct();
        $this->liste_adresses = array();
    }

    public function getListeAdresses()
    {
        return $this->liste_adresses;
    }

    public function getListeCategorieServices()
    {
        return $this->liste_categorie_services;
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

        // Récuperer toutes les catégories de service existantes :
        $this->liste_categorie_services = OffreDeServiceDAO::chercherToutesLesCategories();

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

                try {
                    $stringifyAdress = $_POST['newPostalCode'] . ', ' . $_POST['newNumero'] . ', ' . $_POST['newRue'] . ', ' . $_POST['newVille'] . ', ' . $_POST['newPays'] . ', ' . $_POST['newProvince'];
                    $coordinates = AdresseDAO::geocodeAddress($stringifyAdress);
                    // echo "Latitude : " . $coordinates[0] . " Longitude : " . $coordinates[1];
                    if ($coordinates == null) {
                        flash('Erreur', 'Impossible de trouver cette adresse. Veuillez vérifier vos saisies.', FLASH_ERROR);
                        return "profilePage";
                    }

                    $nouvelleAdresse = new Adresse("", $_POST['newPostalCode'], $_POST['newNumero'], $_POST['newRue'], $_POST['newVille'], $_POST['newPays'], $_POST['newProvince'], $coordinates[0], $coordinates[1]);
                } catch (Exception $e) {
                    // echo $e->getMessage();
                    flash('Erreur', 'Une erreur s\'est produite côté serveur.', FLASH_ERROR);
                    return "registration";
                }

                try {
                    PersonneDAO::insererAdresse($_SESSION['utilisateurConnecte'], $nouvelleAdresse, $_SESSION['infoUtilisateur']->getEmail());
                } catch (Exception $e) {
                    flash('Erreur', 'Impossible d\' ajouter cette adresse. Veuillez vérifier vos saisies.', FLASH_ERROR);
                    return "profilePage";
                }
                flash('Ajout adresse', 'Nouvelle adresse ajoutée avec succès.', FLASH_SUCCESS);
                echo '<script>
                            setTimeout(function(){
                                window.location.reload();
                            }, 2000); // 2000 milliseconds = 2 seconds
                          </script>';
                return "profilePage";
            } else if (isset($_POST['submitCategoriesService'])) {
                $selectedServices = array();

                if (!empty($_POST['categorie-checkbox'])) {
                    foreach ($_POST['categorie-checkbox'] as $key => $checkedService) {
                        if (isset($_POST['price'][$key])) {
                            $selectedServices[] = array(
                                'service' => $checkedService,
                                'price' => $_POST['price'][$key] ? $_POST['price'][$key] : 10,
                                'description' => $_POST['description'][$key] ? $_POST['description'][$key] : "Votre service.",
                                'type' => isset($_POST['service-type'][$key]) ? $_POST['service-type'][$key] : 3
                            );
                        }
                    }
                }

                foreach ($selectedServices as $serviceInfo) {
                    try {
                        if (isset($serviceInfo['type']) && $_SESSION['utilisateurConnecte'] instanceof Fournisseur) {
                            var_dump($_SESSION['utilisateurConnecte']);
                            if ($serviceInfo['type'] == 1) {
                                $nouvelleOffre = new OffreDeService("", $_SESSION['utilisateurConnecte']->getIdFournisseur(), $serviceInfo['price'], $serviceInfo['description'],  "Résidentiel", $serviceInfo['service']);
                                OffreDeServiceDAO::inserer($nouvelleOffre);
                            } elseif ($serviceInfo['type'] == 2) {
                                $nouvelleOffre = new OffreDeService("", $_SESSION['utilisateurConnecte']->getIdFournisseur(), $serviceInfo['price'], $serviceInfo['description'],  "Commercial", $serviceInfo['service']);
                                OffreDeServiceDAO::inserer($nouvelleOffre);
                            } else {
                                $nouvelleOffre1 = new OffreDeService("", $_SESSION['utilisateurConnecte']->getIdFournisseur(), $serviceInfo['price'], $serviceInfo['description'],  "Résidentiel", $serviceInfo['service']);
                                $nouvelleOffre2 = new OffreDeService("", $_SESSION['utilisateurConnecte']->getIdFournisseur(), $serviceInfo['price'], $serviceInfo['description'],  "Commercial", $serviceInfo['service']);
                                OffreDeServiceDAO::inserer($nouvelleOffre1);
                                OffreDeServiceDAO::inserer($nouvelleOffre2);
                            }
                            flash('Modification des services', 'Services mis à jour avec succès.', FLASH_SUCCESS);
                            //                 echo '<script>
                            //     setTimeout(function(){
                            //         window.location.reload();
                            //     }, 2000); // 2000 milliseconds = 2 seconds
                            //   </script>';
                        } else {
                            echo 'Erreur';
                        }
                    } catch (Exception $e) {
                        echo $e->getMessage();
                        // flash('Erreur', 'Impossible de modifier vos offres de service. Veuillez vérifier vos saisies.', FLASH_ERROR);
                        return "profilePage";
                    }
                }

                return "profilePage";
            }

            if ($this->liste_adresses != null && count($this->liste_adresses) > 0) {
                foreach ($this->liste_adresses as $addresse) {
                    if (isset($_POST["deleteAdresse" . $addresse->getIdAdresse()])) {
                        try {
                            PersonneDAO::supprimerAdresse($_SESSION['utilisateurConnecte'], $_SESSION['infoUtilisateur']->getEmail(), $addresse);
                            flash('Suppression', 'Adresse supprimée avec succès.', FLASH_SUCCESS);
                            echo '<script>
                            setTimeout(function(){
                                window.location.reload();
                            }, 2000); // 2000 milliseconds = 2 seconds
                          </script>';
                            return "profilePage";
                        } catch (Exception $e) {
                            flash('Erreur', 'Impossible de supprimer cette adresse du système. Veuillez contacter un administrateur.', FLASH_ERROR);
                            return "profilePage";
                        }
                    }
                }
            }


            return "profilePage";
        } else {
            return "profilePage";
        }
    }
}
