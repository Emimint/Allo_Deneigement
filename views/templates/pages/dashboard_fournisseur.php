<?php
if (!defined('BASE_URL_VIEWS')) define('BASE_URL_VIEWS', 'http://localhost:80/Allo_Deneigement/views/');
?>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/views/templates/commons/head.php"); ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/views/templates/commons/navbar.php");
if (count($controleur->getlisteDemandesUtilisateurs()) == 0) { ?>
    <div class="vh-100 container">
        <p>
        <h5 class="container my-5 mx-5 p-3 border border-3 rounded rounded-3">Aucune demande n'a été trouvée.</h5>
        </p>
    </div>
<?php } else { ?>
    <div class="container my-5 mx-5">
        <table class="table">
            <thead>
                <tr class="sticky">
                    <th>Id</th>
                    <th>Service</th>
                    <th>Debut</th>
                    <th>Fin</th>
                    <th>Status</th>
                    <th>Details</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once($_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/views/templates/commons/create-table-body-supplier.php");
                require_once($_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/views/templates/commons/flash.php");
                try {
                    afficherTableau($controleur->getlisteDemandesUtilisateurs(), $controleur->getlisteFournisseursAssocies(), $controleur->getlisteServicesAssocies());
                } catch (Exception $e) {
                    format_flash_message(["Erreur", "Impossible d'afficher les demandes de services", FLASH_ERROR]);
                }
                ?>
            </tbody>
        </table>
    </div>
<?php }  ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/views/templates/commons/footer.php"); ?>
</body>

</html>