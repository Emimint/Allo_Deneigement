<?php
if (!defined('BASE_URL_VIEWS')) define('BASE_URL_VIEWS', 'http://localhost:80/Allo_Deneigement/views/');
if (!defined('DOSSIER_BASE_INCLUDE'))  define("DOSSIER_BASE_INCLUDE", "http://localhost:80/Allo_Deneigement/");
?>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/views/templates/commons/head.php"); ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/views/templates/commons/navbar.php"); ?>
<div class="container-fluid my-6 p-3" style="width:60%;">
    <form  novalidate class="needs-validation" method="POST" action="?action=afficherContactPage">
        <fieldset>
            <legend>Formulaire de contacte</legend>
            <div class="container contact-page mx-auto p-2">
                <div class="row mb-2 ">
                    <div class="col-md-6">
                    
                    <div class="form-floating text-uppercase">
                <input type="email" name="email" class="form-control border border-3 border-light rounded-0 mb-2" id="floatingInput" placeholder="name@example.com" required>
                <div class="invalid-feedback">
                    Saississez une adresse courriel valide.
                </div>
            </div>
                    </div>

                    <div class="mb-3">
                       <label class="form-label deneigement-validate-selectionMenu">Sélectionnez un problème :</label>
                       <select class="form-select selectError" name="selectionMenu" required>
                       <option value="" disabled selected>Sélectionnez un problème</option>
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
                        <div class="invalid-feedback">Veuillez sélectionner un problème.</div>
                         </div>

                    <div>
                        <label id="information" class="form-label ">Autre Informations/Remarques.</label>
                        <textarea class="form-control" name="info" placeholder="Veuillez saisir le maximum d'informations possible" rows="4" cols="50" maxlength="500"></textarea>
                    </div>

                    <div class="d-flex justify-content-center">
                        <button type="submit" id="submitbtn" class="btn mt-4" style="background-color:#b50303;color:white;width:20%;">Envoyer</button>
                    </div>

                </div>
        </fieldset>
    </form>
</div>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/views/templates/commons/footer.php"); ?>
<script src="<?php echo BASE_URL_VIEWS; ?>static/scripts/css-validation.js"></script>
</body>

</html>