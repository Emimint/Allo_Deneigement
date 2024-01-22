<?php if (!defined('BASE_URL')) define('BASE_URL', 'http://localhost:80/Allo_Deneigement/views/'); ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/views/templates/commons/head.php"); ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/views/templates/commons/navbar.php"); ?>
<div class="my-5">
    <table id="showData" class="table table-striped nowrap table-hover">
        <thead>
        <tr class="sticky">
            <th>Id</th>
            <th>Service</th>
            <th>Debut</th>
            <th>Fin</th>
            <th>Status</th>
            <th>Fournisseur</th>
            <th>Details</th>
            <th>Supprimer</th>
        </tr>
        </thead>
        <tbody id="tbody"></tbody>
    </table>
</div>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/views/templates/commons/footer.php"); ?>