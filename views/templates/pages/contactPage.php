<?php
if (!defined('BASE_URL_VIEWS')) define('BASE_URL_VIEWS', 'http://localhost:80/Allo_Deneigement/views/');
if (!defined('DOSSIER_BASE_INCLUDE'))  define("DOSSIER_BASE_INCLUDE", "http://localhost:80/Allo_Deneigement/");
?>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/views/templates/commons/head.php"); ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/views/templates/commons/navbar.php"); ?>
<div class="container-fluid my-6 p-3" style="width:60%;">
    <form  id="signupForm" method="POST" action="?action=afficherContactPage" autocomplete="off">
        <fieldset>
            <legend>Formulaire de contacte</legend>
            <div class="container contact-page mx-auto p-2">
                <div class="row mb-2 ">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label>Nom</label>
                            <input type="text" id="usernames" class="form-control deneigement-validate-username" name="nom" required>
                            <h5 id="usercheck" class="error-message usernameError">
                                Veuillez saisir un nom valide.
                            </h5>

                        </div>

                        <div class="mb-3">
                            <label>Entreprise</label>
                            <input type="text" class="form-control deneigement-validate-nomEntreprise" name="nomEntreprise">
                            <h5 id="entepriseCheck" class="error-message  entrepriseError">
                                Veuillez saisir un nom d'entreprise valide.
                            </h5>

                        </div>

                        <div class="mb-3">
                            <label>Courriel</label>
                            <div class="input-group">

                                <input type="email" class="form-control deneigement-validate-email" name="email" id="email" required>
                                <h5 id="emailCheck" class="error-message  emailError">
                                    Veuillez saisir un email valide.
                                </h5>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>Prenom</label>
                                <input type="text" class="form-control deneigement-validate-firstname" id="fistNames" name="prenom" required>
                                <h5 id="firstNameCheck" class="error-message  firstNameError">
                                    Veuillez saisir un prenom valide.
                                </h5>

                            </div>



                            <div class="mb-3">
                                <label>Téléphone</label>
                                <input type="tel" class="form-control deneigement-validate-phoneNumber" id="phone" name="telephone">
                                <h5 id="phoneCheck" class="error-message  phoneError">
                                    Veuillez saisir un numero de telephone valide.
                                </h5>


                            </div>
                        </div>
                    </div>

                    <div class="row align-items-start">
                        <div class="col-md-8">
                            <label>Adresse</label>
                            <input type="text" class="form-control deneigement-validate-adresse" id="adresse" name="adresse">
                            <h5 id="adresseCheck" class="error-message adresseError">
                                Veuillez saisir une adresse valide.
                            </h5>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label deneigement-validate-selectionProvince">Province</label>
                            <select class="form-select selectError" name="selectionProvince" required="">
                                <option value="" disabled="" selected="">Sélectionnez une province</option>
                                <option value="Alberta">AB</option>
                                <option value="Colombie_Britanique">BC</option>
                                <option value="Il-du-Prince-edouard">PE</option>
                                <option value="Manitoba">MB</option>
                                <option value="Nouveau-Brunswick">NB</option>
                                <option value="Nouvelle-ecosse">NS</option>
                                <option value="Ontario">ON</option>
                                <option value="Quebec">QC</option>
                                <option value="Saskatchewan">SK</option>
                                <option value="Terre-Neuve-et-Labrador">NL</option>
                                <option value="Nuvavut">NU</option>
                                <option value="Territoure du Nord-Ouest">NT</option>
                                <option value="Yukon">YT</option>
                            </select>
                            <h5 id="selectMenuCheck" class="error-message selectProvinceError">
                                Veuillez choisir une province.
                            </h5>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <ul class="nav flex-column contact-page">
                                <li class="nav-item">
                                    <label>Ville</label>
                                    <input type="text" class="form-control deneigement-validate-ville" id="ville" name="ville">
                                    <h5 id="villeCheck" class="error-message villeError">
                                        Veuillez saisir une ville.
                                    </h5>

                                </li>
                            </ul>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label>Pays</label>
                            <input type="text" class="form-control deneigement-validate-pays" id="pays" name="pays">
                            <h5 id="paysCheck" class="error-message paysError">
                                Veuillez saisir un pays
                            </h5>

                        </div>
                        <div class="col-md-3 mb-3">
                            <ul class="nav flex-column contact-page">
                                <li class="nav-item">
                                    <label>Code Postal</label>
                                    <input type="text" class="form-control deneigement-validate-codePostal" id="codePostal" name="codePostal">
                                    <h5 id="codePostalCheck" class="error-message codePostalError">
                                        Veuillez saisir un code postal valide.
                                    </h5>

                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label deneigement-validate-selectionMenu">Sélectionnez un problème :</label>
                        <select class="form-select selectError" name="selectionMenu" required="">
                            <option value="" disabled="" selected="">Sélectionnez un problème</option>
                            <option value="probleme_technique">Problème technique</option>
                            <option value="delai_expi">Délai expiré</option>
                            <option value="retard_service">Retard dans le service</option>
                            <option value="mauvaise_communication">Mauvaise communication</option>
                            <option value="endommagement_propriete">Endommagement de la propriété</option>
                            <option value="couts_imprevus">Coûts imprévus</option>
                            <option value="probleme_contractuels">Problème contractuel</option>
                            <option value="manque_flexibilite">Manque de flexibilité</option>
                            <option value="manque_professionnalisme">Manque de professionnalisme</option>
                        </select>
                        <h5 id="selectMenuCheck" class="error-message selectError">
                            Veuillez choisir un probleme parmis la selection.
                        </h5>

                    </div>

                    <div>
                        <label id="information" class="form-label ">Autre Informations/Remarques.</label>
                        <textarea class="form-control" rows="4" cols="50" maxlength="100"></textarea>
                    </div>

                    <div class="d-flex justify-content-center">
                        <button type="submit" id="submitbtn" class="btn mt-4" style="background-color:#b50303;color:white;width:20%;">Envoyer</button>
                    </div>

                </div>
        </fieldset>
    </form>
</div>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/views/templates/commons/footer.php"); ?>
<script src="<?php echo DOSSIER_VIEWS; ?>static/scripts/contactPage-validation.js"></script>
</body>

</html>