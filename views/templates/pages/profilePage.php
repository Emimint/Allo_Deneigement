<?php
if (!defined('BASE_URL')) define('BASE_URL', 'http://localhost:80/Allo_Deneigement/views/');
?>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/views/templates/commons/head.php"); ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/views/templates/commons/navbar.php"); ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/views/templates/fragments/modal-adresse.php"); ?>
<style>
    body {
        background-color: #f8f9fa;
        margin-top: 0;
        margin: bottom 0;
    }

    .profile-container {
        background-color: #fff;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    .profile-photo {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        object-fit: cover;
    }

    .nav-pills .nav-link {
        color: #495057;
        background-color: transparent;
        border: 1px solid #dee2e6;
        border-radius: 5px;
        margin-bottom: 10px;
    }

    .nav-pills .nav-link.active {
        background-color: #007bff;
        color: #fff;
    }

    .tab-content {
        padding: 20px 0;
    }

    .form-label {
        font-weight: bold;
    }

    button[type="submit"] {
        background-color: #b50303;
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        cursor: pointer;
    }

    button[type="submit"]:hover {
        background-color: #b50303;
    }
</style>

<body class="m-0 p-0" style="padding-top: 0;">
    <div class="container mt-3 mb-3" style="margin-top: -20px;">
        <div class="card mx-auto">
            <div class="card-body">
                <div class="row">
                    <div class="col-2 p-0 vertical-bar ">

                        <div class="profile-container text-center">
                            <img src="https://img-c.udemycdn.com/user/200_H/anonymous_3.png" alt="Profile Photo" class="img-fluid rounded-circle" width="100">
                            <p class="mt-2"><?php
                                            if (($_SESSION['utilisateurConnecte']) == "administrateur" || ($_SESSION['utilisateurConnecte']) == "utilisateur") {
                                                echo $_SESSION['infoUtilisateur']->getPrenom();
                                                echo " " . $_SESSION['infoUtilisateur']->getNom();
                                            } else {
                                                echo $_SESSION['infoUtilisateur']->getPrenomContact();
                                                echo " " . $_SESSION['infoUtilisateur']->getNomContact() . "<br>";
                                                echo "<small><em>" . $_SESSION['infoUtilisateur']->getNomDeLaCompagnie() . "</em></small>";
                                            }
                                            ?></p>
                            <div class="nav flex-column nav-pills me-3 stylePersoBarreVerticale" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <button class="nav-link  text-start text-white  border" style="background-color:#b50303; color: white;" id="v-pills-profil-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profil" type="button" role="tab" aria-controls="v-pills-profil" aria-selected="false">

                                    <i></i>
                                    Profil
                                </button>
                                <button class="nav-link  text-start text-white  border" style="background-color:#b50303; color: white;" id="v-pills-photo-tab" data-bs-toggle="pill" data-bs-target="#v-pills-photo" type="button" role="tab" aria-controls="v-pills-photo" aria-selected="true"><i></i>Photo
                                </button>
                                <button class="nav-link  text-start text-white  border" style="background-color:#b50303; color: white;" id="v-pills-adresse-tab" data-bs-toggle="pill" data-bs-target="#v-pills-mesAdresses" type="button" role="tab" aria-controls="v-pills-adresse" aria-selected="true"><i></i>Mes Adresses
                                </button>
                                <button class="nav-link  text-start text-white  border" style="background-color:#b50303; color: white;" id="v-pills-paiement-tab" data-bs-toggle="pill" data-bs-target="#v-pills-paiement" type="button" role="tab" aria-controls="v-pills-paiement" aria-selected="true"><i></i>Paiement
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="col-10">
                        <div class="tab-content" id="v-pills-tabContent">
                            <!-- Contenu de l'onglet Profil -->
                            <div class="tab-pane fade" id="v-pills-profil" role="tabpanel" aria-labelledby="v-pills-profil-tab">
                                <div id="content-container">
                                    <div class="col-md-9">
                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <h4>Votre Profil</h4>
                                                <hr>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <form class="form-inline" action="?action=afficherProfile" method="POST">
                                                    <?php if (($_SESSION['utilisateurConnecte']) == "fournisseur") { ?>
                                                        <div class="form-group row mb-3">
                                                            <label for="nom-companie" class="col-4 col-form-label">Nom de la companie</label>
                                                            <div class="col-8">
                                                                <input id="nom-companie" name="nom-companie" placeholder="Nom de la companie" class="form-control" required="required" type="text" value="<?php
                                                                                                                                                                                                            echo $_SESSION['infoUtilisateur']->getNomDeLaCompagnie();
                                                                                                                                                                                                            ?>">
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                    <div class="form-group row mb-3">
                                                        <label for="lastname" class="col-4 col-form-label">Nom</label>
                                                        <div class="col-8">
                                                            <input id="lastname" name="nom" placeholder="Nom" class="form-control" required="required" type="text" value="<?php
                                                                                                                                                                            if (($_SESSION['utilisateurConnecte']) == "administrateur" || ($_SESSION['utilisateurConnecte']) == "utilisateur") {
                                                                                                                                                                                echo $_SESSION['infoUtilisateur']->getNom();
                                                                                                                                                                            } else {
                                                                                                                                                                                echo $_SESSION['infoUtilisateur']->getNomContact();
                                                                                                                                                                            }
                                                                                                                                                                            ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-3">
                                                        <label for="name" class="col-4 col-form-label">Prenom</label>
                                                        <div class="col-8">
                                                            <input id="name" name="prenom" placeholder="Prenom" class="form-control" type="text" value="<?php
                                                                                                                                                        if (($_SESSION['utilisateurConnecte']) == "administrateur" || ($_SESSION['utilisateurConnecte']) == "utilisateur") {
                                                                                                                                                            echo $_SESSION['infoUtilisateur']->getPrenom();
                                                                                                                                                        } else {
                                                                                                                                                            echo $_SESSION['infoUtilisateur']->getPrenomContact();
                                                                                                                                                        }
                                                                                                                                                        ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-3">
                                                        <label for="email" class="col-4 col-form-label">Téléphone</label>
                                                        <div class="col-8">
                                                            <input id="telephone" name="telephone" placeholder="telephone" class="form-control" required="required" type="text" value="<?php
                                                                                                                                                                                        echo $_SESSION['infoUtilisateur']->getTelephone();
                                                                                                                                                                                        ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-3">
                                                        <label for="email" class="col-4 col-form-label">Email</label>
                                                        <div class="col-8">
                                                            <input id="email" name="email" placeholder="Email" class="form-control" required="required" type="text" value="<?php
                                                                                                                                                                            echo $_SESSION['infoUtilisateur']->getEmail();
                                                                                                                                                                            ?>">
                                                        </div>
                                                    </div>
                                                    <?php if ($_SESSION['utilisateurConnecte'] == "fournisseur") { ?>
                                                        <div class="form-group row mb-3">
                                                            <label for="publicinfo" class="col-4 col-form-label">Décrire votre site</label>
                                                            <div class="col-8">
                                                                <textarea id="publicinfo" name="description" cols="40" rows="4" class="form-control"><?php
                                                                                                                                                        echo $_SESSION['infoUtilisateur']->getDescription();
                                                                                                                                                        ?></textarea>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                    <div class="form-group row mb-3">
                                                        <div class="offset-4 col-8">
                                                            <button name="submitProfil" type="submit">Mettre à jour mon profile</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Contenu de l'onglet Photo -->
                            <div class="tab-pane fade" id="v-pills-photo" role="tabpanel" aria-labelledby="v-pills-photo-tab">
                                <div id="photoContent" class="col-md-9 mt-3">
                                    <div class="col-md-9">
                                        <div class="card mx-auto">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12 text-center">
                                                        <h4>Votre Photo</h4>
                                                        <hr>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <form action="?action=afficherProfile" method="POST">
                                                            <div class="um-container">
                                                                <input type="hidden" name="csrfmiddlewaretoken" value="8pIEtG7udmnHLScoTIvcDT0mifGfGC0qiQwb2w496VODME97rBbrOMPukz7PImII">
                                                                <div class="ud-form-group">
                                                                    <label for="form-group--1" class="ud-form-label ud-heading-sm">Aperçu de l'image</label>
                                                                    <div class="udlite-in-udheavy">
                                                                        <div class="ud-image-upload-preview-wrapper image-upload-preview-with-crop--preview-wrapper--3mrme">
                                                                            <div class="image-upload-preview-with-crop--image-wrapper--2soBW">
                                                                                <img data-purpose="image-preview" src="https://img-b.udemycdn.com/user/200_H/anonymous_3.png" alt="" height="200" width="200" class="" loading="lazy" style="max-height: 20rem;">
                                                                            </div>
                                                                        </div>
                                                                        <div class="ud-image-upload-form-wrapper">
                                                                            <div class="ud-form-group">
                                                                                <div class="mb-3">
                                                                                    <label for="profileImage" class="form-label">Photo de profil</label>
                                                                                    <input type="file" class="form-control" id="profileImage">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <input type="hidden" name="image_file" value="">

                                                                        <div class="ud-footer-btns" style="text-align: left;">
                                                                            <button type="submit" data-purpose="user_manage:submit" class="ud-btn ud-btn-large ud-btn-primary ud-heading-md">
                                                                                <span>Sauvegarder</span>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Contenu de l'onglet Mes Adresses -->
                            <form action="?action=afficherProfile" method="POST">
                                <div class="tab-pane fade" id="v-pills-mesAdresses" role="tabpanel" aria-labelledby="v-pills-adresse-tab">
                                    <div id="adresseContent" class="col-md-9 mt-3">
                                        <h2>Mes Adresses</h2>
                                        <div class="card mx-auto">
                                            <div class="card-body">
                                                <div class="col">
                                                    <div class="row profile-container">
                                                        <?php
                                                        require_once($_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/views/templates/commons/create-address-field.php");
                                                        require_once($_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/views/templates/commons/flash.php");
                                                        try {
                                                            if (count($controleur->getListeAdresses()) == 0) {
                                                                echo '<div class="col-md-12 text-center">
                                                            <h5 class="container my-5 mx-5 p-3 border border-3 rounded rounded-3">Aucune adresse n\'a été trouvée.</h5>
                                                            </div>';
                                                            } else {
                                                                foreach ($controleur->getListeAdresses()
                                                                    as $key => $adresse) { ?>
                                                                    <div class="col-md-12">
                                                                        <h4>Adresse #
                                                                            <?php echo $key + 1; ?>
                                                                        </h4>
                                                                        <hr>
                                                                    </div>
                                                        <?php afficherAdresse($adresse);
                                                                }
                                                            }
                                                        } catch (Exception $e) {
                                                            format_flash_message(["Erreur", "Impossible d'afficher les adresses.", FLASH_ERROR]);
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button name="submitMesAdresses" type="submit" data-purpose="user_manage:submit" class="ud-btn ud-btn-large ud-btn-primary ud-heading-md">
                                            <span>Sauvegarder</span>
                                        </button>
                                        <button type="button" class="btn btn-light me-2" data-bs-target="#exampleModalCenter" id="filtrerButton" data-bs-toggle="modal">Ajouter une adresse</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- Contenu de l'onglet Paiement -->
                        <div class="tab-pane fade" id="v-pills-paiement" role="tabpanel" aria-labelledby="v-pills-paiement-tab">
                            <div id="paiementContent" class="col-md-9 mt-3">
                                <h4>Formulaire de Paiement</h4>
                            </div>
                            <form id="payment-form" action="?action=afficherProfile" method="POST">
                                <!-- Informations de la carte -->
                                <div class="mb-3">
                                    <label for="card-number" class="form-label">Numéro de Carte</label>
                                    <input type="text" class="form-control" id="card-number" placeholder="**** **** **** ****" required>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="expiration-date" class="form-label">Date d'Expiration</label>
                                        <input type="text" class="form-control" id="expiration-date" placeholder="MM/YY" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="cvc" class="form-label">CVC</label>
                                        <input type="text" class="form-control" id="cvc" placeholder="CVC" required>
                                    </div>
                                </div>

                                <!-- Informations du titulaire de la carte -->
                                <div class="mt-3">
                                    <label for="card-holder-name" class="form-label">Nom du Titulaire de la Carte</label>
                                    <input type="text" class="form-control" id="card-holder-name" placeholder="Nom du Titulaire" required>
                                </div>

                                <!-- Bouton de Soumission -->
                                <button type="submit" class="mt-4">Payer</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>

    <?php include($_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/views/templates/commons/footer.php"); ?>
    <script src="<?php echo BASE_URL; ?>static/scripts/profilepage-validation.js"></script>
    <script src="<?php echo BASE_URL_VIEWS; ?>static/scripts/trigger-modal.js"></script>

</body>

</html>