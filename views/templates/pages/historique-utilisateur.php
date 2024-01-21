<!DOCTYPE html>
<html>
<?php include("../commons/head.php"); ?>
<?php include("../commons/head.php"); ?>
<?php include("../commons/navbar.php"); ?>
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
    <script src="static/scripts/load-table.js"></script>
</div>
<?php include_once("../commons/footer.php"); ?>
</body>
</html>