<?php if (!defined('BASE_URL')) define('BASE_URL', 'http://localhost:80/Allo_Deneigement/views/');?>


<?php include($_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/views/templates/commons/head.php"); ?> 
 <?php include($_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/views/templates/commons/navbar.php"); ?> 


 <?php

 //data query
 // Incluez les fichiers nécessaires
include_once( $_SERVER['DOCUMENT_ROOT'] ."/Allo_Deneigement/models/DAO/DAO.interface.php");
include_once( $_SERVER['DOCUMENT_ROOT'] ."/Allo_Deneigement/models/demande_de_service.class.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/models/DAO/DemandeDeServiceDAO.class.php");
include_once( $_SERVER['DOCUMENT_ROOT'] ."/Allo_Deneigement/models/utilisateur.class.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/models/DAO/UtilisateurDAO.class.php");
include_once( $_SERVER['DOCUMENT_ROOT'] ."/Allo_Deneigement/models/offre_de_service.class.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/models/DAO/OffreDeServiceDAO.class.php");


//chercher demande de service du fournisseur 1
$request_list = DemandeDeServiceDAO::chercherAvecFiltre("WHERE Demande_de_service.id_fournisseur = 2");


$offre_de_service = OffreDeServiceDAO::chercherAvecFiltre("where id_fournisseur=1");

//chercher utilisateur qui match la demande de service
$user_list = UtilisateurDAO::chercherAvecFiltre("JOIN Demande_de_service ON Utilisateur.id_utilisateur = Demande_de_service.id_utilisateur
WHERE Demande_de_service.id_fournisseur = 2");




$arrayData = [];
$arrayUser = [];
foreach ($request_list as $i => $item) {
    
    $offreServiceItem = $offre_de_service[$i];

    $arrayData[] = [
        'idDemande' => $item->getIdDemande(),
        'Service' => $offreServiceItem->getCategorie(),
        'dateDebut' => $item->getDateDebut(),
        'dateFin' => $item->getDateFin(),
        'status' => $item->getStatus(),
        'Commentaire' => $item->getCommentaire(),
      
    ];
}



/////////////////////////////////////////////////
///////update status////////////////////////////
// Update status logic
if (isset($_POST['updateStatus'])) {
    // Get data from the AJAX request
    $idDemande = isset($_POST['idDemande']) ? $_POST['idDemande'] : null;
    $newStatus = isset($_POST['newStatus']) ? $_POST['newStatus'] : null;

    // Validate and sanitize input if needed

    // Call the static method to update the status
    if ($idDemande !== null && $newStatus !== null) {
        DemandeDeServiceDAO::updateStatus($idDemande, $newStatus);

        // You can echo a response if needed
        echo "Status updated successfully";
        // Stop further execution
        exit;
    } else {
        // Handle validation or missing data
        echo "Invalid input data";
        // Stop further execution
        exit;
    }
}
 ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/views/templates/commons/custom-table-supplier.php"); ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/views/templates/commons/footer.php"); ?>

<script src="<?php echo BASE_URL;?>/static/scripts/load-table-supplier.js"></script> 
<script>
    var rowData;
    $(document).ready(function () {
        // Call the populateDataTable function with the $arrayData as an argument
        populateDataTable(<?php echo json_encode($arrayData); ?>);
      
 
    });

















</script>
</body>
</html>