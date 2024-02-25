<?php
if (!defined('BASE_URL_VIEWS')) define('BASE_URL_VIEWS', 'http://localhost:80/Allo_Deneigement/views/');
?>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/views/templates/commons/head.php"); ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/views/templates/commons/navbar.php");
?>
<style>
  .tab-pane{
        overflow-x: auto;
    }
.table {
        width: 100%;
        border-collapse: collapse;
    }

    .table th, .table td {
        padding: 10px;
        text-align: left;
        border: 1px solid #ddd;
    }
</style>


    <div class="container my-5 mx-5">
   
<?php
//var_dump($controleur->getlisteDemandesUtilisateurs());
$tableauDemandes = $controleur->getlisteDemandesUtilisateurs();
$tableauUtilisateur =$controleur->getlisteUtilisateur();
$tableauFournisseur= $controleur->getlisteFournisseur();
$tableauOffres = $controleur->getlisteOffreDeservice();
$TableauReview = $controleur->getListReview();
$tableauBillet = $controleur->getListeBillets();

require_once($_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/views/templates/fragments/all-data-tables.php");



?>

<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Demandes</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">utilisateurs</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">fournisseurs</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="offres-tab" data-bs-toggle="tab" data-bs-target="#offres" type="button" role="tab" aria-controls="offres" aria-selected="false">Offres</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" type="button" role="tab" aria-controls="reviews" aria-selected="false">Reviews</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="billets-tab" data-bs-toggle="tab" data-bs-target="#billets" type="button" role="tab" aria-controls="billets" aria-selected="false">Billets</button>
  </li>
</ul>

<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"><?php getRequestdata($tableauDemandes);?></div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab"><?php getUserdata($tableauUtilisateur);?></div>
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab"><?php getFournisseurdata($tableauFournisseur);?></div>
  <div class="tab-pane fade" id="offres" role="tabpanel" aria-labelledby="offres-tab"><?php getOffresdata($tableauOffres);?></div>
  <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab"><?php getReviewdata($TableauReview);?></div>
  <div class="tab-pane fade" id="billets" role="tabpanel" aria-labelledby="billets-tab"><?php getBilletdata($tableauBillet);?></div>
</div>


    </div>

<?php include($_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/views/templates/commons/footer.php"); ?>
<script>

    $("#submit").click(function() {
       
        var rowData = $(this).closest("tr").find("input").serializeArray();
        $.ajax({
            type: "POST",
            url: "",
            data: rowData,
            success: function(response) {
                // Handle the response from the server
                
                console.log(response);
            },
            error: function(error) {
                // Handle the error
                debugger;
                console.log(error);
            }
        });
    });

</script>

</body>


</html>