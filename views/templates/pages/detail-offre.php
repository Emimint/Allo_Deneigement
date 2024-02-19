

<?php
if (!defined('BASE_URL_VIEWS')) define('BASE_URL_VIEWS', 'http://localhost:80/Allo_Deneigement/views/');
?>

<?php include($_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/views/templates/commons/head.php"); ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/views/templates/commons/navbar.php"); ?>
<div class="step step-4 m-2">
    <form action="" method="POST">

   

        <div class="mb-3 recapitulatif m-5">
            <label class="h2 fw-bold" for="field4" class="form-label">Recapitulatif de votre commande</label>
           
            <div class="container mt-3 p-6">
                <h2>Votre service</h2>
                <ul class="list-group">
                <?php $offre = $controleur->getOffreAssocies()?>
                    <input class="list-group-item" disabled value="<?php echo $offre->getDescription()?>"></input>
                </ul>
                <?php  
    if (isset($_SESSION['utilisateurConnecte']) && $_SESSION['utilisateurConnecte'] == "utilisateur") {
        echo '<h2>Votre fournisseur</h2>
              <ul class="list-group">
                  <input disabled class="list-group-item"  value="'.$controleur->getFournisseursAssocies().'">
              </ul>';
    }
?>
               
                <h2>Adresse de livraison</h2>
                <ul class="list-group">
                <?php
        // Assuming $controleur->getlisteAddresseUtilisateur() returns a list of addresses
        $addresses = $controleur->getlisteAddresseUtilisateur();

        foreach ($addresses as $adresse) {
            echo '<li class="list-group-item">';
            echo '' . $adresse->getIdAdresse() . ',';
            echo ' ' . $adresse->getNomRue().',';
            echo ' ' . $adresse->getVille() . ',';
           
            echo ' ' . $adresse->getPays() . ',';
            echo '' . $adresse->getCodePostal();
            echo '</li>';
        }
    ?>
</ul>

                </ul>
                  <!--info utilisateur-->
                <?php  if (isset($_SESSION['utilisateurConnecte']) && $_SESSION['utilisateurConnecte'] == "fournisseur"){
                     echo ' <h2>Info Demandeur</h2>
                     <div>
                     <ul class="list-group mt-3 mb-3">';
                         
           
                     $user = $controleur->getUtilisateurAssocie();
     
           
                 echo '<li class="list-group-item">';
                 echo '<strong>Nom:</strong> ' . $user->getNom() . '<br>';
                 echo '<strong>Prenom:</strong> ' . $user->getPrenom(). '<br>';
                 echo '<strong>courriel:</strong> ' . $user->getEmail() . '<br>';
                 echo '<strong>telephone:</strong> ' . $user->getTelephone() . '<br>';
                 echo '</li>
       
                                 </ul>
                     </div>';
                }
               
            ?>
              
                
                <h2>Facturation</h2>
                <div class="container">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Service</th>
                                <th scope="col">[Litrage/Tonnage/ect...]</th>
                                <th scope="col">Prix unitaire</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                              
                                <th scope="row"><?php echo $offre->getDescription()?></th>
                                <td>[moins dune tonne]</td>
                                <td><?php echo $offre->getPrixUnitaire()?></td>
                                <td><?php echo $offre->getPrixUnitaire()?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="mb-3">
           
    <div class="mb-3">
       
        <label for="commentaire-soumission" class="form-label">Commentaires</label>
        <textarea name="commentaire" class="form-control" id="commentaire-soumission" rows="3"><?php echo $controleur->getCommentaire()?></textarea>
    </div>


               
            </div>

            <?php
            $status = $controleur->getStatus();

            switch ($status) {
                case 'En attente':
                    // Handle pending status
                    echo '<button type="submit" id="UpdateBtn" name="updateComment" class="btn btn-danger m-2 prev-step">modifer</button>';
                    break;
            
                case 'Acceptée':
                    // Handle accepted status
                    echo '   <button type="button" class="btn btn-danger m-2 prev-step">Contacter fournisseur</button>
                    <button type="submit" class="btn btn-danger m-2">Concater administreur</button>';
                    break;
            
                case 'Refusée':
                    // Handle completed status
                    echo '   <button type="button" class="btn btn-danger m-2 prev-step">Contacter fournisseur</button>
                    <button type="submit" class="btn btn-danger m-2">Concater administreur</button>';
                    break;
                 case 'Complétée':
                        // Handle completed status
                    echo ' <button type="button" class="btn btn-danger m-2 prev-step" >ajouter un avis</button>';
                    break;
            
                default:
                    // Handle any other status that may occur
                    echo '';
                    break;
            }
            
            ?>
           
         
        
        </div>
    </form>
</div>
    <?php include($_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/views/templates/commons/footer.php"); ?>
    <script>
$(document).ready(function () {
    $("#UpdateBtn").click(function (e) {
        e.preventDefault();

        // Perform an AJAX request to update the comment
        $.ajax({
            type: "POST",
            url: "", 
            data: {
                updateComment: true,
                commentaire: $("#commentaire-soumission").val(),
            },
            success: function (response) {
                // Handle the response if needed
                console.log(response);
            },
            error: function (error) {
                // Handle the error if needed
                console.error(error);
            },
        });
    });
});
</script>
    </body>

    </html>